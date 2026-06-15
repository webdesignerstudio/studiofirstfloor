import os
from PIL import Image

def perpendicular_distance(p, p1, p2):
    x, y = p
    x1, y1 = p1
    x2, y2 = p2
    dx = x2 - x1
    dy = y2 - y1
    if dx == 0 and dy == 0:
        return ((x - x1)**2 + (y - y1)**2)**0.5
    num = abs(dy * x - dx * y + x2 * y1 - y2 * x1)
    den = (dy**2 + dx**2)**0.5
    return num / den

def rdp(points, epsilon):
    if len(points) < 3:
        return points
    dmax = 0
    index = 0
    end = len(points) - 1
    for i in range(1, end):
        d = perpendicular_distance(points[i], points[0], points[end])
        if d > dmax:
            index = i
            dmax = d
    if dmax > epsilon:
        recResults1 = rdp(points[:index+1], epsilon)
        recResults2 = rdp(points[index:], epsilon)
        return recResults1[:-1] + recResults2
    else:
        return [points[0], points[end]]

def trace_component(comp_pixels, width, height, epsilon=0.5):
    fg = [[False] * (width + 2) for _ in range(height + 2)]
    for cx, cy in comp_pixels:
        fg[cy+1][cx+1] = True
        
    adj = {}
    def add_edge(u, v):
        if u not in adj:
            adj[u] = []
        adj[u].append(v)
        
    for y in range(1, height + 1):
        for x in range(1, width + 1):
            if fg[y][x]:
                if not fg[y-1][x]:
                    add_edge((x-1, y-1), (x, y-1))
                if not fg[y][x+1]:
                    add_edge((x, y-1), (x, y))
                if not fg[y+1][x]:
                    add_edge((x, y), (x-1, y))
                if not fg[y][x-1]:
                    add_edge((x-1, y), (x-1, y-1))
                    
    loops = []
    edges_map = {u: list(vs) for u, vs in adj.items()}
    
    for u in list(edges_map.keys()):
        while edges_map[u]:
            loop = [u]
            curr = u
            while True:
                if not edges_map[curr]:
                    break
                nxt = edges_map[curr].pop(0)
                loop.append(nxt)
                curr = nxt
                if curr == u:
                    break
            if len(loop) > 2:
                if loop[-1] != loop[0]:
                    loop.append(loop[0])
                loops.append(loop)
                
    simplified = []
    for loop in loops:
        xs = [p[0] for p in loop]
        ys = [p[1] for p in loop]
        w = max(xs) - min(xs)
        h = max(ys) - min(ys)
        if w >= 2 or h >= 2 or len(loop) > 8:
            simplified.append(rdp(loop, epsilon))
            
    return simplified

def translate_loops(loops, dx, dy):
    new_loops = []
    for loop in loops:
        new_loop = [(p[0] + dx, p[1] + dy) for p in loop]
        new_loops.append(new_loop)
    return new_loops

def get_bbox(loops):
    xs = [p[0] for l in loops for p in l]
    ys = [p[1] for l in loops for p in l]
    return min(xs), max(xs), min(ys), max(ys)

def loops_to_d(loops):
    path_data = []
    for loop in loops:
        path_str = f"M {loop[0][0]:.1f} {loop[0][1]:.1f}"
        for p in loop[1:]:
            path_str += f" L {p[0]:.1f} {p[1]:.1f}"
        path_str += " Z"
        path_data.append(path_str)
    return " ".join(path_data)

