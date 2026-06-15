import os
import subprocess

# HTML for Business Card (65x65mm + 3mm bleed = 71x71mm)
visitekaartje_html = """<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Visitekaartje Studio First Floor</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Montserrat:wght@100..900&display=swap');
        
        @page {
            size: 71mm 71mm;
            margin: 0;
        }
        
        body {
            margin: 0;
            padding: 0;
            width: 71mm;
            height: 71mm;
            background-color: #FCF2F0;
            font-family: 'Montserrat', sans-serif;
            color: #745742;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
            overflow: hidden;
        }
        
        .page {
            position: relative;
            width: 71mm;
            height: 71mm;
            box-sizing: border-box;
            page-break-after: always;
            background-color: #FCF2F0;
        }
        
        /* Trim Guide for visual design checking (safety line is 6mm from edge) */
        .content-area {
            position: absolute;
            left: 3mm;
            top: 3mm;
            width: 65mm;
            height: 65mm;
            box-sizing: border-box;
        }
        
        /* Crop Marks CSS */
        .crop-mark {
            position: absolute;
            background-color: #a08070;
            opacity: 0.8;
        }
        .crop-v { width: 0.15mm; height: 2.5mm; }
        .crop-h { height: 0.15mm; width: 2.5mm; }
        
        /* Top Left */
        .tl-v { left: 3mm; top: 0mm; }
        .tl-h { left: 0mm; top: 3mm; }
        /* Top Right */
        .tr-v { right: 3mm; top: 0mm; }
        .tr-h { right: 0mm; top: 3mm; }
        /* Bottom Left */
        .bl-v { left: 3mm; bottom: 0mm; }
        .bl-h { left: 0mm; bottom: 3mm; }
        /* Bottom Right */
        .br-v { right: 3mm; bottom: 0mm; }
        .br-h { right: 0mm; bottom: 3mm; }
        
        /* FRONT SIDE */
        .front {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .front img {
            width: 50mm;
            height: auto;
        }
        
        /* BACK SIDE */
        .back {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            padding: 8mm 6mm;
            box-sizing: border-box;
        }
        
        .logo-back {
            width: 32mm;
            height: auto;
            margin-bottom: 2mm;
        }
        
        .qr-container {
            position: relative;
            width: 24mm;
            height: 24mm;
            background: white;
            padding: 1mm;
            box-sizing: border-box;
            border: 0.5mm solid #745742;
            border-radius: 2mm;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .qr-container img {
            width: 100%;
            height: 100%;
        }
        
        /* Tiny Instagram logo in center of QR */
        .qr-insta-icon {
            position: absolute;
            width: 5.5mm;
            height: 5.5mm;
            background: white;
            padding: 0.5mm;
            border-radius: 1mm;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .qr-insta-icon svg {
            width: 100%;
            height: 100%;
            fill: #745742;
        }
        
        .insta-handle {
            font-size: 6.5pt;
            font-weight: 700;
            letter-spacing: 1px;
            margin-top: 1.5mm;
            margin-bottom: 2mm;
            text-transform: uppercase;
        }
        
        .contact-info {
            text-align: center;
            font-size: 6pt;
            line-height: 1.5;
            font-weight: 400;
            letter-spacing: 0.3px;
        }
        
        .contact-info .web {
            font-weight: 700;
            margin-top: 0.8mm;
        }
    </style>
</head>
<body>

    <!-- FRONT PAGE -->
    <div class="page front">
        {crop_marks}
        <div class="content-area" style="display:flex; justify-content:center; align-items:center;">
            <img src="afbeeldingen/logo.svg" alt="Studio First Floor Logo">
        </div>
    </div>
    
    <!-- BACK PAGE -->
    <div class="page back">
        {crop_marks}
        <div class="content-area" style="display:flex; flex-direction:column; align-items:center; justify-content:space-between; padding: 4mm 0;">
            <img class="logo-back" src="afbeeldingen/logo.svg" alt="Logo">
            
            <div class="qr-container">
                <img src="afbeeldingen/instagram_qrcode.png" alt="Instagram QR Code">
                <div class="qr-insta-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.051.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z"/>
                    </svg>
                </div>
            </div>
            
            <div class="insta-handle">@pilatesstudiofirstfloor</div>
            
            <div class="contact-info">
                <div>Emmalaan 1F, 's Gravenmoer</div>
                <div>Telefoon: 06 375 282 38</div>
                <div class="web">studiofirstfloor.nl</div>
            </div>
        </div>
    </div>

</body>
</html>
"""

