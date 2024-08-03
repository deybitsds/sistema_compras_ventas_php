<?php
// Conectar a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_inventario";

$conn = new mysqli($servername, $username, $password, $dbname);

$estado = "perfil";
include('../header/header.php'); 

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el ID del usuario de la sesión
$user_id = $_SESSION['user_id'];

// Obtener los datos del usuario
$sql = "SELECT nombre, apellido, sexo, fecha_nacimiento, tipo_documento, nro_documento, direccion, telefono, email, username, password FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();
} else {
    die("Usuario no encontrado");
}
// Cerrar conexión
$stmt->close();
$conn->close();
?>

<link rel="stylesheet" type="text/css" href="estilo_form.css">
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
    <span class="productos-texto">Editar Perfil</span>
    <!-- titulo -->
    </div>
    <!-- icono + titulo  -->

        <button type="button" class="boton_reporte_hoy" onclick="window.location.href='backups.php'">
        <span class="texto_reporte_hoy">BackUp</span>
    </button>
    </nav>
    <!-- Titulo Portal -->

    <!-- linea recta 2 -->
    <hr class="custom-line2">
    <!-- linea recta 2 -->

    <!-- Formulario  -->
    <div class="marco_tabla">
        <form id="formEditarPerfil" method="post" onsubmit="return confirmUpdate(event)">
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
            <p>
                <label for="direccion">Dirección:</label>
                <input type="text" id="direccion" name="direccion" maxlength="100" value="<?php echo $usuario['direccion']; ?>" required>
            </p>
            <p>
                <label for="telefono">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" maxlength="15" value="<?php echo $usuario['telefono']; ?>" required>
            </p>
            <p>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" maxlength="50" value="<?php echo $usuario['email']; ?>" required>
            </p>
            <p>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" maxlength="20" value="<?php echo $usuario['username']; ?>" required>
            </p>
            <p>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" maxlength="100" value="<?php echo $usuario['password']; ?>" required>
            </p>
            <p>
                <input type="submit" value="Guardar">
                <button type="button" class="cancel" onclick="window.location.href='../home/home.php';">Cancelar</button>
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
