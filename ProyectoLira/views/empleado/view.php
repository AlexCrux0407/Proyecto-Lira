<?php
$pageTitle = 'Detalles de Empleado';
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
            <h2><i class="fas fa-user me-2"></i>Detalles de Empleado</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="<?php echo APP_URL; ?>?controller=empleado&action=edit&id=<?php echo $empleado['id']; ?>" class="btn btn-warning me-2">
                <i class="fas fa-edit me-2"></i>Editar
            </a>
            <a href="<?php echo APP_URL; ?>?controller=empleado&action=index" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Volver al listado
            </a>
        </div>
    </div>

    <?php if (isset($empleado)): ?>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title"><?php echo htmlspecialchars($empleado['nombre'] . ' ' . $empleado['apellidos']); ?></h5>
                    <p class="text-muted">ID: <?php echo htmlspecialchars($empleado['id']); ?></p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-1"><strong>Creado:</strong> <?php echo htmlspecialchars(date('d/m/Y H:i', strtotime($empleado['created_at']))); ?></p>
                    <p><strong>Actualizado:</strong> <?php echo htmlspecialchars(date('d/m/Y H:i', strtotime($empleado['updated_at']))); ?></p>
                </div>
            </div>

            <hr>

            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="mb-4">
                        <h6 class="fw-bold">Información Personal</h6>
                        <div class="card bg-light">
                            <div class="card-body">
                                <p class="mb-2"><strong>Puesto:</strong> <?php echo htmlspecialchars($empleado['puesto']); ?></p>
                                <p class="mb-2"><strong>Teléfono:</strong> <?php echo htmlspecialchars($empleado['telefono'] ?: 'No disponible'); ?></p>
                                <p class="mb-0"><strong>Email:</strong> <?php echo htmlspecialchars($empleado['email'] ?: 'No disponible'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-4">
                        <h6 class="fw-bold">Información Laboral</h6>
                        <div class="card bg-light">
                            <div class="card-body">
                                <p class="mb-2"><strong>Sucursal:</strong> 
                                    <?php if (isset($sucursal)): ?>
                                        <a href="<?php echo APP_URL; ?>?controller=sucursal&action=view&id=<?php echo $sucursal['id']; ?>">
                                            <?php echo htmlspecialchars($sucursal['nombre']); ?>
                                        </a>
                                    <?php else: ?>
                                        No asignada
                                    <?php endif; ?>
                                </p>
                                <p class="mb-2"><strong>Fecha de Contratación:</strong> <?php echo htmlspecialchars($empleado['fecha_contratacion'] ? date('d/m/Y', strtotime($empleado['fecha_contratacion'])) : 'No definida'); ?></p>
                                <p class="mb-0"><strong>Salario:</strong> $<?php echo htmlspecialchars(number_format($empleado['salario'], 2) ?: '0.00'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php if (isset($pedidos) && !empty($pedidos)): ?>
            <div class="row mt-2">
                <div class="col-md-12">
                    <h6 class="fw-bold">Pedidos Asociados</h6>
                    <div class="table-responsive">
                        <table class="table table-sm table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Fecha</th>
                                    <th>Proveedor</th>
                                    <th>Estado</th>
                                    <th>Total</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pedidos as $pedido): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($pedido['id']); ?></td>
                                    <td><?php echo htmlspecialchars(date('d/m/Y', strtotime($pedido['fecha_pedido']))); ?></td>
                                    <td><?php echo htmlspecialchars($pedido['nombre_proveedor']); ?></td>
                                    <td>
                                        <span class="badge <?php 
                                            echo $pedido['estado'] == 'entregado' ? 'bg-success' : 
                                                ($pedido['estado'] == 'cancelado' ? 'bg-danger' : 'bg-warning'); 
                                        ?>">
                                            <?php echo htmlspecialchars(ucfirst($pedido['estado'])); ?>
                                        </span>
                                    </td>
                                    <td>$<?php echo htmlspecialchars(number_format($pedido['total'], 2)); ?></td>
                                    <td>
                                        <a href="<?php echo APP_URL; ?>?controller=pedido&action=view&id=<?php echo $pedido['id']; ?>" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <?php else: ?>
    <div class="alert alert-danger">
        <i class="fas fa-exclamation-triangle me-2"></i>No se encontró el empleado solicitado.
    </div>
    <a href="<?php echo APP_URL; ?>?controller=empleado&action=index" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i>Volver al listado
    </a>
    <?php endif; ?>
</div>