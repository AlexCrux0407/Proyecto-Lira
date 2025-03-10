<?php

class EmpleadoController {
    private $db;

    public function __construct() {
        require_once 'config/database.php';
        $this->db = new Database();
    }

    public function index() {
        $query = "SELECT e.*, s.nombre as sucursal_nombre 
                 FROM empleados e 
                 LEFT JOIN sucursales s ON e.sucursal_id = s.id 
                 ORDER BY e.nombre, e.apellidos";
        $empleados = $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        require_once 'views/empleado/index.php';
    }

    public function create() {
        // Obtener lista de sucursales para el formulario
        $query = "SELECT id, nombre FROM sucursales ORDER BY nombre";
        $sucursales = $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        require_once 'views/empleado/create.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'] ?? '';
            $apellidos = $_POST['apellidos'] ?? '';
            $sucursal_id = $_POST['sucursal_id'] ?? null;
            $puesto = $_POST['puesto'] ?? '';
            $fecha_contratacion = $_POST['fecha_contratacion'] ?? null;
            $salario = $_POST['salario'] ?? null;
            $telefono = $_POST['telefono'] ?? '';
            $email = $_POST['email'] ?? '';

            $query = "INSERT INTO empleados (nombre, apellidos, sucursal_id, puesto, fecha_contratacion, salario, telefono, email) 
                      VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $params = [$nombre, $apellidos, $sucursal_id, $puesto, $fecha_contratacion, $salario, $telefono, $email];

            try {
                $this->db->query($query, $params);
                header('Location: ' . APP_URL . '?controller=empleado&action=index');
                exit;
            } catch (PDOException $e) {
                error_log('Error al crear empleado: ' . $e->getMessage());
                // Manejar el error apropiadamente
            }
        }
    }

    public function view() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: ' . APP_URL . '?controller=empleado&action=index');
            exit;
        }

        $query = "SELECT e.*, s.nombre as sucursal_nombre 
                 FROM empleados e 
                 LEFT JOIN sucursales s ON e.sucursal_id = s.id 
                 WHERE e.id = ?";
        $empleado = $this->db->query($query, [$id])->fetch(PDO::FETCH_ASSOC);

        if (!$empleado) {
            header('Location: ' . APP_URL . '?controller=empleado&action=index');
            exit;
        }

        require_once 'views/empleado/view.php';
    }

    public function edit() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: ' . APP_URL . '?controller=empleado&action=index');
            exit;
        }

        $query = "SELECT * FROM empleados WHERE id = ?";
        $empleado = $this->db->query($query, [$id])->fetch(PDO::FETCH_ASSOC);

        if (!$empleado) {
            header('Location: ' . APP_URL . '?controller=empleado&action=index');
            exit;
        }

        // Obtener lista de sucursales para el formulario
        $querySucursales = "SELECT id, nombre FROM sucursales ORDER BY nombre";
        $sucursales = $this->db->query($querySucursales)->fetchAll(PDO::FETCH_ASSOC);

        require_once 'views/empleado/edit.php';
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
            if (!$id) {
                header('Location: ' . APP_URL . '?controller=empleado&action=index');
                exit;
            }

            $nombre = $_POST['nombre'] ?? '';
            $apellidos = $_POST['apellidos'] ?? '';
            $sucursal_id = $_POST['sucursal_id'] ?? null;
            $puesto = $_POST['puesto'] ?? '';
            $fecha_contratacion = $_POST['fecha_contratacion'] ?? null;
            $salario = $_POST['salario'] ?? null;
            $telefono = $_POST['telefono'] ?? '';
            $email = $_POST['email'] ?? '';

            $query = "UPDATE empleados 
                      SET nombre = ?, apellidos = ?, sucursal_id = ?, 
                          puesto = ?, fecha_contratacion = ?, salario = ?, 
                          telefono = ?, email = ? 
                      WHERE id = ?";
            $params = [$nombre, $apellidos, $sucursal_id, $puesto, 
                       $fecha_contratacion, $salario, $telefono, $email, $id];

            try {
                $this->db->query($query, $params);
                header('Location: ' . APP_URL . '?controller=empleado&action=view&id=' . $id);
                exit;
            } catch (PDOException $e) {
                error_log('Error al actualizar empleado: ' . $e->getMessage());
                // Manejar el error apropiadamente
            }
        }
    }
}