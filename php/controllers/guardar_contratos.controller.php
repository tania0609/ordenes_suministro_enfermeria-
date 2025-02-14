<?php
require (__DIR__ . '/../models/database.model.php'); 
require '../../../vendor/autoload.php'; 
require '../dbconfig_medicamentos.php'; 

use PhpOffice\PhpSpreadsheet\IOFactory;

header('Content-Type: application/json');

// Instancia de la clase Database
$database = new Database(DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWORD);

// Obtener la conexión
$conn = $database->getConnections();

// Iniciar una transacción
$conn->begin_transaction();

try {
    // Verificar si se subió un archivo
    if (!isset($_FILES['archivoExcel']) || $_FILES['archivoExcel']['error'] !== UPLOAD_ERR_OK) {
        echo json_encode(['success' => false, 'message' => 'No se recibió un archivo válido.']);
        exit;
    }

    // Obtener los datos complementarios
    $numeroProcedimiento = $_POST['numeroProcedimiento'];
    $trimestre = $_POST['trimestre'];
    $anio = $_POST['anio'];

    // Leer el archivo Excel
    $tmpFilePath = $_FILES['archivoExcel']['tmp_name'];
    $spreadsheet = IOFactory::load($tmpFilePath);
    $sheet = $spreadsheet->getActiveSheet();
    $data = $sheet->toArray(); // Convertir la hoja a un array

    // Función para limpiar valores de moneda
    function limpiarMoneda($valor) {
        $valorLimpio = str_replace(['$', '€', ','], '', $valor); // Elimina símbolos y comas
        return floatval($valorLimpio); // Convierte a número decimal
    }

    // Construir una consulta por lotes
    $query = "INSERT INTO contratos (
                n_contrato, proveedor, partida, clave, cnis, cucop, descripcion, unidad_de_medida,
                precio_unitario, cantidad_minima, cantidad_maxima, importe_minimo, importe_maximo,
                tasa_iva, n_procedimiento, trimestre, anio
              ) VALUES ";

    $values = [];
    foreach ($data as $index => $fila) {
        if ($index === 0) continue; // Ignorar la primera fila (encabezados)
        if (count($fila) < 14) continue; // Validar que la fila tenga suficientes columnas

        // Limpiar los valores de moneda
        $precioUnitario = limpiarMoneda($fila[8]); // precio_unitario
        $importeMinimo = limpiarMoneda($fila[11]); // importe_minimo
        $importeMaximo = limpiarMoneda($fila[12]); // importe_maximo

        // Escapar los valores para evitar inyecciones SQL
        $escapedValues = array_map([$conn, 'real_escape_string'], [
            $fila[0], // n_contrato
            $fila[1], // proveedor
            $fila[2], // partida
            $fila[3], // clave
            $fila[4], // cnis
            $fila[5], // cucop
            $fila[6], // descripcion
            $fila[7], // unidad_de_medida
            $precioUnitario, // precio_unitario
            $fila[9], // cantidad_minima
            $fila[10], // cantidad_maxima
            $importeMinimo, // importe_minimo
            $importeMaximo, // importe_maximo
            $fila[13], // tasa_iva
            $numeroProcedimiento,
            $trimestre,
            $anio
        ]);

        // Agregar los valores a la consulta
        $values[] = "('" . implode("','", $escapedValues) . "')";
    }

    // Combinar los valores en la consulta
    $query .= implode(",", $values);

    // Ejecutar la consulta por lotes
    if ($conn->query($query)) {
        // Confirmar la transacción
        $conn->commit();
        echo json_encode(['success' => true, 'message' => 'Datos guardados correctamente.']);
    } else {
        // Revertir la transacción en caso de error
        $conn->rollback();
        echo json_encode(['success' => false, 'message' => 'Error al insertar datos: ' . $conn->error]);
    }
} catch (Exception $e) {
    // Revertir la transacción en caso de excepción
    $conn->rollback();
    echo json_encode(['success' => false, 'message' => 'Error al procesar los datos: ' . $e->getMessage()]);
}

// Cerrar la conexión
$database->closeConnection($conn);
?>