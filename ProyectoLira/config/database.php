<?php
// Archivo de conexión a la base de datos

class Database {
    private $connection;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        if (!isset($this->connection)) {
            try {
                $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4';
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ];
                
                $this->connection = new PDO($dsn, DB_USER, DB_PASS, $options);
            } catch (PDOException $e) {
                error_log('Error de conexión: ' . $e->getMessage());
                die('Error de conexión a la base de datos. Por favor, contacte al administrador.');
            }
        }
    }

    public function query($sql, $params = []) {
        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
            error_log('Error en la consulta: ' . $e->getMessage());
            return false;
        }
    }

    public function fetch($sql, $params = []) {
        $result = $this->query($sql, $params);
        return $result ? $result->fetch() : false;
    }

    public function fetchAll($sql, $params = []) {
        $result = $this->query($sql, $params);
        return $result ? $result->fetchAll() : [];
    }

    public function insert($table, $data) {
        try {
            $columns = implode(', ', array_keys($data));
            $placeholders = implode(', ', array_fill(0, count($data), '?'));
            
            $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$placeholders})";
            
            $stmt = $this->connection->prepare($sql);
            $stmt->execute(array_values($data));
            
            return $this->connection->lastInsertId();
        } catch (PDOException $e) {
            error_log('Error al insertar: ' . $e->getMessage());
            return false;
        }
    }

    public function update($table, $data, $where, $params = []) {
        try {
            $set = [];
            foreach (array_keys($data) as $column) {
                $set[] = "{$column} = ?";
            }
            $set = implode(', ', $set);
            
            $sql = "UPDATE {$table} SET {$set} WHERE {$where}";
            
            $stmt = $this->connection->prepare($sql);
            $stmt->execute(array_merge(array_values($data), $params));
            
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            error_log('Error al actualizar: ' . $e->getMessage());
            return false;
        }
    }

    public function delete($table, $where, $params = []) {
        try {
            $sql = "DELETE FROM {$table} WHERE {$where}";
            
            $stmt = $this->connection->prepare($sql);
            $stmt->execute($params);
            
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            error_log('Error al eliminar: ' . $e->getMessage());
            return false;
        }
    }
}

// Funciones de utilidad para mantener compatibilidad con código existente

/**
 * Obtiene una conexión a la base de datos
 * 
 * @return PDO Objeto de conexión PDO
 */
function get_db_connection() {
    static $connection;
    
    if (!isset($connection)) {
        try {
            $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4';
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            
            $connection = new PDO($dsn, DB_USER, DB_PASS, $options);
        } catch (PDOException $e) {
            error_log('Error de conexión: ' . $e->getMessage());
            die('Error de conexión a la base de datos. Por favor, contacte al administrador.');
        }
    }
    
    return $connection;
}

/**
 * Ejecuta una consulta SQL y devuelve el resultado
 * 
 * @param string $sql Consulta SQL
 * @param array $params Parámetros para la consulta preparada
 * @return PDOStatement|false Resultado de la consulta o false en caso de error
 */
function query($sql, $params = []) {
    try {
        $db = get_db_connection();
        $stmt = $db->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    } catch (PDOException $e) {
        error_log('Error en la consulta: ' . $e->getMessage());
        return false;
    }
}

/**
 * Obtiene un solo registro de la base de datos
 * 
 * @param string $sql Consulta SQL
 * @param array $params Parámetros para la consulta preparada
 * @return array|bool Registro encontrado o false
 */
function fetch_row($sql, $params = []) {
    $result = query($sql, $params);
    return $result ? $result->fetch() : false;
}

/**
 * Obtiene múltiples registros de la base de datos
 * 
 * @param string $sql Consulta SQL
 * @param array $params Parámetros para la consulta preparada
 * @return array Registros encontrados
 */
function fetch_all($sql, $params = []) {
    $result = query($sql, $params);
    return $result ? $result->fetchAll() : [];
}

/**
 * Inserta un registro en la base de datos
 * 
 * @param string $table Nombre de la tabla
 * @param array $data Datos a insertar (columna => valor)
 * @return int|bool ID del registro insertado o false
 */
function insert($table, $data) {
    $db = new Database();
    return $db->insert($table, $data);
}

/**
 * Actualiza un registro en la base de datos
 * 
 * @param string $table Nombre de la tabla
 * @param array $data Datos a actualizar (columna => valor)
 * @param string $where Condición WHERE
 * @param array $params Parámetros para la condición WHERE
 * @return bool Éxito de la operación
 */
function update($table, $data, $where, $params = []) {
    $db = new Database();
    return $db->update($table, $data, $where, $params);
}

/**
 * Elimina un registro de la base de datos
 * 
 * @param string $table Nombre de la tabla
 * @param string $where Condición WHERE
 * @param array $params Parámetros para la condición WHERE
 * @return bool Éxito de la operación
 */
function delete($table, $where, $params = []) {
    $db = new Database();
    return $db->delete($table, $where, $params);
}