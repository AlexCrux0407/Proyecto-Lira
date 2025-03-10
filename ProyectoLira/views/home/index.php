<?php
// Vista de la página de inicio
$pageTitle = 'Inicio';
$contentView = __FILE__;

// Incluir el layout principal si no se está incluyendo desde él
if (!defined('LAYOUT_INCLUDED')) {
    define('LAYOUT_INCLUDED', true);
    include_once BASE_PATH . '/views/layouts/main.php';
    exit;
}
?>

<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card">
            <div class="card-body text-center">
                <h2 class="card-title">Bienvenido al Sistema de Gestión de Restaurantes</h2>
                <p class="card-text">Administra tus sucursales, empleados y proveedores de manera eficiente.</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-header">
                <i class="fas fa-store me-2"></i> Sucursales
            </div>
            <div class="card-body">
                <h5 class="card-title">Gestión de Sucursales</h5>
                <p class="card-text">Administra todas tus sucursales, sus ubicaciones y personal a cargo.</p>
                <a href="<?php echo APP_URL; ?>?controller=sucursal&action=index" class="btn btn-primary">Ver Sucursales</a>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-header">
                <i class="fas fa-users me-2"></i> Empleados
            </div>
            <div class="card-body">
                <h5 class="card-title">Gestión de Empleados</h5>
                <p class="card-text">Administra la información de tus empleados, puestos y asignaciones.</p>
                <a href="<?php echo APP_URL; ?>?controller=empleado&action=index" class="btn btn-primary">Ver Empleados</a>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-header">
                <i class="fas fa-truck me-2"></i> Proveedores
            </div>
            <div class="card-body">
                <h5 class="card-title">Gestión de Proveedores</h5>
                <p class="card-text">Administra tus proveedores y los pedidos realizados a cada uno.</p>
                <a href="<?php echo APP_URL; ?>?controller=proveedor&action=index" class="btn btn-primary">Ver Proveedores</a>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-header">
                <i class="fas fa-chart-bar me-2"></i> Reportes
            </div>
            <div class="card-body">
                <h5 class="card-title">Reportes y Estadísticas</h5>
                <p class="card-text">Genera reportes detallados sobre el desempeño de tus sucursales, empleados y más.</p>
                <a href="<?php echo APP_URL; ?>?controller=reporte&action=index" class="btn btn-primary">Ver Reportes</a>
            </div>
        </div>
    </div>
    
    <div class="col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-header">
                <i class="fas fa-clipboard-list me-2"></i> Pedidos
            </div>
            <div class="card-body">
                <h5 class="card-title">Gestión de Pedidos</h5>
                <p class="card-text">Administra los pedidos realizados a tus proveedores y su estado actual.</p>
                <a href="<?php echo APP_URL; ?>?controller=pedido&action=index" class="btn btn-primary">Ver Pedidos</a>
            </div>
        </div>
    </div>
</div>