<?php

declare(strict_types=1);
require_once __DIR__ . '/../config.php';

$collections = kintsugi_collection_pages();
if (!isset($collectionSlug, $collections[$collectionSlug])) {
    http_response_code(404);
    exit('Collection not found.');
}

$collection = $collections[$collectionSlug];
$products = kintsugi_products();
$pageTitle = $collection['title'];
$pageDescription = $collection['intro'];
$pageKey = 'collections';
$bodyClass = 'inner-page collection-page collection-' . $collectionSlug;
$heroImage = $collection['hero'];
$heroEyebrow = $collection['eyebrow'];
$heroTitle = $collection['title'];
$heroIntro = $collection['intro'];
require __DIR__ . '/header.php';
?>
<main>
    <?php require __DIR__ . '/inner-hero.php'; ?>

    <section class="collection-intro section-pad reveal-block">
        <p class="eyebrow">The Kintsugi edit</p>
        <h2><?= htmlspecialchars($collection['feature']) ?></h2>
        <p><?= htmlspecialchars($collection['copy']) ?></p>
    </section>

    <section class="collection-products section-pad" id="collection-grid">
        <?php if ($collection['products']): ?>
            <?php foreach ($collection['products'] as $position => $slug): $product = $products[$slug]; ?>
                <article class="collection-product reveal-block">
                    <a class="collection-product-image" href="product.php?product=<?= rawurlencode($slug) ?>">
                        <span class="collection-number">0<?= $position + 1 ?></span>
                        <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" loading="lazy">
                    </a>
                    <div class="collection-product-copy">
                        <p class="eyebrow"><?= htmlspecialchars($product['collection']) ?></p>
                        <h3><a href="product.php?product=<?= rawurlencode($slug) ?>"><?= htmlspecialchars($product['name']) ?></a></h3>
                        <p><?= htmlspecialchars($product['description']) ?></p>
                        <div class="collection-product-meta">
                            <span><?= htmlspecialchars($product['price']) ?></span>
                            <a href="product.php?product=<?= rawurlencode($slug) ?>">Discover <span aria-hidden="true">↗</span></a>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="collection-empty reveal-block">
                <p class="eyebrow">The collection is growing</p>
                <h2>New pieces are being considered.</h2>
                <p>Our current release is focused on three signature dining ensembles. Explore the available edit or speak with the house about what is coming next.</p>
                <div><a class="button" href="dining.php">Explore dining</a><a class="text-link" href="contact.php">Contact the house ↗</a></div>
            </div>
        <?php endif; ?>
    </section>

    <section class="ritual-banner reveal-block">
        <img src="assets/images/home/tea-editorial.webp" alt="A Kintsugi tea ritual" width="996" height="634" loading="lazy">
        <div>
            <p class="eyebrow">Beauty lives in the everyday</p>
            <h2>Made for moments worth gathering around.</h2>
            <a class="button button-light" href="house.php">Our philosophy</a>
        </div>
    </section>
</main>
<?php require __DIR__ . '/footer.php'; ?>
