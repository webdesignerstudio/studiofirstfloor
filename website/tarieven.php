<?php
$pageTitle = 'Tarieven';
$currentPage = 'tarieven';
include 'inc/header.php';
include 'inc/nav.php';
?>

<main>
    <!-- Page Header -->
    <section style="padding-top: 120px; padding-bottom: 40px;">
        <div class="container">
            <div class="reveal">
                <p class="section-label">Investeer in jezelf</p>
                <h1>Tarieven</h1>
                <p style="max-width: 640px;">Transparante prijzen zonder verrassingen. Kies de vorm die bij jou past — van een enkele les tot een volledig traject.</p>
            </div>
        </div>
    </section>

    <!-- Pricing Cards -->
    <section style="padding-top: 0;">
        <div class="container">
            <div class="pricing-grid reveal">
                <div class="pricing-card featured">
                    <h3>1× per week</h3>
                    <div class="price">€49,99<span> / maand</span></div>
                    <p class="price-desc">1 groepsles per week. Maandelijks opzegbaar.</p>
                    <a href="contact.php" class="btn">Boeken</a>
                </div>
                <div class="pricing-card featured">
                    <h3>2× per week</h3>
                    <div class="price">€89,99<span> / maand</span></div>
                    <p class="price-desc">2 groepslessen per week. Maandelijks opzegbaar.</p>
                    <a href="contact.php" class="btn">Boeken</a>
                </div>
            </div>

            <div style="margin-top: 64px;" class="reveal">
                <h3 style="text-align: center; margin-bottom: 32px;">Zonder abonnement</h3>
                <div class="pricing-grid">
                    <div class="pricing-card">
                        <h3>Try out</h3>
                        <div class="price">€29,99</div>
                        <p class="price-desc">3 proeflessen. 1 maand geldig.</p>
                        <a href="contact.php" class="btn btn-outline">Boeken</a>
                    </div>
                    <div class="pricing-card">
                        <h3>10 rittenkaart</h3>
                        <div class="price">€119,99</div>
                        <p class="price-desc">10 lessen. 3 maanden geldig.</p>
                        <a href="contact.php" class="btn btn-outline">Boeken</a>
                    </div>
                    <div class="pricing-card">
                        <h3>Losse les</h3>
                        <div class="price">€14,50</div>
                        <p class="price-desc">Eenmalige deelname aan een groepsles.</p>
                        <a href="contact.php" class="btn btn-outline">Boeken</a>
                    </div>
                </div>
            </div>

            <div style="margin-top: 64px;" class="reveal">
                <h3 style="text-align: center; margin-bottom: 32px;">Op aanvraag</h3>
                <div class="pricing-grid" style="grid-template-columns: repeat(2, 1fr); max-width: 700px; margin: 0 auto;">
                    <div class="pricing-card">
                        <h3>Personal Pilates</h3>
                        <div class="price">Op aanvraag</div>
                        <p class="price-desc">1-op-1 sessie, volledig afgestemd op jouw doelen.</p>
                        <a href="contact.php" class="btn btn-outline">Afspraak maken</a>
                    </div>
                    <div class="pricing-card featured">
                        <h3>Duo Pilates</h3>
                        <div class="price">Op aanvraag</div>
                        <p class="price-desc">2 personen. Gezelligheid én gerichte aandacht.</p>
                        <a href="contact.php" class="btn">Afspraak maken</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Voorwaarden -->
    <section class="bg-light">
        <div class="container">
            <div class="reveal" style="max-width: 700px; margin: 0 auto;">
                <h3 style="text-align: center; margin-bottom: 24px;">Voorwaarden</h3>
                <ul style="list-style: none; line-height: 2; color: var(--text-secondary);">
                    <li style="padding-left: 24px; position: relative;"><span style="position: absolute; left: 0; color: var(--accent-hot);">&bull;</span> Strippenkaarten zijn 3 maanden geldig vanaf aankoopdatum.</li>
                    <li style="padding-left: 24px; position: relative;"><span style="position: absolute; left: 0; color: var(--accent-hot);">&bull;</span> Maandabonnementen lopen maandelijks opzegbaar met een opzegtermijn van 1 maand.</li>
                    <li style="padding-left: 24px; position: relative;"><span style="position: absolute; left: 0; color: var(--accent-hot);">&bull;</span> Afspraken voor coaching kunnen tot 24 uur van tevoren kosteloos worden verplaatst.</li>
                    <li style="padding-left: 24px; position: relative;"><span style="position: absolute; left: 0; color: var(--accent-hot);">&bull;</span> Bij no-show wordt de les of sessie in rekening gebracht.</li>
                    <li style="padding-left: 24px; position: relative;"><span style="position: absolute; left: 0; color: var(--accent-hot);">&bull;</span> Alle prijzen zijn inclusief btw.</li>
                </ul>
            </div>
        </div>
    </section>
</main>

<?php include 'inc/footer.php'; ?>
