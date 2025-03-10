# Restaurante - Sistema de Gestión de Restaurantes

Sistema de gestión para restaurantes con la paleta de colores de McDonald's, desarrollado en PHP siguiendo el patrón MVC.

## Características

- Gestión de sucursales
- Gestión de empleados
- Gestión de proveedores
- Generación de reportes

## Estructura del Proyecto

```
Restaurante/
├── config/             # Configuración de la aplicación y base de datos
├── controllers/        # Controladores MVC
├── models/             # Modelos MVC
├── views/              # Vistas MVC
├── assets/             # Recursos estáticos (CSS, JS, imágenes)
├── includes/           # Archivos de inclusión PHP
├── lib/                # Bibliotecas de terceros
├── uploads/            # Archivos subidos por los usuarios
└── index.php           # Punto de entrada de la aplicación
```

## Requisitos

- PHP 7.4 o superior
- MySQL 5.7 o superior
- Servidor web (Apache/Nginx)

## Instalación

1. Clonar el repositorio
2. Configurar la base de datos en `config/database.php`
3. Importar el esquema de base de datos desde `database/schema.sql`
4. Acceder a través del navegador

## Paleta de Colores

Se utiliza la paleta de colores corporativa de McDonald's:
- Rojo principal: #FF0000
- Amarillo principal: #FFC72C
- Complementarios: #FFFFFF, #333333