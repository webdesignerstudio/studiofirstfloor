<?php
$pageTitle = 'Contact';
$currentPage = 'contact';
include 'inc/header.php';
include 'inc/nav.php';

$success = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $success = true;
}
?>

<main>
    <section style="padding-top: 120px; padding-bottom: 40px;">
        <div class="container">
            <div class="reveal">
                <p class="section-label">We horen graag van je</p>
                <h1 style="text-align: center;">Contact</h1>
                <p class="handwritten" style="text-align: center;">Laten we kennismaken</p>
            </div>
        </div>
    </section>

    <section style="padding-top: 0;">
        <div class="container">
            <div class="contact-grid reveal">
                <div class="contact-info">
                    <p class="section-label">Onze gegevens</p>
                    <h3>Direct contact</h3>
                    
                    <div class="contact-info-block">
                        <strong>E-mail</strong>
                        <p><a href="mailto:info@studiofirstfloor.nl">info@studiofirstfloor.nl</a></p>
                    </div>
                    
                    <div class="contact-info-block">
                        <strong>Telefoon</strong>
                        <p><a href="tel:+31612345678">+31 6 12345678</a></p>
                    </div>
                    
                    <div class="contact-info-block">
                        <strong>Adres</strong>
                        <p>Straatnaam 123<br>1234 AB Plaatsnaam</p>
                    </div>
                    
                    <div class="contact-info-block">
                        <strong>Openingstijden</strong>
                        <p>Maandag t/m vrijdag: 08:00 – 20:00<br>Zaterdag: 09:00 – 13:00</p>
                    </div>

                    <p class="contact-handwritten">"We zien je graag in de studio"</p>
                </div>

                <div class="contact-form-wrapper">
                    <p class="section-label">Stuur een bericht</p>
                    <h3>Contactformulier</h3>

                    <?php if ($success): ?>
                        <div style="background-color: var(--bg-secondary); padding: 24px; margin-bottom: 24px; border-radius: 2px; border-left: 3px solid var(--accent-rose);">
                            <p style="margin: 0; color: var(--text-primary);">Bedankt voor je bericht! We nemen zo snel mogelijk contact met je op.</p>
                        </div>
                    <?php endif; ?>

                    <form class="contact-form" action="contact.php" method="POST">
                        <label for="name">Naam</label>
                        <input type="text" id="name" name="name" placeholder="Hoe heet je?" required>

                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" placeholder="jouw@email.nl" required>

                        <label for="subject">Onderwerp</label>
                        <input type="text" id="subject" name="subject" placeholder="Waar gaat je bericht over?" required>

                        <label for="message">Bericht</label>
                        <textarea id="message" name="message" placeholder="Schrijf hier je bericht..." required></textarea>

                        <button type="submit" class="btn">Verstuur bericht</button>
                    </form>
                </div>
            </div>

            <div class="map-placeholder reveal">
                <p>[Google Maps locatie van de studio]</p>
            </div>
        </div>
    </section>
</main>

<?php include 'inc/footer.php'; ?>
