<footer class="footer" id="pie">
    <a class="brand" href="index.php" aria-label="k-morebi, inicio"><img src="assets/brand/k-morebi-horizontal-sobre-claro.svg" width="1625" height="554" alt="k-morebi · psicoterapia integral"></a>
    <p class="footer-message">Tu historia merece tiempo, atención y un espacio propio.</p>
    <nav class="footer-links" aria-label="Navegación al pie">
        <?php foreach ($pages as $slug => [$label]): if ($slug === 'index') continue; ?>
            <a href="<?= $slug ?>.php"<?= $page === $slug ? ' aria-current="page"' : '' ?>><?= e($label) ?></a>
        <?php endforeach; ?>
    </nav>
    <p class="copyright">© 2026 k-morebi · Psicoterapia integral</p>
</footer>
<script src="assets/vendor/bootstrap/bootstrap.min.js" defer></script>
<script src="assets/js/site.js" defer></script>
</body>
</html>
