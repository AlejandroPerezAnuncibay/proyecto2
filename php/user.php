<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de usuario</title>
    <link rel="stylesheet" href="../style/users.css">
    <link rel="stylesheet" href="../style/modifyUser.css">
    <link rel="icon" type="image/png" href="../media/shortlogo.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
<!--MENU ROSA-->
<?php
require "code.php";
$persona = cargarUsuario($_SESSION["idUsuario"]);


?>

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
        <a class="button" href="#popup1">Modificar perfil</a>
    </div>

    <div id="popup1" class="overlay">
        <div class="popup">
            <h2>Modificar usuario</h2>
            <a class="close" href="#">&times;</a>
            <div class="content">
                <form enctype="multipart/form-data" method="post" action="carga.php" >
                    <i class="fa fa-user-circle">&nbsp;
                        <input type="text" required name="user" class="username" placeholder="Username"></i>
                    <i class="fa fa-lock">&nbsp;
                        <input type="password" required name="pass" class="password" placeholder="Password"></i>
                    <i class="fa fa-lock">&nbsp;
                        <input type="password" required name="pass" id="password2" placeholder="Repeat the password"></i>
                    <i class='far fa-address-card'>&nbsp;
                        <input type="text" name="nombre" id="nombre"  placeholder="Nombre"></i>
                    <i class='fas fa-address-card'>&nbsp;
                        <input type="text" name="apellido" id="apellido"  placeholder="Apellido"></i>
                    <i class="fa fa-at">&nbsp;
                        <input type="email" name="email" id="email"  placeholder="Correo electronico"></i>
                    <div id="cargaImg">
                        <label for="imagen">Seleccionar imagen</label>
                        <input type="file"  id="imagen" name="imagen">
                        <button name="submit" ><i id="subir" class="fas fa-upload"></i></button>
                    </div>
                </form>
        </div>
    </div>

    <div id="preguntas">

       <?php cargarPreguntas($_SESSION["idUsuario"]);?>


    </div>
</div>
</body>
</html>