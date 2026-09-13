<?php

declare(strict_types=1);
require_once __DIR__ . '/config.php';

$products = kintsugi_products();

$categories = [
    ['Cutlery', 'cutlery'],
    ['Cup & Saucer', 'cup-saucer'],
    ['Dinnerware', 'dinnerware'],
    ['Snack Set', 'snack-set'],
    ['Dessertware', 'dessertware'],
    ['Teaware', 'teaware'],
];

$lookProduct = $products['royal-opulence'];

$plateSlides = [
    'assets/images/home/spectrum-plate-01.webp',
    'assets/images/home/spectrum-plate-02.webp',
    'assets/images/home/spectrum-plate-03.webp',
    'assets/images/home/spectrum-plate-04.webp',
    'assets/images/home/spectrum-plate-05.webp',
];
$pageTitle = 'Luxury Tableware';
$pageDescription = 'Beauty lives in the everyday. Discover Kintsugi tableware for moments worth gathering around.';
$pageKey = 'home';
require __DIR__ . '/includes/header.php';
?>
    <main>
        <section class="hero" aria-labelledby="hero-title">
            <img class="hero-bg" src="assets/images/home/hero-aureate-gold.webp" alt="Aureate Gold luxury dinnerware collection" width="1842" height="854" fetchpriority="high">
            <div class="hero-shade"></div>
            <div class="hero-copy">
                <h1 id="hero-title">Aureate Gold</h1>
                <a class="button button-light" href="collections.php">Explore</a>
            </div>
        </section>

        <section class="intro section-pad">
            <p class="eyebrow">Dinner Sets</p>
            <h2>Handcrafted tableware for Indian homes</h2>
            <div class="intro-grid">
                <a class="intro-card" href="dining.php">
                    <span class="intro-image"><img src="assets/images/home/dinner-set.webp" alt="Kintsugi Aureate Gold dinner set" width="1254" height="1254" loading="lazy"></span>
                    <span class="intro-title"><img src="assets/images/home/title-medallion.webp" alt="" width="240" height="240"><b>Dinner Set</b><img src="assets/images/home/title-medallion.webp" alt="" width="240" height="240"></span>
                </a>
                <a class="intro-card" href="dining.php">
                    <span class="intro-image"><img src="assets/images/home/cup-saucer.webp" alt="Kintsugi cup and saucer" width="1254" height="1254" loading="lazy"></span>
                    <span class="intro-title"><img src="assets/images/home/title-medallion.webp" alt="" width="240" height="240"><b>Cup &amp; Saucer</b><img src="assets/images/home/title-medallion.webp" alt="" width="240" height="240"></span>
                </a>
                <a class="intro-card" href="kitchen.php">
                    <span class="intro-image"><img src="assets/images/home/cutlery-set.webp" alt="Kintsugi luxury gold cutlery set" width="1254" height="1254" loading="lazy"></span>
                    <span class="intro-title"><img src="assets/images/home/title-medallion.webp" alt="" width="240" height="240"><b>Cutlery Set</b><img src="assets/images/home/title-medallion.webp" alt="" width="240" height="240"></span>
                </a>
            </div>
        </section>

        <section class="feature feature-luxe" id="collections">
            <div class="feature-copy">
                <h2>Kintsugi<br>Spectrum Luxe</h2>
                <p>Spectrum Luxe — a bold symphony of modern art.<br>A vibrant take on modern dining, featuring a stunning stained glass mosaic in bold hues, framed in 24k gold. This 47-piece set blends avant-garde design with fine Indian craftsmanship — perfect for those who see their table as art.</p>
                <p class="price">₹1,38,180</p>
                <p class="shipping-pill">Shipping:₹1,500</p>
                <a class="button" href="product.php?product=spectrum-luxe">View</a>
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
                    <button type="button" class="plate-arrow" data-plate-prev aria-label="Previous plate"><img src="assets/images/ui/spectrum-arrow-left.svg" alt=""></button>
                    <button type="button" class="plate-arrow" data-plate-next aria-label="Next plate"><img src="assets/images/ui/spectrum-arrow-right.svg" alt=""></button>
                </div>
                <div class="plate-dots" aria-label="Plate selection">
                    <?php foreach ($plateSlides as $index => $_): ?>
                        <button type="button" data-plate-dot="<?= $index ?>" class="<?= $index === 0 ? 'active' : '' ?>" aria-label="Show plate <?= $index + 1 ?>" aria-current="<?= $index === 0 ? 'true' : 'false' ?>"><img src="assets/images/ui/<?= $index === 0 ? 'spectrum-dot-active.svg' : 'spectrum-dot.svg' ?>" alt=""></button>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="story-grid">
            <article class="story-image"><img src="assets/images/home/dining-story.webp" alt="Premium dinner set collection" width="950" height="950" loading="lazy"></article>
            <article class="story-copy"><span class="eyebrow">Handcrafted tableware for Indian homes</span>
                <h2>Premium<br>Dinner Sets</h2>
                <p>Explore dinnerware and modern dinner sets<br>for everyday dining, festive hosting and gifting.</p><a class="button" href="dining.php">View</a>
            </article>
            <article class="story-copy"><span class="eyebrow">Crafted for every tea moment</span>
                <h2>Handcrafted<br>Tea Sets</h2>
                <p>Explore considered teaware for slow mornings,<br>evening rituals and generous hosting.</p><a class="button" href="dining.php">View</a>
            </article>
            <article class="story-image"><img src="assets/images/home/tea-story.webp" alt="Handcrafted tea set design" width="950" height="950" loading="lazy"></article>
        </section>

        <section class="category-section section-pad" id="categories">
            <div class="ornate-panel">
                <h2>Shop by Category</h2>
                <div class="category-grid">
                    <?php foreach ($categories as [$name, $icon]): ?>
                        <a class="category-card category-<?= $icon ?>" href="<?= htmlspecialchars(INDIEKONNECT_STORE_URL) ?>" target="_blank" rel="noopener">
                            <span class="category-icon" aria-hidden="true">
                                <span class="category-state category-state-idle"><img src="assets/images/category/<?= $icon ?>-idle.webp" alt="" loading="lazy"></span>
                                <span class="category-state category-state-hover"><img src="assets/images/category/<?= $icon ?>-hover.webp" alt="" loading="lazy"></span>
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
                    <img src="<?= htmlspecialchars($lookProduct['image']) ?>" alt="A styled Royal Opulence dining table" loading="lazy">
                    <button class="look-hotspot active" type="button"
                        style="--hotspot-x:27%;--hotspot-y:72%"
                        data-look-index="0"
                        data-name="<?= htmlspecialchars($lookProduct['name']) ?>"
                        data-price="<?= htmlspecialchars($lookProduct['price']) ?>"
                        data-image="<?= htmlspecialchars($lookProduct['scene']) ?>"
                        data-url="product.php?product=royal-opulence"
                        aria-label="View <?= htmlspecialchars($lookProduct['name']) ?>"
                        aria-pressed="true"><span></span></button>
                </div>
                <div class="look-product" aria-live="polite">
                    <div class="look-product-image"><img data-look-image src="<?= htmlspecialchars($lookProduct['scene']) ?>" alt="<?= htmlspecialchars($lookProduct['name']) ?>" loading="lazy"></div>
                    <p data-look-price><?= htmlspecialchars($lookProduct['price']) ?></p>
                    <h3 data-look-name><?= htmlspecialchars($lookProduct['name']) ?></h3>
                    <a class="button" data-look-link href="product.php?product=royal-opulence">View this product</a>
                </div>
            </div>
        </section>

        <section class="new section-pad" id="new">
            <h2>What’s New</h2>
            <div class="product-row">
                <?php foreach ($products as $slug => $product): ?>
                    <article class="product" tabindex="0">
                        <span class="product-image">
                            <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" loading="lazy">
                            <span class="product-actions">
                                <a class="product-action product-action-bag" href="product.php?product=<?= rawurlencode($slug) ?>" aria-label="View <?= htmlspecialchars($product['name']) ?> details">View details</a>
                                <a class="product-action product-action-buy" href="<?= htmlspecialchars($product['retail_url']) ?>" target="_blank" rel="noopener" aria-label="Buy <?= htmlspecialchars($product['name']) ?> now">Buy now</a>
                            </span>
                        </span>
                        <p><?= htmlspecialchars($product['price']) ?></p>
                        <h3><a href="product.php?product=<?= rawurlencode($slug) ?>"><?= htmlspecialchars($product['name']) ?></a></h3>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="editorial"><img src="assets/images/home/tea-editorial.webp" alt="Tea time with Kintsugi" width="996" height="634" loading="lazy">
            <div class="editorial-panel">
                <div class="editorial-copy">
                    <h2>Tea Time<br>Shenanigans</h2>
                    <p>Crafted with uncompromising quality and timeless designs, discover Kintsugi&rsquo;s elegant teaware that turns every tea time into a luxurious moment!</p>
                    <a class="button" href="house.php">Discover</a>
                </div>
            </div>
        </section>
    </main>

<?php require __DIR__ . '/includes/footer.php'; ?>
