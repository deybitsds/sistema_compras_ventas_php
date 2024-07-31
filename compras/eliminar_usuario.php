<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $us_id = $_POST['usuario_id'];
    $us_username = $_POST['usuario_usna'];

    // Conectar a la base de datos
    $servername = "localhost";
    $username_db = "root";
    $password_db = "";
    $dbname = "sistema_inventario";

    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Preparar la consulta de inserción
    $sql = "DELETE FROM usuarios
    WHERE id = ?";

    $stmt = $conn->prepare($sql);

    // Enlazar los parámetros
    $stmt->bind_param("i", $us_id);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "<br>El usuario $us_username fue correctamente eliminado<br>";
        echo "<br><br><button onclick=\"window.location.href='usuarios.php';\">Regresar a Usuarios</button>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
    
}
?>