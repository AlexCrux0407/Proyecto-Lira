<?php

class SucursalController {
    private $db;

    public function __construct() {
        require_once 'config/database.php';
        $this->db = new Database();
    }

    public function index() {
        $query = "SELECT * FROM sucursales ORDER BY nombre";
        $sucursales = $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        require_once 'views/sucursal/index.php';
    }

    public function create() {
        require_once 'views/sucursal/create.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'] ?? '';
            $direccion = $_POST['direccion'] ?? '';
            $telefono = $_POST['telefono'] ?? '';
            $encargado = $_POST['encargado'] ?? '';
            $horario_apertura = $_POST['horario_apertura'] ?? null;
            $horario_cierre = $_POST['horario_cierre'] ?? null;

            $query = "INSERT INTO sucursales (nombre, direccion, telefono, encargado, horario_apertura, horario_cierre) 
                      VALUES (?, ?, ?, ?, ?, ?)";
            $params = [$nombre, $direccion, $telefono, $encargado, $horario_apertura, $horario_cierre];

            try {
                $this->db->query($query, $params);
                header('Location: ' . APP_URL . '?controller=sucursal&action=index');
                exit;
            } catch (PDOException $e) {
                error_log('Error al crear sucursal: ' . $e->getMessage());
                // Manejar el error apropiadamente
            }
        }
    }

    public function view() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: ' . APP_URL . '?controller=sucursal&action=index');
            exit;
        }

        $query = "SELECT * FROM sucursales WHERE id = ?";
        $sucursal = $this->db->query($query, [$id])->fetch(PDO::FETCH_ASSOC);

        if (!$sucursal) {
            header('Location: ' . APP_URL . '?controller=sucursal&action=index');
            exit;
        }

        // Obtener empleados de la sucursal
        $queryEmpleados = "SELECT * FROM empleados WHERE sucursal_id = ?";
        $empleados = $this->db->query($queryEmpleados, [$id])->fetchAll(PDO::FETCH_ASSOC);

        require_once 'views/sucursal/view.php';
    }

    public function edit() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: ' . APP_URL . '?controller=sucursal&action=index');
            exit;
        }

        $query = "SELECT * FROM sucursales WHERE id = ?";
        $sucursal = $this->db->query($query, [$id])->fetch(PDO::FETCH_ASSOC);

        if (!$sucursal) {
            header('Location: ' . APP_URL . '?controller=sucursal&action=index');
            exit;
        }

        require_once 'views/sucursal/edit.php';
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
            if (!$id) {
                header('Location: ' . APP_URL . '?controller=sucursal&action=index');
                exit;
            }

            $nombre = $_POST['nombre'] ?? '';
            $direccion = $_POST['direccion'] ?? '';
            $telefono = $_POST['telefono'] ?? '';
            $encargado = $_POST['encargado'] ?? '';
            $horario_apertura = $_POST['horario_apertura'] ?? null;
            $horario_cierre = $_POST['horario_cierre'] ?? null;

            $query = "UPDATE sucursales 
                      SET nombre = ?, direccion = ?, telefono = ?, 
                          encargado = ?, horario_apertura = ?, horario_cierre = ? 
                      WHERE id = ?";
            $params = [$nombre, $direccion, $telefono, $encargado, 
                       $horario_apertura, $horario_cierre, $id];

            try {
                $this->db->query($query, $params);
                header('Location: ' . APP_URL . '?controller=sucursal&action=view&id=' . $id);
                exit;
            } catch (PDOException $e) {
                error_log('Error al actualizar sucursal: ' . $e->getMessage());
                // Manejar el error apropiadamente
            }
        }
    }
}