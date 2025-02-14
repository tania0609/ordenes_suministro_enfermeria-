<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Editar</title>
</head>

<body>
    <header style="text-align: center;">
        <div style=" padding: 20px; text-align: left;">
            <a href="index.php">
                <button type="button" class="btn btn-outline-light" id="inicio-button" title="Inicio">
                    <i class="bi bi-rewind-fill"></i>
                </button>
            </a>
        </div>


        <h5>Editar</h5>
        <div style="padding: 25px; text-align: right;">
            <button type="button" class="btn btn-outline-light" id="cerrar-sesion-button" title="Cerrar sesión">
                <i class="bi bi-power"></i>
            </button>
        </div>
    </header><br>
    <div class="container">
        <div class="row">

            <!-- DESCRIPCIÓN DE RAMO 47 -->
            <div class="form-header">
                <h4 class="form-title" style="text-align: center; border-radius: 10px; background-color: rgb(83, 108, 146); color: aliceblue; margin-top: 12px; font-size: 15px;">
                    DESCRIPCIÓN DE RAMO 47
                </h4>
            </div>

            <fieldset>
                <legend>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <strong style="font-size: 12px;">Contratos Ramo 47</strong>
                                <input id="contratosramo" name="contratosramo" type="number" class="control form-control" value="" style="font-size: 12px;">
                            </div>
                            <div class="col-md-4">
                                <strong style="font-size: 12px;">Clave adjudicadas Ramo 47</strong>
                                <input id="clave_adjudicadas" name="clave_adjudicadas" type="number" class="control form-control" value="" style="font-size: 12px;">
                            </div>
                            <div class="col-md-4">
                                <strong style="font-size: 12px;">Partidas Totales</strong>
                                <input id="partidastotales" name="partidastotales" type="number" class="control form-control" value="" style="font-size: 12px;">
                            </div>
                        </div>
                    </div>
                </legend>
            </fieldset>

            <!-- MOVIMIENTO DE PARTIDAS -->
            <div class="form-header">
                <h4 class="form-title" style="text-align: center; border-radius: 10px; background-color: rgb(83, 108, 146); color: aliceblue; margin-top: 12px; font-size: 15px;">
                    MOVIMIENTO DE PARTIDAS
                </h4>
            </div>

            <fieldset>
                <legend>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <strong style="font-size: 12px;">Partidas Solicitadas</strong>
                                <input id="partidassolicitadas" name="partidassolicitadas" type="number" class="control form-control" value="" style="font-size: 12px;">
                            </div>
                            <div class="col-md-6">
                                <strong style="font-size: 12px;">Partidas Sin Movimiento</strong>
                                <input id="partidassinmovi" name="partidassinmovi" type="number" class="control form-control" value="" style="font-size: 12px;">
                            </div>
                        </div>
                    </div>
                </legend>
            </fieldset>

            <div class="row">

            </div>



            <!-- ANÁLISIS DE SOLICITUD DE "MÍNIMO 40%" -->
            <div class="container">
                <h4 class="form-title" style="text-align: center; border-radius: 10px; background-color: rgb(115, 141, 187); color: aliceblue; margin-top: 12px; font-size: 12px;">
                    ANÁLISIS DE SOLICITUD DE "MÍNIMO 40%"
                </h4>
                <fieldset>

                    <legend>

                        <div class="row">
                            <!-- Partidas sin llegar al mínimo -->
                            <div class="col-md-6">
                                <h4 class="form-title" style="text-align: center; border-radius: 10px; background-color: rgb(76, 126, 134); color: aliceblue; margin-top: 12px; font-size: 12px;">
                                    Partidas sin llegar al mínimo
                                </h4>
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <strong style="font-size: 11px;">Solicitudes</strong>
                                            <input id="recibototal_PartidasSolicitudes" name="recibototal_PartidasSolicitudes" type="number" class="form-control" value="" style="font-size: 12px;">
                                        </div>
                                        <div class="col-md-6">
                                            <strong style="font-size: 11px;">Recibo Total</strong>
                                            <input id="recibototal_PartidasSinLLegarMinimo" name="recibototal_PartidasSinLLegarMinimo" type="number" class="form-control" value="" style="font-size: 12px;">
                                        </div>
                                        <div class="col-md-6">
                                            <strong style="font-size: 11px;">Recibida Parcial</strong>
                                            <input id="recibirparcial_PartidasSinLLegarMinimo" name="recibirparcial_PartidasSinLLegarMinimo" type="number" class="form-control" value="" style="font-size: 12px;">
                                        </div>
                                        <div class="col-md-6">
                                            <strong style="font-size: 11px;">Sin recibir</strong>
                                            <input id="sinrecibir_PartidasSinLLegarMinimo" name="sinrecibirPartidasSinLLegarMinimo" type="number" class="form-control" value="" style="font-size: 11px;">
                                        </div>
                                        <div class="col-md-6">
                                            <strong style="font-size: 11px;">% De Solicitudes Del Mínimo</strong>
                                            <input id="solicitud_PartidasSinLLegarMinimo" name="solicitud_PartidasSinLLegarMinimo" type="number" class="form-control" value="" style="font-size: 11px;">
                                        </div>
                                    </div>
                                </fieldset>
                            </div>

                            <!-- Partidas con más del mínimo solicitado -->
                            <div class="col-md-6">
                                <h4 class="form-title" style="text-align: center; border-radius: 10px; background-color: rgb(76, 126, 134); color: aliceblue; margin-top: 12px; font-size: 12px;">
                                    Partidas con más del mínimo solicitado
                                </h4>
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <strong style="font-size: 11px;">Solicitudes</strong>
                                            <input id="recibototal_PartidasSolicitudes" name="recibototal_PartidasSolicitudes" type="number" class="form-control" value="" style="font-size: 12px;">
                                        </div>

                                        <div class="col-md-6">
                                            <strong style="font-size: 11px;">Recibo Total</strong>
                                            <input id="recibototal_MinimoSolicitado" name="recibototal_MinimoSolicitado" type="number" class="form-control" value="" style="font-size: 12px;">
                                        </div>

                                        <div class="col-md-6">
                                            <strong style="font-size: 11px;">Recibida Parcial</strong>
                                            <input id="recibirparcial_MinimoSolicitado" name="recibirparcial_MinimoSolicitado" type="number" class="form-control" value="" style="font-size: 12px;">
                                        </div>

                                        <div class="col-md-6">
                                            <strong style="font-size: 11px;">Sin recibir</strong>
                                            <input id="sinrecibir_MinimoSolicitado" name="sinrecibirMinimoSolicitado" type="number" class="form-control" value="" style="font-size: 11px;">
                                        </div>

                                        <div class="col-md-6">
                                            <strong style="font-size: 11px;">% De Solicitudes Del Mínimo</strong>
                                            <input id="solicitud_MinimoSolicitado" name="solicitud_MinimoSolicitado" type="number" class="form-control" value="" style="font-size: 11px;">
                                        </div>

                                    </div>
                                </fieldset>
                            </div>

                            <div class="col-md-6">
                                <h4 class="form-title" style="text-align: center; border-radius: 10px; background-color: rgb(76, 126, 134); color: aliceblue; margin-top: 12px; font-size: 12px;">
                                    Partidas con el mínimo solicitado
                                </h4>
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <strong style="font-size: 11px;">Solicitudes</strong>
                                            <input id="recibototal_PartidasSolicitudes" name="recibototal_PartidasSolicitudes" type="number" class="form-control" value="" style="font-size: 12px;">
                                        </div>
                                        <div class="col-md-6">
                                            <strong style="font-size: 11px;">Recibo Total</strong>
                                            <input id="recibototal_minimosolicitado" name="recibototal_minimosolicitado" type="number" class="form-control" value="" style="font-size: 12px;">
                                        </div>
                                        <div class="col-md-6">
                                            <strong style="font-size: 11px;">Recibida Parcial</strong>
                                            <input id="recibirparcial_minimosolicitado" name="recibirparcial_minimosolicitado" type="number" class="form-control" value="" style="font-size: 12px;">
                                        </div>
                                        <div class="col-md-6">
                                            <strong style="font-size: 11px;">Sin recibir</strong>
                                            <input id="sinrecibir_minimosolicitado" name="sinrecibirminimosolicitado" type="number" class="form-control" value="" style="font-size: 11px;">
                                        </div>
                                        <div class="col-md-6">
                                            <strong style="font-size: 11px;">% De Solicitudes Del Mínimo</strong>
                                            <input id="solicitud_minimosolicitado" name="solicitud_minimosolicitado" type="number" class="form-control" value="" style="font-size: 11px;">
                                        </div>
                                    </div>
                                </fieldset>
                            </div>

                            <div class="col-md-6">
                                <h4 class="form-title" style="text-align: center; border-radius: 10px; background-color: rgb(76, 126, 134); color: aliceblue; margin-top: 12px; font-size: 12px;">
                                    Partidas sin solicitud
                                </h4>
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <strong style="font-size: 11px;">Solicitudes</strong>
                                            <input id="recibototal_PartidasSolicitudes" name="recibototal_PartidasSolicitudes" type="number" class="form-control" value="" style="font-size: 12px;">
                                        </div>
                                        <div class="col-md-6">
                                            <strong style="font-size: 11px;">Recibo Total</strong>
                                            <input id="recibototal_partidassinsolicitud" name="recibototal_partidassinsolicitud" type="number" class="form-control" value="" style="font-size: 12px;">
                                        </div>
                                        <div class="col-md-6">
                                            <strong style="font-size: 11px;">Recibida Parcial</strong>
                                            <input id="recibirparcial_partidassinsolicitud" name="recibirparcial_partidassinsolicitud" type="number" class="form-control" value="" style="font-size: 12px;">
                                        </div>
                                        <div class="col-md-6">
                                            <strong style="font-size: 11px;">Sin recibir</strong>
                                            <input id="sinrecibir_partidassinsolicitud" name="sinrecibirpartidassinsolicitud" type="number" class="form-control" value="" style="font-size: 11px;">
                                        </div>
                                        <div class="col-md-6">
                                            <strong style="font-size: 11px;">% De Solicitudes Del Mínimo</strong>
                                            <input id="solicitud_partidassinsolicitud" name="solicitud_partidassinsolicitud" type="number" class="form-control" value="" style="font-size: 11px;">
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                    </legend>
                </fieldset>
            </div>
        </div>


        <div class="form-header">
            <h4 class="form-title" style="text-align: center; border-radius: 10px; background-color: rgb(83, 108, 146); color: aliceblue; margin-top: 12px; font-size: 15px;">
                ANÁLISIS DE CLAVES
            </h4>
        </div>

        <fieldset>
            <legend>
                <div class="container">
                    <div class="row">


                        <div class="col-md-3">
                            <strong style="font-size: 12px;">Claves adjudicadas Ramo 47</strong>
                            <input id="clave_adjudicadasramo" name="clave_adjudicadasramo" type="number" class="control form-control" value="" style="font-size: 12px;">
                        </div>

                        <div class="col-md-3">
                            <strong style="font-size: 12px;">Claves sin solicitud</strong>
                            <input id="clavesin_solicitud" name="clavesin_solicitud" type="number" class="control form-control" value="" style="font-size: 12px;">
                        </div>

                        <div class="col-md-3">
                            <strong style="font-size: 12px;">Claves con solicitud parcial de mínimo</strong>
                            <input id="clavesin_solicitudparcial" name="clavesin_solicitudparcial" type="number" class="control form-control" value="" style="font-size: 12px;">
                        </div>

                        <div class="col-md-3">
                            <strong style="font-size: 12px;">Claves con mínimo solicitado</strong>
                            <input id="clavesin_solicitudminima" name="clavesin_solicitudminima" type="number" class="control form-control" value="" style="font-size: 12px;">
                        </div>

                        <div class="col-md-3">
                            <strong style="font-size: 12px;">Claves con solicitud superior al mínimo</strong>
                            <input id="clavesin_solicitudsuperiorminimo" name="clavesin_solicitudsuperiorminimo" type="number" class="control form-control" value="" style="font-size: 12px;">
                        </div>

                        <div class="col-md-3">
                            <strong style="font-size: 12px;">CLAVES AL MÁXIMO RECIBIDAS</strong>
                            <input id="clavesin_Maximarecibidas" name="clavesin_Maximarecibidas" type="number" class="control form-control" value="" style="font-size: 12px;">
                        </div>


                        <div class="col-md-3">
                            <strong style="font-size: 12px;">CONTRATOS CUMPLIDOS AL 40% MÍNIMO</strong>
                            <input id="clavesin_contratoscumplidosminimo" name="clavesin_contratoscumplidosminimo" type="number" class="control form-control" value="" style="font-size: 12px;">
                        </div>

                        <div class="col-md-3">
                            <strong style="font-size: 12px;">CONTRATOS AL MÁXIMO RECIBIDOS</strong>
                            <input id="clavesin_ContratoMAXIMO" name="clavesin_ContratoMAXIMO" type="number" class="control form-control" value="" style="font-size: 12px;">
                        </div>


                    </div>
                </div>
            </legend>
        </fieldset>



        <!-- Botón de edición -->
        <div style="display: flex; justify-content: flex-end; align-items: center; margin-top: 15px;">
            <button type="submit" class="btn btn-primary" style="font-size: 14px; padding: 6px 14px;">Editar</button>
        </div><br>

    </div>
    </div>






    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/scripteditar.js"></script>



</body>

</html>