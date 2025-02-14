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

    function aplicarColores() {
        table.rows().every(function () {
            let row = $(this.node());

            // Supongamos que la columna de clave es la primera columna (índice 0)
            let cell = row.find('td').eq(0); // Encuentra la celda en el índice 0
            let text = cell.text().trim();
            

            // Verifica si el texto comienza con los patrones específicos
            if (text.startsWith('CENAPRECE-HRAEI-')) {
                cell.css('background-color', '#add8e6');
            } else if (text.startsWith('GC-HRAEI-')) {
                cell.css('background-color', '#dda0dd');
            } else if (text.startsWith('HRAEI-')) {
                cell.css('background-color', '#ffdab9');
            } else if (text.startsWith('SADMI-HRAEI-')) {
                cell.css('background-color', '#98ff98');
            }

            // Supongamos que la columna de existencia es la tercera columna (índice 2)
            let existencia = row.find('td').eq(2);
            let existencia_text = existencia.text().trim();
            let existencia_numb = parseFloat(existencia_text);

            if (existencia_numb === 0) {
                existencia.css('background-color', '#ffb6c1');
            } else if (existencia_numb >= 1) {
                existencia.css('background-color', '#90ee90');
            } else if (existencia_numb < 0) {
                existencia.css('background-color', '#87cefa');
            }

            // Supongamos que la columna de status es la última columna
            let status = row.find('td').last();
            let status_text = status.text().trim();

            if (status_text === 'CATALOGO ACTIVO') {
                status.css('background-color', '#90ee90');
            } else if (status_text === 'NO UTILIZADA') {
                status.css('background-color', '#ffb6c1');
            }
        });
    }

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
