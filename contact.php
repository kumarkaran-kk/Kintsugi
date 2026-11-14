<?php

declare(strict_types=1);
require_once __DIR__ . '/config.php';

$pageTitle = 'Contact';
$pageDescription = 'Purchase Kintsugi tableware and find product support through IndieKonnect.';
$pageKey = 'contact';
$bodyClass = 'inner-page contact-page';
$heroImage = 'assets/images/home/real-hero-spectrum-clean.jpg';
$heroEyebrow = 'Purchases & Customer Support';
$heroTitle = 'Contact';
$heroIntro = 'Your Kintsugi experience, all in one place.';
require __DIR__ . '/includes/header.php';
?>
<main>
    <?php require __DIR__ . '/includes/inner-hero.php'; ?>

    <section class="contact-layout contact-support-layout section-pad" id="enquiry">
        <div class="contact-copy reveal-block">
            <p class="eyebrow">Purchases &amp; Customer Support</p>
            <h2>Your Kintsugi Experience, All in One Place.</h2>
            <p>Kintsugi showcases its fine porcelain tableware and collections through this website. All product purchases are facilitated through our retail partner, IndieKonnect.</p>
            <p>For product availability, pricing and purchases, customers are directed to the IndieKonnect portal.</p>
        </div>
        <div class="support-options reveal-block">
            <article><span>01</span><h3>Interested in Purchasing?</h3><p>Explore the Kintsugi collection and make your purchase through IndieKonnect.</p><a class="button" href="<?= htmlspecialchars(INDIEKONNECT_STORE_URL) ?>" target="_blank" rel="noopener">Shop Kintsugi on IndieKonnect</a></article>
            <article><span>02</span><h3>Need Assistance?</h3><p>For product-related queries, order updates, delivery information, returns or customer support, please reach out to the IndieKonnect customer support team.</p><a class="text-link" href="<?= htmlspecialchars(INDIEKONNECT_STORE_URL) ?>" target="_blank" rel="noopener">Visit IndieKonnect <span aria-hidden="true">↗</span></a></article>
            <p>IndieKonnect is the official point of contact for all purchase-related and post-purchase assistance.</p>
        </div>
    </section>

    <section class="contact-quote reveal-block"><p>Where Every Gathering Becomes a Memory.</p><span>Kintsugi · Royal Porcelain</span></section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
