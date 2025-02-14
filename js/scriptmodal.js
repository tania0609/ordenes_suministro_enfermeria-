document.addEventListener("DOMContentLoaded", function () {
    // Obtener los elementos de los campos
    const fechaExpedicion = document.getElementById('fecha_expedicion');
    const fechaLimiteEntrega = document.getElementById('fecha_limite_entrega');

    // Establecer la fecha actual como valor predeterminado para "Fecha de Expedición"
    const fechaHoy = new Date().toISOString().split('T')[0];
    fechaExpedicion.value = fechaHoy;

    // Calcular la fecha límite inicial (15 días después de la fecha actual)
    calcularFechaLimite();

    // Escuchar cambios en el campo "Fecha de Expedición"
    fechaExpedicion.addEventListener('change', calcularFechaLimite);

    // Función para calcular la fecha límite
    function calcularFechaLimite() {
        const fechaSeleccionada = new Date(fechaExpedicion.value);
        if (!isNaN(fechaSeleccionada)) {
            // Agregar 15 días a la fecha seleccionada
            fechaSeleccionada.setDate(fechaSeleccionada.getDate() + 15);

            // Formatear la fecha en formato YYYY-MM-DD
            const fechaLimite = fechaSeleccionada.toISOString().split('T')[0];

            // Asignar la fecha calculada al campo "Fecha Límite de Entrega"
            fechaLimiteEntrega.value = fechaLimite;
        }
    }
});


