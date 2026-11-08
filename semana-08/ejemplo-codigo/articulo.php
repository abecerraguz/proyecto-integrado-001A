<?php
include_once 'class/helpers.php';

// Página de contenido estático: usa el mismo header y footer que las páginas dinámicas
$pageTitle       = 'Cómo regar tus suculentas · Verde Vivo';
$pageDescription = 'El error más común con las suculentas es regarlas de más. Te contamos cómo saber cuándo tienen sed.';
$paginaActiva    = 'cuidados.php';
include_once 'header.php';
?>
    <div class="seccion">
      <div class="container">
        <div class="row">
          <!-- Offset: columna de lectura centrada sin columnas vacías -->
          <div class="col-12 col-lg-8 offset-lg-2">
            <nav aria-label="Ruta de navegación">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                <li class="breadcrumb-item"><a href="cuidados.php">Cuidados</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cómo regar tus suculentas</li>
              </ol>
            </nav>
            <article>
              <h1>Cómo regar tus suculentas</h1>
              <p class="lead">El error más común con las suculentas es regarlas de más. Te contamos cómo saber cuándo tienen sed.</p>
              <img src="img/articulos/riego-suculentas.svg" class="img-fluid rounded mb-4" alt="" width="800" height="500">
              <h2>1. Toca la tierra</h2>
              <p>Antes de regar, mete un dedo en la tierra. Si los primeros dos centímetros están secos, es momento de regar.</p>
              <h2>2. Riega en profundidad</h2>
              <p>Moja toda la tierra hasta que el agua salga por los agujeros de la maceta y luego deja que escurra.</p>
              <h2>3. Menos agua en invierno</h2>
              <p>Con el frío las suculentas crecen más lento: espacia el riego al doble de tiempo.</p>
              <p><a href="cuidados.php">← Volver a Cuidados</a></p>
            </article>
          </div>
        </div>
      </div>
    </div>
<?php include_once 'footer.php'; ?>
