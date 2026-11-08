# Tutorial Semana 6 · Tu sitio dinámico con PHP y MySQL

**Proyecto Integrado (GPD2201) · Experiencia 3 · Actividad Formativa 4 (AF4): Comenzando la programación del sitio**

En este tutorial conviertes tu sitio estático en **dinámico**: instalas un servidor local, diseñas tu **base de datos MySQL**, la creas en **phpMyAdmin** y programas con **PHP** las páginas que muestran el contenido desde la base. Al final lo publicas en el **hosting de Duoc**.

Los ejemplos usan **Verde Vivo** (un catálogo de plantas). Tú programas **el contenido dinámico de tu proyecto**: productos, servicios, artículos…

---

## Qué vas a aprender

- Instalar y usar XAMPP o MAMP.
- Identificar qué partes de tu sitio deben ser dinámicas.
- Diseñar tablas, campos y relaciones.
- Crear y poblar la base de datos en phpMyAdmin.
- Conectar PHP con MySQL usando consultas preparadas.
- Reutilizar el encabezado y el pie con `include`.
- Mostrar listados y detalles desde la base de datos.
- Procesar un formulario y guardar sus datos.
- Publicar archivos y base de datos en el hosting.

## Antes de comenzar

- [ ] Tu sitio responsivo de la Semana 5 funcionando.
- [ ] La clase **`db`** (`db.php`) que usaste en **Lenguajes de Programación** para conectarte a MySQL. Si no la tienes, la encontrarás en el ejemplo de Verde Vivo de esta semana.
- [ ] Tus datos del **hosting de Duoc** (acceso a archivos y a phpMyAdmin).
- [ ] El resumen de la clase: [resumen-clase.md](resumen-clase.md).

⏱️ Tiempo estimado: 8 a 10 horas.

---

## Paso 1 · Instalar el servidor local

**Meta:** que tu computador pueda ejecutar PHP y MySQL.

