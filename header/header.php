<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/login.php");
    exit;
}

$tipo_usuario = $_SESSION['tipo_usuario'];
$nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];

$navItems = [
    "home" => "Inicio",
    "compras" => "Compras",
    "ventas" => "Ventas",
];

if ($tipo_usuario !== 'Empleado') {
    $navItems["usuarios"] = "Usuarios";
}

$navItems["clientes"] = "Clientes";
$navItems["productos"] = "Productos";
$navItems["reportes"] = "Reportes";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Tiendita de Don Pepe</title>
    
    <!-- importar css -->
<style>

body {
  /* background-color: #171D26 ;  */
  /* background-color: white ;  */
  font-family: "Enriqueta", serif;
  font-family: "Fira Sans", sans-serif;

  font-weight: normal;
  font-style: normal;
  margin: 0px; /* Espacio debajo de la barra de navegación */
  background-color: #1F2027;

}

/* marco superior - navigation bar */
.marco-superior_final {
  font-family: "Fira Sans", sans-serif;
  /* margin: 0px 0px; */
  font-weight: normal;
  font-style: normal;
  background-color: transparent;
  background-color: #17181c;
  margin-left: 0px;
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 0px;
  max-height: 90px;
}

.nav-center_final {
  /* margin-right: 330px; */
  background-color: blue;
  background-color: transparent;
  margin: 0px;
  max-height: 90px;
  display: flex; 
  align-items: center; 
  min-width: 50%;
}
/* marco superior - navigation bar */

.nav-links2_final {

  display: flex; 
  /* align-items: center;  */
  font-weight: normal;
  margin-bottom: 0px; /* Espacio debajo de la barra de navegación */
  gap:170px;
  /* background-color: #17181C; */
}

.nav-left_final {
  width: 110px; /* Ajusta el ancho de la imagen */
  /* margin-right: 140px; */
  margin-left: 250px; 
  background-color: transparent;
  margin-bottom: 0px;
  transform: translateY(-10px);
}

  
/*  modificaciones header :v */

.nav-right_final {
  display: flex; /* Usa flexbox para alinear los elementos horizontalmente */
  font-weight: normal;
  align-items: center; /* Alinea verticalmente los elementos */
  background-color: skyblue;
  background-color: transparent;
  gap: 20px;
  margin: 0px;
  max-height: 90px;
  width: 200px;
  display: flex; 
  align-items: center; 

}

.nav-link_final {
  font-size: 20px;
  /* Elimina el subrayado */
  text-decoration: none; 
  font-weight: normal; /* ESTABLECE LA NEGRITA DEL NARVAR*/
  background-color: transparent;
  /* letrax */
  color: #4a707a; 
  color: #6F757C;
  padding: 10px 15px; /* Espaciado interno de los enlaces */
  border: 1px solid transparent; /* Estilo de borde inicial (puedes ajustar según tu diseño) */
  border-radius: 4px; /* Bordes redondeados */
  margin: 0 5px; /* Espacio horizontal entre los enlaces */
  transition: background-color 0.3s; /* Transición para el cambio de color de fondo */
}

.nav-link_final:hover {
  color: white; /* Color del texto en el hover */
  font-weight: normal;
  font-weight: bold;
  /* background-color: #282B33; */
  border-radius: 10px;
}

.nav-link_final.actual {
color: white;
font-weight: normal;
}

.nav-link_final.actual:hover {
  color: white;
  /* background-color: #282B33; */
  border-radius: 10px;
  font-weight: bold;
}

.icono_tornillo_final {
  width: 50px;
  height: 50px; /* Mantiene la proporción de la imagen */
  padding: 0 0px;
  margin: 0 0px; /* Espacio horizontal entre los enlaces */
  margin-top: 0px;
}

.icono_tornillo_final:hover svg path {
stroke: white;
background-color: transparent; /* Color de fondo en el hover */

}

.nav-link-icono_final {
  /* height: auto;
  width: 150px; */
  text-decoration: none; /* Elimina el subrayado */
  color: #000; /* Color del texto (puedes cambiarlo según el diseño) */
  padding: 0px 0px; /* Espaciado interno de los enlaces */
  border: 1px solid transparent; /* Estilo de borde inicial (puedes ajustar según tu diseño) */
  margin-bottom: -20px;
  margin-right: 10px;
  border-radius: 4px; /* Bordes redondeados */
  margin: 0 0px; /* Espacio horizontal entre los enlaces */
  transition: background-color 0.3s; /* Transición para el cambio de color de fondo */
}


