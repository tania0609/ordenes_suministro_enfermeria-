<?php

// require (__DIR__ . '/../models/database.model.php');
// include (__DIR__ . '/../dbconfig_EG.php');

// $connectionDB = new Database(DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWORD);

// $id_paciente = null;
// if (isset($_GET['idPaciente']) && is_numeric($_GET['idPaciente'])) {
//     $id_paciente = $_GET['idPaciente'];


//     $queryAllData = "SELECT * FROM suplencias su
//         JOIN quien_suple qs ON su.id_suplencia = qs.id_suplencia
//         WHERE su.id_suplencia ='$id_paciente'";

//     $AllData = $connectionDB->getRows($queryAllData);

//     if (!empty($AllData)) {
//         foreach ($AllData as $data) {

//             $id_suplencia = $data['id_suplencia'];
//             $folio = $data['folio'];
//             $fechaHoy = $data['fechaHoy'];
//             $tipo_traba = $data['tipo_traba'];
//             $fecha_ingreso = $data['fecha_ingreso'];
//             $adscripcion = $data['adscripcion'];
//             $turno = $data['turno'];
//             $dias_h = $data['dias_h'];
//             $dias_d = $data['dias_d'];
//             $horaInicio = $data['horaInicio'];
//             $horaFin = $data['horaFin'];
//             $correo = $data['correo'];
//             $fechaInicio = $data['fechaInicio'];
//             $fechaFin = $data['fechaFin'];
//             $autoriza = $data['autoriza'];
//             $cargo = $data['cargo'];
//             $numeroempleado_1 = $data['numeroempleado_1'];
//             $enlace_numeroempleado = $data['enlace_numeroempleado'];
//             $nivel_academico = $data['nivel_academico'];
//             $codigopuesto = $data['codigopuesto'];
//             $puesto = $data['puesto'];
//             $servicio = $data['servicio'];
//             $critica = $data['critica'];
//             $clinicas = $data['clinicas'];
//             $quirurgicas = $data['quirurgicas'];
//             $perinatales = $data['perinatales'];
//             $Ambulatorias = $data['Ambulatorias'];
//             $hospitalizacion = $data['hospitalizacion'];
//             $pediatria = $data['pediatria'];
//             $num_suplencia = $data['num_suplencia'];
//             $estatus_solicitud = $data['estatus_solicitud'];
//             $observaciones = $data['observaciones'];
//             $numeroempleado_suplencia = $data['numeroempleado_suplencia'];
//             $nombre_suplencia = $data['nombre_suplencia'];
//             $nivel_academico_suplencia = $data['nivel_academico_suplencia'];
//             $codigopuesto_suplencia = $data['codigopuesto_suplencia'];
//             $puesto_suplencia = $data['puesto_suplencia'];
//             $turno2 = $data['turno2'];
//             $dias_h2 = $data['dias_h2'];
//             $dias_d2 = $data['dias_d2'];
//             $horaInicio_suplencia = $data['horaInicio_suplencia'];
//             $horaFin_suplencia = $data['horaFin_suplencia'];
//             $servicio_sustituto = $data['servicio_sustituto'];
//             $critica_sustituto = $data['critica_sustituto'];
//             $clinicas_sustituto = $data['clinicas_sustituto'];
//             $quirurgicas_sustituto = $data['quirurgicas_sustituto'];
//             $perinatales_sustituto = $data['perinatales_sustituto'];
//             $Ambulatorias_sustituto = $data['Ambulatorias_sustituto'];
//             $hospitalizacion_sustituto = $data['hospitalizacion_sustituto'];
//             $pediatria_sustituto = $data['pediatria_sustituto'];
//             $estatus_solicitud = $data['estatus_solicitud'];
//             $observaciones = $data['observaciones'];
            



//         }
//     } else {
//         echo "No se encontro la informacion";
//         exit;
//     }
// } else {
//     echo $id_paciente;
//     exit;
// }


?>