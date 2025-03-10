<?php
$pageTitle = 'Nuevo Proveedor';
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
            <h2><i class="fas fa-truck-loading me-2"></i>Nuevo Proveedor</h2>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="<?php echo APP_URL; ?>?controller=proveedor&action=store" method="POST">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nombre_empresa" class="form-label">Nombre de la Empresa *</label>
                        <input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa" required>
                    </div>
                    <div class="col-md-6">
                        <label for="contacto_nombre" class="form-label">Nombre de Contacto</label>
                        <input type="text" class="form-control" id="contacto_nombre" name="contacto_nombre">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="tel" class="form-control" id="telefono" name="telefono">
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="direccion" class="form-label">Dirección</label>
                        <textarea class="form-control" id="direccion" name="direccion" rows="2"></textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="productos_servicios" class="form-label">Productos/Servicios</label>
                        <textarea class="form-control" id="productos_servicios" name="productos_servicios" rows="3"></textarea>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Guardar Proveedor
                        </button>
                        <a href="<?php echo APP_URL; ?>?controller=proveedor&action=index" class="btn btn-secondary ms-2">
                            <i class="fas fa-arrow-left me-2"></i>Cancelar
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>