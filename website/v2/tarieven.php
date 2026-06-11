<?php
$pageTitle = 'Tarieven';
$currentPage = 'tarieven';
include 'inc/header.php';
include 'inc/nav.php';
?>

<main>
    <section style="padding-top: 100px; padding-bottom: 40px;">
        <div class="container">
            <div class="reveal">
                <span class="section-number">01 / TARIEVEN</span>
                <h1>Investeer in jezelf</h1>
                <p style="max-width: 600px;">Transparante prijzen zonder verrassingen. Kies de vorm die bij jou past.</p>
            </div>
        </div>
    </section>

    <section style="padding-top: 0;">
        <div class="container">
            <div class="pricing-grid reveal">
                <div class="pricing-card featured">
                    <h3>1× PER WEEK</h3>
                    <p class="price">€49,99<span> / maand</span></p>
                    <p class="price-desc">1 groepsles per week. Maandelijks opzegbaar.</p>
                    <a href="contact.php" class="btn">BOEKEN</a>
                </div>
                <div class="pricing-card featured">
                    <h3>2× PER WEEK</h3>
                    <p class="price">€89,99<span> / maand</span></p>
                    <p class="price-desc">2 groepslessen per week. Maandelijks opzegbaar.</p>
                    <a href="contact.php" class="btn">BOEKEN</a>
                </div>
            </div>

            <div style="margin-top: 60px;" class="reveal">
                <div class="section-header">
                    <span class="section-number">02 / ZONDER ABONNEMENT</span>
                    <h2>Flexibele opties</h2>
                </div>
                <div class="pricing-grid">
                    <div class="pricing-card">
                        <h3>TRY OUT</h3>
                        <p class="price">€29,99</p>
                        <p class="price-desc">3 proeflessen. 1 maand geldig.</p>
                        <a href="contact.php" class="btn btn-outline">BOEKEN</a>
                    </div>
                    <div class="pricing-card featured">
                        <h3>10 RITTENKAART</h3>
                        <p class="price">€119,99</p>
                        <p class="price-desc">10 lessen. 3 maanden geldig.</p>
                        <a href="contact.php" class="btn">BOEKEN</a>
                    </div>
                    <div class="pricing-card">
                        <h3>LOSSE LES</h3>
                        <p class="price">€14,50</p>
                        <p class="price-desc">Eenmalige deelname aan een groepsles.</p>
                        <a href="contact.php" class="btn btn-outline">BOEKEN</a>
                    </div>
                </div>
            </div>

            <div style="margin-top: 60px;" class="reveal">
                <div class="section-header">
                    <span class="section-number">03 / OP AANVRAAG</span>
                    <h2>Persoonlijke training</h2>
                </div>
                <div class="pricing-grid" style="grid-template-columns: repeat(2, 1fr); max-width: 700px; margin: 0 auto;">
                    <div class="pricing-card">
                        <h3>PERSONAL PILATES</h3>
                        <p class="price">Op aanvraag</p>
                        <p class="price-desc">1-op-1 sessie, volledig afgestemd op jouw doelen.</p>
                        <a href="contact.php" class="btn btn-outline">AFSPRAAK MAKEN</a>
                    </div>
                    <div class="pricing-card featured">
                        <h3>DUO PILATES</h3>
                        <p class="price">Op aanvraag</p>
                        <p class="price-desc">2 personen. De ideale combinatie van gezelligheid en aandacht.</p>
                        <a href="contact.php" class="btn">AFSPRAAK MAKEN</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section style="padding-top: 60px;">
        <div class="container">
            <div class="reveal" style="max-width: 700px; margin: 0 auto; text-align: center;">
                <span class="section-number">03 / VOORWAARDEN</span>
                <p style="font-size: 0.9rem; color: var(--text-muted);">
                    Strippenkaarten zijn 3 maanden geldig vanaf aankoopdatum. Maandabonnementen zijn maandelijks opzegbaar met een opzegtermijn van 1 maand. Afspraken kunnen tot 24 uur van tevoren kosteloos worden verplaatst. Bij no-show wordt de les of sessie in rekening gebracht. Alle prijzen zijn inclusief btw.
                </p>
            </div>
        </div>
    </section>
</main>

<?php include 'inc/footer.php'; ?>
