<?php
include_once 'auth.php';
include_once '../class/config.php';
include_once '../class/db.php';
include_once '../class/helpers.php';

$db = new db($dbhost, $dbuser, $dbpass, $dbname, 'utf8mb4');
$db->query('SELECT p.p_id, p.p_nombre, p.p_precio, p.p_imagen, p.p_destacada, c.c_nombre
            FROM vv_plantas p
            LEFT JOIN vv_categorias c ON p.p_categoria_id = c.c_id
            ORDER BY p.p_nombre');
$plantas = $db->fetchAll();
$db->close();

$pageTitle     = 'Plantas · Panel Verde Vivo';
$seccionActiva = 'plantas';
include 'partes/admin-header.php';
?>
      <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <h1 class="mb-0">Plantas</h1>
        <a href="admin_insertar.php" class="btn btn-accion">+ Agregar planta</a>
      </div>

<?php if (empty($plantas)): ?>
      <p>Aún no hay plantas. Agrega la primera.</p>
<?php else: ?>
      <div class="table-responsive">
        <table class="table align-middle tabla-panel">
          <caption>Plantas del catálogo (<?= count($plantas) ?>)</caption>
          <thead>
            <tr>
              <th scope="col">Imagen</th>
              <th scope="col">Planta</th>
              <th scope="col">Categoría</th>
              <th scope="col">Precio</th>
              <th scope="col">Destacada</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>
<?php foreach ($plantas as $p): ?>
            <tr>
              <td><img src="../img/plantas/<?= e($p['p_imagen'] ?: 'sin-imagen.svg') ?>" alt="" width="64" height="48" class="rounded"></td>
              <td><?= e($p['p_nombre']) ?></td>
              <td><?= e($p['c_nombre'] ?? '—') ?></td>
              <td><?= precio($p['p_precio']) ?></td>
              <td><?= $p['p_destacada'] ? 'Sí' : 'No' ?></td>
              <td class="text-nowrap">
                <a href="admin_editar.php?id=<?= (int)$p['p_id'] ?>" class="btn btn-sm btn-outline-verde">Editar<span class="visually-hidden"> <?= e($p['p_nombre']) ?></span></a>
                <form action="eliminar.php" method="post" class="d-inline form-eliminar" data-nombre="<?= e($p['p_nombre']) ?>">
                  <input type="hidden" name="id" value="<?= (int)$p['p_id'] ?>">
                  <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar<span class="visually-hidden"> <?= e($p['p_nombre']) ?></span></button>
                </form>
              </td>
            </tr>
<?php endforeach; ?>
          </tbody>
        </table>
      </div>
<?php endif; ?>
<?php include 'partes/admin-footer.php'; ?>
