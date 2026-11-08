<?php
/**
 * auth.php — Protege las páginas privadas.
 * Va en la PRIMERA línea de cada archivo del panel (también de los que solo procesan).
 */
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['u_id'])) {
    header('Location: index.php');
    exit;
}
