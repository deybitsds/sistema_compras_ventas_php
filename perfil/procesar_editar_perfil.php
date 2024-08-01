<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_inventario";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

// Validar teléfono
if (!preg_match("/^\d{0,15}$/", $telefono)) {
    die('El teléfono solo puede contener números y tener una longitud máxima de 15.');
}

// Preparar y vincular
$sql = "UPDATE usuarios SET direccion=?, telefono=?, email=?, username=?, password=? WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssi", $direccion, $telefono, $email, $username, $password, $user_id);

// Ejecutar
if ($stmt->execute()) {
    // Actualizar los datos en la sesión
    $_SESSION['direccion'] = $direccion;
    $_SESSION['telefono'] = $telefono;
    $_SESSION['email'] = $email;
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;

    header("Location: editar_perfil.php?message=Perfil actualizado exitosamente&type=info");
} else {
    header("Location: editar_perfil.php?message=Error al actualizar el Perfil&type=error");
}

$stmt->close();
$conn->close();
?>
