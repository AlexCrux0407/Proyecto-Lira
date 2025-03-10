<?php
$pageTitle = 'Nueva Sucursal';
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
            <h2><i class="fas fa-plus-circle me-2"></i>Nueva Sucursal</h2>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="<?php echo APP_URL; ?>?controller=sucursal&action=store" method="POST">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nombre" class="form-label">Nombre de la Sucursal *</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="col-md-6">
                        <label for="encargado" class="form-label">Encargado</label>
                        <input type="text" class="form-control" id="encargado" name="encargado">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="direccion" class="form-label">Dirección *</label>
                        <textarea class="form-control" id="direccion" name="direccion" rows="3" required></textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="tel" class="form-control" id="telefono" name="telefono">
                    </div>
                    <div class="col-md-4">
                        <label for="horario_apertura" class="form-label">Horario de Apertura</label>
                        <input type="time" class="form-control" id="horario_apertura" name="horario_apertura">
                    </div>
                    <div class="col-md-4">
                        <label for="horario_cierre" class="form-label">Horario de Cierre</label>
                        <input type="time" class="form-control" id="horario_cierre" name="horario_cierre">
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Guardar Sucursal
                        </button>
                        <a href="<?php echo APP_URL; ?>?controller=sucursal&action=index" class="btn btn-secondary ms-2">
                            <i class="fas fa-arrow-left me-2"></i>Cancelar
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>