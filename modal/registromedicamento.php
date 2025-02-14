<!-- Modal -->
<div class="modal fade" id="registromedicamento" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="bitacoraLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header estilomodal">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">
                    <i class="bi bi-clipboard2-plus-fill"></i> Nueva Orden de Suministro
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <form id="" method="POST" action="" autocomplete="off">

                    <fieldset class="fieldset-otros">
                        <legend>

                            <div class="form-header">
                                <h4 class="form-title" style="text-align: left;
                            border-radius: 14px;
                            background-color: rgba(167, 55, 55,0.8);
                            color: aliceblue;
                            margin-top: 16px;
                            font-size: 16px;
                            text-align: center;">Datos Generales</h4>
                            </div>

                            <div class="row">

                                <div class="col-md-3">
                                    <label style="font-size: 12px; font-weight: bold;">Número de Procedimiento:</label>
                                    <input name="corto_descrip" id="corto_descrip" class="form-control"
                                        style="font-size: 12px;"
                                        oninput="this.value = this.value.toUpperCase(); buscarProcedimientos(this.value)">
                                    <!-- Contenedor para mostrar las sugerencias -->
                                    <div id="sugerencias"></div>
                                </div>

                                <div class="col-md-3">
                                    <strong style="font-size: 12px; font-weight: bold;">Numero de Contrato:</strong>
                                    <select class="control form-control" id="contrato" name="contrato"
                                        style="font-size: 13px;" disabled>
                                        <option value="">Seleccione un contrato</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label style="font-size: 12px; font-weight: bold;">Numero de Suministro:</label>
                                    <input name="corto_descrip" id="corto_descrip" class="form-control"
                                        placeholder="IB-HRAEI-AD-180-0000-2025" style="font-size: 12px;"
                                        oninput="this.value = this.value.toUpperCase()" readonly>
                                </div>

                                <div class="col-md-3">
                                    <label style="font-size: 12px; font-weight: bold;">Fecha de Expedición:</label>
                                    <input type="date" name="fecha_expedicion" id="fecha_expedicion"
                                        class="form-control" style="font-size: 12px;" readonly>
                                </div>

                                <div class="col-md-6">
                                    <label style="font-size: 12px; font-weight: bold;">Nombre del Proveedor:</label>
                                    <input name="n_proveedor" id="n_proveedor" class="form-control"
                                        style="font-size: 12px;" readonly>
                                </div>

                                <div class="col-md-2">
                                    <label style="font-size: 12px; font-weight: bold;">Teléfono:</label>
                                    <input name="" id="" value="55-5972-9800 EXT. 1288" class="form-control"
                                        style="font-size: 12px;" readonly>
                                </div>

                                <div class="col-md-2">
                                    <label style="font-size: 12px; font-weight: bold;">Correo:</label>
                                    <input name="" id="" type="email" class="form-control" style="font-size: 12px;">
                                </div>

                                <div class="col-md-2">
                                    <label style="font-size: 12px; font-weight: bold;">Clues Destino:</label>
                                    <input name="" id="" value="MCSSA018786" class="form-control"
                                        style="font-size: 12px;" readonly>
                                </div>

                                <div class="form-header">
                                    <h4 class="form-title" style="text-align: left;
                                border-radius: 14px;
                                background-color: rgba(167, 55, 55,0.8);
                                color: aliceblue;
                                margin-top: 10px;
                                font-size: 10px;
                                text-align: left;">.</h4>
                                </div>

                                <div class="col-md-6">
                                    <label style="font-size: 12px; font-weight: bold;">Almacén de Entrega:</label>
                                    <input name="" id=""
                                        value="ALMACÉN GENERAL DEL HOSPITAL REGIONAL DE ALTA ESPECIALIDAD DE IXTAPALUCA"
                                        class="form-control" style="font-size: 12px;">
                                </div>

                                <div class="col-md-6">
                                    <label style="font-size: 12px; font-weight: bold;">Dirección de Entrega:</label>
                                    <input name="" id=""
                                        value="CARRETERA FEDERAL MÉXICO-PUEBLA KM 34.5, PUEBLO DE ZOQUIAPAN, C.P. 56530, MUNICIPIO DE IXTAPALUCA, ESTADO DE MÉXICO."
                                        class="form-control" style="font-size: 12px;">
                                </div>

                                <div class="col-md-5">
                                    <label style="font-size: 12px; font-weight: bold;">Dirección Final:</label>
                                    <input name="" id=""
                                        value="CARRETERA FEDERAL MÉXICO-PUEBLA KM 34.5, PUEBLO DE ZOQUIAPAN, C.P. 56530, MUNICIPIO DE IXTAPALUCA, ESTADO DE MÉXICO."
                                        class="form-control" style="font-size: 12px;">
                                </div>

                                <div class="col-md-2">
                                    <label style="font-size: 12px; font-weight: bold;">Partida Presupuestal:</label>
                                    <input name="partida_presupuestal" id="partida_presupuestal" class="form-control"
                                        style="font-size: 12px;" readonly>
                                </div>

                                <div class="col-md-2">
                                    <label style="font-size: 12px; font-weight: bold;">Fecha Límite de Entrega:</label>
                                    <input type="date" name="fecha_limite_entrega" id="fecha_limite_entrega"
                                        class="form-control" style="font-size: 12px;" readonly>
                                </div>

                                <div class="col-md-3">
                                    <strong style="font-size: 12px;">Tipo de Entrega:</strong>
                                    <select name="Estatus" id="Estatus" class="form-select" style="font-size: 12px;"
                                        readonly>
                                        <option value="Directa">Directa</option>
                                        <option value="Complementaria">Complementaria</option>
                                    </select>
                                </div>

                                <div class="form-header">
                                    <h4 class="form-title" style="text-align: left;
                                border-radius: 14px;
                                background-color: rgba(167, 55, 55,0.8);
                                color: aliceblue;
                                margin-top: 16px;
                                font-size: 16px;
                                text-align: center;">Datos de la Orden de Suministro</h4>
                                </div>

                                <div class="col-md-2">
                                    <label style="font-size: 12px; font-weight: bold;">Clave Interna de Almacén:</label>
                                    <select name="clave_hraei" id="clave_hraei" class="form-control"
                                        style="font-size: 12px;">
                                        <option value="">Seleccione</option>
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <label style="font-size: 12px; font-weight: bold;">Clave del Insumo:</label>
                                    <input name="cnis" id="cnis" class="form-control" style="font-size: 12px;" readonly>
                                </div>
                                
                                <div class="col-md-2">
                                    <label style="font-size: 12px; font-weight: bold;">CUCOP:</label>
                                    <input name="cucop" id="cucop" class="form-control" style="font-size: 12px;"
                                        readonly>
                                </div>

                                <div class="col-md-6">
                                    <label style="font-size: 12px; font-weight: bold;">Descripción:</label>
                                    <textarea name="descripcion" id="descripcion" class="form-control"
                                        style="font-size: 12px;" readonly></textarea>
                                </div>

                                <div class="col-md-2">
                                    <label style="font-size: 12px; font-weight: bold;">Unidad de Medida:</label>
                                    <textarea name="unidad_de_presentacion" id="unidad_de_presentacion"
                                        class="form-control" style="font-size: 12px;" readonly></textarea>
                                </div>

                                <div class="col-md-2">
                                    <label style="font-size: 12px; font-weight: bold;">Cantidad Mínima:</label>
                                    <input type="number" name="cantidad_minima" id="cantidad_minima"
                                        class="form-control" style="font-size: 12px;" readonly>
                                </div>

                                <div class="col-md-2">
                                    <label style="font-size: 12px; font-weight: bold;">Cantidad Máxima:</label>
                                    <input type="number" name="cantidad_maxima" id="cantidad_maxima"
                                        class="form-control" style="font-size: 12px;" readonly>
                                </div>

                                <div class="col-md-2">
                                    <label style="font-size: 12px; font-weight: bold;">Cantidad Solicitada:</label>
                                    <input type="number" name="cant_solicitada" id="cant_solicitada"
                                        class="form-control" style="font-size: 12px;" oninput="calcularImporte();">
                                </div>

                                <div class="col-md-2">
                                    <label style="font-size: 12px; font-weight: bold;">Precio Unitario ($):</label>
                                    <input type="number" name="precio_unitario" id="precio_unitario"
                                        class="form-control" style="font-size: 12px;" readonly>
                                </div>

                                <div class="col-md-2">
                                    <label style="font-size: 12px; font-weight: bold;">Importe ($):</label>
                                    <input type="number" name="importe" id="importe" class="form-control"
                                        style="font-size: 12px;" readonly>
                                </div>


                                <div class="col-md-2">
                                    <label style="font-size: 12px; font-weight: bold;">IVA:</label>
                                    <input type="number" name="iva" id="iva" class="form-control"
                                        style="font-size: 12px;" readonly>
                                </div>


                            </div>

                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="button" class="btn btn-warning" style="font-size: 14px;"
                                        onclick="agregarClave()">Agregar Clave</button>
                                </div>
                            </div>

                        </legend>

                    </fieldset>
                </form>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Clave Interna de Almacén</th>
                                <th>Clave del Insumo</th>
                                <th>CUCOP</th>
                                <th>Descripción</th>
                                <th>Unidad de Medida</th>
                                <th>Cantidad Solicitada</th>
                                <th>Precio Unitario</th>
                                <th>Importe</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Las filas se agregarán aquí -->
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7" class="text-end">SUB-TOTAL</td>
                                <td>$0.00</td> <!-- Aquí se mostrará el SUB-TOTAL -->
                            </tr>
                            <tr>
                                <td colspan="7" class="text-end">IVA</td>
                                <td>$0.00</td> <!-- Aquí se mostrará el IVA -->
                            </tr>
                            <tr>
                                <td colspan="7" class="text-end"><strong>TOTAL</strong></td>
                                <td><strong>$0.00</strong></td> <!-- Aquí se mostrará el TOTAL -->
                            </tr>
                        </tfoot>
                    </table>
                </div>


            </div> <!-- DIV ROW LINEA 11 -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Generar Orden</button>
            </div>
            </form>

        </div>

    </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>