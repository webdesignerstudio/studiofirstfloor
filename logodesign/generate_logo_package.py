#!/usr/bin/env python3
"""
Studio First Floor - Professioneel logo- en huisstijlpakket
Genereert: origineel, transparant, horizontaal, avatar, zwart-wit, wit-op-donker, monochrome
in PNG, SVG en PDF. Maakt ook huisstijl.md met kleuren en gebruiksregels.
"""

import os
import re
import subprocess
import math
from pathlib import Path
from xml.etree import ElementTree as ET

from PIL import Image, ImageDraw, ImageFont, ImageFilter, ImageOps
import numpy as np
from sklearn.cluster import KMeans
import cairosvg
import svgpathtools
from svgpathtools import parse_path, wsvg

# ─────────────────────────────────────────────────────────────────────
# Paden
# ─────────────────────────────────────────────────────────────────────
BASE = Path("/home/ubuntu/Documents/klanten webdesignerstudio/studiofirstfloor")
INPUT = BASE / "Full_Logo_Original_Achtergrond.png"
OUT = BASE / "logodesign"
TMP = OUT / "tmp"
TMP.mkdir(parents=True, exist_ok=True)
OUT.mkdir(parents=True, exist_ok=True)

# ─────────────────────────────────────────────────────────────────────
# Stap 1: Kleuranalyse
# ─────────────────────────────────────────────────────────────────────
print("=== Stap 1: Kleuranalyse ===")
img_rgb = Image.open(INPUT).convert("RGB")
arr = np.array(img_rgb)
print(f"Input: {img_rgb.size}")

pixels = arr.reshape(-1, 3)
kmeans = KMeans(n_clusters=5, random_state=42, n_init=10).fit(pixels)
centers = kmeans.cluster_centers_.astype(int)
labels = kmeans.labels_
counts = np.bincount(labels)
order = np.argsort(-counts)

for i in order:
    rgb = centers[i]
    hex_c = "#{:02x}{:02x}{:02x}".format(*rgb)
    pct = counts[i] / len(pixels) * 100
    print(f"  Cluster {i}: RGB{tuple(rgb)} {hex_c} ({pct:.2f}%)")

bg_rgb = tuple(centers[order[0]])
bg_hex = "#{:02x}{:02x}{:02x}".format(*bg_rgb)

# Bepaal niet-achtergrond pixels
bg_arr = np.array(bg_rgb)
diff = np.abs(arr.astype(float) - bg_arr).sum(axis=2)
mask = diff > 30
ys, xs = np.where(mask)
x1, x2, y1, y2 = xs.min(), xs.max(), ys.min(), ys.max()
print(f"  Logo bounds: x={x1}-{x2}, y={y1}-{y2}")

brightness = arr.mean(axis=2)
bg_b = bg_arr.mean()

# Text: aanzienlijk donkerder dan achtergrond
text_mask = (bg_b - brightness) > 35
# Silhouet: licht donkerder dan achtergrond, maar niet text
sil_mask = ((bg_b - brightness) > 8) & ((bg_b - brightness) <= 35)
# Zorg dat silhouet niet in text zit
sil_mask = sil_mask & ~text_mask

if text_mask.sum():
    text_avg = tuple(arr[text_mask].mean(axis=0).astype(int))
    text_hex = "#{:02x}{:02x}{:02x}".format(*text_avg)
else:
    text_hex = "#6e5b45"  # Fallback taupe

if sil_mask.sum():
    sil_avg = tuple(arr[sil_mask].mean(axis=0).astype(int))
    sil_hex = "#{:02x}{:02x}{:02x}".format(*sil_avg)
else:
    sil_hex = "#d7cac3"  # Fallback beige

print(f"  Background: {bg_hex}")
print(f"  Text:       {text_hex}")
print(f"  Silhouette: {sil_hex}")

