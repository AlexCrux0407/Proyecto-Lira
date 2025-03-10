<?php
$pageTitle = 'Sucursales';
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
            <h2><i class="fas fa-store me-2"></i>Sucursales</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="<?php echo APP_URL; ?>?controller=sucursal&action=create" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Nueva Sucursal
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
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Encargado</th>
                            <th>Horario</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($sucursales) && !empty($sucursales)): ?>
                            <?php foreach ($sucursales as $sucursal): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($sucursal['id']); ?></td>
                                    <td><?php echo htmlspecialchars($sucursal['nombre']); ?></td>
                                    <td><?php echo htmlspecialchars($sucursal['direccion']); ?></td>
                                    <td><?php echo htmlspecialchars($sucursal['telefono']); ?></td>
                                    <td><?php echo htmlspecialchars($sucursal['encargado']); ?></td>
                                    <td>
                                        <?php 
                                        echo htmlspecialchars($sucursal['horario_apertura']) . ' - ' . 
                                             htmlspecialchars($sucursal['horario_cierre']); 
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo APP_URL; ?>?controller=sucursal&action=view&id=<?php echo $sucursal['id']; ?>" 
                                           class="btn btn-sm btn-info me-2" title="Ver detalles">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="<?php echo APP_URL; ?>?controller=sucursal&action=edit&id=<?php echo $sucursal['id']; ?>" 
                                           class="btn btn-sm btn-warning me-2" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-danger" 
                                                onclick="confirmarEliminacion('<?php echo $sucursal['id']; ?>')" title="Eliminar">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center">No hay sucursales registradas</td>
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
    if (confirm('¿Estás seguro de que deseas eliminar esta sucursal?')) {
        window.location.href = `${APP_URL}?controller=sucursal&action=delete&id=${id}`;
    }
}
</script>