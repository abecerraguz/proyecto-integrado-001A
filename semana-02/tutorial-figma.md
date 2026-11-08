# Tutorial Semana 2 · Inventario, mapa de navegación y wireframes con FigJam y Figma

**Proyecto Integrado (GPD2201) · Experiencia 1 · Actividad Sumativa 1 (AS1): Creando un wireframe del proyecto**

En este tutorial pasas de tu brief a la **estructura** del sitio: haces el **inventario de contenidos** y un **cardsorting** en FigJam, dibujas el **mapa de navegación** y construyes los **wireframes de baja resolución** en Figma.

Usamos **Verde Vivo** como ejemplo; tú lo aplicas a **tu proyecto** del caso Graham.

---

## Qué vas a aprender

- Hacer un inventario de **contenidos** (no de piezas de interfaz).
- Validar categorías con un cardsorting.
- Dibujar un mapa de navegación jerárquico con conectores.
- Crear wireframes de baja resolución en Figma, en Desktop y Mobile.
- Comprobar que mapa y wireframes sean coherentes entre sí.

## Antes de comenzar

- [ ] Tu **brief de la Semana 1**, actualizado con la retroalimentación de la AF1.
- [ ] Tu tablero de FigJam de la Semana 1.
- [ ] El resumen de la clase: [resumen-clase.md](resumen-clase.md).

⏱️ Tiempo estimado: 5 a 6 horas.

> ⚠️ Esta actividad es **sumativa**. La rúbrica revisa 5 criterios de 20 puntos: **brief**, **problemas y necesidades**, **licencias**, **mapa de navegación** y **wireframes**. Los tres primeros vienen de la Semana 1: inclúyelos actualizados.

---

## Paso 1 · Inventario de contenidos

**Meta:** listar todos los contenidos del sitio, agrupados por categoría.

**Haz esto:**
1. Crea un tablero de FigJam `AS1 · [Tu empresa]` con una sección `1 Inventario`.
2. Primero, lluvia de ideas: un sticky por cada contenido que necesita el sitio (textos, imágenes, videos, documentos).
3. Luego, inserta una **Tabla** con estas columnas:

| ID | Rótulo | URL propuesta | Descripción | Tipo de contenido | Activos | Comentarios |
|----|--------|---------------|-------------|-------------------|---------|-------------|
| 1.0 | Plantas | /plantas | Catálogo con filtros por tipo | Listado | Fotos | — |
| 1.1 | Ficha de planta | /plantas/nombre | Descripción, cuidados y precio | Detalle | Fotos | Una por planta |
| 2.0 | Cuidados | /cuidados | Artículos sobre cuidado de plantas | Blog | Fotos | — |

*(Ejemplo con Verde Vivo; tus filas salen de tu brief.)*

4. Agrupa las filas por **categoría** usando el ID (1.0, 1.1, 1.2… para la misma categoría).

**Comprueba:**
- [ ] Cada fila es un **contenido**, no un elemento de interfaz.
- [ ] Todo contenido tiene ID, rótulo y URL.

**Errores frecuentes:**
- Listar «menú», «buscador» o «botón de WhatsApp» como contenidos. Son piezas de interfaz; van en el wireframe, no en el inventario.

---

## Paso 2 · Cardsorting

**Meta:** comprobar que tus categorías tienen sentido para los usuarios.

**Haz esto:**
1. En una sección `2 Cardsorting`, copia los rótulos del inventario como stickies sueltos (sin agrupar).
2. Comparte el tablero (botón **Compartir**) con **2 o 3 personas** de tu público objetivo, o haz la prueba por videollamada.
3. Pídeles que agrupen las tarjetas como les haga sentido y que le pongan nombre a cada grupo.
4. Anota en qué coincidieron y en qué no.

**Comprueba:**
- [ ] Tienes las agrupaciones de al menos 2 personas.
- [ ] Ajustaste los nombres de tus categorías según lo que viste.

**Errores frecuentes:**
- Hacerlo tú mismo: el cardsorting sirve para conocer el **modelo mental del usuario**, no el tuyo.

---

