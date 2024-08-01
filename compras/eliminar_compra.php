<?php
// Incluir conexión a la base de datos
include 'conexion.php';

$conexion = conexion();

// Verificar si se ha enviado el ID
if (isset($_POST['id'])) {
    $id = intval($_POST['id']); // Asegurarse de que el ID es un número entero

    // Iniciar una transacción
    $conexion->begin_transaction();

    try {
        // Preparar la sentencia SQL para eliminar detalles de la compra
        $sentenciaDetalles = "DELETE FROM detalle_compras WHERE compra_id = ?";
        $stmtDetalles = $conexion->prepare($sentenciaDetalles);
        if ($stmtDetalles === false) {
            throw new Exception('Error en la preparación de la consulta de detalles: ' . $conexion->error);
        }
        $stmtDetalles->bind_param('i', $id);
        $stmtDetalles->execute();
        $stmtDetalles->close();

        // Preparar la sentencia SQL para eliminar la compra
        $sentenciaCompra = "DELETE FROM compras WHERE id = ?";
        $stmtCompra = $conexion->prepare($sentenciaCompra);
        if ($stmtCompra === false) {
            throw new Exception('Error en la preparación de la consulta de compra: ' . $conexion->error);
        }
        $stmtCompra->bind_param('i', $id);
        $stmtCompra->execute();
        $stmtCompra->close();

        // Si todo está bien, confirmar la transacción
        $conexion->commit();
        header('Location: compras.php?mensaje=Compra y detalles eliminados correctamente');
    } catch (Exception $e) {
        // Si ocurre un error, revertir la transacción
        $conexion->rollback();
        header('Location: compras.php?mensaje=Error al eliminar la compra: ' . $e->getMessage());
    }

    // Cerrar la conexión
    $conexion->close();
} else {
    // Si no se proporciona un ID, redirigir a la página de compras con un mensaje de error
    header('Location: compras.php?mensaje=ID de compra no proporcionado');
}
?>