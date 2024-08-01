<?php
include 'conexion.php';

$conexion = conexion();

$estado = "compras";
include('../header/header.php'); 


$tipo_comprobante = $_POST['tipo_comprobante'];
$nro_comprobante = $_POST['nro_comprobante'];
$fecha_emision = $_POST['fecha_emision'];
$proveedor_id = $_POST['proveedor_id'];

// Preparar la consulta SQL
$query = "INSERT INTO compras (tipo_comprobante, nro_comprobante, fecha_emision, proveedor_id) VALUES (?, ?, ?, ?)";
$stmt = $conexion->prepare($query);

if ($stmt === false) {
    die("Error en la preparación de la consulta: " . $conexion->error);
}

// Bind de parámetros
$stmt->bind_param('sssi', $tipo_comprobante, $nro_comprobante, $fecha_emision, $proveedor_id);

// Ejecutar la consulta
if ($stmt->execute()) {
    $compra_id = $stmt->insert_id; // Obtiene el ID de la compra recién insertada
    $mensaje = "Compra registrada correctamente.<br>
    Tipo de Comprobante: " . htmlspecialchars($tipo_comprobante) . "<br>
    Nro de Comprobante: " . htmlspecialchars($nro_comprobante) . "<br>
    Fecha de Emisión: " . htmlspecialchars($fecha_emision) . "<br>
    Proveedor: " . htmlspecialchars($proveedor_id) . "<br>";

    // Redirige al formulario para los detalles de la compra
    $mensaje .= "<form action='registrar_detalle_compra.php' method='post'>
            <input type='hidden' name='compra_id' value='" . htmlspecialchars($compra_id) . "'>
            <input type='submit' value='Agregar Detalles de Compra'>
          </form>";
} else {
    $mensaje = "Error al registrar la compra: " . $stmt->error;
}

$stmt->close();
$conexion->close();
?>

<link rel="stylesheet" type="text/css" href="estilo_registrar_compra.css">

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
                <span class="productos-texto">Resultado de la Compra</span>
            </div>
        </nav>
        <!-- Titulo Portal -->
        
        <!-- linea recta 2 -->
        <hr class="custom-line2">
        <!-- linea recta 2 -->

        <!-- Mensaje -->
        <div class="marco_tabla">
            <?php echo $mensaje; ?>
            <button type="button" class="cancel" onclick="window.location.href='registrar_compra.php';">Volver</button>
        </div>
        <!-- Mensaje -->

    </div>
    <!-- marco inferior -->

    
</body>
</html>