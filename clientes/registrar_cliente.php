<?php

$estado = "clientes";
include('../header/header.php'); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Tiendita de Don Pepe</title>
    
    <!-- importar css -->
    <link rel="stylesheet" type="text/css" href="estilo_registrar_cliente.css">
    <link rel="stylesheet" type="text/css" href="notificacion.css">
    <!-- importar css -->

    <!-- importar fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Enriqueta:wght@400;500;600;700&family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Mukta:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- importar fuentes -->

</head>

<body>
    <!-- marco superior  -->

    <!-- marco inferior -->
    <div class="marco_inferior">


    <!-- Titulo Portal -->
    <nav class="nav-links">

    <!-- icono + titulo  -->
    <div class="label-productos">
            <!-- icono -->
            <div class="imagen-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#ffffff" width="60px" height="60px">
    <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5s-2.99 1.34-2.99 3S14.34 11 16 11zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5 5.01 6.34 5.01 8 6.34 11 8 11zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4zm8 0c-.29 0-.62.02-.97.05.74.54 1.37 1.24 1.87 2H24v-2c0-2.66-5.33-4-8-4z"/>
</svg>
            </div>
            <!-- icono -->
            
            <!-- titulo -->
            <span class="productos-texto">Registrar Cliente</span>
            <!-- titulo -->

    </div>
    <!-- icono + titulo  -->

</nav>
<!-- Titulo Portal -->
    
    <!-- linea recta 2 -->
    <hr class="custom-line2">
    <!-- linea recta 2 -->

    
    <!-- Formulario  -->

    <div class="marco_tabla">
    <form id="registrar_cliente_form" method="post">
        <p>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" minlength="2" pattern="[A-Za-z ]+" required>
        </p>
        <p>
            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" maxlength="50" pattern="[A-Za-z ]+" required>
        </p>
        <p>
            <label for="tipo_documento">Tipo de Documento:</label>
            <input list="tipo_documento_list" id="tipo_documento" name="tipo_documento" required>
                <datalist id="tipo_documento_list">
                    <option value="DNI">
                    <option value="Pasaporte">
                    <option value="Otro">
                </datalist>
        </p>
        <p>
            <label for="nro_documento">Nro de Documento:</label>
            <input type="number" id="nro_documento" name="nro_documento" maxlength="20" required>
        </p>
        <p>
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" maxlength="100" required>
        </p>
        <p>
            <label for="telefono">Teléfono:</label>
            <input type="number" id="telefono" name="telefono" maxlength="9" required>
        </p>
        <p>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" maxlength="50" required>
        </p>
        <p>
            <input type="submit" value="Enviar">
            <button type="button" class="cancel" onclick="window.location.href='clientes.php';">Cancelar</button>
        </p>
    </form>
    </div>
    <!-- Formulario  -->

    </div>
    <!-- marco inferior -->
    <!-- agregar el script de notificación -->
    <script src="notificacion.js"></script>

    <!-- agregar script para manejar el envío del formulario con AJAX -->
    <script>
        document.getElementById('registrar_cliente_form').addEventListener('submit', function(event) {
            event.preventDefault(); // Evitar el envío del formulario
            var form = event.target;
            var formData = new FormData(form);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'procesar_registrar_cliente.php', true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    showMessage('info', 'Cliente registrado exitosamente');
                    form.reset(); // Limpiar el formulario después del registro
                } else {
                    showMessage('error', 'Error al registrar el cliente');
                }
            };
            xhr.send(formData);
        });
    </script>
</body>
</html>
