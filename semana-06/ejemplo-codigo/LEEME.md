# Verde Vivo · Ejemplo Semana 6 — Sitio dinámico con PHP y MySQL

Versión del sitio de Verde Vivo **al terminar la clase de la Semana 6**: las páginas pasan a `.php`, el catálogo y el detalle de plantas salen de una base de datos **MySQL**, el encabezado y el pie se reutilizan con `include` y el formulario de contacto guarda los mensajes.

La arquitectura es la misma del CMS que trabajaste en Lenguajes de Programación (`class/config.php`, la clase `db` y `header.php` / `footer.php`).

> Verde Vivo es un proyecto **ficticio** que usamos en clase. Úsalo para comparar, no para copiar: tu entrega es tu propio proyecto.

## Cómo correrlo en tu computador

1. Instala **XAMPP** (Windows) o **MAMP** (Mac) y enciende **Apache** y **MySQL**.
2. Copia esta carpeta (`ejemplo-codigo`) dentro de `htdocs` y renómbrala `verde-vivo`.
3. Abre **phpMyAdmin**, crea la base `verde_vivo` con cotejamiento `utf8mb4_general_ci`, entra a ella → **Importar** → `sql/verde_vivo.sql`.
4. En la carpeta `class/`, copia `config.example.php` como **`config.php`** y revisa los datos (en MAMP la contraseña suele ser `root`).
5. Abre `http://localhost/verde-vivo/` (en MAMP: `http://localhost:8888/verde-vivo/`).

## Qué contiene

```
ejemplo-codigo/
├── index.php, plantas.php, planta.php     ← páginas dinámicas (leen la base)
├── contacto.php                           ← valida y guarda mensajes (INSERT)
├── cuidados.php, articulo.php, nosotros.php ← páginas de contenido fijo con header/footer
├── header.php, footer.php                 ← encabezado y pie reutilizables
├── partes/tarjeta-planta.php              ← tarjeta que se repite en portada y catálogo
├── class/
│   ├── config.example.php                 ← plantilla de credenciales (copiar como config.php)
│   ├── db.php                             ← clase de conexión con consultas preparadas
│   └── helpers.php                        ← e() para escapar y precio() para formatear
├── sql/verde_vivo.sql                     ← tablas y datos de prueba
├── css/, scss/, js/, img/                 ← igual que la Semana 5
```

## Qué mirar

| Tema del tutorial | Dónde verlo |
|-------------------|-------------|
| Esquema con PK, FK y nombres sin tildes | `sql/verde_vivo.sql` |
| Credenciales fuera del repositorio | `class/config.example.php` y `.gitignore` |
| Listado dinámico con `foreach` | `plantas.php` y `partes/tarjeta-planta.php` |
| Filtro por categoría con consulta preparada | `plantas.php?categoria=suculentas` |
| Detalle por `id` con `(int)` y redirección si no existe | `planta.php?id=1` |
| Escapar todo lo que sale de la base | función `e()` en `class/helpers.php` |
| Validar y guardar un formulario (la «C» del CRUD) | `contacto.php` |
| `header.php` con título y página activa por variable | `$pageTitle` y `$paginaActiva` |

## Validación

- Todas las páginas generadas pasan el **W3C Validator** sin errores ni advertencias (validado sobre el HTML que entrega PHP).
- Probado con PHP 8 y MariaDB: catálogo, filtro, detalle, `id` inexistente y formulario con datos válidos e inválidos.

## Publicarlo en el hosting de Duoc

Exporta la base desde tu phpMyAdmin local, impórtala en el del hosting, crea en el servidor un `class/config.php` con los datos del hosting y sube los archivos. En `class/db.php` cambia `$show_errors` a `FALSE` para no mostrar detalles de errores.

## En la próxima semana

En la Semana 7 se agrega el **panel de administración** con login para crear, editar y eliminar plantas.
