<?php
$pageTitle = 'Tarieven';
$pageDescription = 'Transparante tarieven bij Studio First Floor. Abonnementen vanaf €49,99/maand, strippenkaarten en losse lessen. Proefles gratis.';
$currentPage = 'tarieven';
include 'inc/header.php';
include 'inc/nav.php';
?>

<main>
    <section style="padding-top: 120px; padding-bottom: 40px;">
        <div class="container">
            <div class="reveal">
                <div class="section-tag" style="justify-content: flex-start;">
                    <div class="line"></div>
                    <span>TARIEVEN</span>
                </div>
                <h1>Investeer in jezelf</h1>
                <p style="max-width: 600px;">Transparante prijzen zonder verrassingen. Kies de vorm die bij jou past.</p>
            </div>
        </div>
    </section>

    <section style="padding-top: 0;">
        <div class="container">
            <div class="pricing-grid pricing-grid-center reveal">
                <div class="pricing-card featured">
                    <h3>1× per week</h3>
                    <p class="price">€49,99<span> / maand</span></p>
                    <p class="price-desc">1 groepsles per week. Maandelijks opzegbaar.</p>
                    <a href="contact.php" class="btn-hot">BOEKEN</a>
                </div>
                <div class="pricing-card featured">
                    <h3>2× per week</h3>
                    <p class="price">€89,99<span> / maand</span></p>
                    <p class="price-desc">2 groepslessen per week. Maandelijks opzegbaar.</p>
                    <a href="contact.php" class="btn-hot">BOEKEN</a>
                </div>
            </div>

            <div style="margin-top: 60px;" class="reveal">
                <div class="section-header" style="margin-bottom: 40px;">
                    <div class="section-tag">
                        <div class="line"></div>
                        <span>ZONDER ABONNEMENT</span>
                        <div class="line"></div>
                    </div>
                    <h2>Flexibele opties</h2>
                </div>
                <div class="pricing-grid">
                    <div class="pricing-card">
                        <h3>Try out</h3>
                        <p class="price">€29,99</p>
                        <p class="price-desc">3 proeflessen. 1 maand geldig.</p>
                        <a href="contact.php" class="btn-outline">BOEKEN</a>
                    </div>
                    <div class="pricing-card">
                        <h3>10 rittenkaart</h3>
                        <p class="price">€119,99</p>
                        <p class="price-desc">10 lessen. 3 maanden geldig.</p>
                        <a href="contact.php" class="btn-outline">BOEKEN</a>
                    </div>
                    <div class="pricing-card">
                        <h3>Losse les</h3>
                        <p class="price">€14,50</p>
                        <p class="price-desc">Eenmalige deelname aan een groepsles.</p>
                        <a href="contact.php" class="btn-outline">BOEKEN</a>
                    </div>
                </div>
            </div>

            <div style="margin-top: 60px;" class="reveal">
                <div class="section-header" style="margin-bottom: 40px;">
                    <div class="section-tag">
                        <div class="line"></div>
                        <span>OP AANVRAAG</span>
                        <div class="line"></div>
                    </div>
                    <h2>Persoonlijke training</h2>
                </div>
                <div class="pricing-grid pricing-grid-center-2">
                    <div class="pricing-card">
                        <h3>Personal Pilates</h3>
                        <p class="price">Op aanvraag</p>
                        <p class="price-desc">1-op-1 sessie, volledig afgestemd op jouw doelen.</p>
                        <a href="contact.php" class="btn-outline">AFSPRAAK MAKEN</a>
                    </div>
                    <div class="pricing-card featured">
                        <h3>Duo Pilates</h3>
                        <p class="price">Op aanvraag</p>
                        <p class="price-desc">2 personen. Gezelligheid én gerichte aandacht.</p>
                        <a href="contact.php" class="btn-hot">AFSPRAAK MAKEN</a>
                    </div>
                </div>
            </div>

            <div style="max-width: 700px; margin: 80px auto 0; text-align: center;" class="reveal">
                <span class="label-caps" style="color: var(--taupe-brown); margin-bottom: 16px; display: block;">VOORWAARDEN</span>
                <p style="font-size: 0.9rem; color: var(--on-surface-variant);">
                    Strippenkaarten zijn 3 maanden geldig vanaf aankoopdatum. Maandabonnementen zijn maandelijks opzegbaar met een opzegtermijn van 1 maand.
                    Afspraken kunnen tot 24 uur van tevoren kosteloos worden verplaatst. Bij no-show wordt de les of sessie in rekening gebracht. Alle prijzen zijn inclusief btw.
                </p>
            </div>
        </div>
    </section>
</main>

<?php include 'inc/footer.php'; ?>
