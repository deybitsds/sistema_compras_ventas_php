<?php

// function obtenerClientes(){
//     $sentencia = "SELECT * FROM clientes";
//     return select($sentencia);
// }

// $clientes = obtenerClientes();


// Inicializar el arreglo principal
$arreglo = [];

// Llenar el arreglo con números del 1 al 36
$contador = 1;

$filas = 6;

for ($i = 0; $i < $filas; $i++) {
    // Crear un subarreglo para cada fila
    $subarreglo = [];
    for ($j = 0; $j < 6; $j++) {
        // Añadir el número actual al subarreglo
        $subarreglo[] = $contador;
        // Incrementar el contador para el siguiente número
        $contador++;
    }
    // Añadir el subarreglo al arreglo principal
    $arreglo[] = $subarreglo;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Tiendita de Don Pepe</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Enriqueta:wght@400;500;600;700&display=swap" rel="stylesheet">
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

                
                <a href="index.html" class="nav-link-icono">
                    <img src="tornillo.png" alt="Icono" class="icono_tornillo">
                </a>
        


                <a href="logout.html" class="icono_salir">
                    <button class="boton_salir"></button>
                </a>

             
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

        <!-- boton add -->
        <div class="label-opciones">
            <a href ="index.html" class = "nav-link-icono">
            <button type="button" class="boton_add">
                <span class="boton_add__text">Agregar</span>
                <span class="boton_add__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>
            </button>
            </a>
        </div>
        <!-- boton add -->


    </nav>

        <!-- linea horizontal 2 -->
        <hr class="custom-line2">
        <!-- linea horizontal 2 -->


        <!-- barra busqueda -->
        <form action="correcto.php" method="post" class="input-group mb-3 mt-3">

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


</body>
</html>