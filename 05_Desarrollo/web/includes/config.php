<?php
declare(strict_types=1);

// Datos confirmados por Dirección Creativa, 29 de octubre de 2026.
$practice = [
    'ages' => '6 a 65 años',
    'duration' => '120 minutos',
    'fee' => '$1,500 MXN',
    'since' => '1990',
    'modality' => null,
    'professional_name' => null,
    'credentials' => null,
    'whatsapp' => null,
    'email' => null,
    'address' => null,
    'response_hours' => null,
    'response_time' => null,
    'approved_privacy_notice' => null,
];

$pages = [
    'index' => ['Inicio', 'Un espacio para escucharte y comprender lo que vives. Conoce k-morebi · Psicoterapia integral.'],
    'nuestro-enfoque' => ['Nuestro enfoque', 'Una mirada integral a tu historia, tus emociones, tus vínculos y el momento que atraviesas.'],
    'servicios' => ['Servicios', 'Conoce el acompañamiento psicoterapéutico de k-morebi y la información para tu primera cita.'],
    'primera-sesion' => ['Primera sesión', 'Qué sucede antes, durante y después de tu primera sesión. Un espacio también para tus dudas.'],
    'contacto' => ['Contacto', 'Conoce los pasos para consultar sobre la atención y solicitar una primera sesión en k-morebi.'],
    'aviso-de-privacidad' => ['Aviso de privacidad', 'Información sobre el aviso de privacidad de k-morebi · Psicoterapia integral.'],
];
$content = json_decode(file_get_contents(__DIR__ . '/content.json'), true, 512, JSON_THROW_ON_ERROR);

function e(string $value): string {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function photo(string $name, string $alt = '', bool $priority = false): void {
    $sizes = '(max-width: 760px) 100vw, 60vw';
    $width = $name === 'pasaje-de-luz' ? 1024 : 1536;
    $height = $name === 'pasaje-de-luz' ? 1536 : 1024;
    if ($name === 'k-morebi-hero-acompanamiento-v01') {
        $width = 1672;
        $height = 941;
    }
    // Original sources are preserved; never upscale the web derivatives.
    $candidates = 'assets/images/' . e($name) . '-640.webp 640w, assets/images/' . e($name) . '-1280.webp ' . min(1280, $width) . 'w';
    if ($width > 1280) $candidates .= ', assets/images/' . e($name) . '-1920.webp ' . $width . 'w';
    echo '<img class="photo" src="assets/images/' . e($name) . '-1280.webp" srcset="' . $candidates . '" sizes="' . $sizes . '" width="' . $width . '" height="' . $height . '" alt="' . e($alt) . '" ' . ($priority ? 'fetchpriority="high" loading="eager"' : 'loading="lazy"') . ' decoding="async">';
}

function paragraphs(array $block): void {
    foreach ($block['paragraphs'] as $text) {
        echo '<p>' . e($text) . '</p>';
    }
}

function editorial_hero(array $block, string $label, string $image): void { ?>
<section class="hero editorial-hero">
    <figure class="hero-image"><?php photo($image, 'Luz natural, vegetación y materiales cálidos', true); ?></figure>
    <div class="hero-panel">
        <p class="eyebrow"><?= e($label) ?></p>
        <h1><?= e($block['heading']) ?></h1>
        <div class="intro"><?php paragraphs($block); ?></div>
    </div>
</section>
<?php }

function closing(): void { ?>
<section class="closing" data-reveal>
    <h2>Puedes comenzar por lo que hoy está presente.</h2>
    <p>Si estás pensando en iniciar terapia, escríbenos para conocer las opciones de atención y decidir con información.</p>
    <a class="button" href="#null">Consultar disponibilidad</a>
</section>
<?php }
