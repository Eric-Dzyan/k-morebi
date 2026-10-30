<?php
$page = 'servicios';
require __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/header.php';
$blocks = $content['servicios'];
?>
<main id="principal" tabindex="-1">
<?php editorial_hero($blocks[0], 'Servicios', 'arquitectura-komorebi'); ?>
<section class="green-section" data-reveal>
    <div class="wrap row g-5">
        <div class="col-md-5"><h2><?= e($blocks[1]['heading']) ?></h2></div>
        <div class="col-md-7 reading"><?php paragraphs($blocks[1]); ?><p>Atención a personas de <?= e($practice['ages']) ?>.</p><a class="link mt-4" href="#null">Consultar opciones de atención</a></div>
    </div>
</section>
<section class="editorial-section wrap consultation-themes" data-reveal aria-label="Motivos de consulta">
    <div class="row g-4">
    <?php for ($i = 2; $i <= 5; $i++): ?>
        <div class="col-md-6">
            <article class="service-card h-100">
                <span class="small-number" aria-hidden="true">0<?= $i-1 ?></span>
                <h2><?= e($blocks[$i]['heading']) ?></h2>
                <?php paragraphs($blocks[$i]); ?>
            </article>
        </div>
    <?php endfor; ?>
    </div>
</section>
<section class="practical-section" data-reveal>
    <div class="wrap row g-5">
        <div class="col-lg-5"><p class="eyebrow">Información práctica</p><h2><?= e($blocks[6]['heading']) ?></h2></div>
        <div class="col-lg-7">
            <dl class="practice-details">
                <div><dt>Población atendida</dt><dd>Personas de <?= e($practice['ages']) ?></dd></div>
                <div><dt>Duración por sesión</dt><dd><?= e($practice['duration']) ?></dd></div>
                <div><dt>Honorarios por sesión</dt><dd><?= e($practice['fee']) ?></dd></div>
                <div><dt>Modalidad</dt><dd><?= $practice['modality'] === null ? 'Consulta las opciones de atención.' : e($practice['modality']) ?></dd></div>
                <div><dt>Frecuencia</dt><dd>Se conversa según las necesidades de atención y la disponibilidad.</dd></div>
            </dl>
            <?php paragraphs($blocks[6]); ?>
            <a class="button mt-4" href="#null">Consultar antes de agendar</a>
        </div>
    </div>
</section>
<section class="anticipate wrap" data-reveal>
    <div><h2>La primera sesión también es para tus dudas.</h2><p>Es un momento para compartir qué te trae a consulta, conocer la forma de trabajo y preguntar lo que necesites.</p><a class="link" href="primera-sesion.php">Conocer la primera sesión</a></div>
    <figure><?php photo('pasaje-de-luz', 'Un paso abierto hacia un jardín con luz natural'); ?></figure>
</section>
<?php closing(); ?>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
