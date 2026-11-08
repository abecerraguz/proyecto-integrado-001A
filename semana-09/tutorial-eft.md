# Tutorial Semana 9 · Informe y video de la Evaluación Final Transversal

**Proyecto Integrado (GPD2201) · Evaluación Final Transversal (EFT)**

La EFT te pide **documentar y presentar todo el proceso** de tu proyecto: del brief al sitio programado, con los cambios, desafíos y soluciones del camino. Entregas un **informe escrito** y un **video de 1,5 a 2 minutos** con **7 a 10 diapositivas**.

Este tutorial te ayuda a reunir las evidencias, armar el informe según la rúbrica y preparar y grabar el video sin pasarte del tiempo.

---

## Qué vas a aprender

- Reunir y nombrar las evidencias de cada etapa.
- Estructurar el informe en Inicio, Desarrollo y Cierre.
- Contar desafíos y soluciones con claridad.
- Armar 7 a 10 diapositivas y un guion que quepa en 2 minutos.
- Revisar tu trabajo contra los 12 criterios de la rúbrica.

## Antes de comenzar

- [ ] Tu sitio publicado en el **hosting de Duoc**, con panel y base de datos funcionando.
- [ ] Las entregas y retroalimentaciones de las semanas 1 a 8.
- [ ] Tus archivos de FigJam y Figma.
- [ ] El resumen de la clase: [resumen-clase.md](resumen-clase.md).

⏱️ Tiempo estimado: 8 a 10 horas (informe 5–6 h, video 3–4 h).

---

## Paso 1 · Reunir las evidencias

**Meta:** tener a mano todas las imágenes que vas a usar.

**Haz esto:**
1. Crea una carpeta `EFT/capturas/`.
2. Captura o exporta cada evidencia y nómbrala con número y etapa, en minúsculas y sin espacios:

| Archivo | Qué muestra | Semana |
|---------|-------------|:------:|
| `01-brief.png` | Brief (objetivos, alcance, público) | 1 |
| `02-benchmark.png` | Tabla comparativa de competidores | 1 |
| `03-arquetipo.png` | Arquetipo y mapa de empatía | 1 |
| `04-presupuesto-licencias.png` | Presupuesto con la fila de licencias | 1 |
| `05-inventario.png` | Inventario de contenidos | 2 |
| `06-mapa-navegacion.png` | Mapa de navegación | 2 |
| `07-wireframe-baja.png` | Wireframes de baja (Desktop y Mobile) | 2 |
| `08-guia-estilos.png` | Guía de estilos con contraste verificado | 3 |
| `09-diseno-alta.png` | Diseño de alta en Desktop, Tablet y Mobile | 3 |
| `10-sitio-desktop.png` | Portada publicada en escritorio | 4–5 |
| `11-sitio-mobile.png` | Portada publicada en el celular | 5 |
| `12-validacion-w3c.png` | Resultado sin errores en el W3C | 4–8 |
| `13-codigo-sass.png` | Estructura de Sass y una media query | 5 |
| `14-base-de-datos.png` | Tablas en phpMyAdmin | 6 |
| `15-panel-login.png` | Login del panel | 7 |
| `16-panel-crud.png` | Listado y formulario del panel | 7 |
| `17-interacciones.png` | Validación, filtro o modo oscuro en acción | 8 |

**Comprueba:**
- [ ] Tienes una evidencia por cada etapa, con la versión **final** (corregida con la retroalimentación).

**Errores frecuentes:**
- Usar la primera versión de cada etapa. Muestra la versión mejorada y, si quieres, el «antes» para explicar el cambio.

---

## Paso 2 · Estructurar el informe

**Meta:** un informe ordenado que cubra todo lo que evalúa la rúbrica.

**Haz esto:** usa esta estructura:

1. **Portada:** nombre del proyecto, tu nombre, asignatura, docente y fecha.
2. **Inicio**
   - Brief del proyecto: cliente (caso Graham), contexto, objetivos, alcance y público.
   - Problemas y necesidades detectados (entrevistas, benchmark, arquetipos).
   - Presupuesto y **licencias** de los recursos.
3. **Desarrollo**
   - **Arquitectura de la información:** inventario, mapa de navegación y wireframes, con por qué los organizaste así.
   - **Diseño de interfaz:** moodboard, guía de estilos, accesibilidad y diseño responsivo.
   - **Maquetas funcionales:** HTML semántico, Bootstrap, Sass, Mobile First y validación W3C.
   - **Programación:** base de datos, páginas dinámicas, panel de administración e interacciones con JavaScript.
   - **Desafíos y soluciones** (paso 3).
