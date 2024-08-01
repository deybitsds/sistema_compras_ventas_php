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

// Comando para realizar el respaldo
$comando = "mysqldump --host=$host --user=$usuario --password=$password $nombreBaseDatos > $rutaRespaldo";

// Ejecutar el comando
exec($comando, $salida, $resultado);

// Verificar si el respaldo se realizó correctamente
if ($resultado === 0) {
    echo "Respaldo realizado con éxito: $nombreRespaldo";
} else {
    echo "Error al realizar el respaldo.";
}
?>
