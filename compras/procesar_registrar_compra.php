<?php
// Recuperar los datos del formulario
$codigo = $_POST['codigo'];
$descripcion = $_POST['descripcion'];
$precio_compra = $_POST['precio_compra'];
$precio_venta = $_POST['precio_venta'];
$stock = $_POST['stock'];

// Convertir los valores a números flotantes donde sea necesario
$precio_compra = floatval($precio_compra);
$precio_venta = floatval($precio_venta);
$stock = intval($stock);

// Validar que la descripción solo contenga letras
if (!preg_match("/^[a-zA-Z]+$/", $descripcion)) {
    echo "La descripción solo puede contener letras.";
    exit;
}

// Mostrar los datos ingresados
echo "Código: $codigo<br>";
echo "Descripción: $descripcion<br>";
echo "Precio de Compra: $precio_compra<br>";
echo "Precio de Venta: $precio_venta<br>";
echo "Stock: $stock<br>";
?>
