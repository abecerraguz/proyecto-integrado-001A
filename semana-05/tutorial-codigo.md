# Tutorial Semana 5 · Sitio responsivo con Mobile First, Bootstrap y Sass

**Proyecto Integrado (GPD2201) · Experiencia 2 · Actividad Sumativa 2 (AS2): Aplicando el diseño responsivo al proyecto**

En este tutorial adaptas el sitio de la Semana 4 para que funcione bien en **celular, tablet y escritorio**: revisas qué falla en pantallas chicas, aplicas las clases responsivas de **Bootstrap**, ordenas tus estilos con **Sass** y escribes tus propias **media queries** con enfoque **Mobile First**.

Los ejemplos usan **Verde Vivo**. Tú trabajas sobre **tu sitio**.

---

## Qué vas a aprender

- Diagnosticar un sitio en vista móvil.
- Usar los breakpoints y las clases responsivas de Bootstrap.
- Aplicar nesting, offset y order.
- Hacer responsivas las imágenes y los videos.
- Instalar Sass y organizar tus estilos en parciales.
- Escribir media queries Mobile First con `min-width`.

## Antes de comenzar

- [ ] Tu sitio de la Semana 4 funcionando, con la retroalimentación de la AF3 aplicada.
- [ ] Tus diseños de Figma en **Mobile** y **Tablet** (Semana 3).
- [ ] VS Code con Live Server (tutorial de la Semana 4).
- [ ] El resumen de la clase: [resumen-clase.md](resumen-clase.md).

⏱️ Tiempo estimado: 6 a 8 horas.

> ⚠️ Esta actividad es **sumativa**. La rúbrica revisa 8 criterios: brief, problemas y necesidades, mapa, wireframes, diseño de interfaz, HTML W3C, frameworks/variables CSS/preprocesadores y **sitio responsivo**. Que tu brief, mapa y wireframes sigan coherentes con el sitio.

---

## Paso 1 · Diagnosticar en el celular

**Meta:** saber exactamente qué hay que arreglar.

**Haz esto:**
1. Abre tu sitio con Live Server, presiona `F12` y activa la barra de dispositivos (`Cmd + Shift + M` / `Ctrl + Shift + M`).
2. Elige un celular de 375 px de ancho y recorre cada página.
3. Anota los problemas en una tabla:

| Página | Elemento | Problema en el celular | Cómo debería verse (según Figma Mobile) |
|--------|----------|------------------------|------------------------------------------|
| Inicio | Tarjetas de plantas | 3 columnas muy angostas | 1 columna, ancho completo |
| Inicio | Título del hero | Se corta | Más pequeño, en 2 líneas |

**Comprueba:**
- [ ] Revisaste todas las páginas y tienes al menos 5 problemas anotados.

**Errores frecuentes:**
- Revisar solo la portada. Las páginas de detalle y de contacto también se evalúan.

---

## Paso 2 · Pensar en Mobile First

**Meta:** entender el orden de trabajo.

En Mobile First, **lo que escribes sin condiciones es para el celular**, y luego agregas cambios para pantallas más grandes:

| Breakpoint | Prefijo | Desde |
|------------|---------|-------|
| Extra small | *(sin prefijo)* | 0 px |
| Small | `sm` | 576 px |
| Medium | `md` | 768 px |
| Large | `lg` | 992 px |
| Extra large | `xl` | 1200 px |
| Extra extra large | `xxl` | 1400 px |

Una clase con prefijo se aplica **desde ese ancho hacia arriba**: `col-md-6` significa «media fila desde 768 px».

**Comprueba:**
- [ ] Puedes explicar con tus palabras qué hace `col-12 col-md-6 col-lg-4`.

---

## Paso 3 · Grilla y utilidades responsivas

**Meta:** que las columnas y espacios cambien según la pantalla.

**Haz esto:**

```html
<div class="row g-3 g-lg-4">
  <!-- 1 columna en celular, 2 en tablet, 3 en escritorio -->
  <div class="col-12 col-sm-6 col-lg-4"> … tarjeta … </div>
</div>
```

Otras clases útiles:

