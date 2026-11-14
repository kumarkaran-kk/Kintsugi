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

$gallery = array_map(
    static fn (string $image): array => ['src' => $image, 'position' => 'center'],
    $product['gallery']
);

$relatedProducts = [];
foreach ($allProducts as $relatedSlug => $related) {
    if ($relatedSlug !== $product['slug']) {
        $relatedProducts[$relatedSlug] = $related;
    }
}
$productNameWords = explode(' ', $product['name']);
$productNameLastWord = array_pop($productNameWords);
$productNameFirstLine = implode(' ', $productNameWords);

/** Render encoding-safe line icons for PDP features and services. */
function pdp_line_icon(string $name): string
{
    $drawings = [
        'cube' => '<path d="M16 3 28 9v14l-12 6L4 23V9Z"/><path d="m4 9 12 7 12-7M16 16v13"/>',
        'spark' => '<path d="M16 3c.8 6.9 3.4 9.5 10 10-6.6.6-9.2 3.2-10 10-.8-6.8-3.4-9.4-10-10 6.6-.5 9.2-3.1 10-10Z"/><path d="M25 3v5M22.5 5.5h5M7 22v6M4 25h6"/>',
        'flower' => '<circle cx="16" cy="16" r="3"/><path d="M16 13c-4-3.3-4.4-7.2 0-10 4.4 2.8 4 6.7 0 10ZM19 14c.5-5.2 3.7-7.6 8.5-5.8.3 5.2-3.4 6.7-8.5 5.8ZM19 18c5.1-1.1 8.4 1 8.5 6.2-4.8 2-7.8-.8-8.5-6.2ZM16 19c4 3.3 4.4 7.2 0 10-4.4-2.8-4-6.7 0-10ZM13 18c-.5 5.2-3.7 7.6-8.5 5.8-.3-5.2 3.4-6.7 8.5-5.8ZM13 14c-5.1 1.1-8.4-1-8.5-6.2 4.8-2 7.8.8 8.5 6.2Z"/>',
        'hand' => '<path d="M10 15V8.5a2 2 0 0 1 4 0V14M14 12V6.5a2 2 0 0 1 4 0V14M18 12V8a2 2 0 0 1 4 0v7M22 13v-2a2 2 0 0 1 4 0v7c0 7-3.8 11-10 11-4.2 0-6.4-2.4-8.1-5.2L5 19.1a2.2 2.2 0 0 1 3.5-2.6L12 20"/>',
        'origin' => '<path d="m15 3 4 2 1 4 4 2-2 4 2 3-3 3-1 5-4 3-3-4-4-2 2-4-3-3 4-3-1-5 4-2Z"/><circle cx="16" cy="14" r="2"/>',
        'plates' => '<ellipse cx="16" cy="8" rx="11" ry="4"/><path d="M5 8v4c0 2.2 4.9 4 11 4s11-1.8 11-4V8M7 16v3c0 2 4 3.7 9 3.7s9-1.7 9-3.7v-3M9 23v2.5c0 1.9 3.1 3.5 7 3.5s7-1.6 7-3.5V23"/>',
        'delivery' => '<path d="M3 7h17v16H3Z"/><path d="M20 13h5l4 5v5h-9Z"/><circle cx="8" cy="24" r="3"/><circle cx="24" cy="24" r="3"/>',
        'help' => '<path d="M5 18v-3a11 11 0 0 1 22 0v3"/><path d="M5 17h4v9H7a2 2 0 0 1-2-2ZM27 17h-4v9h2a2 2 0 0 0 2-2ZM23 26c-1 2-3.2 3-6 3"/>',
    ];

    $drawing = $drawings[$name] ?? $drawings['spark'];
    $className = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    return '<svg class="pdp-line-icon pdp-line-icon--' . $className . '" viewBox="0 0 32 32" aria-hidden="true" focusable="false">' . $drawing . '</svg>';
}

