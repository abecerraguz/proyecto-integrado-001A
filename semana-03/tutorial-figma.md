# Tutorial Semana 3 · De la baja a la alta resolución en Figma

**Proyecto Integrado (GPD2201) · Experiencia 2 · Actividad Formativa 2 (AF2): Creando la interfaz del proyecto**

Esta semana conviertes tu wireframe de baja en una **interfaz de alta resolución** con **guía de estilos**, responsiva y con interacción básica.

Este tutorial es la **ruta de la semana**. El trabajo paso a paso en Figma (variables, estilos, componentes, Home responsiva y prototipo) está en el tutorial largo de Verde Vivo, que vas a seguir en el paso 3:

👉 **[Tutorial Figma desde cero · Verde Vivo](tutorial-Figma-desde-cero-verde-vivo.md)**

---

## Qué vas a aprender

- Armar un moodboard en FigJam y sacar de él tu estilo visual.
- Configurar grillas de 12, 8 y 4 columnas.
- Construir variables, estilos de texto y componentes en Figma.
- Diseñar tus pantallas en Desktop, Tablet y Mobile.
- Verificar el contraste real de tus colores.
- Exportar las mesas de trabajo para la entrega.

## Antes de comenzar

- [ ] Tus **wireframes de baja** y tu **mapa de navegación** de la Semana 2, ajustados con la retroalimentación de la AS1.
- [ ] El **estilo visual** que propusiste en tu brief.
- [ ] El resumen de la clase: [resumen-clase.md](resumen-clase.md).
- [ ] Una pestaña abierta en el [WebAIM Contrast Checker](https://webaim.org/resources/contrastchecker/).

⏱️ Tiempo estimado: 8 a 10 horas en la semana (el tutorial largo toma unas 8).

---

## Paso 1 · Moodboard en FigJam

**Meta:** definir la atmósfera visual del proyecto antes de diseñar.

**Haz esto:**
1. Crea un tablero de FigJam `Moodboard · [Tu empresa]`.
2. Reúne **10 o más referencias**: fotografías, paletas, tipografías, texturas, íconos y sitios que te inspiren (no solo de la competencia).
3. Agrúpalas con **secciones**: Color · Tipografía · Fotografía · Componentes · Sensación.
4. Escribe 3 **palabras clave** del estilo (por ejemplo, para Verde Vivo: *natural, artesanal, cercano*).
5. Usa el cuentagotas sobre las referencias para sacar **5 o 6 colores candidatos**.

**Comprueba:**
- [ ] Las 3 palabras clave se notan en las referencias.
- [ ] Anotaste de dónde sale cada imagen (la vas a necesitar si la usas, por la licencia).

**Errores frecuentes:**
- Un moodboard de puras capturas de sitios competidores: eso es benchmark, no inspiración.

---

## Paso 2 · Grillas

**Meta:** que todas tus pantallas tengan una estructura común.

**Haz esto:**
1. En tu archivo de Figma, selecciona un frame Desktop (1440 px) → panel derecho → **Cuadrícula de diseño (Layout grid)** → **+**.
2. Cambia a **Columnas**: 12 columnas, medianil (gutter) de 24 px y margen de 80 px.
3. En Tablet (por ejemplo 768 px): 8 columnas. En Mobile (390 px): 4 columnas con márgenes de 16 a 20 px.
4. Guarda cada grilla como estilo para reutilizarla.

**Comprueba:**
- [ ] Los bloques principales calzan con las columnas.

---

## Paso 3 · Variables, estilos, componentes y Home responsiva

**Meta:** construir el sistema visual con método.

**Haz esto:** sigue el [Tutorial Figma desde cero · Verde Vivo](tutorial-Figma-desde-cero-verde-vivo.md), pero **con los colores, fuentes y contenidos de tu proyecto**:

| Etapa del tutorial largo | Qué construyes | Qué pide la AF2 |
|--------------------------|----------------|-----------------|
| 0 · Conocer Figma | Archivo y páginas | — |
| 1 · Variables | Colores, tamaños, tipografía y modos responsive | Paleta y espaciado de la guía de estilos |
| 2 · Estilos de texto y guía | Text Styles y página Guía de estilos | Guía de estilos completa |
| 3 · Componentes | Botones, chips, tarjetas, header | Estilos de botones e inputs, componentes |
| 4 · Home responsive | Desktop, Tablet y Mobile | Considerar distintas resoluciones |
| 5 · Anotaciones y accesibilidad | Capas de documentación | Contraste y accesibilidad |
| 6 · Prototipo | Hover, navegación y menú mobile | Comportamiento de los elementos interactivos |
| 7 · Revisión y entrega | Exportar y adaptar | Feedback y exportación |

Tu **guía de estilos** debe incluir: colores, tipografías, iconografía, tamaños de elementos, espaciado, estilos de botones e inputs y otros componentes.

**Comprueba:**
- [ ] Ningún color está «suelto»: todo usa variables.
- [ ] Usas como máximo 2 familias tipográficas.

---

## Paso 4 · Las demás pantallas en alta

**Meta:** llevar a alta resolución todas las pantallas de tu wireframe de baja, no solo la Home.

**Haz esto:**
1. Duplica la estructura de cada wireframe de baja de la Semana 2 y reemplaza los grises por tus **componentes** e **instancias**.
2. Termina primero la **estructura** y luego agrega los detalles visuales.
3. Coloca imágenes e íconos solo donde el wireframe tenía su espacio reservado.

**Comprueba:**
- [ ] Cada pantalla de alta corresponde a una de baja y a un nodo del mapa.
- [ ] Los menús usan los mismos rótulos del mapa.

**Errores frecuentes:**
- Cambiar la estructura sin actualizar el mapa y el wireframe de baja. Si cambias algo, actualízalos también.

---

## Paso 5 · Contraste y accesibilidad

**Meta:** que todos puedan leer tu interfaz.

**Haz esto:**
1. Para cada combinación de texto y fondo que usas, pega los dos colores en el WebAIM Contrast Checker.
2. Anota el resultado en una tabla en tu guía de estilos.
3. Criterio **WCAG AA**: **4,5:1** para texto normal y **3:1** para texto grande (desde 24 px, o 18,66 px en negrita). AAA exige 7:1 y 4,5:1.
4. Si una combinación no cumple, oscurece o aclara el color y vuelve a medir.

**Comprueba:**
- [ ] Todos los textos cumplen al menos AA.
- [ ] La información no depende **solo** del color (por ejemplo, un error también lleva ícono y texto).

---

## Paso 6 · Pedir opiniones, ajustar y exportar

**Meta:** mejorar el diseño con feedback y entregarlo.

**Haz esto:**
1. Muestra el prototipo a 2 personas y pídeles una tarea concreta («Busca una planta para interior»). Anota qué ajustaste.
2. Selecciona cada mesa de trabajo (frame) → panel derecho, **Exportar** → **JPG** (escala 2x) o **PDF**.
3. Exporta: guía de estilos, componentes, wireframes de alta y diseño en Desktop, Tablet y Mobile.
4. Comprime todo en un archivo **.zip**.

**Comprueba:**
- [ ] El .zip se abre y todas las imágenes se ven nítidas.

---

## 📎 Ejemplo de la clase

👉 **[Verde Vivo en Figma · página «S3 · Diseño de interfaz»](https://www.figma.com/design/JzpYk9b659iEO5kInvBPTE/Verde-Vivo-%E2%80%94-Proyecto-Integrado-%C2%B7-Ejemplos-de-clase?node-id=2-4)**

Ahí verás la guía de estilos (colores, tipografías y espaciado como variables), los componentes con sus variantes (botón, chip, tarjeta de planta, encabezado y pie) y la Home en Desktop, Tablet, Mobile y Mobile en modo oscuro. Revisa el panel de variables para ver cómo se conectan los colores con los componentes.

> ⚠️ El ejemplo es para **comparar**, no para copiar. Tu entrega tiene que ser sobre **tu** proyecto (el caso del señor Graham), con tus propios textos, colores e imágenes.

---

## ✅ Checklist final

- [ ] Moodboard con 10 o más referencias y 3 palabras clave.
- [ ] Guía de estilos: colores, tipografías, iconografía, tamaños, espaciado, botones e inputs con estados.
- [ ] Contraste verificado (al menos WCAG AA).
- [ ] Wireframe de alta de todas las pantallas del wireframe de baja.
- [ ] Versiones Desktop y Mobile (Tablet recomendada).
- [ ] Interacción definida: estados de botones y flujo principal prototipado.
- [ ] Feedback recogido y ajustes anotados.
- [ ] Mesas de trabajo exportadas en JPG o PDF dentro de un .zip.

---

## ❓ Preguntas de repaso

<details>
<summary>1. ¿Cuál es la diferencia entre el wireframe de baja y el de alta?</summary>

El de baja define estructura y jerarquía en grises. El de alta aplica la guía de estilos (colores, tipografías, componentes, imágenes) y se acerca a la interfaz final.
</details>

<details>
<summary>2. ¿Qué dice la Ley de Hick y cómo la aplicas?</summary>

Que a más opciones, más tiempo para decidir. La aplicas simplificando y agrupando opciones, por ejemplo con un menú de pocas secciones.
</details>

<details>
<summary>3. ¿Qué dice la Ley de Fitts?</summary>

Que el tiempo para alcanzar un objetivo depende de su distancia y su tamaño. Por eso los botones importantes son grandes y están a la mano, sobre todo en el celular.
</details>

<details>
<summary>4. ¿Qué es Atomic Design?</summary>

Una forma de construir interfaces desde piezas mínimas (átomos como un botón) que se combinan en moléculas, organismos, plantillas y páginas.
</details>

<details>
<summary>5. ¿Qué contraste mínimo pide WCAG AA para texto normal?</summary>

4,5:1. Para texto grande, 3:1.
</details>

---

## 📤 Entrega

- **Actividad:** Formativa 2 (AF2) — Creando la interfaz del proyecto.
- **Formato:** exporta cada mesa de trabajo del wireframe y del diseño en **JPG o PDF** y comprímelas en un archivo **.zip**.
- **Fecha límite:** **lunes 9 de noviembre de 2026 a las 23:59 hrs**, por el AVA.
- **Se evalúa (pauta):** brief (IL1), problemas y necesidades (IL2), mapa de navegación (IL4), wireframes (IL5) y diseño de interfaz según la guía de estilos (IL6).

> Este tutorial complementa la guía de aprendizaje y la clase sincrónica. Tu entrega debe ser trabajo propio.
