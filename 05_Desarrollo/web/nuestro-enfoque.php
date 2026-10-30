<?php
$page = 'nuestro-enfoque';
require __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/header.php';
$blocks = $content['enfoque'];
?>
<main id="principal" tabindex="-1">
<?php editorial_hero($blocks[0], 'Nuestro enfoque', 'luz-entre-hojas'); ?>
<section class="editorial-section wrap" data-reveal>
    <div class="row align-items-center g-5">
        <div class="col-md-6"><figure class="editorial-photo"><?php photo('arquitectura-komorebi', 'Un espacio abierto a un patio arbolado'); ?></figure></div>
        <div class="col-md-6 reading"><h2><?= e($blocks[1]['heading']) ?></h2><?php paragraphs($blocks[1]); ?></div>
    </div>
</section>
<section class="green-section" data-reveal>
    <div class="wrap row g-5">
        <div class="col-md-5"><h2><?= e($blocks[2]['heading']) ?></h2></div>
        <div class="col-md-7 reading"><?php paragraphs($blocks[2]); ?></div>
    </div>
</section>
<section class="editorial-section wrap" data-reveal>
    <div class="row g-5 align-items-center">
        <div class="col-md-6 reading"><h2><?= e($blocks[3]['heading']) ?></h2><?php paragraphs($blocks[3]); ?></div>
        <div class="col-md-6"><figure class="editorial-photo"><?php photo('pasaje-de-luz', 'Luz filtrándose sobre una pared de materiales cálidos'); ?></figure></div>
    </div>
</section>
<section class="name-story" data-reveal>
    <div class="wrap row g-5 align-items-start">
        <div class="col-md-5"><p class="eyebrow">El sentido del nombre</p><h2><?= e($blocks[4]['heading']) ?></h2></div>
        <div class="col-md-7 reading"><?php paragraphs($blocks[4]); ?></div>
    </div>
</section>
<section class="editorial-section wrap" data-reveal>
    <div class="row g-5">
        <div class="col-md-5"><p class="eyebrow">Trayectoria desde <?= e($practice['since']) ?></p><h2><?= e($blocks[5]['heading']) ?></h2></div>
        <div class="col-md-7 reading">
            <?php if ($practice['professional_name'] !== null): ?><h3><?= e($practice['professional_name']) ?></h3><?php endif; ?>
            <p>En k-morebi acompañamos a personas de <?= e($practice['ages']) ?>, con una trayectoria que comienza en <?= e($practice['since']) ?>.</p>
            <?php paragraphs($blocks[5]); ?>
            <a class="link mt-4" href="#null">Consultar sobre el enfoque</a>
        </div>
    </div>
</section>
<?php closing(); ?>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