**Haz esto:**
1. Descarga e instala:
   - **Windows:** [XAMPP](https://www.apachefriends.org/es/download.html).
   - **Mac:** [MAMP](https://www.mamp.info/en/downloads/) (o XAMPP para Mac).
2. Abre el panel de control y enciende **Apache** y **MySQL**. Ambos deben quedar en verde.
3. Abre en el navegador:
   - XAMPP: `http://localhost/` y `http://localhost/phpmyadmin/`
   - MAMP: `http://localhost:8888/` y la página de inicio de MAMP → **phpMyAdmin**.

**Comprueba:**
- [ ] phpMyAdmin abre sin errores.

**Errores frecuentes:**
- phpMyAdmin no carga: **Apache no está encendido**. El orden es Apache (y MySQL) primero.
- Apache no enciende: otro programa usa el puerto 80. Cierra Skype u otro servidor, o cambia el puerto en el panel.

---

## Paso 2 · Mover el proyecto y pasar a `.php`

**Meta:** que el servidor local sirva tu sitio.

**Haz esto:**
1. Copia la carpeta de tu proyecto dentro de la carpeta del servidor:
   - XAMPP Windows: `C:\xampp\htdocs\mi-proyecto`
   - XAMPP Mac: `/Applications/XAMPP/htdocs/mi-proyecto`
   - MAMP: `/Applications/MAMP/htdocs/mi-proyecto`
2. Cambia la extensión de tus páginas de `.html` a `.php` (`index.php`, `contacto.php`…) y actualiza los enlaces del menú.
3. Prueba que PHP funciona: en `index.php`, antes del `<!DOCTYPE html>`, escribe:

```php
<?php $mensaje = "PHP funciona"; ?>
```

y dentro del `<body>`:

```php
<p><?= $mensaje ?></p>
```

4. Abre `http://localhost/mi-proyecto/` (en MAMP, `http://localhost:8888/mi-proyecto/`).

**Comprueba:**
- [ ] Ves «PHP funciona» en la página. Luego borra esas dos líneas.

**Errores frecuentes:**
- Abrir el archivo con Live Server o con doble clic: PHP **solo funciona a través del servidor** (`http://localhost/…`).
- Olvidar el `;` al final de cada instrucción PHP.

---

## Paso 3 · Decidir qué será dinámico

**Meta:** saber qué contenido vendrá de la base de datos.

**Haz esto:** revisa tu inventario de contenidos y marca lo que **cambia seguido** o se **repite con la misma estructura**:

| Contenido | ¿Dinámico? | Por qué |
|-----------|:----------:|---------|
| Catálogo de plantas | ✅ | Se agregan y quitan plantas; todas las tarjetas tienen la misma forma |
| Categorías | ✅ | Sirven para filtrar el catálogo |
| Mensajes del formulario de contacto | ✅ | Se guardan para que la dueña los lea |
| Texto «Nosotros» | ❌ | Casi nunca cambia |

**Comprueba:**
- [ ] Tienes al menos un contenido principal dinámico (tus productos, servicios o artículos).

---

## Paso 4 · Diseñar la base de datos

**Meta:** definir tablas, campos y relaciones antes de crearlas.

**Haz esto:** dibuja (en papel o FigJam) tus tablas. Ejemplo de Verde Vivo:

```
vv_categorias                vv_plantas
─────────────                ──────────
c_id (PK)          ◄──┐      p_id (PK)
c_nombre              │      p_nombre
c_slug                │      p_descripcion
                      │      p_precio
                      │      p_imagen
                      └───── p_categoria_id (FK)
                             p_destacada

vv_mensajes
───────────
m_id (PK) · m_nombre · m_correo · m_mensaje · m_fecha
```

Reglas de la guía:
- **Separa** los datos por tipo: una tabla para cada cosa.
- **Relaciona** las tablas con una clave foránea (FK) cuando un dato pertenece a otro.
- **Nombres descriptivos** en los campos (`p_precio`, no `campo3`).
- **Una clave primaria** (PK) por tabla, con `AUTO_INCREMENT`.
- **Nombres de tablas sin tildes, sin ñ, sin espacios ni símbolos**: solo letras, números y guion bajo.

**Comprueba:**
- [ ] Cada tabla tiene PK y cada relación tiene su FK.

**Errores frecuentes:**
- Guardar la categoría como texto repetido en cada planta. Si cambia el nombre, hay que editar todas: usa una tabla de categorías.

---

## Paso 5 · Crear y poblar la base en phpMyAdmin

**Meta:** tener la base lista y con datos de prueba.

**Haz esto:**
1. En phpMyAdmin, clic en **Nueva**, escribe el nombre (por ejemplo `verde_vivo`) y elige el cotejamiento **`utf8mb4_general_ci`** (acepta tildes, ñ y emojis). Clic en **Crear**.
2. Entra a la base, pestaña **SQL**, pega tu script y presiona **Continuar**:

```sql
CREATE TABLE vv_categorias (
  c_id     INT AUTO_INCREMENT PRIMARY KEY,
  c_nombre VARCHAR(60) NOT NULL,
  c_slug   VARCHAR(60) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE vv_plantas (
  p_id           INT AUTO_INCREMENT PRIMARY KEY,
  p_nombre       VARCHAR(120) NOT NULL,
  p_descripcion  TEXT NOT NULL,
  p_precio       INT UNSIGNED NOT NULL,
  p_imagen       VARCHAR(255) DEFAULT NULL,
  p_categoria_id INT DEFAULT NULL,
  p_destacada    TINYINT(1) NOT NULL DEFAULT 0,
  FOREIGN KEY (p_categoria_id) REFERENCES vv_categorias(c_id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

3. **Pobla** las tablas: pestaña **Insertar** de cada tabla, o con SQL:

```sql
INSERT INTO vv_categorias (c_nombre, c_slug) VALUES ('Interior', 'interior'), ('Suculentas', 'suculentas');
INSERT INTO vv_plantas (p_nombre, p_descripcion, p_precio, p_imagen, p_categoria_id, p_destacada)
VALUES ('Monstera deliciosa', 'Planta de hojas grandes para interiores luminosos.', 14990, 'monstera.webp', 1, 1);
```

**Comprueba:**
- [ ] En la pestaña **Examinar** de cada tabla ves tus datos (al menos 5 registros en la tabla principal).
- [ ] Las tildes se ven bien.

**Errores frecuentes:**
- Crear la tabla con FK **antes** que la tabla a la que apunta: primero `vv_categorias`, después `vv_plantas`.

---

## Paso 6 · Configuración y conexión

**Meta:** conectar PHP con tu base de datos sin exponer las credenciales.

**Haz esto:**
1. Crea la carpeta `class/` y copia ahí tu `db.php`.
2. Crea `class/config.php` con tus datos **locales**:

```php
<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';            // en MAMP suele ser 'root'
$dbname = 'verde_vivo';
```

3. Crea también `class/config.example.php`, igual pero con valores de ejemplo (`'tu_usuario'`, `'tu_contraseña'`). Ese sí se puede compartir.
4. Si usas GitHub, agrega `class/config.php` a tu `.gitignore`.
5. Prueba la conexión al inicio de `index.php`:

```php
<?php
include_once 'class/config.php';
include_once 'class/db.php';

$db = new db($dbhost, $dbuser, $dbpass, $dbname, 'utf8mb4');
```

**Comprueba:**
- [ ] La página carga sin mensaje de error.

**Errores frecuentes:**
- «Access denied for user»: usuario o contraseña equivocados en `config.php`.
- «Unknown database»: el nombre de la base no coincide exactamente.
- «Fatal error: Uncaught mysqli_sql_exception» con tus datos de acceso a la vista: desde PHP 8.1, mysqli lanza excepciones y se salta el manejo de errores de `db.php`. Agrega `mysqli_report(MYSQLI_REPORT_OFF);` justo antes de `new mysqli(...)` dentro de `db.php`, y en el hosting nunca muestres el detalle del error.
- Subir `config.php` a un repositorio público: cualquiera vería tus credenciales.

---

## Paso 7 · Encabezado y pie reutilizables

**Meta:** escribir el `<head>`, el menú y el pie una sola vez.

**Haz esto:**
1. Corta todo lo que va desde `<!DOCTYPE html>` hasta el fin del `<header>` y pégalo en `header.php`. Cambia el `<title>` por una variable:

```php
<title><?= htmlspecialchars($pageTitle ?? 'Verde Vivo') ?></title>
```

2. Corta el `<footer>`, los `<script>` y el cierre `</body></html>` y pégalos en `footer.php`.
3. En cada página:

```php
<?php
$pageTitle = 'Plantas · Verde Vivo';
include_once 'header.php';
?>
<main>
  …contenido de la página…
</main>
<?php include_once 'footer.php'; ?>
```

**Comprueba:**
- [ ] Cambias un enlace del menú en `header.php` y se actualiza en todas las páginas.
- [ ] Cada página sigue teniendo su propio título.

**Errores frecuentes:**
- Dejar `<html>` o `<body>` dentro de las páginas además del header: se duplican y el W3C marca error.

---

## Paso 8 · Listado dinámico

**Meta:** que las tarjetas salgan de la base de datos.

**Haz esto:** en `plantas.php` (o la página de tu contenido principal):

```php
<?php
include_once 'class/config.php';
include_once 'class/db.php';

$db = new db($dbhost, $dbuser, $dbpass, $dbname, 'utf8mb4');
$db->query('SELECT p.p_id, p.p_nombre, p.p_precio, p.p_imagen, c.c_nombre
            FROM vv_plantas p
            LEFT JOIN vv_categorias c ON p.p_categoria_id = c.c_id
            ORDER BY p.p_nombre');
$plantas = $db->fetchAll();
$db->close();

$pageTitle = 'Plantas · Verde Vivo';
include_once 'header.php';
?>
```

Y donde estaban las tarjetas fijas, un solo bloque que se repite:

```php
<div class="row g-4">
  <?php foreach ($plantas as $planta): ?>
    <div class="col-12 col-sm-6 col-lg-4">
      <article class="card h-100">
        <img src="img/plantas/<?= htmlspecialchars($planta['p_imagen']) ?>" class="card-img-top"
             alt="<?= htmlspecialchars($planta['p_nombre']) ?>" width="600" height="450">
        <div class="card-body">
          <p class="small text-uppercase"><?= htmlspecialchars($planta['c_nombre'] ?? 'Sin categoría') ?></p>
          <h3 class="h5"><?= htmlspecialchars($planta['p_nombre']) ?></h3>
          <p>Desde $<?= number_format($planta['p_precio'], 0, ',', '.') ?></p>
          <a href="planta.php?id=<?= (int)$planta['p_id'] ?>" class="btn btn-outline-success">Ver detalle</a>
        </div>
      </article>
    </div>
  <?php endforeach; ?>
</div>
```

| Función | Para qué |
|---------|----------|
| `foreach` | Repite el bloque por cada registro |
| `htmlspecialchars()` | Convierte `<`, `>` y comillas en texto seguro: evita que alguien inyecte HTML |
| `number_format()` | Muestra `14990` como `14.990` |
| `(int)` | Asegura que el `id` sea un número |

**Comprueba:**
- [ ] Agregas una planta en phpMyAdmin, recargas y aparece una tarjeta nueva.

**Errores frecuentes:**
- Mostrar datos de la base sin `htmlspecialchars()`.
- «Undefined array key»: el nombre de la columna no coincide con el del `SELECT`.

---

## Paso 9 · Página de detalle

**Meta:** una sola página que muestra cualquier registro según su `id`.

**Haz esto:** en `planta.php`:

```php
<?php
include_once 'class/config.php';
include_once 'class/db.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) { header('Location: plantas.php'); exit; }

$db = new db($dbhost, $dbuser, $dbpass, $dbname, 'utf8mb4');
$db->query('SELECT p_nombre, p_descripcion, p_precio, p_imagen FROM vv_plantas WHERE p_id = ?', $id);
$planta = $db->fetchArray();
$db->close();

if (empty($planta)) { header('Location: plantas.php'); exit; }

$pageTitle = $planta['p_nombre'] . ' · Verde Vivo';
include_once 'header.php';
?>
```

El `?` es un **marcador**: la clase `db` usa una **consulta preparada**, así que el valor de `$id` nunca se mezcla con el SQL. Eso evita la **inyección SQL**.

**Comprueba:**
- [ ] `planta.php?id=1` muestra la planta 1.
- [ ] `planta.php?id=abc` o `planta.php?id=999` vuelve al catálogo sin errores.

**Errores frecuentes:**
- Escribir `"… WHERE p_id = $_GET[id]"`: concatenar lo que viene del usuario abre la puerta a la inyección SQL.

---

## Paso 10 · Procesar un formulario y guardar datos

**Meta:** la parte «Crear» del CRUD: guardar lo que envía el usuario.

**Haz esto:** crea la tabla `vv_mensajes` (paso 4) y, en `contacto.php`, procesa el formulario arriba del HTML:

```php
<?php
include_once 'class/config.php';
include_once 'class/db.php';

$errores = [];
$enviado = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre  = trim($_POST['nombre'] ?? '');
    $correo  = trim($_POST['correo'] ?? '');
    $mensaje = trim($_POST['mensaje'] ?? '');

    if (mb_strlen($nombre) < 2)                       $errores[] = 'Escribe tu nombre.';
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL))  $errores[] = 'Escribe un correo válido.';
    if (mb_strlen($mensaje) < 10)                     $errores[] = 'El mensaje debe tener al menos 10 caracteres.';

    if (!$errores) {
        $db = new db($dbhost, $dbuser, $dbpass, $dbname, 'utf8mb4');
        $db->query('INSERT INTO vv_mensajes (m_nombre, m_correo, m_mensaje, m_fecha) VALUES (?, ?, ?, NOW())',
                   $nombre, $correo, $mensaje);
        $db->close();
        $enviado = true;
    }
}

