document.addEventListener("DOMContentLoaded", function () {
    // Obtener el campo de entrada del año
    const anioInput = document.getElementById('anio');

    // Establecer el año actual como valor predeterminado
    const anioActual = new Date().getFullYear();
    anioInput.value = anioActual;

    // Validar la entrada cuando el usuario escribe
    anioInput.addEventListener('input', function () {
        const valor = anioInput.value;

        // Verificar si el valor tiene exactamente 4 dígitos
        if (valor.length > 4) {
            anioInput.value = valor.slice(0, 4); // Limitar a 4 dígitos
        }

        // Convertir el valor a número
        const anio = parseInt(valor, 10);

        // Validar que el año no sea menor a 2023 ni mayor a 9999
        if (isNaN(anio) || anio < 2023 || anio > 9999) {
            anioInput.setCustomValidity('El año debe ser entre 2023 y 9999.');
        } else {
            anioInput.setCustomValidity(''); // Limpiar errores si es válido
        }
    });

    // Validar la entrada cuando el usuario intenta enviar el formulario
    anioInput.addEventListener('blur', function () {
        const valor = anioInput.value;
        const anio = parseInt(valor, 10);

        if (isNaN(anio) || anio < 2023 || anio > 9999) {
            alert('Por favor, ingrese un año válido entre 2023 y 9999.');
            anioInput.value = anioActual; // Restablecer al año actual si es inválido
        }
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const guardarBoton = document.getElementById('guardarDatos');
    const formulario = document.getElementById('formularioCarga');

    guardarBoton.addEventListener('click', async function () {
        // Obtener los valores de los campos
        const numeroProcedimiento = document.getElementById('numeroProcedimiento').value;
        const trimestre = document.getElementById('trimestre').value;
        const anio = document.getElementById('anio').value;
        const archivoInput = document.getElementById('archivoExcel');

        // Validar que todos los campos requeridos estén completos
        if (!numeroProcedimiento || !anio || !archivoInput.files.length) {
            alert('Por favor, complete todos los campos obligatorios.');
            return;
        }

        // Validar que se haya seleccionado un trimestre válido
        if (trimestre === "") {
            alert('Por favor, seleccione un trimestre válido.');
            return;
        }

        // Crear un objeto FormData para enviar los datos
        const formData = new FormData();
        formData.append('archivoExcel', archivoInput.files[0]);
        formData.append('numeroProcedimiento', numeroProcedimiento);
        formData.append('trimestre', trimestre);
        formData.append('anio', anio);

        try {
            const response = await fetch('php/controllers/guardar_contratos.controller.php', {
                method: 'POST',
                body: formData
            });

            const result = await response.json();
            if (result.success) {
                // Mostrar el modal de éxito
                $('#modalCargaExcel').modal('hide'); // Cerrar el modal de carga
                $('#modalExito').modal('show'); // Abrir el modal de éxito
            } else {
                alert('Error al guardar los datos: ' + result.message);
            }
        } catch (error) {
            console.error(error);
            alert('Ocurrió un error al procesar los datos.');
        }
    });
});

