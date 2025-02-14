$(document).ready(function () {
    let table = $('#miTabla').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "No se encontraron registros",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        }
    });

    window.buscar = function () {
        let filtros = {
            CENAPRECE: $("#CENAPRECE").prop("checked") ? $("#CENAPRECE").val() : "",
            GC: $("#GC").prop("checked") ? $("#GC").val() : "",
            HRAEI: $("#HRAEI").prop("checked") ? $("#HRAEI").val() : "",
            SADMI: $("#SADMI").prop("checked") ? $("#SADMI").val() : ""
        };

        $.ajax({
            url: 'php/controllers/table_search.controller.php',
            method: 'POST',
            data: filtros,
            dataType: 'json',
            success: function (response) {
                if (response.data && Array.isArray(response.data)) {
                    // Limpia la tabla existente
                    table.clear();

                    // Añade los nuevos datos a la tabla
                    table.rows.add(response.data).draw();

                    // Aplica los colores después de actualizar los datos
                    aplicarColores();
                } else {
                    console.error("Error: El formato de los datos es incorrecto.");
                }
            },
            error: function (xhr, status, error) {
                console.error("Error en la solicitud AJAX:", error);
            }
        });
    };

    // Aplica colores al cargar la página
    table.on('draw', function () {
        aplicarColores();
    });

    // Aplica colores inicialmente
    aplicarColores();


    // Aplica colores inicialmente
    aplicarColores();
});
