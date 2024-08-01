<?php
include 'conexion.php';

$conexion = conexion();

$estado = "ventas";
include('../header/header.php');

$tipo_comprobante = $_POST['tipo_comprobante'];
$nro_comprobante = $_POST['nro_comprobante'];
$fecha_emision = $_POST['fecha_emision'];
$cliente_id = $_POST['cliente_id'];
$empleado_id = $_POST['empleado_id'];

// Preparar la consulta SQL
$query = "INSERT INTO ventas (tipo_comprobante, nro_comprobante, fecha_emision, cliente_id, empleado_id) VALUES (?, ?, ?, ?, ?)";
$stmt = $conexion->prepare($query);

if ($stmt === false) {
    die("Error en la preparación de la consulta: " . $conexion->error);
}

// Bind de parámetros
$stmt->bind_param('ssssi', $tipo_comprobante, $nro_comprobante, $fecha_emision, $cliente_id, $empleado_id);

// Ejecutar la consulta
if ($stmt->execute()) {
    $venta_id = $stmt->insert_id; // Obtiene el ID de la venta recién insertada
    $mensaje = "Venta registrada correctamente.<br>
    Tipo de Comprobante: " . htmlspecialchars($tipo_comprobante) . "<br>
    Nro de Comprobante: " . htmlspecialchars($nro_comprobante) . "<br>
    Fecha de Emisión: " . htmlspecialchars($fecha_emision) . "<br>
    Cliente: " . htmlspecialchars($cliente_id) . "<br>
    Usuario: " . htmlspecialchars($empleado_id) . "<br>";

    // Redirige al formulario para los detalles de la venta
    $mensaje .= "<form action='registrar_detalle_venta.php' method='post'>
            <input type='hidden' name='venta_id' value='" . htmlspecialchars($venta_id) . "'>
            <input type='submit' value='Agregar Detalles de Venta'>
          </form>";
} else {
    $mensaje = "Error al registrar la venta: " . $stmt->error;
}

$stmt->close();
$conexion->close();
?>

<link rel="stylesheet" type="text/css" href="estilo_registrar_venta.css">

    <!-- marco inferior -->
    <div class="marco_inferior">

        <!-- Titulo Portal -->
        <nav class="nav-links">
            <div class="label-productos">
                <!-- icono -->
                <div class="imagen-2">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#ffffff">
                        <!-- SVG content -->
                    </svg>
                </div>
                <!-- titulo -->
                <span class="productos-texto">Resultado de la Venta</span>
            </div>
        </nav>
        <!-- Titulo Portal -->
        
        <!-- linea recta 2 -->
        <hr class="custom-line2">
        <!-- linea recta 2 -->

        <!-- Mensaje -->
        <div class="marco_tabla">
            <?php echo $mensaje; ?>
            <button type="button" class="cancel" onclick="window.location.href='registrar_venta.php';">Volver</button>
        </div>
        <!-- Mensaje -->

    </div>
    <!-- marco inferior -->

    
</body>
</html>