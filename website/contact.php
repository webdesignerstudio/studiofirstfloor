<?php
$pageTitle = 'Contact';
$pageDescription = 'Neem contact op met Studio First Floor in \'s Gravenmoer. Boek een proefles, stel een vraag of plan een afspraak. Bereikbaar via telefoon, e-mail of het contactformulier.';
$currentPage = 'contact';
include 'inc/header.php';
include 'inc/nav.php';

$cfg = include __DIR__ . '/site-config.php';
$diensten = $cfg['diensten'] ?? [];
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
                        <a href="tel:+31637528238" style="color: var(--on-surface);">06 375 282 38</a>
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <span class="label-caps" style="color: var(--taupe-brown); display: block; margin-bottom: 8px;">WHATSAPP</span>
                        <a href="https://wa.me/31637528238" target="_blank" rel="noopener" style="color: var(--hot-pink);">06 375 282 38</a>
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <span class="label-caps" style="color: var(--taupe-brown); display: block; margin-bottom: 8px;">ADRES</span>
                        <p style="margin: 0;">Emmalaan 1F<br>5109 TA 's Gravenmoer</p>
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <span class="label-caps" style="color: var(--taupe-brown); display: block; margin-bottom: 8px;">OPENINGSTIJDEN</span>
                        <p style="margin: 0;">Maandag t/m vrijdag: 08:00 – 20:00<br>Zaterdag: 09:00 – 13:00</p>
                    </div>
                </div>

                <div style="padding: 60px; background-color: var(--white);">
                    <span class="label-caps" style="color: var(--taupe-brown); margin-bottom: 24px; display: block;">FORMULIER</span>
                    <h3 style="margin-bottom: 2rem;">Stuur een bericht</h3>

                    <div id="form-feedback" style="display:none; padding: 24px; margin-bottom: 24px; border-left: 3px solid var(--hot-pink);">
                        <p id="form-feedback-text" style="margin: 0; color: var(--on-surface);"></p>
                    </div>

                    <form class="contact-form" id="contact-form" action="mail.php" method="POST">
                        <input type="hidden" id="csrf_token" name="csrf_token" value="">
                        <input type="text" name="website_url" style="display:none" tabindex="-1" autocomplete="off">
                        <input type="text" name="bedrijfsnaam_extra" style="display:none" tabindex="-1" autocomplete="off">

                        <label for="naam">NAAM</label>
                        <input type="text" id="naam" name="naam" required>

                        <label for="email">E-MAIL</label>
                        <input type="email" id="email" name="email" required>

                        <label for="telefoon">TELEFOON</label>
                        <input type="tel" id="telefoon" name="telefoon" required>

                        <label for="dienst">DIENST</label>
                        <select id="dienst" name="dienst" required>
                            <option value="" disabled selected>Kies een dienst</option>
                            <?php foreach ($diensten as $dienst): ?>
                                <option value="<?php echo htmlspecialchars($dienst); ?>"><?php echo htmlspecialchars($dienst); ?></option>
                            <?php endforeach; ?>
                        </select>

                        <label for="bericht">BERICHT</label>
                        <textarea id="bericht" name="bericht" required></textarea>

                        <button type="submit" class="btn-hot" id="form-submit-btn">VERSTUUR BERICHT</button>
                    </form>
                </div>
            </div>

            <div style="margin-top: 60px;" class="reveal">
                <iframe
                    src="https://maps.google.com/maps?q=Emmalaan+1F,+5109+TA+'s+Gravenmoer&t=&z=15&ie=UTF8&iwloc=&output=embed"
                    width="100%"
                    height="400"
                    style="border:0; display:block;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                ></iframe>
            </div>
        </div>
    </section>
</main>

<script>
(function() {
    // CSRF token ophalen (gecached in sessionStorage)
    (function loadCsrf() {
        const cached = sessionStorage.getItem('csrf_token');
        if (cached) {
            document.querySelectorAll('input[name="csrf_token"]').forEach(el => el.value = cached);
        }
        fetch('mail.php?csrf=1', { credentials: 'same-origin' })
            .then(r => r.json())
            .then(data => {
                if (data.csrf) {
                    sessionStorage.setItem('csrf_token', data.csrf);
                    document.querySelectorAll('input[name="csrf_token"]').forEach(el => el.value = data.csrf);
                }
            })
            .catch(() => {});
    })();

    // Formulier via fetch versturen
    const form = document.getElementById('contact-form');
    const feedback = document.getElementById('form-feedback');
    const feedbackText = document.getElementById('form-feedback-text');
    const submitBtn = document.getElementById('form-submit-btn');

    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            submitBtn.disabled = true;
            submitBtn.textContent = 'Bezig met versturen...';

            const formData = new FormData(form);
            fetch('mail.php', {
                method: 'POST',
                body: formData,
                credentials: 'same-origin'
            })
            .then(r => r.json())
            .then(data => {
                feedback.style.display = 'block';
                if (data.success) {
                    feedback.style.backgroundColor = 'var(--primary-container)';
                    feedback.style.borderLeftColor = 'var(--hot-pink)';
                    feedbackText.textContent = data.message || 'Uw aanvraag is ontvangen! Wij nemen zo snel mogelijk contact met u op.';
                    form.style.display = 'none';
                } else {
                    feedback.style.backgroundColor = 'rgba(220,53,69,0.1)';
                    feedback.style.borderLeftColor = '#dc3545';
                    feedbackText.textContent = data.message || 'Er is iets misgegaan. Probeer het opnieuw.';
                    if (data.fouten) {
                        data.fouten.forEach(f => {
                            const el = document.getElementById(f) || document.querySelector('[name="' + f + '"]');
                            if (el) el.style.borderBottomColor = '#dc3545';
                        });
                    }
                }
            })
            .catch(() => {
                feedback.style.display = 'block';
                feedback.style.backgroundColor = 'rgba(220,53,69,0.1)';
                feedback.style.borderLeftColor = '#dc3545';
                feedbackText.textContent = 'Er is iets misgegaan bij het versturen. Probeer het later opnieuw.';
            })
            .finally(() => {
                submitBtn.disabled = false;
                submitBtn.textContent = 'VERSTUUR BERICHT';
            });
        });
    }
})();
</script>

<?php include 'inc/footer.php'; ?>
