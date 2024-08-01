<?php
include 'conexion.php'; // Incluye el archivo de conexión a la base de datos
// Establece la conexión
$mysqli = conexion();


$estado = "compras";
include('../header/header.php'); 

// Consulta para obtener los proveedores
$sql = 'SELECT id, descripcion FROM productos';
$result = $mysqli->query($sql);

if ($result === false) {
    echo 'Error en la consulta: ' . $mysqli->error;
    exit(); // Detener la ejecución si hay un error en la consulta
}

$productos = $result->fetch_all(MYSQLI_ASSOC);
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
            <span class="productos-texto">Registrar detalle de compra</span>
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
<!-- registrar_detalle_compra.php -->
<form action="procesar_registrar_detalle_compra.php" method="post">
    <input type="hidden" name="compra_id" value="<?php echo $_POST['compra_id']; ?>">
    <label for="producto_id">Producto ID:</label>
    <select id="producto_id" name="producto_id" required>
                <?php foreach ($productos as $producto): ?>
                    <option value="<?php echo htmlspecialchars($producto['id']); ?>">
                        <?php echo htmlspecialchars($producto['descripcion']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </p>

    <label for="cantidad">Cantidad:</label>
    <input type="number" id="cantidad" name="cantidad" required><br>

    <label for="precio">Precio:</label>
    <input type="number" step="0.01" id="precio" name="precio" required><br>

    <input type="submit" value="Registrar Detalle">
</form>
</div>



    <!-- Formulario  -->

    </div>
    <!-- marco inferior -->
</body>
</html>


