# Tutorial Figma desde cero · Verde Vivo

Nov 3, 2026 · @AbecerraGuz

## Introducción

Al terminar este tutorial tendrás en Figma la Home de Verde Vivo en Desktop, Tablet y Mobile, construida con variables, estilos de texto y componentes reutilizables, más un prototipo básico. Es el mismo proceso que debes aplicar a tu proyecto en la AF2.

No necesitas saber Figma. Cada etapa explica qué hacer, dónde hacer clic y cómo comprobar que quedó bien antes de seguir.

**Cómo usar este tutorial**

- Sigue las etapas en orden. Cada una usa lo que creaste en la anterior.
- Al final de cada etapa hay una lista **Comprueba**. No avances si algún punto no se cumple.
- Si algo no funciona, revisa la sección **Errores frecuentes** al final.
- Los atajos de teclado aparecen así: Mac / Windows. Ejemplo: Cmd + D / Ctrl + D.

**Plan de trabajo sugerido (unas 8 horas en total)**

| Etapa | Qué construyes | Tiempo aprox. |
| --- | --- | --- |
| 0. Conocer Figma | Cuenta, archivo y páginas | 30 min |
| 1. Variables | Colores, tamaños, tipografía y modos responsive | 90 min |
| 2. Estilos de texto y guía | Text Styles y página Guía de estilos | 45 min |
| 3. Componentes | Botones, chips, tarjetas, header y más | 2 h |
| 4. Home responsive | Desktop, Tablet y Mobile | 2 h 30 min |
| 5. Anotaciones y accesibilidad | Capas de documentación | 20 min |
| 6. Prototipo | Hover, navegación y menú mobile | 20 min |
| 7. Revisión y entrega | Exportar y adaptar a tu proyecto | 30 min |

Consejo: no lo hagas todo en un día. Una buena división es Etapas 0 a 2 en una sesión, Etapa 3 en otra y Etapas 4 a 7 en una tercera.

## Etapa 0 · Conocer Figma

En esta etapa creas tu archivo y aprendes las cinco herramientas que usarás todo el tutorial.

### 0.1 Crear la cuenta y el archivo

1. Entra a figma.com y crea una cuenta con tu correo institucional de Duoc UC. Con correo educacional puedes solicitar el plan Education, que es gratuito.
2. En la pantalla de inicio, haz clic en **+ Crear** (o **New**) y elige **Diseño** (Figma Design). No elijas FigJam, Slides ni Make.
3. Cambia el nombre del archivo: haz doble clic en el nombre arriba al centro y escribe `PI_S3_TuApellido`.

### 0.2 La interfaz en 4 zonas

| Zona | Dónde está | Para qué sirve |
| --- | --- | --- |
| Barra de herramientas | Abajo al centro (o arriba, según versión) | Elegir frame, rectángulo, texto, pluma |
| Panel izquierdo | Izquierda | Páginas (arriba) y Capas (abajo) |
| Lienzo | Centro | Donde diseñas |
| Panel derecho | Derecha | Propiedades de lo que seleccionaste. Tiene las pestañas **Diseño** y **Prototipo** |

Regla de oro: **el panel derecho cambia según lo que tengas seleccionado.** Si no ves una opción, revisa primero qué capa está seleccionada.

### 0.3 Crear las páginas

En el panel izquierdo, junto a **Páginas**, haz clic en **+** y crea tres páginas con estos nombres exactos:

1. `Guía de estilos`
2. `Componentes`
3. `Wireframe alta · Home`

Para renombrar una página, haz doble clic sobre su nombre.

### 0.4 Atajos que vas a usar siempre

| Acción | Mac | Windows |
| --- | --- | --- |
| Frame | F | F |
| Rectángulo | R | R |
| Texto | T | T |
| Agregar Auto Layout | Shift + A | Shift + A |
| Crear componente | Option + Cmd + K | Ctrl + Alt + K |
| Duplicar | Cmd + D | Ctrl + D |
| Deshacer | Cmd + Z | Ctrl + Z |
| Ver todo el lienzo | Shift + 1 | Shift + 1 |
| Zoom a la selección | Shift + 2 | Shift + 2 |
| Moverse por el lienzo | Mantener Espacio y arrastrar | Mantener Espacio y arrastrar |

### 0.5 Glosario mínimo

- **Frame:** un contenedor, como una mesa de trabajo o una pantalla. Todo diseño vive dentro de un frame.
- **Capa:** cada elemento (texto, rectángulo, frame). Se ven en el panel izquierdo.
- **Auto Layout:** hace que un frame ordene su contenido solo, en fila o en columna, con espacios fijos. Es el equivalente a Flexbox en CSS.
- **Hug contents:** el frame se ajusta al tamaño de su contenido.
- **Fill container:** el elemento ocupa todo el espacio disponible del frame padre.
- **Fixed:** tamaño fijo que no cambia.
- **Componente:** un elemento maestro reutilizable (borde morado sólido en el ícono).
- **Instancia:** una copia de un componente. Si cambias el maestro, cambian todas las instancias.
- **Variante:** una versión de un componente, por ejemplo un botón en estado Hover.
- **Variable:** un valor con nombre (un color, un número) que reutilizas en todo el archivo.
- **Alias:** una variable que apunta a otra variable en vez de tener un valor propio.
- **Modo:** una versión distinta de los valores de una colección, por ejemplo Desktop, Tablet y Mobile.

### 0.6 Instalar las tipografías y los íconos

- Playfair Display y Lato son de Google Fonts y ya están disponibles en Figma en el navegador. Si usas la app de escritorio y no aparecen, instálalas desde fonts.google.com.
- Para los íconos, abre **Recursos** (Shift + I) → pestaña **Plugins** → busca **Iconify** → **Ejecutar**. Ahí puedes buscar íconos de línea como `leaf`, `sprout`, `menu` o `message-circle` (de la familia Lucide).

**Comprueba**

- [ ] Tu archivo es de Figma Design y tiene tu nombre.
- [ ] Tienes las 3 páginas con los nombres exactos.
- [ ] Al escribir Playfair Display y Lato en una caja de texto, la fuente cambia.
- [ ] El plugin Iconify abre y encuentra el ícono `leaf`.

## Etapa 1 · Variables

Las variables son la base de todo: si están bien hechas, cambiar un color en un solo lugar actualiza el sitio completo.

### Por qué hay tres niveles

