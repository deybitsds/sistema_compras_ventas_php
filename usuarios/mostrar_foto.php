<?php
// Conectar a la base de datos
$conn = new mysqli("localhost", "root", "", "sistema_inventario");

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el id del usuario
$id = $_GET['id'];

// Preparar la declaración SQL
$sql = "SELECT foto FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

// Ejecutar la declaración
$stmt->execute();
$stmt->store_result();

// Verificar si se encontró el usuario
if ($stmt->num_rows > 0) {
    $stmt->bind_result($foto);
    $stmt->fetch();

    // Mostrar la foto
    header("Content-Type: image/jpeg");
    echo $foto;
} else {
    echo "No se encontró la foto.";
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>