4. **Cierre**
   - Resultados obtenidos: qué funciona y la **URL** del sitio.
   - Cómo se lograron los objetivos del brief: retoma **cada objetivo** y di si se cumplió y cómo.
   - Aprendizajes y mejoras futuras.
5. **Anexos:** tabla de licencias y capturas adicionales.

**Comprueba:**
- [ ] Cada objetivo del Inicio aparece evaluado en el Cierre.

**Errores frecuentes:**
- Llenar el informe de código. Muestra fragmentos cortos solo para explicar una decisión; lo importante es contar el **proceso**.

---

## Paso 3 · Escribir desafíos y soluciones

**Meta:** mostrar cómo resolviste problemas reales.

**Haz esto:** describe al menos **3 desafíos** con esta fórmula:

> **Desafío:** qué pasó → **Causa:** por qué → **Solución:** qué hiciste → **Resultado:** cómo quedó (con evidencia).

*Ejemplo (Verde Vivo):* el botón principal no cumplía el contraste → el dorado claro con texto blanco daba 2,66:1 → se cambió al dorado oscuro de la paleta → ahora da 4,67:1 y cumple WCAG AA.

**Comprueba:**
- [ ] Al menos un desafío de diseño y uno de programación.

---

## Paso 4 · Revisar contra la rúbrica

**Meta:** que no falte nada de lo que se evalúa.

**Haz esto:** marca cada criterio y anota en qué sección del informe y del video está:

| # | Criterio de la rúbrica | Pts | Dónde lo muestro |
|:-:|------------------------|:---:|------------------|
| 1 | Brief con acciones, tiempo y recursos | 8 | Inicio |
| 2 | Problemas y necesidades del proyecto | 8 | Inicio |
| 3 | Tipos de licencia de los recursos | 7 | Inicio + anexo |
| 4 | Mapa de navegación | 8 | Desarrollo |
| 5 | Wireframes con jerarquía de contenidos | 8 | Desarrollo |
| 6 | Diseño de interfaz según la guía de estilos | 9 | Desarrollo |
| 7 | HTML según el estándar W3C | 9 | Desarrollo |
| 8 | Frameworks, variables CSS y preprocesadores | 9 | Desarrollo |
| 9 | Sitio web responsivo | 9 | Desarrollo + video |
| 10 | Programación para administrar el sitio | 8 | Desarrollo + video |
| 11 | Programación de interacciones | 8 | Desarrollo + video |
| 12 | Presentación del proceso (brief, AI, interfaz, maquetas, programación) | 9 | Video |
| | **Total** | **100** | |

**Comprueba:**
- [ ] Los 12 criterios tienen su lugar.

---

## Paso 5 · Armar las diapositivas

**Meta:** de 7 a 10 diapositivas, una idea clave por diapositiva.

**Haz esto:**

| # | Diapositiva | Apoyo visual |
|:-:|-------------|--------------|
| 1 | Portada: proyecto y tu nombre | Logo |
| 2 | El cliente y el problema (brief) | `01-brief` |
| 3 | Arquitectura de la información | `06-mapa-navegacion` |
| 4 | Diseño de interfaz | `08-guia-estilos` + `09-diseno-alta` |
| 5 | Sitio publicado y responsivo | Sitio en vivo o `10` y `11` |
| 6 | Base de datos y páginas dinámicas | `14-base-de-datos` |
| 7 | Panel de administración | Demostración en vivo |
| 8 | Interacciones con JavaScript | Demostración en vivo |
| 9 | Resultados y objetivos logrados | Lista breve |

- Usa la tipografía y los colores de **tu guía de estilos**.
- Poco texto: máximo 3 a 4 líneas por diapositiva.

**Comprueba:**
- [ ] Entre 7 y 10 diapositivas.
- [ ] El foco está en el **funcionamiento del sitio y su programación**, como pide el enunciado.

---

## Paso 6 · Escribir el guion (menos de 2 minutos)

**Meta:** que el video dure entre 1 min 30 s y 2 min.

**Haz esto:**
1. A ritmo normal se hablan unas 150 palabras por minuto. Escribe un guion de **220 a 260 palabras**.
2. Reparte el tiempo:

| Parte | Tiempo |
|-------|:------:|
| Portada y presentación | 8 s |
| Cliente y problema | 15 s |
| Arquitectura de la información | 12 s |
| Diseño de interfaz | 15 s |
| Sitio responsivo (en vivo) | 15 s |
| Base de datos y páginas dinámicas | 10 s |
| Panel de administración (en vivo) | 18 s |
| Interacciones (en vivo) | 15 s |
| Resultados y cierre | 8 s |
| **Total** | **≈ 1 min 56 s** |

