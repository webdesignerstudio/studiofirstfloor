<?php
$pageTitle = 'Home';
$currentPage = 'home';
include 'inc/header.php';
include 'inc/nav.php';
?>

<main>
    <!-- Hero -->
    <section class="hero">
        <div class="hero-bg">
            <img src="img/studio-1.jpg" alt="Studio First Floor interieur">
        </div>
        <div class="hero-content reveal">
            <h1>Bouw kracht op vanuit rust</h1>
            <p class="label-caps hero-subtitle">Pilates Studio — Max 8 per les</p>
            <a href="contact.php" class="btn-primary">BOEK GRATIS PROEFLES</a>
        </div>
    </section>

    <!-- Philosophy Quote -->
    <section class="quote-section">
        <div class="container reveal">
            <div class="quote-line"></div>
            <blockquote>"Balans is niet iets dat je vindt, het is iets dat je creëert."</blockquote>
            <div class="quote-line"></div>
        </div>
    </section>

    <!-- About / Bento -->
    <section id="about">
        <div class="container">
            <div class="bento-grid reveal">
                <div class="bento-image">
                    <img src="img/studio-2.jpg" alt="Pilates in de studio">
                </div>
                <div class="bento-content">
                    <span class="section-label">OVER STUDIO FIRST FLOOR</span>
                    <h2>Een luxe oase</h2>
                    <p style="font-size: 1.1rem;">Bij Studio First Floor bieden we een exclusieve plek voor wie op zoek is naar meer dan alleen een workout. Wij geloven in de synergie tussen fysieke kracht en mentale rust.</p>
                    <p>Maximaal 8 personen per les. Professionele begeleiding, gratis parkeren, materialen aanwezig en een lounge met gratis koffie en thee.</p>
                    <div style="margin-top: 24px;">
                        <a href="aanbod.php" class="label-caps" style="color: var(--deep-taupe); display: inline-flex; align-items: center; gap: 8px;">
                            ONTDEK ONZE METHODE <span style="transition: transform 0.3s;">&rarr;</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services -->
    <section class="services-section">
        <div class="container">
            <div style="display: flex; flex-wrap: wrap; justify-content: space-between; align-items: baseline; margin-bottom: 80px;" class="reveal">
                <h2>Onze Specialisaties</h2>
                <span class="label-caps" style="color: var(--primary);">KWALITEIT BOVEN KWANTITEIT</span>
            </div>
            <div class="services-grid reveal">
                <div class="service-card">
                    <div class="service-icon">&#9675;</div>
                    <h4>Basic Pilates</h4>
                    <p>De perfecte start voor beginners. Basisprincipes in een rustig tempo voor alle niveaus.</p>
                    <a href="aanbod.php" class="btn-outline">BEKIJK LESSEN</a>
                </div>
                <div class="service-card">
                    <div class="service-icon">&#9733;</div>
                    <h4>Flow Pilates</h4>
                    <p>Vloeiende bewegingen met focus op flexibiliteit, coördinatie en een krachtige core.</p>
                    <a href="aanbod.php" class="btn-outline">BEKIJK LESSEN</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Schedule -->
    <section>
        <div class="container">
            <h2 class="section-title reveal">Rooster Hoogtepunten</h2>
            <div class="schedule-list reveal">
                <div class="schedule-row">
                    <div>
                        <span class="label-caps schedule-day">MAANDAG</span>
                        <span style="display: block; margin-top: 4px; font-size: 1.1rem;">Reformer Flow</span>
                    </div>
                    <span class="label-caps">09:00 - 10:00</span>
                </div>
                <div class="schedule-row">
                    <div>
                        <span class="label-caps schedule-day">DINSDAG</span>
                        <span style="display: block; margin-top: 4px; font-size: 1.1rem;">Restorative Pilates</span>
                    </div>
                    <span class="label-caps">19:30 - 20:30</span>
                </div>
                <div class="schedule-row">
                    <div>
                        <span class="label-caps schedule-day">DONDERDAG</span>
                        <span style="display: block; margin-top: 4px; font-size: 1.1rem;">Mindful Movement</span>
                    </div>
                    <span class="label-caps">10:15 - 11:15</span>
                </div>
                <div class="schedule-row">
                    <div>
                        <span class="label-caps schedule-day">ZATERDAG</span>
                        <span style="display: block; margin-top: 4px; font-size: 1.1rem;">Weekend Energy Session</span>
                    </div>
                    <span class="label-caps">09:00 - 10:15</span>
                </div>
            </div>
            <div style="text-align: center; margin-top: 48px;" class="reveal">
                <a href="aanbod.php" class="btn-primary">VOLLEDIG ROOSTER</a>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="cta-section">
        <div class="cta-bg">
            <img src="img/studio-3.jpg" alt="Studio sfeerbeeld">
        </div>
        <div class="cta-content reveal">
            <h2>Klaar om te beginnen?</h2>
            <p>Ervaar de rust en expertise van Studio First Floor zelf. Boek vandaag nog je eerste gratis kennismaking of proefles.</p>
            <a href="contact.php" class="btn-primary" style="padding: 18px 48px;">RESERVEER GRATIS PROEFLES</a>
        </div>
    </section>
</main>

<?php include 'inc/footer.php'; ?>