1. **Primitivos:** la paleta en bruto. Ejemplo: `green/800 = #1B4332`. Responden a *qué color es*.
2. **Semantic Tokens:** el uso. Ejemplo: `text/primary → green/800`. Responden a *para qué se usa*.
3. **Componentes y pantallas:** solo usan Semantic Tokens.

Si mañana Camila quiere el texto un poco más claro, cambias el alias de `text/primary` y todo el sitio se actualiza. Nunca tocas los botones uno por uno.

### 1.1 Abrir el panel de Variables

1. Presiona **Esc** varias veces hasta que no haya nada seleccionado.
2. En el panel derecho, busca la sección **Variables locales** y haz clic en el ícono para abrirlas. En algunas versiones aparece como **Variables** en la barra lateral izquierda.
3. Se abre una ventana con **Colecciones** a la izquierda y una tabla Nombre / Valor a la derecha.

### 1.2 Crear las colecciones primitivas de color

Para cada colección:

1. Haz clic en **+** junto a **Colecciones** y escribe el nombre (`green`).
2. Haz clic en **+ Crear variable** → **Color**.
3. Escribe el nombre (`100`) y en Valor pega el código hexadecimal (`D8F3DC`).
4. Repite con cada valor. Truco: clic derecho sobre una variable → **Duplicar**, y luego cambias nombre y valor.

| Colección | Variables (nombre — valor) |
| --- | --- |
| green | 100 #D8F3DC · 200 #B7E4C7 · 300 #95D5B2 · 400 #74C69D · 500 #52B788 · 600 #40916C · 700 #2D6A4F · 800 #1B4332 · 900 #081C15 |
| gold | 100 #F6EBD9 · 300 #E3C38F · 500 #C8963E · 700 #9A6B22 · 800 #7F5819 |
| neutral | 0 #FFFFFF · 100 #F8F5F0 · 200 #EFEAE2 · 300 #DDD6CC · 400 #B9B2A8 · 500 #8A857D · 600 #5A6470 · 700 #3F4650 · 800 #2B2F33 · 900 #1C1C1F |
| red | 100 #FDECEA · 500 #C0392B · 700 #8E2A20 |
| blue | 100 #E3F0F7 · 500 #2F6F8F · 900 #173A4B |

Cuando en este tutorial leas `green/800`, significa: colección **green**, variable **800**.

### 1.3 Crear los Semantic Tokens (alias)

1. Crea la colección `Semantic Tokens`.
2. Crea una variable de tipo **Color** y nómbrala con una barra: `text/primary`. La barra crea automáticamente el grupo **text**, que aparece en **Grupos**.
3. En **Valor**, no escribas un hexadecimal. Haz clic en la muestra de color → en la ventana que se abre, elige la pestaña de **variables/bibliotecas** → busca la colección **green** → elige **800**.
4. El valor debe verse como una etiqueta `green/800`, no como `1B4332`. Eso confirma que es un alias.

**Texto**

| Variable | Alias de |
| --- | --- |
| text/primary | green/800 |
| text/secondary | neutral/600 |
| text/heading | green/800 |
| text/link | green/700 |
| text/on-action | neutral/0 |
| text/invert | neutral/100 |
| text/disabled | neutral/500 |
| text/error | red/700 |

**Fondos**

| Variable | Alias de |
| --- | --- |
| bg/page | neutral/100 |
| bg/surface | neutral/0 |
| bg/subtle | green/100 |
| bg/placeholder | green/100 |
| bg/action-primary | gold/700 |
| bg/action-primary-hover | gold/800 |
| bg/action-secondary-hover | green/100 |
| bg/chip-selected | green/100 |
| bg/footer | green/800 |
| bg/annotation | gold/100 |
| bg/disabled | neutral/300 |
| bg/error | red/100 |
| bg/info | blue/100 |

**Bordes**

| Variable | Alias de |
| --- | --- |
| border/primary | green/700 |
| border/secondary | green/500 |
| border/subtle | green/100 |
| border/divider | green/500 |
| border/focus | green/800 |
| border/disable | neutral/400 |
| border/error | red/500 |
| border/invert | neutral/100 |

