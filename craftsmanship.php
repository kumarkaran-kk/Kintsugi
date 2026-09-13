<?php

declare(strict_types=1);
require_once __DIR__ . '/config.php';

$pageTitle = 'Craftsmanship';
$pageDescription = 'Discover the considered design, material and finishing behind Kintsugi tableware.';
$pageKey = 'craftsmanship';
$bodyClass = 'inner-page craftsmanship-page';
$heroImage = 'assets/images/home/cup-saucer.webp';
$heroEyebrow = 'Made with intention';
$heroTitle = 'Craftsmanship';
$heroIntro = 'Thoughtful form, considered finish and attention that can be felt in use.';
require __DIR__ . '/includes/header.php';
?>
<main>
    <?php require __DIR__ . '/includes/inner-hero.php'; ?>

    <section class="craft-intro section-pad reveal-block">
        <p class="eyebrow">Our approach</p>
        <h2>Good design is seen.<br>Great design is lived with.</h2>
        <p>Kintsugi approaches every piece as part of a larger experience. Proportion, touch, visual rhythm and everyday usefulness are considered together—because refinement should never come at the expense of living.</p>
    </section>

    <section class="craft-process section-pad">
        <article class="craft-step reveal-block">
            <div><span>01</span><p class="eyebrow">Design philosophy</p><h2>Begin with the ritual.</h2><p>We look first at the moment a piece belongs to: the way a bowl is passed, how a cup sits in the hand, or how a place setting comes together.</p></div>
            <img src="assets/images/home/spectrum-plate-01.webp" alt="Royal Opulence plate detail" width="1798" height="1800" loading="lazy">
        </article>
        <article class="craft-step reverse reveal-block">
            <div><span>02</span><p class="eyebrow">Form and function</p><h2>Beauty that earns its place.</h2><p>Silhouettes are considered for balance and use. Decorative details are composed to enrich the object without overwhelming the food, table or room around it.</p></div>
            <img src="assets/images/craftsmanship/cup-saucer-detail.webp" alt="Kintsugi cup and saucer detail" width="314" height="314" loading="lazy">
        </article>
        <article class="craft-step reveal-block">
            <div><span>03</span><p class="eyebrow">Finishing</p><h2>The final detail matters.</h2><p>Pattern, edge, sheen and surface are reviewed as a complete language. The aim is an object that feels special on first sight and remains rewarding over time.</p></div>
            <img src="assets/images/home/cutlery-set.webp" alt="Gold-toned Kintsugi cutlery" width="1254" height="1254" loading="lazy">
        </article>
    </section>

    <section class="care-note reveal-block">
        <div><p class="eyebrow">Product care</p><h2>Made to be treasured.<br>Cared for with ease.</h2></div>
        <p>Use gentle soap, soft cloths and non-abrasive sponges. Pieces with metallic detailing should be hand washed and kept away from microwaves. Product-specific guidance is included on every product page.</p>
    </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
