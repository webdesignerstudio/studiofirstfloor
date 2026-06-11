<?php
$pageTitle = 'Contact';
$currentPage = 'contact';
include 'inc/header.php';
include 'inc/nav.php';

$success = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') { $success = true; }
?>

<main>
    <section style="padding-top: 150px; padding-bottom: 40px;">
        <div class="container">
            <div class="reveal">
                <span class="section-label">CONTACT</span>
                <h1>We horen graag van je</h1>
                <p style="max-width: 600px;">Heb je een vraag, wil je een proefles boeken of gewoon even kennismaken? Stuur ons een bericht — we reageren zo snel mogelijk.</p>
            </div>
        </div>
    </section>

    <section style="padding-top: 0;">
        <div class="container">
            <div class="bento-grid reveal" style="align-items: stretch;">
                <div class="bento-content" style="background-color: var(--surface-container); border-radius: 4px;">
                    <span class="section-label">GEGEVENS</span>
                    <h3 style="margin-bottom: 2rem;">Direct contact</h3>
                    <p><strong style="color: var(--primary); font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.1em; display: block; margin-bottom: 4px;">E-mail</strong>
                        <a href="mailto:info@studiofirstfloor.nl" style="color: var(--deep-taupe);">info@studiofirstfloor.nl</a></p>
                    <p><strong style="color: var(--primary); font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.1em; display: block; margin-bottom: 4px;">Telefoon</strong>
                        <a href="tel:+31612345678" style="color: var(--deep-taupe);">+31 6 12345678</a></p>
                    <p><strong style="color: var(--primary); font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.1em; display: block; margin-bottom: 4px;">Adres</strong>
                        Straatnaam 123<br>1234 AB Plaatsnaam</p>
                    <p><strong style="color: var(--primary); font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.1em; display: block; margin-bottom: 4px;">Openingstijden</strong>
                        Maandag t/m vrijdag: 08:00 – 20:00<br>Zaterdag: 09:00 – 13:00</p>
                </div>

                <div class="bento-content" style="border-radius: 4px;">
                    <span class="section-label">BERICHT</span>
                    <h3 style="margin-bottom: 2rem;">Stuur een bericht</h3>

                    <?php if ($success): ?>
                        <div style="background-color: var(--serene-blush); padding: 24px; margin-bottom: 24px; border-radius: 4px;">
                            <p style="margin: 0; color: var(--deep-taupe);">Bedankt voor je bericht! We nemen zo snel mogelijk contact met je op.</p>
                        </div>
                    <?php endif; ?>

                    <form action="contact.php" method="POST" style="display: flex; flex-direction: column; gap: 8px;">
                        <label class="label-caps" style="color: var(--primary); margin-bottom: 4px;">Naam</label>
                        <input type="text" name="name" required style="border: none; border-bottom: 1px solid var(--outline-variant); background: transparent; padding: 12px 0; font-family: 'Hanken Grotesk', sans-serif; font-size: 1rem; margin-bottom: 16px; outline: none; transition: var(--transition);">

                        <label class="label-caps" style="color: var(--primary); margin-bottom: 4px;">E-mail</label>
                        <input type="email" name="email" required style="border: none; border-bottom: 1px solid var(--outline-variant); background: transparent; padding: 12px 0; font-family: 'Hanken Grotesk', sans-serif; font-size: 1rem; margin-bottom: 16px; outline: none;">

                        <label class="label-caps" style="color: var(--primary); margin-bottom: 4px;">Onderwerp</label>
                        <input type="text" name="subject" required style="border: none; border-bottom: 1px solid var(--outline-variant); background: transparent; padding: 12px 0; font-family: 'Hanken Grotesk', sans-serif; font-size: 1rem; margin-bottom: 16px; outline: none;">

                        <label class="label-caps" style="color: var(--primary); margin-bottom: 4px;">Bericht</label>
                        <textarea name="message" required style="border: none; border-bottom: 1px solid var(--outline-variant); background: transparent; padding: 12px 0; font-family: 'Hanken Grotesk', sans-serif; font-size: 1rem; margin-bottom: 24px; min-height: 100px; resize: vertical; outline: none;"></textarea>

                        <button type="submit" class="btn-primary" style="align-self: flex-start;">VERSTUUR BERICHT</button>
                    </form>
                </div>
            </div>

            <div style="margin-top: 60px; height: 350px; background-color: var(--surface-container); display: flex; align-items: center; justify-content: center; border-radius: 4px; color: var(--outline);" class="reveal">
                <span class="label-caps">[Google Maps locatie]</span>
            </div>
        </div>
    </section>
</main>

<?php include 'inc/footer.php'; ?>
