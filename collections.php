<?php

declare(strict_types=1);
require_once __DIR__ . '/config.php';

$pageTitle = 'Collections';
$pageDescription = 'Discover Kintsugi dining, kitchen, serveware and gifting collections.';
$pageKey = 'collections';
$bodyClass = 'inner-page collections-page';
$heroImage = 'assets/images/home/hero-aureate-gold.webp';
$heroEyebrow = 'A world of considered living';
$heroTitle = 'Collections';
$heroIntro = 'Discover pieces made for moments worth gathering around.';
$collections = kintsugi_collection_pages();
$products = kintsugi_products();
require __DIR__ . '/includes/header.php';
?>
<main>
    <?php require __DIR__ . '/includes/inner-hero.php'; ?>

    <section class="collection-index section-pad" id="collection-grid">
        <div class="section-heading reveal-block">
            <p class="eyebrow">Explore by ritual</p>
            <h2>Objects for a beautifully lived life.</h2>
            <p>Each collection begins with a familiar moment and considers how design can make it feel more meaningful.</p>
        </div>
        <div class="collection-index-grid">
            <?php foreach ($collections as $slug => $collection): ?>
                <a class="collection-index-card reveal-block" href="<?= htmlspecialchars($slug) ?>.php">
                    <img src="<?= htmlspecialchars($collection['hero']) ?>" alt="<?= htmlspecialchars($collection['title']) ?> collection" loading="lazy">
                    <span>
                        <small><?= htmlspecialchars($collection['eyebrow']) ?></small>
                        <strong><?= htmlspecialchars($collection['title']) ?></strong>
                        <i>Explore collection ↗</i>
                    </span>
                </a>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="signature-edit section-pad" id="signature">
        <div class="section-heading reveal-block">
            <p class="eyebrow">Signature edit</p>
            <h2>Details that complete the table.</h2>
        </div>
        <div class="signature-grid">
            <?php foreach (array_slice($products, 0, 3, true) as $slug => $product): ?>
                <article class="signature-card reveal-block">
                    <a href="product.php?product=<?= rawurlencode($slug) ?>"><img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" loading="lazy"></a>
                    <p><?= htmlspecialchars($product['price']) ?></p>
                    <h3><a href="product.php?product=<?= rawurlencode($slug) ?>"><?= htmlspecialchars($product['name']) ?></a></h3>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
