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
                    <fieldset class="fieldset-botones">
                        <legend>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#registromedicamento">
                                    <i class="bi bi-file-earmark-plus"></i> Nueva Orden
                                </button>
                            </div>
                        </legend>
                    </fieldset>
                </div>
            </div>
            <div class="col-md-2">
                <div class="container">
                    <fieldset class="fieldset-botones" id="fieldset-especial">
                        <legend>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <button type="button" class="btn btn-danger"
                                    onclick="location.href='contratos.php';"><i class="bi bi-file-earmark-check"></i>
                                    Contratos
                                </button>
                            </div>
                        </legend>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4" style="margin-bottom: 20px">
        <table class="table table-bordered">
            <thead>
                <!-- Encabezado -->
                <tr class="table-warning">
                    <th colspan="6" style="text-align: center;">DESCRIPCIÓN DE RAMO 47</th>
                </tr>
            </thead>
            <tbody>
                <!-- Sección 1: DESCRIPCIÓN DE RAMO 47 -->
                <tr>
                    <td>CONTRATOS RAMO 47</td>
                    <td>309</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>CLAVES ADJUDICADAS RAMO 47</td>
                    <td>505</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>PARTIDAS TOTALES</td>
                    <td>987</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <!-- Espaciador -->
                <tr class="table-warning">
                    <th colspan="6" style="text-align: center;">MOVIMIENTO DE PARTIDAS</th>
                </tr>
                <!-- Sección 2: MOVIMIENTO DE PARTIDAS -->
                <tr>
                    <td>PARTIDAS SOLICITADAS</td>
                    <td>666</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>PARTIDAS SIN MOVIMIENTO</td>
                    <td>321</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <!-- Espaciador -->
                <tr class="table-warning">
                    <th colspan="6" style="text-align: center;">ANÁLISIS DE SOLICITUD DE "MÍNIMO 40%"</th>
                </tr>
                <!-- Sección 3: ANÁLISIS DE SOLICITUD DE "MÍNIMO 40%" -->
                <tr>
                    <th>Solicitudes</th>
                    <th>RECIBIDA TOTAL</th>
                    <th>RECIBIDA PARCIAL</th>
                    <th>SIN RECIBIR</th>
                    <th>% DE SOLICITUDES DEL MÍNIMO</th>
                </tr>
                <tr>
                    <td>Partidas sin llegar al mínimo</td>
                    <td>13</td>
                    <td>0</td>
                    <td>6</td>
                    <td>2%</td>
                </tr>
                <tr>
                    <td>Partidas con más del mínimo solicitado</td>
                    <td>190</td>
                    <td>21</td>
                    <td>47</td>
                    <td>26%</td>
                </tr>
                <tr>
                    <td>Partidas con el mínimo solicitado</td>
                    <td>190</td>
                    <td>0</td>
                    <td>199</td>
                    <td>39%</td>
                </tr>
                <tr>
                    <td>Partidas sin solicitud</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>33%</td>
                </tr>
                <!-- Espaciador -->
                <tr class="table-warning">
                    <th colspan="6" style="text-align: center;">ANÁLISIS DE CLAVES</th>
                </tr>
                <!-- Sección 4: ANÁLISIS DE CLAVES -->
                <tr>
                    <td>Claves adjudicadas Ramo 47</td>
                    <td>505</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Claves sin solicitud</td>
                    <td>118</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Claves con solicitud parcial de mínimo</td>
                    <td>62</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Claves con mínimo solicitado</td>
                    <td>119</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Claves con solicitud superior al mínimo</td>
                    <td>206</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>CLAVES AL MÁXIMO RECIBIDAS</td>
                    <td>67</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>CONTRATOS CUMPLIDOS AL 40% MÍNIMO</td>
                    <td>75</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>CONTRATOS AL MÁXIMO RECIBIDOS</td>
                    <td>46</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script>
    <script src="js/scriptmodal.js"></script>
    <script src="js/scripteditar.js"></script>

</body>

</html>