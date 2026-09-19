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

$presentation = [
    'aureate-gold' => [
        'tagline' => 'The Art of Radiant Hospitality',
        'theme' => 'ruby',
        'manifesto' => 'A celebration of light, legacy and the Indian table.',
        'short_story' => 'Inspired by the warmth of a royal sunset, the Aureate Gold collection brings a touch of majestic elegance to intimate gatherings.',
        'pieces' => [['6', 'Dinner Plates'], ['6', 'Bread & Butter Plates'], ['6', 'Small Bowls'], ['1', 'Salad Bowl'], ['1', 'Platter']],
        'detail_captions' => ['Intricate floral motifs', '24-carat gold detailing', 'A harmony of form and finish'],
    ],
    'royal-opulence' => [
        'tagline' => 'The Ultimate Expression of Dining Luxury',
        'theme' => 'emerald',
        'manifesto' => 'A grand expression of ceremony, artistry and modern Indian luxury.',
        'short_story' => 'Deep turquoise, classical paisley and luminous gold come together in a collection created for life’s most memorable celebrations.',
        'pieces' => [['6', 'Dinner Plates'], ['6', 'Salad Plates'], ['6', 'Soup Bowls'], ['2', 'Casseroles'], ['1', 'Platter']],
        'detail_captions' => ['Ornate paisley borders', '24-carat gold detailing', 'A richly layered finish'],
    ],
    'spectrum-luxe' => [
        'tagline' => 'A Bold Symphony of Modern Art',
        'theme' => 'spectrum',
        'manifesto' => 'A vivid celebration of colour, movement and contemporary confidence.',
        'short_story' => 'A stained-glass-inspired mosaic of modern hues transforms every gathering into an expressive and unforgettable table.',
        'pieces' => [['6', 'Dinner Plates'], ['6', 'Bread & Butter Plates'], ['6', 'Dessert Bowls'], ['6', 'Tea Cups'], ['1', 'Platter']],
        'detail_captions' => ['Stained-glass geometry', '24-carat gold detailing', 'Colour in perfect balance'],
    ],
][$product['slug']];

$gallery = [
    ['src' => $product['image'], 'position' => 'center'],
    ['src' => $product['scene'], 'position' => 'center'],
    ['src' => $product['image'], 'position' => '35% center'],
    ['src' => $product['scene'], 'position' => '70% center'],
    ['src' => $product['image'], 'position' => 'center bottom'],
];

$relatedProducts = [];
foreach ($allProducts as $relatedSlug => $related) {
    if ($relatedSlug !== $product['slug']) {
        $relatedProducts[$relatedSlug] = $related;
    }
}
$productNameWords = explode(' ', $product['name']);
$productNameLastWord = array_pop($productNameWords);
$productNameFirstLine = implode(' ', $productNameWords);

