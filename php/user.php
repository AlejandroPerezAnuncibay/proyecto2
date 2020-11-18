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
    <link rel="icon" type="image/png" href="../media/shortlogo.png">
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
            <img src="<?= cargarFotoPerfil($idUsuario)?>">

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
        <h4>Seleccione imagen a cargar</h4>
        <div >

            <div>
                <input type="file"  id="imagen" name="imagen">
            </div>
            <button name="submit" ><i class="fas fa-upload"></i></button>
        </div>
    </form>
    <div id="preguntas">

       <?php cargarPreguntas($_SESSION["idUsuario"]);?>


    </div>
</div>
</body>
</html>