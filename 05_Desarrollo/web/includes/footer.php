<footer class="footer" id="pie">
    <div class="footer-identity">
        <a class="brand" href="index.php" aria-label="k-morebi, inicio"><img src="assets/brand/k-morebi-horizontal-sobre-claro.svg" width="1625" height="554" alt="k-morebi · Psicoterapia integral"></a>
        <nav class="footer-social" aria-label="Redes sociales">
            <a href="#null" aria-label="WhatsApp" title="WhatsApp">
                <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M20.5 11.7a8.5 8.5 0 0 1-12.6 7.5L3 20.5l1.3-4.8A8.5 8.5 0 1 1 20.5 11.7Z" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><path d="M8.1 7.2c.2-.3.5-.3.8-.3h.4c.2 0 .3.1.4.4l.9 2c.1.2.1.4-.1.6l-.7.9c-.1.2-.1.3 0 .5.5.9 1.7 2 2.8 2.5.2.1.4.1.5-.1l.9-1.1c.2-.2.3-.2.6-.1l2 .9c.3.1.4.2.4.4 0 .6-.3 1.5-.8 1.8-.5.4-1.1.5-1.8.4-1-.2-2.6-.8-4.4-2.4-1.5-1.4-2.7-3.1-2.8-4.2-.1-.9.3-1.7.9-2.2Z"/></svg>
            </a>
            <a href="#null" aria-label="Facebook" title="Facebook">
                <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M14 22v-9h3l.5-3.5H14V7.3c0-1 .3-1.8 1.8-1.8h1.9V2.4a25 25 0 0 0-2.8-.2c-2.9 0-4.9 1.8-4.9 5v2.3H7V13h3v9Z"/></svg>
            </a>
            <a href="#null" aria-label="LinkedIn" title="LinkedIn">
                <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M4 2h16a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2Zm3 6.4a1.7 1.7 0 1 0 0-3.4 1.7 1.7 0 0 0 0 3.4ZM5.5 19h3v-9h-3Zm5 0h3v-5c0-1.3.6-2 1.7-2s1.5.8 1.5 2v5h3v-5.5c0-2.6-1.3-3.9-3.3-3.9-1.4 0-2.4.7-2.9 1.5V10h-3Z" fill-rule="evenodd"/></svg>
            </a>
            <a href="#null" aria-label="TikTok" title="TikTok">
                <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M14 2h3.2a5.4 5.4 0 0 0 4.3 4.7V10a8.4 8.4 0 0 1-4.3-1.5v7.1a6.4 6.4 0 1 1-5.6-6.3v3.3a3.1 3.1 0 1 0 2.4 3Z"/></svg>
            </a>
        </nav>
    </div>
    <p class="footer-message"><i>Tu historia merece tiempo, atención y un espacio propio.</i></p>
    <nav class="footer-links" aria-label="Navegación al pie">
        <?php foreach ($pages as $slug => [$label]): if ($slug === 'index') continue; ?>
            <a href="<?= $slug ?>.php"<?= $page === $slug ? ' aria-current="page"' : '' ?>><?= e($label) ?></a>
        <?php endforeach; ?>
    </nav>
    <p class="copyright">© 2026 k-morebi · Psicoterapia integral</p>
</footer>
<script src="assets/vendor/bootstrap/bootstrap.min.js" defer></script>
<script src="assets/js/site.js" defer></script>
<?php if ($page === 'index'): ?>
<script src="assets/js/hero-slideshow.js?v=<?= filemtime(__DIR__ . '/../assets/js/hero-slideshow.js') ?>" defer></script>
<?php endif; ?>
<?php if ($page !== 'index' && $page !== 'aviso-de-privacidad'): ?>
<script src="assets/js/hero-zoom.js?v=<?= filemtime(__DIR__ . '/../assets/js/hero-zoom.js') ?>" defer></script>
<?php endif; ?>
</body>
</html>
