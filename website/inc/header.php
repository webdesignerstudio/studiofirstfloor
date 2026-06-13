<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
$canonical = isset($canonicalUrl) ? $canonicalUrl : 'https://studiofirstfloor.nl/' . basename($_SERVER['PHP_SELF']);
$desc = isset($pageDescription) ? $pageDescription : "Studio First Floor — Pilates Studio. Kracht, Rust & Stijl in 's Gravenmoer.";
$ogImage = isset($pageImage) ? $pageImage : 'https://studiofirstfloor.nl/img/hero.png';
?>
    <title><?php echo isset($pageTitle) ? $pageTitle . ' | Studio First Floor' : 'Studio First Floor'; ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($desc); ?>">
    <link rel="canonical" href="<?php echo $canonical; ?>">

    <!-- Open Graph -->
    <meta property="og:title" content="<?php echo isset($pageTitle) ? $pageTitle . ' | Studio First Floor' : 'Studio First Floor'; ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($desc); ?>">
    <meta property="og:type" content="<?php echo isset($ogType) ? $ogType : 'website'; ?>">
    <meta property="og:url" content="<?php echo $canonical; ?>">
    <meta property="og:image" content="<?php echo $ogImage; ?>">
    <meta property="og:locale" content="nl_NL">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo isset($pageTitle) ? $pageTitle . ' | Studio First Floor' : 'Studio First Floor'; ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($desc); ?>">
    <meta name="twitter:image" content="<?php echo $ogImage; ?>">

    <!-- JSON-LD Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "LocalBusiness",
        "name": "Studio First Floor",
        "description": "Pilates Studio in 's Gravenmoer. Kracht, Rust & Stijl.",
        "url": "https://studiofirstfloor.nl",
        "telephone": "+31637528238",
        "email": "info@studiofirstfloor.nl",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Emmalaan 1F",
            "addressLocality": "'s Gravenmoer",
            "postalCode": "5109 TA",
            "addressCountry": "NL"
        },
        "openingHours": [
            "Mo-Fr 08:00-20:00",
            "Sa 09:00-13:00"
        ],
        "image": "https://studiofirstfloor.nl/img/hero.png"
    }
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Manrope:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="preload" href="css/style.min.css" as="style">
    <link rel="stylesheet" href="css/style.min.css">
</head>
<body>
