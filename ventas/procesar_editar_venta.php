<?php
include 'conexion.php';

$conexion = conexion();

if (isset($_POST['id'])) {
    $id = intval($_POST['id']); // Asegurarse de que el ID es un número entero
    $tipo_comprobante = $_POST['tipo_comprobante'];
    $nro_comprobante = $_POST['nro_comprobante'];
    $fecha_emision = $_POST['fecha_emision'];
    $cliente_id = intval($_POST['cliente_id']);
    $empleado_id = intval($_POST['empleado_id']);

    // Preparar la sentencia SQL para actualizar la venta
    $sentencia = "UPDATE ventas SET tipo_comprobante = ?, nro_comprobante = ?, fecha_emision = ?, cliente_id = ?, empleado_id = ? WHERE id = ?";
    $stmt = $conexion->prepare($sentencia);

    if ($stmt === false) {
        die('Error en la preparación de la consulta: ' . $conexion->error);
    }

    // Vincular los parámetros y ejecutar la sentencia
    $stmt->bind_param('sssssi', $tipo_comprobante, $nro_comprobante, $fecha_emision, $cliente_id, $empleado_id, $id);
    $resultado = $stmt->execute();

    if ($resultado) {
        // Si la actualización fue exitosa, redirigir a la página de ventass con un mensaje de éxito
        header('Location: ventas.php?mensaje=Venta actualizada correctamente');
    } else {
        // Mostrar un mensaje de error si no se pudo actualizar
        echo "Error al actualizar la venta: " . $stmt->error;
    }

    // Cerrar la sentencia y la conexión
    $stmt->close();
    $conexion->close();
} else {
    // Si no se proporciona un ID, redirigir a la página de ventas con un mensaje de error
    header('Location: ventas.php?mensaje=ID de venta no proporcionado');
}
?>