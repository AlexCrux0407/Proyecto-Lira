<?php
$pageTitle = 'Nuevo Empleado';
$contentView = __FILE__;

if (!defined('LAYOUT_INCLUDED')) {
    define('LAYOUT_INCLUDED', true);
    include_once BASE_PATH . '/views/layouts/main.php';
    exit;
}
?>

<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-12">
            <h2><i class="fas fa-user-plus me-2"></i>Nuevo Empleado</h2>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="<?php echo APP_URL; ?>?controller=empleado&action=store" method="POST">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nombre" class="form-label">Nombre *</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="col-md-6">
                        <label for="apellidos" class="form-label">Apellidos *</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="sucursal_id" class="form-label">Sucursal</label>
                        <select class="form-select" id="sucursal_id" name="sucursal_id">
                            <option value="">Seleccionar sucursal...</option>
                            <?php if (isset($sucursales) && !empty($sucursales)): ?>
                                <?php foreach ($sucursales as $sucursal): ?>
                                    <option value="<?php echo $sucursal['id']; ?>">
                                        <?php echo htmlspecialchars($sucursal['nombre']); ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="puesto" class="form-label">Puesto *</label>
                        <input type="text" class="form-control" id="puesto" name="puesto" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="fecha_contratacion" class="form-label">Fecha de Contratación</label>
                        <input type="date" class="form-control" id="fecha_contratacion" name="fecha_contratacion">
                    </div>
                    <div class="col-md-4">
                        <label for="salario" class="form-label">Salario</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" class="form-control" id="salario" name="salario" step="0.01" min="0">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="tel" class="form-control" id="telefono" name="telefono">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Guardar Empleado
                        </button>
                        <a href="<?php echo APP_URL; ?>?controller=empleado&action=index" class="btn btn-secondary ms-2">
                            <i class="fas fa-arrow-left me-2"></i>Cancelar
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>