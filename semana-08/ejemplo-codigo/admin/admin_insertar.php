<?php
include_once 'auth.php';
include_once '../class/config.php';
include_once '../class/db.php';
include_once '../class/helpers.php';

$db = new db($dbhost, $dbuser, $dbpass, $dbname, 'utf8mb4');
$db->query('SELECT c_id, c_nombre FROM vv_categorias ORDER BY c_nombre');
$categorias = $db->fetchAll();
$db->close();

$accion     = 'insertar.php';
$planta     = [];
$textoBoton = 'Guardar planta';

$pageTitle     = 'Agregar planta · Panel Verde Vivo';
$seccionActiva = 'plantas';
include 'partes/admin-header.php';
?>
      <h1>Agregar planta</h1>
<?php include 'partes/form-planta.php'; ?>
<?php include 'partes/admin-footer.php'; ?>
