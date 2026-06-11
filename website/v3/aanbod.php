<?php
$pageTitle = 'Aanbod';
$currentPage = 'aanbod';
include 'inc/header.php';
include 'inc/nav.php';
?>

<main>
    <section style="padding-top: 120px; padding-bottom: 40px;">
        <div class="container">
            <div class="reveal">
                <p class="section-label">Wat we doen</p>
                <h1 style="text-align: center;">Ons aanbod</h1>
                <p class="handwritten" style="text-align: center;">Verschillende vormen, één doel: jouw welzijn</p>
            </div>
        </div>
    </section>

    <section style="padding-top: 0;">
        <div class="container">
            <ul class="feature-list">
                <li class="feature-item reveal">
                    <span class="feature-icon">B</span>
                    <div class="feature-content">
                        <p class="feature-meta">Groepsles — alle niveaus</p>
                        <h3>Basic Pilates</h3>
                        <p>De perfecte start voor beginners en iedereen die de basis wil versterken. We focussen op ademhaling, core-activatie en de fundamentele Pilates-principes in een rustig tempo.</p>
                    </div>
                </li>
                <li class="feature-item reveal">
                    <span class="feature-icon">K</span>
                    <div class="feature-content">
                        <p class="feature-meta">Groepsles — gevorderd</p>
                        <h3>Klassiek Pilates</h3>
                        <p>Volg de originele Pilates-methode zoals Joseph Pilates deze bedoelde. Strakke sequenties, klassieke oefeningen en een sterke focus op controle en concentratie.</p>
                    </div>
                </li>
                <li class="feature-item reveal">
                    <span class="feature-icon">F</span>
                    <div class="feature-content">
                        <p class="feature-meta">Groepsles — alle niveaus</p>
                        <h3>Flow Pilates</h3>
                        <p>Een vloeiende les waarbij bewegingen naadloos in elkaar overgaan, ondersteund door ademhaling. Focust op flexibiliteit, coördinatie en een krachtige core.</p>
                    </div>
                </li>
                <li class="feature-item reveal">
                    <span class="feature-icon">P</span>
                    <div class="feature-content">
                        <p class="feature-meta">Groepsles — intensief</p>
                        <h3>Power Pilates</h3>
                        <p>Een intensieve les voor wie zijn grenzen wil verleggen. Sneller tempo, meer weerstand, extra focus op krachtopbouw. Een echte workout met Pilates als basis.</p>
                    </div>
                </li>
                <li class="feature-item reveal">
                    <span class="feature-icon">E</span>
                    <div class="feature-content">
                        <p class="feature-meta">Groepsles — ochtend</p>
                        <h3>Early Bird Pilates</h3>
                        <p>Start je dag energiek met een ochtendles. Wakker worden met beweging, focus en een frisse mindset voor de rest van de dag.</p>
                    </div>
                </li>
                <li class="feature-item reveal">
                    <span class="feature-icon">1</span>
                    <div class="feature-content">
                        <p class="feature-meta">1-op-1 — op aanvraag</p>
                        <h3>Personal Pilates</h3>
                        <p>Een volledig persoonlijke Pilates-sessie, afgestemd op jouw lichaam, doelen en eventuele klachten. Maximale aandacht en resultaat.</p>
                    </div>
                </li>
                <li class="feature-item reveal">
                    <span class="feature-icon">2</span>
                    <div class="feature-content">
                        <p class="feature-meta">2 personen — op aanvraag</p>
                        <h3>Duo Pilates</h3>
                        <p>Train samen met een vriend, partner of familielid. Persoonlijke begeleiding in een duo-setting — de ideale combinatie van gezelligheid en gerichte aandacht.</p>
                    </div>
                </li>
            </ul>

            <div style="margin-top: 80px; text-align: center;" class="reveal">
                <p class="section-label">Werkwijze</p>
                <p class="handwritten">Waarom bij ons trainen?</p>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 24px; max-width: 900px; margin: 32px auto 0;">
                    <div style="padding: 24px; background: var(--bg-secondary); border-radius: 12px;">
                        <h4 style="margin-bottom: 8px;">Kleine groepen</h4>
                        <p style="font-size: 0.9rem; margin: 0;">Maximaal 8 personen per les</p>
                    </div>
                    <div style="padding: 24px; background: var(--bg-secondary); border-radius: 12px;">
                        <h4 style="margin-bottom: 8px;">Gratis parkeren</h4>
                        <p style="font-size: 0.9rem; margin: 0;">Direct bij de studio</p>
                    </div>
                    <div style="padding: 24px; background: var(--bg-secondary); border-radius: 12px;">
                        <h4 style="margin-bottom: 8px;">Materialen</h4>
                        <p style="font-size: 0.9rem; margin: 0;">Matten en props aanwezig</p>
                    </div>
                    <div style="padding: 24px; background: var(--bg-secondary); border-radius: 12px;">
                        <h4 style="margin-bottom: 8px;">Lounge</h4>
                        <p style="font-size: 0.9rem; margin: 0;">Gratis koffie en thee</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-section">
        <div class="container cta-content reveal">
            <p class="section-label">Vragen?</p>
            <h2>We helpen je graag</h2>
            <p class="cta-handwritten">Samen vinden we wat het beste bij jou past</p>
            <a href="contact.php" class="btn">Neem contact op</a>
        </div>
    </section>
</main>

<?php include 'inc/footer.php'; ?>
