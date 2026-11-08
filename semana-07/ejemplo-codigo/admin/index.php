<?php
// index.php — Formulario de ingreso al panel
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Si ya ingresó, va directo al listado
if (isset($_SESSION['u_id'])) {
    header('Location: admin_list.php');
    exit;
}
include_once '../class/helpers.php';
$error = $_GET['error'] ?? '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex">
  <title>Ingresar · Panel Verde Vivo</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/estilos.css">
</head>
<body class="panel-login">
  <main class="container py-5">
    <div class="row">
      <div class="col-12 col-sm-10 col-md-6 col-lg-4 offset-sm-1 offset-md-3 offset-lg-4">
        <div class="formulario">
          <img src="../img/logo.svg" alt="Verde Vivo" width="140" height="40" class="mb-3">
          <h1 class="h3 mb-4">Ingresar al panel</h1>
<?php if ($error): ?>
          <div class="alert alert-danger" role="alert"><?= e($error) ?></div>
<?php endif; ?>
          <form action="login.php" method="post">
            <div class="mb-3">
              <label for="username" class="form-label">Usuario</label>
              <input type="text" id="username" name="username" class="form-control" required autocomplete="username">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Contraseña</label>
              <input type="password" id="password" name="password" class="form-control" required autocomplete="current-password">
            </div>
            <div class="d-grid">
              <button type="submit" class="btn btn-accion">Ingresar</button>
            </div>
          </form>
          <p class="mt-3 mb-0"><a href="../index.php">← Volver al sitio</a></p>
        </div>
      </div>
    </div>
  </main>
</body>
</html>
