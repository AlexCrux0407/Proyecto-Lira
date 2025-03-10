<?php
$pageTitle = 'Detalles de Proveedor';
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
            <h2><i class="fas fa-truck me-2"></i>Detalles de Proveedor</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="<?php echo APP_URL; ?>?controller=proveedor&action=edit&id=<?php echo $proveedor['id']; ?>" class="btn btn-warning me-2">
                <i class="fas fa-edit me-2"></i>Editar
            </a>
            <a href="<?php echo APP_URL; ?>?controller=proveedor&action=index" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Volver al listado
            </a>
        </div>
    </div>

    <?php if (isset($proveedor)): ?>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title"><?php echo htmlspecialchars($proveedor['nombre_empresa']); ?></h5>
                    <p class="text-muted">ID: <?php echo htmlspecialchars($proveedor['id']); ?></p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-1"><strong>Creado:</strong> <?php echo htmlspecialchars(date('d/m/Y H:i', strtotime($proveedor['created_at']))); ?></p>
                    <p><strong>Actualizado:</strong> <?php echo htmlspecialchars(date('d/m/Y H:i', strtotime($proveedor['updated_at']))); ?></p>
                </div>
            </div>

            <hr>

            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="mb-4">
                        <h6 class="fw-bold">Información de Contacto</h6>
                        <div class="card bg-light">
                            <div class="card-body">
                                <p class="mb-2"><strong>Contacto:</strong> <?php echo htmlspecialchars($proveedor['contacto_nombre'] ?: 'No disponible'); ?></p>
                                <p class="mb-2"><strong>Teléfono:</strong> <?php echo htmlspecialchars($proveedor['telefono'] ?: 'No disponible'); ?></p>
                                <p class="mb-2"><strong>Email:</strong> <?php echo htmlspecialchars($proveedor['email'] ?: 'No disponible'); ?></p>
                                <p class="mb-0"><strong>Dirección:</strong> <?php echo htmlspecialchars($proveedor['direccion'] ?: 'No disponible'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-4">
                        <h6 class="fw-bold">Productos y Servicios</h6>
                        <div class="card bg-light">
                            <div class="card-body">
                                <?php if (!empty($proveedor['productos_servicios'])): ?>
                                    <p><?php echo nl2br(htmlspecialchars($proveedor['productos_servicios'])); ?></p>
                                <?php else: ?>
                                    <p class="text-muted">No hay información de productos o servicios disponible.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php if (isset($pedidos) && !empty($pedidos)): ?>
            <div class="row mt-2">
                <div class="col-md-12">
                    <h6 class="fw-bold">Pedidos Realizados</h6>
                    <div class="table-responsive">
                        <table class="table table-sm table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Fecha</th>
                                    <th>Sucursal</th>
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
                                    <td><?php echo htmlspecialchars($pedido['nombre_sucursal']); ?></td>
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
        <i class="fas fa-exclamation-triangle me-2"></i>No se encontró el proveedor solicitado.
    </div>
    <a href="<?php echo APP_URL; ?>?controller=proveedor&action=index" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i>Volver al listado
    </a>
    <?php endif; ?>
</div>