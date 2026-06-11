---
name: Serene Balance
colors:
  surface: '#fff8f4'
  surface-dim: '#dfd9d5'
  surface-bright: '#fff8f4'
  surface-container-lowest: '#ffffff'
  surface-container-low: '#f9f2ef'
  surface-container: '#f3ede9'
  surface-container-high: '#ede7e3'
  surface-container-highest: '#e8e1de'
  on-surface: '#1d1b19'
  on-surface-variant: '#4d453d'
  inverse-surface: '#33302e'
  inverse-on-surface: '#f6efec'
  outline: '#7f756c'
  outline-variant: '#d0c4ba'
  surface-tint: '#6e5b45'
  primary: '#6e5b45'
  on-primary: '#ffffff'
  primary-container: '#b59e85'
  on-primary-container: '#453522'
  inverse-primary: '#dbc2a8'
  secondary: '#655d57'
  on-secondary: '#ffffff'
  secondary-container: '#e9ddd6'
  on-secondary-container: '#69615c'
  tertiary: '#555f6c'
  on-tertiary: '#ffffff'
  tertiary-container: '#98a3b1'
  on-tertiary-container: '#2f3945'
  error: '#ba1a1a'
  on-error: '#ffffff'
  error-container: '#ffdad6'
  on-error-container: '#93000a'
  primary-fixed: '#f8dec3'
  primary-fixed-dim: '#dbc2a8'
  on-primary-fixed: '#261908'
  on-primary-fixed-variant: '#554430'
  secondary-fixed: '#ece0d9'
  secondary-fixed-dim: '#d0c4be'
  on-secondary-fixed: '#201a16'
  on-secondary-fixed-variant: '#4d4540'
  tertiary-fixed: '#d8e3f3'
  tertiary-fixed-dim: '#bcc7d6'
  on-tertiary-fixed: '#121c27'
  on-tertiary-fixed-variant: '#3d4854'
  background: '#fff8f4'
  on-background: '#1d1b19'
  surface-variant: '#e8e1de'
  deep-taupe: '#333232'
  serene-blush: '#F9F1F0'
  warm-white: '#FDFBF9'
typography:
  display-lg:
    fontFamily: Libre Caslon Text
    fontSize: 64px
    fontWeight: '400'
    lineHeight: '1.1'
    letterSpacing: -0.02em
  headline-lg:
    fontFamily: Libre Caslon Text
    fontSize: 40px
    fontWeight: '400'
    lineHeight: '1.2'
  headline-lg-mobile:
    fontFamily: Libre Caslon Text
    fontSize: 32px
    fontWeight: '400'
    lineHeight: '1.2'
  headline-md:
    fontFamily: Libre Caslon Text
    fontSize: 28px
    fontWeight: '400'
    lineHeight: '1.3'
  body-lg:
    fontFamily: Hanken Grotesk
    fontSize: 18px
    fontWeight: '400'
    lineHeight: '1.6'
  body-md:
    fontFamily: Hanken Grotesk
    fontSize: 16px
    fontWeight: '400'
    lineHeight: '1.6'
  label-caps:
    fontFamily: Hanken Grotesk
    fontSize: 12px
    fontWeight: '600'
    lineHeight: '1.2'
    letterSpacing: 0.15em
  label-md:
    fontFamily: Hanken Grotesk
    fontSize: 14px
    fontWeight: '500'
    lineHeight: '1.4'
rounded:
  sm: 0.125rem
  DEFAULT: 0.25rem
  md: 0.375rem
  lg: 0.5rem
  xl: 0.75rem
  full: 9999px
spacing:
  unit: 8px
  container-max: 1280px
  gutter: 24px
  margin-desktop: 64px
  margin-mobile: 20px
  section-gap: 120px
---

## Brand & Style

The design system for **Studio First Floor** is built upon the pillars of balance, strength, and tranquility. It caters to a discerning audience seeking an exclusive, premium wellness experience that transcends typical fitness "grind" culture. The visual language is deeply rooted in **Minimalism** with a **Tactile** warmth, evoking the physical space of a high-end Pilates studio.

