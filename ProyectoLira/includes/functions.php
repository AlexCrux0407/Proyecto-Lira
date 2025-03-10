<?php
// Archivo de funciones auxiliares

/**
 * Sanitiza la entrada del usuario para prevenir inyecciones
 *
 * @param string $input Entrada del usuario
 * @return string Entrada sanitizada
 */
function sanitize_input($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    return $input;
}

/**
 * Redirecciona a una URL específica
 *
 * @param string $url URL a redireccionar
 * @return void
 */
function redirect($url) {
    header("Location: " . $url);
    exit();
}

/**
 * Muestra un mensaje de alerta
 *
 * @param string $message Mensaje a mostrar
 * @param string $type Tipo de alerta (success, danger, warning, info)
 * @return string HTML del mensaje de alerta
 */
function show_alert($message, $type = 'info') {
    return "<div class='alert alert-{$type}' role='alert'>{$message}</div>";
}

/**
 * Formatea una fecha en formato legible
 *
 * @param string $date Fecha en formato Y-m-d
 * @return string Fecha formateada
 */
function format_date($date) {
    $timestamp = strtotime($date);
    return date('d/m/Y', $timestamp);
}

/**
 * Formatea un número como moneda
 *
 * @param float $amount Cantidad a formatear
 * @return string Cantidad formateada como moneda
 */
function format_currency($amount) {
    return '$' . number_format($amount, 2, '.', ',');
}

/**
 * Verifica si una cadena está vacía
 *
 * @param string $string Cadena a verificar
 * @return boolean True si está vacía, false en caso contrario
 */
function is_empty($string) {
    return empty(trim($string));
}

/**
 * Genera un token CSRF
 *
 * @return string Token CSRF
 */
function generate_csrf_token() {
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Verifica un token CSRF
 *
 * @param string $token Token a verificar
 * @return boolean True si es válido, false en caso contrario
 */
function verify_csrf_token($token) {
    if (!isset($_SESSION['csrf_token']) || $token !== $_SESSION['csrf_token']) {
        return false;
    }
    return true;
}