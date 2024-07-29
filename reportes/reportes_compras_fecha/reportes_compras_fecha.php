<?php

$fecha_hoy = date('Y-m-d');

if ($_SERVER["REQUEST_METHOD"] != "POST" || !isset($_POST['inicio']) || !isset($_POST['fin']) || ($_POST['inicio'] > $_POST['fin'])) {
    $inicio = null;
    $fin = null;
} else {
    $inicio = $_POST['inicio'];
    $fin = $_POST['fin'];
    
    // Conexión a la base de datos usando MySQLi
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sistema_inventario";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
    
    // Definir la clase ReporteVentaFecha
    class ReporteComprasFecha {
        public $codigo;
        public $tipo_comprobante;
        public $nro_comprobante;
        public $fecha;
        public $proveedor_id;
        public $producto_id;
        public $cantidad;
        public $precio;

        public function __construct($codigo, $tipo_comprobante, $nro_comprobante, $fecha, $proveedor_id, $producto_id, $cantidad, $precio) {
            $this->codigo = $codigo;
            $this->tipo_comprobante = $tipo_comprobante;
            $this->nro_comprobante = $nro_comprobante;
            $this->fecha = $fecha;
            $this->proveedor_id = $proveedor_id;
            $this->producto_id = $producto_id;
            $this->cantidad = $cantidad;
            $this->precio = $precio;
        }
    }
    
    // Consulta a la base de datos
    $sql = "SELECT c.id AS compra_id, c.tipo_comprobante, c.nro_comprobante, c.fecha_emision, c.proveedor_id,
               d.producto_id, d.cantidad, d.precio
        FROM compras c
        JOIN detalle_compras d ON c.id = d.compra_id
        WHERE c.fecha_emision BETWEEN '$inicio' AND '$fin'";    

    // $sql = "SELECT ventas.id AS codigo, ventas.fecha_emision AS tipo_comprobante, productos.descripcion AS nro_comprobante, detalle_ventas.fecha, (detalle_ventas.fecha * detalle_ventas.precio) AS cantidad
    //         FROM ventas
    //         JOIN detalle_ventas ON ventas.id = detalle_ventas.venta_id
    //         JOIN productos ON detalle_ventas.producto_id = productos.id
    //         WHERE ventas.fecha_emision BETWEEN '$inicio' AND '$fin'";    
            
    $result = $conn->query($sql);
    
    // Crear el arreglo para almacenar los objetos ReporteComprasFecha
    $compras_por_fecha = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Crear una instancia de ReporteComprasFecha y agregarla al arreglo
            $compras_por_fecha[] = new ReporteComprasFecha($row["compra_id"], $row["tipo_comprobante"], $row["nro_comprobante"], $row["fecha_emision"], $row["proveedor_id"], $row["producto_id"], $row["cantidad"], $row["precio"]);
        }
    }

    
    // // Probar el correcto funcionamiento
    // echo '<pre>';
    // print_r($ventas_por_fecha);
    // echo '</pre>';

    // Cerrar conexión
    $conn->close();
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
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Enriqueta:wght@400;500;600;700&family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Mukta:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- importar fuentes -->

</head>

<script>
    function enviarReporteHoy() {
        // Obtener la fecha actual en formato YYYY-MM-DD
        const fechaHoy = new Date().toISOString().split('T')[0];

        // Establecer los valores de los campos de fecha
        document.getElementById('inicio').value = fechaHoy;
        document.getElementById('fin').value = fechaHoy;

        // Enviar el formulario con la fecha de hoy
        document.querySelector('.marco_opciones').submit();
    }
</script>

