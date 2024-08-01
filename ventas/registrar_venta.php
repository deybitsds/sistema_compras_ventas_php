<?php
include 'conexion.php'; // Incluye el archivo de conexión a la base de datos
// Establece la conexión
$mysqli = conexion();


$estado = "ventas";
include('../header/header.php');


// Consulta para obtener los clientes
$sql = 'SELECT id, nombre, apellido FROM clientes';
$result = $mysqli->query($sql);

if ($result === false) {
    echo 'Error en la consulta: ' . $mysqli->error;
    exit(); // Detener la ejecución si hay un error en la consulta
}

$clientes = $result->fetch_all(MYSQLI_ASSOC);

// Consulta para obtener los empleados
$sql = 'SELECT id, nombre, apellido FROM usuarios';
$result = $mysqli->query($sql);
if ($result === false) {
    echo 'Error en la consulta: ' . $mysqli->error;
    exit(); // Detener la ejecución si hay un error en la consulta
}

$empleados = $result->fetch_all(MYSQLI_ASSOC);
?>

<link rel="stylesheet" type="text/css" href="estilo_registrar_venta.css">


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
            <label for="empleado_id">Usuario:</label>
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
            <button type="button" class="cancel" onclick="window.location.href='ventas.php';">Cancelar</button>
        
        </p>
    </form>

    </div>
    <!-- Formulario  -->

    </div>
    <!-- marco inferior -->
</body>
</html>