## Paso 3 · Mapa de navegación

**Meta:** mostrar la jerarquía del sitio y cómo se conectan sus secciones.

**Haz esto:**
1. En una sección `3 Mapa de navegación`, crea un rectángulo **Inicio** arriba al centro.
2. Debajo, un rectángulo por cada sección del menú principal (4 a 6).
3. Debajo de cada sección, sus subpáginas.
4. Une los niveles con la herramienta **Conector** (atajo `X`).
5. Usa un tamaño y color de recuadro por nivel (nivel 1, 2 y 3) y agrega una pequeña leyenda.

```
Inicio
├── Plantas ──── Ficha de planta
├── Cuidados ─── Artículo
├── Nosotros
└── Contacto
```

**Comprueba:**
- [ ] Todo contenido del inventario aparece en algún nodo del mapa.
- [ ] La jerarquía se entiende sin explicación.
- [ ] Los rótulos coinciden con los del inventario.

**Errores frecuentes:**
- Más de 7 secciones en el menú principal: agrupa.
- Nodos sin conectar o conectores que se cruzan sin orden.

---

## Paso 4 · Preparar el archivo de wireframes en Figma

**Meta:** tener los frames listos para trabajar.

**Haz esto:**
1. En Figma, **+ Crear nuevo → Archivo de diseño**. Nómbralo `AS1 · Wireframes · [Tu empresa]`.
2. Con la herramienta **Frame** (atajo `F`), elige en el panel derecho **Desktop (1440 × 1024)** y luego **iPhone** o **Android** para Mobile.
3. Crea un frame por cada página del mapa que vas a diagramar: al menos **Inicio**, una página de **listado** y una de **detalle o contacto**, en Desktop y Mobile.
4. Nombra cada frame igual que su nodo del mapa: `Inicio · Desktop`, `Inicio · Mobile`…

**Comprueba:**
- [ ] Cada frame tiene el mismo nombre que un nodo del mapa.

---

## Paso 5 · Diagramar en baja resolución

**Meta:** ubicar los elementos principales, sin diseño visual.

**Haz esto:**
1. Usa **solo grises**: por ejemplo `#333333` para textos, `#BDBDBD` para bloques y `#EEEEEE` para fondos.
2. Usa **una sola tipografía** (por ejemplo Inter) y diferencia jerarquía con tamaño y peso.
3. Imágenes: un rectángulo gris con una **X** (dos líneas diagonales).
4. Construye cada página de arriba hacia abajo:
   - **Encabezado:** logo, menú, botón de acción.
   - **Contenido principal:** título (H1), textos, tarjetas, formularios.
   - **Barra lateral** si la necesitas (por ejemplo, filtros).
   - **Pie de página:** contacto, redes, enlaces.
5. Incluye los **elementos de navegación**: menú, botones y enlaces con texto real («Ver plantas», no «Botón»).
6. En Mobile, el menú se vuelve un ícono de **hamburguesa** y las columnas se apilan.

**Comprueba:**
- [ ] Nada de color, fotos reales ni íconos complejos.
- [ ] Cada pantalla corresponde a un nodo del mapa, y cada nodo diagramado tiene su pantalla.
- [ ] El menú del wireframe usa los mismos rótulos del mapa.

**Errores frecuentes:**
- Diseñar «bonito» antes de tiempo. En baja resolución el foco es la **estructura**.
- Wireframes con secciones que no están en el mapa (o al revés).

---

## Paso 6 · Revisar, mejorar y documentar

**Meta:** detectar problemas antes de pasar al diseño visual.

**Haz esto:**
1. Muestra el mapa y los wireframes a una persona y pídele que encuentre un contenido («¿Dónde verías los horarios?»).
2. Anota qué cambiaste y por qué: eso va en tu **informe de mejoras**.

**Comprueba:**
- [ ] Tienes una lista de mejoras con su motivo.

---

## Paso 7 · Exportar y armar la carpeta de entrega

**Meta:** entregar todo junto y ordenado.

