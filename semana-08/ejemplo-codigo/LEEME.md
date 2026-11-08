# Verde Vivo · Ejemplo Semana 8 — Interacciones con JavaScript, DOM y jQuery

Versión **final** del sitio de Verde Vivo, **al terminar la clase de la Semana 8**: al sitio y al panel de la Semana 7 se les agregan interacciones con JavaScript que mejoran la experiencia y la accesibilidad.

> Verde Vivo es un proyecto **ficticio** que usamos en clase. Úsalo para comparar, no para copiar: tu entrega es tu propio proyecto.

## Cómo correrlo en tu computador

Igual que la Semana 7: XAMPP o MAMP, carpeta en `htdocs/verde-vivo`, base `verde_vivo` importada desde `sql/verde_vivo.sql` y `class/config.php` copiado desde `config.example.php`.

- Sitio: `http://localhost/verde-vivo/`
- Panel: `http://localhost/verde-vivo/admin/` · usuario de prueba **`camila`**, contraseña de prueba **`VerdeVivo-2026`** (solo para el ejemplo local).

## Interacciones agregadas

| Interacción | Qué hace | Archivo |
|-------------|----------|---------|
| **Validación en tiempo real** | Marca cada campo al salir de él, detiene el envío si hay errores y lleva el foco al primero. PHP vuelve a validar en el servidor. | `js/main.js` (formularios con `class="js-validar"`) |
| **Contador de caracteres** | Muestra cuántos caracteres lleva el mensaje (máximo 500). | `js/main.js` · `contacto.php` |
| **Filtro sin recargar** | Muestra u oculta tarjetas por categoría y actualiza la URL con `history.replaceState` (BOM). Sin JavaScript, el filtro sigue funcionando con PHP. | `js/main.js` · `plantas.php` |
| **Buscador con `fetch`** | Consulta `api/buscar.php`, que responde JSON, y muestra los resultados sin recargar la página. | `js/main.js` · `api/buscar.php` |
| **Modo oscuro** | Cambia las variables CSS y `data-bs-theme` de Bootstrap; la preferencia queda en `localStorage`. | `js/main.js` · `scss/_base.scss` |
| **Tamaño del texto** | Botones A+ y A− entre 14 y 22 px; también se recuerda. | `js/main.js` · `header.php` |
| **Volver arriba (jQuery)** | El botón aparece al desplazarse más de 600 px; respeta «reducir movimiento». | `js/main.js` (sección 5) · `footer.php` |
| **Confirmar antes de eliminar** | Modal de Bootstrap; «Cancelar» no borra nada. | `js/admin.js` · `admin/partes/admin-footer.php` |
| **Aviso con toast** | El mensaje de éxito aparece como toast y se quita `?info=` de la URL. Sin JavaScript se ve como alerta. | `js/admin.js` · `admin/partes/admin-header.php` |
| **Vista previa de imagen** | Muestra la imagen elegida antes de subirla. | `js/admin.js` · `admin/partes/form-planta.php` |

## Detalles que vale la pena mirar

- **`textContent` y no `innerHTML`** al mostrar los resultados del buscador: los datos de la base nunca se interpretan como HTML.
- **Mejora progresiva:** el filtro, los avisos y la eliminación funcionan también sin JavaScript; JavaScript solo los hace más rápidos y claros.
- **Un clic que no se pierde:** si estás en un campo con error y presionas «Enviar», la validación al salir del campo se omite para que el mensaje de error no mueva el botón; el envío valida todo.
- **Contraste en modo oscuro:** texto `#F8F5F0` sobre `#1C1C1F` = 15,6:1 y enlaces `#95D5B2` sobre `#1C1C1F` = 10,1:1 (cumplen AA y AAA).

## Validación

Probado en Chromium con PHP 8 y MariaDB, en escritorio (1280 px) y celular (390 px):

- Filtro, buscador, modo oscuro (se mantiene al cambiar de página), tamaño de texto, volver arriba, validación y contador funcionan.
- En el panel: vista previa, validación, toast, modal (cancelar y confirmar) funcionan.
- La consola no muestra errores de JavaScript.
- El HTML de 14 páginas (públicas y del panel) pasa el W3C Validator sin errores ni advertencias.

## Siguiente paso

En la Semana 9 se documenta todo el proceso en el informe y el video de la EFT. Mira `semana-09/ejemplo-eft.md`.