# Gebruik de meest voorkomende kleur uit de clusters als de dominante logo kleuren
# Soms is de text/silhouet kleur niet exact het gemiddelde, maar een duidelijke cluster.
# We kiezen de donkerste niet-achtergrond cluster als text, en de lichtste niet-achtergrond cluster als silhouet.
non_bg_clusters = [i for i in order if not np.allclose(centers[i], bg_arr, atol=15)]
if non_bg_clusters:
    brightnesses = [centers[i].mean() for i in non_bg_clusters]
    text_idx = non_bg_clusters[np.argmin(brightnesses)]
    sil_idx = non_bg_clusters[np.argmax(brightnesses)]
    text_hex = "#{:02x}{:02x}{:02x}".format(*centers[text_idx])
    sil_hex = "#{:02x}{:02x}{:02x}".format(*centers[sil_idx])

print(f"  Final Text:       {text_hex}")
print(f"  Final Silhouette: {sil_hex}")

# ─────────────────────────────────────────────────────────────────────
# Stap 2: Voorbereiden van schone laag-PNG's voor potrace
# ─────────────────────────────────────────────────────────────────────
print("\n=== Stap 2: Laagscheiding voor vectorisatie ===")

# Crop tot content met padding
padding = 20
x1p = max(0, x1 - padding)
y1p = max(0, y1 - padding)
x2p = min(arr.shape[1], x2 + padding)
y2p = min(arr.shape[0], y2 + padding)
cropped = arr[y1p:y2p, x1p:x2p]
cw, ch = cropped.shape[1], cropped.shape[0]
print(f"  Cropped: {cw}x{ch}")

# Dark layer (text)
def make_layer(arr, mask_func):
    layer = np.full(arr.shape[:2], 255, dtype=np.uint8)
    for y in range(arr.shape[0]):
        for x in range(arr.shape[1]):
            if mask_func(arr[y, x]):
                layer[y, x] = 0
    return layer

text_layer = make_layer(cropped, lambda p: (bg_b - p.mean()) > 35)
sil_layer = make_layer(cropped, lambda p: (8 < (bg_b - p.mean()) <= 35) and ((bg_b - p.mean()) <= 35))

# Opslaan als PNG voor potrace
text_bmp = TMP / "text_layer.bmp"
sil_bmp = TMP / "sil_layer.bmp"
Image.fromarray(text_layer).save(text_bmp)
Image.fromarray(sil_layer).save(sil_bmp)
print(f"  Saved text layer: {text_bmp}")
print(f"  Saved sil layer:  {sil_bmp}")

# ─────────────────────────────────────────────────────────────────────
# Stap 3: Potrace vectorisatie
# ─────────────────────────────────────────────────────────────────────
print("\n=== Stap 3: Potrace vectorisatie ===")

def run_potrace(input_file, output_svg, turdsize=2, alphamax=1.0, opttolerance=0.2, scale=10):
    cmd = [
        "potrace",
        "--svg",
        f"--turdsize", str(turdsize),
        f"--alphamax", str(alphamax),
        f"--opttolerance", str(opttolerance),
        f"--scale", str(scale),
        "--output", str(output_svg),
        str(input_file)
    ]
    result = subprocess.run(cmd, capture_output=True, text=True)
    if result.returncode != 0:
        print(f"  Potrace error: {result.stderr}")
    return result.returncode == 0

text_svg = TMP / "text.svg"
sil_svg = TMP / "silhouette.svg"
run_potrace(text_bmp, text_svg, turdsize=2, alphamax=1.0, opttolerance=0.2, scale=10)
run_potrace(sil_bmp, sil_svg, turdsize=5, alphamax=1.33, opttolerance=0.4, scale=10)
print(f"  Text SVG: {text_svg}")
print(f"  Sil SVG:  {sil_svg}")

# ─────────────────────────────────────────────────────────────────────
# Stap 4: SVG-paden samenvoegen en optimaliseren
# ─────────────────────────────────────────────────────────────────────
print("\n=== Stap 4: SVG samenvoegen ===")

def extract_paths(svg_file):
    """Extraheer SVG path data uit potrace output."""
    with open(svg_file, 'r') as f:
        content = f.read()
    # Parse XML
    root = ET.fromstring(content)
    ns = {'svg': 'http://www.w3.org/2000/svg'}
    paths = []
    for path in root.findall('.//svg:path', ns):
        d = path.get('d')
        if d:
            paths.append(d)
    for path in root.findall('.//path', ns):
        d = path.get('d')
        if d:
            paths.append(d)
    return paths

