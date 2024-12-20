<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_inventario";

try {
    // Crear una conexión a la base de datos
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Establecer el modo de error de PDO a excepción
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Consulta SQL para obtener los datos de la tabla usuarios
    $stmt = $conn->prepare("SELECT * FROM productos");
    $stmt->execute();
    
    // Establecer el modo de obtención a un arreglo asociativo
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    
    // Almacenar los resultados en un arreglo
    $productos = $stmt->fetchAll();
    
    
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Cerrar la conexión
$conn = null;
$contador = 0;

$estado = "productos";
include('../header/header.php'); 
?>

<link rel="stylesheet" type="text/css" href="estilo.css">

    <!-- marco inferior -->
    <div class="marco_inferior">

    <!-- Titulo Portal -->
    <nav class="nav-links">

        <!-- icono + titulo  -->
        <div class="label-productos">
                <!-- icono -->
                <div class="imagen-2">
                <svg viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title></title> <g fill="none" fill-rule="evenodd" id="页面-1" stroke="none" stroke-width="1"> <g id="导航图标" transform="translate(-325.000000, -80.000000)"> <g id="编组" transform="translate(325.000000, 80.000000)"> <polygon fill="#FFFFFF" fill-opacity="0.01" fill-rule="nonzero" id="路径" points="24 0 0 0 0 24 24 24"></polygon> <polygon id="路径" points="22 7 12 2 2 7 2 17 12 22 22 17" stroke="#ffffff" stroke-linejoin="round" stroke-width="1.5"></polygon> <line id="路径" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" x1="2" x2="12" y1="7" y2="12"></line> <line id="路径" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" x1="12" x2="12" y1="22" y2="12"></line> <line id="路径" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" x1="22" x2="12" y1="7" y2="12"></line> <line id="路径" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" x1="17" x2="7" y1="4.5" y2="9.5"></line> </g> </g> </g> </g></svg>                </div>
                <!-- icono -->
                
                <!-- titulo -->
                <span class="productos-texto">Productos</span>
                <!-- titulo -->

        </div>
        <!-- icono + titulo  -->

        <!-- boton agregar -->
        <div class="label-opciones">
            <a href="registrar_nada.php" class="nav-link-icono">
                <button type="button" class="boton_add">
                    <span class="boton_add__text">Agregar</span>
                    <span class="boton_add__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg">
                            <line y2="19" y1="5" x2="12" x1="12"></line>
                            <line y2="12" y1="12" x2="19" x1="5"></line>
                        </svg>
                    </span>
                </button>
            </a>
        </div>
        <!-- boton agregar -->
    </nav>
    <!-- Titulo Portal -->

    <!-- linea recta 2 -->
    <hr class="custom-line2">
    <!-- linea recta 2 -->


    <!-- barra busqueda -->
    <form action="buscar_compra.php" method="post" class="input-group mb-3 mt-3">

        <!-- clase barra busqueda -->
        <div class="group_search">
        <svg viewBox="0 0 21 21" aria-hidden="true" class="icon_search">
          <g>
            <path
              d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"
            ></path>
          </g>
        </svg>
        <input class="input_search" type="search" name="codigo_buscado" placeholder="Ingrese código de barra" />
        </div>
        <!-- clase barra busqueda -->
    </form>
    <!-- barra busqueda -->


    <!-- marco de la tabla -->
    <div class="marco_tabla">

        <!-- tabla -->
        <table class="tabla_productos">

            <!-- encabezado de la tabla -->
            <thead class=encabezado_tabla>
                <tr>
                    <th class="item_tabla enc">Nro</th>
                    <th class="item_tabla enc">Descripción</th>
                    <th class="item_tabla enc">Marca</th>
                    <th class="item_tabla enc">Modelo</th>
                    <th class="item_tabla enc">Stock Inicial</th>
                    <th class="item_tabla enc">Stock Actual</th>
                    <th class="item_tabla enc">Acciones</th>
                </tr>
            </thead>
            <!-- encabezado de la tabla -->
    
            <!-- cuerpo de la tabla -->
            <tbody>
                <?php
                // Iterar sobre cada cliente del array $clientes (recuperado al inicio)
                // foreach($arreglo_clientes as $cliente)
                foreach($productos as $producto){
                    $contador = $contador + 1;
                ?>
                    <tr>
                        <!-- Mostrando los atributos del cliente con clases CSS para el estilo -->

                        <!-- (modificar esto) -->
                        <td class="item_tabla body"><?php echo $contador; ?></td>
                        <td class="item_tabla body"><?php echo $producto['descripcion']; ?></td>
                        <td class="item_tabla body"><?php echo $producto['marca']; ?></td>
                        <td class="item_tabla body"><?php echo $producto['modelo']; ?></td>
                        <td class="item_tabla body"><?php echo $producto['stock_inicial']; ?></td>
                        <td class="item_tabla body"><?php echo $producto['stock_actual']; ?></td>
                        
                        <!-- modificar lo anterior para parecerse a esto -->
                        

                        <!-- BOTONES DE ACCION -->
                        <td class="item_tabla body accion">

                            <!-- MARCO BOTONES ACCION -->
                            <div class="botones_accion">

                                <!-- BOTON EDITAR -->
                                <form action="editar_nada.php" method="post" class="icono_accion">

                                    <!-- indicar el identificador del objeto -->
                                    <input type="hidden" name="usuario_id" value="<?php echo $usuario['id']; ?>">
                                    <input type="hidden" name="usuario_usna" value="<?php echo $usuario['username']; ?>">
                                    <input type="hidden" name="usuario_nombre" value="<?php echo $usuario['nombre']; ?>">
                                    <input type="hidden" name="usuario_apellido" value="<?php echo $usuario['apellido']; ?>">
                                    <input type="hidden" name="usuario_tipo_documento" value="<?php echo $usuario['tipo_documento']; ?>">
                                    <input type="hidden" name="usuario_nro_documento" value="<?php echo $usuario['nro_documento']; ?>">
                                    <input type="hidden" name="usuario_direccion" value="<?php echo $usuario['direccion']; ?>">
                                    <input type="hidden" name="usuario_telefono" value="<?php echo $usuario['telefono']; ?>">
                                    <input type="hidden" name="usuario_email" value="<?php echo $usuario['email']; ?>">
                                    <!-- indicar el identificador del objeto -->

                                        <button type="submit" class="boton_editar">
                                            <p class="text">Editar</p>
                                            <svg width="20px" height="20px" viewBox="0 -0.5 21 21" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="white" transform="rotate(0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.63"></g><g id="SVGRepo_iconCarrier"> <title>edit [#1479]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-99.000000, -400.000000)" fill="#000000"> <g id="icons" transform="translate(56.000000, 160.000000)"> 
                                            <path fill="#17181c"d="M61.9,258.010643 L45.1,258.010643 L45.1,242.095788 L53.5,242.095788 L53.5,240.106431 L43,240.106431 L43,260 L64,260 L64,250.053215 L61.9,250.053215 L61.9,258.010643 Z M49.3,249.949769 L59.63095,240 L64,244.114985 L53.3341,254.031929 L49.3,254.031929 L49.3,249.949769 Z" id="edit-[#1479]"> </path> </g> </g> </g> </g></svg>
                                        </button>      
                                
                                </form>
                                <!-- BOTON EDITAR -->
        
                                <!-- BOTON BORRAR -->
                                <form action="eliminar_nada.php" method="post" class="icono_accion">

                                    <!-- indicar el identificador del objeto -->
                                    <input type="hidden" name="usuario_id" value="<?php echo $usuario['id']; ?>">
                                    <input type="hidden" name="usuario_usna" value="<?php echo $usuario['username']; ?>">
                                    <!-- indicar el identificador del objeto -->

                                        <button type="submit" class="boton_borrar">
                                            <p class="text">Borrar</p>
                                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 30 30">
                                            <path fill="white" d="M 13 3 A 1.0001 1.0001 0 0 0 11.986328 4 L 6 4 A 1.0001 1.0001 0 1 0 6 6 L 24 6 A 1.0001 1.0001 0 1 0 24 4 L 18.013672 4 A 1.0001 1.0001 0 0 0 17 3 L 13 3 z M 6 8 L 6 24 C 6 25.105 6.895 26 8 26 L 22 26 C 23.105 26 24 25.105 24 24 L 24 8 L 6 8 z"></path>
                                            </svg>
                                        </button>  

                                </form>
                                <!-- BOTON EDITAR -->

                            </div>
                            <!-- MARCO BOTONES ACCION -->
                        </td>
                        <!-- BOTONES DE ACCION -->

                    </tr>
                
                <?php
                }
                ?>
            </tbody>
            <!-- cuerpo de la tabla -->


            </table>
            <!-- tabla -->

        </div>
        <!-- marco de la tabla -->

    </div>
    <!-- marco inferior -->


</body>
</html>