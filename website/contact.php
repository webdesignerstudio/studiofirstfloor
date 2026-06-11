<?php
$pageTitle = 'Contact';
$currentPage = 'contact';
include 'inc/header.php';
include 'inc/nav.php';

$success = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') { $success = true; }
?>

<main>
    <section style="padding-top: 120px; padding-bottom: 40px;">
        <div class="container">
            <div class="reveal">
                <div class="section-tag" style="justify-content: flex-start;">
                    <div class="line"></div>
                    <span>CONTACT</span>
                </div>
                <h1>We horen graag van je</h1>
                <p style="max-width: 600px;">Heb je een vraag, wil je een proefles boeken of gewoon even kennismaken? Stuur ons een bericht.</p>
            </div>
        </div>
    </section>

    <section style="padding-top: 0;">
        <div class="container">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0;" class="reveal">
                <div style="padding: 60px; background-color: var(--surface); border-right: 1px solid rgba(115, 93, 82, 0.1);">
                    <span class="label-caps" style="color: var(--taupe-brown); margin-bottom: 24px; display: block;">GEGEVENS</span>
                    <h3 style="margin-bottom: 2rem;">Direct contact</h3>

                    <div style="margin-bottom: 1.5rem;">
                        <span class="label-caps" style="color: var(--taupe-brown); display: block; margin-bottom: 8px;">E-MAIL</span>
                        <a href="mailto:info@studiofirstfloor.nl" style="color: var(--on-surface);">info@studiofirstfloor.nl</a>
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <span class="label-caps" style="color: var(--taupe-brown); display: block; margin-bottom: 8px;">TELEFOON</span>
                        <a href="tel:+31612345678" style="color: var(--on-surface);">+31 6 12345678</a>
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <span class="label-caps" style="color: var(--taupe-brown); display: block; margin-bottom: 8px;">ADRES</span>
                        <p style="margin: 0;">Straatnaam 123<br>1234 AB Plaatsnaam</p>
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <span class="label-caps" style="color: var(--taupe-brown); display: block; margin-bottom: 8px;">OPENINGSTIJDEN</span>
                        <p style="margin: 0;">Maandag t/m vrijdag: 08:00 – 20:00<br>Zaterdag: 09:00 – 13:00</p>
                    </div>
                </div>

                <div style="padding: 60px; background-color: var(--white);">
                    <span class="label-caps" style="color: var(--taupe-brown); margin-bottom: 24px; display: block;">FORMULIER</span>
                    <h3 style="margin-bottom: 2rem;">Stuur een bericht</h3>

                    <?php if ($success): ?>
                        <div style="background-color: var(--primary-container); padding: 24px; margin-bottom: 24px; border-left: 3px solid var(--hot-pink);">
                            <p style="margin: 0; color: var(--on-surface);">Bedankt voor je bericht! We nemen zo snel mogelijk contact met je op.</p>
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

                        <button type="submit" class="btn-hot">VERSTUUR BERICHT</button>
                    </form>
                </div>
            </div>

            <div style="margin-top: 60px; height: 350px; background-color: var(--surface); display: flex; align-items: center; justify-content: center; color: var(--on-surface-variant);" class="reveal">
                <span class="label-caps">[Google Maps locatie]</span>
            </div>
        </div>
    </section>
</main>

<?php include 'inc/footer.php'; ?>
