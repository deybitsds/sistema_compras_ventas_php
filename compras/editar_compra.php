<?php
include 'conexion.php';

$conexion = conexion();

$estado = "compras";
include('../header/header.php'); 


if (!isset($_GET['id'])) {
    echo "<span style='color: white; font-size: 30px; margin-top: 10px; margin-left: 10px;'>ID de compra no especificado.</span>";
    exit;
} else {
    $id = $_GET['id'];
    echo "<span style='color: white; font-size: 30px; margin-top: 10px; margin-left: 10px;'>ID de compra: " . htmlspecialchars($id) . "</span>";
}

// Función para obtener los datos de una compra específica
function obtenerCompra($conexion, $id) {
    $sql = "SELECT * FROM compras WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

// Función para obtener la lista de proveedores
function obtenerProveedores($conexion) {
    $sql = "SELECT id, razon_social FROM proveedores";
    $result = $conexion->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Obtener los datos de la compra y los proveedores
$compra = obtenerCompra($conexion, $id);
$proveedores = obtenerProveedores($conexion);

if (!$compra) {
    echo "Compra no encontrada.";
    exit;
}
?>



    <link rel="stylesheet" type="text/css" href="estilo_registrar_compra.css">

    <!-- Código HTML para la interfaz -->
    <form action="procesar_editar_compra.php" method="post">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
        <p>
            <label for="tipo_comprobante">Tipo de Comprobante:</label><br>
            <select id="tipo_comprobante" name="tipo_comprobante" required>
                <option value="Factura" <?php if ($compra['tipo_comprobante'] == 'Factura') echo 'selected'; ?>>Factura</option>
                <option value="Boleta" <?php if ($compra['tipo_comprobante'] == 'Boleta') echo 'selected'; ?>>Boleta</option>
            </select><br><br>
        </p>
        <p>
            <label for="nro_comprobante">Nro de Comprobante:</label>
            <input type="text" id="nro_comprobante" name="nro_comprobante" value="<?php echo htmlspecialchars($compra['nro_comprobante']); ?>" required>
        </p>
        <p>
            <label for="fecha_emision">Fecha de Emision:</label>
            <input type="date" id="fecha_emision" name="fecha_emision" value="<?php echo htmlspecialchars($compra['fecha_emision']); ?>" required>
        </p>
        <p>
            <label for="proveedor_id">Proveedor:</label>
            <select id="proveedor_id" name="proveedor_id" required>
                <?php foreach ($proveedores as $proveedor): ?>
                    <option value="<?php echo htmlspecialchars($proveedor['id']); ?>" <?php if ($proveedor['id'] == $compra['proveedor_id']) echo 'selected'; ?>>
                        <?php echo htmlspecialchars($proveedor['razon_social']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </p>
        <p>
            <input type="submit" value="Guardar">
            <button type="button" class="cancel" onclick="window.location.href='compras.php';">Cancelar</button>
        </p>
    </form>
</body>
</html>
