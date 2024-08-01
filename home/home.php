<?php 

$estado = "home";
include('../header/header.php'); 

?>

<link rel="stylesheet" type="text/css" href="stylesGeneral.css">


<div class="marco_letras">

<!-- icono + titulo  -->
<div class="label-productos">
        
        <!-- titulo -->
        <span class="productos-texto">Bienvenido, <?php echo htmlspecialchars($nombre) . ' ' . htmlspecialchars($apellido); ?></span>
        <!-- titulo -->

</div>
<!-- icono + titulo  -->
<!-- Titulo Portal -->
</div>

<!-- linea recta 2 -->
<hr class="custom-line2">
<!-- linea recta 2 -->
 

<div class="imagen_home">

<img src="img/login.jpg" width="1100" height="600" alt="Descripción de la imagen">

</div>

<?php include('footer.php'); ?>
