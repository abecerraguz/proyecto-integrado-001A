<?php
include_once 'class/config.php';
include_once 'class/db.php';
include_once 'class/helpers.php';

$errores = [];
$enviado = false;
// Valores para volver a mostrar lo que escribió la persona si hay errores
$nombre = $correo = $mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre  = trim($_POST['nombre'] ?? '');
    $correo  = trim($_POST['correo'] ?? '');
    $mensaje = trim($_POST['mensaje'] ?? '');

    // Validación en el servidor (aunque el HTML tenga "required")
    if (mb_strlen($nombre) < 2) {
        $errores[] = 'Escribe tu nombre (al menos 2 caracteres).';
    }
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errores[] = 'Escribe un correo válido, por ejemplo nombre@correo.cl.';
    }
    if (mb_strlen($mensaje) < 10) {
        $errores[] = 'El mensaje debe tener al menos 10 caracteres.';
    }

    if (!$errores) {
        $db = new db($dbhost, $dbuser, $dbpass, $dbname, 'utf8mb4');
        $db->query('INSERT INTO vv_mensajes (m_nombre, m_correo, m_mensaje, m_fecha) VALUES (?, ?, ?, NOW())',
                   $nombre, $correo, $mensaje);
        $db->close();
        $enviado = true;
        $nombre = $correo = $mensaje = '';   // limpiar el formulario
    }
}

$pageTitle       = 'Contacto · Verde Vivo';
$pageDescription = 'Escríbenos o visítanos en Providencia.';
$paginaActiva    = 'contacto.php';
include_once 'header.php';
?>
    <section class="seccion">
      <div class="container">
        <div class="row g-4 g-lg-5">
          <div class="col-12 col-lg-7">
            <h1>Contacto</h1>
            <p class="lead">¿Buscas una planta o tienes una duda? Escríbenos y te respondemos en menos de 48 horas.</p>

<?php if ($enviado): ?>
            <div class="alert alert-success" role="status">¡Gracias! Recibimos tu mensaje y te responderemos pronto.</div>
<?php endif; ?>
<?php if ($errores): ?>
            <div class="alert alert-danger" role="alert">
              <p class="mb-1">Revisa estos datos:</p>
              <ul class="mb-0">
<?php foreach ($errores as $error): ?>
                <li><?= e($error) ?></li>
<?php endforeach; ?>
              </ul>
            </div>
<?php endif; ?>

            <form class="formulario" action="contacto.php" method="post">
              <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required minlength="2" autocomplete="name" value="<?= e($nombre) ?>">
              </div>
              <div class="mb-3">
                <label for="correo" class="form-label">Correo electrónico</label>
                <input type="email" id="correo" name="correo" class="form-control" required autocomplete="email" value="<?= e($correo) ?>">
              </div>
              <div class="mb-3">
                <label for="mensaje" class="form-label">Mensaje</label>
                <textarea id="mensaje" name="mensaje" class="form-control" rows="5" required minlength="10"><?= e($mensaje) ?></textarea>
              </div>
              <div class="d-grid d-sm-block">
                <button type="submit" class="btn btn-accion">Enviar mensaje</button>
              </div>
            </form>
          </div>
          <div class="col-12 col-lg-5">
            <h2>Visítanos</h2>
            <address>
              Calle Los Aromos 1234, Providencia<br>
              Lunes a sábado, 10:00 a 19:00<br>
              <a href="mailto:hola@verdevivo.example">hola@verdevivo.example</a>
            </address>
          </div>
        </div>
      </div>
    </section>
<?php include_once 'footer.php'; ?>
