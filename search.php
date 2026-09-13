<?php

declare(strict_types=1);
require_once __DIR__ . '/config.php';

$query = trim((string) ($_GET['q'] ?? ''));
$query = function_exists('mb_substr') ? mb_substr($query, 0, 80) : substr($query, 0, 80);
$products = kintsugi_products();
$collections = kintsugi_collection_pages();
$productResults = [];
$collectionResults = [];

if ($query !== '') {
    foreach ($products as $slug => $product) {
        $searchable = implode(' ', [
            $product['name'],
            $product['collection'],
            $product['description'],
            $product['material'],
            $product['finish'],
            $product['usage'],
        ]);

        if (stripos($searchable, $query) !== false) {
            $productResults[$slug] = $product;
        }
    }

    foreach ($collections as $slug => $collection) {
        $searchable = implode(' ', [
            $slug,
            $collection['title'],
            $collection['eyebrow'],
            $collection['intro'],
            $collection['feature'],
            $collection['copy'],
        ]);

        if (stripos($searchable, $query) !== false) {
            $collectionResults[$slug] = $collection;
        }
    }
}

$resultCount = count($productResults) + count($collectionResults);
$pageTitle = $query === '' ? 'Search' : 'Search for “' . $query . '”';
$pageDescription = 'Search Kintsugi products and collections.';
$pageKey = 'search';
$bodyClass = 'inner-page search-page';
require __DIR__ . '/includes/header.php';
?>
<main>
    <section class="search-hero section-pad">
        <p class="eyebrow">Discover Kintsugi</p>
        <h1>Search the House</h1>
        <form class="search-form" action="search.php" method="get" role="search">
            <label class="visually-hidden" for="site-search">Search products and collections</label>
            <input id="site-search" name="q" type="search" value="<?= htmlspecialchars($query) ?>" placeholder="What are you looking for?" maxlength="80" autocomplete="off" autofocus>
            <a class="search-clear<?= $query === '' ? ' is-hidden' : '' ?>" href="search.php" aria-label="Clear search">×</a>
            <button type="submit" aria-label="Submit search">
                <svg viewBox="0 0 32 32" aria-hidden="true"><circle cx="13.5" cy="13.5" r="9.5"></circle><path d="m21 21 8 8"></path></svg>
            </button>
        </form>
        <?php if ($query !== ''): ?>
            <p class="search-summary"><?= $resultCount ?> <?= $resultCount === 1 ? 'result' : 'results' ?> for “<?= htmlspecialchars($query) ?>”</p>
        <?php else: ?>
            <p class="search-summary">Search by product, collection, material or the moment you are gathering for.</p>
        <?php endif; ?>
    </section>

    <?php if ($query === ''): ?>
        <section class="search-discover section-pad">
            <div class="section-heading reveal-block">
                <p class="eyebrow">A place to begin</p>
                <h2>Explore by ritual.</h2>
            </div>
            <div class="search-suggestions">
                <a href="search.php?q=dining">Dining</a>
                <a href="search.php?q=gifting">Gifting</a>
                <a href="search.php?q=porcelain">Porcelain</a>
                <a href="search.php?q=gold">Gold details</a>
                <a href="search.php?q=tea">Tea rituals</a>
                <a href="search.php?q=hosting">Hosting</a>
            </div>
        </section>
    <?php elseif ($resultCount === 0): ?>
        <section class="search-empty section-pad reveal-block">
            <span aria-hidden="true">✦</span>
            <h2>No pieces found</h2>
            <p>Try a broader word such as dining, tea, porcelain, gold or gifting.</p>
            <a class="button" href="collections.php">Explore all collections</a>
        </section>
    <?php else: ?>
        <section class="search-results section-pad">
            <?php if ($collectionResults): ?>
                <div class="search-result-group">
                    <div class="search-group-heading"><p class="eyebrow">Collections</p><span><?= count($collectionResults) ?></span></div>
                    <div class="search-collection-grid">
                        <?php foreach ($collectionResults as $slug => $collection): ?>
                            <a class="search-collection-card reveal-block" href="<?= htmlspecialchars($slug) ?>.php">
                                <img src="<?= htmlspecialchars($collection['hero']) ?>" alt="<?= htmlspecialchars($collection['title']) ?> collection" loading="lazy">
                                <span><small><?= htmlspecialchars($collection['eyebrow']) ?></small><strong><?= htmlspecialchars($collection['title']) ?></strong><i>Explore ↗</i></span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($productResults): ?>
                <div class="search-result-group">
                    <div class="search-group-heading"><p class="eyebrow">Pieces</p><span><?= count($productResults) ?></span></div>
                    <div class="search-product-grid">
                        <?php foreach ($productResults as $slug => $product): ?>
                            <article class="search-product-card reveal-block">
                                <a href="product.php?product=<?= rawurlencode($slug) ?>"><img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" loading="lazy"></a>
                                <p><?= htmlspecialchars($product['collection']) ?></p>
                                <h2><a href="product.php?product=<?= rawurlencode($slug) ?>"><?= htmlspecialchars($product['name']) ?></a></h2>
                                <div><span><?= htmlspecialchars($product['price']) ?></span><a href="product.php?product=<?= rawurlencode($slug) ?>">Discover ↗</a></div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </section>
    <?php endif; ?>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