.nav-link-icono_final:hover {
  background-color: #e2e6ea; /* Color de fondo en el hover */
  color: #0056b3; /* Color del texto en el hover */
  background-color: transparent; /* Color de fondo en el hover */

}


.boton_salir_final {
  display: flex;
  align-items: center;
  justify-content: flex-start;
  width: 45px;
  height: 45px;
  border: none;
  border-radius: 50%;
  cursor: pointer;
  position: relative;
  overflow: hidden;
  transition-duration: .3s;
  box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.199);
  background-color: #dc143c;
}

/* plus icono_salir_final */
.icono_salir_final {
  width: 100%;
  transition-duration: .3s;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: yellow;
  background-color: transparent;
}

.icono_salir_final svg {
  width: 17px;
}

.icono_salir_final svg path {
  fill: white;
}
/* texto_salir_final */
.texto_salir_final {
  position: absolute;
  right: 0%;
  width: 0%;
  opacity: 0;
  color: white;
  font-size: 1.2em;
  font-weight: 600;
  transition-duration: .3s;
}
/* hover effect on button width */
.boton_salir_final:hover {
  width: 105px;
  border-radius: 40px;
  transition-duration: .3s;
}

.boton_salir_final:hover .icono_salir_final {
  width: 30%;
  transition-duration: .3s;
  padding-left: 10px;
}
/* hover effect button's texto_salir_final */
.boton_salir_final:hover .texto_salir_final {
  opacity: 1;
  width: 70%;
  transition-duration: .3s;
  padding-right: 5px;
}
/* button click effect*/
.boton_salir_final:active {
  transform: translate(2px ,2px);
}
</style>

    <!-- <link rel="stylesheet" type="text/css" href="estilo_header.css"> -->
    <!-- importar css -->

    <!-- importar fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Enriqueta:wght@400;500;600;700&family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Mukta:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- importar fuentes -->

</head>

