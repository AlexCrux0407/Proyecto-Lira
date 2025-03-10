<?php
$pageTitle = 'Reportes';
$contentView = __FILE__;

if (!defined('LAYOUT_INCLUDED')) {
    define('LAYOUT_INCLUDED', true);
    include_once BASE_PATH . '/views/layouts/main.php';
    exit;
}
?>

<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2><i class="fas fa-chart-bar me-2"></i>Reportes</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-header">
                    <i class="fas fa-store me-2"></i> Reporte de Sucursales
                </div>
                <div class="card-body">
                    <h5 class="card-title">Desempeño de Sucursales</h5>
                    <p class="card-text">Visualiza estadísticas y métricas de desempeño de todas tus sucursales.</p>
                    <a href="<?php echo APP_URL; ?>?controller=reporte&action=sucursales" class="btn btn-primary">
                        <i class="fas fa-file-alt me-2"></i>Generar Reporte
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-header">
                    <i class="fas fa-users me-2"></i> Reporte de Empleados
                </div>
                <div class="card-body">
                    <h5 class="card-title">Análisis de Personal</h5>
                    <p class="card-text">Obtén información detallada sobre el rendimiento y distribución de tus empleados.</p>
                    <a href="<?php echo APP_URL; ?>?controller=reporte&action=empleados" class="btn btn-primary">
                        <i class="fas fa-file-alt me-2"></i>Generar Reporte
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-header">
                    <i class="fas fa-truck me-2"></i> Reporte de Proveedores
                </div>
                <div class="card-body">
                    <h5 class="card-title">Análisis de Proveedores</h5>
                    <p class="card-text">Revisa estadísticas de tus proveedores y los pedidos realizados a cada uno.</p>
                    <a href="<?php echo APP_URL; ?>?controller=reporte&action=proveedores" class="btn btn-primary">
                        <i class="fas fa-file-alt me-2"></i>Generar Reporte
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-header">
                    <i class="fas fa-clipboard-list me-2"></i> Reporte de Pedidos
                </div>
                <div class="card-body">
                    <h5 class="card-title">Historial de Pedidos</h5>
                    <p class="card-text">Analiza el historial completo de pedidos realizados a proveedores, filtrados por fecha, estado o sucursal.</p>
                    <a href="<?php echo APP_URL; ?>?controller=reporte&action=pedidos" class="btn btn-primary">
                        <i class="fas fa-file-alt me-2"></i>Generar Reporte
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-header">
                    <i class="fas fa-calendar-alt me-2"></i> Reporte Mensual
                </div>
                <div class="card-body">
                    <h5 class="card-title">Resumen Mensual</h5>
                    <p class="card-text">Obtén un resumen completo de la actividad mensual de todas las sucursales, empleados y pedidos.</p>
                    <form action="<?php echo APP_URL; ?>?controller=reporte&action=mensual" method="GET" class="mt-3">
                        <input type="hidden" name="controller" value="reporte">
                        <input type="hidden" name="action" value="mensual">
                        <div class="row g-2 align-items-center">
                            <div class="col-auto">
                                <label for="mes" class="col-form-label">Mes:</label>
                            </div>
                            <div class="col-md-4">
                                <select class="form-select" id="mes" name="mes" required>
                                    <?php 
                                    $meses = [
                                        1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril',
                                        5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto',
                                        9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
                                    ];
                                    $mesActual = date('n');
                                    foreach ($meses as $num => $nombre): 
                                    ?>
                                    <option value="<?php echo $num; ?>" <?php echo ($num == $mesActual) ? 'selected' : ''; ?>>
                                        <?php echo $nombre; ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-auto">
                                <label for="anio" class="col-form-label">Año:</label>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select" id="anio" name="anio" required>
                                    <?php 
                                    $anioActual = date('Y');
                                    for ($i = $anioActual; $i >= $anioActual - 5; $i--): 
                                    ?>
                                    <option value="<?php echo $i; ?>" <?php echo ($i == $anioActual) ? 'selected' : ''; ?>>
                                        <?php echo $i; ?>
                                    </option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-file-alt me-2"></i>Generar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>