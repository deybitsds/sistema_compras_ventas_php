<?php

    $estado = "usuarios";
    include('../header/header.php'); 
    
?>
    
    <link rel="stylesheet" type="text/css" href="estilo_registrar_compra.css">

    <!-- marco inferior -->
    <div class="marco_inferior">


<!-- Titulo Portal -->
<nav class="nav-links">

    <!-- icono + titulo  -->
    <div class="label-productos">
            <!-- icono -->
            <div class="imagen-2">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs> <style>.cls-1{fill:none;stroke:#f6f5f4;stroke-miterlimit:10;stroke-width:1.91px;}</style> </defs> <g id="cart"> <circle class="cls-1" cx="10.07" cy="20.59" r="1.91"></circle> <circle class="cls-1" cx="18.66" cy="20.59" r="1.91"></circle> <path class="cls-1" d="M.52,1.5H3.18a2.87,2.87,0,0,1,2.74,2L9.11,13.91H8.64A2.39,2.39,0,0,0,6.25,16.3h0a2.39,2.39,0,0,0,2.39,2.38h10"></path> <polyline class="cls-1" points="7.21 5.32 22.48 5.32 22.48 7.23 20.57 13.91 9.11 13.91"></polyline> </g> </g></svg>
            </div>
            <!-- icono -->
            
            <!-- titulo -->
            <span class="productos-texto">Registrar usuario</span>
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

    <form action="procesar_registrar_usuario.php" method="post" enctype="multipart/form-data">
        <p>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" maxlength="50" required>
        </p>
        <p>
            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" maxlength="50" required>
        </p>
        <p>
            <label for="sexo">Sexo:</label>
            <select id="sexo" name="sexo" required>
                <option value="">Seleccione</option>
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
            </select>
        </p>
        <p>
            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
        </p>
        <p>
            <label for="tipo_documento">Tipo de Documento:</label>
            <select id="tipo_documento" name="tipo_documento" required>
                <option value="">Seleccione</option>
                <option value="DNI">DNI</option>
                <option value="Pasaporte">Pasaporte</option>
                <option value="Otro">Otro</option>
            </select>
        </p>
        <p>
            <label for="nro_documento">Número de Documento:</label>
            <input type="text" id="nro_documento" name="nro_documento" maxlength="20" required>
        </p>
        <p>
            <label for="foto">Foto:</label>
            <input type="file" id="foto" name="foto" accept="image/*" required>
        </p>
        <p>
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" maxlength="100" required>
        </p>
        <p>
            <label for="telefono">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono" maxlength="15" required>
        </p>
        <p>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" maxlength="50" required>
        </p>
        <p>
            <label for="estado">Estado:</label>
            <select id="estado" name="estado" required>
                <option value="">Seleccione</option>
                <option value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>
            </select>
        </p>
        <p>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" maxlength="20" required>
        </p>
        <p>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" maxlength="100" required>
        </p>
        <p>
            <label for="tipo_usuario">Tipo de Usuario:</label>
            <select id="tipo_usuario" name="tipo_usuario" required>
                <option value="">Seleccione</option>
                <option value="Administrador">Administrador</option>
                <option value="Empleado">Empleado</option>
            </select>
        </p>
        <p>
            <input type="submit" value="Registrar">
            <button type="button" class="cancel" onclick="window.location.href='usuarios.php';">Cancelar</button>
        </p>
    </form>


    </div>
    <!-- Formulario  -->

    </div>
    <!-- marco inferior -->
</body>
</html>