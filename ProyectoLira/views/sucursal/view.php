<?php
$pageTitle = 'Detalles de Sucursal';
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
            <h2><i class="fas fa-store me-2"></i>Detalles de Sucursal</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="<?php echo APP_URL; ?>?controller=sucursal&action=edit&id=<?php echo $sucursal['id']; ?>" class="btn btn-warning me-2">
                <i class="fas fa-edit me-2"></i>Editar
            </a>
            <a href="<?php echo APP_URL; ?>?controller=sucursal&action=index" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Volver al listado
            </a>
        </div>
    </div>

    <?php if (isset($sucursal)): ?>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title"><?php echo htmlspecialchars($sucursal['nombre']); ?></h5>
                    <p class="text-muted">ID: <?php echo htmlspecialchars($sucursal['id']); ?></p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-1"><strong>Creado:</strong> <?php echo htmlspecialchars(date('d/m/Y H:i', strtotime($sucursal['created_at']))); ?></p>
                    <p><strong>Actualizado:</strong> <?php echo htmlspecialchars(date('d/m/Y H:i', strtotime($sucursal['updated_at']))); ?></p>
                </div>
            </div>

            <hr>

            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="mb-4">
                        <h6 class="fw-bold">Información General</h6>
                        <div class="card bg-light">
                            <div class="card-body">
                                <p class="mb-2"><strong>Encargado:</strong> <?php echo htmlspecialchars($sucursal['encargado'] ?: 'No asignado'); ?></p>
                                <p class="mb-2"><strong>Dirección:</strong> <?php echo htmlspecialchars($sucursal['direccion']); ?></p>
                                <p class="mb-0"><strong>Teléfono:</strong> <?php echo htmlspecialchars($sucursal['telefono'] ?: 'No disponible'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-4">
                        <h6 class="fw-bold">Horario de Atención</h6>
                        <div class="card bg-light">
                            <div class="card-body">
                                <p class="mb-2"><strong>Apertura:</strong> <?php echo htmlspecialchars($sucursal['horario_apertura'] ?: 'No definido'); ?></p>
                                <p class="mb-0"><strong>Cierre:</strong> <?php echo htmlspecialchars($sucursal['horario_cierre'] ?: 'No definido'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-12">
                    <h6 class="fw-bold">Empleados Asignados</h6>
                    <?php if (isset($empleados) && !empty($empleados)): ?>
                    <div class="table-responsive">
                        <table class="table table-sm table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Puesto</th>
                                    <th>Teléfono</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($empleados as $empleado): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($empleado['id']); ?></td>
                                    <td><?php echo htmlspecialchars($empleado['nombre'] . ' ' . $empleado['apellidos']); ?></td>
                                    <td><?php echo htmlspecialchars($empleado['puesto']); ?></td>
                                    <td><?php echo htmlspecialchars($empleado['telefono'] ?: 'No disponible'); ?></td>
                                    <td>
                                        <a href="<?php echo APP_URL; ?>?controller=empleado&action=view&id=<?php echo $empleado['id']; ?>" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php else: ?>
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>No hay empleados asignados a esta sucursal.
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php else: ?>
    <div class="alert alert-danger">
        <i class="fas fa-exclamation-triangle me-2"></i>No se encontró la sucursal solicitada.
    </div>
    <a href="<?php echo APP_URL; ?>?controller=sucursal&action=index" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i>Volver al listado
    </a>
    <?php endif; ?>
</div>