def main():
    image_path = "afbeeldingen/logo.jpeg"
    
    print(f"Loading {image_path}...")
    img = Image.open(image_path).convert('L')
    width, height = img.size
    
    # 1. Extract text and sub-components at threshold 175
    visited175 = set()
    fg175 = set()
    for y in range(height):
        for x in range(width):
            if img.getpixel((x, y)) < 175:
                fg175.add((x, y))
                
    components175 = []
    for p in fg175:
        if p not in visited175:
            comp = []
            queue = [p]
            visited175.add(p)
            while queue:
                curr = queue.pop(0)
                comp.append(curr)
                cx, cy = curr
                for dx, dy in [(-1,0), (1,0), (0,-1), (0,1), (-1,-1), (-1,1), (1,-1), (1,1)]:
                    nx, ny = cx + dx, cy + dy
                    if (nx, ny) in fg175 and (nx, ny) not in visited175:
                        visited175.add((nx, ny))
                        queue.append((nx, ny))
            components175.append(comp)
            
    studio_pixels = []
    first_floor_pixels = []
    pilates_coaching_pixels = []
    
    for comp in components175:
        xs = [pt[0] for pt in comp]
        ys = [pt[1] for pt in comp]
        min_x, max_x = min(xs), max(xs)
        min_y, max_y = min(ys), max(ys)
        
        # Filter out silhouette fragment at threshold 175
        if min_x >= 630 and max_x <= 870 and min_y >= 540 and max_y <= 680 and len(comp) > 100:
            print(f"Filtering out silhouette fragment from text: size={len(comp)}, bbox=X:{min_x}-{max_x}, Y:{min_y}-{max_y}")
            continue
            
        # Classify by Y ranges
        if min_y > 800:
            pilates_coaching_pixels.extend(comp)
        elif max_y < 530:
            studio_pixels.extend(comp)
        else:
            first_floor_pixels.extend(comp)
            
    # 2. Extract silhouette pixels at threshold 240
    visited240 = set()
    fg240 = set()
    for y in range(height):
        for x in range(width):
            if img.getpixel((x, y)) < 240:
                fg240.add((x, y))
                
    components240 = []
    for p in fg240:
        if p not in visited240:
            comp = []
            queue = [p]
            visited240.add(p)
            while queue:
                curr = queue.pop(0)
                comp.append(curr)
                cx, cy = curr
                for dx, dy in [(-1,0), (1,0), (0,-1), (0,1), (-1,-1), (-1,1), (1,-1), (1,1)]:
                    nx, ny = cx + dx, cy + dy
                    if (nx, ny) in fg240 and (nx, ny) not in visited240:
                        visited240.add((nx, ny))
                        queue.append((nx, ny))
            components240.append(comp)
            
    silhouette_pixels = []
    for comp in components240:
        xs = [pt[0] for pt in comp]
        ys = [pt[1] for pt in comp]
        min_x, max_x = min(xs), max(xs)
        min_y, max_y = min(ys), max(ys)
        
        is_sil_top = (min_x >= 540 and max_x <= 850 and min_y >= 260 and max_y <= 530 and len(comp) > 1000)
        is_sil_bottom = (min_x >= 630 and max_x <= 870 and min_y >= 540 and max_y <= 680 and len(comp) > 500)
        
        if is_sil_top or is_sil_bottom:
            print(f"Found silhouette component: size={len(comp)}, bbox=X:{min_x}-{max_x}, Y:{min_y}-{max_y}")
            silhouette_pixels.extend(comp)
            
    # Dilate silhouette pixels to prevent sub-pixel rendering loss
    silhouette_dilation = 2
    dilated_silhouette = set()
    for cx, cy in silhouette_pixels:
        for dy in range(-silhouette_dilation, silhouette_dilation + 1):
            for dx in range(-silhouette_dilation, silhouette_dilation + 1):
                if dx*dx + dy*dy <= silhouette_dilation*silhouette_dilation:
                    nx, ny = cx + dx, cy + dy
                    if 0 <= nx < width and 0 <= ny < height:
                        dilated_silhouette.add((nx, ny))
                        
    print("Tracing text components...")
    studio_loops = trace_component(studio_pixels, width, height, epsilon=0.5)
    first_floor_loops = trace_component(first_floor_pixels, width, height, epsilon=0.5)
    pilates_coaching_loops = trace_component(pilates_coaching_pixels, width, height, epsilon=0.5)
    
    print("Tracing silhouette loops...")
    silhouette_loops = trace_component(dilated_silhouette, width, height, epsilon=0.5)
    
    # -------------------------------------------------------------
    # GENERATE VERTICAL LOGO VARIATIONS (STACKED)
    # -------------------------------------------------------------
    print("Generating stacked logo variations...")
    # Stacked logo includes: silhouette, studio, first_floor, pilates_coaching
    all_vertical_loops = silhouette_loops + studio_loops + first_floor_loops + pilates_coaching_loops
    v_x1, v_x2, v_y1, v_y2 = get_bbox(all_vertical_loops)
    
    padding = 20
    v_view_x = v_x1 - padding
    v_view_y = v_y1 - padding
    v_view_w = (v_x2 - v_x1) + 2 * padding
    v_view_h = (v_y2 - v_y1) + 2 * padding
    
    v_sil_d = loops_to_d(silhouette_loops)
    v_text_d = loops_to_d(studio_loops + first_floor_loops + pilates_coaching_loops)
    
    # logo.svg (original print version)
    with open("afbeeldingen/logo.svg", "w") as f:
        f.write(f'<?xml version="1.0" encoding="UTF-8" standalone="no"?>\n')
        f.write(f'<svg xmlns="http://www.w3.org/2000/svg" viewBox="{v_view_x} {v_view_y} {v_view_w} {v_view_h}" width="{v_view_w}" height="{v_view_h}">\n')
        f.write(f'  <rect x="{v_view_x}" y="{v_view_y}" width="{v_view_w}" height="{v_view_h}" fill="#FCF2F0" />\n')
        f.write(f'  <path fill="#D8C1BB" fill-rule="evenodd" stroke="none" d="{v_sil_d}" />\n')
        f.write(f'  <path fill="#745742" fill-rule="evenodd" stroke="none" d="{v_text_d}" />\n')
        f.write(f'</svg>\n')
        
    # logo_transparent.svg
    with open("afbeeldingen/logo_transparent.svg", "w") as f:
        f.write(f'<?xml version="1.0" encoding="UTF-8" standalone="no"?>\n')
        f.write(f'<svg xmlns="http://www.w3.org/2000/svg" viewBox="{v_view_x} {v_view_y} {v_view_w} {v_view_h}" width="{v_view_w}" height="{v_view_h}">\n')
        f.write(f'  <path fill="#D8C1BB" fill-rule="evenodd" stroke="none" d="{v_sil_d}" />\n')
        f.write(f'  <path fill="#745742" fill-rule="evenodd" stroke="none" d="{v_text_d}" />\n')
        f.write(f'</svg>\n')
        
    # logo_white.svg
    with open("afbeeldingen/logo_white.svg", "w") as f:
        f.write(f'<?xml version="1.0" encoding="UTF-8" standalone="no"?>\n')
        f.write(f'<svg xmlns="http://www.w3.org/2000/svg" viewBox="{v_view_x} {v_view_y} {v_view_w} {v_view_h}" width="{v_view_w}" height="{v_view_h}">\n')
        f.write(f'  <path fill="#FFFFFF" fill-rule="evenodd" stroke="none" opacity="0.4" d="{v_sil_d}" />\n')
        f.write(f'  <path fill="#FFFFFF" fill-rule="evenodd" stroke="none" d="{v_text_d}" />\n')
        f.write(f'</svg>\n')
        
    # -------------------------------------------------------------
    # GENERATE HORIZONTAL LOGO VARIATIONS (LANDSCAPE)
    # -------------------------------------------------------------
    print("Generating horizontal logo variations...")
    # Get original bounds
    sil_x1, sil_x2, sil_y1, sil_y2 = get_bbox(silhouette_loops)
    std_x1, std_x2, std_y1, std_y2 = get_bbox(studio_loops)
    ff_x1, ff_x2, ff_y1, ff_y2 = get_bbox(first_floor_loops)
    
    sil_w = sil_x2 - sil_x1
    sil_h = sil_y2 - sil_y1
    
    # Translate silhouette to start at (0, 0)
    h_sil_loops = translate_loops(silhouette_loops, -sil_x1, -sil_y1)
    
    # Positioning horizontal text
    gap_x = 60
    text_x = sil_w + gap_x  # Position on the right of the silhouette
    
    # Vertically center text block (height = std_h + 44 + ff_h = 48 + 44 + 190 = 282)
    # relative to the silhouette height of 389. Center Y offset = (389 - 282)/2 = 53.5 -> 54
    std_y_new = 54
    ff_y_new = 54 + (std_y2 - std_y1) + 44
    
    # Left-align both text lines next to silhouette
    h_std_loops = translate_loops(studio_loops, text_x - std_x1, std_y_new - std_y1)
    h_ff_loops = translate_loops(first_floor_loops, text_x - ff_x1, ff_y_new - ff_y1)
    
    h_sil_d = loops_to_d(h_sil_loops)
    h_std_d = loops_to_d(h_std_loops)
    h_ff_d = loops_to_d(h_ff_loops)
    h_text_d = f"{h_std_d} {h_ff_d}"
    
    # Calculate horizontal viewBox
    h_padding = 20
    h_view_x = -h_padding
    h_view_y = -h_padding
    h_view_w = sil_w + gap_x + (ff_x2 - ff_x1) + 2 * h_padding
    h_view_h = sil_h + 2 * h_padding
    
    # Write horizontal files
    # logo_horizontal.svg
    with open("afbeeldingen/logo_horizontal.svg", "w") as f:
        f.write(f'<?xml version="1.0" encoding="UTF-8" standalone="no"?>\n')
        f.write(f'<svg xmlns="http://www.w3.org/2000/svg" viewBox="{h_view_x} {h_view_y} {h_view_w} {h_view_h}" width="{h_view_w}" height="{h_view_h}">\n')
        f.write(f'  <rect x="{h_view_x}" y="{h_view_y}" width="{h_view_w}" height="{h_view_h}" fill="#FCF2F0" />\n')
        f.write(f'  <path fill="#D8C1BB" fill-rule="evenodd" stroke="none" d="{h_sil_d}" />\n')
        f.write(f'  <path fill="#745742" fill-rule="evenodd" stroke="none" d="{h_text_d}" />\n')
        f.write(f'</svg>\n')
        
    # logo_horizontal_transparent.svg
    with open("afbeeldingen/logo_horizontal_transparent.svg", "w") as f:
        f.write(f'<?xml version="1.0" encoding="UTF-8" standalone="no"?>\n')
        f.write(f'<svg xmlns="http://www.w3.org/2000/svg" viewBox="{h_view_x} {h_view_y} {h_view_w} {h_view_h}" width="{h_view_w}" height="{h_view_h}">\n')
        f.write(f'  <path fill="#D8C1BB" fill-rule="evenodd" stroke="none" d="{h_sil_d}" />\n')
        f.write(f'  <path fill="#745742" fill-rule="evenodd" stroke="none" d="{h_text_d}" />\n')
        f.write(f'</svg>\n')
        
    # logo_horizontal_white.svg
    with open("afbeeldingen/logo_horizontal_white.svg", "w") as f:
        f.write(f'<?xml version="1.0" encoding="UTF-8" standalone="no"?>\n')
        f.write(f'<svg xmlns="http://www.w3.org/2000/svg" viewBox="{h_view_x} {h_view_y} {h_view_w} {h_view_h}" width="{h_view_w}" height="{h_view_h}">\n')
        f.write(f'  <path fill="#FFFFFF" fill-rule="evenodd" stroke="none" opacity="0.4" d="{h_sil_d}" />\n')
        f.write(f'  <path fill="#FFFFFF" fill-rule="evenodd" stroke="none" d="{h_text_d}" />\n')
        f.write(f'</svg>\n')
        
    print("All vector logo variations generated successfully!")

if __name__ == "__main__":
    main()
