# Tutorial Semana 8 · Interacciones con JavaScript, DOM y jQuery

**Proyecto Integrado (GPD2201) · Experiencia 3 · Actividad Sumativa 3 (AS3): Agregando interacciones al proyecto**

En este tutorial cierras la construcción de tu sitio con **JavaScript**: validas formularios mientras el usuario escribe, muestras y ocultas elementos, actualizas partes de la página **sin recargarla**, respondes a clics y desplazamientos, agregas un **menú de accesibilidad** y mejoras el panel con componentes de **Bootstrap JS**.

Los ejemplos usan **Verde Vivo**. Tú eliges las interacciones que mejor sirven a **tu proyecto**.

---

## Qué vas a aprender

- Diferenciar BOM y DOM.
- Seleccionar elementos y responder a eventos.
- Validar formularios en el navegador.
- Mostrar, ocultar y filtrar contenido.
- Cargar datos sin recargar la página con `fetch`.
- Crear un modo oscuro y un control de tamaño de texto.
- Usar modal y toast de Bootstrap, y jQuery cuando te sirva.

## Antes de comenzar

- [ ] Tu sitio con panel de la Semana 7 funcionando en local y con la retroalimentación de la AF5 aplicada.
- [ ] El archivo `js/main.js` enlazado al final del `<body>`, **después** de `bootstrap.bundle.min.js`.
- [ ] El resumen de la clase: [resumen-clase.md](resumen-clase.md).

⏱️ Tiempo estimado: 6 a 8 horas.

> ⚠️ Esta actividad es **sumativa**. La rúbrica tiene 10 criterios: brief, problemas y necesidades, mapa, wireframes, diseño de interfaz, HTML W3C, frameworks/preprocesadores, responsivo, **administración del sitio** e **interacciones**. Es la revisión de todo tu proyecto.

---

## Paso 1 · Elegir las interacciones

**Meta:** agregar JavaScript donde realmente mejora la experiencia.

**Haz esto:** recorre tu sitio y tu panel, y completa una tabla:

| Dónde | Problema actual | Interacción que lo resuelve |
|-------|-----------------|-----------------------------|
| Formulario de contacto | El error aparece recién al enviar | Validación en tiempo real |
| Catálogo | Para filtrar hay que recargar | Filtro por categoría sin recargar |
| Panel | Eliminar no pide confirmación | Modal de confirmación |
| Todo el sitio | Texto pequeño para algunas personas | Menú de accesibilidad |

**Comprueba:**
- [ ] Tienes al menos 4 interacciones, en la zona pública **y** en el panel.

---

## Paso 2 · BOM, DOM y tu primer evento

**Meta:** entender con qué trabaja JavaScript.

- **BOM:** el navegador (`window`): la URL, el historial, `alert()`, `confirm()`, `localStorage`, los temporizadores.
- **DOM:** la página como un árbol de elementos que puedes leer y cambiar (`document`).

**Haz esto:** en `js/main.js`:

```js
// Espera a que el HTML esté listo
document.addEventListener('DOMContentLoaded', () => {
  const titulo = document.querySelector('h1');      // DOM: seleccionar
  console.log('Página:', titulo.textContent);       // ver en la consola

  console.log('Ancho de la ventana:', window.innerWidth);   // BOM
});
```

Abre la consola (`F12` → **Console**) y recarga.

**Comprueba:**
- [ ] Ves los dos mensajes en la consola, sin errores en rojo.

**Errores frecuentes:**
- `Cannot read properties of null`: el selector no encontró nada (revisa el `#id` o la `.clase`) o el script corre antes de que exista el HTML.

---

## Paso 3 · Validar un formulario en tiempo real

**Meta:** avisar los errores mientras el usuario escribe.

**Haz esto:**
1. Al `<form>` agrégale `id="form-contacto"` y `novalidate` (desactiva los mensajes del navegador para usar los tuyos). Debajo de cada campo, un mensaje:

```html
<input type="email" id="correo" name="correo" class="form-control" required>
<div class="invalid-feedback">Escribe un correo válido, por ejemplo nombre@correo.cl.</div>
```

2. En `main.js`:

