<?php
include 'conexion.php';

$conexion = conexion();

$estado = "ventas";
include('../header/header.php');


if (!isset($_GET['id'])) {
    echo "ID de venta no especificado.";
    exit;
} else {
    $id = $_GET['id'];
    echo "ID de venta: " . htmlspecialchars($id);
}

// Función para obtener los datos de una compra específica
function obtenerVenta($conexion, $id) {
    $sql = "SELECT * FROM ventas WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

// Función para obtener la lista de clientes
function obtenerClientes($conexion) {
    $sql = "SELECT id, nombre, apellido FROM clientes";
    $result = $conexion->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}
// Función para obtener la lista de empleados
function obtenerEmpleados($conexion) {
    $sql = "SELECT id,  nombre, apellido FROM usuarios";
    $result = $conexion->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Obtener los datos de la compra y los proveedores
$compra = obtenerVenta($conexion, $id);
$clientes = obtenerClientes($conexion);
$empleados = obtenerEmpleados($conexion);

if (!$compra) {
    echo "Venta no encontrada.";
    exit;
}
?>
<link rel="stylesheet" type="text/css" href="estilo_registrar_venta.css">

</head>
<body>
    <!-- Código HTML para la interfaz -->
    <form action="procesar_editar_venta.php" method="post">
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
            <input type="submit" value="Guardar">
            <button type="button" class="cancel" onclick="window.location.href='ventas.php';">Cancelar</button>
        </p>
    </form>
</body>
</html>
