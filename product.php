<?php

declare(strict_types=1);
require_once __DIR__ . '/config.php';

$slug = isset($_GET['product']) ? preg_replace('/[^a-z0-9-]/', '', strtolower((string) $_GET['product'])) : 'aureate-gold';
$product = kintsugi_product($slug);

if ($product === null) {
    http_response_code(404);
    $product = kintsugi_product('aureate-gold');
    $productNotFound = true;
}

$pageTitle = ($productNotFound ?? false) ? 'Product not found' : $product['name'];
$pageDescription = $product['description'];
$pageKey = 'product';
$bodyClass = 'inner-page product-page';
$allProducts = kintsugi_products();
require __DIR__ . '/includes/header.php';
?>
<main>
    <?php if ($productNotFound ?? false): ?>
        <div class="product-notice">That piece could not be found. You may enjoy this signature selection instead.</div>
    <?php endif; ?>
    <section class="pdp section-pad">
        <div class="pdp-gallery reveal-block">
            <div class="pdp-main-image"><img data-product-main src="<?= htmlspecialchars($product['gallery'][0]) ?>" alt="<?= htmlspecialchars($product['name']) ?>"></div>
            <div class="pdp-thumbnails" aria-label="Product images">
                <?php foreach ($product['gallery'] as $imageIndex => $galleryImage): ?>
                    <button type="button" class="pdp-thumbnail<?= $imageIndex === 0 ? ' active' : '' ?>" data-product-thumb="<?= htmlspecialchars($galleryImage) ?>" data-product-alt="<?= htmlspecialchars($product['name']) ?> — view <?= $imageIndex + 1 ?>" aria-pressed="<?= $imageIndex === 0 ? 'true' : 'false' ?>">
                        <img src="<?= htmlspecialchars($galleryImage) ?>" alt="" loading="lazy">
                    </button>
                <?php endforeach; ?>
            </div>
            <p class="pdp-disclaimer"><strong>Image note:</strong> Images are AI-generated for illustrative purposes. Actual product colours, materials and fine details may vary slightly.</p>
        </div>
        <div class="pdp-copy reveal-block">
            <nav class="breadcrumbs" aria-label="Breadcrumb"><a href="index.php">Home</a><span>/</span><a href="collections.php">Collections</a><span>/</span><span><?= htmlspecialchars($product['name']) ?></span></nav>
            <p class="eyebrow"><?= htmlspecialchars($product['collection']) ?> collection</p>
            <h1><?= htmlspecialchars($product['name']) ?></h1>
            <p class="pdp-price"><?= htmlspecialchars($product['price']) ?></p>
            <p class="pdp-shipping">Shipping: <strong><?= htmlspecialchars($product['shipping']) ?></strong></p>
            <p class="pdp-description"><?= htmlspecialchars($product['description']) ?></p>
            <a class="button pdp-buy" href="<?= htmlspecialchars($product['retail_url']) ?>" target="_blank" rel="noopener">Purchase on IndieKonnect ↗</a>
            <p class="pdp-channel-note">Purchase and order fulfilment are completed securely through IndieKonnect.</p>
            <p class="pdp-delivery"><span aria-hidden="true">◇</span> Estimated delivery: <strong><?= htmlspecialchars($product['delivery']) ?></strong></p>
            <div class="pdp-details">
                <details open><summary>Product details</summary><dl><div><dt>Material</dt><dd><?= htmlspecialchars($product['material']) ?></dd></div><div><dt>Finish</dt><dd><?= htmlspecialchars($product['finish']) ?></dd></div><div><dt>Pieces</dt><dd><?= htmlspecialchars((string) $product['pieces']) ?></dd></div><div><dt>Set includes</dt><dd><?= htmlspecialchars($product['set']) ?></dd></div></dl></details>
                <details><summary>Use & care</summary><p><?= htmlspecialchars($product['usage']) ?>. <?= htmlspecialchars($product['care']) ?></p></details>
                <details><summary>Availability & delivery</summary><p>Estimated delivery is <?= htmlspecialchars($product['delivery']) ?>. Current availability and final shipping details are confirmed on IndieKonnect before purchase.</p></details>
                <details><summary>Manufacture & marketing</summary><dl><div><dt>Country</dt><dd><?= htmlspecialchars($product['country']) ?></dd></div><div><dt>Made by</dt><dd><?= htmlspecialchars($product['manufacturer']) ?></dd></div><div><dt>Marketed by</dt><dd><?= htmlspecialchars($product['marketer']) ?></dd></div></dl></details>
            </div>
        </div>
    </section>

    <section class="complete-table section-pad">
        <div class="section-heading reveal-block"><p class="eyebrow">Complete the table</p><h2>Pieces that belong together.</h2><p>Continue the story with complementary forms from the Kintsugi edit.</p></div>
        <div class="signature-grid related-grid">
            <?php $shown = 0; foreach ($allProducts as $relatedSlug => $related): if ($relatedSlug === $product['slug'] || $shown >= 3) continue; $shown++; ?>
                <article class="signature-card reveal-block">
                    <a href="product.php?product=<?= rawurlencode($relatedSlug) ?>"><img src="<?= htmlspecialchars($related['image']) ?>" alt="<?= htmlspecialchars($related['name']) ?>" loading="lazy"></a>
                    <p><?= htmlspecialchars($related['price']) ?></p>
                    <h3><a href="product.php?product=<?= rawurlencode($relatedSlug) ?>"><?= htmlspecialchars($related['name']) ?></a></h3>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
