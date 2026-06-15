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
    # Create binary grid
    fg = [[False] * (width + 2) for _ in range(height + 2)]
    for cx, cy in comp_pixels:
        fg[cy+1][cx+1] = True
        
    # Generate directed edges
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
                    
    # Trace loops
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
                
    # Filter and simplify
    simplified = []
    for loop in loops:
        xs = [p[0] for p in loop]
        ys = [p[1] for p in loop]
        w = max(xs) - min(xs)
        h = max(ys) - min(ys)
        if w >= 2 or h >= 2 or len(loop) > 8:
            simplified.append(rdp(loop, epsilon))
            
    return simplified

def main():
    image_path = "afbeeldingen/logo.jpeg"
    svg_path = "afbeeldingen/logo.svg"
    
    print(f"Loading {image_path}...")
    img = Image.open(image_path).convert('L')
    width, height = img.size
    
    # 1. Extract text pixels at threshold 175
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
            
    text_pixels = []
    for comp in components175:
        xs = [pt[0] for pt in comp]
        ys = [pt[1] for pt in comp]
        min_x, max_x = min(xs), max(xs)
        min_y, max_y = min(ys), max(ys)
        # Bounding box of silhouette fragment
        if min_x >= 630 and max_x <= 870 and min_y >= 540 and max_y <= 680 and len(comp) > 100:
            print(f"Filtering out silhouette fragment from text at threshold 175: size={len(comp)}, bbox=X:{min_x}-{max_x}, Y:{min_y}-{max_y}")
        else:
            text_pixels.extend(comp)
            
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
        
        # Silhouette top part (above STUDIO) or bottom part (below STUDIO)
        is_sil_top = (min_x >= 540 and max_x <= 850 and min_y >= 260 and max_y <= 530 and len(comp) > 1000)
        is_sil_bottom = (min_x >= 630 and max_x <= 870 and min_y >= 540 and max_y <= 680 and len(comp) > 500)
        
        if is_sil_top or is_sil_bottom:
            print(f"Found silhouette component at threshold 240: size={len(comp)}, bbox=X:{min_x}-{max_x}, Y:{min_y}-{max_y}")
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
                        
    print(f"Tracing {len(text_pixels)} text pixels...")
    text_loops = trace_component(text_pixels, width, height, epsilon=0.5)
    
    print(f"Tracing {len(dilated_silhouette)} dilated silhouette pixels...")
    silhouette_loops = trace_component(dilated_silhouette, width, height, epsilon=0.5)
    
    # Calculate global bounding box for viewBox
    all_xs = []
    all_ys = []
    for loop in text_loops + silhouette_loops:
        for p in loop:
            all_xs.append(p[0])
            all_ys.append(p[1])
            
    if not all_xs:
        print("No loops found!")
        return
        
    min_x, max_x = min(all_xs), max(all_xs)
    min_y, max_y = min(all_ys), max(all_ys)
    
    padding = 20
    view_x = min_x - padding
    view_y = min_y - padding
    view_w = (max_x - min_x) + 2 * padding
    view_h = (max_y - min_y) + 2 * padding
    
    print(f"SVG Bounding Box: {min_x},{min_y} to {max_x},{max_y} (viewBox={view_x} {view_y} {view_w} {view_h})")
    
    # Generate SVG path strings
    def loops_to_d(loops):
        path_data = []
        for loop in loops:
            path_str = f"M {loop[0][0]} {loop[0][1]}"
            for p in loop[1:]:
                path_str += f" L {p[0]} {p[1]}"
            path_str += " Z"
            path_data.append(path_str)
        return " ".join(path_data)
        
    text_d = loops_to_d(text_loops)
    silhouette_d = loops_to_d(silhouette_loops)
    
    # Write master print SVG (with solid background and 20px padding)
    with open(svg_path, "w") as f:
        f.write(f'<?xml version="1.0" encoding="UTF-8" standalone="no"?>\n')
        f.write(f'<svg xmlns="http://www.w3.org/2000/svg" viewBox="{view_x} {view_y} {view_w} {view_h}" width="{view_w}" height="{view_h}">\n')
        f.write(f'  <rect x="{view_x}" y="{view_y}" width="{view_w}" height="{view_h}" fill="#FCF2F0" />\n')
        # Draw silhouette first (background layer)
        f.write(f'  <path fill="#D8C1BB" fill-rule="evenodd" stroke="none" d="{silhouette_d}" />\n')
        # Draw text second (foreground layer)
        f.write(f'  <path fill="#745742" fill-rule="evenodd" stroke="none" d="{text_d}" />\n')
        f.write(f'</svg>\n')
    print(f"Master SVG saved to {svg_path}")

    # Write web versions with tight padding (5px) and transparent backgrounds
    web_padding = 5
    web_view_x = min_x - web_padding
    web_view_y = min_y - web_padding
    web_view_w = (max_x - min_x) + 2 * web_padding
    web_view_h = (max_y - min_y) + 2 * web_padding

    # 1. logo_transparent.svg (transparent background, standard brand colors)
    transparent_path = "afbeeldingen/logo_transparent.svg"
    with open(transparent_path, "w") as f:
        f.write(f'<?xml version="1.0" encoding="UTF-8" standalone="no"?>\n')
        f.write(f'<svg xmlns="http://www.w3.org/2000/svg" viewBox="{web_view_x} {web_view_y} {web_view_w} {web_view_h}" width="{web_view_w}" height="{web_view_h}">\n')
        f.write(f'  <path fill="#D8C1BB" fill-rule="evenodd" stroke="none" d="{silhouette_d}" />\n')
        f.write(f'  <path fill="#745742" fill-rule="evenodd" stroke="none" d="{text_d}" />\n')
        f.write(f'</svg>\n')
    print(f"Transparent SVG saved to {transparent_path}")

    # 2. logo_white.svg (transparent background, all-white for dark headers/overlays)
    white_path = "afbeeldingen/logo_white.svg"
    with open(white_path, "w") as f:
        f.write(f'<?xml version="1.0" encoding="UTF-8" standalone="no"?>\n')
        f.write(f'<svg xmlns="http://www.w3.org/2000/svg" viewBox="{web_view_x} {web_view_y} {web_view_w} {web_view_h}" width="{web_view_w}" height="{web_view_h}">\n')
        f.write(f'  <path fill="#FFFFFF" fill-rule="evenodd" stroke="none" opacity="0.4" d="{silhouette_d}" />\n')
        f.write(f'  <path fill="#FFFFFF" fill-rule="evenodd" stroke="none" d="{text_d}" />\n')
        f.write(f'</svg>\n')
    print(f"White SVG saved to {white_path}")

if __name__ == "__main__":
    main()
