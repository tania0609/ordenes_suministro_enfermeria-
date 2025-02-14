<?php
// C:\xampp\htdocs\ordenes_enfermeria\php\controllers\buscar_proveedor.php
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
    // Obtener el número de contrato desde la URL
    $nContrato = isset($_GET['n_contrato']) ? trim($_GET['n_contrato']) : '';

    if (empty($nContrato)) {
        echo json_encode(['proveedor' => '']);
        exit;
    }

    // Instancia de la clase Database
    $database = new Database(DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWORD);
    $conn = $database->getConnections();

    // Consulta SQL para obtener el proveedor asociado al contrato
    $sql = "SELECT proveedor FROM contratos WHERE n_contrato = ? LIMIT 1";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param('s', $nContrato);
        $stmt->execute();
        $result = $stmt->get_result();
        $proveedor = '';

        if ($row = $result->fetch_assoc()) {
            $proveedor = $row['proveedor'];
        }

        // Devolver el nombre del proveedor como JSON
        echo json_encode(['proveedor' => $proveedor]);
    } else {
        echo json_encode(['proveedor' => '']);
    }
} catch (Exception $e) {
    // En caso de error, devolver un array vacío
    echo json_encode(['proveedor' => '']);
}

// Cerrar la conexión
$database->closeConnection($conn);
?>