text_paths = extract_paths(text_svg)
sil_paths = extract_paths(sil_svg)

print(f"  Text paths: {len(text_paths)}")
print(f"  Sil paths:  {len(sil_paths)}")

# Potrace geeft paden in wiskundige coördinaten (oorsprong linksonder).
# Voor SVG moeten we ze omklappen (oorsprong linksboven).
view_w = cw * 10
view_h = ch * 10

def flip_paths(paths, height):
    """Spiegel paden verticaal zodat ze correct in SVG viewBox staan."""
    flipped = []
    for d in paths:
        try:
            p = parse_path(d)
            p = p.scaled(1, -1)
            p = p.translated(complex(0, height))
            flipped.append(p.d())
        except Exception:
            flipped.append(d)
    return flipped

text_paths = flip_paths(text_paths, view_h)
sil_paths = flip_paths(sil_paths, view_h)

print(f"  Flipped text paths: {len(text_paths)}")
print(f"  Flipped sil paths:  {len(sil_paths)}")

def build_svg(paths_text, paths_sil, bg_hex=None, text_color=None, sil_color=None, title=""):
    text_color = text_color or text_hex
    sil_color = sil_color or sil_hex
    
    svg_parts = [
        '<?xml version="1.0" encoding="UTF-8"?>',
        f'<svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 {view_w} {view_h}" width="{view_w}px" height="{view_h}px">',
        f'  <title>{title}</title>'
    ]
    if bg_hex:
        svg_parts.append(f'  <rect width="{view_w}" height="{view_h}" fill="{bg_hex}"/>')
    
    # Silhouette
    if paths_sil:
        svg_parts.append(f'  <g id="silhouette" fill="{sil_color}" stroke="none">')
        for d in paths_sil:
            svg_parts.append(f'    <path d="{d}"/>')
        svg_parts.append('  </g>')
    
    # Text
    if paths_text:
        svg_parts.append(f'  <g id="text" fill="{text_color}" stroke="none">')
        for d in paths_text:
            svg_parts.append(f'    <path d="{d}"/>')
        svg_parts.append('  </g>')
    
    svg_parts.append('</svg>')
    return "\n".join(svg_parts)

# ─────────────────────────────────────────────────────────────────────
# Stap 5: Alle varianten genereren
# ─────────────────────────────────────────────────────────────────────
print("\n=== Stap 5: Genereren van alle varianten ===")

variants = {
    "logo_origineel": (bg_hex, text_hex, sil_hex),
    "logo_transparant": (None, text_hex, sil_hex),
    "logo_zwartwit": (None, "#000000", "#404040"),
    "logo_wit_op_donker": ("#1a1a1a", "#ffffff", "#d4c4bc"),
    "logo_monochrome": (None, "#6e5b45", "#6e5b45"),
}

svg_files = {}
for name, (bg, tc, sc) in variants.items():
    svg_content = build_svg(text_paths, sil_paths, bg, tc, sc, title=name.replace("_", " ").title())
    svg_path = OUT / f"{name}.svg"
    with open(svg_path, 'w') as f:
        f.write(svg_content)
    svg_files[name] = svg_path
    print(f"  SVG: {svg_path}")

# PNG exports via cairosvg
for name, svg_path in svg_files.items():
    for size in [(2000, 2000), (1024, 1024), (512, 512)]:
        # Bepaal output naam; 2000 is de master, 1024 web, 512 icon
        if size == (2000, 2000):
            suffix = ""
        elif size == (1024, 1024):
            suffix = "_1024"
        else:
            suffix = "_512"
        png_path = OUT / f"{name}{suffix}.png"
        cairosvg.svg2png(url=str(svg_path), write_to=str(png_path), output_width=size[0], output_height=size[1])
        print(f"  PNG: {png_path}")

# PDF exports via cairosvg
for name, svg_path in svg_files.items():
    pdf_path = OUT / f"{name}.pdf"
    cairosvg.svg2pdf(url=str(svg_path), write_to=str(pdf_path))
    print(f"  PDF: {pdf_path}")

