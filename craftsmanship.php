<?php

declare(strict_types=1);
require_once __DIR__ . '/config.php';

$pageTitle = 'Craftsmanship';
$pageDescription = 'Discover the considered design, material and finishing behind Kintsugi tableware.';
$pageKey = 'craftsmanship';
$bodyClass = 'inner-page craftsmanship-page';
$heroImage = 'assets/images/pages/craftsmanship-clean-bowl.jpg';
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
        <p>At Kintsugi, we believe beautiful tableware should be experienced, not just admired. Every piece brings together thoughtful design, fine porcelain and exquisite 24K gold detailing, balancing visual appeal with everyday functionality.</p>
        <p>From the way a piece looks on the table to the way it becomes part of everyday moments, we believe true refinement lies in the details and the experience of living with it.</p>
    </section>

    <section class="craft-process section-pad">
        <article class="craft-step reveal-block">
            <div><span>01</span>
                <p class="eyebrow">Design philosophy</p>
                <h2>Begin with the ritual.</h2>
                <p>Every piece begins with the moments it is designed to be part of. From the comfort of holding a cup to the way a table comes together, we consider how thoughtful design can make everyday experiences more meaningful.</p>
            </div>
            <img src="assets/images/pages/craftsmanship-aureate.webp" alt="Aureate Gold place setting" width="1080" height="1080" loading="lazy">
        </article>
        <article class="craft-step reverse reveal-block">
            <div><span>02</span>
                <p class="eyebrow">Form and function</p>
                <h2>Beauty that belongs.</h2>
                <p>We believe beautiful tableware should be as practical as it is refined. Every shape, proportion and detail is thoughtfully considered to create pieces that complement both everyday dining and special occasions.</p>
            </div>
            <img src="assets/images/pages/craftsmanship-spectrum.webp"
                alt="Kintsugi Spectrum Luxe place setting" width="1080" height="1080" loading="lazy">
        </article>
        <article class="craft-step reveal-block">
            <div><span>03</span>
                <p class="eyebrow">The Art of Finishing</p>
                <h2>Every detail matters.</h2>
                <p>From carefully considered patterns and elegant surfaces to exquisite 24K gold detailing, every element contributes to the character of a piece. Combined with fine porcelain, these details create tableware that feels distinctive, refined and timeless.</p>
            </div>
            <img src="assets/images/pages/craftsmanship-royal.webp" alt="Royal Opulence place setting" width="1080" height="1080" loading="lazy">
        </article>
    </section>

    <section class="care-note reveal-block">
        <div>
            <p class="eyebrow">Made to Be Treasured</p>
            <h2>Care That Preserves Its Beauty.</h2>
        </div>
        <div class="care-note-copy"><p>Kintsugi tableware is thoughtfully crafted to be enjoyed and cherished for years to come. With mindful care and gentle handling, you can preserve the elegance of fine porcelain and the delicate beauty of its 24K gold detailing.</p><a class="text-link" href="product-care.php">Explore Product Care <span aria-hidden="true">↗</span></a></div>
    </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
