<?php
// Configuración de la base de datos
$host = 'localhost';  
$usuario = 'root';  
$password = '';  
$nombreBaseDatos = 'sistema_inventario';

// Ruta y nombre del archivo de respaldo
$nombreRespaldo = 'backup_' . date('Ymd_His') . '.sql';
$rutaRespaldo = __DIR__ . '/respaldos/' . $nombreRespaldo;

// Crear el directorio si no existe
if (!file_exists(__DIR__ . '/respaldos')) {
    mkdir(__DIR__ . '/respaldos', 0777, true);
}

// Ruta completa al ejecutable mysqldump (ajustar según tu instalación)
$mysqldumpPath = 'C:\xampp\mysql\bin\mysqldump.exe';

// Comando para realizar el respaldo
$comando = "$mysqldumpPath --host=$host --user=$usuario --password=$password $nombreBaseDatos > \"$rutaRespaldo\"";

// Ejecutar el comando
exec($comando, $salida, $resultado);

// Verificar si el respaldo se realizó correctamente
if ($resultado === 0) {
    $mensaje = "Respaldo realizado con éxito: $nombreRespaldo";
    $tipo = "success";
} else {
    $mensaje = "Error al realizar el respaldo. Código de error: $resultado. Salida del comando: " . implode("\n", $salida);
    $tipo = "error";
}

// Redirigir con mensaje
header("Location: editar_perfil.php?message=" . urlencode($mensaje) . "&type=" . urlencode($tipo));
exit();
?>