# ─────────────────────────────────────────────────────────────────────
# Stap 6: Horizontale variant
# ─────────────────────────────────────────────────────────────────────
print("\n=== Stap 6: Horizontale variant ===")

# Voor de horizontale variant maken we een compositie: silhouet links, tekst rechts
# We gebruiken de originele vectorpaden.
# Bereken bounding boxes van de paden om correct te positioneren.

def path_bbox(d, scale=1.0):
    try:
        p = parse_path(d)
        x_min, x_max, y_min, y_max = p.bbox()
        return x_min*scale, x_max*scale, y_min*scale, y_max*scale
    except Exception:
        return 0, 100, 0, 100

# Schaal de paden; potrace scale=10 betekent dat viewBox 10x de pixels is.
scale = 10.0

# Bepaal bounding boxes
sil_bboxes = [path_bbox(d, scale) for d in sil_paths]
text_bboxes = [path_bbox(d, scale) for d in text_paths]

def combine_bbox(bboxes):
    if not bboxes:
        return 0, 0, 0, 0
    x_min = min(b[0] for b in bboxes)
    x_max = max(b[1] for b in bboxes)
    y_min = min(b[2] for b in bboxes)
    y_max = max(b[3] for b in bboxes)
    return x_min, x_max, y_min, y_max

sil_xmin, sil_xmax, sil_ymin, sil_ymax = combine_bbox(sil_bboxes)
text_xmin, text_xmax, text_ymin, text_ymax = combine_bbox(text_bboxes)

sil_w = sil_xmax - sil_xmin
sil_h = sil_ymax - sil_ymin
text_w = text_xmax - text_xmin
text_h = text_ymax - text_ymin

# Maak horizontale layout: silhouet links, tekst rechts ernaast
h_gap = sil_w * 0.15
h_text_x = sil_xmax + h_gap - text_xmin
h_text_y = sil_ymin - text_ymin + (sil_h - text_h) / 2  # verticaal centreren

# Bouw horizontale SVG
h_view_w = int(sil_w + h_gap + text_w + sil_xmin + 100)
h_view_h = int(max(sil_ymax, text_ymax + h_text_y) + 100)

def translate_path(d, dx, dy):
    """Translate path data by (dx, dy)."""
    try:
        p = parse_path(d)
        p_translated = p.translated(complex(dx, dy))
        return p_translated.d()
    except Exception:
        return d

h_sil_paths = [translate_path(d, 0, 0) for d in sil_paths]
h_text_paths = [translate_path(d, h_text_x, h_text_y) for d in text_paths]

def build_horizontal_svg(paths_text, paths_sil, bg_hex=None, text_color=None, sil_color=None, title=""):
    text_color = text_color or text_hex
    sil_color = sil_color or sil_hex
    parts = [
        '<?xml version="1.0" encoding="UTF-8"?>',
        f'<svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 {h_view_w} {h_view_h}" width="{h_view_w}px" height="{h_view_h}px">',
        f'  <title>{title}</title>'
    ]
    if bg_hex:
        parts.append(f'  <rect width="{h_view_w}" height="{h_view_h}" fill="{bg_hex}"/>')
    if paths_sil:
        parts.append(f'  <g id="silhouette" fill="{sil_color}" stroke="none">')
        for d in paths_sil:
            parts.append(f'    <path d="{d}"/>')
        parts.append('  </g>')
    if paths_text:
        parts.append(f'  <g id="text" fill="{text_color}" stroke="none">')
        for d in paths_text:
            parts.append(f'    <path d="{d}"/>')
        parts.append('  </g>')
    parts.append('</svg>')
    return "\n".join(parts)

h_variants = {
    "logo_horizontal": (bg_hex, text_hex, sil_hex),
    "logo_horizontal_transparant": (None, text_hex, sil_hex),
    "logo_horizontal_zwartwit": (None, "#000000", "#404040"),
    "logo_horizontal_wit_op_donker": ("#1a1a1a", "#ffffff", "#d4c4bc"),
    "logo_horizontal_monochrome": (None, "#6e5b45", "#6e5b45"),
}

