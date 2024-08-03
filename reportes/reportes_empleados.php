<?php

class ReporteEmpleado {
    public $id;
    public $nombre;
    public $apellido;
    public $sexo;
    public $fecha_nacimiento;
    public $tipo_documento;
    public $nro_documento;
    public $foto;
    public $direccion;
    public $telefono;
    public $email;
    public $estado;
    public $username;
    public $tipo_usuario;

    public function __construct($id, $nombre, $apellido, $sexo, $fecha_nacimiento, $tipo_documento, $nro_documento, $foto, $direccion, $telefono, $email, $estado, $username, $tipo_usuario) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->sexo = $sexo;
        $this->fecha_nacimiento = $fecha_nacimiento;
        $this->tipo_documento = $tipo_documento;
        $this->nro_documento = $nro_documento;
        $this->foto = $foto;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->estado = $estado;
        $this->username = $username;
        $this->tipo_usuario = $tipo_usuario;
    }
}

// Conexión a la base de datos usando MySQLi
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_inventario";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
// if ($conn->connect_error) {
//     die("Conexión fallida: " . $conn->connect_error);
// }

// Consulta para obtener los datos de los empleados
$sql = "SELECT 
            id,
            nombre,
            apellido,
            sexo,
            fecha_nacimiento,
            tipo_documento,
            nro_documento,
            foto,
            direccion,
            telefono,
            email,
            estado,
            username,
            tipo_usuario
        FROM 
            usuarios
        WHERE 
            tipo_usuario = 'Empleado'";

$result = $conn->query($sql);

$empleados = [];

if ($result->num_rows > 0) 
    {
    // Recorrer los resultados y almacenarlos en el arreglo $empleados
    while ($row = $result->fetch_assoc()) {
        $empleados[] = new ReporteEmpleado(
            $row['id'], 
            $row['nombre'], 
            $row['apellido'], 
            $row['sexo'], 
            $row['fecha_nacimiento'], 
            $row['tipo_documento'], 
            $row['nro_documento'], 
            $row['foto'], 
            $row['direccion'], 
            $row['telefono'], 
            $row['email'], 
            $row['estado'], 
            $row['username'], 
            $row['tipo_usuario']
        );
    }
}

    // Cerrar la conexión
$conn->close();

$estado = "reportes";
include('../header/header.php'); 

?>

    <link rel="stylesheet" type="text/css" href="estilo_empleados.css">
    
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
                
                <!-- titulo -->
                <span class="productos-texto">Reporte de empleados</span>
                <!-- titulo -->

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

    <div class="salto_linea_botones_reporte"></div>

    <!-- marco de la tabla -->
    <div class="marco_tabla">

    <!-- tabla -->
    <table class="tabla_productos">

        <!-- encabezado de la tabla -->
        <thead class=encabezado_tabla>
            <tr>

                <!-- <th class="item_tabla enc">ID</th> -->
                <th class="item_tabla enc">Nombre</th>
                <th class="item_tabla enc">Apellido</th>
                <th class="item_tabla enc">Sexo</th>
                <th class="item_tabla enc">Fecha de Nacimiento</th>
                <th class="item_tabla enc">Tipo de Documento</th>
                <th class="item_tabla enc">Número de Documento</th>
                <th class="item_tabla enc">Dirección</th>
                <th class="item_tabla enc">Teléfono</th>
                <th class="item_tabla enc">Email</th>
                <th class="item_tabla enc">Estado</th>
                <!-- <th class="item_tabla enc">Username</th> -->
                <th class="item_tabla enc">Tipo de Usuario</th>
            </tr>
        </thead>
        <!-- encabezado de la tabla -->

        <!-- cuerpo de la tabla -->
        <tbody>
            <?php
            // Iterar sobre cada cliente del array $clientes (recuperado al inicio)
            foreach($empleados as $reporte_empleado)
            {
            ?>
                <tr>
                    <!-- Mostrando los atributos del cliente con clases CSS para el estilo -->
                    <!-- (modificar esto) -->
                 <!-- (modificar esto) -->
                    <!-- <td class="item_tabla body pequeño"><?php echo $reporte_empleado->id; ?></td> -->
                    <td class="item_tabla body pequeño"><?php echo $reporte_empleado->nombre; ?></td>
                    <td class="item_tabla body pequeño"><?php echo $reporte_empleado->apellido; ?></td>
                    <td class="item_tabla body pequeño"><?php echo $reporte_empleado->sexo; ?></td>
                    <td class="item_tabla body pequeño"><?php echo $reporte_empleado->fecha_nacimiento; ?></td>
                    <td class="item_tabla body pequeño"><?php echo $reporte_empleado->tipo_documento; ?></td>
                    <td class="item_tabla body pequeño"><?php echo $reporte_empleado->nro_documento; ?></td>
                    <td class="item_tabla body pequeño"><?php echo $reporte_empleado->direccion; ?></td>
                    <td class="item_tabla body pequeño"><?php echo $reporte_empleado->telefono; ?></td>
                    <td class="item_tabla body grande"><?php echo $reporte_empleado->email; ?></td>
                    <td class="item_tabla body pequeño"><?php echo $reporte_empleado->estado; ?></td>
                    <td class="item_tabla body pequeño"><?php echo $reporte_empleado->tipo_usuario; ?></td>   
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