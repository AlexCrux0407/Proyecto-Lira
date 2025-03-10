<?php
$pageTitle = 'Empleados';
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
            <h2><i class="fas fa-users me-2"></i>Empleados</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="<?php echo APP_URL; ?>?controller=empleado&action=create" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Nuevo Empleado
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Sucursal</th>
                            <th>Puesto</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($empleados) && !empty($empleados)): ?>
                            <?php foreach ($empleados as $empleado): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($empleado['id']); ?></td>
                                    <td><?php echo htmlspecialchars($empleado['nombre'] . ' ' . $empleado['apellidos']); ?></td>
                                    <td><?php echo htmlspecialchars($empleado['sucursal_nombre'] ?? 'No asignada'); ?></td>
                                    <td><?php echo htmlspecialchars($empleado['puesto']); ?></td>
                                    <td><?php echo htmlspecialchars($empleado['telefono'] ?: 'No disponible'); ?></td>
                                    <td><?php echo htmlspecialchars($empleado['email'] ?: 'No disponible'); ?></td>
                                    <td>
                                        <a href="<?php echo APP_URL; ?>?controller=empleado&action=view&id=<?php echo $empleado['id']; ?>" 
                                           class="btn btn-sm btn-info me-2" title="Ver detalles">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="<?php echo APP_URL; ?>?controller=empleado&action=edit&id=<?php echo $empleado['id']; ?>" 
                                           class="btn btn-sm btn-warning me-2" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-danger" 
                                                onclick="confirmarEliminacion('<?php echo $empleado['id']; ?>')" title="Eliminar">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center">No hay empleados registrados</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
function confirmarEliminacion(id) {
    if (confirm('¿Estás seguro de que deseas eliminar este empleado?')) {
        window.location.href = `${APP_URL}?controller=empleado&action=delete&id=${id}`;
    }
}
</script>