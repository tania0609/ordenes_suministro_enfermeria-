<?php
// C:\xampp\htdocs\ordenes_enfermeria\php\controllers\buscar_contratos.php
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
    // Obtener el número de procedimiento desde la URL
    $nProcedimiento = isset($_GET['n_procedimiento']) ? trim($_GET['n_procedimiento']) : '';

    if (empty($nProcedimiento)) {
        echo json_encode([]);
        exit;
    }

    // Instancia de la clase Database
    $database = new Database(DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWORD);
    $conn = $database->getConnections();

    // Consulta SQL para buscar los contratos asociados al procedimiento
    $sql = "SELECT DISTINCT n_contrato, partida FROM contratos WHERE n_procedimiento = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param('s', $nProcedimiento);
        $stmt->execute();
        $result = $stmt->get_result();
        $contratos = [];

        while ($row = $result->fetch_assoc()) {
            $contratos[] = $row;
        }

        // Devolver los contratos como JSON
        echo json_encode($contratos);
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