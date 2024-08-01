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

// Procesar el formulario
$cliente_id = $_POST['cliente_id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$tipo_documento = $_POST['tipo_documento'];
$nro_documento = $_POST['nro_documento'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];

// Validar tipo_documento
$documentos_validos = ['DNI', 'Pasaporte', 'Otro'];
if (!in_array($tipo_documento, $documentos_validos)) {
    die('Tipo de documento inválido');
}

// Validar teléfono
if (!preg_match("/^\d{0,9}$/", $telefono)) {
    die('El teléfono solo puede contener números y tener una longitud máxima de 9.');
}

// Preparar y vincular
$sql = "UPDATE clientes SET nombre=?, apellido=?, tipo_documento=?, nro_documento=?, direccion=?, telefono=?, email=? WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssi", $nombre, $apellido, $tipo_documento, $nro_documento, $direccion, $telefono, $email, $cliente_id);

// Ejecutar
if ($stmt->execute()) {
    header("Location: editar_cliente.php?message=Registro actualizado exitosamente&type=info");
} else {
    header("Location: editar_cliente.php?message=Error al actualizar el registro&type=error");
}

// Cerrar conexión
$stmt->close();
$conn->close();
?>
