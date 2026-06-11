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
    <section style="padding-top: 100px; padding-bottom: 40px;">
        <div class="container">
            <div class="reveal">
                <span class="section-number">01 / CONTACT</span>
                <h1>We horen graag<br>van je</h1>
                <p style="max-width: 600px;">Heb je een vraag, wil je een proefles boeken of gewoon even kennismaken? Stuur ons een bericht.</p>
            </div>
        </div>
    </section>

    <section class="contact-section" style="padding-top: 0;">
        <div class="contact-info reveal">
            <span class="section-number">02 / GEGEVENS</span>
            <h3>Direct contact</h3>
            <p>
                <strong>E-MAIL</strong>
                <a href="mailto:info@studiofirstfloor.nl">info@studiofirstfloor.nl</a>
            </p>
            <p>
                <strong>TELEFOON</strong>
                <a href="tel:+31612345678">+31 6 12345678</a>
            </p>
            <p>
                <strong>ADRES</strong>
                Straatnaam 123<br>
                1234 AB Plaatsnaam
            </p>
            <p>
                <strong>OPENINGSTIJDEN</strong>
                Maandag t/m vrijdag: 08:00 – 20:00<br>
                Zaterdag: 09:00 – 13:00
            </p>
        </div>

        <div class="contact-form-wrapper reveal">
            <span class="section-number">03 / FORMULIER</span>
            <h3>Stuur een bericht</h3>

            <?php if ($success): ?>
                <div style="background-color: var(--bg-secondary); padding: 24px; margin-bottom: 24px; border-left: 4px solid var(--accent);">
                    <p style="margin: 0; color: var(--text-primary);">Bedankt voor je bericht! We nemen zo snel mogelijk contact met je op.</p>
                </div>
            <?php endif; ?>

            <form class="contact-form" action="contact.php" method="POST">
                <label for="name">NAAM</label>
                <input type="text" id="name" name="name" required>

                <label for="email">E-MAIL</label>
                <input type="email" id="email" name="email" required>

                <label for="subject">ONDERWERP</label>
                <input type="text" id="subject" name="subject" required>

                <label for="message">BERICHT</label>
                <textarea id="message" name="message" required></textarea>

                <button type="submit" class="btn">VERSTUUR BERICHT</button>
            </form>
        </div>
    </section>
</main>

<?php include 'inc/footer.php'; ?>
