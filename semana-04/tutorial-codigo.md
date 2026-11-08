# Tutorial Semana 4 · Del diseño al código con HTML, CSS y Bootstrap

**Proyecto Integrado (GPD2201) · Experiencia 2 · Actividad Formativa 3 (AF3): Estilando el sitio del proyecto**

En este tutorial traduces tu diseño de Figma a un sitio en **HTML semántico**, **CSS** y **Bootstrap**: preparas tu computador, armas la estructura de carpetas, construyes las páginas, optimizas las imágenes, revisas la accesibilidad, validas en el **W3C** y publicas en el **hosting de Duoc**.

Los ejemplos usan **Verde Vivo**. Tú construyes **tu proyecto** con tu propia guía de estilos.

---

## Qué vas a aprender

- Preparar VS Code y Live Server.
- Organizar las carpetas de un sitio.
- Escribir HTML semántico que cumpla el estándar W3C.
- Usar Bootstrap por CDN: grilla, navbar, cards y botones.
- Convertir tu guía de estilos en variables CSS.
- Optimizar imágenes y aplicar accesibilidad en el código.
- Validar tu HTML y publicar el sitio.

## Antes de comenzar

- [ ] Tu **diseño de alta** y tu **guía de estilos** de la Semana 3 (con la retroalimentación de la AF2 aplicada).
- [ ] Tu **mapa de navegación**: cada nodo será una página `.html`.
- [ ] Un navegador actualizado (Chrome, Edge o Firefox).
- [ ] Tus datos de acceso al **hosting de Duoc**.
- [ ] El resumen de la clase: [resumen-clase.md](resumen-clase.md).

⏱️ Tiempo estimado: 6 a 8 horas.

---

## Paso 1 · Instalar VS Code y Live Server

**Meta:** tener un editor que muestre los cambios al instante en el navegador.