for name, (bg, tc, sc) in h_variants.items():
    svg_content = build_horizontal_svg(h_text_paths, h_sil_paths, bg, tc, sc, title=name.replace("_", " ").title())
    svg_path = OUT / f"{name}.svg"
    with open(svg_path, 'w') as f:
        f.write(svg_content)
    
    # Export PNG op 2000px breed
    png_path = OUT / f"{name}.png"
    cairosvg.svg2png(url=str(svg_path), write_to=str(png_path), output_width=2000)
    
    # Export PDF
    pdf_path = OUT / f"{name}.pdf"
    cairosvg.svg2pdf(url=str(svg_path), write_to=str(pdf_path))
    print(f"  Generated: {svg_path}, {png_path}, {pdf_path}")

# ─────────────────────────────────────────────────────────────────────
# Stap 7: Avatar / sociale-media icoon
# ─────────────────────────────────────────────────────────────────────
print("\n=== Stap 7: Avatar / sociale icoon ===")

# Gebruik alleen het silhouet, gecentreerd in een vierkant
avatar_size = 1000
sil_center_x = (sil_xmin + sil_xmax) / 2
sil_center_y = (sil_ymin + sil_ymax) / 2
sil_half = max(sil_w, sil_h) / 2 + 50
ava_view_x = sil_center_x - sil_half
ava_view_y = sil_center_y - sil_half
ava_view_w = sil_half * 2
ava_view_h = sil_half * 2

ava_svg_content = f'''<?xml version="1.0" encoding="UTF-8"?>
<svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="{ava_view_x} {ava_view_y} {ava_view_w} {ava_view_h}" width="{avatar_size}px" height="{avatar_size}px">
  <title>Studio First Floor - Avatar</title>
  <rect x="{ava_view_x}" y="{ava_view_y}" width="{ava_view_w}" height="{ava_view_h}" fill="{bg_hex}"/>
  <g id="silhouette" fill="{sil_hex}" stroke="none">
'''
for d in sil_paths:
    ava_svg_content += f'    <path d="{d}"/>\n'
ava_svg_content += '''  </g>
</svg>'''

ava_svg_path = OUT / "logo_avatar.svg"
with open(ava_svg_path, 'w') as f:
    f.write(ava_svg_content)

ava_png_path = OUT / "logo_avatar.png"
cairosvg.svg2png(url=str(ava_svg_path), write_to=str(ava_png_path), output_width=avatar_size, output_height=avatar_size)
ava_pdf_path = OUT / "logo_avatar.pdf"
cairosvg.svg2pdf(url=str(ava_svg_path), write_to=str(ava_pdf_path))
print(f"  Generated: {ava_svg_path}, {ava_png_path}, {ava_pdf_path}")

# ─────────────────────────────────────────────────────────────────────
# Stap 8: Clean typografische variant
# ─────────────────────────────────────────────────────────────────────
print("\n=== Stap 8: Clean typografische variant ===")

# We maken een SVG met echte tekst, gebaseerd op de fonts die het best passen.
# Gezien het origineel en de website-opties: Playfair Display voor "FIRST FLOOR",
# Cormorant Garamond voor "STUDIO", en Inter voor "PILATES & COACHING".
# Omdat we niet zeker zijn van de exacte fonts, gebruiken we generieke fallbacks.

# We genereren deze variant als SVG met tekst-elementen.
# De positie wordt handmatig afgestemd op basis van het silhouet.

clean_svg_content = f'''<?xml version="1.0" encoding="UTF-8"?>
<svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 {view_w} {view_h}" width="{view_w}px" height="{view_h}px">
  <title>Studio First Floor - Clean Typographic</title>
  <rect width="{view_w}" height="{view_h}" fill="{bg_hex}"/>
  
  <!-- Silhouette remains as traced path -->
  <g id="silhouette" fill="{sil_hex}" stroke="none">
'''
for d in sil_paths:
    clean_svg_content += f'    <path d="{d}"/>\n'
