<?php session_start();
include("../Union-Server.php"); //union de la base de datos
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Perfil</title>
    <link rel="stylesheet" href="../Estilos.css/paginas.css">
    <link> <style> @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap'); </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
    <?php
    //si el usuario no se logeo lo manda a la pagina de login
    if (((empty($_SESSION["Email"])))) {
        header("location: ../Login/Login.php");
    } else { ?>
       

<?php include("../Estilos.css/nav.php") ?>


        <div class="main_container"> 
        <form action="../Tablas PCs/update/actualizar.php" method="POST" enctype="multipart/form-data" class="item">
            <?php
            //se selecciona atraves del id para que muestre el usuario a actualizar
            $SQL = "SELECT * FROM `login-alumnos` WHERE IDLogin = '" . $_SESSION["IDLogin"] . "'";
            $Resultado = mysqli_query($conex, $SQL);
            while ($mostrar = mysqli_fetch_array($Resultado)) { //imprime los datos del usuario
            ?>
            
                <img width="150px " src="<?php echo str_replace("./", "../", $mostrar['Imagen']) ?>" alt="imagen">
                <p class >Nombre: <?php echo $mostrar['Nombre'] ?></p>
                <p>Email: <?php echo $mostrar['Email'] ?></p>
                <p>Contraseña: <?php echo $mostrar['Contraseña'] ?></p>
                <input class="editB" type="submit" value="Editar" name="submitPerfil"><!-- Boton de actualizar que lleva al proceso_update -->
        <?php
            }
        }
        ?>
        </form>
        </div>
</body>

</html>