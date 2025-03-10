<?php
// Punto de entrada principal de la aplicación

// Definir la ruta base
define('BASE_PATH', __DIR__);

// Configuración de errores
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', BASE_PATH . '/logs/error.log');

// Crear directorio de logs si no existe
if (!is_dir(BASE_PATH . '/logs')) {
    mkdir(BASE_PATH . '/logs', 0755, true);
}

// Incluir archivos de configuración
try {
    require_once BASE_PATH . '/config/config.php';
    require_once BASE_PATH . '/includes/functions.php';
} catch (Exception $e) {
    die('Error crítico: No se pudieron cargar los archivos de configuración.');
}

// Iniciar sesión
session_start();

// Obtener el controlador y la acción de la URL
$controller = isset($_GET['controller']) ? sanitize_input($_GET['controller']) : 'home';
$action = isset($_GET['action']) ? sanitize_input($_GET['action']) : 'index';

// Construir el nombre del controlador
$controllerName = ucfirst($controller) . 'Controller';
$controllerFile = BASE_PATH . '/controllers/' . $controllerName . '.php';

// Verificar si el controlador existe
try {
    if (file_exists($controllerFile)) {
        require_once $controllerFile;
        
        // Verificar si la clase del controlador existe
        if (class_exists($controllerName)) {
            // Instanciar el controlador
            $controllerInstance = new $controllerName();
            
            // Verificar si el método existe
            if (method_exists($controllerInstance, $action)) {
                // Llamar al método del controlador
                $controllerInstance->$action();
            } else {
                // Método no encontrado
                require_once BASE_PATH . '/controllers/ErrorController.php';
                $errorController = new ErrorController();
                $errorController->notFound();
            }
        } else {
            // Clase del controlador no encontrada
            throw new Exception("La clase del controlador '{$controllerName}' no existe");
        }
    } else {
        // Controlador no encontrado
        require_once BASE_PATH . '/controllers/ErrorController.php';
        $errorController = new ErrorController();
        $errorController->notFound();
    }
} catch (Exception $e) {
    // Registrar el error
    error_log("Error en index.php: " . $e->getMessage());
    
    // Mostrar página de error
    require_once BASE_PATH . '/controllers/ErrorController.php';
    $errorController = new ErrorController();
    $errorController->serverError();
}