<body>
    <!-- marco superior  -->
     <div class="marco-superior_final">

         <nav class="nav-links2_final">
     
             <!-- IZQUIERDA (LOGO CISCO) -->
             <div class="nav-left_final">

                <a href="../home/home.php">
                <svg viewBox="11.752 -158.846 797.655 797.655" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M271 418.843h-32.635v-129.33H271v129.33z" fill="#ffffff"></path> <g transform="matrix(10.33728 0 0 -10.33728 -861.345 7843.84)"> <defs> <path id="a" d="M84.461 713.596h77.163v43.961H84.461v-43.961z"></path> </defs> <clipPath id="b"> <use xlink:href="#a" overflow="visible"></use> </clipPath> <g clip-path="url(#b)"> <path d="M134.996 727.2c-.13.066-1.146.668-2.656.668-2.041 0-3.457-1.42-3.457-3.337 0-1.859 1.355-3.34 3.457-3.34 1.484 0 2.517.59 2.656.664v-3.358c-.396-.11-1.475-.445-2.877-.445-3.551 0-6.668 2.448-6.668 6.48 0 3.735 2.82 6.475 6.668 6.475 1.48 0 2.578-.36 2.877-.449V727.2zM102.043 727.2c-.127.066-1.142.668-2.652.668-2.045 0-3.46-1.42-3.46-3.337 0-1.859 1.356-3.34 3.46-3.34 1.484 0 2.516.59 2.652.664v-3.358c-.392-.11-1.47-.445-2.88-.445-3.548 0-6.661 2.448-6.661 6.48 0 3.735 2.82 6.475 6.662 6.475 1.486 0 2.582-.36 2.879-.449V727.2zM144.927 727.821c-1.873 0-3.264-1.474-3.264-3.29 0-1.82 1.391-3.293 3.264-3.293 1.871 0 3.266 1.473 3.266 3.293 0 1.816-1.395 3.29-3.266 3.29m6.611-3.29c0-3.579-2.763-6.479-6.61-6.479-3.849 0-6.608 2.9-6.608 6.48 0 3.572 2.76 6.475 6.607 6.475 3.848 0 6.611-2.903 6.611-6.476M121.512 727.941c-.047.015-1.376.382-2.468.382-1.265 0-1.953-.424-1.953-1.025 0-.762.928-1.028 1.447-1.192l.871-.277c2.05-.652 2.983-2.055 2.983-3.579 0-3.143-2.764-4.199-5.18-4.199-1.679 0-3.252.31-3.407.342v2.88c.278-.07 1.602-.466 2.981-.466 1.571 0 2.293.46 2.293 1.168 0 .634-.625 1-1.408 1.246-.19.064-.478.154-.674.218-1.758.556-3.224 1.59-3.224 3.66 0 2.34 1.752 3.911 4.662 3.911 1.537 0 2.983-.373 3.077-.398v-2.67z" fill="#ffffff"></path> <path d="M89.154 744.23c0 .862-.704 1.561-1.567 1.561s-1.568-.699-1.568-1.56v-3.285a1.568 1.568 0 0 1 3.135 0v3.284zM97.763 748.54a1.567 1.567 0 0 1-3.135 0v-7.594a1.567 1.567 0 0 1 3.135 0v7.595zM106.373 754.438c0 .862-.704 1.562-1.567 1.562-.864 0-1.568-.7-1.568-1.562v-16.613a1.568 1.568 0 0 1 3.135 0v16.613zM114.982 748.54a1.567 1.567 0 0 1-3.135 0v-7.594a1.567 1.567 0 0 1 3.135 0v7.595zM123.582 744.23a1.56 1.56 0 0 1-1.558 1.561 1.566 1.566 0 0 1-1.567-1.56v-3.285a1.562 1.562 0 1 1 3.125 0v3.284zM132.195 748.54a1.563 1.563 0 0 1-3.125 0v-7.594a1.562 1.562 0 1 1 3.125 0v7.595zM140.81 754.438a1.562 1.562 0 0 1-3.125 0v-16.613a1.564 1.564 0 1 1 3.125 0v16.613zM149.423 748.54c0 .863-.699 1.564-1.582 1.564a1.563 1.563 0 0 1-1.562-1.563v-7.595c0-.867.7-1.566 1.562-1.566.883 0 1.582.699 1.582 1.566v7.595zM158.02 744.23a1.563 1.563 0 0 1-3.128 0v-3.284c0-.867.701-1.567 1.564-1.567.862 0 1.563.7 1.563 1.567v3.284z" fill="#6cd389"></path> <path d="M156.213 719.922v-.196h-.558v-1.451h-.23v1.45h-.56v.197h1.348zM156.33 719.922h.359l.493-1.351h.008l.477 1.35h.352v-1.646h-.235v1.35h-.008l-.5-1.35h-.217l-.488 1.35h-.011v-1.35h-.23v1.647z" fill="#ffffff"></path> </g> </g> </g></svg>
                </a>

             </div>
             <!-- IZQUIERDA (LOGO CISCO) -->

             <!-- CENTRAL  -->

            <div class="nav-center_final">
                <?php foreach ($navItems as $key => $name) : ?>
                    <a href="../<?= $key ?>/<?= $key ?>.php" class="nav-link_final <?= ($estado === $key) ? 'actual' : '' ?>">
                        <?= $name ?>
                    </a>
                <?php endforeach; ?>
            </div>
             <!-- CENTRAL  -->

             <!-- DERECHA -->
             <div class="nav-right_final">
                 <!-- CONFIGURACION -->
                 <div class="icono_tornillo_final">
                         <a href="../perfil/editar_perfil.php" class="nav-link-icono_final">
                         <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4 21C4 17.134 7.13401 14 11 14C11.3395 14 11.6734 14.0242 12 14.0709M15 7C15 9.20914 13.2091 11 11 11C8.79086 11 7 9.20914 7 7C7 4.79086 8.79086 3 11 3C13.2091 3 15 4.79086 15 7ZM12.5898 21L14.6148 20.595C14.7914 20.5597 14.8797 20.542 14.962 20.5097C15.0351 20.4811 15.1045 20.4439 15.1689 20.399C15.2414 20.3484 15.3051 20.2848 15.4324 20.1574L19.5898 16C20.1421 15.4477 20.1421 14.5523 19.5898 14C19.0376 13.4477 18.1421 13.4477 17.5898 14L13.4324 18.1574C13.3051 18.2848 13.2414 18.3484 13.1908 18.421C13.1459 18.4853 13.1088 18.5548 13.0801 18.6279C13.0478 18.7102 13.0302 18.7985 12.9948 18.975L12.5898 21Z" stroke="#6F757C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                         </a>
                 </div>
 
             <!-- CONFIGURACION -->
         
                 <!-- SALIR -->
                 <a href="../login/login.php" class="icono_salir_xd">
                     <button class="boton_salir_final">
                         <div class="icono_salir_final"><svg viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path></svg></div>
                         <div class="texto_salir_final">Salir</div>
                     </button>
                 </a>
                 <!-- SALIR -->
            </div>

            

             <!-- DERECHA -->
             
         </nav>
     </div>
    <!-- marco superior  -->