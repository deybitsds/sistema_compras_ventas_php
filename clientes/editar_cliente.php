<?php
// Conectar a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_inventario";

$conn = new mysqli($servername, $username, $password, $dbname);


$estado = "clientes";
include('../header/header.php'); 


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el ID del cliente
$cliente_id = $_POST['cliente_id'];

// Obtener los datos del cliente
$sql = "SELECT * FROM clientes WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $cliente_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $cliente = $result->fetch_assoc();
} else {
    die("Cliente no encontrado");
}

// Cerrar conexión
$stmt->close();
$conn->close();
?>

<link rel="stylesheet" type="text/css" href="estilo_registrar_cliente.css">
<link rel="stylesheet" type="text/css" href="notificacion.css">

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
    <span class="productos-texto">Editar Cliente</span>
    <!-- titulo -->

    </div>
    <!-- icono + titulo  -->

    </nav>
    <!-- Titulo Portal -->

    <!-- linea recta 2 -->
    <hr class="custom-line2">
    <!-- linea recta 2 -->


    <!-- Formulario  -->
        <div class="marco_tabla">
        <form id="editar_cliente_form" method="post" onsubmit="return confirmUpdate(event)">
                <input type="hidden" name="cliente_id" value="<?php echo $cliente_id; ?>">
                <p>
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" minlength="2" pattern="[A-Za-z ]+" value="<?php echo $cliente['nombre']; ?>" required>
                </p>
                <p>
                    <label for="apellido">Apellido:</label>
                    <input type="text" id="apellido" name="apellido" maxlength="50" pattern="[A-Za-z ]+" value="<?php echo $cliente['apellido']; ?>" required>
                </p>
                <p>
                    <label for="tipo_documento">Tipo de Documento:</label>
                    <input list="tipo_documento_list" id="tipo_documento" name="tipo_documento" value="<?php echo $cliente['tipo_documento']; ?>" required>
                    <datalist id="tipo_documento_list">
                        <option value="DNI">
                        <option value="Pasaporte">
                        <option value="Otro">
                    </datalist>
                </p>
                <p>
                    <label for="nro_documento">Nro de Documento:</label>
                    <input type="number" id="nro_documento" name="nro_documento" maxlength="20" value="<?php echo $cliente['nro_documento']; ?>" required>
                </p>
                <p>
                    <label for="direccion">Dirección:</label>
                    <input type="text" id="direccion" name="direccion" maxlength="100" value="<?php echo $cliente['direccion']; ?>" required>
                </p>
                <p>
                    <label for="telefono">Teléfono:</label>
                    <input type="number" id="telefono" name="telefono" maxlength="9" value="<?php echo $cliente['telefono']; ?>" required>
                </p>
                <p>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" maxlength="50" value="<?php echo $cliente['email']; ?>" required>
                </p>
                <p>
                    <input type="submit" value="Guardar">
                    <button type="button" class="cancel" onclick="window.location.href='clientes.php';">Cancelar</button>
                </p>
            </form>
        </div>
        </div>
        <!-- agregar el script de notificación -->
        <script src="notificacion.js"></script>
        
        <!-- agregar script para mostrar notificación en base a parámetros de la URL -->
        <script>
            <?php
            if (isset($_GET['message']) && isset($_GET['type'])) {
                $message = htmlspecialchars($_GET['message']);
                $type = htmlspecialchars($_GET['type']);
                echo "showMessage('$type', '$message');";
            }
            ?>
        </script>
</body>
</html>