clean_svg_content += f'''  </g>
  
  <!-- Text as real text elements -->
  <text x="{view_w//2}" y="{int(sil_ymax + (sil_h*0.2))}" font-family="'Cormorant Garamond', 'Playfair Display', Georgia, serif" font-size="{int(sil_h*0.18)}" fill="{text_hex}" text-anchor="middle" font-weight="400">STUDIO</text>
  <text x="{view_w//2}" y="{int(sil_ymax + (sil_h*0.45))}" font-family="'Playfair Display', 'Cormorant Garamond', Georgia, serif" font-size="{int(sil_h*0.32)}" fill="{text_hex}" text-anchor="middle" font-weight="500" letter-spacing="{int(sil_h*0.01)}">FIRST FLOOR</text>
  <text x="{view_w//2}" y="{int(sil_ymax + (sil_h*0.62))}" font-family="'Inter', 'Helvetica Neue', Arial, sans-serif" font-size="{int(sil_h*0.07)}" fill="{text_hex}" text-anchor="middle" font-weight="300" letter-spacing="{int(sil_h*0.03)}">PILATES &amp; COACHING</text>
</svg>'''

clean_svg_path = OUT / "logo_typographic.svg"
with open(clean_svg_path, 'w') as f:
    f.write(clean_svg_content)

clean_png_path = OUT / "logo_typographic.png"
cairosvg.svg2png(url=str(clean_svg_path), write_to=str(clean_png_path), output_width=2000)
clean_pdf_path = OUT / "logo_typographic.pdf"
cairosvg.svg2pdf(url=str(clean_svg_path), write_to=str(clean_pdf_path))
print(f"  Generated: {clean_svg_path}, {clean_png_path}, {clean_pdf_path}")

# ─────────────────────────────────────────────────────────────────────
# Stap 9: Huisstijlbestand
# ─────────────────────────────────────────────────────────────────────
print("\n=== Stap 9: Huisstijlbestand schrijven ===")

def rgb_to_cmyk(hex_color):
    r, g, b = int(hex_color[1:3], 16)/255, int(hex_color[3:5], 16)/255, int(hex_color[5:7], 16)/255
    k = 1 - max(r, g, b)
    if k == 1:
        return 0, 0, 0, 100
    c = (1 - r - k) / (1 - k) * 100
    m = (1 - g - k) / (1 - k) * 100
    y = (1 - b - k) / (1 - k) * 100
    return round(c), round(m), round(y), round(k*100)