```js
const form = document.querySelector('#form-contacto');

if (form) {
  const campos = form.querySelectorAll('input, textarea');

  // Marca un campo como correcto o con error
  const revisar = (campo) => {
    const ok = campo.checkValidity();
    campo.classList.toggle('is-invalid', !ok);
    campo.classList.toggle('is-valid', ok);
    campo.setAttribute('aria-invalid', String(!ok));   // lo anuncian los lectores de pantalla
  };

  // ¿El usuario está apretando el botón Enviar?
  let presionandoEnviar = false;
  form.addEventListener('pointerdown', (evento) => {
    presionandoEnviar = Boolean(evento.target.closest('[type="submit"]'));
  });

  // Al salir de cada campo, mostrar si está bien o mal
  campos.forEach((campo) => {
    campo.addEventListener('blur', () => {
      if (!presionandoEnviar) revisar(campo);
    });
  });

  // Al enviar, detener si hay errores
  form.addEventListener('submit', (evento) => {
    presionandoEnviar = false;
    if (!form.checkValidity()) {
      evento.preventDefault();
      campos.forEach(revisar);
      form.querySelector(':invalid').focus();   // lleva el foco al primer error
    }
  });
}
```

**Comprueba:**
- [ ] Escribes un correo sin `@`, sales del campo y aparece el mensaje en rojo.
- [ ] Con todo correcto, el formulario se envía y PHP lo guarda.

**Errores frecuentes:**
- Pensar que esto reemplaza la validación de PHP. El navegador ayuda al usuario; **el servidor siempre vuelve a validar**.
- Hay que hacer **dos clics** en «Enviar»: al salir del último campo aparece el mensaje, la página se mueve y el botón se corre antes de soltar el clic. Por eso el código no revisa el campo en el `blur` cuando estás apretando el botón (`presionandoEnviar`); la revisión se hace igual en el `submit`.

---

## Paso 4 · Mostrar, ocultar y filtrar

**Meta:** cambiar lo que se ve sin recargar.

**Haz esto:**
1. En cada tarjeta del catálogo, agrega su categoría como atributo de datos (suma `c.c_slug` al `SELECT` del listado de la Semana 6):

```php
<div class="col-12 col-sm-6 col-lg-4 tarjeta" data-categoria="<?= htmlspecialchars($planta['c_slug']) ?>">
```

2. Arriba del catálogo, los botones de filtro:

```html
<div class="mb-4" role="group" aria-label="Filtrar por categoría">
  <button type="button" class="btn btn-outline-success active" data-filtro="todas" aria-pressed="true">Todas</button>
  <button type="button" class="btn btn-outline-success" data-filtro="interior" aria-pressed="false">Interior</button>
  <button type="button" class="btn btn-outline-success" data-filtro="suculentas" aria-pressed="false">Suculentas</button>
</div>
```

3. En `main.js`:

```js
const botones = document.querySelectorAll('[data-filtro]');
const tarjetas = document.querySelectorAll('.tarjeta');

botones.forEach((boton) => {
  boton.addEventListener('click', () => {
    const filtro = boton.dataset.filtro;

    botones.forEach((b) => {
      b.classList.toggle('active', b === boton);
      b.setAttribute('aria-pressed', b === boton);
    });

    tarjetas.forEach((tarjeta) => {
      const visible = filtro === 'todas' || tarjeta.dataset.categoria === filtro;
      tarjeta.classList.toggle('d-none', !visible);
    });
  });
});
```

**Comprueba:**
- [ ] Al hacer clic en una categoría, quedan solo sus tarjetas; «Todas» las vuelve a mostrar.

**Errores frecuentes:**
- El atributo se llama `data-categoria` en el HTML, pero en JavaScript se lee como `dataset.categoria`.

---

## Paso 5 · Actualizar sin recargar con `fetch`

**Meta:** traer datos del servidor y mostrarlos sin recargar la página.

**Haz esto:**
1. Crea `api/buscar.php`, que responde en **JSON**:

