<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Tiendita de Don Pepe</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>

<body>
    <!-- Barra superior  -->
     <div class="xd">

         <nav class="nav-links">
     
             <!-- IZQUIERDA  -->
             <div class="nav-left">
                 <img src="amazon.png" alt="Decoración" class="imagen-1">
             </div>
     
             <!-- CENTRAL  -->
             <div class="nav-center">
                 <a href="index.html" class="nav-link">Inicio</a>
                 <a href="index.html" class="nav-link">Productos</a>
                 <a href="index.html" class="nav-link">Usuarios</a>
                 <a href="index.html" class="nav-link">Ventas</a>
                 <a href="index.html" class="nav-link">Clientes</a>
                 <a href="index.html" class="nav-link">Reportes</a>
             </div>
             
             <!-- DERECHA -->

                <a href="index.html" class="nav-link">
                    <img src="tornillo.png" alt="Icono" class="icono">
                </a>
        
                <a href="logout.html" class="nav-link btn-salir">Salir</a>

             
         </nav>


     </div>
     
     <hr class="custom-line">
     
     
     <!-- IZQUIERDA  -->

     <nav class="nav-links">

        <div class="label-productos">
            <img src="tienda.png" alt="Decoración" class="imagen-2">
            <span class="productos-texto">Productos</span>
        </div>
            

        <!-- DERECHA -->

        <div class="label-opciones">

            <button type="button" class="boton_add">
                <span class="boton_add__text">Agregar</span>
                <span class="boton_add__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>
            </button>

        </div>


    </nav>

        <hr class="custom-line2">


        <!-- barra busqueda -->
        <div class="group">
            <svg class="icon" aria-hidden="true" viewBox="0 0 24 24"><g><path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path></g></svg>
            <input placeholder="Search" type="search" class="input">
            
        </div>

    <!-- PHP Script -->
    <?php
        $a = 8;
        $b = 3;
        echo "Valor de a: ", $a, " y el valor de b: ", $b, "<br>";
        if ($a < $b) {
            echo "$a es menor que $b";
        } else {
            echo "$a no es menor que $b";
        }
    ?>
</body>
</html>