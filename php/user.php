<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de usuario</title>
    <link rel="stylesheet" href="../style/users.css">
    <link rel="stylesheet" href="../style/modifyUser.css">
    <link rel="icon" type="image/png" href="../media/shortlogo.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="../js/jquery-3.5.1.js"></script>
    <script src="../js/user.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

</head>
<body>
<!--MENU ROSA-->
<?php
require "code.php";
$persona = cargarUsuario($_SESSION["idUsuario"]);
?>

<header>

    <?php

        require_once ("menu.php");

    ?>

</header>
<div id="principal">
    <div id="informacionTotal">
        <div id="imgUser">
            <?php $idUsuario = $_SESSION["idUsuario"];?>
            <div id="tamañoFoto"><img src="<?= cargarFotoPerfil($idUsuario)?>" width="100px" heigth="100px"></div>

            <p id="username"><?=$persona["username"]?></p>
        </div>
        <div id="infUsu">
            <div id="datosUsu">
                <p id="nombreApellido"><?= $persona["nombre"]?> <?=$persona["apellido"]?></p>

                <p><i class="fa fa-question-circle">&nbsp;</i>Preguntas <?=$persona["preguntas"]?></p>

                <p id="bio"><?= $persona["biografia"]?></p>
                <p id="ultConex">Ultima conexión: <?=$persona["ultimoLogin"]?></p>
            </div>
        </div>
    </div>
    <!--<button id="bttnModificar" onclick="">Modificar perfil</button>
    <div id="popup">

    </div>-->

    <div class="box">
        <a class="button" href="#popup1" id="1popup">Modificar perfil</a>
        <a class="button" href="#popup2"><i class="fas fa-lock-open"></i></a>

    </div>

    <div id="popup1" class="overlay">
        <div class="popup">
            <h2>Modificar usuario</h2>
            <a class="close" href="#">&times;</a>
            <div class="content">
                <form enctype="multipart/form-data" method="post" action="carga.php" >
                    <i class="fa fa-user-circle">&nbsp;
                        <input type="text" required name="user" value="<?=$persona["username"]?>" class="username" placeholder="Username"></i>
                        <i class="fas fa-check check-Username green"></i><i class="fas fa-times times-Username red"></i>
                    <i class='far fa-address-card'>&nbsp;
                        <input type="text" name="nombre" id="nombre"  value="<?= $persona["nombre"]?>" placeholder="Nombre"></i>
                        <i class="fas fa-check check-nombre green"></i><i class="fas fa-times times-nombre red"></i>
                    <i class='fas fa-address-card'>&nbsp;
                        <input type="text" name="apellido" id="apellido" value="<?=$persona["apellido"]?>" placeholder="Apellido"></i>
                        <i class="fas fa-check check-apellido green"></i><i class="fas fa-times times-apellido red"></i>
                    <i class="fa fa-at">&nbsp;
                        <input type="email" name="email" id="email" value="<?=$persona["email"]?>" placeholder="Correo electronico"></i>
                        <i class="fas fa-check check-Email green"></i><i class="fas fa-times times-Email red"></i><br>
                    <i id="biografia" class="fa fa-info-circle">Biografia:
                    </i><br>
                    <textarea name="bio"  PLACEHOLDER="Introduce aqui tu biografia..." maxlength="254" ><?=$persona["biografia"]?></textarea>
                    <div id="cargaImg">
                        <label for="imagen">Seleccionar imagen</label>
                        <input type="file" value="<?=$persona["foto"]?>" id="imagen" name="imagen">
                        <label for="submit">Aceptar cambios</label>
                        <button name="submit" id="submit" onclick="return validarCampos()"></button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <div id="popup2" class="overlay">
        <div class="popup">
            <h3>Cambiar contraseña</h3>
            <a class="close" href="#">&times;</a>
            <div class="content">
                <form enctype="multipart/form-data" method="post" action="carga.php" >
                    <i class="fa fa-lock">&nbsp;
                        <input type="password" required name="pass" id="pass1" class="password" placeholder="Password"></i>
                    <p class="errorPassword"></p>
                    <i class="fa fa-lock">&nbsp;
                        <input type="password" required name="pass" id="pass2" placeholder="Repeat the password"></i>
                    <p class="errorPassword2"></p>
                    <label for="submit">Aceptar</label>
                    <button name="submit" onclick="return validarContrasenas()" id="submit"></button>
                </form>
            </div>
        </div>
    </div>
        <div id="preguntas">

            <?php cargarPreguntas($_SESSION["idUsuario"]);?>


        </div>
    <footer>

        <?php require_once ("footer.php")?>

    </footer>
</body>
<script src="../js/user.js">
</script>
</html>