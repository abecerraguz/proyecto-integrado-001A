    </div>
  </main>

  <!-- Modal para confirmar antes de eliminar (lo abre admin.js) -->
  <div class="modal fade" id="modal-eliminar" tabindex="-1" aria-labelledby="titulo-modal-eliminar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title h5" id="titulo-modal-eliminar">¿Eliminar planta?</h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          Vas a eliminar <strong id="nombre-eliminar"></strong> del catálogo. Esta acción no se puede deshacer.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-verde" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-danger" id="confirmar-eliminar">Sí, eliminar</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-4.0.0.min.js"></script>
  <script src="../js/main.js"></script>
  <script src="../js/admin.js"></script>
</body>
</html>
