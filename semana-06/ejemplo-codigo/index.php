<?php
include_once 'class/config.php';
include_once 'class/db.php';
include_once 'class/helpers.php';

$db = new db($dbhost, $dbuser, $dbpass, $dbname, 'utf8mb4');

// Plantas destacadas (p_destacada = 1)
$db->query('SELECT p.p_id, p.p_nombre, p.p_precio, p.p_imagen, c.c_nombre
            FROM vv_plantas p
            LEFT JOIN vv_categorias c ON p.p_categoria_id = c.c_id
            WHERE p.p_destacada = 1
            ORDER BY p.p_nombre
            LIMIT 3');
$destacadas = $db->fetchAll();

// Categorías para los accesos rápidos
$db->query('SELECT c_nombre, c_slug FROM vv_categorias ORDER BY c_id');
$categorias = $db->fetchAll();
$db->close();

$pageTitle    = 'Verde Vivo · Vivero artesanal en Providencia';
$paginaActiva = 'index.php';
include_once 'header.php';
?>
    <section class="hero">
      <div class="container">
        <div class="row align-items-center g-4">
          <div class="col-12 col-lg-6 text-center text-lg-start">
            <h1 class="hero__titulo">Plantas que llenan de vida tu casa</h1>
            <p class="hero__bajada">Elige tu planta, aprende a cuidarla y visítanos en Providencia.</p>
            <a href="plantas.php" class="btn btn-accion btn-lg">Ver plantas</a>
          </div>
          <div class="col-12 col-lg-6">
            <img src="img/hero.svg" class="img-fluid hero__imagen" alt="" width="1600" height="900">
          </div>
        </div>
      </div>
    </section>

    <section class="seccion" aria-labelledby="titulo-categorias">
      <div class="container">
        <h2 id="titulo-categorias">¿Qué buscas?</h2>
        <ul class="lista-categorias">
<?php foreach ($categorias as $categoria): ?>
          <li><a class="chip chip--enlace" href="plantas.php?categoria=<?= e($categoria['c_slug']) ?>"><?= e($categoria['c_nombre']) ?></a></li>
<?php endforeach; ?>
        </ul>
      </div>
    </section>

    <section class="seccion seccion--suave" aria-labelledby="titulo-destacadas">
      <div class="container">
        <h2 id="titulo-destacadas">Plantas destacadas</h2>
        <div class="row g-3 g-lg-4">
<?php foreach ($destacadas as $planta): ?>
          <div class="col-12 col-md-4">
            <?php $nivelTitulo = 'h3'; include 'partes/tarjeta-planta.php'; ?>
          </div>
<?php endforeach; ?>
        </div>
        <p class="text-center mt-4"><a href="plantas.php" class="btn btn-outline-verde">Ver todo el catálogo</a></p>
      </div>
    </section>

    <section class="seccion" aria-labelledby="titulo-cuidados">
      <div class="container">
        <h2 id="titulo-cuidados">Aprende a cuidarlas</h2>
        <div class="row g-3 g-lg-4">
          <div class="col-12 col-md-4">
            <article class="tarjeta-articulo">
              <img src="img/articulos/riego-suculentas.svg" class="img-fluid" alt="" width="800" height="500" loading="lazy">
              <h3 class="tarjeta-articulo__titulo"><a href="articulo.php">Cómo regar tus suculentas</a></h3>
              <p>El error más común con las suculentas es regarlas de más. Te contamos cómo saber cuándo tienen sed.</p>
            </article>
          </div>
          <div class="col-12 col-md-4">
            <article class="tarjeta-articulo">
              <img src="img/articulos/luz-interior.svg" class="img-fluid" alt="" width="800" height="500" loading="lazy">
              <h3 class="tarjeta-articulo__titulo"><a href="articulo.php">La luz ideal para tus plantas de interior</a></h3>
              <p>No todas las plantas necesitan sol directo. Aprende a leer la luz de cada rincón de tu casa.</p>
            </article>
          </div>
          <div class="col-12 col-md-4">
            <article class="tarjeta-articulo">
              <img src="img/articulos/trasplante.svg" class="img-fluid" alt="" width="800" height="500" loading="lazy">
              <h3 class="tarjeta-articulo__titulo"><a href="articulo.php">Trasplantar sin estrés</a></h3>
              <p>Paso a paso para cambiar tu planta a una maceta más grande sin dañar sus raíces.</p>
            </article>
          </div>
        </div>
      </div>
    </section>

    <section class="seccion seccion--suave" aria-labelledby="titulo-nosotros">
      <div class="container">
        <div class="row align-items-center g-4">
          <div class="col-12 col-md-6">
            <img src="img/nosotros.svg" class="img-fluid rounded" alt="" width="800" height="600" loading="lazy">
          </div>
          <div class="col-12 col-md-6">
            <h2 id="titulo-nosotros">Un vivero hecho a mano</h2>
            <p>Camila Torres abrió Verde Vivo para compartir plantas sanas y el conocimiento para cuidarlas. Cada planta se cría en nuestro vivero de Providencia.</p>
            <a href="nosotros.php" class="btn btn-outline-verde">Conócenos</a>
          </div>
        </div>
      </div>
    </section>
<?php include_once 'footer.php'; ?>
