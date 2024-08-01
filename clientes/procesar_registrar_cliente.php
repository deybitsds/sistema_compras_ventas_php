<?php
// Procesar el formulario

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

// Validar nro_documento solo contiene números
if (!ctype_digit($nro_documento)) {
    die('El número de documento solo puede contener números');
}

// Validar teléfono solo contiene números
if (!ctype_digit($telefono)) {
    die('El teléfono solo puede contener números');
}

// Validar email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die('Email inválido');
}

// Conectar a la base de datos
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "sistema_inventario";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Preparar la sentencia SQL para insertar los datos
$stmt = $conn->prepare("INSERT INTO clientes (nombre, apellido, tipo_documento, nro_documento, direccion, telefono, email) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $nombre, $apellido, $tipo_documento, $nro_documento, $direccion, $telefono, $email);
// Ejecutar la consulta
if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Registro insertado correctamente']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Error: ' . $stmt->error]);
}

// Cerrar la conexión
$stmt->close();
$conn->close();

// Mostrar los datos ingresados
echo "Nombre: $nombre<br>";
echo "Apellido: $apellido<br>";
echo "Tipo de Documento: $tipo_documento<br>";
echo "Numero de documento: $nro_documento<br>";
echo "Direccion: $direccion<br>";
echo "Teléfono: $telefono<br>";
echo "Email: $email<br>";
?>