| Clase | Qué hace |
|-------|----------|
| `py-4 py-lg-5` | Menos espacio vertical en el celular, más en escritorio |
| `text-center text-md-start` | Centrado en celular, alineado a la izquierda desde tablet |
| `d-none d-md-block` | Oculto en celular, visible desde tablet |
| `d-grid d-md-inline-block` | Botón a lo ancho en celular, normal desde tablet |

> 💡 Las clases de tamaño de fuente de Bootstrap (`fs-1` a `fs-6`) no tienen versión por breakpoint. Para que un título cambie de tamaño según la pantalla, usa tus media queries (paso 8).

**Comprueba:**
- [ ] Al cambiar el ancho en las herramientas de desarrollo, las columnas se reacomodan sin scroll horizontal.

**Errores frecuentes:**
- Usar `col-4` sin prefijo: queda en 3 columnas **también** en el celular.
- Ocultar contenido importante con `d-none` en el celular: el usuario móvil también lo necesita.

---

## Paso 4 · Nesting, offset y order

**Meta:** resolver diseños más complejos sin columnas vacías.

**Haz esto:**

```html
<!-- ORDER: en el celular, primero la foto; en escritorio, el texto a la izquierda -->
<div class="row">
  <div class="col-12 col-lg-6 order-lg-2">
    <img src="img/monstera.webp" class="img-fluid" alt="Monstera en maceta de greda" width="800" height="600">
  </div>
  <div class="col-12 col-lg-6 order-lg-1">
    <h1>Monstera deliciosa</h1>
  </div>
</div>

<!-- OFFSET: formulario centrado sin columnas vacías -->
<div class="row">
  <div class="col-12 col-md-8 offset-md-2"> … formulario … </div>
</div>

<!-- NESTING: una fila dentro de una columna -->
<div class="col-lg-6">
  <div class="row">
    <div class="col-6">Luz: indirecta</div>
    <div class="col-6">Riego: semanal</div>
  </div>
</div>
```

**Comprueba:**
- [ ] Usaste al menos una de estas técnicas donde tu diseño lo pedía.

**Errores frecuentes:**
- Cambiar el orden del HTML para que «se vea bien» en escritorio: el lector de pantalla lee el HTML, no lo visual. Usa `order`.

---

## Paso 5 · Imágenes y videos responsivos

**Meta:** que los medios se adapten y carguen rápido.

**Haz esto:**
1. Agrega `img-fluid` a las imágenes de contenido: nunca serán más anchas que su contenedor.
2. Para un video de YouTube, usa el helper `ratio`:

```html
<div class="ratio ratio-16x9">
  <iframe src="https://www.youtube.com/embed/ID_DEL_VIDEO"
          title="Cómo trasplantar una suculenta" allowfullscreen></iframe>
</div>
```

3. Si una foto es grande, prepara dos tamaños y deja que el navegador elija:

```html
<img src="img/hero-800.webp"
     srcset="img/hero-800.webp 800w, img/hero-1600.webp 1600w"
     sizes="100vw" alt="Mesón del vivero con plantas" width="1600" height="900" class="img-fluid">
```

**Comprueba:**
- [ ] Ninguna imagen ni video se sale de la pantalla en 375 px.
- [ ] Cada `<iframe>` tiene `title`.

---

## Paso 6 · Instalar Sass

**Meta:** escribir estilos en `.scss` y compilarlos a `.css`.

**Haz esto (opción recomendada, sin terminal):**
1. En VS Code, instala la extensión **Live Sass Compiler** (autor: Glenn Marks).
2. Crea la carpeta `.vscode/` en tu proyecto y dentro el archivo `settings.json`:

```json
{
  "liveSassCompile.settings.formats": [
    { "format": "expanded", "extensionName": ".css", "savePath": "/css" }
  ]
}
```

3. Organiza tus estilos así:

```
scss/
├── _variables.scss
├── _base.scss
├── _header.scss
├── _componentes.scss
└── estilos.scss        ← importa los parciales
```

4. En `estilos.scss`:

```scss
@use 'variables';
@use 'base';
@use 'header';
@use 'componentes';
```

5. Haz clic en **Watch Sass** en la barra inferior de VS Code. Se genera `css/estilos.css`, que es el que enlaza tu HTML.

