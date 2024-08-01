function showMessage(type, message) {
    var notification = document.getElementById('notification');
    if (!notification) {
        notification = document.createElement('div');
        notification.id = 'notification';
        notification.className = 'notification';
        document.body.appendChild(notification);
    }
    notification.className = 'notification ' + type + ' show';
    notification.textContent = message;
    setTimeout(function() {
        notification.className = notification.className.replace(' show', '');
    }, 3000);
}

function confirmDelete(clienteId) {
    if (confirm('¿Estás seguro de que deseas eliminar este cliente?')) {
        var form = document.createElement('form');
        form.method = 'POST';
        form.action = 'eliminar_cliente.php';
        
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'cliente_id';
        input.value = clienteId;
        
        form.appendChild(input);
        document.body.appendChild(form);
        form.submit();
    }
}

function confirmUpdate(event) {
    event.preventDefault(); // Evitar el envío del formulario
    if (confirm('¿Estás seguro de que deseas actualizar este cliente?')) {
        // Enviar el formulario con AJAX
        var form = document.getElementById('editar_cliente_form');
        var formData = new FormData(form);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'procesar_editar_cliente.php', true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                showMessage('info', 'Registro actualizado exitosamente');
                setTimeout(function() {
                    window.location.href = 'clientes.php';
                }, 3000);
            } else {
                showMessage('error', 'Error al actualizar el registro');
            }
        };
        xhr.send(formData);
    }
}