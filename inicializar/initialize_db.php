<?php
$servername = "localhost";
$username = "root";
$password = "";

// Crear conexión sin especificar la base de datos
$conn = new mysqli($servername, $username, $password);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Verificar si la base de datos ya existe
$db_check_query = "SHOW DATABASES LIKE 'sistema_inventario'";
$db_check_result = $conn->query($db_check_query);

if ($db_check_result && $db_check_result->num_rows > 0) {
    // La base de datos ya existe
    header("Location: login/login.php");
    exit();
} else {
    // Leer el archivo SQL
    $sql = file_get_contents('data_base.sql');

    if ($sql === false) {
        die("Error leyendo el archivo SQL");
    }

    // Ejecutar las consultas
    if ($conn->multi_query($sql)) {
        do {
            if ($result = $conn->store_result()) {
                $result->free();
            }
        } while ($conn->more_results() && $conn->next_result());
        // Redirigir después de la inicialización
        header("Location: hashear.php");
        exit();
    } else {
        echo "Error ejecutando el script SQL: " . $conn->error;
    }
}

$conn->close();
?>