```php
<?php
include_once '../class/config.php';
include_once '../class/db.php';
header('Content-Type: application/json; charset=utf-8');

$texto = trim($_GET['q'] ?? '');
$db = new db($dbhost, $dbuser, $dbpass, $dbname, 'utf8mb4');
$db->query('SELECT p_id, p_nombre FROM vv_plantas WHERE p_nombre LIKE ? ORDER BY p_nombre LIMIT 10',
           '%' . $texto . '%');
echo json_encode($db->fetchAll());
$db->close();
```

2. En la página, un buscador y un lugar para los resultados:

```html
<label for="buscador" class="form-label">Buscar planta</label>
<input type="search" id="buscador" class="form-control" autocomplete="off">
<ul id="resultados" class="list-unstyled mt-2" aria-live="polite"></ul>
```

3. En `main.js`:

```js
const buscador = document.querySelector('#buscador');
const resultados = document.querySelector('#resultados');

if (buscador) {
  buscador.addEventListener('input', async () => {
    if (buscador.value.trim().length < 2) { resultados.innerHTML = ''; return; }

    const respuesta = await fetch(`api/buscar.php?q=${encodeURIComponent(buscador.value)}`);
    const plantas = await respuesta.json();

    resultados.innerHTML = '';
    plantas.forEach((planta) => {
      const item = document.createElement('li');
      const enlace = document.createElement('a');
      enlace.href = `planta.php?id=${planta.p_id}`;
      enlace.textContent = planta.p_nombre;     // textContent: seguro, no interpreta HTML
      item.append(enlace);
      resultados.append(item);
    });
  });
}
```

**Comprueba:**
- [ ] Al escribir «mon», aparece «Monstera deliciosa» sin recargar.
- [ ] En **Network** (`F12`) ves las peticiones a `buscar.php` con respuesta JSON.

**Errores frecuentes:**
- Usar `innerHTML` con datos de la base: si alguien guardó HTML malicioso, se ejecuta. Crea elementos y usa `textContent`.

---

## Paso 6 · Menú de accesibilidad

**Meta:** que cada persona adapte la interfaz a sus necesidades.

**Haz esto:**
1. En el `header.php`, los botones:

```html
<div class="d-flex gap-2" aria-label="Opciones de accesibilidad">
  <button type="button" id="btn-tema" class="btn btn-sm btn-outline-secondary" aria-pressed="false">Modo oscuro</button>
  <button type="button" id="btn-texto-mas" class="btn btn-sm btn-outline-secondary" aria-label="Aumentar texto">A+</button>
  <button type="button" id="btn-texto-menos" class="btn btn-sm btn-outline-secondary" aria-label="Disminuir texto">A−</button>
</div>
```

2. En tu CSS (o Sass), los colores del modo oscuro con tus variables:

```css
body.tema-oscuro {
  --color-texto: #F8F5F0;
  --color-fondo: #1C1C1F;
}
body { transition: background-color 0.3s, color 0.3s; }
```

3. En `main.js`:

```js
const btnTema = document.querySelector('#btn-tema');

function aplicarTema(oscuro) {
  document.body.classList.toggle('tema-oscuro', oscuro);
  btnTema.setAttribute('aria-pressed', oscuro);
  btnTema.textContent = oscuro ? 'Modo claro' : 'Modo oscuro';
}

if (btnTema) {
  let guardado = null;
  try { guardado = localStorage.getItem('tema'); } catch (e) {}
  aplicarTema(guardado === 'oscuro');

  btnTema.addEventListener('click', () => {
    const oscuro = !document.body.classList.contains('tema-oscuro');
    aplicarTema(oscuro);
    try { localStorage.setItem('tema', oscuro ? 'oscuro' : 'claro'); } catch (e) {}
  });
}

// Tamaño del texto: entre 14 y 22 px
const raiz = document.documentElement;
function cambiarTexto(paso) {
  const actual = parseFloat(getComputedStyle(raiz).fontSize);
  raiz.style.fontSize = Math.min(22, Math.max(14, actual + paso)) + 'px';
}
document.querySelector('#btn-texto-mas')?.addEventListener('click', () => cambiarTexto(2));
document.querySelector('#btn-texto-menos')?.addEventListener('click', () => cambiarTexto(-2));
```

