
<?php
include('php/controllers/consulta.controller.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!-- Bootstrap 5.3.3 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Bootstrap 5.3.3 JS (con Popper.js) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">



  <!--estilos css-->
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
      <div class="col">
        <table class="table">

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
              <td colspan="6" style="text-align: center; font-weight: bold;">FORMATO PARA SOLICITUD DE AUTORIZACIÓN DE
                SUPLENCIA PERSONAL</td>
            </tr>

            <tr>
              <!-- Fila para Datos Generales -->
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

              <tr>
              <td colspan="1">
                <strong>Número de Suministro:</strong>
              </td>
              <td colspan="1">
                <?php echo $no_suministro; ?>
              </td>

              <td colspan="1">
                <strong>Fecha de Expedición :</strong>
              </td>
              <td colspan="1">
                <?php echo $fechaExpedicion; ?>
              </td>

              <td colspan="1">
                <strong>Nombre del proveedor:</strong>
              </td>
              <td colspan="1">
                <?php echo $nombre_proveedor; ?>
              </td>

              <td colspan="1">
                <strong>Teléfono</strong>
              </td>
              <td colspan="2">
                <?php echo $telefono; ?>
              </td>

              <td colspan="1">
                <strong>Correo</strong>
              </td>
              <td colspan="2">
                <?php echo $correo; ?>
              </td>

              <td colspan="1">
                <strong>Clues Destino</strong>
              </td>
              <td colspan="2">
                <?php echo $clues_desino; ?>
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
              <td colspan="6" style="text-align: center; background-color:rgb(162, 217, 206,0.1); font-size: 0.1px;">.
              </td>
            </tr>

            <tr>
              <td colspan="1">
                <strong>Código de Puesto:</strong>
              </td>
              <td colspan="1">
                <?php echo $codigopuesto; ?>
              </td>
              <td colspan="1">
                <strong>Denominación del Puesto:</strong>
              </td>
              <td colspan="1">
                <?php echo $puesto; ?>
              </td>
              <td colspan="1">
                <strong>Fecha de Ingreso:</strong>
              </td>
              <td colspan="1">
                <?php echo $fecha_ingreso; ?>
              </td>
            </tr>

            <tr>
              <td colspan="1">
                <strong>Adscripción:</strong>
              </td>
              <td colspan="1">
                <?php echo $adscripcion; ?>
              </td>
              <td colspan="1">
                <strong>Turno:</strong>
              </td>
              <td colspan="1">
                <?php echo $turno; ?>
              </td>
              <td colspan="1">
                <strong>Días Hábiles:</strong>
              </td>
              <td colspan="1">
                <?php echo $dias_h; ?>
              </td>
            </tr>

            <tr>
              <td colspan="1">
                <strong>Días de Descanso:</strong>
              </td>
              <td colspan="1">
                <?php echo $dias_d; ?>
              </td>
              <td colspan="1">
                <strong>Horario:</strong>
              </td>
              <td colspan="1">
                <?php echo $horaInicio; ?>
              </td>
              <td colspan="1">
                <strong>a:</strong>
              </td>
              <td colspan="1">
                <?php echo $horaFin; ?>
              </td>
            </tr>

            <tr>
              <td colspan="1">
                <strong>Servicio:</strong>
              </td>
              <td colspan="1">
                <?php echo $servicio; ?>
              </td>
              <td colspan="1">
                <strong>Correo Electronico:</strong>
              </td>
              <td colspan="1">
                <?php echo $correo; ?>
              </td>
              <td colspan="2">
              </td>
            </tr>

            <tr>
              <td colspan="6" style="text-align: center; background-color:rgb(162, 217, 206,0.2);">DATOS DE LA SUPLENCIA
              </td>
            </tr>

            <tr>
              <td colspan="1">
                <strong>Del:</strong>
              </td>
              <td colspan="1">
                <?php echo $fechaInicio; ?>
              </td>
              <td colspan="1">
                <strong>Al:</strong>
              </td>
              <td colspan="1">
                <?php echo $fechaFin; ?>
              </td>
              <td colspan="1">
                <strong>No. Suplencia:</strong>
              </td>
              <td colspan="1">
                <?php echo $num_suplencia; ?>
              </td>
            </tr>

            <tr>
              <td colspan="6" style="text-align: center; background-color:rgb(162, 217, 206,0.1); font-size: 0.1px;">.
              </td>
            </tr>

            <tr>
              <td colspan="1">
                <strong>No. de Empleado:</strong>
              </td>
              <td colspan="1">
                <?php echo $numeroempleado_suplencia; ?>
              </td>
              <td colspan="1">
                <strong>Nombre del Suplente:</strong>
              </td>
              <td colspan="1">
                <?php echo $nombre_suplencia; ?>
              </td>
              <td colspan="1">
                <strong>Nivel Académico:</strong>
              </td>
              <td colspan="1">
                <?php echo $nivel_academico_suplencia; ?>
              </td>
            </tr>

            <tr>
              <td colspan="1">
                <strong>Código de Puesto:</strong>
              </td>
              <td colspan="1">
                <?php echo $codigopuesto_suplencia; ?>
              </td>
              <td colspan="1">
                <strong>Puesto:</strong>
              </td>
              <td colspan="1">
                <?php echo $puesto_suplencia; ?>
              </td>
              <td colspan="1">
                <strong>Turno:</strong>
              </td>
              <td colspan="1">
                <?php echo $turno2; ?>
              </td>
            </tr>

            <tr>
              <td colspan="1">
                <strong>Días Hábiles:</strong>
              </td>
              <td colspan="1">
                <?php echo $dias_h2; ?>
              </td>
              <td colspan="1">
                <strong>Días de Descanso:</strong>
              </td>
              <td colspan="1">
                <?php echo $dias_d2; ?>
              </td>
              <td colspan="1">
                <strong>Adscripción:</strong>
              </td>
              <td colspan="1">
                <?php echo $adscripcion; ?>
              </td>
            </tr>

            <tr>
              <td colspan="1">
                <strong>Horario:</strong>
              </td>
              <td colspan="1">
                <?php echo $horaInicio_suplencia; ?>
              </td>
              <td colspan="1">
                <strong>a:</strong>
              </td>
              <td colspan="1">
                <?php echo $horaFin_suplencia; ?>
              </td>
              <td>
                <strong>Servicio:</strong>
              </td>
              <td colspan="1">
                <?php echo $servicio_sustituto; ?>
              </td>
            </tr>

            <tr>
              <td colspan="6" style="text-align: center; background-color:rgb(162, 217, 206,0.1); font-size: 0.1px;">.
              </td>
            </tr>

            <td colspan="1">
              <strong>Autoriza:</strong>
            </td>
            <td colspan="1">
              <?php echo $autoriza; ?>
            </td>
            <td colspan="1">
              <strong>Cargo:</strong>
            </td>
            <td colspan="1">
              <?php echo $cargo; ?>
            </td>
            <td colspan="1">
              <strong>Observaciones:</strong>
            </td>
            <td colspan="1">
              <?php echo $observaciones; ?>
            </td>
            <td>
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