**Opción con terminal:** si tienes Node.js, ejecuta `npm install -g sass` y luego `sass --watch scss/estilos.scss css/estilos.css`.

**Comprueba:**
- [ ] Al guardar un `.scss`, el archivo `css/estilos.css` se actualiza solo.

**Errores frecuentes:**
- Enlazar el `.scss` en el HTML. El navegador solo entiende **CSS**: enlaza `css/estilos.css`.
- Los parciales empiezan con guion bajo (`_base.scss`) y no se compilan solos: los importa `estilos.scss`.

---

## Paso 7 · Variables, anidamiento y mixins

**Meta:** aprovechar lo que Sass agrega al CSS.

**Haz esto:**

```scss
// _variables.scss
$color-texto: #1B4332;
$color-accion: #9A6B22;
$radio: 8px;
$bp-md: 768px;   // mismos breakpoints de Bootstrap
$bp-lg: 992px;

@mixin desde($ancho) {
  @media (min-width: $ancho) { @content; }
}
```

```scss
// _componentes.scss
@use 'variables' as *;

.tarjeta-planta {
  border-radius: $radio;
  transition: transform 0.2s ease;

  &:hover { transform: translateY(-4px); }     // .tarjeta-planta:hover

  &__titulo { font-size: 1.125rem; }            // .tarjeta-planta__titulo
}
```

- El `&` repite el selector padre.
- Un **mixin** es un bloque reutilizable: `desde()` te ahorra escribir la media query completa.

> 💡 Las variables CSS de la Semana 4 (`--color-…`) siguen siendo útiles: puedes mantener ambas. La rúbrica valora el uso de **variables nativas de CSS y de preprocesadores**.

**Comprueba:**
- [ ] No anidas más de 3 niveles: el CSS generado se vuelve difícil de mantener.

---

## Paso 8 · Media queries Mobile First

**Meta:** ajustar lo que las clases de Bootstrap no resuelven.

**Haz esto:** escribe primero el estilo del celular y luego agranda con `min-width`:

```scss
// _base.scss
@use 'variables' as *;

.hero {
  padding: 3rem 0;            // celular

  &__titulo {
    font-size: 2rem;          // celular
    line-height: 1.2;

    @include desde($bp-md) { font-size: 2.75rem; }   // tablet
    @include desde($bp-lg) { font-size: 3.5rem; }    // escritorio
  }

  @include desde($bp-lg) { padding: 6rem 0; }
}
```

Esto genera en CSS:

```css
.hero__titulo { font-size: 2rem; line-height: 1.2; }
@media (min-width: 768px) { .hero__titulo { font-size: 2.75rem; } }
@media (min-width: 992px) { .hero__titulo { font-size: 3.5rem; } }
```

**Comprueba:**
- [ ] Tus media queries usan `min-width` (Mobile First).
- [ ] Coinciden con los breakpoints de Bootstrap.

**Errores frecuentes:**
- Escribir todo con `max-width`: eso es Desktop First, lo contrario de lo que pide la actividad.

---

## Paso 9 · Rendimiento y legibilidad del código

**Meta:** un código fácil de leer y un sitio que cargue rápido.

**Haz esto:**
1. Agrega comentarios que separen las secciones de cada parcial.
2. Borra estilos que ya no usas.
3. Revisa el peso de tus imágenes (Semana 4, paso 8).
4. Opcional: en las herramientas de desarrollo de Chrome, pestaña **Lighthouse**, corre un análisis **Mobile** y revisa **Performance** y **Accessibility**.

**Comprueba:**
- [ ] Un compañero entiende tu `scss/` sin que se lo expliques.

---

## Paso 10 · Probar, validar y publicar

**Meta:** comprobar todo antes de entregar.

