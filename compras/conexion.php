<?php
function conexion(){
    $mysql_conexion = new mysqli("localhost", "root", "", "sistema_inventario");
    if ($mysql_conexion->connect_errno){
        echo "ERROR DE CONEXION CON LA BASE DE DATOS: " . $mysql_conexion->connect_error;
        exit;
    }
    return $mysql_conexion;
}
?>
