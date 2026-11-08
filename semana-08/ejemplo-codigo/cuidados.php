<?php
include_once 'class/helpers.php';

// Página de contenido estático: usa el mismo header y footer que las páginas dinámicas
$pageTitle       = 'Cuidados · Verde Vivo';
$pageDescription = 'Consejos para regar, iluminar y trasplantar tus plantas.';
$paginaActiva    = 'cuidados.php';
include_once 'header.php';
?>
    <section class="seccion">
      <div class="container">
        <h1>Cuidados</h1>
        <p class="lead">Guías breves para que tus plantas crezcan sanas.</p>
        <div class="row g-3 g-lg-4">
          <div class="col-12 col-md-6 col-lg-4">
            <article class="tarjeta-articulo">
              <img src="img/articulos/riego-suculentas.svg" class="img-fluid" alt="" width="800" height="500" loading="lazy">
              <h2 class="tarjeta-articulo__titulo"><a href="articulo.php">Cómo regar tus suculentas</a></h2>
              <p>El error más común con las suculentas es regarlas de más. Te contamos cómo saber cuándo tienen sed.</p>
            </article>
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <article class="tarjeta-articulo">
              <img src="img/articulos/luz-interior.svg" class="img-fluid" alt="" width="800" height="500" loading="lazy">
              <h2 class="tarjeta-articulo__titulo"><a href="articulo.php">La luz ideal para tus plantas de interior</a></h2>
              <p>No todas las plantas necesitan sol directo. Aprende a leer la luz de cada rincón de tu casa.</p>
            </article>
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <article class="tarjeta-articulo">
              <img src="img/articulos/trasplante.svg" class="img-fluid" alt="" width="800" height="500" loading="lazy">
              <h2 class="tarjeta-articulo__titulo"><a href="articulo.php">Trasplantar sin estrés</a></h2>
              <p>Paso a paso para cambiar tu planta a una maceta más grande sin dañar sus raíces.</p>
            </article>
          </div>
        </div>
      </div>
    </section>
<?php include_once 'footer.php'; ?>
