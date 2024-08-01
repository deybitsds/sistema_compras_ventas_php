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

function confirmUpdate(event) {
    event.preventDefault(); // Evitar el envío del formulario
    if (confirm('¿Estás seguro de que deseas actualizar el perfil?')) {
        // Enviar el formulario con AJAX
        var form = document.getElementById('formEditarPerfil');
        var formData = new FormData(form);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'procesar_editar_perfil.php', true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                showMessage('info', 'Perfil actualizado exitosamente');
                setTimeout(function() {
                    window.location.href = '../home/home.php';
                }, 3000);
            } else {
                showMessage('error', 'Error al actualizar el perfil');
            }
        };
        xhr.send(formData);
    }
}