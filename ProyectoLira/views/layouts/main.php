<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle . ' | ' . APP_NAME : APP_NAME; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo APP_URL; ?>/assets/css/style.css">
    <style>
        :root {
            --primary-red: #FF0000;
            --primary-yellow: #FFC72C;
            --dark-gray: #333333;
            --white: #FFFFFF;
        }
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: var(--dark-gray);
        }
        .navbar {
            background-color: var(--primary-red);
        }
        .navbar-brand {
            color: var(--white);
            font-weight: bold;
            font-size: 1.5rem;
        }
        .navbar-nav .nav-link {
            color: var(--white);
            font-weight: 500;
        }
        .navbar-nav .nav-link:hover {
            color: var(--primary-yellow);
        }
        .dropdown-menu {
            border: none;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        .btn-primary {
            background-color: var(--primary-yellow);
            color: var(--dark-gray);
            border: none;
            font-weight: bold;
        }
        .btn-primary:hover {
            background-color: var(--primary-red);
            color: var(--white);
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            transition: all 0.3s ease;
        }
        .card:hover {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            transform: translateY(-5px);
        }
        .card-header {
            background-color: var(--primary-yellow);
            color: var(--dark-gray);
            font-weight: bold;
            border-radius: 10px 10px 0 0 !important;
        }
        footer {
            background-color: var(--dark-gray);
            color: var(--white);
            padding: 20px 0;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="<?php echo APP_URL; ?>">
                <?php echo APP_NAME; ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo APP_URL; ?>"><i class="fas fa-home"></i> Inicio</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="sucursalesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-store"></i> Sucursales
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="sucursalesDropdown">
                            <li><a class="dropdown-item" href="<?php echo APP_URL; ?>?controller=sucursal&action=index">Ver Sucursales</a></li>
                            <li><a class="dropdown-item" href="<?php echo APP_URL; ?>?controller=sucursal&action=create">Nueva Sucursal</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="empleadosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-users"></i> Empleados
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="empleadosDropdown">
                            <li><a class="dropdown-item" href="<?php echo APP_URL; ?>?controller=empleado&action=index">Ver Empleados</a></li>
                            <li><a class="dropdown-item" href="<?php echo APP_URL; ?>?controller=empleado&action=create">Nuevo Empleado</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="proveedoresDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-truck"></i> Proveedores
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="proveedoresDropdown">
                            <li><a class="dropdown-item" href="<?php echo APP_URL; ?>?controller=proveedor&action=index">Ver Proveedores</a></li>
                            <li><a class="dropdown-item" href="<?php echo APP_URL; ?>?controller=proveedor&action=create">Nuevo Proveedor</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="<?php echo APP_URL; ?>?controller=pedido&action=index">Ver Pedidos</a></li>
                            <li><a class="dropdown-item" href="<?php echo APP_URL; ?>?controller=pedido&action=create">Nuevo Pedido</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo APP_URL; ?>?controller=reporte&action=index"><i class="fas fa-chart-bar"></i> Reportes</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container py-4">
        <?php if (isset($alertMessage) && isset($alertType)): ?>
            <div class="alert alert-<?php echo $alertType; ?> alert-dismissible fade show" role="alert">
                <?php echo $alertMessage; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        
        <?php if (isset($pageTitle)): ?>
            <h1 class="mb-4"><?php echo $pageTitle; ?></h1>
        <?php endif; ?>
        
        <?php include_once $contentView; ?>
    </div>

    <!-- Footer -->
    <footer class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5><?php echo APP_NAME; ?></h5>
                    <p>Sistema de gestión para restaurantes con la paleta de colores de McDonald's.</p>
                </div>
                <div class="col-md-3">
                    <h5>Enlaces</h5>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo APP_URL; ?>" class="text-white">Inicio</a></li>
                        <li><a href="<?php echo APP_URL; ?>?controller=home&action=about" class="text-white">Acerca de</a></li>
                        <li><a href="<?php echo APP_URL; ?>?controller=home&action=contact" class="text-white">Contacto</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Contacto</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-envelope me-2"></i> info@proyectolira.com</li>
                        <li><i class="fas fa-phone me-2"></i> (123) 456-7890</li>
                    </ul>
                </div>
            </div>
            <hr class="my-4 bg-light">
            <div class="text-center">
                <p class="mb-0">&copy; <?php echo date('Y'); ?> <?php echo APP_NAME; ?>. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo APP_URL; ?>/assets/js/main.js"></script>
</body>
</html>