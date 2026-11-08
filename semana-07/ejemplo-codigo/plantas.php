<?php
include_once 'class/config.php';
include_once 'class/db.php';
include_once 'class/helpers.php';

// Filtro opcional por categoría: plantas.php?categoria=suculentas
$slug = trim($_GET['categoria'] ?? '');

$db = new db($dbhost, $dbuser, $dbpass, $dbname, 'utf8mb4');

$db->query('SELECT c_nombre, c_slug FROM vv_categorias ORDER BY c_id');
$categorias = $db->fetchAll();

if ($slug !== '') {
    // Consulta preparada: el texto de la URL nunca se mezcla con el SQL
    $db->query('SELECT p.p_id, p.p_nombre, p.p_precio, p.p_imagen, c.c_nombre, c.c_slug
                FROM vv_plantas p
                JOIN vv_categorias c ON p.p_categoria_id = c.c_id
                WHERE c.c_slug = ?
                ORDER BY p.p_nombre', $slug);
} else {
    $db->query('SELECT p.p_id, p.p_nombre, p.p_precio, p.p_imagen, c.c_nombre, c.c_slug
                FROM vv_plantas p
                LEFT JOIN vv_categorias c ON p.p_categoria_id = c.c_id
                ORDER BY p.p_nombre');
}
$plantas = $db->fetchAll();
$db->close();

$pageTitle       = 'Plantas · Verde Vivo';
$pageDescription = 'Catálogo de plantas de interior, suculentas, aromáticas y de exterior.';
$paginaActiva    = 'plantas.php';
include_once 'header.php';
?>
    <section class="seccion">
      <div class="container">
        <h1>Nuestras plantas</h1>
        <p class="lead">Precios referenciales. Escríbenos para consultar disponibilidad.</p>

        <nav aria-label="Filtrar por categoría">
          <ul class="lista-categorias">
            <li><a class="chip chip--enlace" href="plantas.php"<?= $slug === '' ? ' aria-current="page"' : '' ?>>Todas</a></li>
<?php foreach ($categorias as $categoria): ?>
            <li><a class="chip chip--enlace" href="plantas.php?categoria=<?= e($categoria['c_slug']) ?>"<?= $slug === $categoria['c_slug'] ? ' aria-current="page"' : '' ?>><?= e($categoria['c_nombre']) ?></a></li>
<?php endforeach; ?>
          </ul>
        </nav>

<?php if (empty($plantas)): ?>
        <p>No hay plantas en esta categoría por ahora.</p>
<?php else: ?>
        <div class="row g-3 g-lg-4">
<?php foreach ($plantas as $planta): ?>
          <div class="col-12 col-sm-6 col-lg-3">
            <?php $nivelTitulo = 'h2'; include 'partes/tarjeta-planta.php'; ?>
          </div>
<?php endforeach; ?>
        </div>
<?php endif; ?>
      </div>
    </section>
<?php include_once 'footer.php'; ?>
