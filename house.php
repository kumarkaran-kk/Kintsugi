<?php

declare(strict_types=1);
require_once __DIR__ . '/config.php';

$pageTitle = 'The House of Kintsugi';
$pageDescription = 'The story, philosophy and values behind Kintsugi.';
$pageKey = 'house';
$bodyClass = 'inner-page house-page';
$heroImage = 'assets/images/home/real-hero-spectrum-clean.jpg';
$heroEyebrow = 'Our story';
$heroTitle = 'The House of Kintsugi';
$heroIntro = 'A house built around the belief that beauty lives in the everyday.';
require __DIR__ . '/includes/header.php';
?>
<main>
    <?php require __DIR__ . '/includes/inner-hero.php'; ?>

    <section class="manifesto section-pad reveal-block">
        <p class="eyebrow">The Kintsugi Philosophy</p>
        <h2>A beautiful object finds its meaning in the moments it becomes part of.</h2>
        <div class="manifesto-columns">
            <p>Kintsugi is envisioned as more than a tableware brand. It is a contemporary Indian expression of thoughtful design, fine craftsmanship and the beauty of everyday living.<br><br>Inspired by the moments that bring people together — morning coffee, leisurely Sunday lunches, evening tea and celebrations shared with loved ones — Kintsugi creates tableware that becomes part of life's most meaningful rituals.</p>
            <p>A plate becomes special when it holds a cherished family recipe. A cup becomes personal through the quiet moments it accompanies. While an object may first catch your eye through its beauty, it is the memories created around it that give it lasting value.</p>
        </div>
    </section>

    <section class="house-story reveal-block">
        <div class="house-story-image"><img src="assets/images/home/real-hero-spectrum-clean.jpg" alt="A Spectrum Luxe table prepared for gathering" width="1842" height="854" loading="lazy"></div>
        <div class="house-story-copy">
            <p class="eyebrow">Our philosophy</p>
            <h2>Luxury, made warmer.</h2>
            <p>Sophisticated yet welcoming. Contemporary yet timeless. Rooted in Indian sensibilities while embracing modern design.</p>
            <p>At Kintsugi, we believe fine tableware should be as meaningful as it is beautiful. We bring together thoughtful design, fine porcelain and exquisite 24K gold detailing to create pieces that elevate everyday dining and make special occasions even more memorable.</p>
            <p>Because elegance should not be reserved for celebrations; it should be part of everyday living.</p>
            <a class="text-link" href="craftsmanship.php">Discover our approach <span aria-hidden="true">↗</span></a>
        </div>
    </section>

    <section class="values section-pad">
        <div class="section-heading reveal-block"><p class="eyebrow">What We Value</p><h2>The Principles Behind Every Piece.</h2></div>
        <div class="value-grid">
            <article class="reveal-block"><span>01 — Design</span><h3>Beauty with purpose.</h3><p>Thoughtfully designed pieces that bring beauty, character and harmony to every table.</p></article>
            <article class="reveal-block"><span>02 — Craft</span><h3>Detail, considered.</h3><p>A commitment to fine porcelain, exquisite 24K gold detailing and attention to every detail.</p></article>
            <article class="reveal-block"><span>03 — Function</span><h3>Made to be lived with.</h3><p>Beautiful tableware designed to be enjoyed, used and appreciated in everyday life.</p></article>
            <article class="reveal-block"><span>04 — Togetherness</span><h3>For moments shared.</h3><p>Celebrating the moments, conversations and memories that bring people together around the table.</p></article>
        </div>
    </section>

    <section class="brand-promise reveal-block">
        <p>Our promise</p>
        <blockquote>Designed to make every table worth remembering.</blockquote>
        <a class="button button-light" href="collections.php">Discover the collections</a>
    </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