<body>
    <!-- marco superior  -->
     <div class="marco-superior">

         <nav class="nav-links">
     
             <!-- IZQUIERDA (LOGO CISCO) -->
             <div class="nav-left">

                <a href="../../home/home.php">
                <svg viewBox="11.752 -158.846 797.655 797.655" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M271 418.843h-32.635v-129.33H271v129.33z" fill="#ffffff"></path> <g transform="matrix(10.33728 0 0 -10.33728 -861.345 7843.84)"> <defs> <path id="a" d="M84.461 713.596h77.163v43.961H84.461v-43.961z"></path> </defs> <clipPath id="b"> <use xlink:href="#a" overflow="visible"></use> </clipPath> <g clip-path="url(#b)"> <path d="M134.996 727.2c-.13.066-1.146.668-2.656.668-2.041 0-3.457-1.42-3.457-3.337 0-1.859 1.355-3.34 3.457-3.34 1.484 0 2.517.59 2.656.664v-3.358c-.396-.11-1.475-.445-2.877-.445-3.551 0-6.668 2.448-6.668 6.48 0 3.735 2.82 6.475 6.668 6.475 1.48 0 2.578-.36 2.877-.449V727.2zM102.043 727.2c-.127.066-1.142.668-2.652.668-2.045 0-3.46-1.42-3.46-3.337 0-1.859 1.356-3.34 3.46-3.34 1.484 0 2.516.59 2.652.664v-3.358c-.392-.11-1.47-.445-2.88-.445-3.548 0-6.661 2.448-6.661 6.48 0 3.735 2.82 6.475 6.662 6.475 1.486 0 2.582-.36 2.879-.449V727.2zM144.927 727.821c-1.873 0-3.264-1.474-3.264-3.29 0-1.82 1.391-3.293 3.264-3.293 1.871 0 3.266 1.473 3.266 3.293 0 1.816-1.395 3.29-3.266 3.29m6.611-3.29c0-3.579-2.763-6.479-6.61-6.479-3.849 0-6.608 2.9-6.608 6.48 0 3.572 2.76 6.475 6.607 6.475 3.848 0 6.611-2.903 6.611-6.476M121.512 727.941c-.047.015-1.376.382-2.468.382-1.265 0-1.953-.424-1.953-1.025 0-.762.928-1.028 1.447-1.192l.871-.277c2.05-.652 2.983-2.055 2.983-3.579 0-3.143-2.764-4.199-5.18-4.199-1.679 0-3.252.31-3.407.342v2.88c.278-.07 1.602-.466 2.981-.466 1.571 0 2.293.46 2.293 1.168 0 .634-.625 1-1.408 1.246-.19.064-.478.154-.674.218-1.758.556-3.224 1.59-3.224 3.66 0 2.34 1.752 3.911 4.662 3.911 1.537 0 2.983-.373 3.077-.398v-2.67z" fill="#ffffff"></path> <path d="M89.154 744.23c0 .862-.704 1.561-1.567 1.561s-1.568-.699-1.568-1.56v-3.285a1.568 1.568 0 0 1 3.135 0v3.284zM97.763 748.54a1.567 1.567 0 0 1-3.135 0v-7.594a1.567 1.567 0 0 1 3.135 0v7.595zM106.373 754.438c0 .862-.704 1.562-1.567 1.562-.864 0-1.568-.7-1.568-1.562v-16.613a1.568 1.568 0 0 1 3.135 0v16.613zM114.982 748.54a1.567 1.567 0 0 1-3.135 0v-7.594a1.567 1.567 0 0 1 3.135 0v7.595zM123.582 744.23a1.56 1.56 0 0 1-1.558 1.561 1.566 1.566 0 0 1-1.567-1.56v-3.285a1.562 1.562 0 1 1 3.125 0v3.284zM132.195 748.54a1.563 1.563 0 0 1-3.125 0v-7.594a1.562 1.562 0 1 1 3.125 0v7.595zM140.81 754.438a1.562 1.562 0 0 1-3.125 0v-16.613a1.564 1.564 0 1 1 3.125 0v16.613zM149.423 748.54c0 .863-.699 1.564-1.582 1.564a1.563 1.563 0 0 1-1.562-1.563v-7.595c0-.867.7-1.566 1.562-1.566.883 0 1.582.699 1.582 1.566v7.595zM158.02 744.23a1.563 1.563 0 0 1-3.128 0v-3.284c0-.867.701-1.567 1.564-1.567.862 0 1.563.7 1.563 1.567v3.284z" fill="#6cd389"></path> <path d="M156.213 719.922v-.196h-.558v-1.451h-.23v1.45h-.56v.197h1.348zM156.33 719.922h.359l.493-1.351h.008l.477 1.35h.352v-1.646h-.235v1.35h-.008l-.5-1.35h-.217l-.488 1.35h-.011v-1.35h-.23v1.647z" fill="#ffffff"></path> </g> </g> </g></svg>
                </a>

             </div>
             <!-- IZQUIERDA (LOGO CISCO) -->
     
             <!-- CENTRAL  -->
             <div class="nav-center">
                 <a href="../../home/home.php" class="nav-link">Inicio</a>
                 <a href="../../compras/compras.php" class="nav-link">Compras</a>
                 <a href="../../ventas/ventas.php" class="nav-link">Ventas</a>
                 <a href="../../usuarios/usuarios.php" class="nav-link">Usuarios</a>
                 <a href="../../clientes/clientes.php" class="nav-link">Clientes</a>
                 <a href="../../productos/productos.php" class="nav-link">Productos</a>
                 <a href="../../reportes/reportes.php" class="nav-link actual">Reportes</a>
             </div>
             <!-- CENTRAL  -->
             
             <!-- DERECHA -->
                <!-- CONFIGURACION -->
                <div class="icono_tornillo">
                        <a href="../../perfil/editar_perfil.php" class="nav-link-icono">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4 21C4 17.134 7.13401 14 11 14C11.3395 14 11.6734 14.0242 12 14.0709M15 7C15 9.20914 13.2091 11 11 11C8.79086 11 7 9.20914 7 7C7 4.79086 8.79086 3 11 3C13.2091 3 15 4.79086 15 7ZM12.5898 21L14.6148 20.595C14.7914 20.5597 14.8797 20.542 14.962 20.5097C15.0351 20.4811 15.1045 20.4439 15.1689 20.399C15.2414 20.3484 15.3051 20.2848 15.4324 20.1574L19.5898 16C20.1421 15.4477 20.1421 14.5523 19.5898 14C19.0376 13.4477 18.1421 13.4477 17.5898 14L13.4324 18.1574C13.3051 18.2848 13.2414 18.3484 13.1908 18.421C13.1459 18.4853 13.1088 18.5548 13.0801 18.6279C13.0478 18.7102 13.0302 18.7985 12.9948 18.975L12.5898 21Z" stroke="#6F757C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                        </a>
                </div>

            <!-- CONFIGURACION -->
        
                <!-- SALIR -->
                <a href="../../login/login.php" class="icono_salir">
                    <button class="boton_salir_final">
                        <div class="icono_salir_final"><svg viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path></svg></div>
                        <div class="texto_salir_final">Salir</div>
                    </button>
                </a>
                <!-- SALIR -->

             <!-- DERECHA -->
             
         </nav>
     </div>
    <!-- marco superior  -->

    <!-- Linea recta 1 -->
     <hr class="custom-line">
    <!-- Linea recta -->

    <!-- marco inferior -->

    <!-- Titulo Portal -->
    <div class="marco_letras">

        <!-- icono + titulo  -->
        <div class="label-productos">
                <!-- icono -->
                <div class="imagen-2">
                    <svg fill="#ffffff" viewBox="0 0 1000 1000" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 1000 1000" xml:space="preserve" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <metadata> Svg Vector Icons : http://www.onlinewebfonts.com/icon </metadata> <g> <g transform="translate(0.000000,511.000000) scale(0.100000,-0.100000)"> <path d="M1685.8,4989.2c-253.7-58.9-499.3-265.9-621.1-519.6l-75.1-158.3l-6.1-4141c-4.1-2772.8,2-4173.4,16.2-4238.4c56.8-267.9,257.8-513.6,523.7-639.4l156.3-75.1l3258-6.1c2174-4.1,3290.4,2,3355.4,16.2c326.8,69,627.2,365.4,702.4,692.2c14.2,58.9,22.3,1049.5,22.3,2809.4c0,2616.5-2,2724.1-38.6,2801.2c-48.7,101.5-3373.6,3428.5-3458.9,3460.9C5449.2,5017.6,1797.5,5015.6,1685.8,4989.2z M4856.5,3087.2c0-1433.1,2-1451.4,115.7-1648.3c89.3-152.2,253.7-298.4,426.3-381.6l158.3-75.1l1427-6.1l1425-6.1v-2494.7c0-1891.9-6.1-2506.9-24.4-2547.5c-52.8-117.7,148.2-111.6-3385.8-111.6s-3333.1-6.1-3385.8,111.6c-38.6,81.2-34.5,8302.2,4.1,8371.2c58.9,105.6,12.2,101.5,1682.8,103.5h1556.9V3087.2z M6866.1,1585.1c-1351.9-4.1-1337.7-6.1-1380.3,109.6c-12.2,30.5-20.3,552.1-20.3,1293V4230l1319.4-1319.4l1319.4-1319.4L6866.1,1585.1z"></path> <path d="M2989-327.1v-304.5h2009.6h2009.6v304.5v304.5H4998.6H2989V-327.1z"></path> <path d="M2989-1646.5V-1951h2009.6h2009.6v304.5v304.5H4998.6H2989V-1646.5z"></path> <path d="M2989-2925.3v-304.5h954.1h954v304.5v304.5h-954H2989V-2925.3z"></path> </g> </g> </g></svg>
                </div>
                <!-- icono -->
                
                <!-- título -->
                
                <span class="productos-texto">
                    Reporte de Compras <br>
                    <?php 
                if ($inicio == null and $fin == null) {
                    // Aquí asumimos que ya has recuperado el nombre del usuario como se mostró anteriormente
                    echo " por fecha" ;
                } else {
                    if ($inicio == $fin)
                    {
                        echo " fecha " . $inicio;
                    }
                    else {
                        echo $inicio . " al " . $fin; 
                    }
                }
                ?> 
                </span>
        </div>
        <!-- título -->

        <div class="marco_boton_generar">
            
            <!-- boton agregar -->
            <div class="boton_generar">
                <a href ="registrar_compra.php" class = "nav-link-icono">
                    <button type="button" class="boton_add">
                        <span class="boton_add__text">Descargar</span>
                        
                        <span class="boton_add__icon">
                        <svg viewBox="0 0 24 24" fill="none" width="38" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M5.625 15C5.625 14.5858 5.28921 14.25 4.875 14.25C4.46079 14.25 4.125 14.5858 4.125 15H5.625ZM4.875 16H4.125H4.875ZM19.275 15C19.275 14.5858 18.9392 14.25 18.525 14.25C18.1108 14.25 17.775 14.5858 17.775 15H19.275ZM11.1086 15.5387C10.8539 15.8653 10.9121 16.3366 11.2387 16.5914C11.5653 16.8461 12.0366 16.7879 12.2914 16.4613L11.1086 15.5387ZM16.1914 11.4613C16.4461 11.1347 16.3879 10.6634 16.0613 10.4086C15.7347 10.1539 15.2634 10.2121 15.0086 10.5387L16.1914 11.4613ZM11.1086 16.4613C11.3634 16.7879 11.8347 16.8461 12.1613 16.5914C12.4879 16.3366 12.5461 15.8653 12.2914 15.5387L11.1086 16.4613ZM8.39138 10.5387C8.13662 10.2121 7.66533 10.1539 7.33873 10.4086C7.01212 10.6634 6.95387 11.1347 7.20862 11.4613L8.39138 10.5387ZM10.95 16C10.95 16.4142 11.2858 16.75 11.7 16.75C12.1142 16.75 12.45 16.4142 12.45 16H10.95ZM12.45 5C12.45 4.58579 12.1142 4.25 11.7 4.25C11.2858 4.25 10.95 4.58579 10.95 5H12.45ZM4.125 15V16H5.625V15H4.125ZM4.125 16C4.125 18.0531 5.75257 19.75 7.8 19.75V18.25C6.61657 18.25 5.625 17.2607 5.625 16H4.125ZM7.8 19.75H15.6V18.25H7.8V19.75ZM15.6 19.75C17.6474 19.75 19.275 18.0531 19.275 16H17.775C17.775 17.2607 16.7834 18.25 15.6 18.25V19.75ZM19.275 16V15H17.775V16H19.275ZM12.2914 16.4613L16.1914 11.4613L15.0086 10.5387L11.1086 15.5387L12.2914 16.4613ZM12.2914 15.5387L8.39138 10.5387L7.20862 11.4613L11.1086 16.4613L12.2914 15.5387ZM12.45 16V5H10.95V16H12.45Z" fill="#ffffff"></path> </g></svg>
                        </span> 
                    </button>
                </a>
            </div>
            <!-- boton agregar -->

        </div>

        <!-- icono + titulo  -->
    <!-- Titulo Portal -->
    
    
