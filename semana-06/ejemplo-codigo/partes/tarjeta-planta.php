<?php
// partes/tarjeta-planta.php — Tarjeta reutilizable.
// Espera: $planta (fila de vv_plantas con c_nombre) y $nivelTitulo ('h2' o 'h3').
$nivelTitulo = $nivelTitulo ?? 'h3';
?>
<article class="tarjeta-planta card h-100">
  <img src="img/plantas/<?= e($planta['p_imagen'] ?: 'sin-imagen.svg') ?>" class="card-img-top"
       alt="Ilustración de <?= e(mb_strtolower($planta['p_nombre'])) ?> en maceta" width="600" height="450" loading="lazy">
  <div class="card-body">
    <p class="chip"><?= e($planta['c_nombre'] ?? 'Sin categoría') ?></p>
    <<?= $nivelTitulo ?> class="tarjeta-planta__titulo"><?= e($planta['p_nombre']) ?></<?= $nivelTitulo ?>>
    <p class="tarjeta-planta__precio">Desde <?= precio($planta['p_precio']) ?></p>
    <a href="planta.php?id=<?= (int)$planta['p_id'] ?>" class="btn btn-outline-verde stretched-link">Ver detalle<span class="visually-hidden"> de <?= e($planta['p_nombre']) ?></span></a>
  </div>
</article>
