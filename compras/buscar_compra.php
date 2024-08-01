<?php
// Incluir conexión a la base de datos
include 'conexion.php';

$conexion = conexion();


$estado = "compras";
include('../header/header.php'); 

// Verificar si se recibió un código de barra
if (isset($_POST['codigo_buscado'])) {
    $codigo_buscado = htmlspecialchars($_POST['codigo_buscado']);

    // Consultar la base de datos para obtener la compra correspondiente
    $sentencia = $conexion->prepare("SELECT  
    compras.id,
    compras.tipo_comprobante, 
    compras.nro_comprobante, 
    compras.fecha_emision, 
    proveedores.razon_social
FROM 
    compras
JOIN 
    proveedores ON compras.proveedor_id = proveedores.id     
WHERE 
    compras.nro_comprobante =  ?");
    $sentencia->bind_param("s", $codigo_buscado);
    $sentencia->execute();
    $resultado = $sentencia->get_result();
    $compras = $resultado->fetch_all(MYSQLI_ASSOC);

    if (empty($compras)) {
        $mensaje = "No se encontraron resultados para el código ingresado.";
    } else {
        $mensaje = ""; // Puede ser utilizado para mostrar un mensaje
    }
} else {
    $mensaje = "Por favor, ingrese un código de barra para buscar.";
    $compras = []; // Sin resultados si no se ingresó código
}
?>


    <link rel="stylesheet" type="text/css" href="estilo.css">
    <?php
    // Mostrar mensaje si existe
    if ($mensaje) {
        echo "<p>$mensaje</p>";
    }
    ?>

    <div class="marco_tabla">
        <table class="tabla_productos">
            <thead class="encabezado_tabla">
                <tr>
                    <th class="item_tabla enc">Código</th>
                    <th class="item_tabla enc">Tipo de Comprobante</th>
                    <th class="item_tabla enc">Nro de Comprobante</th>
                    <th class="item_tabla enc">Fecha de Emisión</th>
                    <th class="item_tabla enc">Razon Social</th>
                    <th class="item_tabla enc">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($compras)) {
                    foreach ($compras as $compra) {
                        echo "<tr>

                            <td class='item_tabla body'>" . htmlspecialchars($compra['id']) . "</td>
                            <td class='item_tabla body'>" . htmlspecialchars($compra['tipo_comprobante']) . "</td>
                            <td class='item_tabla body'>" . htmlspecialchars($compra['nro_comprobante']) . "</td>
                            <td class='item_tabla body'>" . htmlspecialchars($compra['fecha_emision']) . "</td>
                            <td class='item_tabla body'>" . htmlspecialchars($compra['razon_social']) . "</td>
                            <td class='item_tabla body accion'>
                                <div class='botones_accion'>
                                    <form action='editar_compra.php?id=" . $compra['id'] . "' method='post' class='icono_accion'>
                                        <input type='hidden' name='id' value='" . $compra['id'] . "'>
                                        <button type='submit' class='boton_editar'>
                                            <p class='text'>Editar</p>
                                            <svg width='20px' height='20px' viewBox='0 -0.5 21 21' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' fill='white'>
                                                <title>edit [#1479]</title>
                                                <desc>Created with Sketch.</desc>
                                                <defs></defs>
                                                <g id='Page-1' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'>
                                                    <g id='Dribbble-Light-Preview' transform='translate(-99.000000, -400.000000)' fill='#000000'>
                                                        <g id='icons' transform='translate(56.000000, 160.000000)'>
                                                            <path fill='#17181c' d='M61.9,258.010643 L45.1,258.010643 L45.1,242.095788 L53.5,242.095788 L53.5,240.106431 L43,240.106431 L43,260 L64,260 L64,250.053215 L61.9,250.053215 L61.9,258.010643 Z M49.3,249.949769 L59.63095,240 L64,244.114985 L53.3341,254.031929 L49.3,254.031929 L49.3,249.949769 Z'></path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        </button>
                                    </form>
                                    <form action='eliminar_compra.php?id=" . $compra['id'] . "' method='post' class='icono_accion'>
                                        <input type='hidden' name='id' value='" . $compra['id'] . "'>
                                        <button type='submit' class='boton_borrar'>
                                            <p class='text'>Borrar</p>
                                            <svg xmlns='http://www.w3.org/2000/svg' x='0px' y='0px' width='30' height='30' viewBox='0 0 30 30'>
                                                <path fill='white' d='M 13 3 A 1.0001 1.0001 0 0 0 11.986328 4 L 6 4 A 1.0001 1.0001 0 1 0 6 6 L 24 6 A 1.0001 1.0001 0 1 0 24 4 L 18.013672 4 A 1.0001 1.0001 0 0 0 17 3 L 13 3 z M 6 8 L 6 24 C 6 25.105 6.895 26 8 26 L 22 26 C 23.105 26 24 25.105 24 24 L 24 8 L 6 8 z'></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
