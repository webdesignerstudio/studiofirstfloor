<?php
$pageTitle = 'Home';
$pageDescription = 'Studio First Floor — Pilates Studio in \'s Gravenmoer. Kracht, Rust & Stijl. Maximaal 8 personen per les, gratis parkeren, proefles mogelijk.';
$currentPage = 'home';
include 'inc/header.php';
include 'inc/nav.php';
?>

<main>
    <!-- Hero -->
    <section class="hero">
        <div class="hero-bg">
            <picture>
                <source srcset="img/hero.webp" type="image/webp">
                <img src="img/hero.png" alt="Studio First Floor" width="1024" height="1024" fetchpriority="high">
            </picture>
        </div>
        <div class="hero-content reveal">
            <h1>Kracht, Rust <br>& Stijl</h1>
            <p>Ontdek jouw moment voor jezelf in onze knusse studio. Maximaal 8 personen per les, gratis parkeren, materialen aanwezig en een lounge met gratis koffie en thee.</p>
            <a href="contact.php" class="btn-hot">BOEK EEN GRATIS PROEFLES</a>
        </div>
    </section>

    <!-- Intro Split -->
    <section>
        <div class="container">
            <div class="intro-grid reveal">
                <div class="intro-image">
                    <div class="image-bg"></div>
                    <picture>
                        <source srcset="img/studio-missie.webp" type="image/webp">
                        <img src="img/studio-missie.jpg" alt="Persoonlijke pilates begeleiding" width="1080" height="1080" loading="lazy">
                    </picture>
                </div>
                <div class="intro-content">
                    <div class="section-tag" style="justify-content: flex-start;">
                        <div class="line"></div>
                        <span>ONZE MISSIE</span>
                    </div>
                    <h2>Persoonlijke aandacht</h2>
                    <p>Studio First Floor is jouw private sanctuary voor Pilates. We combineren de zachtheid van een high-end spa met de gedisciplineerde precisie van een professionele studio.</p>
                    <p>Maximaal 8 personen per les. Professionele begeleiding, gratis parkeren, materialen aanwezig en een lounge met gratis koffie en thee.</p>
                    <a href="aanbod.php" class="intro-link">
                        ONTDEK ONZE STUDIO <span>&rarr;</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Bento Services -->
    <section class="bento-section">
        <div class="container">
            <div class="section-header reveal">
                <div class="section-tag">
                    <div class="line"></div>
                    <span>DIENSTEN</span>
                    <div class="line"></div>
                </div>
                <h2>Pilates</h2>
                <p style="max-width: 600px; margin: 0 auto;">Gerichte training voor lichaam en geest, in een setting die rust uitstraalt.</p>
            </div>
            <div class="bento-grid reveal">
                <div class="bento-card">
                    <h3>Basic Pilates</h3>
                    <p>De perfecte start voor beginners. Basisprincipes in een rustig tempo voor alle niveaus.</p>
                    <a href="contact.php" class="card-link">BOEK NU <span>&rarr;</span></a>
                </div>
                <div class="bento-card">
                    <h3>Klassiek Pilates</h3>
                    <p>De originele methode met strakke sequenties, klassieke oefeningen en focus op controle.</p>
                    <a href="contact.php" class="card-link">BOEK NU <span>&rarr;</span></a>
                </div>
                <div class="bento-card">
                    <h3>Flow Pilates</h3>
                    <p>Vloeiende bewegingen met focus op flexibiliteit, coördinatie en een krachtige core.</p>
                    <a href="contact.php" class="card-link">BOEK NU <span>&rarr;</span></a>
                </div>
                <div class="bento-card">
                    <h3>Power Pilates</h3>
                    <p>Intensief, meer weerstand, sneller tempo. Voor wie zijn grenzen wil verleggen.</p>
                    <a href="contact.php" class="card-link">BOEK NU <span>&rarr;</span></a>
                </div>
                <div class="bento-card">
                    <h3>Early Bird Pilates</h3>
                    <p>Start je dag energiek met een ochtendles. Beweging en focus voor de rest van de dag.</p>
                    <a href="contact.php" class="card-link">BOEK NU <span>&rarr;</span></a>
                </div>
                <div class="bento-card">
                    <h3>Personal Pilates</h3>
                    <p>1-op-1 sessie op aanvraag, volledig afgestemd op jouw doelen.</p>
                    <a href="contact.php" class="card-link">BOEK NU <span>&rarr;</span></a>
                </div>
                <div class="bento-card">
                    <h3>Duo Pilates</h3>
                    <p>Train met z'n tweeën op aanvraag. Gezelligheid én gerichte aandacht.</p>
                    <a href="contact.php" class="card-link">BOEK NU <span>&rarr;</span></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Instagram Feed -->
    <section class="instagram-section">
        <div class="container">
            <div class="section-header reveal">
                <div class="section-tag">
                    <div class="line"></div>
                    <span>COMMUNITY</span>
                    <div class="line"></div>
                </div>
                <h2>Volg Ons</h2>
                <p style="max-width: 500px; margin: 0 auto;">Blijf op de hoogte van nieuwe lessen, sfeerbeelden en een kijkje achter de schermen bij Studio First Floor.</p>
            </div>
            <div class="instagram-grid reveal">
                <a href="https://instagram.com/pilatesstudiofirstfloor" target="_blank" rel="noopener" class="instagram-item">
                    <picture>
                        <source srcset="img/studio-1.webp" type="image/webp">
                        <img src="img/studio-1.jpg" alt="Studio First Floor" width="1254" height="1254" loading="lazy">
                    </picture>
                    <div class="ig-overlay">
                        <svg viewBox="0 0 24 24"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
                    </div>
                </a>
                <a href="https://instagram.com/pilatesstudiofirstfloor" target="_blank" rel="noopener" class="instagram-item">
                    <picture>
                        <source srcset="img/studio-2.webp" type="image/webp">
                        <img src="img/studio-2.jpg" alt="Pilates les" width="1254" height="1254" loading="lazy">
                    </picture>
                    <div class="ig-overlay">
                        <svg viewBox="0 0 24 24"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
                    </div>
                </a>
                <a href="https://instagram.com/pilatesstudiofirstfloor" target="_blank" rel="noopener" class="instagram-item">
                    <picture>
                        <source srcset="img/studio-3.webp" type="image/webp">
                        <img src="img/studio-3.jpg" alt="Studio sfeer" width="1080" height="1080" loading="lazy">
                    </picture>
                    <div class="ig-overlay">
                        <svg viewBox="0 0 24 24"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
                    </div>
                </a>
            </div>
            <a href="https://instagram.com/pilatesstudiofirstfloor" target="_blank" rel="noopener" class="instagram-cta">
                <svg viewBox="0 0 24 24"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
                @pilatesstudiofirstfloor
            </a>
        </div>
    </section>

    <!-- Over Renate -->
    <section style="background-color: var(--surface); border-top: 1px solid rgba(115, 93, 82, 0.1); border-bottom: 1px solid rgba(115, 93, 82, 0.1);">
        <div class="container">
            <div class="about-grid reveal">
                <div class="about-content">
                    <div class="section-tag" style="justify-content: flex-start;">
                        <div class="line"></div>
                        <span>OVER MIJ</span>
                    </div>
                    <h2>Hoi, ik ben Renate</h2>
                    <p>Pilates is voor mij niet zomaar een workout — het is een manier van leven. Jaren geleden, toen ik op zoek was naar balans tussen werk en welzijn, ontdekte ik de kracht van bewuste beweging. Het was liefde op het eerste gezicht.</p>
                    <p>Ik besloot mijn passie om te zetten in iets concreets: een plek waar kleinschaligheid, persoonlijke aandacht en kwaliteit centraal staan. Studio First Floor is mijn droom in vervulling.</p>
                    <div class="about-quote">
                        <p>"Iedereen verdient een moment voor zichzelf. Een plek waar je even alles loslaat en weer contact maakt met je lichaam. Dat is wat ik hier creëer."</p>
                    </div>
                    <p>Of je nu voor het eerst een mat uitrolt of al jaren ervaring hebt — hier voel je je thuis. Ik kijk ernaar uit om je te verwelkomen.</p>
                </div>
                <div class="about-image">
                    <div class="image-bg"></div>
                    <img src="img/placeholder-eigenaar.jpg" alt="Renate Emmen - eigenaar Studio First Floor" width="800" height="1000" loading="lazy">
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Box -->
    <section>
        <div class="container">
            <div class="cta-box reveal">
                <div class="shape-1"></div>
                <div class="shape-2"></div>
                <div class="cta-box-inner">
                    <span class="label-caps tag">KLEINE GROEPEN &mdash; BEGINNERS WELKOM</span>
                    <h2>Begin Jouw Reis Vandaag</h2>
                    <p>Ervaar de rust en de kracht van Studio First Floor zelf. Kom gratis kennismaken tijdens een proefles.</p>
                    <a href="contact.php" class="btn-hot" style="padding: 20px 40px;">PLAN JE GRATIS PROEFLES</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'inc/footer.php'; ?>