# HTML for A5 Flyer (148x210mm + 3mm bleed = 154x216mm)
flyer_html = """<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Flyer Studio First Floor</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Montserrat:wght@100..900&display=swap');
        
        @page {
            size: 154mm 216mm;
            margin: 0;
        }
        
        body {
            margin: 0;
            padding: 0;
            width: 154mm;
            height: 216mm;
            background-color: #FCF2F0;
            font-family: 'Montserrat', sans-serif;
            color: #745742;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
            overflow: hidden;
        }
        
        .page {
            position: relative;
            width: 154mm;
            height: 216mm;
            box-sizing: border-box;
            page-break-after: always;
            background-color: #FCF2F0;
        }
        
        /* Crop Marks CSS */
        .crop-mark {
            position: absolute;
            background-color: #a08070;
            opacity: 0.8;
            z-index: 100;
        }
        .crop-v { width: 0.15mm; height: 2.5mm; }
        .crop-h { height: 0.15mm; width: 2.5mm; }
        
        /* Top Left */
        .tl-v { left: 3mm; top: 0mm; }
        .tl-h { left: 0mm; top: 3mm; }
        /* Top Right */
        .tr-v { right: 3mm; top: 0mm; }
        .tr-h { right: 0mm; top: 3mm; }
        /* Bottom Left */
        .bl-v { left: 3mm; bottom: 0mm; }
        .bl-h { left: 0mm; bottom: 3mm; }
        /* Bottom Right */
        .br-v { right: 3mm; bottom: 0mm; }
        .br-h { right: 0mm; bottom: 3mm; }
        
        /* FRONT SIDE */
        .front-image-container {
            position: absolute;
            left: 0;
            top: 0;
            width: 154mm;
            height: 146mm;
            overflow: hidden;
        }
        
        .front-image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .photo-overlay {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(116, 87, 66, 0.15); /* Warm light overlay */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 10mm;
            box-sizing: border-box;
        }
        
        .overlay-title {
            font-family: 'Playfair Display', serif;
            font-style: italic;
            font-size: 20pt;
            color: white;
            text-shadow: 0 1.5px 5px rgba(60, 40, 30, 0.6);
            margin-bottom: 3mm;
        }
        
        .overlay-subtitle {
            font-size: 10pt;
            font-weight: 700;
            letter-spacing: 3px;
            color: white;
            text-transform: uppercase;
            text-shadow: 0 1.5px 4px rgba(60, 40, 30, 0.6);
        }
        
        .front-bottom {
            position: absolute;
            left: 3mm;
            bottom: 3mm;
            width: 148mm;
            height: 67mm;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            box-sizing: border-box;
            padding-bottom: 2mm;
        }
        
        .front-logo {
            width: 62mm;
            height: auto;
            margin-bottom: 6mm;
        }
        
        .front-cta-hint {
            font-size: 7.5pt;
            font-weight: 600;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #8c6a53;
        }
        
        /* BACK SIDE */
        .back-container {
            position: absolute;
            left: 3mm;
            top: 3mm;
            width: 148mm;
            height: 210mm;
            box-sizing: border-box;
            padding: 8mm 6mm;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
        }
        
        .back-logo {
            width: 32mm;
            height: auto;
            margin-bottom: 1mm;
        }
        
        .back-header {
            text-align: center;
        }
        
        .back-title {
            font-family: 'Playfair Display', serif;
            font-style: italic;
            font-size: 15pt;
            margin: 0 0 1.5mm 0;
            color: #745742;
        }
        
        .back-subtitle {
            font-size: 7.5pt;
            font-weight: 700;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            margin: 0;
            color: #a08070;
        }
        
        .content-cols {
            display: flex;
            width: 100%;
            justify-content: space-between;
            margin-top: 4mm;
            margin-bottom: 4mm;
            gap: 5mm;
        }
        
        .col {
            flex: 1;
            background: rgba(255, 255, 255, 0.4);
            padding: 4mm 4.5mm;
            border-radius: 3mm;
            border: 0.2mm solid rgba(116, 87, 66, 0.1);
        }
        
        .col-title {
            font-size: 8pt;
            font-weight: 800;
            letter-spacing: 1px;
            text-transform: uppercase;
            border-bottom: 0.3mm solid #745742;
            padding-bottom: 1mm;
            margin-bottom: 3mm;
            color: #745742;
        }
        
        .list-item {
            font-size: 6.5pt;
            line-height: 1.5;
            margin-bottom: 1.5mm;
            display: flex;
            align-items: flex-start;
        }
        
        .list-item-bullet {
            color: #D82B5A; /* Accent color bullet */
            font-weight: bold;
            margin-right: 1.5mm;
        }
        
        .rate-row {
            display: flex;
            justify-content: space-between;
            font-size: 6.5pt;
            line-height: 1.5;
            margin-bottom: 1.5mm;
            border-bottom: 0.1mm dotted rgba(116, 87, 66, 0.2);
            padding-bottom: 0.5mm;
        }
        
        .rate-label {
            font-weight: 500;
        }
        
        .rate-val {
            font-weight: 700;
        }
        
        .proefles-banner {
            width: 100%;
            background-color: #D82B5A; /* Gorgeous Hot Pink Accent */
            color: white;
            text-align: center;
            padding: 3mm 2mm;
            box-sizing: border-box;
            border-radius: 2mm;
            font-size: 9pt;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            box-shadow: 0 2px 6px rgba(216, 43, 90, 0.2);
            margin-bottom: 4mm;
        }
        
        .footer-info {
            text-align: center;
            font-size: 6.5pt;
            line-height: 1.6;
            color: #745742;
        }
        
        .footer-info .bold-info {
            font-weight: 700;
            font-size: 7pt;
            margin-top: 1mm;
        }
    </style>
</head>
<body>

    <!-- FRONT PAGE -->
    <div class="page">
        {crop_marks}
        <div class="front-image-container">
            <img src="studio-1-optimized.png" alt="Studio First Floor Interior">
            <div class="photo-overlay">
                <div class="overlay-title">Nieuw in 's Gravenmoer</div>
                <div class="overlay-subtitle">Kom gratis kennismaken</div>
            </div>
        </div>
        
        <div class="front-bottom">
            <img class="front-logo" src="afbeeldingen/logo.svg" alt="Studio First Floor Logo">
            <div class="front-cta-hint">Zie ommezijde voor meer info</div>
        </div>
    </div>
    
    <!-- BACK PAGE -->
    <div class="page">
        {crop_marks}
        <div class="back-container">
            <img class="back-logo" src="afbeeldingen/logo.svg" alt="Logo">
            
            <div class="back-header">
                <h1 class="back-title">NIEUW — Pilates in 's Gravenmoer</h1>
                <h2 class="back-subtitle">Bouw kracht op vanuit rust</h2>
            </div>
            
            <div class="content-cols">
                <div class="col">
                    <div class="col-title">Aanbod &amp; Werkwijze</div>
                    <div class="list-item">
                        <span class="list-item-bullet">&bull;</span>
                        <span>Basic, Klassiek, Flow &amp; Power Pilates</span>
                    </div>
                    <div class="list-item">
                        <span class="list-item-bullet">&bull;</span>
                        <span>Early Bird, Personal &amp; Duo Pilates</span>
                    </div>
                    <div class="list-item">
                        <span class="list-item-bullet">&bull;</span>
                        <span>Kleine groepen (max 8) &amp; veel persoonlijke aandacht</span>
                    </div>
                    <div class="list-item">
                        <span class="list-item-bullet">&bull;</span>
                        <span>Rust en aandacht in combinatie met kracht</span>
                    </div>
                    <div class="list-item">
                        <span class="list-item-bullet">&bull;</span>
                        <span>Gratis parkeren &amp; materialen aanwezig</span>
                    </div>
                    <div class="list-item">
                        <span class="list-item-bullet">&bull;</span>
                        <span>Lounge met gratis koffie en thee</span>
                    </div>
                </div>
                
                <div class="col">
                    <div class="col-title">Tarieven</div>
                    <div class="rate-row">
                        <span class="rate-label">Maandabonnement (1x/wk)</span>
                        <span class="rate-val">&euro; 49,99</span>
                    </div>
                    <div class="rate-row">
                        <span class="rate-label">Maandabonnement (2x/wk)</span>
                        <span class="rate-val">&euro; 89,99</span>
                    </div>
                    <div class="rate-row">
                        <span class="rate-label">Try-out (3 proeflessen)</span>
                        <span class="rate-val">&euro; 29,99</span>
                    </div>
                    <div class="rate-row">
                        <span class="rate-label">10-rittenkaart (3 mnd)</span>
                        <span class="rate-val">&euro; 119,99</span>
                    </div>
                    <div class="rate-row">
                        <span class="rate-label">Losse les</span>
                        <span class="rate-val">&euro; 14,50</span>
                    </div>
                    <div class="rate-row" style="border:none;">
                        <span class="rate-label">Personal / Duo training</span>
                        <span class="rate-val">op aanvraag</span>
                    </div>
                </div>
            </div>
            
            <div class="proefles-banner">
                Gratis proefles
            </div>
            
            <div class="footer-info">
                <div>Voor info &amp; aanmelden: Emmalaan 1F, 's Gravenmoer | 06 375 282 38</div>
                <div>E-mail: pilatesstudiofirstfloor@gmail.com</div>
                <div class="bold-info">studiofirstfloor.nl</div>
            </div>
        </div>
    </div>

</body>
</html>
"""

