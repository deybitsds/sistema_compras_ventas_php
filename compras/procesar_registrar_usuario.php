<?php
// Recuperar los datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$sexo = $_POST['sexo'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$tipo_documento = $_POST['tipo_documento'];
$nro_documento = $_POST['nro_documento'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$estado = $_POST['estado'];
$username = $_POST['username'];
$password = $_POST['password'];
$tipo_usuario = $_POST['tipo_usuario'];

// Procesar la foto
if(isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
    $foto = file_get_contents($_FILES['foto']['tmp_name']);
} else {
    echo "Error al subir la foto.";
    exit;
}

// Validar los datos
if (!preg_match("/^[a-zA-Z ]+$/", $nombre)) {
    echo "El nombre solo puede contener letras y espacios.";
    exit;
}
if (!preg_match("/^[a-zA-Z ]+$/", $apellido)) {
    echo "El apellido solo puede contener letras y espacios.";
    exit;
}
if (!preg_match("/^[a-zA-Z0-9]+$/", $nro_documento)) {
    echo "El número de documento solo puede contener letras y números.";
    exit;
}
if (!preg_match("/^[0-9]+$/", $telefono)) {
    echo "El teléfono solo puede contener números.";
    exit;
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "El email no es válido.";
    exit;
}
if (!preg_match("/^[a-zA-Z0-9]+$/", $username)) {
    echo "El username solo puede contener letras y números.";
    exit;
}

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
$sql = "INSERT INTO usuarios (nombre, apellido, sexo, fecha_nacimiento, tipo_documento, nro_documento, foto, direccion, telefono, email, estado, username, password, tipo_usuario) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

// Enlazar los parámetros
$stmt->bind_param("ssssssssssssss", $nombre, $apellido, $sexo, $fecha_nacimiento, $tipo_documento, $nro_documento, $foto, $direccion, $telefono, $email, $estado, $username, $password, $tipo_usuario);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Usuario registrado con éxito.";
    // Mostrar los datos ingresados
    echo "<br>Nombre: $nombre<br>";
    echo "Apellido: $apellido<br>";
    echo "Sexo: $sexo<br>";
    echo "Fecha de Nacimiento: $fecha_nacimiento<br>";
    echo "Tipo de Documento: $tipo_documento<br>";
    echo "Número de Documento: $nro_documento<br>";
    echo "Dirección: $direccion<br>";
    echo "Teléfono: $telefono<br>";
    echo "Email: $email<br>";
    echo "Estado: $estado<br>";
    echo "Username: $username<br>";
    echo "Tipo de Usuario: $tipo_usuario<br>";
    echo "<br><a href='mostrar_foto.php?id=" . $conn->insert_id . "'>Mostrar Foto</a>";
    echo "<br><br><button onclick=\"window.location.href='usuarios.php';\">Regresar a Usuarios</button>";
} else {
    echo "Error: " . $stmt->error;
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>

