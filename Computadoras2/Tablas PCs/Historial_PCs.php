<?php
session_start();
include("../Union-Server.php"); //Union con el servidor
//Si el usuario no se logeo lo expulsa
if (((empty($_SESSION["Email"])))) {
    header("location: ../Login/Login.php");
} else {
?>
    <!DOCTYPE html>
    <html>

    <head>
    <title>Base de datos Alumnos</title>
    <link rel="stylesheet" href="../Estilos.css/paginas.css">
    <link> <style> @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap'); </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="./style.css">
    </head>

    <body>
      
    <div class="wrapper">

<div class="top_navbar">
    <div class="img_user">

        <div class="img">
            <img width="47px" src="<?php echo $_SESSION['Imagen'] ?> " alt="imagen">
        </div>
    </div>
    <div class="top_menu">
        <div class="logo">
            <p><?php echo $_SESSION['Nombre'];
                if ($_SESSION['UserAdmin'] == 0) {
                    echo "<h5>Usuario</h5>";
                } else {
                    echo "<h5>Administrador</h5>";
                }  ?> </p>

        </div> <!-- <img width="50px" height="50px" src="<?php echo $_SESSION['Imagen'] ?>" alt="imagen">  -->
    </div>
</div>

<div class="sidebar">

    <ul>

        <li><a href="../Perfil/Perfil.php">
                <span class="icon"><i class="bi bi-person-circle"></i></span>
                <span class="title">Ver Perfil</span>
            </a></li>

        <?php if ($_SESSION["UserAdmin"]) { // si es administrador puede ver los usuarios 
        ?>
            <li><a href="../Tablas PCs/Usuarios_logeados.php?pagina=1"> <span class="icon"><i class="bi bi-people-fill"></i> </span>
                    <span class="title">Ver Usuarios</span>
                </a></li> <?php } ?>

        <li><a href="../Tablas PCs/Tabla-Computadoras.php?pagina=1">
                <span class="icon"><i class="bi bi-pc-display-horizontal"></i></span>
                <span class="title">Ver computadoras</span>
            </a></li>


        <li><a href="../Login/Logout.php">
                <span class="icon"><i class="bi bi-box-arrow-left"></i></span>
                <span class="title">Cerrar sesion</span>
            </a></li>
    </ul>
</div>

<div class="main_container"> 
    <div class="item">
        <form class="tect_alig">
        <?php
        // Se obtiene en ID de la pc para seleccionarla
        $id = $_GET["ID"];
        $Computadoras = "SELECT * FROM `pcs` WHERE ID = '$id'";
        // Selecciono la base de datos de historial para mostrar los datos de la pc
        $ComputadorasHistorial = "SELECT * FROM `historial pcs` WHERE PC = '$id'";
        $ResultadoComputadoras = mysqli_query($conex, $Computadoras);
        $Historial = mysqli_query($conex, $ComputadorasHistorial); //conexion para ver la tabla de historial
        //Para mostrar el ID de la pc
        $mostrarPC = mysqli_fetch_array($ResultadoComputadoras);
        echo "<p>Computadora N°" . $mostrarPC['ID'] . "</p>";
        $vacio = 1;  //vacio  para verificar si tiene historial
        //Muestra el historial                       
        while ($mostrar = mysqli_fetch_array($Historial)) {
            echo "<p> Fecha: " . $mostrar['Fecha'] . "</p>"; //Se muestra la fecha
            echo "<p> Leyenda: " . $mostrar['Historial'] . "</p>"; //Se muestra el historial
            $vacio = 0;
        }
        //Si no tiene historial muestra:
        if ($vacio) {
            echo "<h2>No hay historial en esta PC</h2>";
        }
    }

        ?>
        </form> </div> </div>
    </body>

    </html>