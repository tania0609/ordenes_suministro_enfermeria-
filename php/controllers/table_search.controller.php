<?php
require(__DIR__ . '/../models/database.model.php');
include(__DIR__ . '/../dbconfig_medicamentos.php');

// Conectar a la base de datos
$connectionDB = new Database(DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWORD);

// Recoger los filtros del POST
$filtros = $_POST;

// Construir la consulta SQL con filtros
$query_folios = "SELECT * FROM tabla_medicamentos WHERE 1=1";

// Aplicar filtros si están presentes
$filter_clauses = [];

if (!empty($filtros['CENAPRECE'])) {
    $filter_clauses[] = "clave LIKE '" . $filtros['CENAPRECE'] . "%'";
}

if (!empty($filtros['GC'])) {
    $filter_clauses[] = "clave LIKE '" . $filtros['GC'] . "%'";
}

if (!empty($filtros['HRAEI'])) {
    $filter_clauses[] = "clave LIKE '" . $filtros['HRAEI'] . "%'";
}

if (!empty($filtros['SADMI'])) {
    $filter_clauses[] = "clave LIKE '" . $filtros['SADMI'] . "%'";
}

// Combinar los filtros con un OR
if (count($filter_clauses) > 0) {
    $query_folios .= " AND (" . implode(' OR ', $filter_clauses) . ")";
}

// Ejecutar la consulta
$data_folios = $connectionDB->getRows($query_folios);

// Transformar los datos para DataTables
$formatted_data = [];
foreach ($data_folios as $folio) {
    $formatted_data[] = [
        $folio['clave'],
        $folio['descripcion'],
        $folio['existencia'],
        $folio['cpm'],
        $folio['meses_existencia'],
        $folio['observaciones'],
        $folio['status']
    ];
}
echo json_encode(['data' => $formatted_data]);
?>
