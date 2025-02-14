
<?php
include('php/controllers/consulta.controller.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap 5.3.3 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- Bootstrap 5.3.3 JS (con Popper.js) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>


  <!--estilos css-->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/styles.css">
  <title>Consulta Suplencia de Personal</title>
</head>

<body>

  <div class="container">
    <!-- boton -->
    <form action="php/controllers/generar_pdf.controller.php" method="POST" target="_blank">
      <div class="btn-group d-flex justify-content-end" role="group" aria-label="Basic example">
        <input type="hidden" name="valor" value="<?php echo $id_suplencia; ?>">
        <button type="submit" class="btn btn-outline-success">
          IMPRIMIR <i class="bi bi-printer"></i> | <i class="bi bi-filetype-pdf"></i> PDF
        </button>
      </div>
    </form>


    <br>

    <div class="row">
      <div class="table-responsive">
        <table class="table table-bordered table-smaller">

          <!--encabezado de la tabla-->
          <thead>
            <tr>
              <td colspan="4" style="padding: 0;">
                <img src="img/imssb.png" alt="img1" style="width: 500px; display: block;">
              </td>
              <td colspan="4" style="padding: 0;">
                <span style="font-size: 10px; color: gray; display: block;">HOSPITAL REGIONAL DE ALTA ESPECIALIDAD DE
                  IXTAPALUCA<br>DIRECCIÓN DE ADMINISTRACIÓN Y FINANZAS<br>SUBDIRECCIÓN DE RECURSOS HUMANOS</span>
              </td>
            </tr>
          </thead> <!-- aquí finaliza el encabezado-->

          <tbody>

            <tr>
              <td colspan="6"></td>
            </tr>

            <tr>
              <td colspan="6" style="text-align: center; font-weight: bold;">FORMATO PARA SOLICITUD DE NUEVA ORDEN DE SUMINISTRO</td>
            </tr>

            <tr>
              <td colspan="6" style="text-align: center; background-color:rgb(162, 217, 206,0.2);">DATOS GENERALES
              </td>
            </tr>


            <tr>  <!-- Sección para Datos Generales -->            
              <td colspan="1">
                <strong>Número de procedimiento:</strong>
              </td>
              <td colspan="1">
                <?php echo $no_procedimiento; ?>
              </td>

              <td colspan="1">
                <strong>Número de contrato:</strong>
              </td>
              <td colspan="2" id="no_contrato">
                <?php echo $no_contrato; ?>
              </td>

              <td colspan="1">
              </td>
            </tr>




              <!-- <script>
                // Función para cambiar el fondo del estatus
                function cambiarColorEstatus() {
                  // Obtener el elemento del estatus
                  const estatusElemento = document.getElementById("estatus_solicitud");

                  // Obtener el valor del texto
                  const estatus = estatusElemento.textContent.trim();

                  // Cambiar el fondo según el valor del estatus
                  if (estatus === "Pendiente") {
                    estatusElemento.style.backgroundColor = "gray";
                    estatusElemento.style.color = "white";
                  } else if (estatus === "Aprobada") {
                    estatusElemento.style.backgroundColor = "green";
                    estatusElemento.style.color = "white";
                  } else if (estatus === "Rechazada") {
                    estatusElemento.style.backgroundColor = "red";
                    estatusElemento.style.color = "white";
                  }
                }
                // Ejecutar la función al cargar la página
                window.onload = cambiarColorEstatus;
              </script> -->


            <tr>
              <td colspan="1">
                <strong>Número de Suministro:</strong>
              </td>
              <td colspan="1">
                <?php echo $numero_suministro; ?>
              </td>
              
              <td colspan="1">
                <strong>Fecha de Expedición:</strong>
              </td>
              <td colspan="1">
                <?php echo $fecha_expedicion; ?>
              </td>
              <td colspan="1">
                <strong>Nombre del proveedor:</strong>
              </td>
              <td colspan="1">
                <?php echo $nombre_proveedor; ?>
              </td>
            </tr>

            <tr>
              <td colspan="1">
                <strong>Teléfono:</strong>
              </td>
              <td colspan="1">
                <?php echo $telefono; ?>
              </td>
              
              <td colspan="1">
                <strong>Correo:</strong>
              </td>
              <td colspan="1">
                <?php echo $correo; ?>
              </td>
              <td colspan="1">
                <strong>Clues Destino:</strong>
              </td>
              <td colspan="1">
                <?php echo $clues_destino; ?>
              </td>
            </tr>


            <tr>  

              <td colspan="1">
                <strong>Almacén de Entrega:</strong>
              </td>
              <td colspan="2">
                <?php echo $almacen_entrega; ?>
              </td>

              <td colspan="1">
                <strong>Dirección de Entrega:</strong>
              </td>
              <td colspan="2">
                <?php echo $direccion_entrega; ?>
              </td>

            </tr>

            <tr>
            
              <td colspan="1">
                <strong>Dirección Final:</strong>
              </td>
              <td colspan="2">
                <?php echo $direccion_final; ?>
              </td>

              <td colspan="1">
                <strong>Partida Presupuestal:</strong>
              </td>
              <td colspan="2">
                <?php echo $partida_presupuestal; ?>
              </td>

            </tr>

            <tr>

              <td colspan="1">
                <strong>Fecha Límite de Entrega:</strong>
              </td>
              <td colspan="2">
                <?php echo $fecha_limite; ?>
              </td>

              <td colspan="1">
                <strong>Tipo de Entrega:</strong>
              </td>
              <td colspan="2">
                <?php echo $tipo_entrega; ?>
              </td>

            </tr> <!-- Sección para Datos Generales -->

            <tr>
              <td colspan="6" style="text-align: center; background-color:rgb(162, 217, 206,0.1); font-size: 0.1px;">.
              </td>
            </tr>

            <tr>
              <td colspan="6" style="text-align: center; background-color:rgb(162, 217, 206,0.2);">DATOS DE LA ORDEN DE SUMINISTRO
              </td>
            </tr>

            <tr> <!-- Sección para Datos de la Orden de Suministro -->
              <td colspan="1">
                <strong>Clave Interna de Almacén:</strong>
              </td>
              <td colspan="1">
                <?php echo $clave_interna; ?>
              </td>
              <td colspan="1">
                <strong>Clave del Insumo:</strong>
              </td>
              <td colspan="1">
                <?php echo $clave_insumo; ?>
              </td>
              <td colspan="1">
                <strong>CUCOP:</strong>
              </td>
              <td colspan="1">
                <?php echo $cucop; ?>
              </td>
            </tr>

            <tr>
              <td colspan="1">
                <strong>Descripción:</strong>
              </td>
              <td colspan="1">
                <?php echo $descripcion; ?>
              </td>
              <td colspan="1">
                <strong>Unidad de Medida:</strong>
              </td>
              <td colspan="1">
                <?php echo $unidad_medida; ?>
              </td>
              <td colspan="1">
                <strong>Cantidad Mínima:</strong>
              </td>
              <td colspan="1">
                <?php echo $cantidad_minima; ?>
              </td>
            </tr>

            <tr>
              <td colspan="1">
                <strong>Cantidad Máxima:</strong>
              </td>
              <td colspan="1">
                <?php echo $cantidad_maxima; ?>
              </td>
              <td colspan="1">
                <strong>Cantidad Solicitada:</strong>
              </td>
              <td colspan="1">
                <?php echo $cantidad_solicitada; ?>
              </td>
              <td colspan="1">
                <strong>Precio Unitario ($):</strong>
              </td>
              <td colspan="1">
                <?php echo $precio_unitario; ?>
              </td>
            </tr>

            <tr>
              <td colspan="1">
                <strong>Importe ($):</strong>
              </td>
              <td colspan="1">
                <?php echo $importe; ?>
              </td>
              <td colspan="1">
                <strong>IVA:</strong>
              </td>
              <td colspan="1">
                <?php echo $iva; ?>
              </td>
              <td colspan="2">
              </td>
            </tr> <!-- Sección para Datos De La Orden De Suministro --> 


            <tr>
              <td colspan="6" style="text-align: center; background-color:rgb(162, 217, 206,0.1); font-size: 0.1px;">.
              </td>
            </tr>

            <tr>
              <td colspan="1">
                <strong>Clave Interna de Almacén:</strong>
              </td>
              <td colspan="1">
                <?php echo $clave_interna_almacen; ?>
              </td>
              <td colspan="1">
                <strong>Clave del Insumo:</strong>
              </td>
              <td colspan="1">
                <?php echo $clave_insumo; ?>
              </td>
              <td colspan="1">
                <strong>CUCOP:</strong>
              </td>
              <td colspan="1">
                <?php echo $cucop1; ?>
              </td>
            </tr>

            <tr>
              <td colspan="1">
                <strong>Descripción:</strong>
              </td>
              <td colspan="1">
                <?php echo $descripcion1; ?>
              </td>
              <td colspan="1">
                <strong>Unidad de Medida:</strong>
              </td>
              <td colspan="1">
                <?php echo $unidad_medida; ?>
              </td>
              <td colspan="1">
                <strong>Cantidad Solicitada:</strong>
              </td>
              <td colspan="1">
                <?php echo $cantidad_solicitada; ?>
              </td>
            </tr>

            <tr>
              <td colspan="1">
                <strong>Precio Unitario:</strong>
              </td>
              <td colspan="1">
                <?php echo $precio_unitario; ?>
              </td>
              <td colspan="1">
                <strong>Importe:</strong>
              </td>
              <td colspan="1">
                <?php echo $importe; ?>
              </td>
            </tr>
        
            <tr>
              <td colspan="1">
                <strong>SUB-TOTAL:</strong>
              </td>
              <td colspan="1">
                <?php echo $subtotal; ?>
              </td>
            </tr>

            <tr>
              <td colspan="1">
                <strong>IVA:</strong>
              </td>
              <td colspan="1">
                <?php echo $iva; ?>
              </td>
            </tr>

            <tr>
              <td colspan="1">
                <strong>TOTAL:</strong>
              </td>
              <td colspan="1">
                <?php echo $total; ?>
              </td>
            </tr>


          </tbody>

        </table>

      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
</html>