require __DIR__ . '/includes/header.php';
?>
<main class="editorial-pdp editorial-pdp--<?= htmlspecialchars($presentation['theme']) ?>">
    <?php if ($productNotFound ?? false): ?>
        <div class="product-notice">That piece could not be found. You may enjoy this signature selection instead.</div>
    <?php endif; ?>

    <section class="pdp-hero" aria-labelledby="product-title">
        <div class="pdp-gallery reveal-block" data-gallery-count="<?= count($gallery) ?>" style="--gallery-count:<?= count($gallery) ?>">
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
            <p class="pdp-tax-note">Inclusive of all applicable taxes. Shipping charges are calculated separately at checkout.</p>
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
                <article class="pdp-piece reveal-block"><div><img src="<?= htmlspecialchars($product['piece_images'][$index]) ?>" alt="<?= htmlspecialchars($piece[1]) ?>" loading="lazy" style="--piece-position:center"></div><b><?= htmlspecialchars($piece[0]) ?></b><h3><?= htmlspecialchars($piece[1]) ?></h3></article>
            <?php endforeach; ?>
        </div>
    </div></section>

    <section class="pdp-craft">
        <div class="pdp-craft-image"><img src="<?= htmlspecialchars($product['craft_image']) ?>" alt="<?= htmlspecialchars($product['short_name']) ?> craftsmanship detail" loading="lazy"></div>
        <div class="pdp-craft-copy reveal-block"><p class="pdp-overline">Our Craftsmanship</p><h2>Made by Hand.<br>Meant to Endure.</h2><i></i><p>Each piece in the <?= htmlspecialchars($product['short_name']) ?> collection is crafted by master artisans, combining time-honoured techniques with a vision for contemporary living.</p></div>
        <ol class="pdp-craft-steps"><li><b>01</b><span>Fine porcelain<br>for lasting beauty</span></li><li><b>02</b><span>Hand-finished motifs<br>by skilled artisans</span></li><li><b>03</b><span>24-carat gold detailing<br>for a luminous finish</span></li></ol>
    </section>

    <section class="pdp-section pdp-details-gold"><div class="pdp-wrap">
        <div class="pdp-section-head reveal-block"><h2>Details in Gold</h2><span></span><p>Discover the finer elements</p></div>
        <div class="pdp-macro-grid">
            <?php foreach ($presentation['detail_captions'] as $index => $caption): ?>
                <figure class="pdp-macro-card reveal-block"><div><img src="<?= htmlspecialchars($product['detail_images'][$index]) ?>" alt="<?= htmlspecialchars($caption) ?>" loading="lazy"></div><figcaption><?= htmlspecialchars($caption) ?></figcaption></figure>
            <?php endforeach; ?>
        </div>
        <div class="pdp-section-head pdp-spec-heading reveal-block"><h2>Product Specifications</h2><span></span><p>A closer look</p></div>
        <div class="pdp-specs">
            <?php $specifications = [['cube', 'Material', 'Porcelain'], ['spark', 'Finish', $product['finish']], ['flower', 'Detailing', '24-carat gold'], ['hand', 'Care', 'Hand wash only'], ['origin', 'Origin', 'Crafted in India'], ['plates', 'Pieces', (string) $product['pieces']]]; foreach ($specifications as [$icon, $label, $value]): ?>
                <div class="pdp-spec"><?= pdp_line_icon($icon) ?><b><?= htmlspecialchars($label) ?></b><p><?= htmlspecialchars($value) ?></p></div>
            <?php endforeach; ?>
        </div>
    </div></section>

    <section class="pdp-lifestyle"><img class="pdp-lifestyle-image" src="<?= htmlspecialchars($product['lifestyle_image']) ?>" alt="<?= htmlspecialchars($product['short_name']) ?> table setting" loading="lazy"><div class="pdp-lifestyle-shade" aria-hidden="true"></div><div class="pdp-wrap"><div class="pdp-lifestyle-copy reveal-block"><h2>Set the Table for<br>Something Unforgettable</h2><i></i><p>More than a meal, it’s a feeling. The <?= htmlspecialchars($product['short_name']) ?> collection turns everyday moments into extraordinary memories.</p><a href="house.php" class="pdp-small-button">Explore the Story</a></div></div></section>

    <section class="pdp-section pdp-care"><div class="pdp-wrap">
        <div class="pdp-section-head reveal-block"><h2>Care and Delivery</h2><span></span><p>Supporting a lifetime of beautiful moments</p></div>
        <div class="pdp-service-grid">
            <article><?= pdp_line_icon('hand') ?><div><h3>Care Instructions</h3><p>Hand wash only with a mild detergent. Not microwave safe.</p></div></article>
            <article><?= pdp_line_icon('delivery') ?><div><h3>Delivery Timeline</h3><p>Estimated delivery: <?= htmlspecialchars($product['delivery']) ?>.</p></div></article>
            <article><?= pdp_line_icon('cube') ?><div><h3>Secure Fulfilment</h3><p>Orders are securely managed through IndieKonnect.</p></div></article>
            <article><?= pdp_line_icon('help') ?><div><h3>Need Help?</h3><p>For product enquiries or a private viewing, contact us.</p></div></article>
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
