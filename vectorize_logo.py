#!/usr/bin/env python3
"""
Professional Logo Vectorizer - Studio First Floor
Uses potrace to create high-quality SVG from PNG logo.
Produces: SVG (transparent), SVG (with background), PDF (print-ready)
"""

import subprocess
import os
from PIL import Image, ImageFilter, ImageEnhance

# Paths
BASE = "/home/ubuntu/Documents/klanten webdesignerstudio/studiofirstfloor"
INPUT = f"{BASE}/Full_Logo_Original_Achtergrond.png"
OUTPUT_DIR = f"{BASE}/logo_vector_output"
os.makedirs(OUTPUT_DIR, exist_ok=True)

print("=== Studio First Floor - Professional Logo Vectorizer ===\n")

# Load image
img = Image.open(INPUT).convert("RGB")
w, h = img.size
print(f"Input: {w}x{h}px, Mode: RGB")

# Colors (from analysis)
BG_COLOR = (251, 244, 238)      # Warm cream background
TEXT_COLOR = (114, 103, 84)     # Dark taupe text
SILHOUETTE_COLOR = (215, 202, 191)  # Light beige silhouette
BG_HEX = "#fbf4ee"
TEXT_HEX = "#726753"
SILHOUETTE_HEX = "#d7cac3"

# ─────────────────────────────────────────────────────────────────────
# STEP 1: Isolate DARK layer (text: Studio, First Floor, PILATES & COACHING)
# ─────────────────────────────────────────────────────────────────────
print("Step 1: Extracting dark text layer...")
dark_layer = img.copy()
pixels = dark_layer.load()

for y in range(h):
    for x in range(w):
        r, g, b = pixels[x, y]
        # Threshold: if pixel is darker than 200,190,180 → black (content), else white (background)
        if r < 200 and g < 185 and b < 170:
            pixels[x, y] = (0, 0, 0)    # Keep as black (text)
        else:
            pixels[x, y] = (255, 255, 255)  # Background → white

dark_layer_path = f"{OUTPUT_DIR}/layer_dark.ppm"
dark_layer.save(dark_layer_path)
print(f"  Saved dark layer: {dark_layer_path}")

# ─────────────────────────────────────────────────────────────────────
# STEP 2: Isolate SILHOUETTE layer (the light beige pilates figure)
# ─────────────────────────────────────────────────────────────────────
print("Step 2: Extracting silhouette layer...")
sil_layer = img.copy()
pixels = sil_layer.load()

for y in range(h):
    for x in range(w):
        r, g, b = pixels[x, y]
        # Silhouette: pixels noticeably darker than bg but lighter than text
        # BG is ~251,244,238 — silhouette is ~185-230 range
        brightness = (r + g + b) / 3
        bg_brightness = (BG_COLOR[0] + BG_COLOR[1] + BG_COLOR[2]) / 3
        diff = bg_brightness - brightness
        
        if 8 < diff < 65:  # Silhouette range
            pixels[x, y] = (0, 0, 0)    # Keep
        else:
            pixels[x, y] = (255, 255, 255)  # Background

sil_layer_path = f"{OUTPUT_DIR}/layer_silhouette.ppm"
sil_layer.save(sil_layer_path)
print(f"  Saved silhouette layer: {sil_layer_path}")

# ─────────────────────────────────────────────────────────────────────
# STEP 3: Potrace both layers to SVG paths
# ─────────────────────────────────────────────────────────────────────
print("\nStep 3: Running potrace vectorization...")

# Trace dark text layer (high precision)
dark_svg = f"{OUTPUT_DIR}/paths_dark.svg"
result = subprocess.run([
    "potrace",
    "--svg",
    "--turdsize", "2",        # Remove noise <2px
    "--alphamax", "1.0",      # Smooth curves
    "--opttolerance", "0.2",  # High precision
    "--output", dark_svg,
    dark_layer_path
], capture_output=True, text=True)
print(f"  Dark layer traced: {'OK' if result.returncode == 0 else 'FAIL'}")
if result.stderr:
    print(f"  Stderr: {result.stderr[:200]}")

# Trace silhouette layer (smoother for organic shape)
sil_svg = f"{OUTPUT_DIR}/paths_silhouette.svg"
result = subprocess.run([
    "potrace",
    "--svg",
    "--turdsize", "5",        # Remove small noise
    "--alphamax", "1.33",     # Smoother organic curves
    "--opttolerance", "0.4",  # Slightly less strict for smooth curves
    "--output", sil_svg,
    sil_layer_path
], capture_output=True, text=True)
print(f"  Silhouette layer traced: {'OK' if result.returncode == 0 else 'FAIL'}")

