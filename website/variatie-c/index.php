<?php
$pageTitle = 'Home';
$currentPage = 'home';
include 'inc/header.php';
include 'inc/nav.php';
?>

<main>
    <section class="hero">
        <div class="hero-images">
            <img src="img/studio-1.jpg" alt="">
            <img src="img/studio-2.jpg" alt="">
        </div>
        <div class="hero-content reveal">
            <p class="hero-welcome">Welkom bij Studio First Floor</p>
            <h1>Een moment voor jezelf</h1>
            <p>Pilates in een knusse, persoonlijke setting. Maximaal 8 personen per les, professionele begeleiding, gratis parkeren, materialen aanwezig en een lounge met gratis koffie en thee.</p>
            <a href="aanbod.php" class="btn">Ontdek ons aanbod</a>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="section-header reveal">
                <p class="section-label">Over ons</p>
                <h2>Welkom in onze studio</h2>
                <p class="handwritten">Waar rust en aandacht samenkomen</p>
            </div>
            <div style="max-width: 700px; margin: 0 auto; text-align: center;" class="reveal">
                <p>Bij Studio First Floor draait alles om balans — tussen inspanning en ontspanning, tussen kracht en zachtheid. Onze kleine studio is een plek waar je even kunt ontsnappen aan de dagelijkse drukte en volledig kunt focussen op jouw lichaam en geest.</p>
                <p>We werken bewust in kleine groepen zodat elke deelnemer de persoonlijke aandacht krijgt die nodig is. Of je nu komt voor kracht, herstel of simpelweg een moment voor jezelf: bij ons voel je je thuis.</p>
            </div>
        </div>
    </section>

    <section class="bg-secondary">
        <div class="container">
            <div class="section-header reveal">
                <p class="section-label">Aanbod</p>
                <h2>Onze lessen</h2>
                <p class="handwritten">Ontdek wat bij jou past</p>
            </div>
            <div class="card-grid masonry reveal">
                <article class="card">
                    <h3>Basic Pilates</h3>
                    <p>De perfecte start voor beginners. Leer de basisprincipes van Pilates met oefeningen die je core versterken en je lichaam in balans brengen.</p>
                    <p style="margin-top: 16px; font-style: italic; color: var(--accent-terracotta);">Alle niveaus welkom</p>
                </article>
                <article class="card">
                    <h3>Flow Pilates</h3>
                    <p>Een vloeiende les waarbij bewegingen naadloos in elkaar overgaan. Focust op flexibiliteit, coördinatie en een krachtige core.</p>
                </article>
                <article class="card">
                    <h3>Power Pilates</h3>
                    <p>Een intensieve les voor wie zijn grenzen wil verleggen. Sneller tempo, meer weerstand, maximaal resultaat.</p>
                    <p style="margin-top: 16px; font-style: italic; color: var(--accent-terracotta);">Voor de echte doorzetters</p>
                </article>
            </div>
            <div style="text-align: center; margin-top: 40px;" class="reveal">
                <a href="aanbod.php" class="btn btn-outline">Bekijk het volledige aanbod</a>
            </div>
        </div>
    </section>

    <section class="quote-section">
        <img src="img/studio-3.jpg" alt="Sfeerbeeld">
        <div class="quote-overlay reveal">
            <blockquote>"Rust en aandacht in combinatie met kracht en stijl"</blockquote>
            <p class="quote-author">— Dat is Studio First Floor</p>
        </div>
    </section>

    <section class="cta-section">
        <div class="container cta-content reveal">
            <p class="section-label">Begin vandaag</p>
            <h2>Klaar om te starten?</h2>
            <p class="cta-handwritten">We verwelkomen je graag in de studio</p>
            <a href="contact.php" class="btn">Neem contact op</a>
        </div>
    </section>
</main>

<?php include 'inc/footer.php'; ?>
