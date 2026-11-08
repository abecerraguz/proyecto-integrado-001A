<?php
include_once 'class/helpers.php';

// Página de contenido estático: usa el mismo header y footer que las páginas dinámicas
$pageTitle       = 'Nosotros · Verde Vivo';
$pageDescription = 'La historia de Verde Vivo, vivero artesanal en Providencia.';
$paginaActiva    = 'nosotros.php';
include_once 'header.php';
?>
    <section class="seccion">
      <div class="container">
        <div class="row g-4 align-items-center">
          <div class="col-12 col-md-6">
            <h1>Nosotros</h1>
            <p class="lead">Verde Vivo nació en 2019 en el patio de Camila Torres, en Providencia.</p>
            <p>Lo que partió como un pasatiempo se transformó en un vivero artesanal: criamos cada planta a mano, sin apuro, y te enseñamos a cuidarla para que te acompañe por años.</p>
          </div>
          <div class="col-12 col-md-6">
            <img src="img/nosotros.svg" class="img-fluid rounded" alt="" width="800" height="600">
          </div>
        </div>
        <h2 class="mt-5">Lo que nos mueve</h2>
        <div class="row g-3 g-lg-4">
          <div class="col-12 col-md-4"><div class="valor"><h3>Plantas sanas</h3><p>Solo vendemos plantas criadas y aclimatadas en nuestro vivero.</p></div></div>
          <div class="col-12 col-md-4"><div class="valor"><h3>Consejo honesto</h3><p>Te recomendamos la planta que calza con tu luz y tu tiempo.</p></div></div>
          <div class="col-12 col-md-4"><div class="valor"><h3>Cerca de ti</h3><p>Atendemos en persona y respondemos tus dudas por correo.</p></div></div>
        </div>
      </div>
    </section>
<?php include_once 'footer.php'; ?>