**Haz esto:**
1. En FigJam, selecciona cada sección → clic derecho → **Exportar** (o **Copiar como PNG**) y guárdala como imagen o PDF.
2. En Figma, selecciona los frames → panel derecho, **Exportar** → **PNG** o **PDF** → **Exportar**.
3. Crea una carpeta con:
   - Brief actualizado (con presupuesto y licencias).
   - Inventario de contenidos.
   - Mapa de navegación.
   - Wireframes (Desktop y Mobile).
   - Informe de mejoras, si hiciste cambios durante el diseño.
4. Comprímela en un archivo **.zip** y súbela al AVA.

**Comprueba:**
- [ ] Abres el .zip en otro computador y todo se ve.

**Errores frecuentes:**
- Entregar solo enlaces: si el permiso no está abierto, no se puede revisar. Entrega los archivos.

---

## 📎 Ejemplo de la clase

👉 **[Verde Vivo en Figma · página «S2 · Mapa y wireframes»](https://www.figma.com/design/JzpYk9b659iEO5kInvBPTE/Verde-Vivo-%E2%80%94-Proyecto-Integrado-%C2%B7-Ejemplos-de-clase?node-id=2-3)**

Ahí verás el inventario de contenidos, el mapa del sitio y los wireframes en escala de grises de Verde Vivo. Fíjate en cómo cada página del mapa tiene su wireframe y en que todavía no hay colores ni fotos.

> ⚠️ El ejemplo es para **comparar**, no para copiar. Tu entrega tiene que ser sobre **tu** proyecto (el caso del señor Graham), con tus propios textos, colores e imágenes.

---

## ✅ Checklist final

- [ ] Brief actualizado, con presupuesto y licencias.
- [ ] Inventario de contenidos con ID, rótulo, URL y categoría.
- [ ] Cardsorting con al menos 2 personas.
- [ ] Mapa de navegación jerárquico, con los mismos rótulos del inventario.
- [ ] Wireframes de baja en Desktop y Mobile: grises, una tipografía, imágenes como recuadros con X.
- [ ] Coherencia total entre mapa y wireframes.
- [ ] Informe de mejoras (si hubo cambios).
- [ ] Todo en una carpeta comprimida en .zip.

---

## ❓ Preguntas de repaso

<details>
<summary>1. ¿Qué diferencia hay entre el inventario de contenidos y el mapa de navegación?</summary>

El inventario lista todos los contenidos con sus datos (ID, rótulo, URL). El mapa muestra cómo se organizan jerárquicamente y cómo se navega entre ellos.
</details>

<details>
<summary>2. ¿Para qué sirve el cardsorting?</summary>

Para conocer cómo agrupan y nombran los contenidos los usuarios reales, y así crear categorías que coincidan con su modelo mental.
</details>

<details>
<summary>3. ¿Por qué el wireframe de baja va en escala de grises?</summary>

Para concentrarse en la estructura y la jerarquía. El color y el estilo se definen después, en la guía de estilos.
</details>

<details>
<summary>4. ¿Qué principio de Nielsen aplicas al usar los mismos rótulos en el mapa y en el menú?</summary>

Consistencia y estándares: el usuario reconoce las secciones porque se llaman igual en todo el sitio.
</details>

<details>
<summary>5. ¿Qué significa que el mapa y los wireframes sean coherentes?</summary>

Que cada pantalla del wireframe corresponde a un nodo del mapa y que el menú y los rótulos son los mismos en ambos.
</details>

---

## 📤 Entrega

- **Actividad:** Sumativa 1 (AS1) — Creando un wireframe del proyecto.
- **Formato:** todos los documentos y esquemas en **una carpeta comprimida en .zip**, más un **informe** si hiciste mejoras durante el diseño.
- **Fecha límite:** **lunes 2 de noviembre de 2026 a las 23:59 hrs**, por el AVA.
- **Se evalúa (rúbrica, 100 puntos):** brief (IL1), problemas y necesidades (IL2), licencias (IL3), mapa de navegación (IL4) y wireframes (IL5), 20 puntos cada uno.

> Este tutorial complementa la guía de aprendizaje y la clase sincrónica. Tu entrega debe ser trabajo propio.
