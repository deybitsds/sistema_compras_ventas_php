<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mensajes Flotantes Mejorados</title>
    <link rel="stylesheet" href="notificacion.css">
</head>
<body>

<button onclick="showMessage('info', 'Este es un mensaje de información.')">Mostrar Información</button>
<button onclick="showMessage('warning', 'Este es un mensaje de advertencia.')">Mostrar Advertencia</button>
<button onclick="showMessage('error', 'Este es un mensaje de error.')">Mostrar Error</button>

<script src="notificacion.js"></script>
<?php
// Ejemplo de cómo podrías mostrar un mensaje desde el servidor
if (isset($_GET['message'])) {
    $message = htmlspecialchars($_GET['message']);
    $type = htmlspecialchars($_GET['type']);
    echo "<script>showMessage('$type', '$message');</script>";
}
?>

</body>
</html>