huisstijl = f"""# Studio First Floor — Huisstijlhandboek

## 1. Logo

Het logo bestaat uit een elegant silhouet van een Pilates-figuur, gecombineerd met de tekst "Studio First Floor — Pilates & Coaching". Het logo heeft een warme, serene uitstraling en is geschikt voor zowel print als digitaal gebruik.

### Primaire logo-bestanden

| Variant | Bestand |
|---------|---------|
| Origineel (met achtergrond) | `logo_origineel.svg` / `.png` / `.pdf` |
| Transparant | `logo_transparant.svg` / `.png` / `.pdf` |
| Horizontaal | `logo_horizontal.svg` / `.png` / `.pdf` |
| Horizontaal transparant | `logo_horizontal_transparant.svg` / `.png` / `.pdf` |
| Avatar / icoon | `logo_avatar.svg` / `.png` / `.pdf` |
| Zwart-wit | `logo_zwartwit.svg` / `.png` / `.pdf` |
| Wit op donker | `logo_wit_op_donker.svg` / `.png` / `.pdf` |
| Monochrome | `logo_monochrome.svg` / `.png` / `.pdf` |
| Clean typografisch | `logo_typographic.svg` / `.png` / `.pdf` |

### Gebruiksregels

- Gebruik altijd een van de goedgekeurde bestanden.
- Laat rondom het logo voldoende witruimte (minimaal de hoogte van de "F" in "FIRST").
- Verklein het logo niet smaller dan 25 mm voor print of 80 px voor web.
- Vervorm, roteer of herkleur het logo niet, behalve met de goedgekeurde monochrome/wit-op-donker varianten.
- Gebruik het logo niet over een drukke achtergrond; kies dan de transparante variant op een effen kleur.

## 2. Kleurenpalet

De kleuren zijn afkomstig uit het originele logo en vormen de basis van de huisstijl.

| Kleur | Naam | Hex | RGB | CMYK |
|-------|------|-----|-----|------|
| Warm crème | Achtergrond | `{bg_hex}` | `{bg_rgb[0]}, {bg_rgb[1]}, {bg_rgb[2]}` | `{rgb_to_cmyk(bg_hex)[0]}`, `{rgb_to_cmyk(bg_hex)[1]}`, `{rgb_to_cmyk(bg_hex)[2]}`, `{rgb_to_cmyk(bg_hex)[3]}` |
| Taupe | Tekst | `{text_hex}` | `{int(text_hex[1:3],16)}, {int(text_hex[3:5],16)}, {int(text_hex[5:7],16)}` | `{rgb_to_cmyk(text_hex)[0]}`, `{rgb_to_cmyk(text_hex)[1]}`, `{rgb_to_cmyk(text_hex)[2]}`, `{rgb_to_cmyk(text_hex)[3]}` |
| Beige | Silhouet | `{sil_hex}` | `{int(sil_hex[1:3],16)}, {int(sil_hex[3:5],16)}, {int(sil_hex[5:7],16)}` | `{rgb_to_cmyk(sil_hex)[0]}`, `{rgb_to_cmyk(sil_hex)[1]}`, `{rgb_to_cmyk(sil_hex)[2]}`, `{rgb_to_cmyk(sil_hex)[3]}` |

### Gebruik

- **Warm crème** is de primaire achtergrondkleur.
- **Taupe** wordt gebruikt voor tekst en het logo op lichte achtergronden.
- **Beige** wordt gebruikt voor het silhouet en als accentkleur.
- Voor donkere achtergronden gebruik je de wit-op-donker variant.

## 3. Typografie

Het originele logo maakt gebruik van een combinatie van serif- en sans-serif lettertypen. Voor de clean typografische variant adviseren we:

| Element | Font | Fallback |
|---------|------|----------|
| "STUDIO" | Cormorant Garamond | Georgia, serif |
| "FIRST FLOOR" | Playfair Display | Georgia, serif |
| "PILATES & COACHING" | Inter | Helvetica Neue, Arial, sans-serif |

## 4. Toepassingen

- **Website:** gebruik `logo_transparant.svg` in de header.
- **Visitekaartje:** gebruik `logo_horizontal.pdf` of `logo_origineel.pdf`.
- **Sociale media:** gebruik `logo_avatar.png` (512x512 of 1024x1024).
- **Drukwerk:** gebruik de PDF-versies voor vectoriële kwaliteit.
- **Briefpapier:** gebruik `logo_horizontal_transparant.pdf`.

## 5. Minimum afmetingen

- **Print:** minimaal 25 mm breed.
- **Web:** minimaal 80 px breed.
- **Avatar:** 512 x 512 px (of 1024 x 1024 px voor hoge resolutie).

## 6. Witruimte

Houd rondom het logo minimaal een gebied vrij ter grootte van de "F" in "FIRST". Plaats het logo nooit te dicht bij andere elementen, paginaranden of snijtekens.

## 7. Niet-doen

- Het logo niet vervormen of uitrekken.
- Het logo niet roteren.
- Het logo niet over een foto of drukke achtergrond plaatsen zonder voldoende contrast.
- De kleuren niet vervangen door eigen kleuren, behalve de goedgekeurde varianten.
- Het silhouet en de tekst niet apart gebruiken zonder elkaar, behalve voor de avatar-variant.
"""

huisstijl_path = OUT / "huisstijl.md"
with open(huisstijl_path, 'w') as f:
    f.write(huisstijl)
print(f"  Huisstijl: {huisstijl_path}")

# ─────────────────────────────────────────────────────────────────────
# Klaar
# ─────────────────────────────────────────────────────────────────────
print("\n=== KLAAR ===")
print(f"Alle bestanden staan in: {OUT}")
print("Bestanden:")
for f in sorted(OUT.iterdir()):
    if f.is_file():
        print(f"  {f.name}")
