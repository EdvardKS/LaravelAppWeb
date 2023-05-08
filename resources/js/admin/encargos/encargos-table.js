
const channelName = 'pollosChanel';
const apiKey = "jVwvcw.mYv2yA:LzJ0YKCqrncnG7Zs90n9E349K_yVvQRv5FI9mfJHSII"
const apiKey2 = "jVwvcw.05Vw_w:siT4Nk3MJ03DXCAG_vYM6owlwQvPetU7PqpQnKcpwE8"

const ably = new Ably.Realtime(apiKey);

ably.connection.on('connected', () => {
    console.log('Connected to Ably!');
});

let channel = ably.channels.get(channelName);

function sortTableByHoraEntrega() {
    let tbody = document.getElementById('encargos-tbody');
    let rows = Array.from(tbody.rows);

    rows.sort(function(a, b) {
        let dateA = new Date(a.cells[0].textContent);
        let dateB = new Date(b.cells[0].textContent);
        return dateA - dateB;
    });

    for (let row of rows) {
        tbody.appendChild(row);
    }
}


channel.subscribe(function (message) {
    console.log('Received: ' + message.data);

    // Asegúrate de que el mensaje.data contiene todos los datos necesarios para crear una nueva fila
    let encargo = JSON.parse(message.data);

    // Obtén el elemento "tbody" de la tabla
    let tbody = document.querySelector('.table.table-bordered tbody');

    // Crea una nueva fila y agrega las celdas correspondientes
    let newRow = document.createElement('tr');

    let horaEntregaCell = document.createElement('td');
    // Reemplaza la 'T' en el string por un espacio
    let fechaFormateada = encargo['hora-usuario'].replace('T', ' ');
    horaEntregaCell.textContent = fechaFormateada;
    newRow.appendChild(horaEntregaCell);

    let menuCell = document.createElement('td');
    menuCell.textContent = encargo['pedido-usuario'];
    newRow.appendChild(menuCell);

    let detallesCell = document.createElement('td');
    detallesCell.textContent = encargo.detalles;
    newRow.appendChild(detallesCell);

    let nombreApellidosCell = document.createElement('td');
    nombreApellidosCell.textContent = encargo['identidad-usuario'];
    newRow.appendChild(nombreApellidosCell);

    let telefonoCell = document.createElement('td');
    telefonoCell.textContent = encargo['telefono-usuario'];
    newRow.appendChild(telefonoCell);

    let emailCell = document.createElement('td');
    emailCell.textContent = encargo['email-usuario'];
    newRow.appendChild(emailCell);

    let codigoPostalCell = document.createElement('td');
    codigoPostalCell.textContent = encargo['cp-usuario'];
    newRow.appendChild(codigoPostalCell);

    let entregadoCell = document.createElement('td');
    entregadoCell.classList.add('text-center');
    // Crea un nuevo elemento 'form'
    let form = document.createElement('form');
    form.action = `/encargos/${encargo.id}/entregado`;
    
    form.method = 'POST';
    form.onsubmit = () => {
        return confirm('¿Estas seguro que quieres marcar el pedido como entregado?');
    };

    // Crea un input oculto para almacenar el token CSRF
    let csrfInput = document.createElement('input');
    csrfInput.type = 'hidden';
    csrfInput.name = '_token';
    csrfInput.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    form.appendChild(csrfInput);

    // Crea un input oculto para almacenar el método PUT
    let methodInput = document.createElement('input');
    methodInput.type = 'hidden';
    methodInput.name = '_method';
    methodInput.value = 'PUT';
    form.appendChild(methodInput);

    // Crea el botón 'Entregado' y agrégalo al formulario
    let entregadoButton = document.createElement('button');
    entregadoButton.type = 'submit';
    entregadoButton.className = 'btn btn-primary';
    entregadoButton.textContent = 'Entregado';
    form.appendChild(entregadoButton);

    // Agrega el formulario al td
    entregadoCell.appendChild(form);
    newRow.appendChild(entregadoCell);

    // Agrega la nueva fila a la tabla
    tbody.appendChild(newRow);
    sortTableByHoraEntrega();
});
