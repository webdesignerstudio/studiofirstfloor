# Studio First Floor — 5 Design Variaties

Vijf complete website variaties zijn gebouwd en klaar voor review. Alle variaties gebruiken dezelfde content (tekstdocument + studiofoto's) maar elk heeft een eigen visuele identiteit.

---

## Overzicht

| # | Variatie | Sfeer | Best voor | Bron |
|---|----------|-------|-----------|------|
| 1 | **A — Soft Minimal** | Serene, elegant, spa-achtig | Luxe uitstraling, rustige beleving | AI (Persona: Minimalist) |
| 2 | **B — Bold Editorial** | Krachtig, modern, confident | Onmiddellijke impact, duidelijke structuur | AI (Persona: Bold Editor) |
| 3 | **C — Warm Craft** | Knus, persoonlijk, artisanal | Warme connectie, menselijke touch | AI (Persona: Warm Craft) |
| 4 | **Stitch 1 — Serene Balance** | Tactile, editorial, premium wellness | Gallery-aesthetic, serene spa-ervaring | Google Stitch AI |
| 5 | **Stitch 2 — Serene Strength** | Minimalist-chic, high-contrast | Boutique editorial, sharp & confident | Google Stitch AI |

---

## Variatie A — Soft Minimal

**Persona:** De Minimalist

**Kenmerken:**
- Veel witruimte en luchtige secties (120px padding)
- Cormorant Garamond serif + Inter sans-serif
- Zacht poederroze (`#F5E6E8`) en warm zand (`#C9B8A5`)
- Full-bleed afbeeldingen met gradient overlays
- Tabellarische prijsweergave (tabel ipv kaarten)
- Elegante lijnen als sectie-scheidingen

**Unieke elementen:**
- Hero is centered met gradient background ipv afbeelding
- Prijzen in een clean table layout
- Footer met logo als tekst (geen afbeelding)
- Full-screen mobile menu

---

## Variatie B — Bold Editorial

**Persona:** De Bold Editor

**Kenmerken:**
- Grote, statement headings in uppercase
- Space Grotesk geometrisch font
- Split-screen hero (50/50 tekst/afbeelding)
- Nummers als design element (01, 02, 03...)
- Strakke rechte hoeken overal
- Knalroze (`#FF1493`) gebruikt spaarzaam maar krachtig

**Unieke elementen:**
- Hero heeft afbeelding rechts, tekst links
- Aanbod als genummerde lijst (01-04)
- Featured pricing card met dikke bovenlijn
- Contact pagina met side-by-side layout
- Sticky header met border

---

## Variatie C — Warm Craft

**Persona:** De Warm Craft

**Kenmerken:**
- Warme aardetinten (crème, terracotta, poeder)
- Playfair Display + DM Sans + Inter
- Subtiele textuur/graan in achtergrond
- "Handwritten" accenten (italics) voor quotes
- Masonry-style card grid met verschillende hoogtes
- Ronde iconen met letters (R, M, C, I)

**Unieke elementen:**
- Hero met overlappende afbeeldingen op achtergrond
- Featured prijskaart met "Populair" badge
- Warme gradient achtergronden
- SF logo icoon in navigatie en footer
- Zachte, diffuse schaduwen

---

## Technische Details

**Structuur per variatie:**
```
/variatie-[a/b/c]/
  index.php          → Home
  aanbod.php         → Aanbod
  tarieven.php       → Tarieven
  contact.php        → Contact
  inc/
    header.php       → Head + fonts
    nav.php          → Header + navigatie
    footer.php       → Footer
  css/
    style.css        → Alle styles
  js/
    main.js          → Nav + reveal animations
```

**Shared resources:**
- Afbeeldingen: `/website/img/` (logo.jpg, studio-1.jpg, studio-2.jpg, studio-3.jpg)
- Alle variaties laden afbeeldingen uit `../img/`

**Technologie:**
- PHP 8.x (includes voor herbruikbare componenten)
- CSS3 (custom properties, grid, flexbox)
- Vanilla JS (IntersectionObserver, mobile menu)
- Google Fonts
- Mobile-first responsive design

---

## Preview Links

| Variatie | URL |
|----------|-----|
| **A — Soft Minimal** | `http://127.0.0.1:8081` |
| **B — Bold Editorial** | `http://127.0.0.1:8082` |
| **C — Warm Craft** | `http://127.0.0.1:8083` |
| **Stitch 1 — Serene Balance** | `http://127.0.0.1:8084` |
| **Stitch 2 — Serene Strength** | `http://127.0.0.1:8085` |

Klik op "Open in Browser" bij de previews om de sites te bekijken.

---

## Stitch 1 — Serene Balance (Google Stitch Design)

**Kenmerken:**
- Libre Caslon Text (literary serif) + Hanken Grotesk (clean sans)
- Warm white `#fff8f4`, serene blush `#F9F1F0`, deep taupe `#333232`, primary sand `#6e5b45`
- Soft hoeken (2px–8px)
- Hero met full-screen afbeelding + overlay
- Philosophy quote met decoratieve lijnen
- Bento-grid about sectie
- Schedule list met dag/a-tijd rijen
- Tactile, premium wellness aesthetic

**Unieke elementen:**
- Fixed grid layout (12-col, 24px gutters)
- Geen schaduwen — tonal layers voor diepte
- Center-aligned service cards
- Underline-style input fields
- Gallery-like presentatie

---

## Stitch 2 — Serene Strength (Google Stitch Design)

**Kenmerken:**
- Playfair Display (boutique serif) + Manrope (modern sans)
- Blush serenity `#fef8f7`, taupe-brown `#735D52`, hot pink `#FF007F`, charcoal `#1A1A1A`
- **ZERO rounded corners** overal — 100% rechte hoeken
- Hero met full-bleed afbeelding + 40% overlay
- Split-screen intro (afbeelding + content)
- Bento-grid diensten met hover states
- CTA box met geometrische decoratieve shapes
- Strict 12-column grid

**Unieke elementen:**
- Hot Pink als energieke accentkleur voor CTAs
- 1px fine lines als dividers (taupe at 20% opacity)
- High-contrast: Hot Pink tegen Blush
- Square-edged everything — zero border-radius
- Material Symbols icons
- Geometrische shapes als decoratieve elementen

---

## Keuzeadvies

**Kies Variatie A als:**
- Je een high-end, luxe spa-achtige uitstraling wilt
- Je klanten een serene, kalmerende ervaring moeten hebben
- Je houdt van veel witruimte en elegantie

**Kies Variatie B als:**
- Je directe impact en duidelijkheid belangrijk vindt
- Je een moderne, krachtige uitstraling wilt
- Je houdt van strakke lijnen en geometrische vormen

**Kies Variatie C als:**
- Je een warme, persoonlijke uitstraling wilt
- Je het knusse karakter van de studio wilt benadrukken
- Je houdt van een menselijke, artisanal touch

**Kies Stitch 1 — Serene Balance als:**
- Je een tactile, editorial wellness experience wilt
- Je houdt van gallery-like layouts en serene sfeer
- Je wilt een premium, spa-achtige digitale ervaring

**Kies Stitch 2 — Serene Strength als:**
- Je een boutique-chic, high-contrast design wilt
- Je houdt van sharp geometry en zero rounding
- Je wilt hot pink accenten met een luxe, magazine-aesthetic

---

## Volgende stappen

1. **Bekijk alle 5 previews** via de links hierboven
2. **Kies de variatie** die het beste bij je past
3. **Geef aanpassingen door** (kleuren, teksten, layout, pagina's)
4. Ik implementeer de gekozen variatie als definitieve website

Alle vijf de variaties zijn volledig functioneel met 4 pagina's (Home, Aanbod, Tarieven, Contact), responsive design, en kunnen direct live gezet worden op traditionele PHP hosting.