- `localStorage` recuerda la preferencia aunque cierres el navegador. Va dentro de `try` porque algunos navegadores lo bloquean en modo privado.
- Para que el tamaño de texto funcione, tus tamaños deben estar en `rem`, no en `px`.

**Comprueba:**
- [ ] El modo oscuro se mantiene al cambiar de página.
- [ ] Mediste el contraste del modo oscuro: `#F8F5F0` sobre `#1C1C1F` da **15,6:1** (cumple AA y AAA).

---

## Paso 7 · Panel: confirmar antes de eliminar y avisar el resultado

**Meta:** dar retroalimentación al usuario del panel.

**Haz esto:**
1. Agrega `class="form-eliminar"` y `data-nombre="…"` a cada formulario de eliminar del listado, y al final de `admin_list.php` un **modal** de Bootstrap:

```html
<div class="modal fade" id="modal-eliminar" tabindex="-1" aria-labelledby="titulo-modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"><h2 class="modal-title h5" id="titulo-modal">¿Eliminar registro?</h2></div>
      <div class="modal-body">Vas a eliminar <strong id="nombre-eliminar"></strong>. No se puede deshacer.</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger" id="confirmar-eliminar">Eliminar</button>
      </div>
    </div>
  </div>
</div>
```

2. En el JS del panel:

```js
const modalEl = document.querySelector('#modal-eliminar');
if (modalEl) {
  const modal = new bootstrap.Modal(modalEl);
  let formPendiente = null;

  document.querySelectorAll('.form-eliminar').forEach((f) => {
    f.addEventListener('submit', (evento) => {
      evento.preventDefault();                       // detener el envío
      formPendiente = f;
      document.querySelector('#nombre-eliminar').textContent = f.dataset.nombre;
      modal.show();
    });
  });

  document.querySelector('#confirmar-eliminar').addEventListener('click', () => {
    formPendiente?.submit();                          // ahora sí, enviar
  });
}
```

3. Para avisar «Planta agregada», muestra un **toast** si la URL trae `?info=`:

