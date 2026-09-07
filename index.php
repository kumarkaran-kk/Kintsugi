<?php

declare(strict_types=1);
require_once __DIR__ . '/config.php';

$products = [
    ['Royal Opulence', '₹ 16,495.00', 'image-07.png'],
    ['Gilded Grace', '₹ 14,995.00', 'image-18.png'],
    ['Royal Opulence Cup & Saucer', '₹ 5,495.00', 'image-14.png'],
    ['Heritage Bloom', '₹ 18,250.00', 'image-15.png'],
    ['Luxe Table Gold', '₹ 21,995.00', 'image-20.png'],
];

$categories = [
    ['Cutlery', 'cutlery', 10],
    ['Cup & Saucer', 'cup', 11],
    ['Dinnerware', 'dinnerware', 12],
    ['Snack Set', 'snack', 13],
    ['Dessertware', 'dessert', 14],
    ['Teaware', 'teaware', 16],
];

$lookProducts = [
    ['Royal Opulence Serving Bowl', '₹ 12,495.00', 'image-06.png', 17.5, 36.5],
    ['Luxe Table Gold', '₹ 21,995.00', 'image-20.png', 90.0, 47.5],
    ['Gilded Grace', '₹ 14,995.00', 'image-15.png', 5.5, 60.5],
    ['Royal Opulence', '₹ 16,495.00', 'image-07.png', 34.2, 71.0],
    ['Royal Opulence Cup & Saucer', '₹ 5,495.00', 'image-14.png', 77.0, 74.5],
];

