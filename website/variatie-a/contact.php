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
    <section style="padding-top: 150px; padding-bottom: 60px;">
        <div class="container">
            <div class="reveal">
                <p class="section-label">We horen graag van je</p>
                <h1 style="text-align: center;">Contact</h1>
            </div>
        </div>
    </section>

    <section style="padding-top: 0;">
        <div class="container">
            <div class="contact-grid reveal">
                <div class="contact-info">
                    <h3>Direct contact</h3>
                    <p>
                        <strong>E-mail</strong><br>
                        <a href="mailto:info@studiofirstfloor.nl">info@studiofirstfloor.nl</a>
                    </p>
                    <p>
                        <strong>Telefoon</strong><br>
                        <a href="tel:+31612345678">+31 6 12345678</a>
                    </p>
                    <p>
                        <strong>Adres</strong><br>
                        Straatnaam 123<br>
                        1234 AB Plaatsnaam
                    </p>
                    <p>
                        <strong>Openingstijden</strong><br>
                        Maandag t/m vrijdag: 08:00 – 20:00<br>
                        Zaterdag: 09:00 – 13:00
                    </p>
                </div>

                <div>
                    <?php if ($success): ?>
                        <div style="background-color: var(--bg-secondary); padding: 30px; margin-bottom: 30px;">
                            <p style="margin: 0; color: var(--text-primary);">Bedankt voor je bericht! We nemen zo snel mogelijk contact met je op.</p>
                        </div>
                    <?php endif; ?>

                    <form class="contact-form" action="contact.php" method="POST">
                        <label for="name">Naam</label>
                        <input type="text" id="name" name="name" placeholder="Jouw naam" required>

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
                <p>[Google Maps locatie komt hier]</p>
            </div>
        </div>
    </section>
</main>

<?php include 'inc/footer.php'; ?>