# ─────────────────────────────────────────────────────────────────────
# STEP 4: Extract SVG paths and build final combined SVG
# ─────────────────────────────────────────────────────────────────────
print("\nStep 4: Combining layers into final SVG...")

def extract_svg_paths(svg_file):
    """Extract the <g> content from a potrace SVG file."""
    with open(svg_file, 'r') as f:
        content = f.read()
    # Find the transform and path data
    start = content.find('<g id=')
    end = content.rfind('</g>') + 4
    if start == -1:
        start = content.find('<path')
        end = content.rfind('</svg>')
    return content[start:end] if start != -1 else ""

def extract_viewbox(svg_file):
    """Get viewBox from SVG."""
    with open(svg_file, 'r') as f:
        content = f.read()
    import re
    m = re.search(r'viewBox="([^"]+)"', content)
    return m.group(1) if m else "0 0 2000 2000"

# Get viewBox from dark layer SVG
viewbox = extract_viewbox(dark_svg)
print(f"  ViewBox: {viewbox}")
vb_parts = viewbox.split()
vb_w = float(vb_parts[2])
vb_h = float(vb_parts[3])

dark_paths = extract_svg_paths(dark_svg)
sil_paths = extract_svg_paths(sil_svg)

# ─────────────────────────────────────────────────────────────────────
# STEP 5: Build final SVG files
# ─────────────────────────────────────────────────────────────────────

# Replace potrace default black fill with our brand colors
def colorize_paths(paths, color, opacity="1"):
    """Replace fill color in path group."""
    paths = paths.replace('fill="#000000"', f'fill="{color}" opacity="{opacity}"')
    paths = paths.replace("fill='#000000'", f"fill='{color}' opacity='{opacity}'")
    return paths

dark_colored = colorize_paths(dark_paths, TEXT_HEX)
sil_colored = colorize_paths(sil_paths, SILHOUETTE_HEX)

# --- A: Transparent background SVG ---
svg_transparent = f"""<?xml version="1.0" encoding="UTF-8"?>
<svg xmlns="http://www.w3.org/2000/svg" 
     version="1.1"
     viewBox="{viewbox}"
     width="{int(vb_w)}px" height="{int(vb_h)}px"
     xml:space="preserve">
  <title>Studio First Floor - Logo Transparant</title>
  <desc>Studio First Floor - Pilates &amp; Coaching - Transparante achtergrond</desc>
  
  <!-- Silhouette layer (lighter, beige pilates figure) -->
  <g id="silhouette" fill="{SILHOUETTE_HEX}">
{sil_colored}
  </g>
  
  <!-- Text layer (dark taupe: Studio, First Floor, Pilates &amp; Coaching) -->
  <g id="text" fill="{TEXT_HEX}">
{dark_colored}
  </g>
</svg>"""

# --- B: Logo with original background SVG ---
svg_with_bg = f"""<?xml version="1.0" encoding="UTF-8"?>
<svg xmlns="http://www.w3.org/2000/svg" 
     version="1.1"
     viewBox="{viewbox}"
     width="{int(vb_w)}px" height="{int(vb_h)}px"
     xml:space="preserve">
  <title>Studio First Floor - Logo met Achtergrond</title>
  <desc>Studio First Floor - Pilates &amp; Coaching - Met originele achtergrond</desc>
  
  <!-- Background -->
  <rect width="{int(vb_w)}" height="{int(vb_h)}" fill="{BG_HEX}"/>
  
  <!-- Silhouette layer -->
  <g id="silhouette" fill="{SILHOUETTE_HEX}">
{sil_colored}
  </g>
  
  <!-- Text layer -->
  <g id="text" fill="{TEXT_HEX}">
{dark_colored}
  </g>
</svg>"""

# Save SVG files
svg_transparent_path = f"{OUTPUT_DIR}/logo_transparant.svg"
svg_bg_path = f"{OUTPUT_DIR}/logo_met_achtergrond.svg"

with open(svg_transparent_path, 'w') as f:
    f.write(svg_transparent)
print(f"  ✓ SVG transparant: {svg_transparent_path}")

with open(svg_bg_path, 'w') as f:
    f.write(svg_with_bg)
