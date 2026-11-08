<?php
include_once 'auth.php';
include_once '../class/config.php';
include_once '../class/db.php';
include_once 'partes/funciones.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: admin_list.php');
    exit;
}

[$datos, $errores] = leerPlanta();
if ($errores) {
    volver('admin_insertar.php', 'error', implode(' ', $errores));
}

try {
    $imagen = subirImagen('imagen', __DIR__ . '/../img/plantas');
} catch (RuntimeException $ex) {
    volver('admin_insertar.php', 'error', $ex->getMessage());
}

$db = new db($dbhost, $dbuser, $dbpass, $dbname, 'utf8mb4');
$db->query('INSERT INTO vv_plantas (p_nombre, p_cientifico, p_descripcion, p_luz, p_riego, p_precio, p_imagen, p_categoria_id, p_destacada)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)',
           $datos['nombre'], $datos['cientifico'], $datos['descripcion'], $datos['luz'], $datos['riego'],
           $datos['precio'], $imagen, $datos['categoria'], $datos['destacada']);
$db->close();

volver('admin_list.php', 'info', 'Planta «' . $datos['nombre'] . '» agregada.');
