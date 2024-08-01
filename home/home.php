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
 
<?php include('footer.php'); ?>