3. Léelo en voz alta con un cronómetro y recorta si te pasas.

**Comprueba:**
- [ ] Al leerlo, dura menos de 2 minutos.

**Errores frecuentes:**
- Explicar cada línea de código: no alcanza el tiempo. Muestra que funciona y cuenta la decisión clave.

---

## Paso 7 · Grabar y revisar el video

**Meta:** un video claro, bien iluminado y con buen audio.

**Haz esto:**
1. **Lugar:** con buena iluminación de frente (el enunciado lo pide) y sin ruido.
2. **Herramienta:** OBS Studio (gratuito, Windows y Mac), la grabación de pantalla de Mac (`Cmd + Shift + 5`) o la de tu herramienta de videollamadas. Si puedes, muestra tu cámara en una esquina.
3. Prepara antes: el navegador con el sitio abierto, la sesión del panel iniciada y las pestañas ordenadas.
4. Graba de una vez siguiendo el guion; si te equivocas, sigue o graba por partes y únelas.
5. Revisa: duración, que se escuche bien y que se lea la pantalla.

**Comprueba:**
- [ ] Dura entre 1 min 30 s y 2 min.
- [ ] Se ve el sitio funcionando, el panel y al menos una interacción.

**Errores frecuentes:**
- Grabar con la pantalla llena de pestañas o notificaciones. Activa el modo «No molestar».

---

## 📎 Ejemplo de la clase

👉 **[Ejemplo de entrega final de Verde Vivo](ejemplo-eft.md)**

Ahí verás la lista de capturas que conviene sacar, cómo se ordenó el informe de Verde Vivo, tres desafíos reales del proyecto, la estructura de la presentación y un guion de video que dura menos de 2 minutos.

> ⚠️ El ejemplo es para **comparar**, no para copiar. Tu entrega tiene que ser sobre **tu** proyecto (el caso del señor Graham), con tus propios textos, colores e imágenes.

---

## ✅ Checklist final

**Informe**
- [ ] Portada, Inicio, Desarrollo, Cierre y anexos.
- [ ] Brief, problemas y necesidades, y licencias.
- [ ] Arquitectura de la información, diseño de interfaz, maquetas funcionales y programación.
- [ ] Al menos 3 desafíos con su solución.
- [ ] Cada objetivo del brief evaluado en el Cierre.
- [ ] URL del sitio publicado.
- [ ] Capturas nombradas y con la versión final.

**Video**
- [ ] Entre 1 min 30 s y 2 min.
- [ ] Entre 7 y 10 diapositivas, una idea clave por diapositiva.
- [ ] Coherente con el informe y enfocado en el funcionamiento y la programación.
- [ ] Buena iluminación y audio claro.

---

## ❓ Preguntas de repaso

<details>
<summary>1. ¿Qué va en cada parte del informe?</summary>

Inicio: brief y objetivos. Desarrollo: arquitectura de la información, diseño de interfaz, maquetas funcionales, desafíos y soluciones. Cierre: resultados y cómo se lograron los objetivos.
</details>

<details>
<summary>2. ¿Cuánto debe durar el video y cuántas diapositivas lleva?</summary>

Entre 1,5 y 2 minutos como máximo, con un mínimo de 7 y un máximo de 10 diapositivas.
</details>

<details>
<summary>3. ¿En qué debe enfocarse el video?</summary>

En los aspectos más importantes del funcionamiento del sitio y su programación, siendo coherente con el informe.
</details>

<details>
<summary>4. ¿Por qué la EFT vuelve a evaluar el brief y el mapa?</summary>

Porque evalúa el proceso completo: los criterios 1 a 11 revisan cada etapa del proyecto terminado y el 12 evalúa cómo lo presentas.
</details>

<details>
<summary>5. ¿Cómo se escribe un buen desafío en el informe?</summary>

Con la fórmula desafío → causa → solución → resultado, apoyada por una evidencia (captura o dato).
</details>

---

## 📤 Entrega

- **Actividad:** Evaluación Final Transversal (EFT).
- **Formato:** **informe escrito** (Inicio, Desarrollo y Cierre) y **video de 1,5 a 2 minutos** con **7 a 10 diapositivas**, según las instrucciones del AVA.
- **Fecha límite:** **lunes 21 de diciembre de 2026 a las 23:59 hrs**, por el AVA.
- **Se evalúa (rúbrica, 100 puntos):** los 11 indicadores del ramo en tu proyecto terminado y la presentación del proceso de desarrollo.

> Este tutorial complementa la guía de aprendizaje y la clase sincrónica. Tu entrega debe ser trabajo propio.
