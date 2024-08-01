<?php
// Conectar a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_inventario";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el ID del cliente
$cliente_id = $_POST['cliente_id'];

// Iniciar transacción
$conn->begin_transaction();

try {
    // Obtener los IDs de las ventas relacionadas con el cliente
    $sql_ventas = "SELECT id FROM ventas WHERE cliente_id = ?";
    $stmt_ventas = $conn->prepare($sql_ventas);
    $stmt_ventas->bind_param("i", $cliente_id);
    $stmt_ventas->execute();
    $result_ventas = $stmt_ventas->get_result();
    $ventas_ids = [];
    while ($row = $result_ventas->fetch_assoc()) {
        $ventas_ids[] = $row['id'];
    }
    $stmt_ventas->close();

    // Eliminar registros relacionados en la tabla detalle_ventas
    if (!empty($ventas_ids)) {
        $placeholders = implode(',', array_fill(0, count($ventas_ids), '?'));
        $sql_detalle_ventas = "DELETE FROM detalle_ventas WHERE venta_id IN ($placeholders)";
        $stmt_detalle_ventas = $conn->prepare($sql_detalle_ventas);
        $stmt_detalle_ventas->bind_param(str_repeat('i', count($ventas_ids)), ...$ventas_ids);
        $stmt_detalle_ventas->execute();
        $stmt_detalle_ventas->close();
    }

    // Eliminar registros relacionados en la tabla ventas
    $sql_ventas = "DELETE FROM ventas WHERE cliente_id = ?";
    $stmt_ventas = $conn->prepare($sql_ventas);
    $stmt_ventas->bind_param("i", $cliente_id);
    $stmt_ventas->execute();
    $stmt_ventas->close();

    // Eliminar cliente
    $sql_cliente = "DELETE FROM clientes WHERE id = ?";
    $stmt_cliente = $conn->prepare($sql_cliente);
    $stmt_cliente->bind_param("i", $cliente_id);
    $stmt_cliente->execute();
    $stmt_cliente->close();

    // Confirmar transacción
    $conn->commit();

    header("Location: clientes.php?message=Se eliminó correctamente&type=info");
} catch (Exception $e) {
    // Revertir transacción en caso de error
    $conn->rollback();
    header("Location: clientes.php?message=Error al eliminar&type=error");
}

// Cerrar conexión
$conn->close();
?>
