/* ==========================================================
   Verde Vivo · main.js (Semana 8)
   Interacciones del sitio público.
   1. Menú de accesibilidad: modo oscuro y tamaño del texto
   2. Validación de formularios en tiempo real
   3. Filtro del catálogo sin recargar
   4. Buscador con fetch (actualiza parte de la página)
   5. Botón «Volver arriba» al desplazarse (jQuery)
   ========================================================== */

document.addEventListener('DOMContentLoaded', () => {

  /* ---------- 1. Menú de accesibilidad ---------- */

  // localStorage (BOM) recuerda las preferencias. Va en try porque algunos
  // navegadores lo bloquean en modo privado.
  const leer = (clave) => { try { return localStorage.getItem(clave); } catch (e) { return null; } };
  const guardar = (clave, valor) => { try { localStorage.setItem(clave, valor); } catch (e) { /* sin almacenamiento */ } };

  const btnTema = document.querySelector('#btn-tema');

  function aplicarTema(oscuro) {
    document.body.classList.toggle('tema-oscuro', oscuro);
    // Bootstrap 5.3 adapta sus componentes (tarjetas, formularios) con data-bs-theme
    document.documentElement.setAttribute('data-bs-theme', oscuro ? 'dark' : 'light');
    if (btnTema) {
      btnTema.setAttribute('aria-pressed', String(oscuro));
      btnTema.textContent = oscuro ? 'Modo claro' : 'Modo oscuro';
    }
  }

  aplicarTema(leer('vv-tema') === 'oscuro');

  btnTema?.addEventListener('click', () => {
    const oscuro = !document.body.classList.contains('tema-oscuro');
    aplicarTema(oscuro);
    guardar('vv-tema', oscuro ? 'oscuro' : 'claro');
  });

  // Tamaño del texto: cambia el font-size de <html>; todo lo que usa rem se ajusta
  const raiz = document.documentElement;
  const TAMANO_MIN = 14;
  const TAMANO_MAX = 22;

  function aplicarTexto(px) {
    const tamano = Math.min(TAMANO_MAX, Math.max(TAMANO_MIN, px));
    raiz.style.fontSize = tamano + 'px';
    guardar('vv-texto', String(tamano));
  }

  const textoGuardado = parseFloat(leer('vv-texto'));
  if (textoGuardado) {
    aplicarTexto(textoGuardado);
  }

  const tamanoActual = () => parseFloat(getComputedStyle(raiz).fontSize);
  document.querySelector('#btn-texto-mas')?.addEventListener('click', () => aplicarTexto(tamanoActual() + 2));
  document.querySelector('#btn-texto-menos')?.addEventListener('click', () => aplicarTexto(tamanoActual() - 2));


  /* ---------- 2. Validación de formularios en tiempo real ---------- */

  document.querySelectorAll('form.js-validar').forEach((form) => {
    const campos = form.querySelectorAll('input:not([type="hidden"]), textarea, select');

    // Si la persona está presionando «Enviar», no validamos al salir del campo:
    // el mensaje de error movería el botón y el clic se perdería. Lo valida el submit.
    let presionandoEnviar = false;
    form.addEventListener('pointerdown', (evento) => {
      presionandoEnviar = Boolean(evento.target.closest('[type="submit"]'));
    });

    const revisar = (campo) => {
      campo.classList.toggle('is-invalid', !campo.checkValidity());
      campo.classList.toggle('is-valid', campo.checkValidity());
      campo.setAttribute('aria-invalid', String(!campo.checkValidity()));
    };

    // Al salir de un campo (o al escribir, si ya estaba marcado) se muestra si está bien o mal
    campos.forEach((campo) => {
      campo.addEventListener('blur', () => {
        if (!presionandoEnviar) revisar(campo);
      });
      campo.addEventListener('input', () => {
        if (campo.classList.contains('is-invalid') || campo.classList.contains('is-valid')) {
          revisar(campo);
        }
      });
    });

    // Al enviar: si hay errores, se detiene el envío y el foco va al primer error
    form.addEventListener('submit', (evento) => {
      presionandoEnviar = false;
      if (!form.checkValidity()) {
        evento.preventDefault();
        campos.forEach(revisar);
        form.querySelector(':invalid')?.focus();
      }
    });

    // Contador de caracteres (DOM: cambia el texto en tiempo real)
    const textarea = form.querySelector('textarea[maxlength]');
    const contador = form.querySelector('.js-contador');
    if (textarea && contador) {
      const actualizar = () => { contador.textContent = textarea.value.length; };
      textarea.addEventListener('input', actualizar);
      actualizar();
    }
  });


  /* ---------- 3. Filtro del catálogo sin recargar ---------- */

  const catalogo = document.querySelector('#catalogo[data-filtrable]');
  if (catalogo) {
    const enlaces = document.querySelectorAll('.filtro-categorias [data-filtro]');
    const tarjetas = catalogo.querySelectorAll('.tarjeta');
    const sinResultados = document.querySelector('#sin-resultados');

    enlaces.forEach((enlace) => {
      enlace.addEventListener('click', (evento) => {
        evento.preventDefault();               // no seguimos el enlace: filtramos aquí
        const filtro = enlace.dataset.filtro;
        let visibles = 0;

        tarjetas.forEach((tarjeta) => {
          const mostrar = filtro === 'todas' || tarjeta.dataset.categoria === filtro;
          tarjeta.hidden = !mostrar;
          if (mostrar) visibles++;
        });

        enlaces.forEach((e) => e.removeAttribute('aria-current'));
        enlace.setAttribute('aria-current', 'page');
        sinResultados.hidden = visibles > 0;

        // BOM: actualizamos la URL sin recargar, así se puede compartir el filtro
        history.replaceState(null, '', enlace.href);
      });
    });
  }


  /* ---------- 4. Buscador con fetch ---------- */

  const buscador = document.querySelector('#buscador');
  const resultados = document.querySelector('#resultados');
  let temporizador;

  if (buscador && resultados) {
    buscador.addEventListener('input', () => {
      clearTimeout(temporizador);
      // Esperamos 300 ms a que deje de escribir antes de consultar al servidor
      temporizador = setTimeout(buscar, 300);
    });
  }

  async function buscar() {
    const texto = buscador.value.trim();
    resultados.replaceChildren();
    if (texto.length < 2) return;

    try {
      const respuesta = await fetch(`api/buscar.php?q=${encodeURIComponent(texto)}`);
      const plantas = await respuesta.json();

      if (plantas.length === 0) {
        const item = document.createElement('li');
        item.textContent = `No encontramos plantas con «${texto}».`;
        resultados.append(item);
        return;
      }

      plantas.forEach((planta) => {
        const item = document.createElement('li');
        const enlace = document.createElement('a');
        enlace.href = `planta.php?id=${planta.p_id}`;
        enlace.textContent = planta.p_nombre;     // textContent: no interpreta HTML
        item.append(enlace);
        resultados.append(item);
      });
    } catch (error) {
      const item = document.createElement('li');
      item.textContent = 'No pudimos buscar en este momento. Intenta de nuevo.';
      resultados.append(item);
    }
  }
});


/* ---------- 5. Botón «Volver arriba» con jQuery ---------- */

// $(function () { … }) es el equivalente jQuery de DOMContentLoaded
$(function () {
  const $boton = $('#volver-arriba');

  // Evento de desplazamiento: el botón aparece después de bajar 600 px
  $(window).on('scroll', function () {
    $boton.prop('hidden', $(this).scrollTop() < 600);
  });

  $boton.on('click', function () {
    const sinAnimacion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    window.scrollTo({ top: 0, behavior: sinAnimacion ? 'auto' : 'smooth' });
    // El foco vuelve al inicio del contenido (preventScroll para no cortar la animación)
    $('#contenido').attr('tabindex', '-1');
    document.getElementById('contenido').focus({ preventScroll: true });
  });
});
