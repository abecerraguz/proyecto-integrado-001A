<?php
/**
 * partes/funciones.php — Funciones del panel: validar los datos de una planta y subir su imagen.
 */

// Lee y valida los campos del formulario. Devuelve [datos, errores].
function leerPlanta() {
    $datos = [
        'nombre'      => trim($_POST['nombre'] ?? ''),
        'cientifico'  => trim($_POST['cientifico'] ?? ''),
        'descripcion' => trim($_POST['descripcion'] ?? ''),
        'luz'         => trim($_POST['luz'] ?? ''),
        'riego'       => trim($_POST['riego'] ?? ''),
        'precio'      => (int)($_POST['precio'] ?? -1),
        'categoria'   => (int)($_POST['categoria'] ?? 0),
        'destacada'   => isset($_POST['destacada']) ? 1 : 0,
    ];
    $errores = [];
    if (mb_strlen($datos['nombre']) < 2)       $errores[] = 'Escribe el nombre de la planta.';
    if (mb_strlen($datos['descripcion']) < 10) $errores[] = 'La descripción debe tener al menos 10 caracteres.';
    if ($datos['precio'] < 0)                  $errores[] = 'Escribe un precio válido.';
    if ($datos['categoria'] <= 0)              $errores[] = 'Elige una categoría.';
    return [$datos, $errores];
}

// Sube la imagen si viene una. Devuelve el nombre del archivo, null si no se subió nada,
// o lanza un error si el archivo no es válido.
function subirImagen($campo, $carpeta) {
    if (empty($_FILES[$campo]['tmp_name'])) {
        return null;
    }
    $permitidos = ['image/jpeg' => 'jpg', 'image/png' => 'png', 'image/webp' => 'webp'];
    // mime_content_type lee el contenido real del archivo, no su nombre
    $tipoReal = mime_content_type($_FILES[$campo]['tmp_name']);
    if (!isset($permitidos[$tipoReal])) {
        throw new RuntimeException('La imagen debe ser JPG, PNG o WebP.');
    }
    if ($_FILES[$campo]['size'] > 2 * 1024 * 1024) {
        throw new RuntimeException('La imagen no puede pesar más de 2 MB.');
    }
    // Nombre nuevo y aleatorio: nunca usamos el nombre que envía el usuario
    $nombre = bin2hex(random_bytes(8)) . '.' . $permitidos[$tipoReal];
    if (!move_uploaded_file($_FILES[$campo]['tmp_name'], $carpeta . '/' . $nombre)) {
        throw new RuntimeException('No se pudo guardar la imagen. Revisa los permisos de la carpeta.');
    }
    return $nombre;
}

// Vuelve a una página con un mensaje
function volver($pagina, $tipo, $mensaje) {
    header('Location: ' . $pagina . (str_contains($pagina, '?') ? '&' : '?') . $tipo . '=' . urlencode($mensaje));
    exit;
}
