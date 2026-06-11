<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studio First Floor — Design Variaties</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Inter', sans-serif;
            background-color: #FAF7F5;
            color: #1d1b19;
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
        }
        img { max-width: 100%; display: block; }
        a { text-decoration: none; color: inherit; }

        /* Hero */
        .hero {
            background-color: #fff8f4;
            padding: 80px 24px 60px;
            text-align: center;
            border-bottom: 1px solid rgba(110, 91, 69, 0.1);
        }
        .hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2rem, 5vw, 3.5rem);
            font-weight: 500;
            color: #333232;
            margin-bottom: 16px;
            line-height: 1.2;
        }
        .hero p {
            font-size: 1.1rem;
            color: #4d453d;
            max-width: 600px;
            margin: 0 auto;
        }
        .hero-tag {
            display: inline-block;
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.2em;
            color: #6e5b45;
            margin-bottom: 16px;
            padding: 8px 16px;
            border: 1px solid rgba(110, 91, 69, 0.2);
        }

        /* Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* Grid */
        .variations-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 32px;
            padding: 60px 0;
        }
        @media (min-width: 768px) {
            .variations-grid { grid-template-columns: 1fr 1fr; }
        }
        @media (min-width: 1024px) {
            .variations-grid { grid-template-columns: repeat(3, 1fr); }
        }

        /* Card */
        .var-card {
            background: #fff;
            border: 1px solid rgba(110, 91, 69, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
        }
        .var-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.06);
        }
        .var-card-image {
            width: 100%;
            height: 200px;
            background-color: #f3ede9;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #b59e85;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            position: relative;
            overflow: hidden;
        }
        .var-card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .var-card-image .overlay {
            position: absolute;
            inset: 0;
            background: rgba(51, 50, 50, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
        }
        .var-card-body {
            padding: 28px;
        }
        .var-card-body h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.25rem;
            font-weight: 500;
            margin-bottom: 8px;
            color: #333232;
        }
        .var-card-body p {
            font-size: 0.9rem;
            color: #4d453d;
            margin-bottom: 20px;
        }
        .var-meta {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }
        .var-meta span {
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: #6e5b45;
            padding: 4px 10px;
            border: 1px solid rgba(110, 91, 69, 0.15);
        }
        .var-link {
            display: inline-block;
            padding: 12px 24px;
            background-color: #333232;
            color: #FDFBF9;
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            transition: background 0.3s ease;
        }
        .var-link:hover { background-color: #6e5b45; }

        /* Info bar */
        .info-bar {
            background-color: #f3ede9;
            padding: 40px 24px;
            text-align: center;
        }
        .info-bar p {
            font-size: 0.85rem;
            color: #4d453d;
            max-width: 700px;
            margin: 0 auto;
        }

        /* Footer */
        .hub-footer {
            text-align: center;
            padding: 40px 24px;
            font-size: 0.8rem;
            color: #7f756c;
        }
    </style>
</head>
<body>

    <div class="hero">
        <div class="hero-tag">Studio First Floor</div>
        <h1>Kies je design</h1>
        <p>Vijf complete website variaties, elk met een eigen visuele identiteit. Klik op een variatie om hem te bekijken. Alle pagina's zijn volledig functioneel.</p>
    </div>

    <div class="container">
        <div class="variations-grid">

            <a href="v1/" class="var-card">
                <div class="var-card-image">
                    <img src="v1/img/studio-1.jpg" alt="Variatie A preview" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div class="overlay" style="display:none">Variatie A</div>
                </div>
                <div class="var-card-body">
                    <h3>Variatie A — Soft Minimal</h3>
                    <p>Serene, elegant, spa-achtig. Veel witruimte, zachte roze tinten en elegante serif-typografie.</p>
                    <div class="var-meta">
                        <span>Luxe uitstraling</span>
                        <span>Spa-achtig</span>
                    </div>
                    <span class="var-link">Bekijk variatie A</span>
                </div>
            </a>

            <a href="v2/" class="var-card">
                <div class="var-card-image">
                    <img src="v2/img/studio-1.jpg" alt="Variatie B preview" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div class="overlay" style="display:none">Variatie B</div>
                </div>
                <div class="var-card-body">
                    <h3>Variatie B — Bold Editorial</h3>
                    <p>Krachtig, modern, confident. Grote statement headings, split-screen layout en knalroze accenten.</p>
                    <div class="var-meta">
                        <span>Directe impact</span>
                        <span>Modern</span>
                    </div>
                    <span class="var-link">Bekijk variatie B</span>
                </div>
            </a>

            <a href="v3/" class="var-card">
                <div class="var-card-image">
                    <img src="v3/img/studio-1.jpg" alt="Variatie C preview" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div class="overlay" style="display:none">Variatie C</div>
                </div>
                <div class="var-card-body">
                    <h3>Variatie C — Warm Craft</h3>
                    <p>Knus, persoonlijk, artisanal. Warme aardetinten, masonry grid en handwritten accenten.</p>
                    <div class="var-meta">
                        <span>Warme connectie</span>
                        <span>Artisanal</span>
                    </div>
                    <span class="var-link">Bekijk variatie C</span>
                </div>
            </a>

            <a href="v4/" class="var-card">
                <div class="var-card-image">
                    <img src="v4/img/studio-1.jpg" alt="Stitch 1 preview" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div class="overlay" style="display:none">Stitch 1</div>
                </div>
                <div class="var-card-body">
                    <h3>Stitch 1 — Serene Balance</h3>
                    <p>Tactile, editorial, premium wellness. Libre Caslon Text, gallery-aesthetic, serene spa-ervaring.</p>
                    <div class="var-meta">
                        <span>Google Stitch AI</span>
                        <span>Premium</span>
                    </div>
                    <span class="var-link">Bekijk Stitch 1</span>
                </div>
            </a>

            <a href="v5/" class="var-card">
                <div class="var-card-image">
                    <img src="v5/img/studio-1.jpg" alt="Stitch 2 preview" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div class="overlay" style="display:none">Stitch 2</div>
                </div>
                <div class="var-card-body">
                    <h3>Stitch 2 — Serene Strength</h3>
                    <p>Minimalist-chic, high-contrast. Zero rounded corners, hot pink accenten, boutique editorial.</p>
                    <div class="var-meta">
                        <span>Google Stitch AI</span>
                        <span>Sharp geometry</span>
                    </div>
                    <span class="var-link">Bekijk Stitch 2</span>
                </div>
            </a>

        </div>
    </div>

    <div class="info-bar">
        <p>Alle variaties gebruiken dezelfde content: 7 Pilates lessen, exacte tarieven uit de klantinformatie, en dezelfde studiofoto's. Alleen het design verschilt. Klik op een variatie en navigeer door de pagina's (Home, Aanbod, Tarieven, Contact) om ze te vergelijken.</p>
    </div>

    <div class="hub-footer">
        Studio First Floor — Pilates &nbsp;|&nbsp; Design variaties voor review
    </div>

</body>
</html>
