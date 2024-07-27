<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cliente_id = $_POST['cliente_id'];
    // Procesa la eliminación de la compra usando $cliente_id

    echo $cliente_id;

}
?>
