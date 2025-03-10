<?php
// Controlador para manejar errores

class ErrorController {
    /**
     * Muestra la página de error 404 (no encontrado)
     */
    public function notFound() {
        // Establecer el código de estado HTTP
        http_response_code(404);
        
        // Incluir la vista de error
        include_once BASE_PATH . '/views/error/404.php';
    }
    
    /**
     * Muestra la página de error 403 (prohibido)
     */
    public function forbidden() {
        // Establecer el código de estado HTTP
        http_response_code(403);
        
        // Incluir la vista de error
        include_once BASE_PATH . '/views/error/403.php';
    }
    
    /**
     * Muestra la página de error 500 (error interno del servidor)
     */
    public function serverError() {
        // Establecer el código de estado HTTP
        http_response_code(500);
        
        // Incluir la vista de error
        include_once BASE_PATH . '/views/error/500.php';
    }
}