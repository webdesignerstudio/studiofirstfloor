<?php
$pageTitle = 'Rooster Demo';
$pageDescription = 'Studio First Floor — Visuele varianten van het lesrooster.';
$currentPage = 'rooster';
include 'inc/header.php';
include 'inc/nav.php';
?>

<main>
    <section style="padding-top: 120px; padding-bottom: 40px;">
        <div class="container">
            <div class="reveal">
                <div class="section-tag" style="justify-content: flex-start;">
                    <div class="line"></div>
                    <span>ROOSTER VARIANTEN</span>
                </div>
                <h1>Rooster Stijlen</h1>
                <p style="max-width: 600px;">Hieronder vind je verschillende visuele weergaven van het lesrooster. Kies de variant die het beste past bij de uitstraling van je website.</p>
            </div>
        </div>
    </section>

    <!-- VARIANT A: Timeline Style -->
    <section style="padding-top: 0; padding-bottom: 80px;">
        <div class="container">
            <div class="section-header reveal" style="margin-bottom: 40px;">
                <div class="section-tag">
                    <div class="line"></div>
                    <span>VARIANT A</span>
                    <div class="line"></div>
                </div>
                <h2>Verticale Tijdlijn</h2>
                <p style="max-width: 500px; margin: 0 auto;">Strak, modern en overzichtelijk. De dag loopt als een lijn door het rooster heen.</p>
            </div>

            <div class="schedule-timeline reveal">
                <div class="timeline-item">
                    <div class="timeline-day">Ma</div>
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-time">19:00</span>
                        <span class="timeline-name">Flow Pilates</span>
                        <span class="timeline-badge">Avond</span>
                    </div>
                    <a href="contact.php" class="timeline-link">BOEKEN <span>&rarr;</span></a>
                </div>
                <div class="timeline-item">
                    <div class="timeline-day">Wo</div>
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-time">19:00</span>
                        <span class="timeline-name">Basic Pilates</span>
                        <span class="timeline-badge">Avond</span>
                    </div>
                    <a href="contact.php" class="timeline-link">BOEKEN <span>&rarr;</span></a>
                </div>
                <div class="timeline-item timeline-double">
                    <div class="timeline-day">Do</div>
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <div class="timeline-row"><span class="timeline-time">08:00</span><span class="timeline-name">Early Bird Pilates</span><span class="timeline-badge">Ochtend</span></div>
                        <div class="timeline-row"><span class="timeline-time">19:00</span><span class="timeline-name">Power Pilates</span><span class="timeline-badge">Avond</span></div>
                    </div>
                    <a href="contact.php" class="timeline-link">BOEKEN <span>&rarr;</span></a>
                </div>
                <div class="timeline-item timeline-double">
                    <div class="timeline-day">Vr</div>
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <div class="timeline-row"><span class="timeline-time">09:00</span><span class="timeline-name">Basic Pilates</span><span class="timeline-badge">Ochtend</span></div>
                        <div class="timeline-row"><span class="timeline-time">10:00</span><span class="timeline-name">Flow Pilates</span><span class="timeline-badge">Ochtend</span></div>
                    </div>
                    <a href="contact.php" class="timeline-link">BOEKEN <span>&rarr;</span></a>
                </div>
            </div>
        </div>
    </section>

    <!-- VARIANT B: Minimal List -->
    <section style="padding: 80px 0; background-color: var(--surface); border-top: 1px solid rgba(115, 93, 82, 0.1); border-bottom: 1px solid rgba(115, 93, 82, 0.1);">
        <div class="container">
            <div class="section-header reveal" style="margin-bottom: 40px;">
                <div class="section-tag">
                    <div class="line"></div>
                    <span>VARIANT B</span>
                    <div class="line"></div>
                </div>
                <h2>Minimalistische Lijst</h2>
                <p style="max-width: 500px; margin: 0 auto;">Eenvoudig, elegant en direct. Geen franje, alleen wat je nodig hebt.</p>
            </div>

            <div class="schedule-list reveal">
                <div class="list-item">
                    <div class="list-day">Maandag</div>
                    <div class="list-info">
                        <span class="list-time">19:00 — 19:50</span>
                        <span class="list-name">Flow Pilates</span>
                    </div>
                    <a href="contact.php" class="list-btn">BOEKEN</a>
                </div>
                <div class="list-divider"></div>
                <div class="list-item">
                    <div class="list-day">Woensdag</div>
                    <div class="list-info">
                        <span class="list-time">19:00 — 19:50</span>
                        <span class="list-name">Basic Pilates</span>
                    </div>
                    <a href="contact.php" class="list-btn">BOEKEN</a>
                </div>
                <div class="list-divider"></div>
                <div class="list-item list-item-double">
                    <div class="list-day">Donderdag</div>
                    <div class="list-info">
                        <span class="list-time">08:00 — 08:50</span>
                        <span class="list-name">Early Bird Pilates</span>
                    </div>
                    <a href="contact.php" class="list-btn">BOEKEN</a>
                </div>
                <div class="list-item list-item-double list-item-no-day">
                    <div class="list-info">
                        <span class="list-time">19:00 — 19:50</span>
                        <span class="list-name">Power Pilates</span>
                    </div>
                    <a href="contact.php" class="list-btn">BOEKEN</a>
                </div>
                <div class="list-divider"></div>
                <div class="list-item list-item-double">
                    <div class="list-day">Vrijdag</div>
                    <div class="list-info">
                        <span class="list-time">09:00 — 09:50</span>
                        <span class="list-name">Basic Pilates</span>
                    </div>
                    <a href="contact.php" class="list-btn">BOEKEN</a>
                </div>
                <div class="list-item list-item-double list-item-no-day">
                    <div class="list-info">
                        <span class="list-time">10:00 — 10:50</span>
                        <span class="list-name">Flow Pilates</span>
                    </div>
                    <a href="contact.php" class="list-btn">BOEKEN</a>
                </div>
            </div>
        </div>
    </section>

    <!-- VARIANT C: Horizontal Bar -->
    <section style="padding: 80px 0;">
        <div class="container">
            <div class="section-header reveal" style="margin-bottom: 40px;">
                <div class="section-tag">
                    <div class="line"></div>
                    <span>VARIANT C</span>
                    <div class="line"></div>
                </div>
                <h2>Horizontale Balken</h2>
                <p style="max-width: 500px; margin: 0 auto;">Sportief en energiek. De les wordt een balk die de dag vult.</p>
            </div>

            <div class="schedule-bars reveal">
                <div class="bar-item">
                    <div class="bar-day">Ma</div>
                    <div class="bar-track">
                        <div class="bar-fill" style="left: 38%; width: 6.9%;">
                            <span class="bar-label">Flow Pilates <span class="bar-time">19:00</span></span>
                        </div>
                    </div>
                </div>
                <div class="bar-item">
                    <div class="bar-day">Wo</div>
                    <div class="bar-track">
                        <div class="bar-fill" style="left: 38%; width: 6.9%;">
                            <span class="bar-label">Basic Pilates <span class="bar-time">19:00</span></span>
                        </div>
                    </div>
                </div>
                <div class="bar-item">
                    <div class="bar-day">Do</div>
                    <div class="bar-track">
                        <div class="bar-fill bar-fill-morning" style="left: 8%; width: 6.9%;">
                            <span class="bar-label">Early Bird Pilates <span class="bar-time">08:00</span></span>
                        </div>
                        <div class="bar-fill" style="left: 38%; width: 6.9%;">
                            <span class="bar-label">Power Pilates <span class="bar-time">19:00</span></span>
                        </div>
                    </div>
                </div>
                <div class="bar-item">
                    <div class="bar-day">Vr</div>
                    <div class="bar-track">
                        <div class="bar-fill bar-fill-morning" style="left: 12.5%; width: 6.9%;">
                            <span class="bar-label">Basic Pilates <span class="bar-time">09:00</span></span>
                        </div>
                        <div class="bar-fill bar-fill-morning" style="left: 16.7%; width: 6.9%;">
                            <span class="bar-label">Flow Pilates <span class="bar-time">10:00</span></span>
                        </div>
                    </div>
                </div>
            </div>

            <div style="max-width: 800px; margin: 32px auto 0; display: flex; justify-content: space-between; font-size: 0.65rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.1em; color: var(--taupe-brown); opacity: 0.6;">
                <span>08:00</span><span>10:00</span><span>12:00</span><span>14:00</span><span>16:00</span><span>18:00</span><span>20:00</span><span>22:00</span>
            </div>
        </div>
    </section>

    <!-- VARIANT D: Split Luxury Card -->
    <section style="padding: 80px 0; background-color: var(--surface); border-top: 1px solid rgba(115, 93, 82, 0.1); border-bottom: 1px solid rgba(115, 93, 82, 0.1);">
        <div class="container">
            <div class="section-header reveal" style="margin-bottom: 40px;">
                <div class="section-tag">
                    <div class="line"></div>
                    <span>VARIANT D</span>
                    <div class="line"></div>
                </div>
                <h2>Split Luxury Card</h2>
                <p style="max-width: 500px; margin: 0 auto;">Het dag-paneel en les-paneel gescheiden door een gouden lijn. Rijk en elegant.</p>
            </div>

            <div class="schedule-split reveal">
                <div class="split-card">
                    <div class="split-left">
                        <span class="split-day">Maandag</span>
                        <span class="split-abbr">Ma</span>
                    </div>
                    <div class="split-right">
                        <span class="split-time">19:00 — 19:50</span>
                        <span class="split-name">Flow Pilates</span>
                        <span class="split-badge">Avond</span>
                    </div>
                    <a href="contact.php" class="split-link">BOEKEN <span>&rarr;</span></a>
                </div>
                <div class="split-card">
                    <div class="split-left">
                        <span class="split-day">Woensdag</span>
                        <span class="split-abbr">Wo</span>
                    </div>
                    <div class="split-right">
                        <span class="split-time">19:00 — 19:50</span>
                        <span class="split-name">Basic Pilates</span>
                        <span class="split-badge">Avond</span>
                    </div>
                    <a href="contact.php" class="split-link">BOEKEN <span>&rarr;</span></a>
                </div>
                <div class="split-card">
                    <div class="split-left">
                        <span class="split-day">Donderdag</span>
                        <span class="split-abbr">Do</span>
                    </div>
                    <div class="split-right">
                        <span class="split-time">08:00 — 08:50</span>
                        <span class="split-name">Early Bird Pilates</span>
                        <span class="split-badge">Ochtend</span>
                        <span class="split-time" style="margin-top: 12px;">19:00 — 19:50</span>
                        <span class="split-name">Power Pilates</span>
                        <span class="split-badge">Avond</span>
                    </div>
                    <a href="contact.php" class="split-link">BOEKEN <span>&rarr;</span></a>
                </div>
                <div class="split-card">
                    <div class="split-left">
                        <span class="split-day">Vrijdag</span>
                        <span class="split-abbr">Vr</span>
                    </div>
                    <div class="split-right">
                        <span class="split-time">09:00 — 09:50</span>
                        <span class="split-name">Basic Pilates</span>
                        <span class="split-badge">Ochtend</span>
                        <span class="split-time" style="margin-top: 12px;">10:00 — 10:50</span>
                        <span class="split-name">Flow Pilates</span>
                        <span class="split-badge">Ochtend</span>
                    </div>
                    <a href="contact.php" class="split-link">BOEKEN <span>&rarr;</span></a>
                </div>
            </div>
        </div>
    </section>

    <!-- VARIANT E: Magazine Cover Grid -->
    <section style="padding: 80px 0;">
        <div class="container">
            <div class="section-header reveal" style="margin-bottom: 40px;">
                <div class="section-tag">
                    <div class="line"></div>
                    <span>VARIANT E</span>
                    <div class="line"></div>
                </div>
                <h2>Magazine Grid</h2>
                <p style="max-width: 500px; margin: 0 auto;">Editorial stijl met grote verticale daglabels en gestylede lesrijen. Typografie als beeld.</p>
            </div>

            <div class="schedule-magazine reveal">
                <div class="mag-row">
                    <div class="mag-day">Ma<span class="mag-dot"></span></div>
                    <div class="mag-content">
                        <div class="mag-lesson">
                            <span class="mag-time">19:00</span>
                            <span class="mag-name">Flow Pilates</span>
                            <span class="mag-type">Avond</span>
                        </div>
                    </div>
                    <a href="contact.php" class="mag-link">BOEKEN</a>
                </div>
                <div class="mag-row">
                    <div class="mag-day">Wo<span class="mag-dot"></span></div>
                    <div class="mag-content">
                        <div class="mag-lesson">
                            <span class="mag-time">19:00</span>
                            <span class="mag-name">Basic Pilates</span>
                            <span class="mag-type">Avond</span>
                        </div>
                    </div>
                    <a href="contact.php" class="mag-link">BOEKEN</a>
                </div>
                <div class="mag-row">
                    <div class="mag-day">Do<span class="mag-dot"></span></div>
                    <div class="mag-content">
                        <div class="mag-lesson">
                            <span class="mag-time">08:00</span>
                            <span class="mag-name">Early Bird Pilates</span>
                            <span class="mag-type">Ochtend</span>
                        </div>
                        <div class="mag-lesson">
                            <span class="mag-time">19:00</span>
                            <span class="mag-name">Power Pilates</span>
                            <span class="mag-type">Avond</span>
                        </div>
                    </div>
                    <a href="contact.php" class="mag-link">BOEKEN</a>
                </div>
                <div class="mag-row">
                    <div class="mag-day">Vr<span class="mag-dot"></span></div>
                    <div class="mag-content">
                        <div class="mag-lesson">
                            <span class="mag-time">09:00</span>
                            <span class="mag-name">Basic Pilates</span>
                            <span class="mag-type">Ochtend</span>
                        </div>
                        <div class="mag-lesson">
                            <span class="mag-time">10:00</span>
                            <span class="mag-name">Flow Pilates</span>
                            <span class="mag-type">Ochtend</span>
                        </div>
                    </div>
                    <a href="contact.php" class="mag-link">BOEKEN</a>
                </div>
            </div>
        </div>
    </section>

    <!-- VARIANT F: Dashboard Pills -->
    <section style="padding: 80px 0; background-color: var(--surface); border-top: 1px solid rgba(115, 93, 82, 0.1); border-bottom: 1px solid rgba(115, 93, 82, 0.1);">
        <div class="container">
            <div class="section-header reveal" style="margin-bottom: 40px;">
                <div class="section-tag">
                    <div class="line"></div>
                    <span>VARIANT F</span>
                    <div class="line"></div>
                </div>
                <h2>Dashboard Pills</h2>
                <p style="max-width: 500px; margin: 0 auto;">Modern, compact en overzichtelijk. Kleuraccenten per dagtype in een strak pill-formaat.</p>
            </div>

            <div class="schedule-pills reveal">
                <div class="pill-card">
                    <div class="pill-header">
                        <span class="pill-day">Ma</span>
                        <span class="pill-date">Maandag</span>
                    </div>
                    <div class="pill-body">
                        <div class="pill-lesson">
                            <span class="pill-time">19:00 — 19:50</span>
                            <span class="pill-name">Flow Pilates</span>
                            <span class="pill-tag pill-tag-evening">Avond</span>
                        </div>
                    </div>
                    <a href="contact.php" class="pill-action">BOEK <span>&rarr;</span></a>
                </div>
                <div class="pill-card">
                    <div class="pill-header">
                        <span class="pill-day">Wo</span>
                        <span class="pill-date">Woensdag</span>
                    </div>
                    <div class="pill-body">
                        <div class="pill-lesson">
                            <span class="pill-time">19:00 — 19:50</span>
                            <span class="pill-name">Basic Pilates</span>
                            <span class="pill-tag pill-tag-evening">Avond</span>
                        </div>
                    </div>
                    <a href="contact.php" class="pill-action">BOEK <span>&rarr;</span></a>
                </div>
                <div class="pill-card">
                    <div class="pill-header">
                        <span class="pill-day">Do</span>
                        <span class="pill-date">Donderdag</span>
                    </div>
                    <div class="pill-body">
                        <div class="pill-lesson">
                            <span class="pill-time">08:00 — 08:50</span>
                            <span class="pill-name">Early Bird Pilates</span>
                            <span class="pill-tag pill-tag-morning">Ochtend</span>
                        </div>
                        <div class="pill-lesson">
                            <span class="pill-time">19:00 — 19:50</span>
                            <span class="pill-name">Power Pilates</span>
                            <span class="pill-tag pill-tag-evening">Avond</span>
                        </div>
                    </div>
                    <a href="contact.php" class="pill-action">BOEK <span>&rarr;</span></a>
                </div>
                <div class="pill-card">
                    <div class="pill-header">
                        <span class="pill-day">Vr</span>
                        <span class="pill-date">Vrijdag</span>
                    </div>
                    <div class="pill-body">
                        <div class="pill-lesson">
                            <span class="pill-time">09:00 — 09:50</span>
                            <span class="pill-name">Basic Pilates</span>
                            <span class="pill-tag pill-tag-morning">Ochtend</span>
                        </div>
                        <div class="pill-lesson">
                            <span class="pill-time">10:00 — 10:50</span>
                            <span class="pill-name">Flow Pilates</span>
                            <span class="pill-tag pill-tag-morning">Ochtend</span>
                        </div>
                    </div>
                    <a href="contact.php" class="pill-action">BOEK <span>&rarr;</span></a>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section>
        <div class="container">
            <div class="cta-box reveal">
                <div class="shape-1"></div>
                <div class="shape-2"></div>
                <div class="cta-box-inner">
                    <span class="label-caps tag">KEUZE IS AAN JOU</span>
                    <h2>Welke stijl spreekt je aan?</h2>
                    <p>Laat me weten welke variant je wilt doorvoeren op de live rooster-pagina.</p>
                    <a href="contact.php" class="btn-hot">NEEM CONTACT OP</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'inc/footer.php'; ?>
