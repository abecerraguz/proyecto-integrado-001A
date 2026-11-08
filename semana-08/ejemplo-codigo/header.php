<?php
// header.php — Encabezado común. Antes de incluirlo, cada página puede definir:
//   $pageTitle, $pageDescription y $paginaActiva (nombre del archivo del menú).
$pageTitle       = $pageTitle       ?? 'Verde Vivo · Vivero artesanal en Providencia';
$pageDescription = $pageDescription ?? 'Plantas de interior, suculentas y aromáticas, con consejos de cuidado.';
$paginaActiva    = $paginaActiva    ?? '';

$menu = [
    'index.php'    => 'Inicio',
    'plantas.php'  => 'Plantas',
    'cuidados.php' => 'Cuidados',
    'nosotros.php' => 'Nosotros',
    'contacto.php' => 'Contacto',
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= e($pageTitle) ?></title>
  <meta name="description" content="<?= e($pageDescription) ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&amp;family=Playfair+Display:wght@600;700&amp;display=swap">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
  <a class="saltar-contenido" href="#contenido">Saltar al contenido</a>

  <header class="encabezado">
    <nav class="navbar navbar-expand-lg" aria-label="Navegación principal">
      <div class="container">
        <a class="navbar-brand" href="index.php">
          <img src="img/logo.svg" alt="Verde Vivo, ir al inicio" width="140" height="40">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu-principal"
                aria-controls="menu-principal" aria-expanded="false" aria-label="Abrir menú">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menu-principal">
          <ul class="navbar-nav ms-auto">
<?php foreach ($menu as $archivo => $texto): ?>
            <li class="nav-item">
              <a class="nav-link<?= $archivo === $paginaActiva ? ' active' : '' ?>" href="<?= $archivo ?>"<?= $archivo === $paginaActiva ? ' aria-current="page"' : '' ?>><?= $texto ?></a>
            </li>
<?php endforeach; ?>
          </ul>
          <a class="btn btn-accion" href="contacto.php">Escríbenos</a>
          <!-- Menú de accesibilidad (Semana 8) -->
          <div class="accesibilidad" role="group" aria-label="Opciones de accesibilidad">
            <button type="button" id="btn-tema" class="btn btn-sm btn-outline-verde" aria-pressed="false">Modo oscuro</button>
            <button type="button" id="btn-texto-mas" class="btn btn-sm btn-outline-verde" aria-label="Aumentar tamaño del texto">A+</button>
            <button type="button" id="btn-texto-menos" class="btn btn-sm btn-outline-verde" aria-label="Disminuir tamaño del texto">A−</button>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <main id="contenido">
