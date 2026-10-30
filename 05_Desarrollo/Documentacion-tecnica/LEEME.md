# k-morebi · sitio local de presentación

Entrega del 29 de octubre de 2026. Seis páginas PHP, sin compilación de frontend y sin publicación. Los originales de contenido, identidad, maquetas y fotografías permanecen en sus carpetas originales.

## Ejecutar

Requiere PHP 8.1 o posterior. Desde la raíz `C:/Users/user/Documents/ChatGPT/K-morebi/`:

```powershell
php -S 127.0.0.1:8088 -t 05_Desarrollo/web
```

Abrir [Inicio local](http://127.0.0.1:8088/index.php). Mantener abierta la terminal; `Ctrl+C` detiene el servidor. También puede servirse la carpeta `05_Desarrollo/web/` mediante Apache/WAMP con PHP. No abrir los archivos PHP directamente como archivos del navegador.

## Estructura y edición

- `web/index.php` y `web/primera-sesion.php`: composición y textos de las dos páginas aprobadas, conservados desde la maqueta editable.
- `web/nuestro-enfoque.php`, `web/servicios.php`, `web/contacto.php` y `web/aviso-de-privacidad.php`: páginas interiores.
- `web/includes/header.php` y `footer.php`: cabecera, navegación, metadatos, scripts y pie compartidos. La página actual se marca con `aria-current="page"`.
- `web/includes/config.php`: datos de atención confirmados, mapa de páginas y funciones compartidas. Edades: 6 a 65 años; sesión: 120 minutos; honorarios: $1,500 MXN; trayectoria: desde 1990. Los datos pendientes están identificados como `null` y no se muestran como información ficticia.
- `web/includes/content.json`: textos de Nuestro enfoque y Servicios tomados del documento de contenidos. Las notas editoriales y los campos pendientes no se incluyen en el texto público. Los textos de Contacto se editan en `contacto.php`.
- `web/assets/css/site.css`: variables `:root`, composición y adaptación de la propuesta, extensiones de páginas interiores y movimiento. Los colores secundarios también tienen variables. La familia se define en `--font-ui`; las variables `--bs-*` enlazan con Bootstrap. El `@font-face` usa el Google Sans original.
- `web/assets/js/site.js`: menú accesible, cierre con Escape y cambios de ancho, protección contra envío implícito del formulario y revelados mediante IntersectionObserver. Las FAQ usan `details/summary` nativos y funcionan sin JavaScript.

La rejilla de Bootstrap se utiliza especialmente en las páginas nuevas y el formulario; las rejillas editoriales específicas de Inicio y Primera sesión conservan las proporciones aprobadas. El sitio limita la anchura máxima a 1600 px como la maqueta.

## Dependencias y licencias

| Recurso | Versión/origen | Licencia/archivo |
| --- | --- | --- |
| Bootstrap CSS y JavaScript sin Popper | 5.3.8, [distribución oficial](https://getbootstrap.com/docs/5.3/getting-started/download/), descargada mediante el CDN recomendado por Bootstrap | MIT, `web/assets/vendor/bootstrap/LICENSE` |
| Google Sans variable | Archivo de la maqueta Propuesta 02; metadatos originales conservados | SIL OFL 1.1, `web/assets/fonts/OFL.txt`; `METADATA.pb` |
| Animaciones y menú | CSS/JavaScript propios | Sin dependencia de animación adicional |
| Fotografías y logotipos | Recursos existentes del proyecto | Conservar las autorizaciones y procedencia del proyecto original |

Los recursos del sitio se sirven localmente. No se hacen peticiones a Google Fonts, CDNs, analítica ni servicios de contacto. El TTF original se conserva para evitar alterar su identidad tipográfica; pesa aproximadamente 5 MB. Una futura conversión a WOFF2 debe comprobar fidelidad y conservar la licencia.

## Imágenes y dirección visual

Se reutilizan arquitectura-komorebi, luz-entre-hojas y pasaje-de-luz. No se generaron imágenes nuevas. Se exportaron derivados WebP en tres variantes nominales (640, 1280 y 1920), limitadas a la resolución original; el `srcset` declara sus anchos reales. Las fuentes originales de alta resolución siguen en la carpeta de la maqueta. Las imágenes no se identifican como fotografías del consultorio real.

Las imágenes principales tienen prioridad alta; las restantes se cargan de forma diferida. Se declaran dimensiones y se conservan los recortes mediante `object-fit` y los estilos de la maqueta. Los SVG suministrados se usan sin reconstrucción ni recorte de sus trazados, conservando el margen del archivo original.

La referencia de movimiento [Hoboken Yogi](https://hobokenyogi.com/) se inspeccionó al cargar, desplazarse e interactuar. Se adaptaron entradas coordinadas, revelado leve y microinteracciones a la composición de k-morebi. No hay scroll forzado, cursor sustituido ni animación letra por letra. Con movimiento reducido se desactivan animaciones, transiciones y desplazamiento suave. El contenido sigue disponible sin JavaScript y el menú móvil muestra sus enlaces en ese caso.

## Alcance de presentación y pendientes

Las acciones de cita, consulta, disponibilidad, WhatsApp y correo usan `href="#null"`. Los enlaces de navegación a Contacto sí llevan a su página, igual que el resto del menú. No existen destinos reales ni integraciones externas.

El formulario es solo visual: `novalidate`, botón `type="button"`, sin endpoint, validación programada, almacenamiento ni correo. No muestra confirmaciones de envío. Los asteriscos reproducen las etiquetas previstas para la futura integración; no hay restricciones `required`. JavaScript evita el envío implícito con Enter; también se comprueba que no se envíe con JavaScript desactivado.

Pendiente para una etapa posterior:

- Confirmar nombre, biografía, formación y cédula profesional antes de incorporarlos.
- Confirmar modalidad, ubicación, accesibilidad, canales, horarios y plazos de respuesta.
- Definir destinos de contacto y condiciones de cambios/cancelaciones.
- Implementar validación, consentimiento que corresponda, envío seguro, protección antispam, correo y política de almacenamiento.
- Sustituir el aviso pendiente por el texto legal aprobado; no se inventaron cláusulas.
- Resolver publicación y dominio. Los metadatos `noindex, nofollow` son intencionales durante la presentación local.

## Verificación

El inventario está en `qa/inventario.md`, el informe detallado en `qa/resultados.json` y las capturas en `qa/`. El script `qa/verificar.cjs` utiliza la instalación local de Playwright y Chrome; no es una dependencia del sitio. Su ruta de dependencia es específica de este equipo y debe adaptarse si se ejecuta en otro.

La sintaxis se verifica con `php -l` sobre todos los archivos PHP. Las pruebas de navegador cubren las seis páginas a 360, 390, 430, 768, 1024 y 1440 px CSS, interacciones por teclado, formulario inerte, movimiento reducido y uso sin JavaScript. Las capturas se comparan visualmente con las referencias de Inicio y Primera sesión.

Las limitaciones y los resultados finales se detallan en `qa/REVISION.md`. Esta revisión de escritorio no sustituye ensayos posteriores en dispositivos físicos, Safari/iOS y tecnologías de asistencia reales.
