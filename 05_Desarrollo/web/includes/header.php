<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#FDFDFB">
    <title><?= e($pages[$page][0]) ?> · k-morebi · Psicoterapia integral</title>
    <meta name="description" content="<?= e($pages[$page][1]) ?>">
    <meta name="robots" content="noindex, nofollow">
    <link rel="icon" href="assets/brand/k-morebi-horizontal-sobre-claro.svg" type="image/svg+xml">
    <link rel="preload" href="assets/fonts/GoogleSans-Variable.ttf" as="font" type="font/ttf" crossorigin>
    <link rel="stylesheet" href="assets/vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/site.css">
</head>
<body class="<?= $page === 'index' ? 'home' : ($page === 'primera-sesion' ? 'inside' : 'editorial') ?>">
<a class="skip" href="#principal">Ir al contenido</a>
<header class="header d-flex align-items-center justify-content-between">
    <a class="brand" href="index.php" aria-label="k-morebi, inicio"><img src="assets/brand/k-morebi-horizontal-sobre-claro.svg" width="1625" height="554" alt="k-morebi · psicoterapia integral"></a>
    <button class="menu-toggle" aria-label="Abrir menú" aria-expanded="false" aria-controls="navigation" type="button" data-menu-toggle><span></span><span></span></button>
    <nav class="site-nav" id="navigation" aria-label="Navegación principal">
        <?php foreach ($pages as $slug => [$label]): if ($slug === 'aviso-de-privacidad') continue; ?>
            <a href="<?= $slug ?>.php"<?= $page === $slug ? ' aria-current="page"' : '' ?>><?= e($label) ?></a>
        <?php endforeach; ?>
        <a class="button" href="#null">Solicitar una cita</a>
    </nav>
</header>
