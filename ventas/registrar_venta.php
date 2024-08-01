<?php
include 'conexion.php'; // Incluye el archivo de conexión a la base de datos
// Establece la conexión
$mysqli = conexion();

// Consulta para obtener los clientes
$sql = 'SELECT id, nombre, apellido FROM clientes';
$result = $mysqli->query($sql);

if ($result === false) {
    echo 'Error en la consulta: ' . $mysqli->error;
    exit(); // Detener la ejecución si hay un error en la consulta
}

$clientes = $result->fetch_all(MYSQLI_ASSOC);

// Consulta para obtener los empleados
$sql = 'SELECT id, nombre, apellido FROM empleados';
$result = $mysqli->query($sql);
if ($result === false) {
    echo 'Error en la consulta: ' . $mysqli->error;
    exit(); // Detener la ejecución si hay un error en la consulta
}

$empleados = $result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Tiendita de Don Pepe</title>
    
    <!-- importar css -->
    <link rel="stylesheet" type="text/css" href="estilo_registrar_venta.css">
    <!-- importar css -->

    <!-- importar fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Enriqueta:wght@400;500;600;700&family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Mukta:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- importar fuentes -->

</head>

<body>
    <!-- marco superior  -->
     <div class="marco-superior">

         <nav class="nav-links">
     
             <!-- IZQUIERDA (LOGO CISCO) -->
             <div class="nav-left">

                <a href="../home/home.php">
                <svg viewBox="11.752 -158.846 797.655 797.655" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M271 418.843h-32.635v-129.33H271v129.33z" fill="#ffffff"></path> <g transform="matrix(10.33728 0 0 -10.33728 -861.345 7843.84)"> <defs> <path id="a" d="M84.461 713.596h77.163v43.961H84.461v-43.961z"></path> </defs> <clipPath id="b"> <use xlink:href="#a" overflow="visible"></use> </clipPath> <g clip-path="url(#b)"> <path d="M134.996 727.2c-.13.066-1.146.668-2.656.668-2.041 0-3.457-1.42-3.457-3.337 0-1.859 1.355-3.34 3.457-3.34 1.484 0 2.517.59 2.656.664v-3.358c-.396-.11-1.475-.445-2.877-.445-3.551 0-6.668 2.448-6.668 6.48 0 3.735 2.82 6.475 6.668 6.475 1.48 0 2.578-.36 2.877-.449V727.2zM102.043 727.2c-.127.066-1.142.668-2.652.668-2.045 0-3.46-1.42-3.46-3.337 0-1.859 1.356-3.34 3.46-3.34 1.484 0 2.516.59 2.652.664v-3.358c-.392-.11-1.47-.445-2.88-.445-3.548 0-6.661 2.448-6.661 6.48 0 3.735 2.82 6.475 6.662 6.475 1.486 0 2.582-.36 2.879-.449V727.2zM144.927 727.821c-1.873 0-3.264-1.474-3.264-3.29 0-1.82 1.391-3.293 3.264-3.293 1.871 0 3.266 1.473 3.266 3.293 0 1.816-1.395 3.29-3.266 3.29m6.611-3.29c0-3.579-2.763-6.479-6.61-6.479-3.849 0-6.608 2.9-6.608 6.48 0 3.572 2.76 6.475 6.607 6.475 3.848 0 6.611-2.903 6.611-6.476M121.512 727.941c-.047.015-1.376.382-2.468.382-1.265 0-1.953-.424-1.953-1.025 0-.762.928-1.028 1.447-1.192l.871-.277c2.05-.652 2.983-2.055 2.983-3.579 0-3.143-2.764-4.199-5.18-4.199-1.679 0-3.252.31-3.407.342v2.88c.278-.07 1.602-.466 2.981-.466 1.571 0 2.293.46 2.293 1.168 0 .634-.625 1-1.408 1.246-.19.064-.478.154-.674.218-1.758.556-3.224 1.59-3.224 3.66 0 2.34 1.752 3.911 4.662 3.911 1.537 0 2.983-.373 3.077-.398v-2.67z" fill="#ffffff"></path> <path d="M89.154 744.23c0 .862-.704 1.561-1.567 1.561s-1.568-.699-1.568-1.56v-3.285a1.568 1.568 0 0 1 3.135 0v3.284zM97.763 748.54a1.567 1.567 0 0 1-3.135 0v-7.594a1.567 1.567 0 0 1 3.135 0v7.595zM106.373 754.438c0 .862-.704 1.562-1.567 1.562-.864 0-1.568-.7-1.568-1.562v-16.613a1.568 1.568 0 0 1 3.135 0v16.613zM114.982 748.54a1.567 1.567 0 0 1-3.135 0v-7.594a1.567 1.567 0 0 1 3.135 0v7.595zM123.582 744.23a1.56 1.56 0 0 1-1.558 1.561 1.566 1.566 0 0 1-1.567-1.56v-3.285a1.562 1.562 0 1 1 3.125 0v3.284zM132.195 748.54a1.563 1.563 0 0 1-3.125 0v-7.594a1.562 1.562 0 1 1 3.125 0v7.595zM140.81 754.438a1.562 1.562 0 0 1-3.125 0v-16.613a1.564 1.564 0 1 1 3.125 0v16.613zM149.423 748.54c0 .863-.699 1.564-1.582 1.564a1.563 1.563 0 0 1-1.562-1.563v-7.595c0-.867.7-1.566 1.562-1.566.883 0 1.582.699 1.582 1.566v7.595zM158.02 744.23a1.563 1.563 0 0 1-3.128 0v-3.284c0-.867.701-1.567 1.564-1.567.862 0 1.563.7 1.563 1.567v3.284z" fill="#6cd389"></path> <path d="M156.213 719.922v-.196h-.558v-1.451h-.23v1.45h-.56v.197h1.348zM156.33 719.922h.359l.493-1.351h.008l.477 1.35h.352v-1.646h-.235v1.35h-.008l-.5-1.35h-.217l-.488 1.35h-.011v-1.35h-.23v1.647z" fill="#ffffff"></path> </g> </g> </g></svg>
                </a>

             </div>
             <!-- IZQUIERDA (LOGO CISCO) -->
     
             <!-- CENTRAL  -->
             <div class="nav-center">
                 <a href="../home/home.php" class="nav-link">Inicio</a>
                 <a href="../compras/compras.php" class="nav-link">Compras</a>
                 <a href="../ventas/ventas.php" class="nav-link actual">Ventas</a>
                 <a href="../usuarios/usuarios.php" class="nav-link">Usuarios</a>
                 <a href="../clientes/clientes.php" class="nav-link">Clientes</a>
                 <a href="../productos/productos.php" class="nav-link">Productos</a>
                 <a href="../reportes/reportes.php" class="nav-link">Reportes</a>
             </div>
             <!-- CENTRAL  -->
             
             <!-- DERECHA -->
                <!-- CONFIGURACION -->
                <div class="icono_tornillo">
                        <a href="../perfil/editar_perfil.php" class="nav-link-icono">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4 21C4 17.134 7.13401 14 11 14C11.3395 14 11.6734 14.0242 12 14.0709M15 7C15 9.20914 13.2091 11 11 11C8.79086 11 7 9.20914 7 7C7 4.79086 8.79086 3 11 3C13.2091 3 15 4.79086 15 7ZM12.5898 21L14.6148 20.595C14.7914 20.5597 14.8797 20.542 14.962 20.5097C15.0351 20.4811 15.1045 20.4439 15.1689 20.399C15.2414 20.3484 15.3051 20.2848 15.4324 20.1574L19.5898 16C20.1421 15.4477 20.1421 14.5523 19.5898 14C19.0376 13.4477 18.1421 13.4477 17.5898 14L13.4324 18.1574C13.3051 18.2848 13.2414 18.3484 13.1908 18.421C13.1459 18.4853 13.1088 18.5548 13.0801 18.6279C13.0478 18.7102 13.0302 18.7985 12.9948 18.975L12.5898 21Z" stroke="#6F757C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                        </a>
                </div>

            <!-- CONFIGURACION -->
        
                <!-- SALIR -->
                <a href="../login/login.php" class="icono_salir">
                    <button class="boton_salir_final">
                        <div class="icono_salir_final"><svg viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path></svg></div>
                        <div class="texto_salir_final">Salir</div>
                    </button>
                </a>
                <!-- SALIR -->

             <!-- DERECHA -->
             
         </nav>
     </div>
    <!-- marco superior  -->

    <!-- Linea recta 1 -->
     <hr class="custom-line">
    <!-- Linea recta -->

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
            <span class="productos-texto">Registrar Venta</span>
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

    <form action="procesar_registrar_venta.php" method="post">
        <p>
            <label for="tipo_comprobante">Tipo de Comprobante:</label><BR>
            <select id="tipo_comprobante" name="tipo_comprobante" required>
            <option value="Factura">Factura</option>
            <option value="Boleta">Boleta</option>
            </select><br><br>
        </p>
        <p>
            <label for="nro_comprobante">Nro de Comprobante:</label>
            <input type="text" id="nro_comprobante" name="nro_comprobante" required>
        </p>
        <p>
            <label for="fecha_emision">Fecha de Emision:</label>
            <input type="date" id="fecha_emision" name="fecha_emision"  required>
        </p>
        <p>
            <label for="cliente_id">Cliente:</label>
            <select id="cliente_id" name="cliente_id" required>
                <?php foreach ($clientes as $cliente): ?>
                    <option value="<?php echo htmlspecialchars($cliente['id']); ?>">
                        <?php echo htmlspecialchars($cliente['nombre']); ?>
                        <?php echo htmlspecialchars($cliente['apellido']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </p>

        <p>
            <label for="empleado_id">Empleado:</label>
            <select id="empleado_id" name="empleado_id" required>
                <?php foreach ($empleados as $empleado): ?>
                    <option value="<?php echo htmlspecialchars($empleado['id']); ?>">
                    <?php echo htmlspecialchars($empleado['nombre']); ?>
                    <?php echo htmlspecialchars($empleado['apellido']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </p>
        
        <p>
            <input type="submit" value="Enviar">
            <button type="button" class="cancel" onclick="window.location.href='ventass.php';">Cancelar</button>
        
        </p>
    </form>

    </div>
    <!-- Formulario  -->

    </div>
    <!-- marco inferior -->
</body>
</html>
