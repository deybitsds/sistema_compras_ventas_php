<?php
include 'conexion.php';

$conexion = conexion();



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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesar Venta - Sistema Tiendita de Don Pepe</title>
    
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
                    <svg viewBox="11.752 -158.846 797.655 797.655" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#ffffff">
                        <!-- SVG content -->
                    </svg>
                </a>
            </div>
            <!-- IZQUIERDA (LOGO CISCO) -->
     
            <!-- CENTRAL  -->
            <div class="nav-center">
                <a href="../home/home.php" class="nav-link">Inicio</a>
                <a href="../compras/compras.php" class="nav-link actual">Compras</a>
                <a href="../ventas/ventas.php" class="nav-link">Ventas</a>
                <a href="../usuarios/usuarios.php" class="nav-link">Usuarios</a>
                <a href="../clientes/clientes.php" class="nav-link">Clientes</a>
                <a href="../productos/productos.php" class="nav-link">Productos</a>
                <a href="../reportes/reportes.php" class="nav-link">Reportes</a>
            </div>
            <!-- CENTRAL  -->
             
            <!-- DERECHA -->
            <div class="icono_tornillo">
                <a href="../perfil/editar_perfil.php" class="nav-link-icono">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <!-- SVG content -->
                    </svg>
                </a>
            </div>
            <!-- CONFIGURACION -->

            <!-- SALIR -->
            <a href="../login/login.php" class="icono_salir">
                <button class="boton_salir_final">
                    <div class="icono_salir_final">
                        <svg viewBox="0 0 512 512">
                            <!-- SVG content -->
                        </svg>
                    </div>
                    <div class="texto_salir_final">Salir</div>
                </button>
            </a>
            <!-- SALIR -->
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