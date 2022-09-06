<?php
session_start(); //se inicia la sesion que sirve para guardar variables globales 
include("../Union-Server.php");// Conexion a la base de datos
?>
<html>

<head>
     <link rel="stylesheet" href="../Estilos.css/paginas.css">
    <link> <style> @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap'); </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../style.css">
    
    <title>Formulario</title>
   
</head>

<body>
<?php
    if ((($_SESSION["UserAdmin"] == 0))) { //Si el usuario no es admin lo expulsa
        header("location: ../PaginaDeInicio.php");
    } else {
    ?>
        

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

        </div> 
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

 

<div class="center_div">
        <div class="contenidotab">
                <!-- fila de la tabla-->
                <div class="titulos">ID_Login</div> <!-- columna id-->
                <div class="titulos">Nombre</div><!-- columna nombre-->
                <div class="titulos">Email</div><!-- columna email-->
                <div class="titulos">Contraseña</div>
                <div class="titulos">Imagen</div>
                <div class="titulos">Administrador</div>
                <div class="titulos">Editar</div><!-- columna editar-->
            
            <?php
            $SQL = "SELECT * FROM `login-alumnos` WHERE 1"; //selecciono toda la base de datos para mostrarla
            $Resultado = mysqli_query($conex, $SQL); //se hace la conexion con toda la base de datos
            while ($mostrar = mysqli_fetch_array($Resultado)) { //imprime por pantalla toda la base de datos 
            ?>
              
                    <div class="datos"><?php echo $mostrar['IDLogin'] ?></div>
                    <div class="datos"><?php echo $mostrar['Nombre'] ?></div>
                    <div class="datos"><?php echo $mostrar['Email'] ?></div>
                    <div class="datos"><?php echo $mostrar['Contraseña'] ?></div>
                    <div class="datos"><img src="<?php echo str_replace("./", "../", $mostrar['Imagen']) ?>" alt="imagen"></div>
                    <div class="datos"><?php if ($mostrar['Administrador']==0){echo "Usuario";}else{echo "Administrador";}  ?></div>
                    <!-- Obtiene el Id a actualizar -->
                     <div class="datos" > <a href="../Tablas PCs/update/actualizar.php?IDLogin=<?php echo $mostrar["IDLogin"]; ?>">Editar</a> </div>
              

        <?php
            }
        }
        mysqli_free_result($Resultado);
        ?>
        </div>
        </div>
</body>

</html>