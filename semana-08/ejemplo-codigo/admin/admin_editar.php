<?php
include_once 'auth.php';
include_once '../class/config.php';
include_once '../class/db.php';
include_once '../class/helpers.php';

// El id llega por GET: solo indica QUÉ planta editar
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$db = new db($dbhost, $dbuser, $dbpass, $dbname, 'utf8mb4');
$db->query('SELECT * FROM vv_plantas WHERE p_id = ?', $id);
$planta = $db->fetchArray();
$db->query('SELECT c_id, c_nombre FROM vv_categorias ORDER BY c_nombre');
$categorias = $db->fetchAll();
$db->close();

if (empty($planta)) {
    header('Location: admin_list.php?error=' . urlencode('La planta no existe.'));
    exit;
}

$accion     = 'editar.php';
$textoBoton = 'Guardar cambios';

$pageTitle     = 'Editar ' . $planta['p_nombre'] . ' · Panel Verde Vivo';
$seccionActiva = 'plantas';
include 'partes/admin-header.php';
?>
      <h1>Editar planta</h1>
      <p>Imagen actual:</p>
      <img src="../img/plantas/<?= e($planta['p_imagen'] ?: 'sin-imagen.svg') ?>" alt="Imagen actual de <?= e($planta['p_nombre']) ?>" width="160" height="120" class="rounded mb-4">
<?php include 'partes/form-planta.php'; ?>
<?php include 'partes/admin-footer.php'; ?>
