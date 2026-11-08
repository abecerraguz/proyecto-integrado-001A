<?php
// partes/admin-header.php — Encabezado del panel. Cada página define $pageTitle y $seccionActiva.
$pageTitle     = $pageTitle ?? 'Panel · Verde Vivo';
$seccionActiva = $seccionActiva ?? '';
$info  = $_GET['info']  ?? '';
$error = $_GET['error'] ?? '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex">
  <title><?= e($pageTitle) ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
  <a class="saltar-contenido" href="#contenido">Saltar al contenido</a>
  <header class="encabezado">
    <nav class="navbar navbar-expand-md" aria-label="Navegación del panel">
      <div class="container">
        <a class="navbar-brand" href="admin_list.php">
          <img src="../img/logo.svg" alt="Panel de Verde Vivo" width="140" height="40">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu-panel"
                aria-controls="menu-panel" aria-expanded="false" aria-label="Abrir menú del panel">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menu-panel">
          <ul class="navbar-nav me-auto">
            <li class="nav-item"><a class="nav-link<?= $seccionActiva === 'plantas' ? ' active' : '' ?>" href="admin_list.php"<?= $seccionActiva === 'plantas' ? ' aria-current="page"' : '' ?>>Plantas</a></li>
            <li class="nav-item"><a class="nav-link<?= $seccionActiva === 'mensajes' ? ' active' : '' ?>" href="admin_mensajes.php"<?= $seccionActiva === 'mensajes' ? ' aria-current="page"' : '' ?>>Mensajes</a></li>
            <li class="nav-item"><a class="nav-link" href="../index.php">Ver sitio</a></li>
          </ul>
          <span class="navbar-text me-3">Hola, <?= e($_SESSION['u_nombre'] ?? '') ?></span>
          <a class="btn btn-outline-verde" href="logout.php">Cerrar sesión</a>
        </div>
      </div>
    </nav>
  </header>

  <main id="contenido" class="seccion">
    <div class="container">
<?php if ($info): ?>
      <!-- Aviso de éxito: admin.js lo muestra como toast. Sin JavaScript se ve la alerta. -->
      <noscript><div class="alert alert-success" role="status"><?= e($info) ?></div></noscript>
      <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="toast-info" class="toast" role="status" aria-live="polite" aria-atomic="true">
          <div class="d-flex">
            <div class="toast-body"><?= e($info) ?></div>
            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Cerrar aviso"></button>
          </div>
        </div>
      </div>
<?php endif; ?>
<?php if ($error): ?>
      <div class="alert alert-danger" role="alert"><?= e($error) ?></div>
<?php endif; ?>
