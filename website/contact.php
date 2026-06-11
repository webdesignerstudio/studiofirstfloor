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
    <!-- Page Header -->
    <section style="padding-top: 120px; padding-bottom: 40px;">
        <div class="container">
            <div class="reveal">
                <p class="section-label">We horen graag van je</p>
                <h1>Contact</h1>
                <p style="max-width: 640px;">Heb je een vraag, wil je een proefles boeken of gewoon even kennismaken? Stuur ons een bericht — we reageren zo snel mogelijk.</p>
            </div>
        </div>
    </section>

    <!-- Contact Grid -->
    <section style="padding-top: 0;">
        <div class="container">
            <div class="contact-grid reveal">
                <div class="contact-info">
                    <h3>Direct contact</h3>
                    <p><strong>E-mail</strong><br><a href="mailto:info@studiofirstfloor.nl">info@studiofirstfloor.nl</a></p>
                    <p><strong>Telefoon</strong><br><a href="tel:+31612345678">+31 6 12345678</a></p>
                    <p><strong>Adres</strong><br>Straatnaam 123<br>1234 AB Plaatsnaam</p>
                    <p><strong>Openingstijden</strong><br>Maandag t/m vrijdag: 08:00 – 20:00<br>Zaterdag: 09:00 – 13:00</p>
                    <p style="margin-top: 24px; font-style: italic; font-family: 'Playfair Display', serif; color: var(--text-primary);">"We zien je graag in de studio."</p>
                </div>

                <div class="contact-form-wrapper">
                    <?php if ($success): ?>
                        <div style="background-color: #e8f5e9; border: 1px solid #4caf50; padding: 24px; margin-bottom: 24px;">
                            <p style="color: #2e7d32; margin: 0; font-weight: 500;">Bedankt voor je bericht! We nemen zo snel mogelijk contact met je op.</p>
                        </div>
                    <?php endif; ?>

                    <form class="contact-form" action="contact.php" method="POST">
                        <label for="name">Naam</label>
                        <input type="text" id="name" name="name" required>

                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" required>

                        <label for="subject">Onderwerp</label>
                        <input type="text" id="subject" name="subject" required>

                        <label for="message">Bericht</label>
                        <textarea id="message" name="message" required></textarea>

                        <button type="submit" class="btn">Verstuur bericht</button>
                    </form>
                </div>
            </div>

            <div class="map-container reveal">
                <p>[ Google Maps embed — voeg hier de kaartlocatie van de studio toe ]</p>
            </div>
        </div>
    </section>
</main>

<?php include 'inc/footer.php'; ?>
