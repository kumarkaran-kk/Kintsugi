<?php

declare(strict_types=1);
require_once __DIR__ . '/config.php';

$pageTitle = 'Collections';
$pageDescription = 'Discover Kintsugi’s three signature fine porcelain tableware collections.';
$pageKey = 'collections';
$bodyClass = 'inner-page collections-page';
$heroImage = 'assets/images/home/real-hero-spectrum-clean.jpg';
$heroEyebrow = 'A world of considered living';
$heroTitle = 'Collections';
$heroIntro = 'Discover pieces made for moments worth gathering around.';
$products = kintsugi_products();
require __DIR__ . '/includes/header.php';
?>
<main>
    <?php require __DIR__ . '/includes/inner-hero.php'; ?>

    <section class="collection-index section-pad" id="collection-grid">
        <div class="section-heading reveal-block">
            <p class="eyebrow">Three Signature Collections</p>
            <h2>Tableware with a distinct point of view.</h2>
            <p>Each Kintsugi collection brings together dinnerware and serveware in its own considered design language.</p>
        </div>
        <div class="collection-index-grid collection-index-grid-products">
            <?php foreach ($products as $slug => $product): ?>
                <a class="collection-index-card reveal-block" href="product.php?product=<?= rawurlencode($slug) ?>">
                    <img src="<?= htmlspecialchars($product['scene']) ?>" alt="<?= htmlspecialchars($product['name']) ?> collection" loading="lazy">
                    <span>
                        <small><?= htmlspecialchars((string) $product['pieces']) ?>-piece collection</small>
                        <strong><?= htmlspecialchars($product['short_name']) ?></strong>
                        <i>Discover collection ↗</i>
                    </span>
                </a>
            <?php endforeach; ?>
        </div>
    </section>

</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
