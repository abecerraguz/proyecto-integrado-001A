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

        <!-- Buscador sin recargar (fetch a api/buscar.php) -->
        <div class="buscador mb-4">
          <label for="buscador" class="form-label">Buscar planta por nombre</label>
          <input type="search" id="buscador" class="form-control" autocomplete="off" aria-describedby="ayuda-buscador">
          <p id="ayuda-buscador" class="form-text">Escribe al menos 2 letras.</p>
          <ul id="resultados" class="buscador__resultados list-unstyled" aria-live="polite"></ul>
        </div>

        <nav aria-label="Filtrar por categoría" class="filtro-categorias">
          <ul class="lista-categorias">
            <li><a class="chip chip--enlace" href="plantas.php" data-filtro="todas"<?= $slug === '' ? ' aria-current="page"' : '' ?>>Todas</a></li>
<?php foreach ($categorias as $categoria): ?>
            <li><a class="chip chip--enlace" href="plantas.php?categoria=<?= e($categoria['c_slug']) ?>" data-filtro="<?= e($categoria['c_slug']) ?>"<?= $slug === $categoria['c_slug'] ? ' aria-current="page"' : '' ?>><?= e($categoria['c_nombre']) ?></a></li>
<?php endforeach; ?>
          </ul>
        </nav>

<?php if (empty($plantas)): ?>
        <p>No hay plantas en esta categoría por ahora.</p>
<?php else: ?>
        <!-- data-filtrable: el filtro con JavaScript solo se activa si están todas las plantas cargadas -->
        <div class="row g-3 g-lg-4" id="catalogo"<?= $slug === '' ? ' data-filtrable="si"' : '' ?>>
<?php foreach ($plantas as $planta): ?>
          <div class="col-12 col-sm-6 col-lg-3 tarjeta" data-categoria="<?= e($planta['c_slug'] ?? '') ?>">
            <?php $nivelTitulo = 'h2'; include 'partes/tarjeta-planta.php'; ?>
          </div>
<?php endforeach; ?>
        </div>
        <p id="sin-resultados" class="mt-3" hidden>No hay plantas en esta categoría por ahora.</p>
<?php endif; ?>
      </div>
    </section>
<?php include_once 'footer.php'; ?>
