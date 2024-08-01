<?php
include 'conexion.php';

$conexion = conexion();

if (isset($_POST['id'])) {
    $id = intval($_POST['id']); // Asegurarse de que el ID es un número entero
    $tipo_comprobante = $_POST['tipo_comprobante'];
    $nro_comprobante = $_POST['nro_comprobante'];
    $fecha_emision = $_POST['fecha_emision'];
    $proveedor_id = intval($_POST['proveedor_id']);

    // Preparar la sentencia SQL para actualizar la compra
    $sentencia = "UPDATE compras SET tipo_comprobante = ?, nro_comprobante = ?, fecha_emision = ?, proveedor_id = ? WHERE id = ?";
    $stmt = $conexion->prepare($sentencia);

    if ($stmt === false) {
        die('Error en la preparación de la consulta: ' . $conexion->error);
    }

    // Vincular los parámetros y ejecutar la sentencia
    $stmt->bind_param('ssssi', $tipo_comprobante, $nro_comprobante, $fecha_emision, $proveedor_id, $id);
    $resultado = $stmt->execute();

    if ($resultado) {
        // Si la actualización fue exitosa, redirigir a la página de compras con un mensaje de éxito
        header('Location: compras.php?mensaje=Compra actualizada correctamente');
    } else {
        // Mostrar un mensaje de error si no se pudo actualizar
        echo "Error al actualizar la compra: " . $stmt->error;
    }

    // Cerrar la sentencia y la conexión
    $stmt->close();
    $conexion->close();
} else {
    // Si no se proporciona un ID, redirigir a la página de compras con un mensaje de error
    header('Location: compras.php?mensaje=ID de compra no proporcionado');
}
?>