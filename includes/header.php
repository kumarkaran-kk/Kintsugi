<?php

declare(strict_types=1);

$pageTitle = $pageTitle ?? 'Luxury Tableware';
$pageDescription = $pageDescription ?? 'Kintsugi luxury tableware — crafted collections for exceptional homes.';
$pageKey = $pageKey ?? '';
$bodyClass = $bodyClass ?? ($pageKey === 'home' ? 'home-page' : 'inner-page');

function nav_active(string $key, string $currentPage): string
{
    return $key === $currentPage ? ' class="active" aria-current="page"' : '';
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-KZWXSXKC');</script>
    <!-- End Google Tag Manager -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= htmlspecialchars($pageDescription) ?>">
    <title><?= htmlspecialchars($pageTitle) ?> | Kintsugi</title>
    <link rel="icon" href="assets/images/brand/kintsugi-logo.svg" type="image/svg+xml">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Afacad:wght@400;500;600;700&family=Cormorant+Garamond:wght@500;600&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="<?= htmlspecialchars($bodyClass) ?>">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KZWXSXKC"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <header class="site-header" id="top">
        <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="main-nav" aria-label="Open navigation"><span></span><span></span></button>
        <nav id="main-nav" class="nav nav-left" aria-label="Primary navigation">
            <a href="index.php"<?= nav_active('home', $pageKey) ?>>Home</a>
            <a href="house.php"<?= nav_active('house', $pageKey) ?>>The House</a>
            <span class="nav-dropdown">
                <a href="collections.php"<?= nav_active('collections', $pageKey) ?>>Collections</a>
                <span class="nav-submenu">
                    <a href="dining.php">Dining</a>
                    <a href="kitchen.php">Kitchen</a>
                    <a href="serveware.php">Serveware</a>
                    <a href="gifting.php">Gifting</a>
                </span>
            </span>
            <a class="mobile-nav-only" href="craftsmanship.php"<?= nav_active('craftsmanship', $pageKey) ?>>Craftsmanship</a>
            <a class="mobile-nav-only" href="contact.php"<?= nav_active('contact', $pageKey) ?>>Contact</a>
        </nav>
        <a class="brand" href="index.php" aria-label="Kintsugi home"><img src="assets/images/brand/kintsugi-logo.svg" alt="Kintsugi luxury tableware" width="454" height="186"></a>
        <nav class="nav nav-right" aria-label="Secondary navigation">
            <a href="craftsmanship.php"<?= nav_active('craftsmanship', $pageKey) ?>>Craftsmanship</a>
            <a href="contact.php"<?= nav_active('contact', $pageKey) ?>>Contact</a>
            <a class="header-icon<?= $pageKey === 'search' ? ' active' : '' ?>" href="search.php" aria-label="Search Kintsugi"><svg viewBox="0 0 32 32" aria-hidden="true"><circle cx="13.5" cy="13.5" r="9.5"></circle><path d="m21 21 8 8"></path></svg></a>
        </nav>
    </header>
