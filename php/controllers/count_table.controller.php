<?php
require (__DIR__ . '/../models/database.model.php');
include (__DIR__ . '/../dbconfig_medicamentos.php');


$connectionDB = new Database(DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWORD);

$query_hraei = "SELECT COUNT(*) FROM `tabla_medicamentos` WHERE clave LIKE 'HRAEI-%'";

$result_hraei = $connectionDB->getRows($query_hraei);

$count_hraei = isset($result_hraei[0]['COUNT(*)']) ? intval($result_hraei[0]['COUNT(*)']) : 0;

$query_hraei_no_utilizado = "SELECT COUNT(*) FROM `tabla_medicamentos` WHERE clave LIKE 'HRAEI-%' AND status = 'NO UTILIZADA'";

$result_hraei_no_utilizado = $connectionDB->getRows($query_hraei_no_utilizado);

$count_hraei_no_utilizado = isset($result_hraei_no_utilizado[0]['COUNT(*)']) ? intval($result_hraei_no_utilizado[0]['COUNT(*)']) : 0;

$count_hraei_activo = $count_hraei - $count_hraei_no_utilizado;

$query_hraei_existencia = "SELECT COUNT(*) FROM `tabla_medicamentos` WHERE clave LIKE 'HRAEI-%' AND existencia > 0";

$result_hraei_existencia = $connectionDB->getRows($query_hraei_existencia);

$count_hraei_existencia = isset($result_hraei_existencia[0]['COUNT(*)']) ? intval($result_hraei_existencia[0]['COUNT(*)']) : 0;

$count_hraei_abasto = number_format((($count_hraei_existencia / $count_hraei_activo) * 100),2) ;



$query_gc = "SELECT COUNT(*) FROM `tabla_medicamentos` WHERE clave LIKE 'GC-HRAEI-%'";

$result_gc = $connectionDB->getRows($query_gc);

$count_gc = isset($result_gc[0]['COUNT(*)']) ? intval($result_gc[0]['COUNT(*)']) : 0;

$query_gc_existencia = "SELECT COUNT(*) FROM `tabla_medicamentos` WHERE clave LIKE 'GC-HRAEI-%' AND existencia > 0";

$result_gc_existencia = $connectionDB->getRows($query_gc_existencia);

$count_gc_existencia = isset($result_gc_existencia[0]['COUNT(*)']) ? intval($result_gc_existencia[0]['COUNT(*)']) : 0;

$count_gc_abasto = number_format((($count_gc_existencia / $count_gc) * 100),2) ;



$query_sadmi = "SELECT COUNT(*) FROM `tabla_medicamentos` WHERE clave LIKE 'SADMI-HRAEI-%'";

$result_sadmi = $connectionDB->getRows($query_sadmi);

$count_sadmi = isset($result_sadmi[0]['COUNT(*)']) ? intval($result_sadmi[0]['COUNT(*)']) : 0;

$query_sadmi_existencia = "SELECT COUNT(*) FROM `tabla_medicamentos` WHERE clave LIKE 'SADMI-HRAEI-%' AND existencia > 0";

$result_sadmi_existencia = $connectionDB->getRows($query_sadmi_existencia);

$count_sadmi_existencia = isset($result_sadmi_existencia[0]['COUNT(*)']) ? intval($result_sadmi_existencia[0]['COUNT(*)']) : 0;

$count_sadmi_abasto = number_format((($count_sadmi_existencia / $count_sadmi) * 100),2) ;



$claves_total = $count_hraei_activo + $count_gc + $count_sadmi;

$claves_total_existencia = $count_hraei_existencia + $count_gc_existencia + $count_sadmi_existencia;

$nivel_abasto = number_format((($claves_total_existencia / $claves_total) * 100),2) ;

$claves_desavasto = $claves_total - $claves_total_existencia;



$query_criticas = "SELECT COUNT(*) FROM `tabla_medicamentos` WHERE observaciones = 'CRITICA'";

$result_criticas = $connectionDB->getRows($query_criticas);

$count_criticas = isset($result_criticas[0]['COUNT(*)']) ? intval($result_criticas[0]['COUNT(*)']) : 0;




?>