crop_marks_html = """
        <!-- Crop Marks -->
        <div class="crop-mark crop-v tl-v"></div>
        <div class="crop-mark crop-h tl-h"></div>
        <div class="crop-mark crop-v tr-v"></div>
        <div class="crop-mark crop-h tr-h"></div>
        <div class="crop-mark crop-v bl-v"></div>
        <div class="crop-mark crop-h bl-h"></div>
        <div class="crop-mark crop-v br-v"></div>
        <div class="crop-mark crop-h br-h"></div>
"""

# Write HTML templates to files
templates = [
    ("visitekaartje_bleed.html", visitekaartje_html.replace("{crop_marks}", "")),
    ("visitekaartje_crop.html", visitekaartje_html.replace("{crop_marks}", crop_marks_html)),
    ("flyer_bleed.html", flyer_html.replace("{crop_marks}", "")),
    ("flyer_crop.html", flyer_html.replace("{crop_marks}", crop_marks_html))
]

for filename, content in templates:
    with open(filename, "w") as f:
        f.write(content)
    print(f"Written {filename}")

# Run Chromium to print PDFs
pdf_outputs = [
    ("visitekaartje_bleed.html", "visitekaartje_drukklaar_afloop.pdf"),
    ("visitekaartje_crop.html", "visitekaartje_drukklaar_snijtekens.pdf"),
    ("flyer_bleed.html", "flyer_drukklaar_afloop.pdf"),
    ("flyer_crop.html", "flyer_drukklaar_snijtekens.pdf")
]

chromium_path = "/snap/bin/chromium"

for html_file, pdf_file in pdf_outputs:
    cmd = [
        chromium_path,
        "--headless",
        "--disable-gpu",
        "--print-to-pdf-no-header",
        f"--print-to-pdf={pdf_file}",
        html_file
    ]
    print(f"Compiling {html_file} to {pdf_file}...")
    res = subprocess.run(cmd, capture_output=True, text=True)
    if res.returncode == 0:
        print(f"Successfully created {pdf_file}!")
    else:
        print(f"Error compiling {html_file}: {res.stderr}")

# Clean up HTML templates
for filename, _ in templates:
    if os.path.exists(filename):
        os.remove(filename)
        print(f"Cleaned up {filename}")
