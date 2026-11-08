# Verde Vivo · Ejemplo Semana 5 — Mobile First, Bootstrap responsivo y Sass

Versión del sitio de Verde Vivo **al terminar la clase de la Semana 5**: el sitio de la Semana 4 revisado en el celular y reescrito con enfoque **Mobile First**, clases responsivas de Bootstrap, **Sass** en parciales y media queries `min-width`.

> Verde Vivo es un proyecto **ficticio** que usamos en clase. Úsalo para comparar, no para copiar: tu entrega es tu propio proyecto.

## Cómo verlo

1. Abre esta carpeta en VS Code y abre `index.html` con **Live Server**.
2. Presiona `F12` → barra de dispositivos y prueba 375 px, 768 px y 1280 px.

## Cómo compilar el Sass

- **Con la extensión Live Sass Compiler:** ya está configurada en `.vscode/settings.json`. Haz clic en **Watch Sass** (barra inferior de VS Code): cada vez que guardes un `.scss` se actualiza `css/estilos.css`.
- **Con terminal:** `npm install -g sass` y luego `sass --watch scss/estilos.scss css/estilos.css`.

El HTML enlaza **`css/estilos.css`** (el compilado). Al hosting se sube el CSS compilado; la carpeta `scss/` no es necesaria en el servidor.

## Qué cambió respecto de la Semana 4

| Cambio | Dónde |
|--------|-------|
| Estilos divididos en parciales Sass | `scss/_variables.scss`, `_base`, `_header`, `_botones`, `_secciones`, `_componentes`, `_pie` |
| Variables de Sass + variables nativas de CSS | `_variables.scss` y `:root` en `_base.scss` |
| Mixin `desde()` para media queries Mobile First | `_variables.scss` |
| Tamaños del hero: 2,25 rem en celular → 2,75 en tablet → 3,5 en escritorio | `_secciones.scss` |
| Espaciado de secciones menor en el celular | `.seccion` en `_secciones.scss` |
| Áreas táctiles de 44 px en botones y menú | `_botones.scss` y `_header.scss` |
| Catálogo: 1 columna → 2 desde 576 px → 4 desde 992 px | `col-12 col-sm-6 col-lg-3` en `plantas.html` |
| **Order:** en el celular la foto va primero; en escritorio, el texto a la izquierda | `order-lg-1` / `order-lg-2` en `planta.html` |
| **Nesting:** fila con Luz y Riego dentro de la columna | `planta.html` |
| **Offset:** columna de lectura centrada | `col-lg-8 offset-lg-2` en `articulo.html` |
| Hero centrado en el celular, a la izquierda en escritorio | `text-center text-lg-start` en `index.html` |
| Botón del formulario a lo ancho en el celular | `d-grid d-sm-block` en `contacto.html` |

## Validación

- Las 7 páginas pasan el W3C Validator **sin errores ni advertencias**.
- El CSS compilado tiene solo media queries `min-width` (Mobile First).
- Sin scroll horizontal en 375 px.

## En la próxima semana

En la Semana 6 las páginas pasan a `.php` y el catálogo sale de una base de datos MySQL.
