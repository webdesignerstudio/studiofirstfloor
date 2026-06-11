<?php
$pageTitle = 'Home';
$currentPage = 'home';
include 'inc/header.php';
include 'inc/nav.php';
?>

<main>
    <section class="hero">
        <div class="hero-content reveal">
            <span class="section-number">01 / WELKOM</span>
            <h1>Een moment<br>voor jezelf</h1>
            <p>Pilates in een knusse, persoonlijke setting. Maximaal 8 personen per les, professionele begeleiding, gratis parkeren en een lounge met koffie en thee.</p>
            <a href="aanbod.php" class="btn">ONTDEK HET AANBOD</a>
        </div>
        <div class="hero-image">
            <img src="img/studio-1.jpg" alt="Studio First Floor">
        </div>
    </section>

    <section>
        <div class="container">
            <div class="section-header reveal">
                <span class="section-number">02 / OVER ONS</span>
                <h2>Welkom bij<br>Studio First Floor</h2>
            </div>
            <div style="max-width: 700px; margin: 0 auto;" class="reveal">
                <p style="font-size: 1.1rem;">Bij Studio First Floor draait alles om balans — tussen inspanning en ontspanning, tussen kracht en zachtheid. Onze kleine studio is een plek waar je even kunt ontsnappen aan de dagelijkse drukte.</p>
                <p>We werken bewust in kleine groepen zodat elke deelnemer de persoonlijke aandacht krijgt die nodig is. Of je nu komt voor kracht, herstel of simpelweg een moment voor jezelf: bij ons voel je je thuis.</p>
            </div>
        </div>
    </section>

    <section class="bg-secondary">
        <div class="container">
            <div class="section-header reveal">
                <span class="section-number">03 / AANBOD</span>
                <h2>Onze lessen</h2>
            </div>
            <div class="pricing-grid reveal">
                <div class="pricing-card">
                    <h3>BASIC PILATES</h3>
                    <p class="price">€14,50<span> / les</span></p>
                    <p class="price-desc">De perfecte start. Basisprincipes in een rustig tempo voor alle niveaus.</p>
                    <a href="aanbod.php" class="btn btn-outline">MEER INFO</a>
                </div>
                <div class="pricing-card featured">
                    <h3>FLOW PILATES</h3>
                    <p class="price">€14,50<span> / les</span></p>
                    <p class="price-desc">Vloeiende bewegingen met focus op flexibiliteit en coördinatie.</p>
                    <a href="aanbod.php" class="btn">MEER INFO</a>
                </div>
                <div class="pricing-card">
                    <h3>POWER PILATES</h3>
                    <p class="price">€14,50<span> / les</span></p>
                    <p class="price-desc">Intensief, meer weerstand, sneller tempo. Voor wie zijn grenzen wil verleggen.</p>
                    <a href="aanbod.php" class="btn btn-outline">MEER INFO</a>
                </div>
            </div>
        </div>
    </section>

    <section class="quote-section">
        <img src="img/studio-2.jpg" alt="Sfeerbeeld">
        <div class="quote-overlay reveal">
            <blockquote>KRACHT. RUST.<br>AANDACHT.</blockquote>
        </div>
    </section>

    <section class="cta-section">
        <div class="container reveal">
            <h2>Start vandaag</h2>
            <p>Neem contact met ons op voor een vrijblijvende kennismaking.</p>
            <a href="contact.php" class="btn">NEEM CONTACT OP</a>
        </div>
    </section>
</main>

<?php include 'inc/footer.php'; ?>
