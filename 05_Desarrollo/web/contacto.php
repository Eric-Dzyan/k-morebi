<?php
$page = 'contacto';
require __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/header.php';
?>
<main id="principal" tabindex="-1">
<?php editorial_hero(['heading' => 'Tu primer mensaje puede ser sencillo.', 'paragraphs' => ['Puedes escribir para solicitar una cita o conocer cómo funciona la atención. Para consultar disponibilidad no necesitas explicar tu historia ni compartir información de salud.']], 'Contacto', 'pasaje-de-luz'); ?>
<section class="editorial-section wrap contact-layout" data-reveal>
    <div class="row g-5">
        <div class="col-lg-5">
            <p class="eyebrow">Canales de contacto</p>
            <h2>Conversemos sobre el siguiente paso.</h2>
            <div class="contact-channel"><h3>WhatsApp</h3><a class="link" href="#null">Escribir por WhatsApp <span aria-hidden="true">↗</span></a></div>
            <div class="contact-channel"><h3>Correo electrónico</h3><a class="link" href="#null">Enviar un correo <span aria-hidden="true">↗</span></a></div>
            <p class="contact-note">Este canal se utiliza para información y citas. No ofrece atención inmediata ni atención de emergencias.</p>
        </div>
        <div class="col-lg-7">
            <div class="contact-form-panel">
                <h2>¿Prefieres que te respondamos por correo?</h2>
                <p class="form-intro">Deja tus datos y cuéntanos qué información necesitas. Los campos marcados con asterisco son obligatorios.</p>
                <p class="preview-note" id="form-preview">Vista de presentación: el formulario aún no envía ni guarda información.</p>
                <form novalidate aria-describedby="form-preview">
                    <div class="row g-4">
                        <div class="col-sm-6"><label class="form-label" for="name">Nombre *</label><input class="form-control" id="name" name="name" type="text" autocomplete="name" placeholder="Tu nombre"></div>
                        <div class="col-sm-6"><label class="form-label" for="email">Correo electrónico *</label><input class="form-control" id="email" name="email" type="email" autocomplete="email" placeholder="nombre@correo.com" aria-describedby="email-help"><div class="form-text" id="email-help">Usaremos este correo para responder a tu solicitud.</div></div>
                        <div class="col-12"><label class="form-label" for="reason">¿En qué podemos ayudarte? *</label><select class="form-select" id="reason" name="reason"><option value="">Selecciona una opción</option><option>Solicitar una cita</option><option>Conocer modalidades y honorarios</option><option>Resolver otra duda</option></select></div>
                        <div class="col-12"><label class="form-label" for="message">Mensaje opcional</label><textarea class="form-control" id="message" name="message" rows="4" placeholder="Escribe la información que te gustaría recibir." aria-describedby="message-help"></textarea><div class="form-text" id="message-help">Para este primer contacto basta con una consulta breve. Evita incluir información de salud o detalles de tu historia.</div></div>
                        <div class="col-12"><p class="form-text">Consulta el tratamiento de tus datos en el <a class="inline-link" href="aviso-de-privacidad.php">Aviso de privacidad</a>.</p><button class="button mt-4" type="button" aria-disabled="true" aria-describedby="form-preview">Enviar consulta</button><p class="form-text mt-3">Tu cita se confirma después de acordar la disponibilidad y completar los pasos de confirmación.</p></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<section class="practical-section" data-reveal>
    <div class="wrap"><h2>Qué sucede después de escribirnos.</h2>
        <ol class="next-steps row g-4 list-unstyled mt-4">
            <li class="col-md-4"><span class="small-number" aria-hidden="true">01</span><p>Recibes información sobre la atención y los horarios disponibles.</p></li>
            <li class="col-md-4"><span class="small-number" aria-hidden="true">02</span><p>Resuelves tus dudas y decides si deseas solicitar una sesión.</p></li>
            <li class="col-md-4"><span class="small-number" aria-hidden="true">03</span><p>Si continúas, recibes la confirmación y las indicaciones para tu cita.</p></li>
        </ol>
    </div>
</section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
