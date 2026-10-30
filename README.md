# k-morebi
K-morebi | Proyecto de diseño de marca y página web para clínica de psicoterapia integral.

## Sitio web

La versión más reciente está en [`05_Desarrollo/web`](05_Desarrollo/web/): seis páginas PHP adaptadas a escritorio y móvil, con estilos, JavaScript, imágenes, logotipos y fuentes locales.

Requiere PHP 8.1 o posterior. Desde la raíz del repositorio:

```sh
php -S 127.0.0.1:8088 -t 05_Desarrollo/web
```

Abrir http://127.0.0.1:8088/index.php.

Consulta las instrucciones y pendientes en [`LEEME`](05_Desarrollo/Documentacion-tecnica/LEEME.md). Es una versión de presentación: el formulario y los canales de contacto aún no están conectados. Para publicarla se necesita alojamiento compatible con PHP; GitHub Pages no ejecuta PHP.

## Vista pública en GitHub Pages

La copia HTML de presentación se publica desde `docs/`: https://eric-dzyan.github.io/k-morebi/

Para regenerarla después de editar el sitio PHP, ejecutar `php -n 05_Desarrollo/export-static.php` y subir los cambios de `docs/`. El exportador convierte los enlaces internos a HTML y copia los recursos locales. El formulario conserva su comportamiento de presentación, sin envío.