$pageTitle = 'Contacto · Verde Vivo';
include_once 'header.php';
?>
```

Y en el HTML, muestra el resultado:

```php
<?php if ($enviado): ?>
  <div class="alert alert-success" role="status">¡Gracias! Te responderemos pronto.</div>
<?php endif; ?>
<?php foreach ($errores as $error): ?>
  <div class="alert alert-danger" role="alert"><?= htmlspecialchars($error) ?></div>
<?php endforeach; ?>

<form action="contacto.php" method="post">
  <label for="nombre" class="form-label">Nombre</label>
  <input type="text" id="nombre" name="nombre" class="form-control" required>
  <!-- correo y mensaje igual, con su label -->
  <button type="submit" class="btn btn-accion mt-3">Enviar</button>
</form>
```

**Comprueba:**
- [ ] Envías el formulario y el mensaje aparece en la tabla `vv_mensajes`.
- [ ] Si dejas campos vacíos, ves los errores y no se guarda nada.

**Errores frecuentes:**
- Confiar solo en `required` del HTML: se puede saltar. PHP siempre vuelve a validar.

---

## Paso 11 · Validar la salida en el W3C

**Meta:** que el HTML que genera PHP sea correcto.

**Haz esto:**
1. Abre la página en el navegador y presiona `Cmd + Option + U` (Mac) o `Ctrl + U` (Windows) para **ver el código fuente**: ese es el HTML que recibe el navegador.
2. Cópialo y pégalo en el [W3C Validator](https://validator.w3.org/#validate_by_input).

**Comprueba:**
- [ ] Cero errores en las páginas dinámicas.

**Errores frecuentes:**
- Un `id` repetido dentro del `foreach` (cada tarjeta con `id="tarjeta"`). Usa clases o agrega el número del registro al `id`.

---

## Paso 12 · Publicar en el hosting de Duoc

**Meta:** que el sitio dinámico funcione en internet.

**Haz esto:**
1. En tu phpMyAdmin **local**, entra a tu base → pestaña **Exportar** → **Continuar**. Se descarga un archivo `.sql`.
2. En el phpMyAdmin del **hosting**, entra a tu base → pestaña **Importar** → elige el `.sql` → **Continuar**.
3. Crea en el servidor un `class/config.php` con los datos de la base **del hosting** (servidor, usuario, contraseña y nombre).
4. Sube tus archivos `.php`, `class/`, `css/`, `js/` e `img/`.
5. Abre la URL desde tu celular y prueba el listado, el detalle y el formulario.

**Comprueba:**
- [ ] El sitio publicado muestra los datos de la base del hosting.

**Errores frecuentes:**
- Subir el `config.php` local: en el hosting el usuario `root` sin contraseña no existe.
- Pantalla en blanco: suele ser un error de PHP. Revisa el registro de errores del hosting y las mayúsculas de los nombres de archivo.

---

## 📎 Ejemplo de la clase

Así quedó **Verde Vivo — Vivero Artesanal** después de esta semana:

👉 **[Carpeta `ejemplo-codigo/`](ejemplo-codigo/)** · instrucciones para abrirlo en **[ejemplo-codigo/LEEME.md](ejemplo-codigo/LEEME.md)**

Las páginas ahora son `.php`: el catálogo y el detalle salen de la base de datos (`sql/verde_vivo.sql`), el encabezado y el pie se reutilizan y el formulario de contacto guarda los mensajes. Para probarlo, copia `class/config.example.php` como `class/config.php` y pon tus datos locales.

> ⚠️ El ejemplo es para **comparar**, no para copiar. Tu entrega tiene que ser sobre **tu** proyecto (el caso del señor Graham), con tus propios textos, colores e imágenes.

---

## ✅ Checklist final

- [ ] Servidor local funcionando (Apache y MySQL).
- [ ] Páginas con extensión `.php` y `header.php` / `footer.php` reutilizados.
- [ ] Esquema de base de datos con tablas, PK, FK y nombres correctos.
- [ ] Base de datos creada en `utf8mb4` y poblada con datos de prueba.
- [ ] Credenciales en `class/config.php`, fuera de cualquier repositorio público.
- [ ] Listado y detalle dinámicos con consultas preparadas.
- [ ] Datos mostrados con `htmlspecialchars()`.
- [ ] Un formulario que valida y guarda datos.
- [ ] Salida HTML sin errores en el W3C.
- [ ] Sitio y base de datos publicados en el hosting de Duoc.

---

## ❓ Preguntas de repaso

<details>
<summary>1. ¿Por qué el sitio no funciona si lo abro con Live Server?</summary>

Porque PHP se ejecuta en el servidor. Live Server solo entrega archivos estáticos; necesitas Apache con PHP (XAMPP, MAMP o el hosting).
</details>

<details>
<summary>2. ¿Qué es una clave foránea?</summary>

Un campo que guarda la clave primaria de otra tabla para relacionarlas, por ejemplo `p_categoria_id`, que apunta a `vv_categorias.c_id`.
</details>

<details>
<summary>3. ¿Por qué se usan consultas preparadas con <code>?</code>?</summary>

Para que los datos que vienen del usuario nunca se mezclen con el SQL. Así se previene la inyección SQL.
</details>

<details>
<summary>4. ¿Para qué sirve <code>htmlspecialchars()</code>?</summary>

Convierte los caracteres especiales en texto seguro antes de mostrarlos, para que nadie pueda inyectar HTML o JavaScript en la página.
</details>

<details>
<summary>5. ¿Por qué el fragmento de <code>header.php</code> no se repite en cada página?</summary>

Porque se escribe una vez y se incluye con `include_once`. Si cambias el menú, cambia en todo el sitio.
</details>

---

## 📤 Entrega

- **Actividad:** Formativa 4 (AF4) — Comenzando la programación del sitio.
- **Formato:** sube tu sitio y tu base de datos al **hosting de Duoc**, copia la **URL** y pégala en el documento de la actividad.
- **Fecha límite:** **lunes 30 de noviembre de 2026 a las 23:59 hrs**, por el AVA.
- **Se evalúa (pauta):** brief, problemas y necesidades, mapa, wireframes, diseño de interfaz, HTML W3C, frameworks/variables CSS/preprocesadores, sitio responsivo y **uso de lenguajes de programación para la administración del sitio**.

> Este tutorial complementa la guía de aprendizaje y la clase sincrónica. Tu entrega debe ser trabajo propio.
