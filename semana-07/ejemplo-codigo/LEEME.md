# Verde Vivo · Ejemplo Semana 7 — Panel de administración con login y CRUD

Versión del sitio de Verde Vivo **al terminar la clase de la Semana 7**: se agrega la **zona privada** (`admin/`) para que la dueña administre su catálogo sin tocar el código. Tiene login con sesiones, protección de páginas, cierre de sesión y el CRUD completo de plantas, con subida segura de imágenes. Los cambios del panel se ven al instante en el sitio público.

> Verde Vivo es un proyecto **ficticio** que usamos en clase. Úsalo para comparar, no para copiar: tu entrega es tu propio proyecto.

## Cómo correrlo en tu computador

1. Igual que la Semana 6: XAMPP o MAMP encendido, carpeta en `htdocs/verde-vivo`, base `verde_vivo` en `utf8mb4_general_ci`.
2. Importa **`sql/verde_vivo.sql` de esta carpeta** (incluye la tabla `vv_usuarios`). Reemplaza la base anterior.
3. Copia `class/config.example.php` como `class/config.php`.
4. Entra al panel: `http://localhost/verde-vivo/admin/`
   - Usuario de prueba: **`camila`**
   - Contraseña de prueba: **`VerdeVivo-2026`**

> ⚠️ Este usuario existe **solo para probar el ejemplo en tu computador**. En tu proyecto crea tu propio usuario con `password_hash()` y una contraseña segura, y nunca publiques una contraseña en un repositorio.

## Qué contiene el panel

```
admin/
├── index.php            ← formulario de login
├── login.php            ← valida usuario y contraseña (password_verify) y crea la sesión
├── auth.php             ← protege cada página privada (primera línea de cada archivo)
├── logout.php           ← cierra la sesión
├── admin_list.php       ← listado con Editar (GET) y Eliminar (formulario POST)
├── admin_insertar.php   ← formulario para agregar
├── insertar.php         ← valida, sube la imagen y guarda (INSERT)
├── admin_editar.php     ← formulario con los datos actuales (atributo value)
├── editar.php           ← valida y actualiza (UPDATE … WHERE)
├── eliminar.php         ← elimina (DELETE … WHERE), solo por POST
├── admin_mensajes.php   ← mensajes del formulario de contacto
└── partes/
    ├── admin-header.php, admin-footer.php
    ├── form-planta.php  ← formulario compartido por agregar y editar
    └── funciones.php    ← leerPlanta(), subirImagen(), volver()
```

## Qué mirar

| Tema del tutorial | Dónde verlo |
|-------------------|-------------|
| Contraseñas con hash | `vv_usuarios` en `sql/verde_vivo.sql` y `password_verify()` en `admin/login.php` |
| Sesión, `session_regenerate_id()` y mensaje de error genérico | `admin/login.php` |
| Proteger también los archivos que solo procesan | `include_once 'auth.php'` en `insertar.php`, `editar.php`, `eliminar.php` |
| `name` único en cada campo y `value` con el dato actual | `admin/partes/form-planta.php` |
| `<select>` con la categoría actual marcada | `selected` en `form-planta.php` |
| Subida segura: tipo real del archivo, tamaño y nombre aleatorio | `subirImagen()` en `admin/partes/funciones.php` |
| `UPDATE` y `DELETE` siempre con `WHERE` | `editar.php` y `eliminar.php` |
| Eliminar solo por `POST` | formulario en `admin_list.php` y validación en `eliminar.php` |

## Validación

Probado con PHP 8 y MariaDB, con una sesión real:

- Sin login, el panel y los archivos que procesan redirigen al login.
- Login incorrecto muestra un solo mensaje genérico; el correcto entra al listado.
- Agregar con imagen PNG funciona; un `.php` renombrado a `.jpg` es rechazado.
- Editar mantiene la imagen si no se sube una nueva; el precio nuevo se ve en el sitio público.
- Eliminar por GET no hace nada; por POST elimina el registro y su imagen subida.
- Después de cerrar sesión, el panel vuelve a pedir login.
- El HTML de las 10 páginas probadas (públicas y del panel) pasa el W3C Validator sin errores ni advertencias.

## En la próxima semana

En la Semana 8 se agregan las interacciones con JavaScript: validación en tiempo real, filtro y buscador sin recargar, menú de accesibilidad y un modal para confirmar antes de eliminar.
