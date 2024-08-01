<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nro_documento = $_POST["codigo_buscado"];

    // Datos de la conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sistema_inventario";

    // Conectar con la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Preparar y ejecutar la consulta
    $sql = "SELECT * FROM clientes WHERE nro_documento = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nro_documento);
    $stmt->execute();
    $result = $stmt->get_result();

    // Almacenar los resultados en un arreglo
    $arreglo_clientes = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $arreglo_clientes[] = $row;
        }
    }

    $stmt->close();
    $conn->close();

    // Redirigir a clientes.php con los resultados de la búsqueda
    session_start();
    $_SESSION['resultados_busqueda'] = $arreglo_clientes;
    header("Location: clientes.php");
    exit();
}
?>
