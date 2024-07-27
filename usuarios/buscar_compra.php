<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo = $_POST["codigo_buscado"]; // Recupera el valor del campo de búsqueda

    echo $codigo;
}

?>