<?php
// Datos de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_inventario";
// conectar con db
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$estado = "clientes";
include('../header/header.php'); 


$sql = "SELECT * FROM clientes";
$result = $conn->query($sql);

$arreglo_clientes = [];

session_start();
if (isset($_SESSION['resultados_busqueda'])) {
    $arreglo_clientes = $_SESSION['resultados_busqueda'];
    unset($_SESSION['resultados_busqueda']);
} else {
    $sql = "SELECT * FROM clientes";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $arreglo_clientes[] = $row;
        }
    } else {
        echo "0 resultados";
    }
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Tiendita de Don Pepe</title>
    
    <!-- importar css -->
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <link rel="stylesheet" type="text/css" href="notificacion.css">
    <!-- importar css -->

    <!-- importar fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Enriqueta:wght@400;500;600;700&family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Mukta:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- importar fuentes -->

</head>

<body>
    <!-- marco superior  -->
     <!-- <div class="marco-superior"> -->
     <script src="notificacion.js"></script>
     <script>
        <?php
        if (isset($_GET['message']) && isset($_GET['type'])) {
            $message = htmlspecialchars($_GET['message']);
            $type = htmlspecialchars($_GET['type']);
            echo "showMessage('$type', '$message');";
        }
        ?>
    </script>


    <!-- marco superior  -->


    <!-- marco inferior -->
    <div class="marco_inferior">

    <!-- Titulo Portal -->
    <nav class="nav-links">

        <!-- icono + titulo  -->
        <div class="label-productos">
                <!-- icono -->
                <div class="imagen-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#ffffff" width="60px" height="60px">
    <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5s-2.99 1.34-2.99 3S14.34 11 16 11zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5 5.01 6.34 5.01 8 6.34 11 8 11zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4zm8 0c-.29 0-.62.02-.97.05.74.54 1.37 1.24 1.87 2H24v-2c0-2.66-5.33-4-8-4z"/>
</svg>

                </div>
                <!-- icono -->
                
                <!-- titulo -->
                <span class="productos-texto">Clientes</span>
                <!-- titulo -->

        </div>
        <!-- icono + titulo  -->

        <!-- boton agregar -->
        <div class="label-opciones">
            <a href ="registrar_cliente.php" class = "nav-link-icono">
                <button type="button" class="boton_add">
                    <span class="boton_add__text">Agregar</span>
                    <span class="boton_add__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>
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
    <form action="buscar_cliente.php" method="post" class="input-group mb-3 mt-3">

        <!-- clase barra busqueda -->
        <div class="group_search">
        <svg viewBox="0 0 21 21" aria-hidden="true" class="icon_search">
          <g>
            <path
              d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"
            ></path>
          </g>
        </svg>
        <input class="input_search" type="search" name="codigo_buscado" placeholder="Ingrese Nro_documento del cliente" />
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
                    <th class="item_tabla enc descripcion">Nombre</th>
                    <th class="item_tabla enc">Apellido</th>
                    <th class="item_tabla enc">Tipo_Documento</th>
                    <th class="item_tabla enc">Nro_Documento</th>
                    <th class="item_tabla enc">Direccion</th>
                    <th class="item_tabla enc">Teléfono</th>
                    <th class="item_tabla enc">Email</th>
                    <th class="item_tabla enc">Acciones</th>
                </tr>
            </thead>
            <!-- encabezado de la tabla -->
    
            <!-- cuerpo de la tabla -->
            <tbody>
                <?php
                // Iterar sobre cada cliente del array $clientes (recuperado al inicio)
                // foreach($arreglo_clientes as $cliente)
                $contador = 1; // Inicializar contador para la numeración
                foreach($arreglo_clientes as $cliente){
                ?>
                    <tr data-id="<?php echo $cliente['id']; ?>">
                       <!-- Mostrando los atributos del cliente con clases CSS para el estilo -->
                       <td class="item_tabla body"><?php echo $contador++; ?></td>
                        <td class="item_tabla body"><?php echo $cliente['nombre']; ?></td>
                        <td class="item_tabla body"><?php echo $cliente['apellido']; ?></td>
                        <td class="item_tabla body"><?php echo $cliente['tipo_documento']; ?></td>
                        <td class="item_tabla body"><?php echo $cliente['nro_documento']; ?></td>
                        <td class="item_tabla body"><?php echo $cliente['direccion']; ?></td>
                        <td class="item_tabla body"><?php echo $cliente['telefono']; ?></td>
                        <td class="item_tabla body"><?php echo $cliente['email']; ?></td>
    

                        <!-- BOTONES DE ACCION -->
                        <td class="item_tabla body accion">

                            <!-- MARCO BOTONES ACCION -->
                            <div class="botones_accion">

                                <!-- BOTON EDITAR -->
                            
                                <form action="editar_cliente.php" method="post" class="icono_accion">

                                    <!-- indicar el identificador del objeto -->
                                    <input type="hidden" name="cliente_id" value="<?php echo $cliente['id']; ?>">
                                    <!-- indicar el identificador del objeto -->


                                        <button type="submit" class="boton_editar">
                                            <p class="text">Editar</p>
                                            <svg width="20px" height="20px" viewBox="0 -0.5 21 21" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="white" transform="rotate(0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.63"></g><g id="SVGRepo_iconCarrier"> <title>edit [#1479]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-99.000000, -400.000000)" fill="#000000"> <g id="icons" transform="translate(56.000000, 160.000000)"> 
                                            <path fill="#17181c"d="M61.9,258.010643 L45.1,258.010643 L45.1,242.095788 L53.5,242.095788 L53.5,240.106431 L43,240.106431 L43,260 L64,260 L64,250.053215 L61.9,250.053215 L61.9,258.010643 Z M49.3,249.949769 L59.63095,240 L64,244.114985 L53.3341,254.031929 L49.3,254.031929 L49.3,249.949769 Z" id="edit-[#1479]"> </path> </g> </g> </g> </g></svg>
                                        </button>      
                                
                                </form>
                                
                                <!-- BOTON EDITAR -->
        
                                <!-- BOTON BORRAR -->
                                <form class="icono_accion">
                                    <!-- indicar el identificador del objeto -->
                                    <input type="hidden" name="cliente_id" value="<?php echo $cliente['id']; ?>">
                                    <!-- indicar el identificador del objeto -->
                                    <button type="button" class="boton_borrar" onclick="confirmDelete(<?php echo $cliente['id']; ?>)">
                                        <p class="text">Borrar</p>
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 30 30">
                                            <path fill="white" d="M 13 3 A 1.0001 1.0001 0 0 0 11.986328 4 L 6 4 A 1.0001 1.0001 0 1 0 6 6 L 24 6 A 1.0001 1.0001 0 1 0 24 4 L 18.013672 4 A 1.0001 1.0001 0 0 0 17 3 L 13 3 z M 6 8 L 6 24 C 6 25.105 6.895 26 8 26 L 22 26 C 23.105 26 24 25.105 24 24 L 24 8 L 6 8 z"></path>
                                        </svg>
                                    </button>  
                                </form>
                                <!-- BOTON EDITAR -->
                                </div>
                                

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