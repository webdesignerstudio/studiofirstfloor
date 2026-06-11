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
        <div class="hero-overlay"></div>
        <div class="container hero-content reveal">
            <p class="section-label" style="color: var(--accent-hot);">Studio First Floor</p>
            <h1>Een moment voor jezelf.</h1>
            <p>Pilates in een knusse, persoonlijke setting. Maximaal 8 personen per les, professionele begeleiding, gratis parkeren, materialen aanwezig en een lounge met gratis koffie en thee.</p>
            <a href="aanbod.php" class="btn">Ontdek het aanbod</a>
        </div>
    </section>

    <!-- Intro -->
    <section>
        <div class="container">
            <div class="section-header reveal">
                <p class="section-label">Over ons</p>
                <h2>Welkom bij Studio First Floor</h2>
                <p>Bij Studio First Floor draait alles om balans — tussen inspanning en ontspanning, tussen kracht en zachtheid. Onze kleine studio is een plek waar je even kunt ontsnappen aan de dagelijkse drukte en volledig kunt focussen op jouw lichaam en geest.</p>
                <p>We werken in kleine groepen zodat elke deelnemer de persoonlijke aandacht krijgt die nodig is. Of je nu komt voor kracht, herstel of simpelweg een moment voor jezelf: bij ons voel je je thuis.</p>
            </div>
        </div>
    </section>

    <!-- Aanbod Teasers -->
    <section class="bg-light">
        <div class="container">
            <div class="section-header reveal">
                <p class="section-label">Aanbod</p>
                <h2>Onze lessen</h2>
                <p>Van basic pilates tot power pilates en personal training — ontdek wat bij jou past.</p>
            </div>
            <div class="card-grid three-col reveal">
                <article class="card">
                    <h3>Basic Pilates</h3>
                    <p>De perfecte start voor beginners. Leer de basisprincipes van Pilates in een rustig tempo.</p>
                </article>
                <article class="card">
                    <h3>Flow Pilates</h3>
                    <p>Vloeiende bewegingen met focus op flexibiliteit, coördinatie en een krachtige core.</p>
                </article>
                <article class="card">
                    <h3>Power Pilates</h3>
                    <p>Intensief, meer weerstand, sneller tempo. Voor wie zijn grenzen wil verleggen.</p>
                </article>
            </div>
            <div style="text-align: center; margin-top: 40px;" class="reveal">
                <a href="aanbod.php" class="btn btn-outline">Bekijk het volledige aanbod</a>
            </div>
        </div>
    </section>

    <!-- Sfeerbeeld / Quote -->
    <section class="quote-section">
        <img src="img/studio-2.jpg" alt="Sfeerbeeld Studio First Floor">
        <div class="quote-overlay reveal">
            <blockquote>"Rust en aandacht in combinatie met kracht en stijl."</blockquote>
        </div>
    </section>

    <!-- CTA -->
    <section class="cta-banner">
        <div class="container reveal">
            <h2>Start vandaag nog</h2>
            <p style="max-width: 520px; margin: 0 auto 32px;">Neem contact met ons op voor een vrijblijvende kennismaking of boek direct je eerste les.</p>
            <a href="contact.php" class="btn">Neem contact op</a>
        </div>
    </section>
</main>

<?php include 'inc/footer.php'; ?>
