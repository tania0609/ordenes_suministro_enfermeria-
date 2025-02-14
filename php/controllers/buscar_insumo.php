<?php
require_once '../models/database.model.php'; // Incluye la clase Database
require_once '../dbconfig_medicamentos.php'; // Configuración de la base de datos

// Limpiar el búfer de salida
ob_clean();

// Configurar el encabezado para JSON
header('Content-Type: application/json');

// Manejar errores internamente
ini_set('display_errors', 0);
error_reporting(0);

try {
    // Obtener la clave interna desde la URL
    $clave = isset($_GET['clave']) ? trim($_GET['clave']) : '';

    if (empty($clave)) {
        echo json_encode([]);
        exit;
    }

    // Instancia de la clase Database
    $database = new Database(DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWORD);
    $conn = $database->getConnections();

    // Consulta SQL para obtener los datos del insumo asociado a la clave
    $sql = "SELECT cnis, cucop, descripcion, unidad_de_medida, cantidad_minima, cantidad_maxima, precio_unitario, tasa_iva 
            FROM contratos 
            WHERE clave = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param('s', $clave);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            // Devolver los datos como JSON
            echo json_encode($row);
        } else {
            echo json_encode([]);
        }
    } else {
        echo json_encode([]);
    }
} catch (Exception $e) {
    // En caso de error, devolver un array vacío
    echo json_encode([]);
}

// Cerrar la conexión
$database->closeConnection($conn);
?>