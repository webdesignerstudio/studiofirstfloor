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
            <img src="img/hero.png" alt="Studio First Floor">
        </div>
        <div class="hero-content reveal">
            <h1>Kracht, Rust <br>& Stijl</h1>
            <p>Ontdek jouw moment voor jezelf in onze knusse studio. Maximaal 8 personen per les, gratis parkeren, materialen aanwezig en een lounge met gratis koffie en thee.</p>
            <a href="contact.php" class="btn-hot">BOEK EEN GRATIS PROEFLES</a>
        </div>
    </section>

    <!-- Intro Split -->
    <section>
        <div class="container">
            <div class="intro-grid reveal">
                <div class="intro-image">
                    <div class="image-bg"></div>
                    <img src="img/studio-3.jpg" alt="Pilates apparatuur">
                </div>
                <div class="intro-content">
                    <div class="section-tag" style="justify-content: flex-start;">
                        <div class="line"></div>
                        <span>ONZE MISSIE</span>
                    </div>
                    <h2>Persoonlijke aandacht</h2>
                    <p>Studio First Floor is jouw private sanctuary voor Pilates. We combineren de zachtheid van een high-end spa met de gedisciplineerde precisie van een professionele studio.</p>
                    <p>Maximaal 8 personen per les. Professionele begeleiding, gratis parkeren, materialen aanwezig en een lounge met gratis koffie en thee.</p>
                    <a href="aanbod.php" class="intro-link">
                        ONTDEK ONZE STUDIO <span>&rarr;</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Bento Services -->
    <section class="bento-section">
        <div class="container">
            <div class="section-header reveal">
                <div class="section-tag">
                    <div class="line"></div>
                    <span>DIENSTEN</span>
                    <div class="line"></div>
                </div>
                <h2>Pilates</h2>
                <p style="max-width: 600px; margin: 0 auto;">Gerichte training voor lichaam en geest, in een setting die rust uitstraalt.</p>
            </div>
            <div class="bento-grid reveal">
                <div class="bento-card">
                    <div class="icon-box">&#9733;</div>
                    <h3>Basic Pilates</h3>
                    <p>De perfecte start voor beginners. Basisprincipes in een rustig tempo voor alle niveaus.</p>
                    <a href="aanbod.php" class="card-link">LEES MEER <span>&rarr;</span></a>
                </div>
                <div class="bento-card">
                    <div class="icon-box">&#9679;</div>
                    <h3>Flow Pilates</h3>
                    <p>Vloeiende bewegingen met focus op flexibiliteit, coördinatie en een krachtige core.</p>
                    <a href="aanbod.php" class="card-link">LEES MEER <span>&rarr;</span></a>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Box -->
    <section>
        <div class="container">
            <div class="cta-box reveal">
                <div class="shape-1"></div>
                <div class="shape-2"></div>
                <div class="cta-box-inner">
                    <span class="label-caps tag">KLEINE GROEPEN &mdash; BEGINNERS WELKOM</span>
                    <h2>Begin Jouw Reis Vandaag</h2>
                    <p>Ervaar de rust en de kracht van Studio First Floor zelf. Kom gratis kennismaken tijdens een proefles.</p>
                    <a href="contact.php" class="btn-hot" style="padding: 20px 40px;">PLAN JE GRATIS PROEFLES</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'inc/footer.php'; ?>