**Haz esto:**
1. Prueba cada página en 375 px, 768 px y 1280 px, y en un **celular real**.
2. Valida cada página en el [W3C Validator](https://validator.w3.org/#validate_by_input).
3. Sube al **hosting de Duoc** el HTML, `css/` (el **CSS compilado**), `js/` e `img/`. La carpeta `scss/` no es necesaria en el servidor.
4. Abre la URL publicada desde tu celular.

**Comprueba:**
- [ ] Cero errores en el W3C.
- [ ] La versión publicada se ve igual que en tu computador.

**Errores frecuentes:**
- Olvidar subir el `estilos.css` recién compilado: en el servidor queda la versión antigua.

---

## Paso 11 · Informe de mejoras

**Meta:** documentar lo que cambiaste (la actividad lo pide si hubo mejoras).

**Haz esto:** en un documento breve, por cada mejora: **qué** cambiaste, **por qué** (el problema del paso 1) y una **captura antes/después** en el celular.

**Comprueba:**
- [ ] Cada problema de tu tabla del paso 1 tiene su solución documentada.

---

## 📎 Ejemplo de la clase

Así quedó **Verde Vivo — Vivero Artesanal** después de esta semana:

👉 **[Carpeta `ejemplo-codigo/`](ejemplo-codigo/)** · instrucciones para abrirlo en **[ejemplo-codigo/LEEME.md](ejemplo-codigo/LEEME.md)**

Es el mismo sitio de la semana 4, ahora con la hoja de estilos dividida en parciales de Sass dentro de `scss/`, media queries Mobile First (solo `min-width`) y el orden de las columnas cambiando según el tamaño de pantalla.

> ⚠️ El ejemplo es para **comparar**, no para copiar. Tu entrega tiene que ser sobre **tu** proyecto (el caso del señor Graham), con tus propios textos, colores e imágenes.

---

## ✅ Checklist final

- [ ] Diagnóstico en móvil con la tabla de problemas.
- [ ] Grilla responsiva con prefijos (`sm`, `md`, `lg`…).
- [ ] Nesting, offset u order donde el diseño lo pide.
- [ ] Imágenes con `img-fluid` y videos con `ratio`.
- [ ] Sass organizado en parciales, con variables y anidamiento.
- [ ] Media queries Mobile First con `min-width`.
- [ ] Sin scroll horizontal en 375 px.
- [ ] Cero errores en el W3C Validator.
- [ ] Sitio publicado en el hosting de Duoc.
- [ ] Informe de mejoras.
- [ ] Brief, mapa y wireframes actualizados y coherentes con el sitio.

---

## ❓ Preguntas de repaso

<details>
<summary>1. ¿Qué significa Mobile First?</summary>

Diseñar y programar primero para la pantalla pequeña y luego agregar cambios para pantallas más grandes, con clases con prefijo o media queries `min-width`.
</details>

<details>
<summary>2. ¿Qué pasa en tablet con <code>col-12 col-lg-4</code>?</summary>

Ocupa las 12 columnas (ancho completo): el `col-lg-4` recién se aplica desde 992 px.
</details>

<details>
<summary>3. ¿Por qué usar <code>order</code> en vez de cambiar el orden del HTML?</summary>

Porque el orden del HTML es el que leen los lectores de pantalla y los buscadores. Con `order` cambias solo el orden visual en cada breakpoint.
</details>

<details>
<summary>4. ¿Qué archivo enlazas en el HTML: el .scss o el .css?</summary>

El `.css` compilado. El navegador no entiende Sass.
</details>

<details>
<summary>5. ¿Cuándo escribes una media query propia en vez de usar una clase de Bootstrap?</summary>

Cuando Bootstrap no tiene una clase para lo que necesitas, por ejemplo cambiar el tamaño de un título o la altura del hero según la pantalla.
</details>

---

## 📤 Entrega

- **Actividad:** Sumativa 2 (AS2) — Aplicando el diseño responsivo al proyecto.
- **Formato:** sube tu sitio al **hosting de Duoc**, copia la **URL** y pégala en el documento de la actividad. Si hiciste mejoras, documéntalas en un **informe** y entrégalo junto con la actividad.
- **Fecha límite:** **lunes 23 de noviembre de 2026 a las 23:59 hrs**, por el AVA.
- **Se evalúa (rúbrica, 100 puntos):** brief, problemas y necesidades, mapa de navegación y wireframes (10 a 12 pts c/u); diseño de interfaz, HTML W3C, frameworks/variables CSS/preprocesadores (12 a 15 pts c/u) y sitio responsivo (16 pts).

> Este tutorial complementa la guía de aprendizaje y la clase sincrónica. Tu entrega debe ser trabajo propio.
