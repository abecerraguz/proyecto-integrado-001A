# Verde Vivo · Ejemplo de la EFT — Estructura del informe y guion del video

Este es el ejemplo de **cómo documentar** el proceso de Verde Vivo para la Evaluación Final Transversal. Úsalo como modelo de **estructura**: tu informe y tu video cuentan **tu** proyecto, con tus decisiones, tus desafíos y tus evidencias.

> Verde Vivo es un proyecto **ficticio** que construimos en clase. Complementa el [tutorial de la EFT](tutorial-eft.md).

---

## 1. Capturas: nombres y contenido

| Archivo | Qué muestra en Verde Vivo |
|---------|---------------------------|
| `01-brief.png` | Objetivos, alcance (sin carrito de compras) y público del brief |
| `02-benchmark.png` | Tabla con 3 viveros de Santiago: referente y anti-referente |
| `03-arquetipo.png` | Arquetipo «Daniela, 29 años, departamento con poca luz» y mapa de empatía |
| `04-presupuesto-licencias.png` | Presupuesto con la fila de licencias (Google Fonts: OFL · Bootstrap: MIT · ilustraciones propias) |
| `05-inventario.png` | Inventario de contenidos con ID, rótulo y URL |
| `06-mapa-navegacion.png` | Inicio → Plantas → Ficha · Cuidados → Artículo · Nosotros · Contacto |
| `07-wireframe-baja.png` | Home y catálogo en grises, Desktop y Mobile |
| `08-guia-estilos.png` | Paleta, tipografías (Playfair Display + Lato) y tabla de contraste |
| `09-diseno-alta.png` | Home de alta en Desktop, Tablet y Mobile |
| `10-sitio-desktop.png` | Portada publicada en escritorio |
| `11-sitio-mobile.png` | Portada y catálogo en un celular de 390 px |
| `12-validacion-w3c.png` | «No errors or warnings» en el W3C Validator |
| `13-codigo-sass.png` | Carpeta `scss/` y una media query `min-width` |
| `14-base-de-datos.png` | Tablas `vv_categorias`, `vv_plantas`, `vv_mensajes` y `vv_usuarios` en phpMyAdmin |
| `15-panel-login.png` | Login del panel |
| `16-panel-crud.png` | Listado de plantas y formulario de edición |
| `17-interacciones.png` | Filtro por categoría, modo oscuro y modal de confirmación |

---

## 2. Estructura del informe de Verde Vivo

### Portada
Verde Vivo — Vivero artesanal · Proyecto Integrado (GPD2201) · nombre del estudiante · docente · fecha.

### Inicio
- **Cliente y contexto:** vivero artesanal de Providencia que solo vendía por redes sociales.
- **Objetivos del brief:**
  1. Mostrar el catálogo con precios referenciales para que la gente encuentre su planta.
  2. Aumentar los contactos a través del formulario.
  3. Que la dueña actualice el catálogo sin saber programar.
- **Alcance:** catálogo, cuidados, nosotros y contacto. **No incluye** carrito ni pagos en línea.
- **Problemas y necesidades:** los clientes no sabían qué planta sirve para su luz; el benchmark mostró sitios lentos en el celular.
- **Licencias:** Playfair Display y Lato (SIL Open Font License), Bootstrap y jQuery (MIT), ilustraciones propias en SVG.

### Desarrollo
1. **Arquitectura de la información:** inventario de 12 contenidos, cardsorting con 3 personas (agruparon «Cuidados» aparte del catálogo), mapa de 5 secciones y wireframes de baja coherentes con el mapa.
2. **Diseño de interfaz:** moodboard *natural, artesanal, cercano*; guía de estilos con variables, componentes y Home en tres tamaños; contraste medido en WebAIM.
3. **Maquetas funcionales:** HTML semántico con Bootstrap (Semana 4); Mobile First con Sass y media queries `min-width` (Semana 5); cero errores en el W3C.
4. **Programación:** base de datos con 4 tablas relacionadas; páginas dinámicas con consultas preparadas; panel con login, sesiones y CRUD de plantas; interacciones con JavaScript (filtro, buscador con `fetch`, modo oscuro, modal).
5. **Desafíos y soluciones:**

| Desafío | Causa | Solución | Resultado |
|---------|-------|----------|-----------|
| El botón principal no se leía bien | Blanco sobre `#C8963E` daba 2,66:1 | Se usó el dorado oscuro `#9A6B22` de la paleta | 4,67:1, cumple WCAG AA |
| La página quedaba en blanco al fallar la base | Desde PHP 8.1 mysqli lanza excepciones y la clase `db` no las controlaba | Se agregó `mysqli_report(MYSQLI_REPORT_OFF)` y un mensaje genérico | El error se registra en el log y el usuario ve un aviso claro |
| Al presionar «Enviar» con un error, el clic se perdía | El mensaje de error aparecía al salir del campo y movía el botón | No validar al salir del campo cuando se presiona «Enviar» | El envío valida todo y el foco va al primer error |

### Cierre
- **Resultados:** sitio publicado en el hosting, responsivo, con panel y sin errores de validación.
- **Objetivos:** (1) catálogo con filtro y buscador ✔ · (2) formulario que guarda mensajes y los muestra en el panel ✔ · (3) la dueña agrega, edita y elimina plantas sin código ✔.
- **Aprendizajes y mejoras futuras:** agregar filtro por luz; permitir varias fotos por planta.

### Anexos
Tabla de licencias y capturas adicionales.

---

## 3. Diapositivas (9)

1. Portada · 2. Cliente y problema · 3. Mapa de navegación · 4. Guía de estilos y diseño · 5. Sitio responsivo · 6. Base de datos · 7. Panel de administración · 8. Interacciones · 9. Resultados

---

## 4. Guion del video (≈ 185 palabras + demostraciones en vivo · 1 min 55 s)

| Tiempo | Diapositiva | Guion |
|:------:|:-----------:|-------|
| 0:00 | 1 | «Hola, soy [tu nombre] y les presento Verde Vivo, el sitio web de un vivero artesanal de Providencia.» |
| 0:08 | 2 | «El vivero solo vendía por redes sociales. El brief planteó tres objetivos: mostrar el catálogo, recibir más contactos y que la dueña actualizara el sitio sin programar.» |
| 0:23 | 3 | «Con un inventario y un cardsorting armé un mapa de cinco secciones: plantas, cuidados, nosotros y contacto, además del inicio.» |
| 0:35 | 4 | «La guía de estilos define colores, tipografías y componentes. Medí el contraste de cada color: por ejemplo, cambié el dorado del botón para cumplir WCAG AA.» |
| 0:50 | 5 | «Este es el sitio publicado. Lo construí con Bootstrap y Sass con enfoque Mobile First: en el celular el catálogo pasa a una columna.» |
| 1:05 | 6 | «Las plantas vienen de una base de datos MySQL con cuatro tablas, y todas las consultas son preparadas.» |
| 1:15 | 7 | «La dueña entra con su usuario al panel. Agrego una planta con su foto… y aparece de inmediato en el catálogo.» |
| 1:33 | 8 | «Con JavaScript filtro por categoría y busco sin recargar, activo el modo oscuro, y antes de eliminar el panel pide confirmación.» |
| 1:48 | 9 | «Se cumplieron los tres objetivos del brief. Gracias.» |

El guion deja tiempo para mostrar el sitio funcionando (diapositivas 5, 7 y 8). Antes de grabar, ensáyalo con cronómetro mientras navegas: si pasa de 2 minutos, recorta la diapositiva 4 o la 6.