print(f"  ✓ SVG met achtergrond: {svg_bg_path}")

# ─────────────────────────────────────────────────────────────────────
# STEP 6: Generate PDF (print-ready via potrace directly)
# ─────────────────────────────────────────────────────────────────────
print("\nStep 5: Generating print-ready PDF...")

# Create combined BMP for full-logo PDF trace
# We'll use potrace's PDF output on the full image
# First convert to high-quality grayscale BMP for potrace
print("  Preparing high-quality combined layer for PDF...")
combined = img.copy()
pixels_c = combined.load()
pixels_orig = img.load()

for y in range(h):
    for x in range(w):
        r, g, b = pixels_orig[x, y]
        bg_r, bg_g, bg_b = BG_COLOR
        # Make anything that differs from background → black
        diff = abs(r - bg_r) + abs(g - bg_g) + abs(b - bg_b)
        if diff > 12:
            pixels_c[x, y] = (0, 0, 0)
        else:
            pixels_c[x, y] = (255, 255, 255)

combined_ppm = f"{OUTPUT_DIR}/combined_trace.ppm"
combined.save(combined_ppm)

# Use potrace to generate PDF
pdf_path = f"{OUTPUT_DIR}/logo_drukwerk.pdf"
result = subprocess.run([
    "potrace",
    "--pdf",
    "--turdsize", "2",
    "--alphamax", "1.0",
    "--opttolerance", "0.2",
    "-W", "100mm",    # 100mm wide (good for print)
    "-H", "100mm",    # 100mm high
    "--output", pdf_path,
    combined_ppm
], capture_output=True, text=True)
print(f"  {'✓' if result.returncode == 0 else '✗'} PDF drukwerk: {pdf_path}")
if result.stderr:
    print(f"  Stderr: {result.stderr[:200]}")

# Also make an A4 PDF version
pdf_a4_path = f"{OUTPUT_DIR}/logo_drukwerk_A4.pdf"
result = subprocess.run([
    "potrace",
    "--pdf",
    "--turdsize", "2",
    "--alphamax", "1.0",
    "--opttolerance", "0.2",
    "-W", "210mm",    # A4 width
    "-H", "297mm",    # A4 height
    "--output", pdf_a4_path,
    combined_ppm
], capture_output=True, text=True)
print(f"  {'✓' if result.returncode == 0 else '✗'} PDF A4: {pdf_a4_path}")

# ─────────────────────────────────────────────────────────────────────
# STEP 7: Also export transparent PNG (high resolution)
# ─────────────────────────────────────────────────────────────────────
print("\nStep 6: Creating transparent PNG export...")
orig = Image.open(INPUT).convert("RGBA")
pixels_rgba = orig.load()

for y in range(h):
    for x in range(w):
        r, g, b, a = pixels_rgba[x, y]
        bg_r, bg_g, bg_b = BG_COLOR
        diff = abs(r - bg_r) + abs(g - bg_g) + abs(b - bg_b)
        if diff < 10:  # Background pixel → transparent
            pixels_rgba[x, y] = (r, g, b, 0)
        else:
            pixels_rgba[x, y] = (r, g, b, 255)

png_transparent_path = f"{OUTPUT_DIR}/logo_transparant.png"
orig.save(png_transparent_path, "PNG")
print(f"  ✓ PNG transparant: {png_transparent_path}")

# ─────────────────────────────────────────────────────────────────────
# Summary
# ─────────────────────────────────────────────────────────────────────
print("\n" + "="*55)
print("✅ VECTORIZATION COMPLETE!")
print("="*55)
print(f"\nOutput files in: {OUTPUT_DIR}/")
print()

files = [
    ("logo_transparant.svg", "SVG vector - transparante achtergrond"),
    ("logo_met_achtergrond.svg", "SVG vector - met crème achtergrond"),
    ("logo_transparant.png", "PNG hoge resolutie - transparant"),
    ("logo_drukwerk.pdf", "PDF drukwerk - 100x100mm"),
    ("logo_drukwerk_A4.pdf", "PDF drukwerk - A4 formaat"),
]

for fname, desc in files:
    fpath = f"{OUTPUT_DIR}/{fname}"
    size = os.path.getsize(fpath) if os.path.exists(fpath) else 0
    status = "✓" if size > 0 else "✗"
    print(f"  {status} {fname:<35} ({size:,} bytes)")
    print(f"    → {desc}")

print()
print("Klaar voor gebruik in drukwerk, web, social media!")
