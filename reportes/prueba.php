<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">   
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Enriqueta:wght@400;500;600;700&family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Mukta:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
        
</head>
<body>
    <div class="container">
        <div class="image-container">
            <img src="img/log.jpeg" alt="Imagen de inicio de sesión">
        </div>
        <div class="form-container">
            <div id="paper">
                <h2>Inicio de Sesión</h2>
                <form method="post" action="login.php">
                    <input type="text" id="username" name="username" placeholder="Usuario" required><br>
                    <input type="password" id="password" name="password" placeholder="Contraseña" required><br>
                    <a href="forgot_password.php">¿Olvidaste tu contraseña?</a><br>
                    <input type="submit" value="Iniciar Sesión">
                </form>
            </div>
        </div>
    </div>
</body>
</html>