<?php

declare(strict_types=1);
require_once __DIR__ . '/config.php';

$products = kintsugi_products();

$lookProduct = $products['royal-opulence'];
$pageTitle = 'Luxury Tableware';
$pageDescription = 'Beauty lives in the everyday. Discover Kintsugi tableware for moments worth gathering around.';
$pageKey = 'home';
require __DIR__ . '/includes/header.php';
?>
    <main>
        <section class="hero hero-carousel" data-home-hero aria-labelledby="hero-title" aria-roledescription="carousel">
            <div class="hero-slides" aria-live="off">
                <article class="hero-slide is-active" data-hero-slide aria-hidden="false">
                    <img class="hero-bg" src="assets/images/home/real-hero-spectrum-clean.jpg" alt="Spectrum Luxe tableware arranged for a contemporary gathering" width="1842" height="854" fetchpriority="high">
                    <div class="hero-shade"></div>
                    <div class="hero-copy">
                        <p class="hero-tagline">Beauty lives in the everyday</p>
                        <h1 id="hero-title"><span>Spectrum</span> <span>Luxe</span></h1>
                        <a class="button button-light" href="product.php?product=spectrum-luxe">Explore</a>
                    </div>
                </article>
                <article class="hero-slide" data-hero-slide aria-hidden="true">
                    <img class="hero-bg" src="assets/images/home/campaign-banners/aureate-gold.jpg" alt="Aureate Gold tableware styled on a banana-leaf setting" width="1842" height="854" loading="eager">
                    <div class="hero-shade"></div>
                    <div class="hero-copy">
                        <p class="hero-tagline">The art of radiant hospitality</p>
                        <h2><span>Aureate</span> <span>Gold</span></h2>
                        <a class="button button-light" href="product.php?product=aureate-gold">Explore</a>
                    </div>
                </article>
                <article class="hero-slide" data-hero-slide aria-hidden="true">
                    <img class="hero-bg" src="assets/images/home/campaign-banners/royal-opulence.jpg" alt="Royal Opulence tableware arranged for an elegant celebration" width="1842" height="854" loading="eager">
                    <div class="hero-shade"></div>
                    <div class="hero-copy">
                        <p class="hero-tagline">The ultimate expression of dining luxury</p>
                        <h2><span>Royal</span> <span>Opulence</span></h2>
                        <a class="button button-light" href="product.php?product=royal-opulence">Explore</a>
                    </div>
                </article>
            </div>
            <button class="hero-arrow hero-arrow--prev" type="button" data-hero-prev aria-label="Show previous banner"><span aria-hidden="true">&#8592;</span></button>
            <button class="hero-arrow hero-arrow--next" type="button" data-hero-next aria-label="Show next banner"><span aria-hidden="true">&#8594;</span></button>
            <div class="hero-pagination" aria-label="Choose a banner">
                <button class="is-active" type="button" data-hero-dot="0" aria-label="Show Spectrum Luxe banner" aria-current="true"></button>
                <button type="button" data-hero-dot="1" aria-label="Show Aureate Gold banner" aria-current="false"></button>
                <button type="button" data-hero-dot="2" aria-label="Show Royal Opulence banner" aria-current="false"></button>
            </div>
        </section>

        <section class="intro section-pad">
            <p class="eyebrow">Fine Porcelain</p>
            <h2>Handcrafted tableware for Indian homes</h2>
            <div class="intro-grid">
                <a class="intro-card" href="product.php?product=aureate-gold">
                    <span class="intro-image"><img src="assets/images/home/real-intro-aureate.webp" alt="Aureate Gold dinner setting" width="1080" height="1080" loading="lazy"></span>
                    <span class="intro-title"><i aria-hidden="true"></i><b>Tableware</b><i aria-hidden="true"></i></span>
                </a>
                <a class="intro-card" href="product.php?product=spectrum-luxe">
                    <span class="intro-image"><img src="assets/images/home/real-intro-teaware.webp" alt="Spectrum Luxe teaware" width="1080" height="1080" loading="lazy"></span>
                    <span class="intro-title"><i aria-hidden="true"></i><b>Tableware</b><i aria-hidden="true"></i></span>
                </a>
                <a class="intro-card" href="product.php?product=royal-opulence">
                    <span class="intro-image"><img src="assets/images/home/real-intro-royal.webp" alt="Royal Opulence serveware setting" width="1080" height="1080" loading="lazy"></span>
                    <span class="intro-title"><i aria-hidden="true"></i><b>Tableware</b><i aria-hidden="true"></i></span>
                </a>
            </div>
        </section>

        <section class="feature-showcase" id="collections">
            <div class="feature-showcase-image">
                <img src="assets/images/home/real-hero-spectrum-clean.jpg" alt="Spectrum Luxe tableware styled for a contemporary gathering" width="1842" height="854" loading="lazy">
            </div>
            <div class="feature-showcase-copy">
                <p class="eyebrow">Spectrum Luxe</p>
                <h2>Where Art Meets<br>Everyday Elegance.</h2>
                <p>A celebration of artistic expression and refined dining, Spectrum Luxe brings together fine porcelain and exquisite 24K gold detailing. Inspired by contemporary aesthetics and crafted with precision, this collection transforms everyday table settings into moments of understated luxury, perfect for those who appreciate the beauty of fine design and timeless craftsmanship.</p>
                <p class="price"><?= htmlspecialchars($products['spectrum-luxe']['price']) ?></p>
                <a class="button" href="product.php?product=spectrum-luxe">View collection</a>
            </div>
        </section>

        <section class="story-grid">
            <article class="story-image"><img src="assets/images/home/real-royal-place-setting.webp" alt="Royal Opulence dinner setting" width="1080" height="1080" loading="lazy"></article>
            <article class="story-copy"><span class="eyebrow">Fine Tableware for Indian Homes</span>
                <h2>Premium<br>Tableware</h2>
                <p>Explore thoughtfully designed fine porcelain tableware with exquisite 24K gold detailing, perfect for everyday elegance, festive occasions, hosting and gifting.</p><a class="button" href="collections.php">View</a>
            </article>
            <article class="story-copy"><span class="eyebrow">Designed for Every Everyday Moment</span>
                <h2>Fine Porcelain<br>Tableware</h2>
                <p>Discover thoughtfully crafted tableware featuring elegant designs and 24K gold detailing, perfect for everyday moments, special occasions and gracious hosting.</p><a class="button" href="collections.php">View</a>
            </article>
            <article class="story-image"><img src="assets/images/home/real-craftsmanship.webp" alt="Spectrum Luxe teaware in use" width="1080" height="1080" loading="lazy"></article>
        </section>

        <section class="category-section collection-home-section section-pad" id="categories">
            <div class="ornate-panel">
                <p class="eyebrow">The Kintsugi Collections</p>
                <h2>Explore Our Tableware</h2>
                <div class="home-collection-grid">
                    <?php foreach ($products as $slug => $product): ?>
                        <a class="home-collection-card" href="product.php?product=<?= rawurlencode($slug) ?>">
                            <span class="home-collection-image"><img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" loading="lazy"></span>
                            <span class="home-collection-name"><?= htmlspecialchars($product['short_name']) ?></span>
                            <small>Explore collection <span aria-hidden="true">↗</span></small>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="look section-pad">
            <h2>Shop the Look</h2>
            <div class="look-grid" data-shop-look>
                <div class="look-scene">
                    <img src="assets/images/home/real-royal-table.webp" alt="A styled Royal Opulence dining table" loading="lazy">
                    <button class="look-hotspot active" type="button"
                        style="--hotspot-x:27%;--hotspot-y:72%"
                        data-look-index="0"
                        data-name="<?= htmlspecialchars($lookProduct['name']) ?>"
                        data-price="<?= htmlspecialchars($lookProduct['price']) ?>"
                        data-image="assets/images/home/real-royal-detail.webp"
                        data-url="product.php?product=royal-opulence"
                        aria-label="View <?= htmlspecialchars($lookProduct['name']) ?>"
                        aria-pressed="true"><span></span></button>
                </div>
                <div class="look-product" aria-live="polite">
                    <div class="look-product-image"><img data-look-image src="assets/images/home/real-royal-detail.webp" alt="<?= htmlspecialchars($lookProduct['name']) ?>" loading="lazy"></div>
                    <p data-look-price><?= htmlspecialchars($lookProduct['price']) ?></p>
                    <h3 data-look-name><?= htmlspecialchars($lookProduct['name']) ?></h3>
                    <a class="button" data-look-link href="product.php?product=royal-opulence">View this product</a>
                </div>
            </div>
        </section>

    </main>

<?php require __DIR__ . '/includes/footer.php'; ?>
