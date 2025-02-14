<?php
require('php/controllers/count_table.controller.php');
include("modal/registromedicamento.php");

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.dataTables.css" />
    <!-- Bootstrap 5.3.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootstrap 5.3.3 JS (con Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Incluye la biblioteca jsPDF versión 1.5.3 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>

    <!-- Estilos CSS personalizados -->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Orden de Suministros</title>
</head>

<body>

    <header>
        <h5 class="bi bi-receipt-cutoff" style="color:rgb(243, 243, 243); margin-top: 10px;"> Orden de Suministro
            Enfermeria</h5>
        <br>
        <div style="padding: 20px; text-align: right;">
            <button type="button" class="btn btn-outline-light" id="cerrar-sesion-button" title="Cerrar sesión">
                <i class="bi bi-power"></i>
            </button>
        </div>
    </header>
    <br>

    <!-- ESTE ES EL BLOQUE DE LOS BOTONES-->




    <!-- ======================== AQUI INICIA EL BUSCADOR ======================== -->
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="container">


                    <div class="row">
                        <div class="col-md-1"></div>
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                            data-bs-target="#registromedicamento">
                            <i class="bi bi-file-earmark-plus"></i> Nueva Orden
                        </button>
                    </div>


                </div>
            </div>
            <div class="col-md-2">
                <div class="container">


                    <div class="row">
                        <div class="col-md-1"></div>
                        <button type="button" class="btn btn-danger" onclick="location.href='contratos.php';"><i
                                class="bi bi-file-earmark-check"></i>
                            Contratos
                        </button>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <div class="row">
            <!-- Contenedor de la lista de pacientes -->
             
            <div class="col-md-4">
                <div id="patient-list-container">
                    <br>
                    <input type="text" id="search" placeholder="Buscar ...">
                    
                    <ul id="patient-list">
                        <li class="bi bi-files" data-id-paciente="10">IB-HRAEI-AD-180-0050-2024
                            <div class="d-flex gap-2 mt-2">
                                <a href="editar.php">
                                    <button type="button" class="btn btn-light"
                                        style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .60rem;">
                                        Editar
                                    </button>
                                </a>
                                <button type="button" class="btn btn-info" id="btnVerInfo"
                                    style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .60rem;">
                                    Ver mi Información
                                </button>

                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Contenedor para mostrar consulta.php -->
            <div class="col-md-8">
                <div id="consulta-container" class="border p-3" style="background-color: #f8f9fa;">
                    <h5 id="titulo-info">Información del Paciente</h5>
                    <div id="consulta-content">
                        <!-- Muestra el contenido de consulta.php -->
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    
    

    <div class="col-7">
        <div class="container">
            <!-- Tu código existente -->

            <!-- Agrega un div para contener el select dinámico -->
            <div id="Seguimiento_index" style="display: none;">
                <select name="paciente_seleccionado" class="col-6 form-select custom-select"
                    id="paciente_seleccionado" style="background-color: #6c757d; color: white; margin-bottom:10px">
                </select>

            </div>

            <iframe id="consulta" src="" frameborder="0" width="100%" height="800px"
                style="margin-bottom: 100px;"></iframe>
        </div> <!-- <div class="container"> -->
    </div> <!-- FINALIZA EL DIV class col 8 -->

    <iframe id="consulta_seguimiento" src="" frameborder="0" width="100%" height="800px"
        style="margin-bottom: 100px;"></iframe>

    <div class="col-7">
        <div class="container">
            <iframe id="consulta" src="consulta.php" frameborder="0" width="100%" height="800px"
                style="margin-bottom: 100px;"></iframe>
        </div> <!--<div class="container">-->
    </div><!-- FINALIZA EL DIV class col 8-->

        <!-- ======================== AQUI FINALIZA LA TABLA ======================== -->


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script>
    <script src="js/verInfo_paciente.js"></script>
    <script src="js/scripteditar.js"></script>
    <!-- jQuery UI -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/smoothness/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

</body>

</html>