function buscarProcedimientos(valor) {
    const sugerenciasDiv = document.getElementById('sugerencias');

    // Limpiar las sugerencias si el campo está vacío
    if (valor.trim() === '') {
        sugerenciasDiv.style.display = 'none';
        sugerenciasDiv.innerHTML = '';
        return;
    }

    // Realizar la solicitud AJAX
    fetch(`php/controllers/buscar_procedimientos.php?query=${encodeURIComponent(valor)}`)
        .then(response => {
            if (!response.ok) {
                throw new Error(`Error HTTP: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            // Limpiar las sugerencias anteriores
            sugerenciasDiv.innerHTML = '';

            // Mostrar las sugerencias si hay resultados
            if (data.length > 0) {
                data.forEach(item => {
                    const div = document.createElement('div');
                    div.textContent = item.n_procedimiento;
                    div.style.padding = '8px 12px';
                    div.style.cursor = 'pointer';

                    // Al hacer clic en una sugerencia, llenar el campo de entrada y cargar los contratos
                    div.onclick = () => {
                        document.getElementById('corto_descrip').value = item.n_procedimiento;
                        sugerenciasDiv.style.display = 'none';
                        cargarContratos(item.n_procedimiento); // Llamar a la función para cargar contratos
                    };

                    sugerenciasDiv.appendChild(div);
                });
                sugerenciasDiv.style.display = 'block';
            } else {
                sugerenciasDiv.style.display = 'none';
            }
        })
        .catch(error => {
            console.error('Error al buscar procedimientos:', error.message);
            sugerenciasDiv.style.display = 'none';
        });
}

function cargarContratos(nProcedimiento) {
    const contratoSelect = document.getElementById('contrato');

    // Limpiar el select
    contratoSelect.innerHTML = '<option value="">Seleccione un contrato</option>';
    contratoSelect.disabled = true;

    // Realizar la solicitud AJAX para obtener los contratos asociados
    fetch(`php/controllers/buscar_contratos.php?n_procedimiento=${encodeURIComponent(nProcedimiento)}`)
        .then(response => {
            if (!response.ok) {
                throw new Error(`Error HTTP: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            if (data.length > 0) {
                data.forEach(item => {
                    const option = document.createElement('option');
                    option.value = item.n_contrato;
                    option.textContent = item.n_contrato;
                    option.setAttribute('data-partida', item.partida); // Almacenar la partida en el option
                    contratoSelect.appendChild(option);
                });
                contratoSelect.disabled = false;
            }
        })
        .catch(error => {
            console.error('Error al cargar contratos:', error.message);
        });
}

// Agregar un evento al select de contratos para cargar la partida presupuestal
document.getElementById('contrato').addEventListener('change', function() {
    const selectedOption = this.options[this.selectedIndex];
    const partidaPresupuestal = selectedOption.getAttribute('data-partida'); // Obtener la partida del option seleccionado
    document.getElementById('partida_presupuestal').value = partidaPresupuestal || ''; // Llenar el campo de partida presupuestal
});


function cargarProveedor(nContrato) {
    const proveedorInput = document.getElementById('n_proveedor');

    // Limpiar el campo del proveedor
    proveedorInput.value = '';

    // Realizar la solicitud AJAX para obtener el nombre del proveedor
    fetch(`php/controllers/buscar_proveedor.php?n_contrato=${encodeURIComponent(nContrato)}`)
        .then(response => {
            if (!response.ok) {
                throw new Error(`Error HTTP: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            if (data.proveedor) {
                proveedorInput.value = data.proveedor;
            }
        })
        .catch(error => {
            console.error('Error al cargar el proveedor:', error.message);
        });
}

// Agregar un evento al select de contratos para cargar el proveedor
document.getElementById('contrato').addEventListener('change', function() {
    const nContrato = this.value;
    if (nContrato) {
        cargarProveedor(nContrato);
    }
});

function cargarPartidaPresupuestal(nContrato) {
    const partidaInput = document.getElementById('partida_presupuestal');

    // Limpiar el campo de partida presupuestal
    partidaInput.value = '';

    // Realizar la solicitud AJAX para obtener la partida presupuestal
    fetch(`php/controllers/buscar_partida.php?n_contrato=${encodeURIComponent(nContrato)}`)
        .then(response => {
            if (!response.ok) {
                throw new Error(`Error HTTP: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            if (data.partida) {
                partidaInput.value = data.partida;
            }
        })
        .catch(error => {
            console.error('Error al cargar la partida presupuestal:', error.message);
        });
}

function cargarClavesInternas(nContrato) {
    const claveSelect = document.getElementById('clave_hraei');

    // Limpiar el select
    claveSelect.innerHTML = '<option value="">Seleccione</option>';
    claveSelect.disabled = true;

    // Realizar la solicitud AJAX para obtener las claves internas asociadas
    fetch(`php/controllers/buscar_claves.php?n_contrato=${encodeURIComponent(nContrato)}`)
        .then(response => {
            if (!response.ok) {
                throw new Error(`Error HTTP: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            if (data.length > 0) {
                data.forEach(item => {
                    const option = document.createElement('option');
                    option.value = item.clave;
                    option.textContent = item.clave;
                    claveSelect.appendChild(option);
                });
                claveSelect.disabled = false;
            }
        })
        .catch(error => {
            console.error('Error al cargar las claves internas:', error.message);
        });
}

// Modificar el evento del select de contratos para cargar también las claves internas
document.getElementById('contrato').addEventListener('change', function() {
    const nContrato = this.value;
    if (nContrato) {
        cargarProveedor(nContrato); // Cargar el proveedor
        cargarPartidaPresupuestal(nContrato); // Cargar la partida presupuestal
        cargarClavesInternas(nContrato); // Cargar las claves internas
    }
});

// Agregar un evento al select de claves internas
document.getElementById('clave_hraei').addEventListener('change', function () {
    const claveSeleccionada = this.value;

    // Limpiar todos los campos relacionados
    document.getElementById('cnis').value = '';
    document.getElementById('cucop').value = '';
    document.getElementById('descripcion').value = '';
    document.getElementById('unidad_de_presentacion').value = '';
    document.getElementById('cantidad_minima').value = '';
    document.getElementById('cantidad_maxima').value = '';
    document.getElementById('precio_unitario').value = '';
    document.getElementById('iva').value = '';

    // Si no se selecciona ninguna clave, salir
    if (!claveSeleccionada) return;

    // Realizar la solicitud AJAX para obtener los datos asociados a la clave
    fetch(`php/controllers/buscar_insumo.php?clave=${encodeURIComponent(claveSeleccionada)}`)
        .then(response => {
            if (!response.ok) {
                throw new Error(`Error HTTP: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            if (data) {
                // Llenar los campos con los datos obtenidos
                document.getElementById('cnis').value = data.cnis || '';
                document.getElementById('cucop').value = data.cucop || '';
                document.getElementById('descripcion').value = data.descripcion || '';
                document.getElementById('unidad_de_presentacion').value = data.unidad_de_medida || '';
                document.getElementById('cantidad_minima').value = data.cantidad_minima || '';
                document.getElementById('cantidad_maxima').value = data.cantidad_maxima || '';
                document.getElementById('precio_unitario').value = data.precio_unitario || '';
                document.getElementById('iva').value = data.tasa_iva || '';
            } else {
                console.error('No se encontraron datos para la clave seleccionada.');
            }
        })
        .catch(error => {
            console.error('Error al buscar insumo:', error.message);
        });
});


function calcularImporte() {
    // Obtener los valores de los campos
    var cantidadSolicitada = document.getElementById("cant_solicitada").value;
    var precioUnitario = document.getElementById("precio_unitario").value;

    // Verificar que los valores no sean vacíos ni NaN
    if (cantidadSolicitada && precioUnitario) {
        // Realizar la multiplicación
        var importe = parseFloat(cantidadSolicitada) * parseFloat(precioUnitario);
        
        // Mostrar el resultado en el campo de "Importe"
        document.getElementById("importe").value = importe.toFixed(2); // Muestra el importe con 2 decimales
    } else {
        // Si no hay datos, borrar el campo "Importe"
        document.getElementById("importe").value = '';
    }
}

function agregarClave() {
    // Obtener los valores de los campos
    var claveHraei = document.getElementById('clave_hraei').value;
    var cnis = document.getElementById('cnis').value;
    var cucop = document.getElementById('cucop').value;
    var descripcion = document.getElementById('descripcion').value;
    var unidadMedida = document.getElementById('unidad_de_presentacion').value;
    var cantidadSolicitada = document.getElementById('cant_solicitada').value;
    var precioUnitario = document.getElementById('precio_unitario').value;
    var importe = document.getElementById('importe').value;
    var iva = document.getElementById('iva').value;

    // Crear una nueva fila en la tabla
    var table = document.querySelector('.table tbody');
    var newRow = table.insertRow(table.rows.length);

    // Crear las celdas y asignar los valores
    newRow.insertCell(0).textContent = claveHraei;
    newRow.insertCell(1).textContent = cnis;
    newRow.insertCell(2).textContent = cucop;
    newRow.insertCell(3).textContent = descripcion;
    newRow.insertCell(4).textContent = unidadMedida;
    newRow.insertCell(5).textContent = cantidadSolicitada;
    newRow.insertCell(6).textContent = precioUnitario;
    newRow.insertCell(7).textContent = importe;

    // Limpiar los campos después de agregar la fila
    document.getElementById('clave_hraei').value = '';
    document.getElementById('cnis').value = '';
    document.getElementById('cucop').value = '';
    document.getElementById('descripcion').value = '';
    document.getElementById('unidad_de_presentacion').value = '';
    document.getElementById('cant_solicitada').value = '';
    document.getElementById('precio_unitario').value = '';
    document.getElementById('importe').value = '';

    // Llamar a una función para recalcular los totales si es necesario
    recalcularTotales();
}

function recalcularTotales() {
    var table = document.querySelector('.table tbody');
    var rows = table.rows;
    var subTotal = 0;
    var ivaTotal = 0;
    var total = 0;

    // Recorrer todas las filas de la tabla
    for (var i = 0; i < rows.length; i++) {
        var row = rows[i];
        var cantidadSolicitada = parseFloat(row.cells[5].textContent);
        var precioUnitario = parseFloat(row.cells[6].textContent);
        var importe = cantidadSolicitada * precioUnitario;

        // Calcular el importe
        row.cells[7].textContent = importe.toFixed(2);

        // Calcular el subTotal
        subTotal += importe;
        ivaTotal = subTotal * 0.16;  // Suponiendo un IVA del 16%
        total = subTotal + ivaTotal;
    }

    // Actualizar los valores en el pie de la tabla
    document.querySelector("tfoot tr:nth-child(1) td:nth-child(8)").textContent = "$" + subTotal.toFixed(2);
    document.querySelector("tfoot tr:nth-child(2) td:nth-child(8)").textContent = "$" + ivaTotal.toFixed(2);
    document.querySelector("tfoot tr:nth-child(3) td:nth-child(8)").textContent = "$" + total.toFixed(2);
}
