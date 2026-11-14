<?php

declare(strict_types=1);
require_once __DIR__ . '/config.php';

$pageTitle = 'Frequently Asked Questions';
$pageDescription = 'Answers about Kintsugi, its materials, craftsmanship, collections, purchases and product care.';
$pageKey = 'faq';
$bodyClass = 'inner-page faq-page';
$heroImage = 'assets/images/pages/collections-hero.webp';
$heroEyebrow = 'Kintsugi Guide';
$heroTitle = 'Frequently Asked Questions';
$heroIntro = 'Find answers about our materials, craftsmanship, collections and product care.';

$faqSections = [
    'About Kintsugi' => [
        ['What is Kintsugi?', '<p>Kintsugi is a luxury contemporary Indian tableware brand that brings together refined design, fine porcelain and the beauty of shared dining experiences.</p><p>Inspired by the significance of the dining table in Indian homes, Kintsugi celebrates everyday rituals, family traditions and special occasions.</p>'],
        ['What does the name Kintsugi mean?', '<p>Kintsugi is a Japanese word derived from two words: <strong>Kin (金)</strong>, meaning gold, and <strong>Tsugi (継ぎ)</strong>, meaning joining or mending.</p><p>The name draws inspiration from the idea of bringing beauty and gold together, reflecting the brand’s appreciation for craftsmanship, thoughtful detailing and the beauty of everyday moments.</p>'],
        ['What is the philosophy behind Kintsugi?', '<p>Kintsugi believes that beautiful tableware should not be reserved only for special occasions. The dining table is where families come together, traditions continue, conversations happen and memories are created.</p><p>Our philosophy centres on making everyday dining experiences more meaningful through thoughtful design and beautiful tableware.</p>'],
        ['What makes Kintsugi different from other tableware brands?', '<ul><li>Fine porcelain craftsmanship</li><li>Completely bone-ash-free porcelain</li><li>24-carat gold detailing</li><li>Thoughtful contemporary designs</li><li>Three distinctive signature collections</li><li>A philosophy centred on Indian dining traditions and togetherness</li></ul>'],
        ['What are the four pillars of Kintsugi?', '<p><strong>Design:</strong> Thoughtful patterns, considered forms and refined finishes.<br><strong>Craft:</strong> Attention to materials, decorative detailing and finishing.<br><strong>Function:</strong> Tableware that balances visual elegance with practical use.<br><strong>Togetherness:</strong> Pieces designed to become part of family meals, celebrations and meaningful gatherings.</p>'],
    ],
    'Materials & Craftsmanship' => [
        ['What material is used in Kintsugi tableware?', '<p>Kintsugi uses fine porcelain, valued for its smooth surface, refined appearance and elegant presentation.</p>'],
        ['What is porcelain?', '<p>Porcelain is a premium ceramic material known for its smooth finish, refined appearance and durability. It is widely used in fine dining and premium tableware.</p>'],
        ['Is Kintsugi porcelain bone china?', '<p>No. Kintsugi uses completely bone-ash-free porcelain. Unlike traditional bone china, which contains bone ash as one of its ingredients, Kintsugi porcelain does not contain bone ash.</p>'],
        ['What is the difference between porcelain and bone china?', '<p><strong>Porcelain</strong> is made using ceramic minerals and does not require bone ash. <strong>Bone china</strong> traditionally contains bone ash as part of its composition. Kintsugi uses completely bone-ash-free porcelain.</p>'],
        ['Does Kintsugi use real gold detailing?', '<p>Kintsugi features 24-carat gold detailing as part of its signature decorative finish. It creates an elegant contrast against the porcelain and requires appropriate care.</p>'],
        ['Does the gold detailing require special care?', '<p>Yes. Avoid abrasive cleaning materials, harsh detergents and rough handling to help preserve its decorative finish and shine.</p>'],
    ],
    'Understanding Our Collections' => [
        ['How many collections does Kintsugi currently offer?', '<p>Kintsugi currently offers three signature collections: <strong>Aureate Gold, Spectrum Luxe and Royal Opulence.</strong> Each has its own design language, composition and personality.</p>'],
        ['What is Aureate Gold?', '<p><strong>The Art of Radiant Hospitality.</strong> Inspired by warmth, luminosity and timeless grace, Aureate Gold combines fine bone-ash-free porcelain with 24-carat gold detailing.</p><ul><li>20-piece composition</li><li>Fine porcelain</li><li>24-carat gold detailing</li><li>Collection price: ₹72,992</li></ul>'],
        ['What does the Aureate Gold collection include?', '<p>6 Dinner Plates, 6 Bread & Butter Plates, 6 Small Bowls, 1 Salad Bowl and 1 Platter — 20 pieces in total.</p>'],
        ['What is Spectrum Luxe?', '<p><strong>A Bold Symphony of Modern Art.</strong> Spectrum Luxe is designed for those who appreciate colour, artistic expression and contemporary aesthetics.</p><ul><li>47-piece curated composition</li><li>Bold contemporary design</li><li>Fine porcelain craftsmanship</li><li>Collection price: ₹1,32,528</li></ul>'],
        ['What does the Spectrum Luxe collection include?', '<p>6 Dinner Plates, 6 Bread & Butter Plates, 6 Dessert Bowls, 6 Small Bowls, 1 Casserole with Lid, 1 Platter, 2 Large Salad Bowls, 1 Large Bowl, 6 Tea Cups, 6 Saucers, 1 Tea Pot with Lid, 1 Milk/Creamer and 1 Sugar Bowl with Lid — 47 pieces in total.</p>'],
        ['What is Royal Opulence?', '<p><strong>The Ultimate Expression of Dining Luxury.</strong> Royal Opulence represents grandeur, heritage and sophisticated dining.</p><ul><li>54-piece curated composition</li><li>Signature luxury finish</li><li>Designed for special occasions</li><li>Collection price: ₹1,82,465</li></ul>'],
        ['What does the Royal Opulence collection include?', '<p>6 Soup Bowls, 6 Soup Spoons, 6 Dinner Plates, 6 Salad Plates, 6 Bread & Butter Plates, 6 Dessert Bowls, 6 Small Bowls, 2 Casseroles with Lids, 1 Platter, 2 Large Salad Bowls, 1 Large Bowl and 2 Pickle Jars with Lids — 54 pieces in total.</p>'],
        ['How are the three Kintsugi collections different?', '<p><strong>Aureate Gold</strong> offers understated warmth and timeless gold detailing. <strong>Spectrum Luxe</strong> celebrates bold colour and contemporary expression. <strong>Royal Opulence</strong> is elaborate, grand and designed for luxurious dining arrangements.</p>'],
        ['Are there more collections coming?', '<p>Kintsugi currently offers three signature collections. Further collections and launches will be communicated through official brand announcements.</p>'],
    ],
    'Product Usage & Care' => [
        ['Can Kintsugi tableware be used every day?', '<p>Yes. The collections are designed to elevate everyday meals as well as celebrations. Because they feature fine porcelain and delicate gold detailing, they should be handled and cleaned carefully.</p>'],
        ['Is Kintsugi tableware dishwasher-safe?', '<p>No. Dishwasher heat, detergents and water pressure may damage the decorative gold finish. Hand washing is recommended.</p>'],
        ['Is Kintsugi tableware microwave-safe?', '<p>No. Metallic gold detailing can cause sparking in a microwave and may damage the product or appliance.</p>'],
        ['How should Kintsugi tableware be cleaned?', '<ul><li>Use a soft sponge or cloth</li><li>Use mild dishwashing liquid</li><li>Wash gently without excessive pressure</li><li>Avoid abrasive scrubbers, scouring powders and harsh cleaners</li></ul>'],
        ['How should the gold detailing be maintained?', '<p>Avoid abrasive materials, do not scrub gold-decorated areas, avoid harsh chemicals and always hand wash gently.</p>'],
        ['Can Kintsugi tableware be exposed to sudden temperature changes?', '<p>No. Sudden temperature changes may cause thermal shock, damage or cracking.</p>'],
        ['How should Kintsugi tableware be stored?', '<p>Stack plates and bowls carefully, use protective separators wherever possible and avoid knocking pieces against hard surfaces.</p>'],
        ['Can porcelain pieces chip or break?', '<p>Yes. Like other fine porcelain products, Kintsugi tableware can chip or break if dropped, knocked or handled roughly.</p>'],
        ['What are the most important care instructions to remember?', '<ol><li>Do not use a dishwasher</li><li>Do not use a microwave</li><li>Hand wash with a soft sponge and mild detergent</li><li>Avoid sudden temperature changes</li><li>Store carefully</li></ol><p><a class="text-link" href="product-care.php">Visit the Product Care page</a></p>'],
    ],
    'Luxury Tableware & Kintsugi' => [
        ['Why should someone invest in luxury tableware?', '<p>Luxury tableware enhances the dining experience through design, material quality, craftsmanship and presentation. A beautifully set table can make an ordinary meal feel special.</p>'],
        ['Is Kintsugi only meant for special occasions?', '<p>No. Kintsugi’s philosophy centres on making everyday moments beautiful. The collections elevate daily meals, family gatherings, festive occasions and celebrations.</p>'],
        ['What makes Kintsugi a luxury tableware brand?', '<p>Fine porcelain, completely bone-ash-free material, 24-carat gold detailing, distinctive artistic collections, attention to craftsmanship and a refined contemporary Indian dining philosophy.</p>'],
        ['How would you describe Kintsugi in simple words?', '<p>Kintsugi is a luxury contemporary Indian tableware brand that believes every meal deserves a beautiful setting. Its three collections combine fine bone-ash-free porcelain with decorative 24-carat gold detailing.</p>'],
    ],
    'Purchases & Customer Support' => [
        ['Where can I purchase Kintsugi products?', '<p>All Kintsugi purchases are facilitated through our retail partner, IndieKonnect. Explore collections, check availability and purchase through the IndieKonnect portal.</p><p><a class="button" href="' . htmlspecialchars(INDIEKONNECT_STORE_URL) . '" target="_blank" rel="noopener">Shop Kintsugi on IndieKonnect</a></p>'],
        ['Whom should I contact for product or order-related assistance?', '<p>For product queries, order updates, delivery information, returns and customer support, please contact the IndieKonnect customer support team. IndieKonnect is the official point of contact for purchase-related and post-purchase assistance.</p>'],
    ],
];

require __DIR__ . '/includes/header.php';
?>
<main>
    <?php require __DIR__ . '/includes/inner-hero.php'; ?>

    <section class="faq-content section-pad">
        <?php $questionNumber = 1; ?>
        <?php foreach ($faqSections as $sectionTitle => $questions): ?>
            <section class="faq-group reveal-block">
                <div class="faq-group-heading"><span><?= str_pad((string) (array_search($sectionTitle, array_keys($faqSections), true) + 1), 2, '0', STR_PAD_LEFT) ?></span><h2><?= htmlspecialchars($sectionTitle) ?></h2></div>
                <div class="faq-list">
                    <?php foreach ($questions as [$question, $answer]): ?>
                        <details><summary><span><?= str_pad((string) $questionNumber++, 2, '0', STR_PAD_LEFT) ?></span><?= htmlspecialchars($question) ?><i aria-hidden="true"></i></summary><div class="faq-answer"><?= $answer ?></div></details>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endforeach; ?>
    </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