```js
const info = new URLSearchParams(window.location.search).get('info');   // BOM: leer la URL
const toastEl = document.querySelector('#toast-info');
if (info && toastEl) {
  toastEl.querySelector('.toast-body').textContent = info;
  bootstrap.Toast.getOrCreateInstance(toastEl).show();
}
```

   (El HTML del toast está en la [documentación de Bootstrap](https://getbootstrap.com/docs/5.3/components/toasts/); agrégale `id="toast-info"`, `role="status"` y `aria-live="polite"`.)

**Comprueba:**
- [ ] Al eliminar aparece el modal; **Cancelar** no borra nada.
- [ ] Después de guardar, aparece el aviso y se cierra solo.

---

## Paso 8 · La misma interacción con jQuery

**Meta:** reconocer jQuery, que la guía trabaja.

**Haz esto:**
1. Incluye jQuery **antes** de tu `main.js`:

```html
<script src="https://code.jquery.com/jquery-4.0.0.min.js"></script>
<script src="js/main.js"></script>
```

2. Compara el filtro del paso 4:

```js
// Seleccionar: JavaScript puro vs. jQuery
document.querySelectorAll('.tarjeta');   // JS
$('.tarjeta');                           // jQuery

// El filtro del paso 4 escrito con jQuery: .on() escucha eventos
$('[data-filtro]').on('click', function () {
  const filtro = $(this).data('filtro');
  $('.tarjeta').each(function () {
    $(this).toggleClass('d-none', filtro !== 'todas' && $(this).data('categoria') !== filtro);
  });
});
```

**Comprueba:**
- [ ] Usas jQuery **o** JavaScript puro para cada tarea, no ambos para lo mismo.

**Errores frecuentes:**
- `$ is not defined`: jQuery no cargó o está **después** de tu `main.js`.

---

## Paso 9 · Probar, validar, publicar y documentar

**Meta:** asegurar que todo funciona en cualquier dispositivo.

**Haz esto:**
1. Prueba cada interacción en **dos navegadores** y en tu **celular**, solo con teclado y con la consola abierta.
2. Valida el HTML de cada página en el [W3C](https://validator.w3.org/#validate_by_input).
3. Sube `js/`, `api/` y los archivos modificados al **hosting de Duoc** y prueba la URL publicada.
4. Escribe tu **informe de mejoras**: por cada interacción, qué problema resuelve y una captura.

**Comprueba:**
- [ ] La consola no muestra errores en ninguna página.
- [ ] Todas las interacciones funcionan en la versión publicada.

---

## 📎 Ejemplo de la clase

Así quedó **Verde Vivo — Vivero Artesanal** después de esta semana:

👉 **[Carpeta `ejemplo-codigo/`](ejemplo-codigo/)** · instrucciones para abrirlo en **[ejemplo-codigo/LEEME.md](ejemplo-codigo/LEEME.md)**

Es el sitio completo con las interacciones: menú de accesibilidad (modo oscuro y tamaño de texto), validación en tiempo real, filtro del catálogo sin recargar, buscador con `fetch` a `api/buscar.php`, botón «volver arriba» con jQuery y, en el panel, el modal para confirmar y el aviso de éxito.

> ⚠️ El ejemplo es para **comparar**, no para copiar. Tu entrega tiene que ser sobre **tu** proyecto (el caso del señor Graham), con tus propios textos, colores e imágenes.

---

## ✅ Checklist final

- [ ] Tabla de interacciones con su problema y solución.
- [ ] Validación de formularios en tiempo real (y en PHP).
- [ ] Mostrar u ocultar elementos según acciones del usuario.
- [ ] Actualización sin recargar con `fetch` (o similar).
- [ ] Interacciones con clics y desplazamiento o teclado.
- [ ] Manipulación del DOM: contenido y estilos en tiempo real.
- [ ] Menú de accesibilidad: modo oscuro y tamaño de texto, con contraste verificado.
- [ ] Panel con confirmación de eliminación y avisos.
- [ ] Probado en dos navegadores y en el celular, consola sin errores.
- [ ] Cero errores en el W3C y sitio publicado.
- [ ] Informe de mejoras.

---

## ❓ Preguntas de repaso

<details>
<summary>1. ¿Qué diferencia hay entre el BOM y el DOM?</summary>

El BOM representa el navegador (ventana, URL, historial, almacenamiento). El DOM representa el contenido de la página como un árbol de elementos. El DOM está dentro del BOM (`window.document`).
</details>

<details>
<summary>2. ¿Por qué validar en JavaScript si PHP ya valida?</summary>

Porque JavaScript avisa al instante y mejora la experiencia. Pero PHP es el que protege los datos: la validación del navegador se puede saltar.
</details>

<details>
<summary>3. ¿Por qué usar <code>textContent</code> en vez de <code>innerHTML</code> con datos de la base?</summary>

`textContent` muestra el texto tal cual; `innerHTML` interpreta HTML y podría ejecutar código malicioso guardado en la base.
</details>

<details>
<summary>4. ¿Qué hace <code>evento.preventDefault()</code>?</summary>

Detiene la acción por defecto del navegador, por ejemplo el envío de un formulario, para que tu código decida qué hacer.
</details>

<details>
<summary>5. ¿jQuery es otro lenguaje?</summary>

No. Es una biblioteca de JavaScript que simplifica la selección de elementos y el manejo de eventos.
</details>

---

## 📤 Entrega

- **Actividad:** Sumativa 3 (AS3) — Agregando interacciones al proyecto.
- **Formato:** sube tu sitio y tu base de datos al **hosting de Duoc**, copia la **URL** y pégala en el documento de la actividad. Si hiciste mejoras, documéntalas en un **informe** y entrégalo junto con la actividad.
- **Fecha límite:** **lunes 14 de diciembre de 2026 a las 23:59 hrs**, por el AVA.
- **Se evalúa (rúbrica, 100 puntos):** brief, problemas y necesidades, mapa, wireframes y diseño de interfaz (9 pts c/u); HTML W3C, frameworks/preprocesadores, responsivo, administración del sitio e interacciones (11 pts c/u).

> Este tutorial complementa la guía de aprendizaje y la clase sincrónica. Tu entrega debe ser trabajo propio.
