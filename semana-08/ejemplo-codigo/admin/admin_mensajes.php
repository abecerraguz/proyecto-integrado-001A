<?php
include_once 'auth.php';
include_once '../class/config.php';
include_once '../class/db.php';
include_once '../class/helpers.php';

$db = new db($dbhost, $dbuser, $dbpass, $dbname, 'utf8mb4');
$db->query('SELECT m_nombre, m_correo, m_mensaje, m_fecha FROM vv_mensajes ORDER BY m_fecha DESC');
$mensajes = $db->fetchAll();
$db->close();

$pageTitle     = 'Mensajes · Panel Verde Vivo';
$seccionActiva = 'mensajes';
include 'partes/admin-header.php';
?>
      <h1>Mensajes de contacto</h1>
<?php if (empty($mensajes)): ?>
      <p>No hay mensajes todavía.</p>
<?php else: ?>
      <div class="row g-3">
<?php foreach ($mensajes as $m): ?>
        <div class="col-12 col-lg-6">
          <article class="valor">
            <h2 class="h5 mb-1"><?= e($m['m_nombre']) ?></h2>
            <p class="mb-2"><a href="mailto:<?= e($m['m_correo']) ?>"><?= e($m['m_correo']) ?></a> · <?= e(date('d-m-Y H:i', strtotime($m['m_fecha']))) ?></p>
            <p class="mb-0"><?= nl2br(e($m['m_mensaje'])) ?></p>
          </article>
        </div>
<?php endforeach; ?>
      </div>
<?php endif; ?>
<?php include 'partes/admin-footer.php'; ?>
