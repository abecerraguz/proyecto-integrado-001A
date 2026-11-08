<?php
/**
 * helpers.php — Funciones reutilizables del sitio.
 */

// Escapa un texto antes de mostrarlo en HTML (evita inyección de HTML)
function e($texto) {
    return htmlspecialchars((string)$texto, ENT_QUOTES, 'UTF-8');
}

// Formatea un precio chileno: 14990 → $14.990
function precio($valor) {
    return '$' . number_format((int)$valor, 0, ',', '.');
}