</div>


<!-- linea recta 2 -->
<hr class="custom-line2">
<!-- linea recta 2 -->


        <form class="marco_opciones" method="post">
            <div class="marco_opciones_1">
                <label for="inicio" class="etiqueta_fecha">Fecha inicial</label>
                <input type="date" name="inicio" class="input_fecha" id="inicio" >
            </div>

            <div class="marco_opciones_1">
                <label for="fin" class="etiqueta_fecha">Fecha final</label>
                <input type="date" name="fin" class="input_fecha" id="fin" >
            </div>

            <div class="marco_opciones_2">

        <!-- Botón para generar el reporte de hoy -->
        <button type="button" class="boton_reporte_hoy" onclick="enviarReporteHoy()">
            <span class="texto_reporte_hoy">Reporte Hoy</span>
        </button>

                <button class="boton_continuar">
                    <span>Continuar</span>
                    <svg class = "xd" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 74 74" height="34" width="34">
                        <circle stroke-width="3" stroke="black" r="35.5" cy="37" cx="37"></circle>
                        <path fill="black" d="M25 35.5C24.1716 35.5 23.5 36.1716 23.5 37C23.5 37.8284 24.1716 38.5 25 38.5V35.5ZM49.0607 38.0607C49.6464 37.4749 49.6464 36.5251 49.0607 35.9393L39.5147 26.3934C38.9289 25.8076 37.9792 25.8076 37.3934 26.3934C36.8076 26.9792 36.8076 27.9289 37.3934 28.5147L45.8787 37L37.3934 45.4853C36.8076 46.0711 36.8076 47.0208 37.3934 47.6066C37.9792 48.1924 38.9289 48.1924 39.5147 47.6066L49.0607 38.0607ZM25 38.5L48 38.5V35.5L25 35.5V38.5Z"></path>
                    </svg>
                </button>
                
            </div>
        
        </form>

        <!-- <div class="col-5">
            </div>
            <div class="col-5">
            </div>
            <div class="col">
            </div> -->



    <!-- marco de la tabla -->
    <div class="marco_tabla">

    <!-- tabla -->
    <table class="tabla_productos">

        <!-- encabezado de la tabla -->
        <thead class=encabezado_tabla>
            <tr>
                <th class="item_tabla enc">Código</th>
                <th class="item_tabla enc">Tipo Comprobante</th>
                <th class="item_tabla enc">Nro. Comprobante</th>
                <th class="item_tabla enc">Fecha</th>
                <th class="item_tabla enc">Cód. Proveedor </th>
                <th class="item_tabla enc">Cód. Producto </th>
                <th class="item_tabla enc">Cantidad</th>
                <th class="item_tabla enc">Total</th>
            </tr>
        </thead>
        <!-- encabezado de la tabla -->

        <!-- cuerpo de la tabla -->
        <tbody>
            <?php
            // Iterar sobre cada cliente del array $clientes (recuperado al inicio)
            foreach($compras_por_fecha as $reporte_compra)
            {
            ?>
                <tr>
                    <!-- Mostrando los atributos del cliente con clases CSS para el estilo -->
                    <!-- (modificar esto) -->
                    <td class="item_tabla body pequeño"><?php echo $reporte_compra->codigo; ?></td>
                    <td class="item_tabla body pequeño"><?php echo $reporte_compra->tipo_comprobante; ?></td>
                    <td class="item_tabla body grande"><?php echo $reporte_compra->nro_comprobante; ?></td>
                    <td class="item_tabla body medio"><?php echo $reporte_compra->fecha; ?></td>
                    <td class="item_tabla body medio"><?php echo $reporte_compra->proveedor_id; ?></td>
                    <td class="item_tabla body medio"><?php echo $reporte_compra->producto_id; ?></td>
                    <td class="item_tabla body medio"><?php echo $reporte_compra->cantidad; ?></td>
                    <td class="item_tabla body medio"><?php echo $reporte_compra->precio; ?></td>
                    
                    
                    <!-- (modificar esto) -->
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


</body>
</html>