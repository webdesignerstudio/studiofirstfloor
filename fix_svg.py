#!/usr/bin/env python3
"""
Fix: Rebuild SVG correctly from potrace output paths
"""
import re, os

OUTPUT_DIR = "/home/ubuntu/Documents/klanten webdesignerstudio/studiofirstfloor/logo_vector_output"
BG_HEX = "#fbf4ee"
TEXT_HEX = "#726753"
SILHOUETTE_HEX = "#d7cac3"

def extract_paths_only(svg_file):
    """Extract only <path d="..."/> elements from potrace SVG."""
    with open(svg_file, 'r') as f:
        content = f.read()
    # Find the transform on the <g> element (potrace flips Y-axis)
    transform_match = re.search(r'<g transform="([^"]+)"', content)
    transform = transform_match.group(1) if transform_match else ""
    # Extract all path data
    paths = re.findall(r'<path d="[^"]*"/>', content, re.DOTALL)
    return transform, paths

dark_transform, dark_paths = extract_paths_only(f"{OUTPUT_DIR}/paths_dark.svg")
sil_transform, sil_paths = extract_paths_only(f"{OUTPUT_DIR}/paths_silhouette.svg")

print(f"Dark paths: {len(dark_paths)}")
print(f"Silhouette paths: {len(sil_paths)}")
print(f"Transform: {dark_transform}")

dark_paths_str = "\n    ".join(dark_paths)
sil_paths_str = "\n    ".join(sil_paths)

def make_svg(with_background=False):
    bg_rect = f'  <rect width="2000" height="2000" fill="{BG_HEX}"/>\n' if with_background else ''
    return f'''<?xml version="1.0" encoding="UTF-8"?>
<svg xmlns="http://www.w3.org/2000/svg"
     version="1.1"
     viewBox="0 0 2000 2000"
     width="2000px" height="2000px">
  <title>Studio First Floor - Pilates &amp; Coaching</title>
{bg_rect}
  <!-- Silhouette (beige pilates figure) -->
  <g transform="{sil_transform}" fill="{SILHOUETTE_HEX}" stroke="none">
    {sil_paths_str}
  </g>

  <!-- Text layer (Studio, First Floor, Pilates &amp; Coaching) -->
  <g transform="{dark_transform}" fill="{TEXT_HEX}" stroke="none">
    {dark_paths_str}
  </g>
</svg>'''

# Write transparent SVG
svg_t = make_svg(with_background=False)
with open(f"{OUTPUT_DIR}/logo_transparant.svg", 'w') as f:
    f.write(svg_t)
print("✓ logo_transparant.svg written")

# Write SVG with background
svg_bg = make_svg(with_background=True)
with open(f"{OUTPUT_DIR}/logo_met_achtergrond.svg", 'w') as f:
    f.write(svg_bg)
print("✓ logo_met_achtergrond.svg written")

# Validate XML
import xml.etree.ElementTree as ET
for fname in ["logo_transparant.svg", "logo_met_achtergrond.svg"]:
    try:
        ET.parse(f"{OUTPUT_DIR}/{fname}")
        print(f"✓ {fname} — XML valid")
    except ET.ParseError as e:
        print(f"✗ {fname} — XML error: {e}")

print("\nDone!")