The aesthetic prioritizes airy compositions and a "breathable" interface. By leveraging significant whitespace and a soft, organic color palette, the UI creates a digital sanctuary that reflects the calming atmosphere of a private session. The tone is authoritative yet gentle, professional yet inviting.

## Colors

The palette is derived from natural, earthy tones found in the studio's physical environment—warm plaster, soft wood, and muted upholstery.

- **Primary:** A refined sand/taupe used for key accents, active states, and structural elements.
- **Secondary:** A lighter, desaturated clay used for secondary surfaces and soft containers.
- **Backgrounds:** `warm-white` serves as the canvas for the entire system, while `serene-blush` provides subtle section differentiation.
- **Typography:** `deep-taupe` is used for all text to maintain high legibility without the harshness of pure black, preserving the "soft-contrast" luxury feel.

## Typography

The typographic strategy pairs a timeless serif for storytelling and impact with a modern, high-legibility sans-serif for functional content.

- **Headlines:** Use **Libre Caslon Text**. This font brings a literary, editorial quality to the brand. Headlines should be set with generous leading to feel unhurried.
- **Body & Functional:** Use **Hanken Grotesk**. Its clean, contemporary proportions ensure clarity in schedules and coaching details.
- **Micro-copy:** Small labels and navigation items should use `label-caps` to provide a rhythmic, organized structure to the information hierarchy.

## Layout & Spacing

This design system utilizes a **Fixed Grid** approach for desktop to maintain a controlled, gallery-like presentation. 

- **Grid Model:** A 12-column grid with wide gutters (24px) allows for asymmetrical layouts that feel dynamic yet balanced.
- **Section Pacing:** Vertical rhythm is intentionally slow. Large `section-gap` values (120px+) are encouraged to prevent the user from feeling overwhelmed and to highlight the "studio" atmosphere.
- **Mobile Adaptivity:** On mobile, margins tighten to 20px, and the grid collapses to a single column. Vertical spacing is reduced to 64px between sections to maintain momentum on smaller viewports.

## Elevation & Depth

To maintain a serene and flat aesthetic, traditional drop shadows are strictly avoided. Depth is conveyed through **Tonal Layers** and subtle contrast.

- **Surface Tiers:** Use `serene-blush` surfaces over `warm-white` backgrounds to indicate floating panels or grouped content.
- **Low-Contrast Outlines:** Where separation is required (e.g., input fields), use a 1px border in `primary` at 20% opacity.
- **Imagery:** Depth is primarily introduced through photography. High-quality, warm-toned imagery of the studio space provides the "visual weight" that shadows typically offer.

## Shapes

The shape language is **Soft (0.25rem)**. While the overall vibe is minimalist and structured, the slight rounding of corners prevents the UI from feeling "sharp" or clinical.

- **Small elements:** Buttons and input fields use the base `rounded` (4px).
- **Large elements:** Cards and image containers use `rounded-lg` (8px) to soften the large visual masses.
- **Interactive:** Selection indicators (radio/checkbox) should use circular forms to echo the "balance" theme.

## Components

### Buttons
- **Primary:** Solid `deep-taupe` background with `warm-white` text. Rectangular with minimal rounding. No icons, just centered text in `label-caps`.
- **Secondary:** `primary` color border (1px) with `deep-taupe` text. 

### Cards
- Cards should have no borders or shadows. Use a subtle background fill of `serene-blush`. 
- Content inside cards should be center-aligned to reinforce the theme of "balance."

### Input Fields
- Underline style is preferred over fully boxed inputs to maintain a lightweight feel. 
- Active state transitions the underline from 10% opacity `deep-taupe` to 100% `primary`.

### Navigation
- Top-level navigation items are set in `label-caps` with wide letter spacing.
- Hover states use a simple fade-in/fade-out of a subtle underline.

### Specialized Components
- **The "Philosophy" Quote:** A full-width component featuring a single sentence in `display-lg`, center-aligned, with a decorative horizontal line above and below using the `primary` color.
- **Schedule List:** A minimalist list using `body-md`. Rows are separated by 1px dividers in `primary` (20% opacity), with the time of the class set in `label-caps`.