    <footer class="site-footer">
        <div class="footer-main">
            <div class="footer-brand">
                <img src="assets/images/brand/kintsugi-logo.svg" alt="Kintsugi" width="454" height="186" loading="lazy">
                <p>We'll write to you only when the<br>feeling is right - stories worth<br>keeping, journeys worth dreaming.</p>
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
                <h3>Collections</h3><a href="dining.php">Dining</a><a href="kitchen.php">Kitchen</a><a href="serveware.php">Serveware</a><a href="gifting.php">Gifting</a><a href="collections.php#signature">Signature Collections</a>
            </nav>
            <nav class="footer-column footer-quick" aria-label="Quick links">
                <h3>Discover</h3><a href="house.php">The House of Kintsugi</a><a href="craftsmanship.php">Craftsmanship</a><a href="collections.php">All Collections</a><a href="contact.php">Contact Us</a><a href="<?= htmlspecialchars(INDIEKONNECT_STORE_URL) ?>" target="_blank" rel="noopener">Shop on IndieKonnect</a>
            </nav>
            <nav class="footer-column footer-help" aria-label="Help links">
                <h3>Enquiries</h3><a href="contact.php#enquiry">Product Enquiries</a><a href="contact.php#enquiry">Corporate Gifting</a><a href="mailto:hello@kintsugi.in">hello@kintsugi.in</a><a href="house.php">About Us</a>
            </nav>
            <div class="footer-tableware" aria-hidden="true"></div>
        </div>
        <div class="footer-bar"><span class="footer-copyright">2026 Kintsugi All rights reserved</span><span class="footer-payments" role="img" aria-label="Accepted payment methods"></span><span class="footer-legal"><a href="#">Terms And Condition</a><i></i><a href="#">Privacy Policy</a></span></div>
    </footer>
    <script src="assets/js/main.js"></script>
</body>

</html>