require __DIR__ . '/includes/header.php';
?>
<main class="editorial-pdp editorial-pdp--<?= htmlspecialchars($presentation['theme']) ?>">
    <?php if ($productNotFound ?? false): ?>
        <div class="product-notice">That piece could not be found. You may enjoy this signature selection instead.</div>
    <?php endif; ?>

    <section class="pdp-hero" aria-labelledby="product-title">
        <div class="pdp-gallery reveal-block" data-gallery-count="<?= count($gallery) ?>">
            <div class="pdp-thumbnails" aria-label="Product images">
                <?php foreach ($gallery as $imageIndex => $galleryImage): ?>
                    <button type="button" class="pdp-thumbnail<?= $imageIndex === 0 ? ' active' : '' ?>" data-product-thumb="<?= htmlspecialchars($galleryImage['src']) ?>" data-product-position="<?= htmlspecialchars($galleryImage['position']) ?>" data-product-alt="<?= htmlspecialchars($product['name']) ?> — view <?= $imageIndex + 1 ?>" aria-label="Show product image <?= $imageIndex + 1 ?>" aria-pressed="<?= $imageIndex === 0 ? 'true' : 'false' ?>">
                        <img src="<?= htmlspecialchars($galleryImage['src']) ?>" alt="" loading="<?= $imageIndex === 0 ? 'eager' : 'lazy' ?>" style="object-position:<?= htmlspecialchars($galleryImage['position']) ?>">
                    </button>
                <?php endforeach; ?>
                <button class="pdp-thumb-more" type="button" aria-label="Show next product image" data-gallery-next><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m7 9 5 5 5-5"/></svg></button>
            </div>
            <div class="pdp-main-image"><img data-product-main src="<?= htmlspecialchars($gallery[0]['src']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" style="object-position:<?= htmlspecialchars($gallery[0]['position']) ?>"></div>
            <p class="pdp-counter"><strong data-gallery-current>01</strong> / <?= str_pad((string) count($gallery), 2, '0', STR_PAD_LEFT) ?></p>
        </div>

        <div class="pdp-copy reveal-block">
            <nav class="breadcrumbs" aria-label="Breadcrumb"><a href="index.php">Home</a><span>/</span><a href="collections.php">Collections</a><span>/</span><span><?= htmlspecialchars($product['short_name']) ?></span></nav>
            <p class="pdp-kicker"><?= htmlspecialchars($product['collection']) ?> Collection <span>·</span> <?= htmlspecialchars((string) $product['pieces']) ?> Pieces</p>
            <h1 id="product-title"><span><?= htmlspecialchars($productNameFirstLine) ?></span><br><?= htmlspecialchars($productNameLastWord) ?></h1>
            <p class="pdp-tagline"><?= htmlspecialchars($presentation['tagline']) ?></p>
            <p class="pdp-rating" aria-label="Rated 4.8 out of 5"><span aria-hidden="true">★★★★★</span> <b>4.8 (28 reviews)</b></p>
            <p class="pdp-price"><?= htmlspecialchars($product['price']) ?></p>
            <p class="pdp-shipping">Shipping <strong><?= htmlspecialchars($product['shipping']) ?></strong></p>
            <a class="pdp-primary-cta" href="<?= htmlspecialchars($product['retail_url']) ?>" target="_blank" rel="noopener">Purchase on IndieKonnect <span aria-hidden="true">↗</span></a>
            <a class="pdp-secondary-cta" href="contact.php#enquiry">Book a Private Viewing</a>
            <div class="pdp-promises">
                <p><svg viewBox="0 0 32 32" aria-hidden="true"><path d="M3 7h17v16H3zM20 13h5l4 5v5h-9zM8 27a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm16 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/></svg> Estimated delivery: <strong><?= htmlspecialchars($product['delivery']) ?></strong></p>
                <p><svg viewBox="0 0 32 32" aria-hidden="true"><rect x="7" y="14" width="18" height="14" rx="2"/><path d="M11 14V9a5 5 0 0 1 10 0v5M16 20v3"/></svg> Purchase and order fulfilment are completed securely through IndieKonnect.</p>
            </div>
        </div>
    </section>

    <section class="pdp-manifesto">
        <div class="pdp-manifesto-copy reveal-block"><p class="pdp-overline">The <?= htmlspecialchars($product['short_name']) ?> Collection</p><h2><?= htmlspecialchars($presentation['manifesto']) ?></h2><i></i><p><?= htmlspecialchars($presentation['short_story']) ?></p></div>
        <div class="pdp-manifesto-image"><img src="<?= htmlspecialchars($product['scene']) ?>" alt="<?= htmlspecialchars($product['short_name']) ?> detail" loading="lazy"></div>
        <p class="pdp-tradition" aria-hidden="true">Tradition<br>meets<br>a brighter<br>tomorrow</p>
    </section>

    <section class="pdp-section pdp-pieces"><div class="pdp-wrap">
        <div class="pdp-section-head reveal-block"><h2>The Collection, Piece by Piece</h2><span></span><p>A harmonious set of <?= htmlspecialchars((string) $product['pieces']) ?> pieces</p></div>
        <div class="pdp-piece-grid">
            <?php foreach ($presentation['pieces'] as $index => $piece): ?>
                <article class="pdp-piece reveal-block"><div><img src="<?= htmlspecialchars($index % 2 === 0 ? $product['image'] : $product['scene']) ?>" alt="<?= htmlspecialchars($piece[1]) ?>" loading="lazy" style="--piece-position:<?= ["38% 52%", "64% 46%", "47% 58%", "72% 43%", "53% 50%"][$index] ?>"></div><b><?= htmlspecialchars($piece[0]) ?></b><h3><?= htmlspecialchars($piece[1]) ?></h3></article>
            <?php endforeach; ?>
        </div>
    </div></section>

    <section class="pdp-craft">
        <div class="pdp-craft-image"><img src="<?= htmlspecialchars($product['scene']) ?>" alt="<?= htmlspecialchars($product['short_name']) ?> craftsmanship detail" loading="lazy"></div>
        <div class="pdp-craft-copy reveal-block"><p class="pdp-overline">Our Craftsmanship</p><h2>Made by Hand.<br>Meant to Endure.</h2><i></i><p>Each piece in the <?= htmlspecialchars($product['short_name']) ?> collection is crafted by master artisans, combining time-honoured techniques with a vision for contemporary living.</p></div>
        <ol class="pdp-craft-steps"><li><b>01</b><span>Fine porcelain<br>for lasting beauty</span></li><li><b>02</b><span>Hand-finished motifs<br>by skilled artisans</span></li><li><b>03</b><span>24-carat gold detailing<br>for a luminous finish</span></li></ol>
    </section>

    <section class="pdp-section pdp-details-gold"><div class="pdp-wrap">
        <div class="pdp-section-head reveal-block"><h2>Details in Gold</h2><span></span><p>Discover the finer elements</p></div>
        <div class="pdp-macro-grid">
            <?php foreach ($presentation['detail_captions'] as $index => $caption): ?>
                <figure class="pdp-macro-card reveal-block"><div><img src="<?= htmlspecialchars($index === 1 ? $product['image'] : $product['scene']) ?>" alt="<?= htmlspecialchars($caption) ?>" loading="lazy" style="object-position:<?= ['25% center', 'center', '75% center'][$index] ?>"></div><figcaption><?= htmlspecialchars($caption) ?></figcaption></figure>
            <?php endforeach; ?>
        </div>
        <div class="pdp-section-head pdp-spec-heading reveal-block"><h2>Product Specifications</h2><span></span><p>A closer look</p></div>
        <div class="pdp-specs">
            <?php $specifications = [['cube', 'Material', 'Porcelain'], ['spark', 'Finish', $product['finish']], ['flower', 'Detailing', '24-carat gold'], ['hand', 'Care', 'Hand wash only'], ['origin', 'Origin', 'Crafted in India'], ['plates', 'Pieces', (string) $product['pieces']]]; foreach ($specifications as [$icon, $label, $value]): ?>
                <div class="pdp-spec"><span class="pdp-line-icon pdp-line-icon--<?= $icon ?>" aria-hidden="true"></span><b><?= htmlspecialchars($label) ?></b><p><?= htmlspecialchars($value) ?></p></div>
            <?php endforeach; ?>
        </div>
    </div></section>

    <section class="pdp-lifestyle"><img class="pdp-lifestyle-image" src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['short_name']) ?> table setting" loading="lazy"><div class="pdp-lifestyle-shade" aria-hidden="true"></div><div class="pdp-wrap"><div class="pdp-lifestyle-copy reveal-block"><h2>Set the Table for<br>Something Unforgettable</h2><i></i><p>More than a meal, it’s a feeling. The <?= htmlspecialchars($product['short_name']) ?> collection turns everyday moments into extraordinary memories.</p><a href="house.php" class="pdp-small-button">Explore the Story</a></div></div></section>

    <section class="pdp-section pdp-care"><div class="pdp-wrap">
        <div class="pdp-section-head reveal-block"><h2>Care and Delivery</h2><span></span><p>Supporting a lifetime of beautiful moments</p></div>
        <div class="pdp-service-grid">
            <article><span class="pdp-line-icon pdp-line-icon--hand" aria-hidden="true"></span><div><h3>Care Instructions</h3><p>Hand wash only with a mild detergent. Not microwave safe.</p></div></article>
            <article><span class="pdp-line-icon pdp-line-icon--delivery" aria-hidden="true"></span><div><h3>Delivery Timeline</h3><p>Estimated delivery: <?= htmlspecialchars($product['delivery']) ?>.</p></div></article>
            <article><span class="pdp-line-icon pdp-line-icon--cube" aria-hidden="true"></span><div><h3>Secure Fulfilment</h3><p>Orders are securely managed through IndieKonnect.</p></div></article>
            <article><span class="pdp-line-icon pdp-line-icon--help" aria-hidden="true"></span><div><h3>Need Help?</h3><p>For product enquiries or a private viewing, contact us.</p></div></article>
        </div>
        <div class="pdp-section-head pdp-related-heading reveal-block"><h2>Complete the Table</h2><span></span><p>Continue the story</p></div>
        <div class="pdp-related-grid">
            <?php foreach ($relatedProducts as $relatedSlug => $related): ?>
                <article class="pdp-related-card reveal-block"><a class="pdp-related-image" href="product.php?product=<?= rawurlencode($relatedSlug) ?>"><img src="<?= htmlspecialchars($related['image']) ?>" alt="<?= htmlspecialchars($related['name']) ?>" loading="lazy"></a><div><p class="pdp-related-price"><?= htmlspecialchars($related['price']) ?></p><h3><a href="product.php?product=<?= rawurlencode($relatedSlug) ?>"><?= htmlspecialchars($related['name']) ?></a></h3><p><?= htmlspecialchars(strtok($related['description'], '.')) ?>.</p><a class="pdp-related-link" href="product.php?product=<?= rawurlencode($relatedSlug) ?>">View Collection <span>→</span></a></div></article>
            <?php endforeach; ?>
        </div>
    </div></section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
