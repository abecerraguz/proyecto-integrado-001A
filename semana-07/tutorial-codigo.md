# Tutorial Semana 7 · Panel de administración con login y CRUD

**Proyecto Integrado (GPD2201) · Experiencia 3 · Actividad Formativa 5 (AF5): Programando las páginas de administración de un sitio**

En este tutorial construyes la **zona privada** de tu sitio: un **login** con sesiones PHP y un **panel** donde tu cliente puede **crear, ver, editar y eliminar** su contenido sin tocar el código. Los cambios del panel se ven al instante en el sitio público.

Los ejemplos usan **Verde Vivo** (administrar plantas). Tú administras **el contenido principal de tu proyecto**.

---

## Qué vas a aprender

- Diseñar el panel a partir de casos de uso.
- Crear usuarios con contraseñas seguras (hash).
- Programar login, protección de páginas y cierre de sesión.
- Usar formularios con `POST` y `GET`, y los atributos `name` y `value`.
- Implementar el CRUD completo con consultas preparadas.
- Subir imágenes de forma segura.

## Antes de comenzar

- [ ] Tu sitio dinámico de la Semana 6 funcionando en local (XAMPP o MAMP) y con la retroalimentación de la AF4 aplicada.
- [ ] Tu `class/config.php` y la clase `db`.
- [ ] El resumen de la clase: [resumen-clase.md](resumen-clase.md).

⏱️ Tiempo estimado: 8 a 10 horas.

---

## Paso 1 · Casos de uso y páginas del panel

**Meta:** saber qué páginas necesitas antes de programar.

**Haz esto:**
1. Escribe qué hará tu cliente en el panel. Ejemplo:
   > Camila entra con su usuario → ve la lista de plantas → agrega una nueva con nombre, categoría, precio y foto → la ve publicada en el catálogo → más tarde corrige el precio → y elimina una que ya no vende.
2. De ahí salen las páginas:

```
admin/
├── index.php           ← formulario de login
├── login.php           ← procesa el login (POST)
├── auth.php            ← protege las páginas privadas
├── logout.php          ← cierra la sesión
├── admin_list.php      ← listado con botones Editar / Eliminar
├── admin_insertar.php  ← formulario para agregar
├── insertar.php        ← guarda lo nuevo (POST)
├── admin_editar.php    ← formulario con los datos actuales
├── editar.php          ← guarda los cambios (POST)
└── eliminar.php        ← elimina (POST)
```

