<?php
require (__DIR__ . '/../models/database.model.php');
include (__DIR__ . '/../dbconfig_medicamentos.php');


$connectionDB = new Database(DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWORD);

$query_folios = "SELECT * FROM tabla_ramo47";

$data_folios = $connectionDB->getRows($query_folios);

?>