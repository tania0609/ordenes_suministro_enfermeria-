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
    // Obtener el término de búsqueda desde la URL
    $query = isset($_GET['query']) ? trim($_GET['query']) : '';
    
    // Verifica si 'query' está vacío
    if (empty($query)) {
        echo json_encode(["status" => "error", "message" => "El campo de búsqueda está vacío"]);
        exit;
    }

    // Depuración: Imprimir el valor de 'query' para asegurarnos de que se recibe
    // Esto se puede eliminar después de la depuración
    error_log("Query recibido: " . $query);

    // Instancia de la clase Database
    $database = new Database(DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWORD);
    $conn = $database->getConnections();

    // Consulta SQL para buscar coincidencias en la columna n_procedimiento
    $sql = "SELECT DISTINCT n_procedimiento FROM contratos WHERE n_procedimiento LIKE ? LIMIT 10";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $searchTerm = $query . '%'; // Buscar términos que comiencen con el valor ingresado
        $stmt->bind_param('s', $searchTerm);
        $stmt->execute();
        $result = $stmt->get_result();

        $sugerencias = [];
        while ($row = $result->fetch_assoc()) {
            $sugerencias[] = ['n_procedimiento' => $row['n_procedimiento']];
        }

        // Devolver las sugerencias como JSON
        echo json_encode($sugerencias);
    } else {
        echo json_encode(["status" => "error", "message" => "Error en la consulta"]);
    }
} catch (Exception $e) {
    // En caso de error, devolver un array vacío
    echo json_encode(["status" => "error", "message" => "Error al buscar procedimientos: " . $e->getMessage()]);
}

// Cerrar la conexión
$database->closeConnection($conn);
?>
