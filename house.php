<?php

declare(strict_types=1);
require_once __DIR__ . '/config.php';

$pageTitle = 'The House of Kintsugi';
$pageDescription = 'The story, philosophy and values behind Kintsugi.';
$pageKey = 'house';
$bodyClass = 'inner-page house-page';
$heroImage = 'assets/images/home/tea-editorial.webp';
$heroEyebrow = 'Our story';
$heroTitle = 'The House of Kintsugi';
$heroIntro = 'A house built around the belief that beauty lives in the everyday.';
require __DIR__ . '/includes/header.php';
?>
<main>
    <?php require __DIR__ . '/includes/inner-hero.php'; ?>

    <section class="manifesto section-pad reveal-block">
        <p class="eyebrow">The Kintsugi idea</p>
        <h2>A beautiful object begins its life when it enters yours.</h2>
        <div class="manifesto-columns">
            <p>Kintsugi was imagined as more than a tableware label. It is a contemporary Indian house devoted to the objects that accompany our most human rituals: morning coffee, Sunday lunch, evening tea and celebrations that bring everyone home.</p>
            <p>A plate becomes memorable because it held a family recipe. A cup becomes personal because it belonged to a quiet morning. The object may be beautiful when chosen; the stories created around it are what make it priceless.</p>
        </div>
    </section>

    <section class="house-story reveal-block">
        <div class="house-story-image"><img src="assets/images/home/dining-story.webp" alt="A Kintsugi table prepared for gathering" width="950" height="950" loading="lazy"></div>
        <div class="house-story-copy">
            <p class="eyebrow">Our philosophy</p>
            <h2>Luxury, made warmer.</h2>
            <p>Sophisticated without being intimidating. Contemporary without losing warmth. Indian in spirit without feeling bound by the past.</p>
            <p>We bring together thoughtful form, expressive pattern and practical use so that beautiful pieces never need to wait for a special occasion.</p>
            <a class="text-link" href="craftsmanship.php">Discover our approach <span aria-hidden="true">↗</span></a>
        </div>
    </section>

    <section class="values section-pad">
        <div class="section-heading reveal-block"><p class="eyebrow">What we value</p><h2>The principles we return to.</h2></div>
        <div class="value-grid">
            <article class="reveal-block"><span>01</span><h3>Design</h3><p>Every piece contributes to a beautifully considered table.</p></article>
            <article class="reveal-block"><span>02</span><h3>Craft</h3><p>Attention to form, finish, material and the smallest detail.</p></article>
            <article class="reveal-block"><span>03</span><h3>Function</h3><p>Beauty remains practical, useful and at home in everyday life.</p></article>
            <article class="reveal-block"><span>04</span><h3>Togetherness</h3><p>The table is where we gather, connect and create memories.</p></article>
        </div>
    </section>

    <section class="brand-promise reveal-block">
        <p>Our promise</p>
        <blockquote>Designed to make every table worth remembering.</blockquote>
        <a class="button button-light" href="collections.php">Discover the collections</a>
    </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
