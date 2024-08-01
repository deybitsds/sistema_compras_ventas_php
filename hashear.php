<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_inventario";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Seleccionar todos los usuarios
$result = $conn->query("SELECT id, username, password FROM usuarios");

while ($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $plain_password = $row['password'];
    // Generar el hash de la contraseña existente
    $hashed_password = password_hash($plain_password, PASSWORD_DEFAULT);

    // Actualizar la contraseña en la base de datos
    $stmt = $conn->prepare("UPDATE usuarios SET password = ? WHERE id = ?");
    $stmt->bind_param("si", $hashed_password, $id);
    $stmt->execute();
    $stmt->close();
}

echo "Todas las contraseñas han sido actualizadas";

$conn->close();
?>
