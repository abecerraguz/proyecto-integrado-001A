<?php
// partes/form-planta.php — Formulario compartido por "agregar" y "editar".
// Espera: $accion (archivo que procesa), $planta (valores actuales o vacíos), $categorias, $textoBoton.
$v = fn($campo) => e($planta[$campo] ?? '');
?>
      <form action="<?= $accion ?>" method="post" enctype="multipart/form-data" class="formulario">
<?php if (!empty($planta['p_id'])): ?>
        <input type="hidden" name="id" value="<?= (int)$planta['p_id'] ?>">
<?php endif; ?>
        <div class="row g-3">
          <div class="col-12 col-md-6">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="form-control" required minlength="2" value="<?= $v('p_nombre') ?>">
          </div>
          <div class="col-12 col-md-6">
            <label for="cientifico" class="form-label">Nombre científico <span class="text-body-secondary">(opcional)</span></label>
            <input type="text" id="cientifico" name="cientifico" class="form-control" value="<?= $v('p_cientifico') ?>">
          </div>
          <div class="col-12">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea id="descripcion" name="descripcion" class="form-control" rows="3" required minlength="10"><?= $v('p_descripcion') ?></textarea>
          </div>
          <div class="col-12 col-md-6">
            <label for="luz" class="form-label">Luz</label>
            <input type="text" id="luz" name="luz" class="form-control" value="<?= $v('p_luz') ?>">
          </div>
          <div class="col-12 col-md-6">
            <label for="riego" class="form-label">Riego</label>
            <input type="text" id="riego" name="riego" class="form-control" value="<?= $v('p_riego') ?>">
          </div>
          <div class="col-12 col-md-6">
            <label for="categoria" class="form-label">Categoría</label>
            <select id="categoria" name="categoria" class="form-select" required>
              <option value="">Elige una categoría</option>
<?php foreach ($categorias as $c): ?>
              <option value="<?= (int)$c['c_id'] ?>"<?= (int)($planta['p_categoria_id'] ?? 0) === (int)$c['c_id'] ? ' selected' : '' ?>><?= e($c['c_nombre']) ?></option>
<?php endforeach; ?>
            </select>
          </div>
          <div class="col-12 col-md-6">
            <label for="precio" class="form-label">Precio (CLP)</label>
            <input type="number" id="precio" name="precio" class="form-control" required min="0" step="10" value="<?= $v('p_precio') ?>">
          </div>
          <div class="col-12">
            <label for="imagen" class="form-label">Imagen <span class="text-body-secondary">(JPG, PNG o WebP, máximo 2 MB<?= !empty($planta['p_id']) ? '; déjala vacía para mantener la actual' : '' ?>)</span></label>
            <input type="file" id="imagen" name="imagen" class="form-control" accept="image/jpeg,image/png,image/webp">
          </div>
          <div class="col-12">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="destacada" name="destacada" value="1"<?= !empty($planta['p_destacada']) ? ' checked' : '' ?>>
              <label class="form-check-label" for="destacada">Mostrar en «Plantas destacadas» de la portada</label>
            </div>
          </div>
        </div>
        <div class="d-flex flex-wrap gap-2 mt-4">
          <button type="submit" class="btn btn-accion"><?= e($textoBoton) ?></button>
          <a href="admin_list.php" class="btn btn-outline-verde">Cancelar</a>
        </div>
      </form>