3. Mantén el panel **simple**: una navegación clara, tablas legibles y botones con texto. Para inspirarte, mira [AdminLTE](https://adminlte.io/).

**Comprueba:**
- [ ] Cada paso de tu caso de uso tiene su página.

---

## Paso 2 · Tabla de usuarios con contraseña segura

**Meta:** guardar usuarios sin guardar nunca la contraseña en texto plano.

**Haz esto:**
1. Crea la tabla en phpMyAdmin:

```sql
CREATE TABLE vv_usuarios (
  u_id       INT AUTO_INCREMENT PRIMARY KEY,
  u_nombre   VARCHAR(60)  NOT NULL,
  u_username VARCHAR(30)  NOT NULL UNIQUE,
  u_password VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

2. Genera el **hash** de la contraseña: crea un archivo temporal `generar-hash.php` en tu proyecto:

```php
<?php echo password_hash('EscribeAquiTuClave', PASSWORD_DEFAULT);
```

3. Ábrelo en `http://localhost/mi-proyecto/generar-hash.php`, copia el texto largo que empieza con `$2y$` y pégalo en el campo `u_password` al insertar tu usuario en phpMyAdmin.
4. **Elimina `generar-hash.php`** apenas termines.

**Comprueba:**
- [ ] En la tabla, la contraseña se ve como `$2y$10$…`, no como la clave real.

**Errores frecuentes:**
- Dejar `generar-hash.php` en el servidor, o usar una clave fácil como `123456`.

---

## Paso 3 · Formulario de login

**Meta:** que el usuario ingrese sus credenciales.

**Haz esto:** en `admin/index.php`:

```php
<?php $error = $_GET['error'] ?? ''; ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ingresar · Panel Verde Vivo</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
</head>
<body>
<main class="container py-5" style="max-width: 420px;">
  <h1 class="h3 mb-4">Ingresar al panel</h1>
  <?php if ($error): ?>
    <div class="alert alert-danger" role="alert"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>
  <form action="login.php" method="post">
    <label for="username" class="form-label">Usuario</label>
    <input type="text" id="username" name="username" class="form-control mb-3" required autocomplete="username">
    <label for="password" class="form-label">Contraseña</label>
    <input type="password" id="password" name="password" class="form-control mb-3" required autocomplete="current-password">
    <button type="submit" class="btn btn-success w-100">Ingresar</button>
  </form>
</main>
</body>
</html>
```

- `method="post"`: la contraseña **no** viaja en la URL.
- Cada `name` es la llave con la que el dato llega a PHP: `name="username"` llega como `$_POST['username']`.

**Comprueba:**
- [ ] El formulario se ve bien en el celular y cada campo tiene su `<label>`.

---

## Paso 4 · Procesar el login con sesiones

**Meta:** verificar las credenciales y recordar al usuario mientras navega.

**Haz esto:** en `admin/login.php`:

```php
<?php
session_start();
include_once '../class/config.php';
include_once '../class/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: index.php'); exit; }

$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

$db = new db($dbhost, $dbuser, $dbpass, $dbname, 'utf8mb4');
$db->query('SELECT u_id, u_nombre, u_password FROM vv_usuarios WHERE u_username = ?', $username);
$usuario = $db->fetchArray();
$db->close();

if (empty($usuario) || !password_verify($password, $usuario['u_password'])) {
    header('Location: index.php?error=' . urlencode('Usuario o contraseña incorrectos.'));
    exit;
}

session_regenerate_id(true);               // nuevo ID de sesión al ingresar
$_SESSION['u_id']     = (int)$usuario['u_id'];
$_SESSION['u_nombre'] = $usuario['u_nombre'];

header('Location: admin_list.php');
exit;
```

| Instrucción | Qué hace |
|-------------|----------|
| `session_start()` | Inicia o retoma la sesión. Va al comienzo, antes de cualquier HTML. |
| `password_verify()` | Compara la clave escrita con el hash guardado. |
| `session_regenerate_id(true)` | Cambia el ID de sesión al ingresar (evita el robo de sesión). |
| `$_SESSION['u_id']` | Guarda quién ingresó, para las demás páginas. |

**Comprueba:**
- [ ] Con datos correctos llegas al listado; con datos incorrectos vuelves al login con el mensaje de error.

**Errores frecuentes:**
- «Headers already sent»: hay un espacio, un salto de línea o HTML antes de `session_start()` o de `header()`.
- Decir «el usuario no existe» o «la contraseña es incorrecta» por separado: le das pistas a un atacante. Usa un solo mensaje.

---

## Paso 5 · Proteger las páginas y cerrar sesión

**Meta:** que nadie entre al panel sin login.

**Haz esto:**
1. `admin/auth.php`:

```php
<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
if (!isset($_SESSION['u_id'])) {
    header('Location: index.php');
    exit;
}
```

2. En la **primera línea** de cada página privada (`admin_list.php`, `admin_insertar.php`, `insertar.php`, etc.):

```php
<?php include_once 'auth.php'; ?>
```

3. `admin/logout.php`:

```php
<?php
session_start();
$_SESSION = [];
session_destroy();
header('Location: index.php');
exit;
```

4. Agrega en la navegación del panel un enlace **Cerrar sesión** a `logout.php`.

**Comprueba:**
- [ ] Sin ingresar, abre `admin/admin_list.php` directo en la barra de direcciones: debe enviarte al login.
- [ ] Después de cerrar sesión, si recargas cualquier página del panel, te envía al login.

**Errores frecuentes:**
- Olvidar `auth.php` en los archivos que **procesan** (`insertar.php`, `eliminar.php`): aunque no se vean, también hay que protegerlos.

---

## Paso 6 · Listar (la «R» de CRUD)

**Meta:** ver todo el contenido con sus acciones.

**Haz esto:** en `admin/admin_list.php`, consulta igual que en la Semana 6 y muestra una tabla:

```php
<table class="table align-middle">
  <caption>Plantas del catálogo</caption>
  <thead>
    <tr><th scope="col">Planta</th><th scope="col">Categoría</th><th scope="col">Precio</th><th scope="col">Acciones</th></tr>
  </thead>
  <tbody>
  <?php foreach ($plantas as $p): ?>
    <tr>
      <td><?= htmlspecialchars($p['p_nombre']) ?></td>
      <td><?= htmlspecialchars($p['c_nombre'] ?? '—') ?></td>
      <td>$<?= number_format($p['p_precio'], 0, ',', '.') ?></td>
      <td>
        <a href="admin_editar.php?id=<?= (int)$p['p_id'] ?>" class="btn btn-sm btn-outline-primary">Editar</a>
        <form action="eliminar.php" method="post" class="d-inline">
          <input type="hidden" name="id" value="<?= (int)$p['p_id'] ?>">
          <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>
        </form>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
```

- **Editar** usa un enlace con `GET` (`?id=3`): solo dice *qué* registro abrir.
- **Eliminar** usa un formulario con `POST`: cambia datos, así que no debe ir en un simple enlace.

**Comprueba:**
- [ ] Ves todos los registros, también los que agregaste en phpMyAdmin.

---

## Paso 7 · Crear (la «C» de CRUD) con imagen

**Meta:** agregar contenido desde el panel.

**Haz esto:**
1. `admin/admin_insertar.php`: un formulario con `enctype="multipart/form-data"` (obligatorio para subir archivos):

```php
<form action="insertar.php" method="post" enctype="multipart/form-data">
  <label for="nombre" class="form-label">Nombre</label>
  <input type="text" id="nombre" name="nombre" class="form-control" required>

  <label for="categoria" class="form-label">Categoría</label>
  <select id="categoria" name="categoria" class="form-select" required>
    <option value="">Elige una categoría</option>
    <?php foreach ($categorias as $c): ?>
      <option value="<?= (int)$c['c_id'] ?>"><?= htmlspecialchars($c['c_nombre']) ?></option>
    <?php endforeach; ?>
  </select>

  <label for="precio" class="form-label">Precio</label>
  <input type="number" id="precio" name="precio" class="form-control" min="0" required>

  <label for="imagen" class="form-label">Foto (JPG, PNG o WebP, máximo 2 MB)</label>
  <input type="file" id="imagen" name="imagen" class="form-control" accept="image/jpeg,image/png,image/webp">

  <button type="submit" class="btn btn-success mt-3">Guardar</button>
</form>
```

2. `admin/insertar.php`: valida, sube la imagen y guarda:

```php
<?php
include_once 'auth.php';
include_once '../class/config.php';
include_once '../class/db.php';

$nombre    = trim($_POST['nombre'] ?? '');
$categoria = (int)($_POST['categoria'] ?? 0);
$precio    = (int)($_POST['precio'] ?? 0);

if ($nombre === '' || $categoria <= 0 || $precio < 0) {
    header('Location: admin_insertar.php?error=' . urlencode('Completa todos los campos.'));
    exit;
}

$imagen = null;
if (!empty($_FILES['imagen']['tmp_name'])) {
    $permitidos = ['image/jpeg' => 'jpg', 'image/png' => 'png', 'image/webp' => 'webp'];
    $tipoReal   = mime_content_type($_FILES['imagen']['tmp_name']);   // lee el archivo, no el nombre
    if (!isset($permitidos[$tipoReal]) || $_FILES['imagen']['size'] > 2 * 1024 * 1024) {
        header('Location: admin_insertar.php?error=' . urlencode('La imagen debe ser JPG, PNG o WebP de hasta 2 MB.'));
        exit;
    }
    $imagen = bin2hex(random_bytes(8)) . '.' . $permitidos[$tipoReal];   // nombre nuevo y seguro
    move_uploaded_file($_FILES['imagen']['tmp_name'], '../img/plantas/' . $imagen);
}

$db = new db($dbhost, $dbuser, $dbpass, $dbname, 'utf8mb4');
$db->query('INSERT INTO vv_plantas (p_nombre, p_descripcion, p_precio, p_imagen, p_categoria_id) VALUES (?, ?, ?, ?, ?)',
           $nombre, trim($_POST['descripcion'] ?? ''), $precio, $imagen, $categoria);
$db->close();

header('Location: admin_list.php?info=' . urlencode('Planta agregada.'));
exit;
```

**Comprueba:**
- [ ] Agregas un registro con foto y aparece en el listado **y** en el sitio público.
- [ ] Si intentas subir un `.pdf` o un `.php`, el panel lo rechaza.

**Errores frecuentes:**
- Olvidar `enctype="multipart/form-data"`: `$_FILES` llega vacío.
- Confiar en la extensión del archivo: un `virus.php` renombrado a `foto.jpg` pasa. `mime_content_type()` revisa el contenido real.
- La carpeta de destino no existe o no tiene permisos de escritura en el hosting.

---

## Paso 8 · Editar (la «U» de CRUD)

**Meta:** modificar un registro existente.

**Haz esto:**
1. `admin/admin_editar.php`: recibe el `id` por `GET`, busca el registro y llena el formulario usando el atributo **`value`**:

```php
<input type="text" id="nombre" name="nombre" class="form-control"
       value="<?= htmlspecialchars($planta['p_nombre']) ?>" required>
<input type="hidden" name="id" value="<?= (int)$planta['p_id'] ?>">
```

   Y marca la categoría actual en el `<select>`:

```php
<option value="<?= (int)$c['c_id'] ?>" <?= $c['c_id'] == $planta['p_categoria_id'] ? 'selected' : '' ?>>
  <?= htmlspecialchars($c['c_nombre']) ?>
</option>
```

2. `admin/editar.php`: valida como en `insertar.php` y actualiza:

```php
$db->query('UPDATE vv_plantas SET p_nombre = ?, p_precio = ?, p_categoria_id = ? WHERE p_id = ?',
           $nombre, $precio, $categoria, $id);
```

**Comprueba:**
- [ ] Cambias el precio, guardas y el sitio público muestra el precio nuevo.

**Errores frecuentes:**
- Olvidar el `WHERE`: ¡actualiza **todos** los registros!

---

## Paso 9 · Eliminar (la «D» de CRUD)

**Meta:** borrar un registro de forma segura.

**Haz esto:** `admin/eliminar.php`:

```php
<?php
include_once 'auth.php';
include_once '../class/config.php';
include_once '../class/db.php';

$id = (int)($_POST['id'] ?? 0);
if ($id > 0) {
    $db = new db($dbhost, $dbuser, $dbpass, $dbname, 'utf8mb4');
    $db->query('DELETE FROM vv_plantas WHERE p_id = ?', $id);
    $db->close();
}
header('Location: admin_list.php?info=' . urlencode('Planta eliminada.'));
exit;
```

> 💡 En la Semana 8 agregarás una ventana de confirmación con JavaScript antes de eliminar.

**Comprueba:**
- [ ] El registro desaparece del listado y del sitio público.

---

## Paso 10 · Seguridad: repaso

**Meta:** cerrar los riesgos más comunes.

- **Consultas preparadas** en todo SQL que lleve datos del usuario.
- **Validar** lo que llega (`trim`, `(int)`, `filter_var`) y **escapar** al mostrar (`htmlspecialchars`).
- **`auth.php`** en todas las páginas privadas, también en las que solo procesan.
- **Sin errores detallados** en pantalla en el hosting: revisa los registros de errores.
- **Privilegios:** si tu proyecto lo necesita, agrega un campo `u_rol` (por ejemplo `admin` o `editor`) y revisa el rol antes de acciones como eliminar.

> La guía menciona `FILTER_SANITIZE_STRING`: está obsoleto desde PHP 8.1. Usa la validación de este tutorial y `htmlspecialchars()` al mostrar.

---

## Paso 11 · Probar, validar y publicar

**Meta:** comprobar todo antes de entregar.

**Haz esto:**
1. Recorre tu caso de uso completo (paso 1) en local.
2. Valida en el [W3C](https://validator.w3.org/#validate_by_input) el código fuente de las páginas del panel.
3. Exporta tu base, impórtala en el hosting (incluida `vv_usuarios`) y sube los archivos nuevos de `admin/`.
4. Repite el caso de uso en la URL publicada.

**Comprueba:**
- [ ] En el hosting, crear, editar y eliminar funcionan, y la carpeta de imágenes acepta las fotos.

---

## 📎 Ejemplo de la clase

Así quedó **Verde Vivo — Vivero Artesanal** después de esta semana:

👉 **[Carpeta `ejemplo-codigo/`](ejemplo-codigo/)** · instrucciones para abrirlo en **[ejemplo-codigo/LEEME.md](ejemplo-codigo/LEEME.md)**

Al sitio de la semana 6 se le suma la carpeta `admin/`: inicio de sesión, listado de plantas, agregar, editar, eliminar (solo por POST) y ver los mensajes del formulario. El usuario de prueba está en el `LEEME.md`.

> ⚠️ El ejemplo es para **comparar**, no para copiar. Tu entrega tiene que ser sobre **tu** proyecto (el caso del señor Graham), con tus propios textos, colores e imágenes.

---

## ✅ Checklist final

- [ ] Casos de uso escritos y páginas del panel definidas.
- [ ] Tabla de usuarios con contraseñas en hash.
- [ ] Login con sesiones, `session_regenerate_id` y mensaje de error genérico.
- [ ] `auth.php` en todas las páginas privadas y `logout.php` funcionando.
- [ ] Listado, crear, editar y eliminar del contenido principal.
- [ ] Formularios con `name` únicos, `value` en edición y `label` en cada campo.
- [ ] Subida de imágenes validada por tipo real y tamaño.
- [ ] Los cambios del panel se ven en el sitio público.
- [ ] Panel y base publicados en el hosting de Duoc.

---

## ❓ Preguntas de repaso

<details>
<summary>1. ¿Por qué el login usa <code>POST</code> y no <code>GET</code>?</summary>

Con `GET` la contraseña quedaría visible en la URL y en el historial del navegador. `POST` la envía en el cuerpo de la petición.
</details>

<details>
<summary>2. ¿Qué diferencia hay entre <code>password_hash()</code> y <code>password_verify()</code>?</summary>

`password_hash()` convierte la contraseña en un hash para guardarlo. `password_verify()` compara lo que escribe el usuario con ese hash, sin necesidad de conocer la clave original.
</details>

<details>
<summary>3. ¿Para qué sirve <code>auth.php</code>?</summary>

Revisa si existe una sesión iniciada; si no, redirige al login. Se incluye al comienzo de cada página privada.
</details>

<details>
<summary>4. ¿Qué pasa si olvidas el <code>WHERE</code> en un <code>UPDATE</code> o <code>DELETE</code>?</summary>

Se modifican o eliminan **todos** los registros de la tabla.
</details>

<details>
<summary>5. ¿Para qué sirve el atributo <code>value</code> en el formulario de edición?</summary>

Muestra el dato actual del registro dentro del campo, para que el usuario lo modifique en vez de escribirlo de nuevo.
</details>

---

## 📤 Entrega

- **Actividad:** Formativa 5 (AF5) — Programando las páginas de administración de un sitio.
- **Formato:** sube tu sitio y tu base de datos al **hosting de Duoc**, copia la **URL** y pégala en el documento de la actividad. Comprueba que los cambios del panel se vean en el sitio público y que el panel esté protegido con login.
- **Fecha límite:** **lunes 7 de diciembre de 2026 a las 23:59 hrs**, por el AVA.
- **Se evalúa (pauta):** brief, problemas y necesidades, mapa, wireframes, diseño de interfaz, HTML W3C, frameworks/variables CSS/preprocesadores, sitio responsivo, programación para la administración del sitio y programación de interacciones.

> Este tutorial complementa la guía de aprendizaje y la clase sincrónica. Tu entrega debe ser trabajo propio.
