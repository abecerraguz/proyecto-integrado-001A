<?php
include_once 'auth.php';
include_once '../class/config.php';
include_once '../class/db.php';
include_once 'partes/funciones.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: admin_list.php');
    exit;
}

$id = (int)($_POST['id'] ?? 0);
[$datos, $errores] = leerPlanta();
if ($id <= 0) {
    volver('admin_list.php', 'error', 'Planta no válida.');
}
if ($errores) {
    volver('admin_editar.php?id=' . $id, 'error', implode(' ', $errores));
}

try {
    $imagenNueva = subirImagen('imagen', __DIR__ . '/../img/plantas');
} catch (RuntimeException $ex) {
    volver('admin_editar.php?id=' . $id, 'error', $ex->getMessage());
}

$db = new db($dbhost, $dbuser, $dbpass, $dbname, 'utf8mb4');
// ¡Siempre con WHERE! Sin él se modificarían TODAS las plantas.
$db->query('UPDATE vv_plantas
            SET p_nombre = ?, p_cientifico = ?, p_descripcion = ?, p_luz = ?, p_riego = ?,
                p_precio = ?, p_categoria_id = ?, p_destacada = ?
            WHERE p_id = ?',
           $datos['nombre'], $datos['cientifico'], $datos['descripcion'], $datos['luz'], $datos['riego'],
           $datos['precio'], $datos['categoria'], $datos['destacada'], $id);

// La imagen solo se cambia si se subió una nueva
if ($imagenNueva !== null) {
    $db->query('UPDATE vv_plantas SET p_imagen = ? WHERE p_id = ?', $imagenNueva, $id);
}
$db->close();

volver('admin_list.php', 'info', 'Cambios guardados en «' . $datos['nombre'] . '».');
