# Verde Vivo · Ejemplo Semana 4 — HTML, CSS y Bootstrap

Versión del sitio de Verde Vivo **al terminar la clase de la Semana 4**: el diseño de Figma traducido a HTML semántico, CSS con variables y Bootstrap 5.3.8.

> Verde Vivo es un proyecto **ficticio** que usamos en clase. Úsalo para comparar, no para copiar: tu entrega es tu propio proyecto.

## Cómo verlo

1. Descarga o clona el repositorio y abre esta carpeta (`ejemplo-codigo`) en VS Code.
2. Clic derecho sobre `index.html` → **Open with Live Server**.

Necesitas conexión a internet: Bootstrap y las tipografías se cargan por CDN.

## Qué contiene

```
ejemplo-codigo/
├── index.html        ← portada: hero, categorías, destacadas, cuidados, nosotros
├── plantas.html      ← catálogo (8 plantas)
├── planta.html       ← detalle de una planta (Monstera)
├── cuidados.html     ← listado de artículos
├── articulo.html     ← un artículo
├── nosotros.html
├── contacto.html     ← formulario (aún no envía: se programa en la Semana 6)
├── css/estilos.css   ← guía de estilos como variables CSS + componentes
├── js/main.js        ← vacío por ahora (Semana 8)
└── img/              ← ilustraciones SVG originales (marcadores de posición)
```

## Qué mirar

| Tema del tutorial | Dónde verlo |
|-------------------|-------------|
| HTML base, `lang`, `viewport`, `<title>` contextual | Cabecera de cada `.html` |
| Etiquetas semánticas y un solo `<h1>` | `index.html`: `header`, `nav`, `main`, `section`, `article`, `footer` |
| Navbar accesible (`aria-label`, `aria-current`) | Encabezado de cualquier página |
| Guía de estilos como variables CSS | `css/estilos.css`, sección 1 |
| Botón con contraste AA (blanco sobre `#9A6B22` = 4,67:1) | `.btn-accion` en `css/estilos.css` |
| Grilla `container` → `row` → `col` | Plantas destacadas y catálogo |
| Imágenes con `alt`, `width`, `height` y `loading="lazy"` | Tarjetas de plantas |
| Formulario con `label` en cada campo | `contacto.html` |
| Enlace «Saltar al contenido» y foco visible | Presiona `Tab` al cargar cualquier página |

## Validación

- Las 7 páginas pasan el [W3C Validator](https://validator.w3.org/) **sin errores ni advertencias**.
- Las imágenes son ilustraciones propias en SVG: no hay fotos ni marcas reales.

## En la próxima semana

En la Semana 5 este mismo sitio se revisa en el celular y se vuelve **Mobile First**, con Sass y media queries.
