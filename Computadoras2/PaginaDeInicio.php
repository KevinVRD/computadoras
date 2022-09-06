<?php session_start(); // para usar las variables globales 
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="./Estilos.css/paginas.css">
    <link> <style> @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap'); </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <title>Inicio</title>
</head>
<body>

<?php include('./Estilos.css/nav.php') ?>

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

                    <li><a href="./Perfil/Perfil.php">
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
    <div class="item_welcome">
        Bienvenido
    </div>
</div>

</body>

</html>