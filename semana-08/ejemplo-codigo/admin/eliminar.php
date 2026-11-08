<?php
include_once 'auth.php';
include_once '../class/config.php';
include_once '../class/db.php';
include_once 'partes/funciones.php';

// Eliminar cambia datos: solo se acepta por POST, nunca con un enlace GET
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: admin_list.php');
    exit;
}

$id = (int)($_POST['id'] ?? 0);
if ($id <= 0) {
    volver('admin_list.php', 'error', 'Planta no válida.');
}

$db = new db($dbhost, $dbuser, $dbpass, $dbname, 'utf8mb4');
$db->query('SELECT p_nombre, p_imagen FROM vv_plantas WHERE p_id = ?', $id);
$planta = $db->fetchArray();

if (empty($planta)) {
    $db->close();
    volver('admin_list.php', 'error', 'La planta ya no existe.');
}

$db->query('DELETE FROM vv_plantas WHERE p_id = ?', $id);
$db->close();

// Borra la imagen solo si fue subida desde el panel (nombre aleatorio), no las ilustraciones de ejemplo
if (preg_match('/^[a-f0-9]{16}\.(jpg|png|webp)$/', (string)$planta['p_imagen'])) {
    $ruta = __DIR__ . '/../img/plantas/' . $planta['p_imagen'];
    if (is_file($ruta)) {
        unlink($ruta);
    }
}

volver('admin_list.php', 'info', 'Planta «' . $planta['p_nombre'] . '» eliminada.');