**Haz esto:**
1. Descarga e instala [Visual Studio Code](https://code.visualstudio.com/).
2. Ábrelo, entra a **Extensiones** (`Cmd + Shift + X` en Mac, `Ctrl + Shift + X` en Windows) e instala **Live Server** (autor: Ritwick Dey).
3. Opcional: instala **Prettier** para ordenar el código automáticamente.

**Comprueba:**
- [ ] Al hacer clic derecho sobre un archivo `.html` aparece **Open with Live Server**.

**Errores frecuentes:**
- Abrir el `.html` con doble clic: funciona, pero no se actualiza solo. Usa siempre Live Server.

---

## Paso 2 · Estructura de carpetas

**Meta:** ordenar el proyecto desde el inicio (en la Semana 6 le agregarás PHP).

**Haz esto:**
1. Crea una carpeta con el nombre de tu proyecto, **sin espacios ni tildes** (por ejemplo `verde-vivo`).
2. Ábrela en VS Code: **Archivo → Abrir carpeta**.
3. Crea esta estructura:

```
mi-proyecto/
├── index.html
├── contacto.html          ← una página por cada nodo del mapa
├── css/
│   └── estilos.css
├── js/
│   └── main.js
└── img/
```

**Comprueba:**
- [ ] Los nombres de archivos y carpetas van en minúsculas, sin espacios, tildes ni ñ.

**Errores frecuentes:**
- `Página Contacto.html`: los espacios y tildes rompen las URL en el servidor. Usa `contacto.html`.

---

## Paso 3 · El HTML base con Bootstrap

**Meta:** tener una plantilla válida que usarás en todas las páginas.

**Haz esto:** en `index.html`, escribe `!` y presiona `Tab` para generar la base. Luego déjala así:

```html
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Verde Vivo · Vivero artesanal en Providencia</title>
  <meta name="description" content="Plantas de interior, suculentas y aromáticas, con consejos de cuidado.">

  <!-- Bootstrap (CSS) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
  <!-- Tus estilos: SIEMPRE después de Bootstrap -->
  <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

  <!-- Aquí va el contenido -->

  <!-- Bootstrap (JS): menú hamburguesa, modales, etc. -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
```

| Línea | Para qué sirve |
|-------|----------------|
| `lang="es"` | Le dice al navegador y al lector de pantalla que el sitio está en español. |
| `viewport` | Sin esta línea el sitio no se adapta al celular. |
| `<title>` | Título **contextual**: distinto en cada página. |
| Orden de los CSS | Tu hoja va después de Bootstrap para poder sobrescribir sus estilos. |

> 💡 En [getbootstrap.com](https://getbootstrap.com/docs/5.3/getting-started/introduction/) puedes copiar estas mismas líneas con el atributo `integrity`, que verifica que el archivo no fue alterado.

**Comprueba:**
- [ ] Abres con Live Server y la consola del navegador (`F12` → **Console**) no muestra errores en rojo.

**Errores frecuentes:**
- Enlazar `estilos.css` **antes** de Bootstrap: tus estilos no se aplican.

---

## Paso 4 · La guía de estilos como variables CSS

**Meta:** que cada color y tamaño de tu guía tenga un nombre en el código.

**Haz esto:**
1. Si usas Google Fonts, copia su `<link>` en el `<head>`, antes de tu `estilos.css`.
2. En `css/estilos.css`, define tus variables con los valores de **tu** guía:

```css
/* ===== Variables: guía de estilos ===== */
:root {
  --color-texto: #1B4332;        /* green/800 */
  --color-primario: #2D6A4F;     /* green/700 */
  --color-accion: #9A6B22;       /* gold/700: fondo del botón principal */
  --color-accion-hover: #7F5819; /* gold/800 */
  --color-fondo: #F8F5F0;        /* neutral/100 */
  --fuente-titulos: 'Playfair Display', Georgia, serif;
  --fuente-texto: 'Lato', Arial, sans-serif;
  --radio: 8px;
}

/* ===== Base ===== */
body {
  font-family: var(--fuente-texto);
  color: var(--color-texto);
  background-color: var(--color-fondo);
}
h1, h2, h3 { font-family: var(--fuente-titulos); }
```

3. Para que los componentes de Bootstrap usen tus colores, crea una clase propia en vez de editar Bootstrap:

```css
.btn-accion {
  background-color: var(--color-accion);
  color: #FFFFFF;
  border-radius: var(--radio);
}
.btn-accion:hover,
.btn-accion:focus-visible {
  background-color: var(--color-accion-hover);
  color: #FFFFFF;
}
```

**Comprueba:**
- [ ] En el resto de tu CSS no hay códigos hexadecimales sueltos: todo usa `var(--…)`.
- [ ] Mediste el contraste real de cada par texto/fondo. Ejemplo de Verde Vivo: blanco sobre `#9A6B22` da **4,67:1** (cumple AA); blanco sobre el dorado claro `#C8963E` da solo **2,66:1** (no cumple).

**Errores frecuentes:**
- Usar `!important` para «ganarle» a Bootstrap. Usa una clase propia y el orden correcto de los CSS.

---

## Paso 5 · Encabezado y navegación

**Meta:** un menú semántico, accesible y que se convierta en hamburguesa en el celular.

**Haz esto:**

```html
<header>
  <nav class="navbar navbar-expand-lg bg-white" aria-label="Navegación principal">
    <div class="container">
      <a class="navbar-brand" href="index.html">
        <img src="img/logo.svg" alt="Verde Vivo, inicio" width="140" height="40">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
              data-bs-target="#menu" aria-controls="menu" aria-expanded="false"
              aria-label="Abrir menú">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.html">Inicio</a></li>
          <li class="nav-item"><a class="nav-link" href="plantas.html">Plantas</a></li>
          <li class="nav-item"><a class="nav-link" href="contacto.html">Contacto</a></li>
        </ul>
      </div>
    </div>
  </nav>
</header>
```

- `aria-label` en el `<nav>` y en el botón le dice al lector de pantalla qué son.
- `aria-current="page"` marca la página en la que estás.
- Los rótulos del menú son **los mismos de tu mapa de navegación**.

**Comprueba:**
- [ ] Al achicar la ventana aparece la hamburguesa y el menú se abre.

**Errores frecuentes:**
- El menú no se abre: falta el `bootstrap.bundle.min.js` al final del `<body>`, o el `data-bs-target` no coincide con el `id`.

---

## Paso 6 · Contenido principal con la grilla

**Meta:** construir las secciones de tu diseño con `container`, `row` y `col`.

**Haz esto:**

```html
<main>
  <section class="hero py-5">
    <div class="container">
      <h1>Plantas que llenan de vida tu casa</h1>
      <p class="lead">Elige tu planta y aprende a cuidarla.</p>
      <a href="plantas.html" class="btn btn-accion btn-lg">Ver plantas</a>
    </div>
  </section>

  <section class="py-5" aria-labelledby="titulo-destacadas">
    <div class="container">
      <h2 id="titulo-destacadas">Plantas destacadas</h2>
      <div class="row g-4">
        <div class="col-12 col-md-4">
          <article class="card h-100">
            <img src="img/monstera.webp" class="card-img-top"
                 alt="Monstera deliciosa en maceta de greda" width="600" height="450">
            <div class="card-body">
              <h3 class="h5 card-title">Monstera deliciosa</h3>
              <p class="card-text">Desde $14.990</p>
              <a href="planta-detalle.html" class="btn btn-outline-success">Ver detalle</a>
            </div>
          </article>
        </div>
        <!-- repite la columna para cada tarjeta -->
      </div>
    </div>
  </section>
</main>
```

- Un solo `<h1>` por página; luego `<h2>`, y dentro de cada tarjeta `<h3>` (con la clase `h5` si lo quieres más chico visualmente).
- Cada tarjeta es un `<article>` porque tiene sentido por sí sola.
- `col-12 col-md-4`: una columna en el celular y tres desde tablet. (En la Semana 5 profundizas esto.)

**Comprueba:**
- [ ] La página se parece a tu diseño de Figma en Desktop.
- [ ] Los encabezados siguen el orden h1 → h2 → h3, sin saltos.

**Errores frecuentes:**
- Usar `<div>` para todo. Usa `header`, `nav`, `main`, `section`, `article` y `footer`.
- Poner columnas directamente dentro del `container`, sin `row`.

---

## Paso 7 · Pie de página y el resto de las páginas

**Meta:** completar todas las páginas del mapa.

**Haz esto:**
1. Agrega el `<footer>` con datos de contacto, redes y enlaces.
2. Cuando `index.html` esté listo, duplícalo para cada página del mapa (`plantas.html`, `contacto.html`…) y cambia el `<title>`, el `<h1>`, el contenido y el `aria-current` del menú.
3. En el formulario de contacto, cada campo lleva su `<label>`:

```html
<label for="correo" class="form-label">Correo electrónico</label>
<input type="email" id="correo" name="correo" class="form-control" required>
```

**Comprueba:**
- [ ] Todos los enlaces del menú llevan a una página que existe.
- [ ] Cada página tiene su propio `<title>`.

---

## Paso 8 · Optimizar las imágenes

**Meta:** que el sitio cargue rápido.

**Haz esto:**
1. Elige el formato: **JPG o WebP** para fotos, **SVG** para logos e íconos, **PNG** si necesitas transparencia.
2. Ajusta el tamaño: una foto de tarjeta no necesita más de 800 px de ancho.
3. Comprímela con [TinyPNG](https://tinypng.com/) o conviértela a WebP con [Squoosh](https://squoosh.app/).
4. Escribe `width` y `height` en cada `<img>` para que la página no «salte» al cargar.
5. Las imágenes que están más abajo pueden llevar `loading="lazy"`.

**Comprueba:**
- [ ] Ninguna imagen pesa más de 300 KB (idealmente menos de 150 KB).
- [ ] Las imágenes tienen licencia de uso y está registrada en tu brief.

**Errores frecuentes:**
- Subir fotos de 4 MB directo de la cámara o del banco de imágenes.

---

## Paso 9 · Revisar la accesibilidad

**Meta:** que cualquier persona pueda usar tu sitio.

**Haz esto:**
1. Recorre la página solo con el teclado (`Tab` y `Shift + Tab`): todo enlace y botón debe recibir foco **visible**.
2. Revisa que cada imagen de contenido tenga `alt` descriptivo, y que las decorativas tengan `alt=""`.
3. Agranda el texto con `Cmd/Ctrl` y `+` hasta 200 %: nada debe cortarse.
4. Mide el contraste de tus pares de colores en el [WebAIM Contrast Checker](https://webaim.org/resources/contrastchecker/): **4,5:1** como mínimo para texto normal (WCAG AA).

**Comprueba:**
- [ ] Puedes usar todo el sitio sin mouse.

---

## Paso 10 · Probar en el navegador

**Meta:** ver cómo se comporta en distintos dispositivos y navegadores.

**Haz esto:**
1. Abre las herramientas de desarrollo (`F12`) y activa la **barra de dispositivos** (`Cmd + Shift + M` / `Ctrl + Shift + M`).
2. Prueba un celular, una tablet y escritorio.
3. Abre el sitio en un segundo navegador.

**Comprueba:**
- [ ] No hay scroll horizontal en el celular.
- [ ] La consola no muestra errores (por ejemplo, imágenes no encontradas: 404).

---

## Paso 11 · Validar en el W3C

**Meta:** cumplir el estándar W3C (lo revisa la pauta).

**Haz esto:**
1. Entra a [validator.w3.org](https://validator.w3.org/#validate_by_input), pestaña **Validate by Direct Input**.
2. Pega el código completo de una página y presiona **Check**.
3. Corrige los **Errors** de arriba hacia abajo y vuelve a validar. Revisa también los **Warnings**.
4. Repite con cada página.

**Comprueba:**
- [ ] Todas tus páginas dicen **«Document checking completed. No errors or warnings to show.»** o, como mínimo, cero errores.

**Errores frecuentes:**
- Etiquetas sin cerrar, `id` repetidos, `<img>` sin `alt`, o un `<a>` con un `<div>` mal anidado.

---

## Paso 12 · Publicar en el hosting de Duoc

**Meta:** tener la URL para la entrega.

**Haz esto:**
1. Entra al hosting de Duoc con el método que ya usaste (administrador de archivos o cliente FTP).
2. Sube el **contenido** de tu carpeta (`index.html`, `css/`, `js/`, `img/` y las demás páginas), respetando la estructura.
3. Abre la URL en el computador **y** en tu celular.

**Comprueba:**
- [ ] La portada abre al escribir la URL, sin agregar `/index.html`.
- [ ] Las imágenes y los estilos cargan (si no, revisa mayúsculas y minúsculas: el servidor las distingue).

**Errores frecuentes:**
- `Img/Logo.SVG` en tu computador funciona, pero en el servidor no: los nombres deben coincidir exactamente.

---

## 📎 Ejemplo de la clase

Así quedó **Verde Vivo — Vivero Artesanal** después de esta semana:

👉 **[Carpeta `ejemplo-codigo/`](ejemplo-codigo/)** · instrucciones para abrirlo en **[ejemplo-codigo/LEEME.md](ejemplo-codigo/LEEME.md)**

Son las 7 páginas en HTML con Bootstrap 5.3.8: inicio, catálogo de plantas, detalle de una planta, cuidados, artículo, nosotros y contacto. Revisa sobre todo `css/estilos.css`, donde los colores de la guía de estilos quedaron como variables de CSS.

> ⚠️ El ejemplo es para **comparar**, no para copiar. Tu entrega tiene que ser sobre **tu** proyecto (el caso del señor Graham), con tus propios textos, colores e imágenes.

---

## ✅ Checklist final

- [ ] Estructura de carpetas ordenada, nombres sin espacios ni tildes.
- [ ] Todas las páginas del mapa, con `lang="es"`, `viewport` y `<title>` contextual.
- [ ] HTML semántico, un solo `<h1>` por página y encabezados en orden.
- [ ] Bootstrap por CDN: grilla, navbar y componentes.
- [ ] Guía de estilos convertida en variables CSS.
- [ ] Imágenes optimizadas, con `alt`, `width` y `height`.
- [ ] Navegación con teclado, foco visible y contraste AA.
- [ ] Probado en dispositivos y en dos navegadores.
- [ ] Cero errores en el W3C Validator.
- [ ] Sitio publicado en el hosting de Duoc.

---

## ❓ Preguntas de repaso

<details>
<summary>1. ¿Por qué tu hoja de estilos va después de la de Bootstrap?</summary>

Porque, ante dos reglas con la misma especificidad, el navegador aplica la última. Así tus estilos sobrescriben los de Bootstrap sin usar `!important`.
</details>

<details>
<summary>2. ¿Cuándo uso <code>&lt;article&gt;</code> y cuándo <code>&lt;section&gt;</code>?</summary>

`section` agrupa una parte temática de la página (por ejemplo, «Plantas destacadas»). `article` es un contenido que tiene sentido por sí solo (cada tarjeta de planta o cada artículo del blog).
</details>

<details>
<summary>3. ¿Qué ventaja tienen las variables CSS?</summary>

Si cambia un color o un tamaño de la guía de estilos, lo cambias en un solo lugar y se actualiza en todo el sitio.
</details>

<details>
<summary>4. ¿Qué formato de imagen conviene para una foto y cuál para un logo?</summary>

Para una foto, JPG o WebP. Para un logo, SVG, porque es vectorial, liviano y escala sin perder calidad.
</details>

<details>
<summary>5. ¿Para qué sirve <code>aria-current="page"</code>?</summary>

Indica a los lectores de pantalla cuál es la página actual dentro del menú.
</details>

---

## 📤 Entrega

- **Actividad:** Formativa 3 (AF3) — Estilando el sitio del proyecto.
- **Formato:** sube tu sitio al **hosting de Duoc**, copia la **URL** y pégala en el documento de la actividad.
- **Fecha límite:** **lunes 16 de noviembre de 2026 a las 23:59 hrs**, por el AVA.
- **Se evalúa (pauta):** brief, problemas y necesidades, mapa de navegación, wireframes, diseño de interfaz, HTML según W3C, frameworks/variables CSS/preprocesadores y sitio responsivo.

> Este tutorial complementa la guía de aprendizaje y la clase sincrónica. Tu entrega debe ser trabajo propio.