Ojo con el botón principal: el dorado claro `gold/500` (#C8963E) con texto blanco no cumple el contraste mínimo de accesibilidad (WCAG AA pide 4,5:1). Por eso `bg/action-primary` usa el dorado más oscuro `gold/700`. Compruébalo tú en https://webaim.org/resources/contrastchecker/

### 1.4 Crear la colección Size

Crea la colección `Size`. Todas sus variables son de tipo **Número**. Usa la barra para agrupar.

| Grupo | Variables y valores |
| --- | --- |
| space | space/4 = 4 · space/8 = 8 · space/16 = 16 · space/24 = 24 · space/32 = 32 · space/48 = 48 · space/64 = 64 · space/96 = 96 |
| radius | radius/sm = 4 · radius/md = 8 · radius/pill = 999 |
| border-width | border-width/thin = 1 · border-width/regular = 1.5 · border-width/focus = 2 |
| icon | icon/sm = 16 · icon/md = 24 |
| touch | touch/min = 44 |

`touch/min = 44` es el tamaño mínimo recomendado para que un botón se pueda tocar con el dedo sin errores. Es la Ley de Fitts aplicada.

Opcional pero recomendado: haz doble clic en el ícono de una variable → **Alcance** (Scope). Por ejemplo, deja los `radius` solo para **Radio de esquina** y los `space` solo para **Espacio entre elementos** y **Relleno**. Así, cuando vincules un valor, Figma te mostrará solo las variables que corresponden.

### 1.5 Crear la colección Typography Tokens

| Variable | Tipo | Valor |
| --- | --- | --- |
| font/family/heading | Texto (String) | Playfair Display |
| font/family/body | Texto (String) | Lato |
| font/weight/regular | Número | 400 |
| font/weight/bold | Número | 700 |
| font/size/body | Número | 16 |
| font/size/small | Número | 14 |
| font/size/label | Número | 12 |
| font/line-height/body | Número | 26 |

El nombre de la fuente se escribe sin comillas, exactamente como aparece en Figma.

### 1.6 Crear la colección Responsive (con modos)

Esta colección es especial: cada variable tiene **un valor distinto por dispositivo**.

1. Crea la colección `Responsive`.
2. Arriba de la columna de valores verás **Modo 1**. Haz doble clic y renómbralo `Desktop`.
3. Haz clic en el **+** a la derecha de los encabezados para agregar un modo. Llámalo `Tablet`. Repite y crea `Mobile`.
4. Crea las variables de tipo **Número** y completa las tres columnas:

| Variable | Desktop | Tablet | Mobile |
| --- | --- | --- | --- |
| device | 1440 | 768 | 375 |
| grid/columns | 12 | 8 | 4 |
| grid/margin | 80 | 32 | 16 |
| grid/gutter | 24 | 24 | 16 |
| space/section | 96 | 80 | 64 |
| font/size/h1 | 48 | 40 | 32 |
| line-height/h1 | 56 | 48 | 40 |
| font/size/h2 | 36 | 30 | 26 |
| line-height/h2 | 44 | 38 | 34 |
| font/size/h3 | 20 | 20 | 18 |

Más adelante le dirás a cada pantalla qué modo usar, y los títulos y espacios cambiarán de tamaño solos.

**Comprueba**

- [ ] Tienes 9 colecciones: green, gold, neutral, red, blue, Semantic Tokens, Size, Typography Tokens y Responsive.
- [ ] En Semantic Tokens, todos los valores se ven como etiquetas (`green/800`), ninguno como hexadecimal.
- [ ] Semantic Tokens tiene 3 grupos: text (8), bg (13) y border (8).
- [ ] Responsive tiene 3 columnas: Desktop, Tablet y Mobile.
- [ ] Los nombres están escritos exactamente igual que en las tablas, sin espacios extra.

## Etapa 2 · Estilos de texto y guía de estilos

Los estilos de texto guardan la combinación de fuente, tamaño e interlineado para que todos los títulos del sitio sean idénticos.

### 2.1 Cómo vincular una variable (lo usarás en todo el tutorial)

Casi cada campo del panel derecho se puede vincular a una variable:

- **Colores (relleno o borde):** haz clic en la muestra de color → pestaña de **variables/bibliotecas** → elige la variable.
- **Números (tamaño de fuente, relleno, espacio, radio, borde):** pasa el mouse sobre el campo y aparece un ícono pequeño de **hexágono**. Haz clic y elige la variable.

Un campo vinculado se ve como una etiqueta gris con el nombre de la variable. Si ves un número suelto, no está vinculado.

### 2.2 Crear los Text Styles

Ve a la página **Guía de estilos**. Para cada estilo:

1. Presiona **T**, haz clic en el lienzo y escribe un texto de ejemplo (`Título H1`).
2. En el panel derecho, sección **Tipografía**, vincula la familia, el tamaño y el interlineado a sus variables (tabla de abajo). El peso (Bold o Regular) se elige en el menú desplegable de peso.
3. Haz clic en el ícono de **cuatro puntos** (Estilos) de la sección Tipografía → **+** → escribe el nombre del estilo → **Crear estilo**.

| Estilo | Familia | Peso | Tamaño | Interlineado | Extra |
| --- | --- | --- | --- | --- | --- |
| H1 | font/family/heading | Bold | font/size/h1 | line-height/h1 |  |
| H2 | font/family/heading | Bold | font/size/h2 | line-height/h2 |  |
| H3 | font/family/body | Bold | font/size/h3 | Auto |  |
| Body | font/family/body | Regular | font/size/body | font/line-height/body |  |
| Small | font/family/body | Regular | font/size/small | Auto |  |
| Label | font/family/body | Bold | font/size/label | Auto | Mayúsculas (Aa → AG) y espaciado de letras 1 px |

Importante: el **color no forma parte del estilo de texto**. Lo asignas aparte, en **Relleno**, usando un Semantic Token (por ejemplo, `text/heading` para H1 y H2).

Ahora entiendes por qué `font/size/h1` está en la colección Responsive: el mismo estilo H1 medirá 48 px en Desktop y 32 px en Mobile.

### 2.3 Construir la página Guía de estilos

Esta página es tu documentación visual. Es lo que el cliente aprueba.

1. Presiona **F** y en el panel derecho elige el tamaño **Desktop** o escribe ancho 1440. Nombra el frame `Guía de estilos`.
2. Con el frame seleccionado, presiona **Shift + A** para agregar Auto Layout. Elige dirección **vertical** (flecha hacia abajo).
3. Vincula: relleno (padding) a `space/64`, espacio entre elementos (gap) a `space/48` y el color de relleno del frame a `bg/page`.
4. Cambia la altura del frame a **Hug contents** para que crezca con el contenido.

Agrega estos bloques, uno debajo de otro:

1. Título `Verde Vivo · Guía de estilos` con estilo H1 y una línea de descripción con estilo Body.
2. **Primitivos:** una fila por colección con sus muestras.
3. **Semantic Tokens:** una muestra por token, con el alias escrito debajo (`bg/action-primary → gold/700`).
4. **Escala tipográfica:** un ejemplo de H1, H2, H3, Body, Small y Label, cada uno con su estilo aplicado.
5. **Espaciados:** barras de 4, 8, 16, 24, 32, 48, 64 y 96 px de ancho, con su nombre.
6. **Radios:** tres cuadrados con radius/sm, radius/md y radius/pill.
7. **Contraste:** una tabla con las combinaciones probadas en WebAIM y su resultado.
8. Un texto que diga `Componentes: ver página Componentes`.

**Cómo hacer una muestra de color rápido**

1. Dibuja un rectángulo de 80 × 80 (R) y vincula su relleno a la variable. No copies el hexadecimal.
2. Debajo, agrega dos textos: el nombre (`green/800`) y el valor (`#1B4332`), con estilo Small.
3. Selecciona los tres elementos y presiona **Shift + A**. Ya tienes una muestra.
4. Duplícala (Cmd + D / Ctrl + D) y solo cambia la variable y los textos.
5. Pon las muestras de una misma colección en un frame con Auto Layout horizontal, con gap `space/16`.

**Comprueba**

- [ ] Tienes 6 estilos de texto: H1, H2, H3, Body, Small y Label.
- [ ] Al seleccionar el texto H1, el tamaño aparece como etiqueta `font/size/h1`, no como el número 48.
- [ ] Cada muestra de color tiene el relleno vinculado a una variable.
- [ ] El frame Guía de estilos crece solo al agregar contenido (Hug contents).

## Etapa 3 · Componentes

Un componente se diseña una vez y se reutiliza en todas las pantallas. Trabaja en la página **Componentes**.

Estos componentes siguen la metodología Atomic Design que viste en el material de la semana:

| Nivel | Componentes de Verde Vivo |
| --- | --- |
| Átomos | Badge, Annotation |
| Moléculas | Button / Primary, Button / Secondary, Chip, Image Placeholder |
| Organismos | Card / Plant, Article / Item, Header |
| Plantillas y páginas | La Home (Etapa 4) |

### 3.1 La receta para cualquier componente con variantes

1. Construye la versión normal con Auto Layout y todos sus valores vinculados a variables.
2. Selecciónala y presiona **Option + Cmd + K / Ctrl + Alt + K**. Ahora es un componente (ícono de cuatro rombos).
3. En el panel derecho, haz clic en **+ Agregar variante**. Figma crea un **conjunto de componentes** (borde morado punteado) con dos variantes.
4. En el panel derecho, cambia el nombre de la propiedad (por defecto *Property 1*) por el que indica cada componente, por ejemplo `State`.
5. Selecciona cada variante y escribe su valor: `Default`, `Hover`, etc. Luego cambia solo lo que la hace distinta.
6. Con el conjunto seleccionado: alto y ancho en **Hug contents**, relleno `space/24` y **Recortar contenido** (Clip content) desactivado.

Nombra los componentes con barra (`Button / Primary`). Así Figma los agrupa en el panel de recursos.

### 3.2 Button / Primary

1. Escribe el texto `Ver plantas`: familia `font/family/body`, peso Bold, tamaño `font/size/body`, relleno `text/on-action`.
2. Selecciónalo y presiona **Shift + A**. Se crea un frame con Auto Layout horizontal alrededor del texto.
3. Configura el frame:
   - Relleno horizontal `space/24` y vertical `space/8`.
   - Alineación centrada.
   - Alto mínimo `touch/min`: abre el menú del alto → **Agregar alto mínimo** → vincúlalo.
   - Radio `radius/sm`.
   - Color de relleno `bg/action-primary`.
4. Antes de convertirlo en componente, duplícalo (Cmd + D / Ctrl + D) y aparta la copia. La usarás en el paso 3.3.
5. Conviértelo en componente con la propiedad `State` y 4 variantes:

| State | Qué cambia |
| --- | --- |
| Default | Nada (es la base) |
| Hover | Relleno `bg/action-primary-hover` |
| Focus | Borde `border/focus`, grosor `border-width/focus`, posición **Exterior** |
| Disabled | Relleno `bg/disabled` y texto `text/disabled` |

El estado Focus muestra dónde está el teclado. Sin él, una persona que navega con Tab no sabe qué botón está activo.

### 3.3 Button / Secondary

Toma la copia que apartaste y cámbiale:

- Relleno: elimínalo (fondo transparente).
- Borde: `border/primary`, grosor `border-width/regular`, posición **Interior**.
- Texto: `text/link`. Cambia la palabra a `Ver ficha`.

Conviértelo en componente con las mismas 4 variantes:

| State | Qué cambia |
| --- | --- |
| Default | Nada |
| Hover | Relleno `bg/action-secondary-hover` |
| Focus | Borde `border/focus`, grosor `border-width/focus` |
| Disabled | Borde `border/disable` y texto `text/disabled` |

### 3.4 Chip

1. Texto `Interior` con estilo Body y color `text/link`.
2. Shift + A. Relleno horizontal `space/16`, alto mínimo `touch/min`, alineación centrada.
3. Radio `radius/pill`, borde `border/primary` con grosor `border-width/thin`.
4. Componente con propiedad `State`: `Default` y `Selected`. En Selected, relleno `bg/chip-selected`.

### 3.5 Badge

1. Texto `INTERIOR` con estilo Label y color `text/link`.
2. Shift + A. Relleno vertical `space/4`, horizontal `space/8`.
3. Relleno de color `bg/subtle`, radio `radius/pill`.
4. Conviértelo en componente. No necesita variantes.

### 3.6 Image Placeholder

Representa una foto que todavía no existe. En un wireframe de alta resolución describe la imagen en vez de usar una foto de internet.

1. Con Iconify, inserta el ícono `sprout` de Lucide. Tamaño `icon/md`. Color del trazo `border/secondary`.
2. Agrega un texto `Foto: descripción` con estilo Small y color `text/secondary`.
3. Selecciona ambos → Shift + A → dirección **vertical**, alineación **centrada**, gap `space/8`.
4. Tamaño del frame: 320 × 240 (proporción 4:3). Relleno de color `bg/placeholder`.
5. Al texto ponle ancho **Fill container**, alineación centrada y alto **Auto height**. Así las descripciones largas no se salen.
6. Conviértelo en componente.
7. Selecciona el texto dentro del componente. En el panel derecho, junto a **Contenido**, haz clic en el ícono de propiedad → crea la propiedad de texto `Descripción`. Ahora puedes cambiar la descripción de cada copia desde el panel derecho.

### 3.7 Card / Plant

1. Crea un frame vertical con Auto Layout: relleno `space/16`, gap `space/16`, ancho 410.
2. Relleno `bg/surface`, borde `border/subtle` grosor `border-width/thin`, radio `radius/md`.
3. Dentro, en este orden:
   - Una instancia de **Image Placeholder** con ancho **Fill container**.
   - Una instancia de **Badge**.
   - El nombre `Monstera deliciosa` con estilo H3 y color `text/primary`.
   - El precio `$14.990`: familia body, Bold, tamaño `font/size/body`.
   - Una instancia de **Button / Secondary** con el texto `Ver ficha`.
4. Conviértelo en componente con la propiedad `Size`:

| Size | Diseño |
| --- | --- |
| Default | Como lo construiste. Para Desktop y Tablet |
| Compact | Ancho 343. Sin badge, sin precio y sin botón. Debajo del nombre, un texto Small en `text/secondary`: `Interior · $14.990`. Para Mobile |

Para arrastrar una instancia de otro componente, abre **Recursos** (Shift + I) y búscala por su nombre.

### 3.8 Article / Item

1. Frame con Auto Layout **horizontal**: relleno `space/16`, gap `space/16`, ancho 560, alto **Hug contents**.
2. Relleno `bg/surface`, borde `border/subtle`, radio `radius/md`.
3. A la izquierda, una instancia de Image Placeholder de 148 × 148 con la descripción `Foto del artículo`.
4. A la derecha, una columna vertical con gap `space/8` y ancho **Fill container**:
   - Título H3 en `text/primary`: `¿Cada cuánto regar tus plantas de interior?`
   - Bajada en Body y `text/secondary`.
   - Enlace `Leer` en Body, color `text/link`, subrayado.
5. A los textos ponles ancho **Fill container** y alto **Auto height**.
6. Conviértelo en componente con la propiedad `Layout`:

| Layout | Diseño |
| --- | --- |
| Horizontal | Como lo construiste. Para Desktop y Tablet |
| Mobile | Ancho 343 e imagen de 96 × 96 |

No pongas un alto fijo. Si el título ocupa tres líneas, la tarjeta debe crecer sola. Por eso usamos Hug contents.

### 3.9 Header

1. Logo: ícono `leaf` (icon/md, color `text/link`) + texto `Verde Vivo` en Playfair Display Bold 24, color `text/heading`. Agrúpalos con Shift + A (horizontal, gap `space/8`).
2. Menú: cuatro textos en Body, color `text/primary` (`Plantas`, `Cuidados`, `Nosotros`, `Contacto`). Shift + A horizontal, gap `space/32`.
3. Una instancia de **Button / Secondary** con el texto `WhatsApp` y el ícono `message-circle` antes del texto.
4. Selecciona logo, menú y botón → Shift + A horizontal. En la distribución elige **Espacio entre** (Space between). Ancho 1280, relleno vertical `space/16`, alineación centrada verticalmente.
5. Borde inferior: borde `border/divider`, grosor 1. En las opciones del borde, elige que se aplique solo **abajo**.
6. Conviértelo en componente con la propiedad `Mode`:

| Mode | Contenido |
| --- | --- |
| Desktop | Logo + menú + botón WhatsApp |
| Mobile | Ancho 343. Logo + Button / Secondary con ícono `menu` y texto `Menú`. Oculta el menú de texto |

### 3.10 Annotation

1. Texto en Lato Regular 11, color `text/primary`: `1 · HEADER — logo arriba a la izquierda`.
2. Shift + A. Relleno vertical `space/4`, horizontal `space/8`. Relleno de color `bg/annotation`. Radio `radius/sm`.
3. Conviértelo en componente y crea la propiedad de texto `Texto` (como en Image Placeholder).

### 3.11 Ordenar la página Componentes

1. Crea un frame de 1440 con Auto Layout vertical, relleno `space/64`, gap `space/48`, relleno de color `bg/page`.
2. Dentro, crea 4 bloques. Cada uno con un título H2, una línea de descripción y sus componentes:
   - **Acciones y filtros:** Button / Primary, Button / Secondary, Chip, Badge.
   - **Contenido y descubrimiento:** Card / Plant, Image Placeholder, Article / Item.
   - **Navegación:** Header.
   - **Utilidades de documentación:** Annotation.
3. En Contenido y descubrimiento, pon Image Placeholder y Article / Item en recuadros separados, cada uno con su título, fondo `bg/surface` y borde `border/subtle`. Si quedan juntos sin rótulo, parecen una sola tarjeta.

**Comprueba**

- [ ] Cada componente tiene borde morado y aparece en Recursos (Shift + I).
- [ ] Los botones tienen 4 variantes: Default, Hover, Focus y Disabled.
- [ ] Ningún color está escrito como hexadecimal: todos son etiquetas de Semantic Tokens.
- [ ] Al escribir un título largo en Article / Item, la tarjeta crece y el texto no se corta.
- [ ] En los conjuntos de componentes, Recortar contenido está desactivado y ninguna variante se ve cortada.

## Etapa 4 · Home responsive

Primero construyes la Home Desktop completa. Después la duplicas y la adaptas a Tablet y Mobile. Así no repites trabajo.

Trabaja en la página **Wireframe alta · Home**. Ten a mano tu wireframe de baja resolución de la Semana 2: la estructura no cambia, solo se viste.

### 4.1 Crear el frame Desktop

1. Presiona **F** y crea un frame de ancho 1440. Nómbralo `Home · Desktop`.
2. Shift + A → dirección **vertical**. Gap `space/section`. Relleno en **0**. Alto **Hug contents**.
3. Relleno de color `bg/page`.
4. **Asignar el modo:** con el frame seleccionado, en el panel derecho, sección **Capa**, haz clic en el ícono de **modo de variable** → **Responsive** → **Desktop**.
5. **Cuadrícula:** en la sección **Cuadrícula de diseño** (Layout grid) haz clic en **+** → cambia *Cuadrícula* por **Columnas** → tipo **Estirar** (Stretch). Vincula: cantidad `grid/columns`, margen `grid/margin`, medianil (gutter) `grid/gutter`. Si tu versión no permite vincular estos campos, escribe 12, 80 y 24.

¿Por qué el relleno del frame es 0? Porque las secciones Nosotros y Footer tienen fondo de color de borde a borde. Si el frame tuviera márgenes, esos fondos quedarían cortados. Por eso, cada sección tendrá su propio margen lateral.

### 4.2 La estructura de cada sección

Todas las secciones se arman igual:

1. Un frame llamado `Sección · Nombre` con Auto Layout.
2. Ancho **Fill container**. Alto **Hug contents**.
3. Relleno horizontal `grid/margin` (80 en Desktop).

**El truco de la grilla:** si dentro de una fila pones elementos con ancho **Fill container** y gap `grid/gutter`, quedan alineados a las columnas automáticamente. En Desktop, el contenido mide 1280 px:

| Elementos en la fila | Ancho de cada uno | Columnas que ocupa |
| --- | --- | --- |
| 2 | 628 px | 6 de 12 |
| 3 | 410 px | 4 de 12 |
| 4 | 302 px | 3 de 12 |

Activa la cuadrícula (Ctrl + G en Mac, Ctrl + Shift + 4 en Windows, o desde el panel) para verificarlo.

### 4.3 Header

1. Inserta una instancia de **Header** con `Mode = Desktop`.
2. Ponla dentro de `Sección · Header` y deja la instancia en **Fill container**.

### 4.4 Hero

1. `Sección · Hero` con Auto Layout **horizontal**, gap `grid/gutter`, alineación vertical **centrada**.
2. Izquierda: instancia de **Image Placeholder**, ancho Fill, alto 392 (proporción 16:10). Descripción: `Foto: plantas en un departamento con luz natural`.
3. Derecha: un frame vertical, ancho Fill, gap `space/24`, con:
   - Label `VIVERO ARTESANAL · SANTIAGO` en `text/link`.
   - H1 `Plantas que se adaptan a tu espacio` en `text/heading`.
   - Body `Vivero artesanal con asesoría personalizada para elegir y cuidar tus plantas.` en `text/secondary`.
   - Una fila horizontal (gap `space/16`) con **Button / Primary** `Ver plantas` y **Button / Secondary** `Escríbenos por WhatsApp`.

El orden imagen → título → botón sigue el **patrón Z**: el ojo recorre logo, menú, título y termina en el botón dorado.

### 4.5 Acceso rápido

1. `Sección · Acceso rápido` con Auto Layout horizontal, gap `space/8`.
2. Cinco instancias de **Chip**: Interior, Exterior, Suculentas y cactus, Aromáticas, Frutales enanos.

### 4.6 Plantas destacadas

1. `Sección · Destacadas` con Auto Layout vertical, gap `space/24`.
2. H2 `Plantas destacadas` en `text/heading`.
3. Una fila horizontal (ancho Fill, gap `grid/gutter`) con tres instancias de **Card / Plant** en `Size = Default` y ancho Fill:

| Nombre | Badge | Precio | Descripción de la imagen |
| --- | --- | --- | --- |
| Monstera deliciosa | INTERIOR | $14.990 | Foto: monstera en maceta de greda |
| Lavanda | AROMÁTICAS | $5.990 | Foto: lavanda en maceta artesanal |
| Echeveria | SUCULENTAS | $3.990 | Foto: echeveria en maceta pequeña |

### 4.7 Cuidados

1. `Sección · Cuidados` vertical, gap `space/24`. H2 `Aprende a cuidarlas`.
2. Fila horizontal (gap `grid/gutter`) con dos **Article / Item** en `Layout = Horizontal` y ancho Fill:
   - `¿Cada cuánto regar tus plantas de interior?` / `Una guía simple según la estación y el tipo de planta.`
   - `Luz directa o indirecta: cómo elegir el lugar` / `Aprende a leer la luz de tu casa antes de comprar.`

### 4.8 Nosotros

1. `Sección · Nosotros` horizontal, gap `grid/gutter`, relleno vertical `space/64`, alineación vertical centrada.
2. Relleno de color `bg/subtle`. Esta sección tiene fondo de borde a borde.
3. Izquierda: frame vertical, ancho Fill, gap `space/24`, con Label `NUESTRA HISTORIA`, H2 `Conoce a Camila`, Body `Verde Vivo nació en el patio de su casa. Hoy Camila cultiva cada planta a mano y te acompaña a elegir la indicada para tu espacio.` y **Button / Secondary** `Nuestra historia`.
4. Derecha: **Image Placeholder**, ancho Fill, alto 360. Descripción: `Foto: Camila en el vivero`. Agrégale borde `border/secondary` para que se distinga del fondo verde.

### 4.9 Footer

1. `Sección · Footer` horizontal, gap `grid/gutter`, relleno vertical `space/48`. Relleno de color `bg/footer`.
2. Cuatro columnas verticales (ancho Fill, gap `space/8`). Título en Body Bold y contenido en Small. Todo el texto en `text/invert`:

| Título | Contenido |
| --- | --- |
| Dirección | \[DIRECCIÓN DEL VIVERO\] |
| Horarios | \[DÍAS Y HORAS\] |
| Contacto | WhatsApp · Instagram @verdevivo |
| Verde Vivo | © Vivero artesanal |

### 4.10 Crear Tablet a partir de Desktop

1. Selecciona `Home · Desktop` y duplícalo. Ubica la copia 120 px a la derecha. Nómbrala `Home · Tablet`.
2. Cambia el ancho a **768** y el modo de variable a **Responsive → Tablet**. Los títulos, márgenes y espacios se ajustan solos.
3. Si la cuadrícula no está vinculada, cámbiala a 8 columnas, margen 32 y gutter 24.
4. Ajusta lo que la grilla de 8 columnas no resuelve sola:

| Sección | Cambio en Tablet |
| --- | --- |
| Header | Se mantiene `Mode = Desktop` |
| Hero | Sigue en 2 columnas. Imagen de alto 212. La fila de botones pasa a **vertical** y los botones a ancho Fill |
| Acceso rápido | En la fila de chips, activa **Ajustar** (Wrap) para que bajen a una segunda línea |
| Destacadas | En la fila de tarjetas activa **Ajustar** (Wrap), gap 24 en ambas direcciones, y fija el ancho de cada tarjeta en 340. Quedan 2 arriba y 1 abajo |
| Cuidados | Fila en **vertical**. Artículos con `Layout = Horizontal` y ancho Fill |
| Nosotros | Sigue en 2 columnas. Imagen de alto 280 |
| Footer | Activa **Ajustar** (Wrap) y fija cada columna en 340 de ancho. Quedan en 2 × 2 |

En Tablet, el contenido mide 704 px. Dos elementos de 340 px con gutter de 24 px ocupan exactamente 4 de 8 columnas cada uno.

### 4.11 Crear Mobile a partir de Tablet

1. Duplica `Home · Tablet`, ubícalo 120 px a la derecha y nómbralo `Home · Mobile`.
2. Ancho **375** y modo **Responsive → Mobile**. Cuadrícula de 4 columnas, margen 16, gutter 16 si no está vinculada.
3. Ajustes:

| Sección | Cambio en Mobile |
| --- | --- |
| Header | Instancia con `Mode = Mobile` |
| Hero | Sección en **vertical**. Imagen arriba, ancho Fill, alto 214. Botones con ancho Fill. Cambia el texto del secundario a `Escríbenos` |
| Acceso rápido | Desactiva Ajustar (una sola fila). En la sección activa **Recortar contenido**. El último chip queda cortado y sugiere que hay más |
| Destacadas | Fila en **vertical**. Tarjetas en `Size = Compact` y ancho Fill |
| Cuidados | Artículos en `Layout = Mobile` y ancho Fill |
| Nosotros | Sección en **vertical**. Arrastra la imagen para que quede **arriba** del texto |
| Footer | Fila en **vertical**. Columnas con ancho Fill |

Para reordenar elementos dentro de un Auto Layout, arrástralos en el panel de capas o selecciónalos y usa las flechas del teclado.

**Comprueba**

- [ ] Tienes 3 frames (Desktop 1440, Tablet 768, Mobile 375) separados por 120 px.
- [ ] Cada frame tiene asignado su modo de la colección Responsive.
- [ ] El H1 mide 48 px en Desktop, 40 px en Tablet y 32 px en Mobile sin que lo hayas cambiado a mano.
- [ ] Los fondos de Nosotros y Footer llegan de borde a borde.
- [ ] En Mobile, ningún botón mide menos de 44 px de alto.
- [ ] La estructura y el orden de las secciones son los mismos que en tu wireframe de baja resolución.

## Etapa 5 · Anotaciones y accesibilidad

Las anotaciones explican por qué cada sección es como es. Sirven para presentar al cliente y para el equipo de desarrollo, que la próxima semana serás tú.

### 5.1 El problema del Auto Layout (y cómo evitarlo)

Si arrastras una anotación dentro de una Home con Auto Layout, Figma la acomoda como una sección más y desordena todo. La solución es la **posición absoluta**: el elemento queda dentro del frame, pero el Auto Layout lo ignora.

### 5.2 Crear la capa Anotaciones

1. Dentro de `Home · Desktop`, crea un frame vacío y nómbralo `Anotaciones`.
2. En el panel derecho, haz clic en **Posición absoluta** (ícono junto a la posición X/Y).
3. Dale el mismo tamaño que la Home y ubícalo en X 0, Y 0. En **Restricciones**, elige **Izquierda y derecha** y **Arriba y abajo** para que se estire con la Home.
4. Quítale el relleno de color: debe ser transparente.
5. Dentro, coloca 7 instancias de **Annotation**, cada una sobre el borde superior de su sección:

| N.º | Texto de la anotación |
| --- | --- |
| 1 | HEADER — logo arriba a la izquierda (ley de Jakob), WhatsApp siempre visible |
| 2 | HERO — un mensaje, dos acciones (patrón Z, ley de Fitts) |
| 3 | ACCESO RÁPIDO — ahorra un paso a quien ya sabe qué busca |
| 4 | DESTACADAS — solo lo necesario para decidir el clic |
| 5 | CUIDADOS — genera confianza y trae tráfico desde buscadores |
| 6 | NOSOTROS — la persona detrás (Camila) es el diferenciador |
| 7 | FOOTER — los datos de contacto se repiten como respaldo |

6. Repite en Tablet y Mobile. Puedes copiar el frame Anotaciones y reubicar cada etiqueta.
7. Para presentar el diseño limpio, oculta la capa con el ícono del ojo en el panel de capas. No la borres.

### 5.3 Crear la capa Accesibilidad (solo Desktop)

Crea otro frame `Accesibilidad` con la misma técnica de posición absoluta. Dentro, usa instancias de Annotation para marcar:

- **Regiones:** `header`, `nav`, `main` y `footer`, cada una sobre su zona.
- **H1 único:** señala el título del Hero como el único H1 de la página.
- **Orden de tabulación:** números 1, 2, 3… sobre cada elemento interactivo, en el orden en que se recorre con la tecla Tab: logo, menú, WhatsApp, Ver plantas, Escríbenos, chips, Ver ficha, Leer, Nuestra historia.
- **Textos alternativos** sugeridos para las imágenes:

| Imagen | Texto alternativo (alt) |
| --- | --- |
| Hero | Plantas de interior junto a una ventana luminosa |
| Destacadas | Monstera / Lavanda / Echeveria en macetas artesanales (uno por tarjeta) |
| Nosotros | Camila cuidando plantas en su vivero |

Una imagen decorativa, que no aporta información, lleva `alt` vacío. Escríbelo así en la anotación: `alt=""`.

Oculta también esta capa para la presentación final, pero consérvala en el archivo.

**Comprueba**

- [ ] Al mostrar u ocultar Anotaciones, la Home no se mueve.
- [ ] Hay 7 anotaciones por frame.
- [ ] La capa Accesibilidad marca regiones, H1, orden de tabulación y textos alternativos.
- [ ] Ambas capas están ocultas, pero existen.

## Etapa 6 · Prototipo

El indicador de la AF2 pide una interfaz **interactiva**. Con estas tres interacciones lo cumples.

Todas se hacen en la pestaña **Prototipo** del panel derecho. Al seleccionar un elemento aparece un círculo en su borde: arrástralo hacia el destino o haz clic en **+** en la sección **Interacciones**.

### 6.1 Hover en los botones (se hace una vez, en el componente)

1. Ve a la página **Componentes** y selecciona la variante **Default** de Button / Primary.
2. Pestaña Prototipo → **+** en Interacciones.
3. Disparador: **Al pasar el cursor** (While hovering). Acción: **Cambiar a** (Change to). Destino: la variante **Hover**.
4. Repite en Button / Secondary.

Como lo hiciste en el componente, todos los botones de las tres Homes ya tienen hover.

### 6.2 Ver plantas → Catálogo

1. Crea un frame sencillo de 1440 llamado `Catálogo · Desktop`, con el Header, un H1 `Catálogo` y algunas Card / Plant. Ubícalo **debajo** de las Homes, no encima.
2. En `Home · Desktop`, selecciona el botón **Ver plantas**.
3. Disparador: **Al hacer clic**. Acción: **Navegar a** → `Catálogo · Desktop`.
4. En el catálogo, conecta el logo de regreso a `Home · Desktop`.

### 6.3 Menú Mobile

1. Crea un frame de 375 × 400 llamado `Menú · Mobile · Overlay`. Auto Layout vertical, relleno `space/24`, gap `space/16`, relleno de color `bg/surface`.
2. Dentro: los enlaces Plantas, Cuidados, Nosotros y Contacto (H3 en `text/primary`), un **Button / Primary** `WhatsApp` y un botón `Cerrar` con el ícono `x`.
3. En `Home · Mobile`, selecciona el botón **Menú**.
4. Disparador: **Al hacer clic**. Acción: **Abrir superposición** (Open overlay) → `Menú · Mobile · Overlay`. Posición: **Arriba al centro**. Marca **Cerrar al hacer clic fuera**.
5. En el overlay, selecciona `Cerrar` → Al hacer clic → **Cerrar superposición**.

### 6.4 Probar

Selecciona `Home · Desktop` y presiona el botón **Presentar** (triángulo ▷, arriba a la derecha). Pasa el mouse por los botones y haz clic en Ver plantas. Repite con `Home · Mobile`.

**Comprueba**

- [ ] Los botones cambian de color al pasar el mouse.
- [ ] Ver plantas abre el catálogo y el logo te devuelve a la Home.
- [ ] En Mobile, Menú abre el panel y Cerrar lo cierra.

## Etapa 7 · Revisión, entrega y tu propio proyecto

Verde Vivo es el ejemplo. Lo que entregas en la AF2 es **tu proyecto**, construido con este mismo método.

### 7.1 Adaptarlo a tu proyecto

La ventaja de las variables es que no empiezas de cero:

| Qué | ¿Lo cambias? | Cómo |
| --- | --- | --- |
| Nombres de colecciones y Semantic Tokens | No | Mantén `text/primary`, `bg/action-primary`, etc. Son genéricos |
| Valores de los primitivos | Sí | Reemplaza los hexadecimales por la paleta de tu moodboard. Puedes renombrar `green` y `gold` por tus colores |
| Alias de los Semantic Tokens | Revisa | Que cada uno apunte al tono correcto de tu paleta |
| Fuentes | Sí | Cambia los valores de `font/family/heading` y `font/family/body` por tu par tipográfico |
| Componentes | Ajusta | Los mismos componentes sirven. Crea los que tu sitio necesite |
| Secciones de la Home | Sí | Sigue **tu** wireframe de baja resolución de la Semana 2, no el de Verde Vivo |
| Textos e imágenes | Sí | Contenido real de tu proyecto según tu brief |

Al cambiar un primitivo, todo lo que lo usa se actualiza. Compruébalo: cambia `green/800` y mira cómo cambian todos los títulos.

Revisa el contraste de tus combinaciones de texto y fondo en https://webaim.org/resources/contrastchecker/ y agrega los resultados a tu guía de estilos.

### 7.2 Lista de revisión final

**Variables**

- [ ] Ningún color de componentes o pantallas es un hexadecimal suelto.
- [ ] Todos los Semantic Tokens son alias.
- [ ] Rellenos, gaps, radios y bordes están vinculados a variables.
- [ ] Las combinaciones de texto y fondo cumplen contraste AA (4,5:1).

**Componentes**

- [ ] No hay textos cortados.
- [ ] Los conjuntos de componentes usan Hug contents y tienen Recortar contenido desactivado.
- [ ] Las columnas de texto usan Fill container y los textos Auto height.

**Responsive**

- [ ] Desktop 1440, Tablet 768, Mobile 375, separados por 120 px.
- [ ] Cada frame tiene su modo Responsive asignado.
- [ ] Las cuadrículas existen, aunque estén ocultas.
- [ ] Las tarjetas y artículos usan la variante correcta en cada dispositivo.

**Presentación y prototipo**

- [ ] Capas Anotaciones y Accesibilidad ocultas, pero presentes.
- [ ] El catálogo y el overlay están fuera del área de las Homes.
- [ ] Hover, Ver plantas y Menú funcionan en modo Presentar.

### 7.3 Pedir opinión antes de entregar

La actividad pide recoger opiniones sobre tu diseño. Muéstralo a dos personas (un familiar, un compañero o en el foro del AVA) y pregúntales:

1. ¿Qué es lo primero que miras?
2. ¿Qué harías si quisieras comprar una planta?
3. ¿Hay algo que no se entienda?

Anota las respuestas y lo que cambiaste. Puedes incluirlo como una página más en tu entrega.

### 7.4 Exportar y entregar

1. Selecciona un frame (por ejemplo `Home · Desktop`).
2. En el panel derecho, sección **Exportar**, haz clic en **+**. Elige **JPG** con escala **2x**, o **PDF**.
3. Repite con: Guía de estilos, Componentes, Home Tablet, Home Mobile y tu wireframe de baja resolución.
4. Selecciona todos los frames y haz clic en **Exportar** una sola vez.
5. Comprime los archivos en un **.zip** y súbelo al AVA.
6. Agrega en la entrega el enlace a tu archivo de Figma (Compartir → Copiar enlace, con permiso **puede ver**).

Recuerda: la pauta evalúa también el brief, el análisis de necesidades, el mapa de navegación y los wireframes. Si al diseñar cambiaste algo de la estructura, actualiza también tu mapa y tu wireframe de baja.

Entrega de la AF2: lunes 9 de noviembre de 2026 a las 23:59.

## Errores frecuentes y soluciones

| Problema | Causa probable | Solución |
| --- | --- | --- |
| No encuentro una opción en el panel derecho | Está seleccionada otra capa | Revisa en el panel de capas qué está seleccionado |
| No aparece el ícono de hexágono para vincular | El campo no admite variables o el alcance (Scope) de la variable no lo incluye | Revisa el alcance de la variable en el panel de Variables |
| Al vincular un color, no veo mis variables | Estás en la pestaña de colores sueltos | En la ventana de color, cambia a la pestaña de variables/bibliotecas |
| Un Semantic Token muestra un hexadecimal | Escribiste el color en vez de elegir un alias | Borra el valor y elige la variable primitiva |
| El H1 no cambia de tamaño en Mobile | El frame no tiene asignado el modo, o el estilo H1 no está vinculado a `font/size/h1` | Asigna el modo en la sección Capa y revisa el estilo |
| Al agregar un elemento, todo se desordena | El frame tiene Auto Layout y lo acomoda como un elemento más | Usa **Posición absoluta** para anotaciones y elementos flotantes |
| Un texto se corta o se sale de la tarjeta | El texto tiene ancho fijo o el frame tiene alto fijo | Texto en Fill container y Auto height; frame en Hug contents |
| Una variante se ve cortada en la página Componentes | El conjunto tiene Recortar contenido activado o alto fijo | Desactiva Recortar contenido y usa Hug contents |
| Cambié algo en una instancia y no se actualizó en las demás | Editaste una copia, no el componente maestro | Haz el cambio en la página Componentes, sobre el componente con borde morado |
| El fondo de Nosotros no llega a los bordes | La Home tiene relleno lateral | Relleno de la Home en 0; margen dentro de cada sección |
| Las tarjetas no calzan con la cuadrícula | El gap no es igual al gutter o las tarjetas tienen ancho fijo | Gap `grid/gutter` y ancho Fill container |
| El hover no funciona en Presentar | La interacción está en la instancia, o no está en la variante Default | Agrégala a la variante Default del componente |
| Desvinculé un componente sin querer | Usaste Separar instancia | Cmd + Z / Ctrl + Z de inmediato, o reemplaza la capa por una instancia nueva |

Si algo no funciona y no está en esta tabla, deshaz los últimos pasos (Cmd + Z / Ctrl + Z) hasta el último **Comprueba** que te salió bien, y repite desde ahí.
