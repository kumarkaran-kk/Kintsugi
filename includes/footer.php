    <footer class="site-footer">
        <div class="footer-main">
            <div class="footer-brand">
                <img src="assets/images/brand/kintsugi-logo.svg" alt="Kintsugi" width="454" height="186" loading="lazy">
                <p class="footer-tagline">Beauty lives in the everyday.</p>
                <nav class="footer-social" aria-label="Kintsugi social media">
                    <?php foreach (KINTSUGI_SOCIAL_URLS as $platform => $url): ?>
                        <a href="<?= htmlspecialchars($url) ?>" target="_blank" rel="noopener noreferrer" aria-label="Follow Kintsugi on <?= htmlspecialchars($platform) ?>">
                            <span class="footer-social-icon" style="--social-icon: url('../images/social/<?= strtolower(htmlspecialchars($platform)) ?>.svg')" aria-hidden="true"></span>
                            <span class="visually-hidden"><?= htmlspecialchars($platform) ?></span>
                        </a>
                    <?php endforeach; ?>
                </nav>
            </div>
            <nav class="footer-column footer-categories" aria-label="Product categories">
                <h3>Collections</h3><a href="product.php?product=aureate-gold">Aureate Gold</a><a href="product.php?product=spectrum-luxe">Spectrum Luxe</a><a href="product.php?product=royal-opulence">Royal Opulence</a>
            </nav>
            <nav class="footer-column footer-quick" aria-label="Quick links">
                <h3>Discover</h3><a href="house.php">The House of Kintsugi</a><a href="craftsmanship.php">Craftsmanship</a><a href="collections.php">All Collections</a><a href="product-care.php">Product Care</a><a href="<?= htmlspecialchars(INDIEKONNECT_STORE_URL) ?>" target="_blank" rel="noopener">Shop on IndieKonnect</a>
            </nav>
            <nav class="footer-column footer-help" aria-label="Help links">
                <h3>Help</h3><a href="contact.php">Purchases &amp; Support</a><a href="faq.php">FAQs</a><a href="house.php">About Us</a>
            </nav>
            <div class="footer-tableware" aria-hidden="true"></div>
        </div>
        <div class="footer-bar"><span class="footer-copyright">2026 Kintsugi All rights reserved</span><span class="footer-payments" role="img" aria-label="Accepted payment methods"></span><span class="footer-legal"><a href="#">Terms And Condition</a><i></i><a href="#">Privacy Policy</a></span></div>
    </footer>
    <script src="assets/js/main.js"></script>
</body>

</html>
