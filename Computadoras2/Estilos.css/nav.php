
    <!-- Imagen Nombre y rango -->

    <?php
    //si el usuario no se logeo lo devuelve
    if (((empty($_SESSION["Email"])))) {
        header("location: Login/Login.php");
    } else { ?>
        <!--    =========================== -->
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
                    <!--  <ul>
        <li><a href="#">
          <i class=""></i>
          </a></li>
        <li><a href="#">
          <i class=""></i>
          </a></li>
        <li><a href="#">
          <i class=""></i>
          </a></li>
      </ul> -->
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

                    <!--  <li><a href="Perfil/Perfil.php">
          <span class="icon"><i class="bi bi-person-circle"></i></span>
          <span class="title">Ver Perfil</span>
          </a></li> -->

                    <li><a href="../Login/Logout.php">
                            <span class="icon"><i class="bi bi-box-arrow-left"></i></span>
                            <span class="title">Cerrar sesion</span>
                        </a></li>
                </ul>
            </div>

            <!-- 
 
    <div class="item">
      Barras de informacion de PC
    </div>
    <div class="item">
      Barras de informacion de PC
    </div>
    <div class="item">
      Barras de informacion de PC
    </div>
  </div>
</div>
  zapato      -->

            <!--       <div class="ConteinerInicio">
            <?php // a
            // Boton que lleva a la tabla de computadoras  echo "<h1>Bienvenido " . $_SESSION["Nombre"] . "</h1>"; 
            ?>
            
            <a href="Tablas PCs/Tabla-Computadoras.php?pagina=1"><input class="BotonInicio" type="button" value="Ver tabla de las PCs"></a> <?php
                                                                                                                                        }
                                                                                                                                            ?>
        </div> -->