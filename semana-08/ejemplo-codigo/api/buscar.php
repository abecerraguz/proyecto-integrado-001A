<?php
/**
 * api/buscar.php — Responde en JSON las plantas cuyo nombre contiene el texto buscado.
 * Lo usa el buscador de plantas.php con fetch(), sin recargar la página.
 * Ejemplo: api/buscar.php?q=mon  →  [{"p_id":1,"p_nombre":"Monstera deliciosa",...}]
 */
include_once '../class/config.php';
include_once '../class/db.php';

header('Content-Type: application/json; charset=utf-8');

$texto = trim($_GET['q'] ?? '');
if (mb_strlen($texto) < 2) {
    echo '[]';
    exit;
}

$db = new db($dbhost, $dbuser, $dbpass, $dbname, 'utf8mb4');
$db->query('SELECT p_id, p_nombre, p_precio FROM vv_plantas WHERE p_nombre LIKE ? ORDER BY p_nombre LIMIT 10',
           '%' . $texto . '%');
$plantas = $db->fetchAll();
$db->close();

echo json_encode($plantas, JSON_UNESCAPED_UNICODE);
