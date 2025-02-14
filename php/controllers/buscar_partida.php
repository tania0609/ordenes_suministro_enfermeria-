<?php
// C:\xampp\htdocs\ordenes_enfermeria\php\controllers\buscar_partida.php
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
        echo json_encode(['partida' => '']);
        exit;
    }

    // Instancia de la clase Database
    $database = new Database(DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWORD);
    $conn = $database->getConnections();

    // Consulta SQL para obtener la partida presupuestal asociada al contrato
    $sql = "SELECT partida FROM contratos WHERE n_contrato = ? LIMIT 1";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param('s', $nContrato);
        $stmt->execute();
        $result = $stmt->get_result();
        $partida = '';

        if ($row = $result->fetch_assoc()) {
            $partida = $row['partida'];
        }

        // Devolver la partida presupuestal como JSON
        echo json_encode(['partida' => $partida]);
    } else {
        echo json_encode(['partida' => '']);
    }
} catch (Exception $e) {
    // En caso de error, devolver un array vacío
    echo json_encode(['partida' => '']);
}

// Cerrar la conexión
$database->closeConnection($conn);
?>