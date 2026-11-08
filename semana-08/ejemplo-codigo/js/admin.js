/* ==========================================================
   Verde Vivo · admin.js (Semana 8)
   Interacciones del panel de administración.
   1. Confirmar antes de eliminar (modal de Bootstrap)
   2. Aviso de éxito como toast
   3. Vista previa de la imagen elegida
   (La validación en tiempo real viene de main.js: formularios con class="js-validar".)
   ========================================================== */

document.addEventListener('DOMContentLoaded', () => {

  /* ---------- 1. Confirmar antes de eliminar ---------- */
  const modalEl = document.querySelector('#modal-eliminar');
  if (modalEl) {
    const modal = new bootstrap.Modal(modalEl);
    let formPendiente = null;

    document.querySelectorAll('.form-eliminar').forEach((form) => {
      form.addEventListener('submit', (evento) => {
        evento.preventDefault();                      // detenemos el envío…
        formPendiente = form;
        document.querySelector('#nombre-eliminar').textContent = form.dataset.nombre;
        modal.show();                                 // …y preguntamos primero
      });
    });

    document.querySelector('#confirmar-eliminar').addEventListener('click', () => {
      formPendiente?.submit();                        // ahora sí se envía (POST)
    });
  }

  /* ---------- 2. Aviso de éxito como toast ---------- */
  const toastEl = document.querySelector('#toast-info');
  if (toastEl) {
    bootstrap.Toast.getOrCreateInstance(toastEl, { delay: 4000 }).show();
    // BOM: quitamos ?info= de la URL para que el aviso no vuelva a salir al recargar
    const url = new URL(window.location.href);
    url.searchParams.delete('info');
    history.replaceState(null, '', url);
  }

  /* ---------- 3. Vista previa de la imagen ---------- */
  const inputImagen = document.querySelector('#imagen');
  const vistaPrevia = document.querySelector('#vista-previa');
  if (inputImagen && vistaPrevia) {
    inputImagen.addEventListener('change', () => {
      vistaPrevia.replaceChildren();                   // borra la vista previa anterior
      const archivo = inputImagen.files[0];
      if (!archivo || !archivo.type.startsWith('image/')) return;

      const img = document.createElement('img');      // DOM: creamos la imagen
      img.src = URL.createObjectURL(archivo);          // muestra el archivo sin subirlo
      img.alt = 'Vista previa de la imagen elegida';
      img.className = 'vista-previa';
      vistaPrevia.append(img);
    });
  }
});
