<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de usuario</title>
    <link rel="stylesheet" href="../style/users.css">
    <link rel="icon" type="image/png" href="../media/shortlogo.png">
</head>
<body>
<!--MENU ROSA-->
<?php
require "code.php";
$persona = cargarUsuario($_COOKIE["nombreUsuario"]);


?>

<div id="principal">
    <div id="informacionTotal">
        <div id="imgUser">
            <img src="<?= cargarFotoPerfil($_COOKIE["nombreUsuario"])?>">

            <p id="username"><?=$persona["username"]?></p>
        </div>
        <div id="infUsu">
            <div id="preguntasRealizadas">
                <p><?=$persona["preguntas"]?></p>
                <p>Preguntas</p>
            </div>
            <div id="datosUsu">
                <p id="nombreApellido"><?= $persona["nombre"]?> <?=$persona["apellido"]?></p>
                <p id="bio"><?= $persona["biografia"]?></p>
                <p id="ultConex">Ultima conexión: <?=$persona["ultimoLogin"]?></p>
            </div>
        </div>
    </div>
    <form name="MiForm" enctype="multipart/form-data" id="MiForm" method="post" action="carga.php" >
        <h4 class="text-center">Seleccione imagen a cargar</h4>
        <div class="form-group">
            <label class="col-sm-2 control-label">Archivos</label>
            <div class="col-sm-8">
                <input type="file" class="form-control" id="imagen" name="imagen">
            </div>
            <button name="submit" >Cargar Imagen</button>
        </div>
    </form>
    <div id="preguntas">

       <?php cargarPreguntas($_COOKIE["idUsuario"]);?>


    </div>
</div>
</body>
</html>