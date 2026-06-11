---
name: Serene Strength
colors:
  surface: '#fef8f7'
  surface-dim: '#ded9d8'
  surface-bright: '#fef8f7'
  surface-container-lowest: '#ffffff'
  surface-container-low: '#f8f2f1'
  surface-container: '#f2edec'
  surface-container-high: '#ece7e6'
  surface-container-highest: '#e6e1e0'
  on-surface: '#1d1b1b'
  on-surface-variant: '#4e4543'
  inverse-surface: '#323030'
  inverse-on-surface: '#f5f0ef'
  outline: '#807573'
  outline-variant: '#d1c3c2'
  surface-tint: '#665c5b'
  primary: '#665c5b'
  on-primary: '#ffffff'
  primary-container: '#f9eae8'
  on-primary-container: '#736967'
  inverse-primary: '#d1c3c2'
  secondary: '#b60055'
  on-secondary: '#ffffff'
  secondary-container: '#e4006c'
  on-secondary-container: '#fffbff'
  tertiary: '#5b5f5d'
  on-tertiary: '#ffffff'
  tertiary-container: '#ebeeeb'
  on-tertiary-container: '#686c6a'
  error: '#ba1a1a'
  on-error: '#ffffff'
  error-container: '#ffdad6'
  on-error-container: '#93000a'
  primary-fixed: '#eedfdd'
  primary-fixed-dim: '#d1c3c2'
  on-primary-fixed: '#211a19'
  on-primary-fixed-variant: '#4e4543'
  secondary-fixed: '#ffd9e0'
  secondary-fixed-dim: '#ffb1c3'
  on-secondary-fixed: '#3f0019'
  on-secondary-fixed-variant: '#8f0041'
  tertiary-fixed: '#e0e3e0'
  tertiary-fixed-dim: '#c4c7c4'
  on-tertiary-fixed: '#181c1b'
  on-tertiary-fixed-variant: '#444846'
  background: '#fef8f7'
  on-background: '#1d1b1b'
  surface-variant: '#e6e1e0'
  taupe-brown: '#735D52'
  muted-rose: '#C5A8A4'
  charcoal-ink: '#1A1A1A'
typography:
  display-lg:
    fontFamily: Playfair Display
    fontSize: 64px
    fontWeight: '600'
    lineHeight: '1.1'
    letterSpacing: -0.02em
  headline-lg:
    fontFamily: Playfair Display
    fontSize: 40px
    fontWeight: '500'
    lineHeight: '1.2'
  headline-lg-mobile:
    fontFamily: Playfair Display
    fontSize: 32px
    fontWeight: '500'
    lineHeight: '1.2'
  title-md:
    fontFamily: Playfair Display
    fontSize: 24px
    fontWeight: '400'
    lineHeight: '1.4'
  body-lg:
    fontFamily: Manrope
    fontSize: 18px
    fontWeight: '300'
    lineHeight: '1.6'
  body-md:
    fontFamily: Manrope
    fontSize: 16px
    fontWeight: '400'
    lineHeight: '1.6'
  label-caps:
    fontFamily: Manrope
    fontSize: 12px
    fontWeight: '600'
    lineHeight: '1.0'
    letterSpacing: 0.15em
spacing:
  unit: 4px
  container-max: 1200px
  gutter: 24px
  margin-mobile: 20px
  section-gap: 120px
---

## Brand & Style

The brand identity centers on the intersection of boutique luxury and personal wellness. It evokes the feeling of a "sanctuary on the first floor"—a private, elevated space where clients transition from the noise of the outside world into a state of focused tranquility. The aesthetic is chic and editorial, combining the softness of a high-end spa with the disciplined precision of a professional Pilates studio.

The design style is **Minimalist-Chic with High-Contrast Accents**. It utilizes expansive white space and a soft, tonal base to create a "breathable" UI, while employing strict, razor-sharp geometry to signal professional rigor and structural strength. There is a deliberate tension between the delicate typography and the aggressive, unyielding squareness of the layout elements.

## Colors

The palette is built on a foundation of "Blush Serenity." The primary background is a very pale, warm pink that feels more like a textured paper than a flat digital color. Neutrality is provided by a sophisticated Taupe-Brown (derived from the logo) and a deep Charcoal-Ink for maximum legibility.

The "Pop" of energy is delivered via a vibrant Hot Pink. This color is used sparingly but decisively for Call-to-Actions (CTAs) and critical highlights, representing the "vitality" and "strength" found within the studio’s practice.

- **Primary:** Soft Blush for large surfaces and backgrounds.
- **Secondary:** Hot Pink for action-oriented elements and high-energy moments.
- **Named Colors:** Used for secondary text, decorative lines, and deep contrast.

## Typography

The typography strategy reflects a "boutique editorial" vibe. **Playfair Display** provides high-end elegance for headlines, using its delicate serifs to convey a sense of history and premium service. It should be used in its italic variant for pull-quotes or sub-captions to increase the "personal" and "chic" feel.

**Manrope** serves as the functional counterpart. Chosen for its modern, clean, and balanced proportions, it ensures that professional information remains clear and grounded. Body text should maintain a light weight to preserve the airy, tranquil mood of the design system.

## Layout & Spacing

This design system employs a **Fixed Grid** on desktop and a **Fluid Grid** on mobile. The layout is characterized by "intentional emptiness"—large margins and generous section gaps (120px+) to allow the content to breathe and the user to feel a sense of calm.

Elements are aligned to a strict 12-column grid. To maintain the "First Floor" theme, layouts should favor verticality and clean horizontal dividers. Avoid overlapping elements; instead, use clear, structured blocks that emphasize the studio's professional and disciplined approach to Pilates.

## Elevation & Depth

To maintain the chic, high-end feel, this system rejects shadows entirely in favor of **Tonal Layers and Bold Outlines**. Depth is created through:
1.  **Color Blocking:** Darker taupe or muted rose blocks sitting atop the blush background.
2.  **Fine Lines:** 1px solid dividers using `taupe-brown` at low opacity to separate content sections without adding "weight."
3.  **High-Contrast Overlays:** Text and CTAs gain "depth" through color contrast (Hot Pink against Blush) rather than physical simulation.

The UI should feel like a high-quality physical magazine: flat, tactile, and crisp.

## Shapes

The geometry of the design system is unapologetically **Sharp**. There are zero rounded corners in the interface. Every button, input field, card, and image container must have a 90-degree angle. This "strict" geometry serves as a visual metaphor for the precision of Pilates and the structural integrity of the human body. It contrasts beautifully with the "soft" color palette and "elegant" serif typography.

## Components

### Buttons
Primary CTAs must be solid **Hot Pink** with white text, utilizing the `label-caps` typography style. They are strictly rectangular with no border-radius. Secondary buttons use a `taupe-brown` 1px border with no fill.

### Input Fields
Inputs are defined by a 1px bottom border only, creating a clean, "form-like" appearance that avoids boxing in the user. Labels should use the `label-caps` style for a professional, organized look.

### Cards
Cards for coaching packages or class types should have no shadows. Instead, use a subtle background fill of `muted-rose` at 10% opacity or a solid 1px border. The content within cards should be heavily inset to emphasize the minimalist aesthetic.

### Lists
Lists for class benefits or schedules should use fine horizontal dividers (1px taupe) between items. Bullets, if used, should be small solid squares rather than circles.

### Chips/Tags
Used for class levels (e.g., "Beginner," "Advanced"). These should be small, square-edged boxes with a light taupe background and dark taupe text.