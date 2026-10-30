<?php
$page = 'index';
require __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/header.php';
?>
<main id="principal" tabindex="-1">
<section class="hero">
    <figure class="hero-image"><?php photo("k-morebi-escucha-primera-sesion-v01", "Luz natural filtrándose entre árboles en un espacio sereno", true); ?></figure>
    <div class="hero-panel">
        <p class="eyebrow">Psicoterapia integral</p>
        <h1><span>Un espacio para ti,</span> <span>incluso cuando no sabes</span> <span>por dónde empezar.</span></h1>
        <p class="intro">A veces cuesta entender lo que sentimos o encontrar las palabras para contarlo. En k-morebi puedes comenzar por lo que hoy te preocupa y explorar, con acompañamiento, lo que necesitas.</p>
        <div class="actions"><a class="button" href="#null">Solicitar una cita</a><a class="link" href="nuestro-enfoque.php">Conocer el enfoque</a></div>
    </div>
</section>
<section data-reveal class="connection wrap">
    <figure><?php photo("k-morebi-conversacion-terapeutica-v01", "Hojas a contraluz y luz suave entre los árboles", false); ?></figure>
    <div class="connection-content">
        <h2>Lo que te pasa merece ser escuchado.</h2>
        <div class="connection-copy">
            <p>Tal vez atraviesas un cambio, una pérdida o una dificultad en tus relaciones. Quizá hay algo que se repite y te gustaría comprender, o simplemente quieres dedicar un espacio a conocerte mejor.</p>
            <p>No necesitas esperar a que el malestar ocupe todo tu día para buscar acompañamiento.</p>
        </div>
    </div>
</section>
<section data-reveal class="accompaniment" id="acompanamiento">
    <div class="accompaniment-grid wrap">
        <h2>Tiempo para hablar. Espacio para comprender.</h2>
        <div class="accompaniment-copy">
            <p>La psicoterapia permite detenerte y mirar con atención lo que estás viviendo. A través de la conversación, puedes explorar tus emociones, reconocer necesidades y encontrar nuevas perspectivas sobre tu historia.</p>
            <p>En k-morebi, el proceso se construye contigo, considerando tus circunstancias y lo que te gustaría trabajar.</p>
            <a class="link" href="servicios.php">Explorar los servicios</a>
        </div>
    </div>
</section>
<section data-reveal class="themes" id="servicios">
    <h2>Puedes llegar con una pregunta, una preocupación o algo que aún no tiene nombre.</h2>
    <div class="theme-cards">
        <article class="theme-card feature">
            <figure class="theme-image"><?php photo("luz-entre-hojas", "", false); ?></figure>
            <div class="theme-body">
                <h3>Lo que sientes</h3>
                <p>Dar lugar a emociones que te cuesta comprender, expresar o sostener en tu vida cotidiana.</p>
            </div>
        </article>
        <article class="theme-card change">
            <h3>Cómo te relacionas</h3>
            <p>Explorar vínculos, conflictos y formas de relacionarte que pueden estar generándote malestar.</p>
        </article>
        <article class="theme-card patterns">
            <h3>Lo que está cambiando</h3>
            <p>Encontrar acompañamiento durante pérdidas, transiciones o momentos de incertidumbre.</p>
        </article>
        <article class="theme-card personal">
            <h3>Lo que quieres conocer de ti</h3>
            <p>Observar tu historia, tus necesidades y las decisiones que deseas tomar.</p>
        </article>
    </div>
</section>
<section data-reveal class="anticipate wrap">
    <div>
        <h2>La primera sesión también es para tus dudas.</h2>
        <p>Es un momento para compartir qué te trae a consulta, conocer la forma de trabajo y preguntar lo que necesites. No tienes que preparar tu historia ni contar todo desde el principio.</p>
        <a class="link" href="primera-sesion.php">Conocer la primera sesión</a>
    </div>
    <figure><?php photo("pasaje-de-luz", "Un paso abierto hacia un jardín con luz natural", false); ?></figure>
</section>
<section data-reveal class="closing" id="contacto">
    <h2>Puedes comenzar por lo que hoy está presente.</h2>
    <p>Si estás pensando en iniciar terapia, escríbenos para conocer las opciones de atención y decidir con información.</p>
    <a class="button" href="#null">Consultar disponibilidad</a>
</section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
