<?php

declare(strict_types=1);
require_once __DIR__ . '/config.php';

$pageTitle = 'Contact';
$pageDescription = 'Speak with Kintsugi about products, gifting and partnerships.';
$pageKey = 'contact';
$bodyClass = 'inner-page contact-page';
$heroImage = 'assets/images/home/tea-story.webp';
$heroEyebrow = 'Begin a conversation';
$heroTitle = 'Contact';
$heroIntro = 'For product guidance, gifting or partnerships, our house is here to help.';
require __DIR__ . '/includes/header.php';
?>
<main>
    <?php require __DIR__ . '/includes/inner-hero.php'; ?>

    <section class="contact-layout section-pad" id="enquiry">
        <div class="contact-copy reveal-block">
            <p class="eyebrow">Write to the house</p>
            <h2>Tell us what you are gathering for.</h2>
            <p>Whether you are choosing a personal table setting, marking a new beginning or planning gifts at scale, share a little about what you need.</p>
            <dl>
                <div><dt>Email</dt><dd><a href="mailto:hello@kintsugi.in">hello@kintsugi.in</a></dd></div>
                <div><dt>Shopping</dt><dd><a href="<?= htmlspecialchars(INDIEKONNECT_STORE_URL) ?>" target="_blank" rel="noopener">Kintsugi on IndieKonnect ↗</a></dd></div>
                <div><dt>Enquiries</dt><dd>Products · Gifting · Partnerships</dd></div>
            </dl>
        </div>
        <form class="contact-form reveal-block" data-contact-form>
            <label><span>Your name</span><input type="text" name="name" autocomplete="name" required></label>
            <label><span>Email address</span><input type="email" name="email" autocomplete="email" required></label>
            <label><span>I’m interested in</span><select name="interest"><option>Product guidance</option><option>Gifting</option><option>Corporate gifting</option><option>Partnerships</option><option>Something else</option></select></label>
            <label><span>Tell us more</span><textarea name="message" rows="5" required></textarea></label>
            <button class="button" type="submit">Prepare enquiry</button>
            <p class="form-note" data-form-note>This opens your email application so you can review the message before sending.</p>
        </form>
    </section>

    <section class="contact-quote reveal-block"><p>“The table is where everyday life becomes a shared story.”</p></section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
