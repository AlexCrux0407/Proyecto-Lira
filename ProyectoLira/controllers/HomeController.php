<?php
// Controlador principal para la página de inicio

class HomeController {
    /**
     * Método para mostrar la página de inicio
     */
    public function index() {
        // Incluir la vista de inicio
        include_once BASE_PATH . '/views/home/index.php';
    }
    
    /**
     * Método para mostrar la página de acerca de
     */
    public function about() {
        // Incluir la vista de acerca de
        include_once BASE_PATH . '/views/home/about.php';
    }
    
    /**
     * Método para mostrar la página de contacto
     */
    public function contact() {
        // Incluir la vista de contacto
        include_once BASE_PATH . '/views/home/contact.php';
    }
}