$plateSlides = [
    'assets/figma/spectrum-plate-01.png',
    'assets/figma/spectrum-plate-02.png',
    'assets/figma/spectrum-plate-03.png',
    'assets/figma/spectrum-plate-04.png',
    'assets/figma/spectrum-plate-05.png',
];
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Kintsugi luxury tableware — crafted collections for exceptional homes.">
    <title>Kintsugi | Luxury Tableware</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Afacad:wght@400;500;600;700&family=Cormorant+Garamond:wght@500;600&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <header class="site-header" id="top">
        <button class="menu-toggle" aria-expanded="false" aria-controls="main-nav"><span></span><span></span></button>
        <nav id="main-nav" class="nav nav-left" aria-label="Primary navigation">
            <a href="#new">New</a><a href="#collections">Dinner Set</a><a href="#categories">Tableware</a>
        </nav>
        <a class="brand" href="#top" aria-label="Kintsugi home"><img src="kintsugi-logo.svg" alt="Kintsugi luxury tableware"></a>
        <nav class="nav nav-right" aria-label="Secondary navigation">
            <a href="#collections">Collections</a><a href="#new">Offers</a>
            <a class="header-icon" href="#" aria-label="Search"><svg viewBox="0 0 32 32" aria-hidden="true"><circle cx="13.5" cy="13.5" r="9.5"></circle><path d="m21 21 8 8"></path></svg></a>
        </nav>
    </header>

    <main>
        <section class="hero" aria-labelledby="hero-title">
            <img class="hero-bg" src="assets/figma/hero-clean.png" alt="Aureate Gold luxury dinnerware collection">
            <div class="hero-shade"></div>
            <div class="hero-copy">
                <h1 id="hero-title">Aureate Gold</h1>
                <a class="button button-light" href="<?= htmlspecialchars(INDIEKONNECT_STORE_URL) ?>" target="_blank" rel="noopener">More</a>
            </div>
        </section>

        <section class="intro section-pad">
            <p class="eyebrow">Dinner Sets</p>
            <h2>Handcrafted tableware for Indian homes</h2>
            <div class="intro-grid">
                <a class="intro-card" href="<?= htmlspecialchars(INDIEKONNECT_STORE_URL) ?>" target="_blank" rel="noopener">
                    <span class="intro-image"><img src="assets/figma/intro-dinner-set.png" alt="Kintsugi Aureate Gold dinner set"></span>
                    <span class="intro-title"><img src="assets/figma/intro-title-medallion.png" alt=""><b>Dinner Set</b><img src="assets/figma/intro-title-medallion.png" alt=""></span>
                </a>
                <a class="intro-card" href="<?= htmlspecialchars(INDIEKONNECT_STORE_URL) ?>" target="_blank" rel="noopener">
                    <span class="intro-image"><img src="assets/figma/intro-cup-saucer.png" alt="Kintsugi cup and saucer"></span>
                    <span class="intro-title"><img src="assets/figma/intro-title-medallion.png" alt=""><b>Cup &amp; Saucer</b><img src="assets/figma/intro-title-medallion.png" alt=""></span>
                </a>
                <a class="intro-card" href="<?= htmlspecialchars(INDIEKONNECT_STORE_URL) ?>" target="_blank" rel="noopener">
                    <span class="intro-image"><img src="assets/figma/image-20.png" alt="Kintsugi luxury gold cutlery set"></span>
                    <span class="intro-title"><img src="assets/figma/intro-title-medallion.png" alt=""><b>Cutlery Set</b><img src="assets/figma/intro-title-medallion.png" alt=""></span>
                </a>
            </div>
        </section>

        <section class="feature feature-luxe" id="collections">
            <div class="feature-copy">
                <h2>Kintsugi<br>Spectrum Luxe</h2>
                <p>Spectrum Luxe — a bold symphony of modern art.<br>A vibrant take on modern dining, featuring a stunning stained glass mosaic in bold hues, framed in 24k gold. This 47-piece set blends avant-garde design with fine Indian craftsmanship — perfect for those who see their table as art.</p>
                <p class="price">₹1,38,180</p>
                <p class="shipping-pill">Shipping:₹1,500</p>
                <a class="button" href="<?= htmlspecialchars(INDIEKONNECT_STORE_URL) ?>" target="_blank" rel="noopener">View</a>
            </div>
            <div class="plate-stage" data-plate-carousel data-slides="<?= htmlspecialchars(json_encode($plateSlides), ENT_QUOTES) ?>">
                <div class="plate-viewport plate-viewport-large">
                    <img class="plate-current" src="<?= $plateSlides[0] ?>" alt="Spectrum Luxe dinner plate">
                    <img class="plate-incoming" src="<?= $plateSlides[1] ?>" alt="" aria-hidden="true">
                </div>
                <div class="plate-viewport plate-viewport-small">
                    <img class="plate-current" src="<?= $plateSlides[1] ?>" alt="Spectrum Luxe side plate">
                    <img class="plate-incoming" src="<?= $plateSlides[2] ?>" alt="" aria-hidden="true">
                </div>
                <div class="plate-controls">
                    <button type="button" class="plate-arrow" data-plate-prev aria-label="Previous plate"><img src="assets/figma/spectrum-arrow-left.svg" alt=""></button>
                    <button type="button" class="plate-arrow" data-plate-next aria-label="Next plate"><img src="assets/figma/spectrum-arrow-right.svg" alt=""></button>
                </div>
                <div class="plate-dots" aria-label="Plate selection">
                    <?php foreach ($plateSlides as $index => $_): ?>
                        <button type="button" data-plate-dot="<?= $index ?>" class="<?= $index === 0 ? 'active' : '' ?>" aria-label="Show plate <?= $index + 1 ?>" aria-current="<?= $index === 0 ? 'true' : 'false' ?>"><img src="assets/figma/<?= $index === 0 ? 'spectrum-dot-active.svg' : 'spectrum-dot.svg' ?>" alt=""></button>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="story-grid">
            <article class="story-image"><img src="assets/figma/dinner-reference.jpg" alt="Premium dinner set collection"></article>
            <article class="story-copy"><span class="eyebrow">Handcrafted tableware for Indian homes</span>
                <h2>Premium<br>Dinner Sets</h2>
                <p>Explore dinnerware and modern dinner sets<br>for everyday dining, festive hosting and gifting.</p><a class="button" href="<?= htmlspecialchars(INDIEKONNECT_STORE_URL) ?>" target="_blank" rel="noopener">View</a>
            </article>
            <article class="story-copy"><span class="eyebrow">Crafted for every tea moment</span>
                <h2>Handcrafted<br>Tea Sets</h2>
                <p>Explore dinnerware and modern dinner sets<br>for everyday dining, festive hosting and gifting.</p><a class="button" href="<?= htmlspecialchars(INDIEKONNECT_STORE_URL) ?>" target="_blank" rel="noopener">View</a>
            </article>
            <article class="story-image"><img src="assets/figma/tea-reference.jpg" alt="Handcrafted tea set design"></article>
        </section>

        <section class="category-section section-pad" id="categories">
            <div class="ornate-panel">
                <h2>Shop by Category</h2>
                <div class="category-grid">
                    <?php foreach ($categories as [$name, $icon, $group]): ?>
                        <a class="category-card category-<?= $icon ?>" href="<?= htmlspecialchars(INDIEKONNECT_STORE_URL) ?>" target="_blank" rel="noopener">
                            <span class="category-icon" aria-hidden="true">
                                <span class="category-state category-state-idle"><img src="assets/figma/group-<?= $group ?>-idle.png" alt=""></span>
                                <span class="category-state category-state-hover"><img src="assets/figma/group-<?= $group ?>-hover.png" alt=""></span>
                            </span>
                            <span class="category-name"><?= htmlspecialchars($name) ?></span>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="look section-pad">
            <h2>Shop the Look</h2>
            <div class="look-grid" data-shop-look>
                <div class="look-scene">
                    <img src="assets/figma/look-reference.jpg" alt="A styled Royal Opulence dining table">
                    <?php foreach ($lookProducts as $index => [$name, $price, $image, $x, $y]): ?>
                        <button class="look-hotspot<?= $index === 3 ? ' active' : '' ?>" type="button"
                            style="--hotspot-x:<?= $x ?>%;--hotspot-y:<?= $y ?>%"
                            data-look-index="<?= $index ?>"
                            data-name="<?= htmlspecialchars($name) ?>"
                            data-price="<?= htmlspecialchars($price) ?>"
                            data-image="assets/figma/<?= htmlspecialchars($image) ?>"
                            aria-label="View <?= htmlspecialchars($name) ?>"
                            aria-pressed="<?= $index === 3 ? 'true' : 'false' ?>"><span></span></button>
                    <?php endforeach; ?>
                </div>
                <div class="look-product" aria-live="polite">
                    <div class="look-product-image"><img data-look-image src="assets/figma/image-07.png" alt="Royal Opulence"></div>
                    <p data-look-price>₹ 16,495.00</p>
                    <h3 data-look-name>Royal Opulence</h3>
                    <a class="button" data-look-link href="<?= htmlspecialchars(INDIEKONNECT_STORE_URL) ?>" target="_blank" rel="noopener">View this product</a>
                </div>
            </div>
        </section>

        <section class="new section-pad" id="new">
            <h2>What’s New</h2>
            <div class="product-row">
                <?php foreach ($products as [$name, $price, $image]): ?>
                    <article class="product" tabindex="0">
                        <span class="product-image">
                            <img src="assets/figma/<?= htmlspecialchars($image) ?>" alt="<?= htmlspecialchars($name) ?>">
                            <span class="product-actions">
                                <a class="product-action product-action-bag" href="<?= htmlspecialchars(INDIEKONNECT_STORE_URL) ?>" target="_blank" rel="noopener" aria-label="Add <?= htmlspecialchars($name) ?> to bag">Add to bag</a>
                                <a class="product-action product-action-buy" href="<?= htmlspecialchars(INDIEKONNECT_STORE_URL) ?>" target="_blank" rel="noopener" aria-label="Buy <?= htmlspecialchars($name) ?> now">Buy now</a>
                            </span>
                        </span>
                        <p><?= htmlspecialchars($price) ?></p>
                        <h3><?= htmlspecialchars($name) ?></h3>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="editorial"><img src="assets/figma/editorial-reference.jpg" alt="Tea time with Kintsugi">
            <div class="editorial-panel">
                <div class="editorial-copy">
                    <h2>Tea Time<br>Shenananigans</h2>
                    <p>Crafted with uncompromising quality and timeless designs, discover Vigneto&rsquo;s elegant teaware that turns every tea time into a luxurious moment!</p>
                    <a class="button" href="<?= htmlspecialchars(INDIEKONNECT_STORE_URL) ?>" target="_blank" rel="noopener">View</a>
                </div>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="footer-main">
            <div class="footer-brand">
                <img src="kintsugi-logo.svg" alt="Kintsugi">
                <p>We'll write to you only when the<br>feeling is right - stories worth<br>keeping, journeys worth dreaming.</p>
            </div>
            <nav class="footer-column footer-categories" aria-label="Product categories">
                <h3>Categories</h3><a href="#categories">Cutlery</a><a href="#categories">Dessert Cups</a><a href="#categories">Coffee Mugs</a><a href="#categories">6 Pcs Mug Set</a><a href="#categories">Dinner Set</a><a href="#categories">Snack Set</a><a href="#categories">Dessert Stands</a><a href="#categories">Cup and Saucer Set</a><a href="#categories">Tea Set</a><a href="#categories">Soup Set</a>
            </nav>
            <nav class="footer-column footer-quick" aria-label="Quick links">
                <h3>Quick Links</h3><a href="<?= htmlspecialchars(INDIEKONNECT_STORE_URL) ?>" target="_blank" rel="noopener">All Products</a><a href="#">Track Order</a><a href="mailto:hello@kintsugi.in">Contact Us</a><a href="<?= htmlspecialchars(INDIEKONNECT_STORE_URL) ?>" target="_blank" rel="noopener">Bulk Orders &amp; Corporate Gifting</a><a href="#">Gift Card</a><a href="#">Terms of Service</a><a href="#">Refund policy</a>
            </nav>
            <nav class="footer-column footer-help" aria-label="Help links">
                <h3>Help</h3><a href="#">Shipping</a><a href="#">FAQ</a><a href="#">Returns</a><a href="#">Privacy Policy</a><a href="#">Terms and Conditions</a><a href="#">About Us</a>
            </nav>
            <div class="footer-tableware" aria-hidden="true"></div>
        </div>
        <div class="footer-bar"><span class="footer-copyright">2026 Fabius All rights reserved</span><span class="footer-payments" role="img" aria-label="Accepted payment methods"></span><span class="footer-legal"><a href="#">Terms And Condition</a><i></i><a href="#">Privacy Policy</a></span></div>
    </footer>
    <script src="assets/js/main.js"></script>
</body>

</html>
