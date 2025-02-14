<?php
require('./php/controllers/table.controller_ramo47.php');
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Incluye la biblioteca jsPDF versión 1.5.3 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>

    <!-- Estilos CSS personalizados -->
    <link rel="stylesheet" href="css/styles.css">
    <title>Contratos</title>
</head>

<body>

    <header>
        <div style=" padding: 20px; text-align: left;">
            <a href="index.php">
                <button type="button" class="btn btn-outline-light" id="inicio-button" title="Inicio">
                    <i class="bi bi-rewind-fill"></i>
                </button>
            </a>
        </div>
        <h5 class="bi bi-file-earmark-check" style="color:rgb(243, 243, 243); margin-top: 10px;"> Ordenes de Suministro
            (Contratos)</h5>

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
        <div class="row justify-content-center">
            <!-- Botón Carga de Contratos -->
            <div class="col-md-4 d-flex justify-content-center mb-3">
                <fieldset class="fieldset-botones" id="fieldset-carga-contratos">
                    <legend>
                        <button type="button" class="btn btn-custom-danger" data-bs-toggle="modal"
                            data-bs-target="#modalCargaExcel">
                            <i class="bi bi-file-earmark-excel"></i> Carga de Contratos
                        </button>
                    </legend>
                </fieldset>
            </div>
        </div>

        <!-- Modal de Carga Masiva -->
        <div class="modal fade" id="modalCargaExcel" tabindex="-1" aria-labelledby="modalCargaExcelLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Encabezado del modal personalizado -->
                    <div class="modal-header"
                        style="background-color: #A43636; color: white; border-bottom: none; padding: 1rem;">
                        <h5 class="modal-title" id="modalCargaExcelLabel">Carga Masiva de Contratos</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- Cuerpo del modal -->
                    <div class="modal-body">
                        <form id="formularioCarga">
                            <!-- Campo: Número de Procedimiento -->
                            <div class="mb-3">
                                <label for="numeroProcedimiento" class="form-label">Número de Procedimiento</label>
                                <input type="text" class="form-control" id="numeroProcedimiento"
                                    placeholder="Ingrese el número de procedimiento"
                                    value="AA-12-NEF-012NEF001-I-191-2024" required>
                            </div>
                            <!-- Campo: Trimestre -->
                            <div class="mb-3">
                                <label for="trimestre" class="form-label">Trimestre</label>
                                <select class="form-select" id="trimestre" required>
                                    <option selected disabled value>Seleccione un trimestre</option>
                                    <option value="1">Primer Trimestre</option>
                                    <option value="2">Segundo Trimestre</option>
                                    <option value="3">Tercer Trimestre</option>
                                    <option value="4">Cuarto Trimestre</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="anio" class="form-label">Año</label>
                                <input type="number" class="form-control" id="anio" min="2023" max="9999"
                                    placeholder="Ej. 2025" required>
                            </div>
                            <!-- Enlace para descargar el archivo de ejemplo -->
                            <div class="mb-3">
                                <a href="archivos/ejemplo_carga_contratos.xlsx" class="btn btn-warning" download>
                                    <i class="bi bi-download"></i> Descargar Ejemplo
                                </a>
                            </div>
                            <!-- Campo: Subir archivo Excel -->
                            <div class="mb-3">
                                <label for="archivoExcel" class="form-label">Cargar Archivo Excel</label>
                                <input type="file" class="form-control" id="archivoExcel" name="archivoExcel"
                                    accept=".xlsx, .xls" required>
                            </div>
                        </form>
                    </div>
                    <!-- Pie del modal -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" id="guardarDatos">Guardar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal de Éxito -->
        <div class="modal fade" id="modalExito" tabindex="-1" aria-labelledby="modalExitoLabel" aria-hidden="true"
            data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- Encabezado del modal -->
                    <div class="modal-header"
                        style="background-color: #7a2828; color: white; border-bottom: none; padding: 1rem;">
                    </div>
                    <!-- Cuerpo del modal -->
                    <div class="modal-body text-center">
                        <!-- Animación de Palomita -->
                        <div class="checkmark-icon mb-3">
                            <i class="bi bi-check-circle-fill" style="font-size: 5rem; color: #7a2828;"></i>
                        </div>
                        <p style="font-size: 1.2rem;">Carga Realizada Correctamente</p>
                    </div>
                    <!-- Pie del modal -->
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-primary"
                            onclick="window.location.href='index.php'">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid" style="margin-bottom: 90px; padding-left: 0; padding-right: 0;">
        <table id="miTabla" class="table" style="width: 100%; font-size: 12px;">
            <thead class="thead-dark">
                <tr>
                    <th>Ejercicio Fiscal</th>
                    <th>Fuente</th>
                    <th>Procedimiento</th>
                    <th>Ramo Presupuestal</th>
                    <th>Partida Presupuestal</th>
                    <th>Contrato</th>
                    <th>Proveedor</th>
                    <th>Clave</th>
                    <th>CNIS</th>
                    <th>CUCOP</th>
                    <th>Descripción</th>
                    <th>Unidad de Presentación</th>
                    <th>P.U.</th>
                    <th>Cantidad Minima</th>
                    <th>Cantidad Maxima</th>
                    <th>Importe Minimo</th>
                    <th>Importe Maximo</th>
                    <th>Tasa IVA</th>
                    <th>Tipo de Compra</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Itera a través de los datos obtenidos de la consulta y genera las filas y celdas
                foreach ($data_folios as $folio) {
                    echo '<tr>';
                    echo "<td>" . $folio['ejercicio_fiscal'] . "</td>";
                    echo "<td>" . $folio['fuente'] . "</td>";
                    echo "<td>" . $folio['procedimiento'] . "</td>";
                    echo "<td>" . $folio['ramo_presupuestal'] . "</td>";
                    echo "<td>" . $folio['partida_presupuestal'] . "</td>";
                    echo "<td>" . $folio['contrato'] . "</td>";
                    echo "<td>" . $folio['proveedor'] . "</td>";
                    echo "<td>" . $folio['clave'] . "</td>";
                    echo "<td>" . $folio['cnis'] . "</td>";
                    echo "<td>" . $folio['cucop'] . "</td>";
                    echo "<td>" . $folio['descripcion'] . "</td>";
                    echo "<td>" . $folio['unidad_de_presentacion'] . "</td>";
                    echo "<td>" . $folio['pu'] . "</td>";
                    echo "<td>" . $folio['cantidad_minima'] . "</td>";
                    echo "<td>" . $folio['cantidad_maxima'] . "</td>";
                    echo "<td>" . $folio['importe_minimo'] . "</td>";
                    echo "<td>" . $folio['importe_maximo'] . "</td>";
                    echo "<td>" . $folio['tasa_iva'] . "</td>";
                    echo "<td>" . $folio['tipo_de_compra'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <footer>
        Hospital Regional de Alta Especialidad de Ixtapaluca
        <br>
        Dirección de Operaciones - Gestión Digital en Salud - 2025

    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script>
    <script src="js/scriptcontratos.js"></script>

</body>

</html>