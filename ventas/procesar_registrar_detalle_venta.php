<?php
include 'conexion.php';

$conexion = conexion();

$estado = "ventas";
include('../header/header.php');

// Obtener los datos del formulario
$venta_id = $_POST['venta_id'];
$producto_id = $_POST['producto_id'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];

// Preparar la consulta SQL
$query = "INSERT INTO detalle_ventas (venta_id, producto_id, cantidad, precio) VALUES (?, ?, ?, ?)";
$stmt = $conexion->prepare($query);

if ($stmt === false) {
    die("Error en la preparación de la consulta: " . $conexion->error);
}

// Bind de parámetros
$stmt->bind_param('iidi', $venta_id, $producto_id, $cantidad, $precio);

// Ejecutar la consulta
if ($stmt->execute()) {
    $mensaje = "Detalle de venta registrado correctamente.<br>
     Venta ID: " . htmlspecialchars($venta_id) . "<br>
     Producto ID: " . htmlspecialchars($producto_id) . "<br>
     Cantidad: " . htmlspecialchars($cantidad) . "<br>
     Precio: " . htmlspecialchars($precio) . "<br>";

    // Redirige al formulario para los detalles de la venta
    $mensaje .= "<form action='registrar_detalle_venta.php' method='post'>
            <input type='hidden' name='venta_id' value='" . htmlspecialchars($venta_id) . "'>
            <input type='submit' value='Continuar agregando productos'>
          </form>";
    $mensaje .= "<form action='registrar_venta.php' method='post'>
          <input type='submit' value='Regresar al registro de ventas'>
        </form>";


} else {
    $mensaje= "Error al registrar el detalle de venta: " . $stmt->error;
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