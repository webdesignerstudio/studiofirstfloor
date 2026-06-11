<?php
$pageTitle = 'Tarieven';
$currentPage = 'tarieven';
include 'inc/header.php';
include 'inc/nav.php';
?>

<main>
    <section style="padding-top: 120px; padding-bottom: 40px;">
        <div class="container">
            <div class="reveal">
                <p class="section-label">Investeer in jezelf</p>
                <h1 style="text-align: center;">Tarieven</h1>
                <p class="handwritten" style="text-align: center;">Transparante prijzen, zonder verrassingen</p>
            </div>
        </div>
    </section>

    <section style="padding-top: 0;">
        <div class="container">
            <div class="pricing-grid reveal">
                <div class="pricing-card featured">
                    <h3>1× per week</h3>
                    <p class="price">€49,99<span> / maand</span></p>
                    <p class="price-desc">1 groepsles per week. Maandelijks opzegbaar.</p>
                    <a href="contact.php" class="btn">Boeken</a>
                </div>
                <div class="pricing-card featured">
                    <h3>2× per week</h3>
                    <p class="price">€89,99<span> / maand</span></p>
                    <p class="price-desc">2 groepslessen per week. Maandelijks opzegbaar.</p>
                    <a href="contact.php" class="btn">Boeken</a>
                </div>
            </div>

            <div style="margin-top: 60px;" class="reveal">
                <div class="section-header" style="margin-bottom: 40px;">
                    <p class="section-label">Flexibel</p>
                    <h2>Zonder abonnement</h2>
                </div>
                <div class="pricing-grid">
                    <div class="pricing-card">
                        <h3>Try out</h3>
                        <p class="price">€29,99</p>
                        <p class="price-desc">3 proeflessen. 1 maand geldig.</p>
                        <a href="contact.php" class="btn btn-outline">Boeken</a>
                    </div>
                    <div class="pricing-card">
                        <h3>10 rittenkaart</h3>
                        <p class="price">€119,99</p>
                        <p class="price-desc">10 lessen. 3 maanden geldig.</p>
                        <a href="contact.php" class="btn btn-outline">Boeken</a>
                    </div>
                    <div class="pricing-card">
                        <h3>Losse les</h3>
                        <p class="price">€14,50</p>
                        <p class="price-desc">Eenmalige deelname aan een groepsles.</p>
                        <a href="contact.php" class="btn btn-outline">Boeken</a>
                    </div>
                </div>
            </div>

            <div style="margin-top: 60px;" class="reveal">
                <div class="section-header" style="margin-bottom: 40px;">
                    <p class="section-label">Persoonlijk</p>
                    <h2>Op aanvraag</h2>
                </div>
                <div class="pricing-grid" style="grid-template-columns: repeat(2, 1fr); max-width: 700px; margin: 0 auto;">
                    <div class="pricing-card">
                        <h3>Personal Pilates</h3>
                        <p class="price">Op aanvraag</p>
                        <p class="price-desc">1-op-1 sessie, volledig afgestemd op jouw doelen.</p>
                        <a href="contact.php" class="btn btn-outline">Afspraak maken</a>
                    </div>
                    <div class="pricing-card featured">
                        <h3>Duo Pilates</h3>
                        <p class="price">Op aanvraag</p>
                        <p class="price-desc">2 personen. Gezelligheid én gerichte aandacht.</p>
                        <a href="contact.php" class="btn">Afspraak maken</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section style="padding-top: 60px;">
        <div class="container">
            <div class="reveal" style="max-width: 700px; margin: 0 auto; text-align: center;">
                <p class="section-label">Goed om te weten</p>
                <p style="font-size: 0.9rem; color: var(--text-muted);">
                    Strippenkaarten zijn 3 maanden geldig vanaf aankoopdatum. Maandabonnementen zijn maandelijks opzegbaar met een opzegtermijn van 1 maand. 
                    Afspraken kunnen tot 24 uur van tevoren kosteloos worden verplaatst. Bij no-show wordt de les of sessie in rekening gebracht. Alle prijzen zijn inclusief btw.
                </p>
            </div>
        </div>
    </section>
</main>

<?php include 'inc/footer.php'; ?>
