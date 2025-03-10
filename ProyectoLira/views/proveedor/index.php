<?php
$pageTitle = 'Proveedores';
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
            <h2><i class="fas fa-truck me-2"></i>Proveedores</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="<?php echo APP_URL; ?>?controller=proveedor&action=create" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Nuevo Proveedor
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
                            <th>Empresa</th>
                            <th>Contacto</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($proveedores) && !empty($proveedores)): ?>
                            <?php foreach ($proveedores as $proveedor): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($proveedor['id']); ?></td>
                                    <td><?php echo htmlspecialchars($proveedor['nombre_empresa']); ?></td>
                                    <td><?php echo htmlspecialchars($proveedor['contacto_nombre'] ?: 'No disponible'); ?></td>
                                    <td><?php echo htmlspecialchars($proveedor['telefono'] ?: 'No disponible'); ?></td>
                                    <td><?php echo htmlspecialchars($proveedor['email'] ?: 'No disponible'); ?></td>
                                    <td>
                                        <a href="<?php echo APP_URL; ?>?controller=proveedor&action=view&id=<?php echo $proveedor['id']; ?>" 
                                           class="btn btn-sm btn-info me-2" title="Ver detalles">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="<?php echo APP_URL; ?>?controller=proveedor&action=edit&id=<?php echo $proveedor['id']; ?>" 
                                           class="btn btn-sm btn-warning me-2" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-danger" 
                                                onclick="confirmarEliminacion('<?php echo $proveedor['id']; ?>')" title="Eliminar">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">No hay proveedores registrados</td>
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
    if (confirm('¿Estás seguro de que deseas eliminar este proveedor?')) {
        window.location.href = `${APP_URL}?controller=proveedor&action=delete&id=${id}`;
    }
}
</script>