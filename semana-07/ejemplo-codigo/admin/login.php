<?php
// login.php — Procesa el formulario de ingreso (POST)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

include_once '../class/config.php';
include_once '../class/db.php';

$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

if ($username === '' || $password === '') {
    header('Location: index.php?error=' . urlencode('Completa usuario y contraseña.'));
    exit;
}

$db = new db($dbhost, $dbuser, $dbpass, $dbname, 'utf8mb4');
$db->query('SELECT u_id, u_nombre, u_password FROM vv_usuarios WHERE u_username = ?', $username);
$usuario = $db->fetchArray();
$db->close();

// Un solo mensaje para usuario o contraseña incorrectos: no damos pistas
if (empty($usuario) || !password_verify($password, $usuario['u_password'])) {
    header('Location: index.php?error=' . urlencode('Usuario o contraseña incorrectos.'));
    exit;
}

session_regenerate_id(true);              // nuevo ID de sesión al ingresar
$_SESSION['u_id']     = (int)$usuario['u_id'];
$_SESSION['u_nombre'] = $usuario['u_nombre'];

header('Location: admin_list.php');
exit;
