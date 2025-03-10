<?php
// Archivo de configuración principal

// Configuración de la base de datos
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '1917248zzz');
define('DB_NAME', 'proyecto_lira');

// Configuración de la aplicación
define('APP_NAME', 'Proyecto Lira');
define('APP_URL', 'http://localhost/ProyectoLira');

// Configuración de errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Zona horaria
date_default_timezone_set('America/Mexico_City');