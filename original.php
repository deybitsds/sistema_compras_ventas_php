<?php

// function obtenerClientes(){
//     $sentencia = "SELECT * FROM clientes";
//     return select($sentencia);
// }

// $clientes = obtenerClientes();


// Prueba: Añadir elementos del 1 al 36 en la tabla
$arreglo = [];
$contador = 1;
$filas = 6;

for ($i = 0; $i < $filas; $i++) {
    $subarreglo = [];
    for ($j = 0; $j < 6; $j++) {
        $subarreglo[] = $contador;
        $contador++;
    }
    $arreglo[] = $subarreglo;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Tiendita de Don Pepe</title>
    
    <!-- importar css -->
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <!-- importar css -->

    <!-- importar fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Enriqueta:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Enriqueta:wght@400;500;600;700&family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- importar fuentes -->
</head>

<body>
    <!-- Barra superior  -->
     <div class="marco-superior">

         <nav class="nav-links">
     
             <!-- IZQUIERDA  -->
             <div class="nav-left">


                <svg viewBox="11.752 -158.846 797.655 797.655" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M271 418.843h-32.635v-129.33H271v129.33z" fill="#ffffff"></path> <g transform="matrix(10.33728 0 0 -10.33728 -861.345 7843.84)"> <defs> <path id="a" d="M84.461 713.596h77.163v43.961H84.461v-43.961z"></path> </defs> <clipPath id="b"> <use xlink:href="#a" overflow="visible"></use> </clipPath> <g clip-path="url(#b)"> <path d="M134.996 727.2c-.13.066-1.146.668-2.656.668-2.041 0-3.457-1.42-3.457-3.337 0-1.859 1.355-3.34 3.457-3.34 1.484 0 2.517.59 2.656.664v-3.358c-.396-.11-1.475-.445-2.877-.445-3.551 0-6.668 2.448-6.668 6.48 0 3.735 2.82 6.475 6.668 6.475 1.48 0 2.578-.36 2.877-.449V727.2zM102.043 727.2c-.127.066-1.142.668-2.652.668-2.045 0-3.46-1.42-3.46-3.337 0-1.859 1.356-3.34 3.46-3.34 1.484 0 2.516.59 2.652.664v-3.358c-.392-.11-1.47-.445-2.88-.445-3.548 0-6.661 2.448-6.661 6.48 0 3.735 2.82 6.475 6.662 6.475 1.486 0 2.582-.36 2.879-.449V727.2zM144.927 727.821c-1.873 0-3.264-1.474-3.264-3.29 0-1.82 1.391-3.293 3.264-3.293 1.871 0 3.266 1.473 3.266 3.293 0 1.816-1.395 3.29-3.266 3.29m6.611-3.29c0-3.579-2.763-6.479-6.61-6.479-3.849 0-6.608 2.9-6.608 6.48 0 3.572 2.76 6.475 6.607 6.475 3.848 0 6.611-2.903 6.611-6.476M121.512 727.941c-.047.015-1.376.382-2.468.382-1.265 0-1.953-.424-1.953-1.025 0-.762.928-1.028 1.447-1.192l.871-.277c2.05-.652 2.983-2.055 2.983-3.579 0-3.143-2.764-4.199-5.18-4.199-1.679 0-3.252.31-3.407.342v2.88c.278-.07 1.602-.466 2.981-.466 1.571 0 2.293.46 2.293 1.168 0 .634-.625 1-1.408 1.246-.19.064-.478.154-.674.218-1.758.556-3.224 1.59-3.224 3.66 0 2.34 1.752 3.911 4.662 3.911 1.537 0 2.983-.373 3.077-.398v-2.67z" fill="#ffffff"></path> <path d="M89.154 744.23c0 .862-.704 1.561-1.567 1.561s-1.568-.699-1.568-1.56v-3.285a1.568 1.568 0 0 1 3.135 0v3.284zM97.763 748.54a1.567 1.567 0 0 1-3.135 0v-7.594a1.567 1.567 0 0 1 3.135 0v7.595zM106.373 754.438c0 .862-.704 1.562-1.567 1.562-.864 0-1.568-.7-1.568-1.562v-16.613a1.568 1.568 0 0 1 3.135 0v16.613zM114.982 748.54a1.567 1.567 0 0 1-3.135 0v-7.594a1.567 1.567 0 0 1 3.135 0v7.595zM123.582 744.23a1.56 1.56 0 0 1-1.558 1.561 1.566 1.566 0 0 1-1.567-1.56v-3.285a1.562 1.562 0 1 1 3.125 0v3.284zM132.195 748.54a1.563 1.563 0 0 1-3.125 0v-7.594a1.562 1.562 0 1 1 3.125 0v7.595zM140.81 754.438a1.562 1.562 0 0 1-3.125 0v-16.613a1.564 1.564 0 1 1 3.125 0v16.613zM149.423 748.54c0 .863-.699 1.564-1.582 1.564a1.563 1.563 0 0 1-1.562-1.563v-7.595c0-.867.7-1.566 1.562-1.566.883 0 1.582.699 1.582 1.566v7.595zM158.02 744.23a1.563 1.563 0 0 1-3.128 0v-3.284c0-.867.701-1.567 1.564-1.567.862 0 1.563.7 1.563 1.567v3.284z" fill="#6cd389"></path> <path d="M156.213 719.922v-.196h-.558v-1.451h-.23v1.45h-.56v.197h1.348zM156.33 719.922h.359l.493-1.351h.008l.477 1.35h.352v-1.646h-.235v1.35h-.008l-.5-1.35h-.217l-.488 1.35h-.011v-1.35h-.23v1.647z" fill="#ffffff"></path> </g> </g> </g></svg>

                 <!-- <img src="imgs_toolbar/amazon.png" alt="Decoración" class="imagen-1"> -->
             </div>
             <!-- IZQUIERDA  -->
     
             <!-- CENTRAL  -->
             <div class="nav-center">
                 <a href="../home/home.php" class="nav-link">Inicio</a>
                 <a href="../compras/compras.php" class="nav-link actual">Compras</a>
                 <a href="../ventas/ventas.php" class="nav-link">Ventas</a>
                 <a href="../usuarios/usuarios.php" class="nav-link">Usuarios</a>
                 <a href="../clientes/clientes/.php" class="nav-link">Clientes</a>
                 <a href="../productos/productos.php" class="nav-link">Productos</a>
                 <a href="../reportes/reportes.php" class="nav-link">Reportes</a>
             </div>
             <!-- CENTRAL  -->
             
             <!-- DERECHA -->
                <!-- CONFIGURACION -->
                <a href="../editar_perfil/editar_perfil.php" class="nav-link-icono">
                    <img src="imgs_toolbar/tornillo.png" alt="Icono" class="icono_tornillo">
                </a>
                <!-- CONFIGURACION -->
        
                <!-- SALIR -->
                <a href="../login/login.php" class="icono_salir">
                    <button class="boton_salir"></button>
                </a>
                <!-- SALIR -->
             <!-- DERECHA -->
             
         </nav>
     </div>

    <!-- Linea recta 1 -->
     <hr class="custom-line">
    <!-- Linea recta -->



    <div class="marco_inferior">

    <!-- Titulo Productos -->
     <nav class="nav-links">
        <div class="label-productos">
            <!-- icono -->
            <img src="compras/imgs/tienda.png" alt="Decoración" class="imagen-2">
            <!-- icono -->
            
            <!-- titulo -->
            <span class="productos-texto">Compras</span>
            <!-- titulo -->
        </div>
    <!-- Titulo Productos -->

        <!-- boton agregar -->
        <div class="label-opciones">
            <a href ="registrar_compra.php" class = "nav-link-icono">
            <button type="button" class="boton_add">
                <span class="boton_add__text">Agregar</span>
                <span class="boton_add__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>
            </button>
            </a>
        </div>
        <!-- boton agregar -->


    </nav>
        <!-- linea recta 2 -->
        <hr class="custom-line2">
        <!-- linea recta 2 -->


        <!-- barra busqueda -->
        <form action="buscar_compra.php" method="post" class="input-group mb-3 mt-3">

        <div class="group_search">
        <svg viewBox="0 0 24 24" aria-hidden="true" class="icon_search">
          <g>
            <path
              d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"
            ></path>
          </g>
        </svg>
        <input class="input_search" type="search" name="codigo_buscado" placeholder="Ingrese código de barra" />
        </div>
    
        </form>
        <!-- barra busqueda -->

        <!-- tabla -->
        <div class="marco_tabla">

        <table class="tabla_productos">
            <thead class=encabezado_tabla>
                <tr>
                    <th class="item_tabla enc">Código</th>
                    <th class="item_tabla enc descripcion">Descripción</th>
                    <th class="item_tabla enc">Precio compra</th>
                    <th class="item_tabla enc">Precio venta</th>
                    <th class="item_tabla enc">Stock</th>
                    <th class="item_tabla enc">Acciones</th>
                </tr>
            </thead>
    
            <tbody>
                <?php
                // Iterar sobre cada cliente del array $clientes
                foreach($arreglo as $elemento){
                ?>
                    <tr>
                        <!-- Mostrando los atributos del cliente con clases CSS para el estilo -->
                        <td class="item_tabla body"><?php echo $elemento[0]; ?></td>
                        <td class="item_tabla body"><?php echo $elemento[1]; ?></td>
                        <td class="item_tabla body"><?php echo $elemento[2]; ?></td>
                        <td class="item_tabla body"><?php echo $elemento[3]; ?></td>
                        <td class="item_tabla body"><?php echo $elemento[4]; ?></td>
    
                        <td class="item_tabla body accion">
                        
                        
                        <div class="botones_accion">

                            <a href="index.html" class="icono_borrar">
                                <button class="boton_editar">
                                    <svg width="20px" height="20px" viewBox="0 -0.5 21 21" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="white" transform="rotate(0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.63"></g><g id="SVGRepo_iconCarrier"> <title>edit [#1479]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-99.000000, -400.000000)" fill="#000000"> <g id="icons" transform="translate(56.000000, 160.000000)"> 
                                    <path fill="white"d="M61.9,258.010643 L45.1,258.010643 L45.1,242.095788 L53.5,242.095788 L53.5,240.106431 L43,240.106431 L43,260 L64,260 L64,250.053215 L61.9,250.053215 L61.9,258.010643 Z M49.3,249.949769 L59.63095,240 L64,244.114985 L53.3341,254.031929 L49.3,254.031929 L49.3,249.949769 Z" id="edit-[#1479]"> </path> </g> </g> </g> </g></svg>
                                    <p class="text">Editar</p>
                                </button>      
                            </a>
    
                            
                            <a href="index.html" class="icono_borrar">
                                <button class="boton_borrar">
                                    <p class="text">Borrar</p>
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 30 30">
                                    <path fill="white" d="M 13 3 A 1.0001 1.0001 0 0 0 11.986328 4 L 6 4 A 1.0001 1.0001 0 1 0 6 6 L 24 6 A 1.0001 1.0001 0 1 0 24 4 L 18.013672 4 A 1.0001 1.0001 0 0 0 17 3 L 13 3 z M 6 8 L 6 24 C 6 25.105 6.895 26 8 26 L 22 26 C 23.105 26 24 25.105 24 24 L 24 8 L 6 8 z"></path>
                                    </svg>
                                </button>     
                            </a>

                        </div>

                        </td>


                    </tr>
                
                <?php
                }
                ?>
            </tbody>


            </table>

        </div>

        <!-- tabla -->

    </div>


</body>
</html>