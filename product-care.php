<?php

declare(strict_types=1);
require_once __DIR__ . '/config.php';

$pageTitle = 'Product Care';
$pageDescription = 'Care guidance for preserving Kintsugi fine porcelain and 24-carat gold detailing.';
$pageKey = 'product-care';
$bodyClass = 'inner-page care-page';
$heroImage = 'assets/images/pages/craftsmanship-aureate.webp';
$heroEyebrow = 'Product Care';
$heroTitle = 'Caring for Your Kintsugi Tableware';
$heroIntro = 'Preserve the beauty. Protect the craftsmanship.';

$careSteps = [
    ['01', 'Handle With Care', 'Handle each piece gently. Avoid sudden impacts, dropping or knocking pieces against hard surfaces, as porcelain can chip or break.'],
    ['02', 'Clean Gently', 'Use a soft sponge or cloth with mild dishwashing liquid. Avoid abrasive scrubbers, harsh cleaners and scouring powders.'],
    ['03', 'Protect the Gold Detailing', 'The gold-plated detailing is delicate. Hand wash gently to help preserve its shine and decorative finish.'],
    ['04', 'Store With Care', 'Stack plates and bowls carefully. Use protective separators wherever possible to help prevent scratches and chipping.'],
    ['05', 'Avoid Sudden Temperature Changes', 'Do not expose porcelain to sudden changes in temperature, as thermal shock may cause damage.'],
    ['06', 'Follow Care Instructions', 'Kintsugi tableware is not dishwasher-safe or microwave-safe. Hand washing is recommended for all pieces.'],
];

require __DIR__ . '/includes/header.php';
?>
<main>
    <?php require __DIR__ . '/includes/inner-hero.php'; ?>

    <section class="care-guide section-pad">
        <div class="section-heading reveal-block">
            <p class="eyebrow">Made to Be Treasured</p>
            <h2>Cared for With Care.</h2>
            <p>Kintsugi tableware is designed to be enjoyed and appreciated for years to come. With a little care and attention, you can preserve the beauty of fine porcelain and its exquisite 24K gold detailing.</p>
        </div>
        <div class="care-guide-grid">
            <?php foreach ($careSteps as [$number, $title, $copy]): ?>
                <article class="reveal-block"><span><?= $number ?></span><h3><?= htmlspecialchars($title) ?></h3><p><?= htmlspecialchars($copy) ?></p></article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="care-reminder reveal-block">
        <p class="eyebrow">The Essentials</p>
        <h2>Hand wash. Handle gently.<br>Enjoy beautifully.</h2>
        <a class="button button-light" href="collections.php">Explore the collections</a>
    </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
