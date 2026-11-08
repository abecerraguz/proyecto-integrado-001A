<?php
include_once 'class/config.php';
include_once 'class/db.php';
include_once 'class/helpers.php';

// El id llega por la URL: planta.php?id=1. (int) asegura que sea un número.
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
    header('Location: plantas.php');
    exit;
}

$db = new db($dbhost, $dbuser, $dbpass, $dbname, 'utf8mb4');
$db->query('SELECT p.p_nombre, p.p_cientifico, p.p_descripcion, p.p_luz, p.p_riego, p.p_precio, p.p_imagen, c.c_nombre
            FROM vv_plantas p
            LEFT JOIN vv_categorias c ON p.p_categoria_id = c.c_id
            WHERE p.p_id = ?', $id);
$planta = $db->fetchArray();
$db->close();

// Si no existe, volvemos al catálogo
if (empty($planta)) {
    header('Location: plantas.php');
    exit;
}

$pageTitle       = $planta['p_nombre'] . ' · Verde Vivo';
$pageDescription = $planta['p_nombre'] . ': descripción, precio referencial y cuidados.';
$paginaActiva    = 'plantas.php';
include_once 'header.php';
?>
    <section class="seccion">
      <div class="container">
        <nav aria-label="Ruta de navegación">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
            <li class="breadcrumb-item"><a href="plantas.php">Plantas</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= e($planta['p_nombre']) ?></li>
          </ol>
        </nav>
        <div class="row g-4 align-items-start">
          <div class="col-12 col-lg-6 order-lg-2">
            <img src="img/plantas/<?= e($planta['p_imagen'] ?: 'sin-imagen.svg') ?>" class="img-fluid rounded"
                 alt="Ilustración de <?= e(mb_strtolower($planta['p_nombre'])) ?> en maceta" width="600" height="450">
          </div>
          <div class="col-12 col-lg-6 order-lg-1">
            <p class="chip"><?= e($planta['c_nombre'] ?? 'Sin categoría') ?></p>
            <h1><?= e($planta['p_nombre']) ?></h1>
<?php if ($planta['p_cientifico']): ?>
            <p class="nombre-cientifico"><i><?= e($planta['p_cientifico']) ?></i></p>
<?php endif; ?>
            <p class="detalle-planta__precio">Desde <?= precio($planta['p_precio']) ?></p>
            <p><?= e($planta['p_descripcion']) ?></p>
            <h2 class="h4">Cuidados básicos</h2>
            <div class="row g-3 cuidados">
              <div class="col-6">
                <div class="cuidados__item"><p class="cuidados__dato">Luz</p><p><?= e($planta['p_luz'] ?: 'Consúltanos') ?></p></div>
              </div>
              <div class="col-6">
                <div class="cuidados__item"><p class="cuidados__dato">Riego</p><p><?= e($planta['p_riego'] ?: 'Consúltanos') ?></p></div>
              </div>
            </div>
            <a href="contacto.php" class="btn btn-accion mt-3">Consultar por esta planta</a>
          </div>
        </div>
      </div>
    </section>
<?php include_once 'footer.php'; ?>
