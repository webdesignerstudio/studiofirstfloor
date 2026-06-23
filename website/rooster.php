<?php
$pageTitle = 'Rooster';
$pageDescription = 'Het lesrooster van Studio First Floor. Bekijk onze Pilates lessen op maandag, woensdag, donderdag en vrijdag. Boek je plek vandaag nog.';
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
                    <span>ROOSTER</span>
                </div>
                <h1>Ons Lesrooster</h1>
                <p style="max-width: 600px;">Bij Studio First Floor draait alles om persoonlijke aandacht. In onze rustige en stijlvolle studio train je in kleine groepen van maximaal 8 deelnemers. Zo is er volop ruimte voor professionele begeleiding en aandacht voor jouw techniek en doelen. Alle materialen zijn aanwezig, parkeren kan op loopafstand en er is een gezellige lounge met koffie en thee.</p>
                <p style="max-width: 600px; margin-top: 1rem;"><strong>Beweeg, versterk en kom tot rust.</strong></p>
            </div>
        </div>
    </section>

    <section class="schedule-section" style="padding-top: 0;">
        <div class="container">
            <div class="section-header reveal" style="margin-bottom: 40px;">
                <div class="section-tag">
                    <div class="line"></div>
                    <span>WEEKOVERZICHT</span>
                    <div class="line"></div>
                </div>
                <h2>Wanneer train jij?</h2>
                <p style="max-width: 500px; margin: 0 auto;">Kies de les die bij jou past en boek direct je plek.</p>
            </div>

            <div class="schedule-grid reveal">
                <div class="schedule-card">
                    <div class="schedule-card-header">
                        <div class="day-name"><span class="line"></span>Maandag</div>
                    </div>
                    <div class="schedule-card-body">
                        <div class="lesson">
                            <div class="lesson-label">
                                <svg class="lesson-icon" viewBox="0 0 24 24"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
                                Avond
                            </div>
                            <div class="lesson-time">19:00 — 19:50 uur</div>
                            <div class="lesson-name">Flow Pilates</div>
                        </div>
                    </div>
                    <div class="schedule-card-footer">
                        <a href="contact.php?dienst=Flow Pilates&amp;bericht=Ik wil boeken voor maandag avond Flow Pilates (19:00 - 19:50 uur)." class="schedule-link">BOEK DEZE LES <span>&rarr;</span></a>
                    </div>
                </div>

                <div class="schedule-card">
                    <div class="schedule-card-header">
                        <div class="day-name"><span class="line"></span>Woensdag</div>
                    </div>
                    <div class="schedule-card-body">
                        <div class="lesson">
                            <div class="lesson-label">
                                <svg class="lesson-icon" viewBox="0 0 24 24"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
                                Avond
                            </div>
                            <div class="lesson-time">19:00 — 19:50 uur</div>
                            <div class="lesson-name">Basic Pilates</div>
                        </div>
                    </div>
                    <div class="schedule-card-footer">
                        <a href="contact.php?dienst=Basic Pilates&amp;bericht=Ik wil boeken voor woensdag avond Basic Pilates (19:00 - 19:50 uur)." class="schedule-link">BOEK DEZE LES <span>&rarr;</span></a>
                    </div>
                </div>

                <div class="schedule-card">
                    <div class="schedule-card-header">
                        <div class="day-name"><span class="line"></span>Donderdag</div>
                    </div>
                    <div class="schedule-card-body">
                        <div class="lesson">
                            <div class="lesson-label">
                                <svg class="lesson-icon" viewBox="0 0 24 24"><circle cx="12" cy="12" r="5"/><path d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"/></svg>
                                Ochtend (Early Bird)
                            </div>
                            <div class="lesson-time">08:00 — 08:50 uur</div>
                            <div class="lesson-name">Early Bird Pilates</div>
                            <a href="contact.php?dienst=Early Bird Pilates&amp;bericht=Ik wil boeken voor donderdag ochtend Early Bird Pilates (08:00 - 08:50 uur)." class="schedule-link" style="margin-top: 8px; font-size: 0.65rem;">BOEK DEZE LES <span>&rarr;</span></a>
                        </div>
                        <div class="lesson">
                            <div class="lesson-label">
                                <svg class="lesson-icon" viewBox="0 0 24 24"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
                                Avond
                            </div>
                            <div class="lesson-time">19:00 — 19:50 uur</div>
                            <div class="lesson-name">Power Pilates</div>
                            <a href="contact.php?dienst=Power Pilates&amp;bericht=Ik wil boeken voor donderdag avond Power Pilates (19:00 - 19:50 uur)." class="schedule-link" style="margin-top: 8px; font-size: 0.65rem;">BOEK DEZE LES <span>&rarr;</span></a>
                        </div>
                    </div>
                </div>

                <div class="schedule-card">
                    <div class="schedule-card-header">
                        <div class="day-name"><span class="line"></span>Vrijdag</div>
                    </div>
                    <div class="schedule-card-body">
                        <div class="lesson">
                            <div class="lesson-label">
                                <svg class="lesson-icon" viewBox="0 0 24 24"><circle cx="12" cy="12" r="5"/><path d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"/></svg>
                                Ochtend (Les 1)
                            </div>
                            <div class="lesson-time">09:00 — 09:50 uur</div>
                            <div class="lesson-name">Basic Pilates</div>
                            <a href="contact.php?dienst=Basic Pilates&amp;bericht=Ik wil boeken voor vrijdag ochtend Basic Pilates (09:00 - 09:50 uur)." class="schedule-link" style="margin-top: 8px; font-size: 0.65rem;">BOEK DEZE LES <span>&rarr;</span></a>
                        </div>
                        <div class="lesson">
                            <div class="lesson-label">
                                <svg class="lesson-icon" viewBox="0 0 24 24"><circle cx="12" cy="12" r="5"/><path d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"/></svg>
                                Ochtend (Les 2)
                            </div>
                            <div class="lesson-time">10:00 — 10:50 uur</div>
                            <div class="lesson-name">Flow Pilates</div>
                            <a href="contact.php?dienst=Flow Pilates&amp;bericht=Ik wil boeken voor vrijdag ochtend Flow Pilates (10:00 - 10:50 uur)." class="schedule-link" style="margin-top: 8px; font-size: 0.65rem;">BOEK DEZE LES <span>&rarr;</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="cta-box reveal">
                <div class="shape-1"></div>
                <div class="shape-2"></div>
                <div class="cta-box-inner">
                    <span class="label-caps tag">BEGINNERS WELKOM</span>
                    <h2>Nog niet zeker welke les bij je past?</h2>
                    <p>Neem contact met ons op voor persoonlijk advies of plan een gratis proefles.</p>
                    <a href="contact.php" class="btn-hot">NEEM CONTACT OP</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'inc/footer.php'; ?>
