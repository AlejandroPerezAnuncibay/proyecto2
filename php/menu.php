
<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/menu.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Menu</title>
</head>
<header>
<nav id="menu">
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn open">
        <i class="fas fa-bars"></i>
    </label>
    <label for="check" class="checkbtn close">
        <i id="cerrar" class="fas fa-times"></i>
    </label>

    <ul id="menuList">
        <li id="btnCal"><a class="active" href="http://localhost:8765/proyecto2/php/home.php">Inicio</a></li>
        <li id="btnUsu"><a href="http://localhost:8765/proyecto2/php/user.php">Mi perfil</a></li>
        <li><a href="#">Preguntas</a></li>
        <li><a href="#">Sin responder</a></li>
        <li class="salir"><a href="http://localhost:8765/proyecto2/php">Cerrar sesion</a></li>
    </ul>

    <form class="buscador" action="#">
        <input type="text" placeholder="Search.." name="search">
        <button type="submit"><i class="fa fa-search"></i></button>
    </form>
    <?php $idUsuario = $_SESSION["idUsuario"];?>
    <?php $usuario = cargarUsuario($idUsuario);?>
    <div id="infoUsu">
    <a href="http://localhost:8765/proyecto2/php"><img id="userFoto" src="<?php cargarFotoPerfil($idUsuario)?>"></a>
    <p><?= $usuario["nombre"]." ".$usuario["apellido"] ?></p></div>
    <a href="code.php?cerrar=true"><i class="fa fa-sign-out" style="font-size:36px"></i></a>
    <div class="btncambiar">
        <input type="button" value="Log in" class="btnSignin unactive changeForm">
        <input type="button" value="Sign up" class="btnSignup active">
    </div>

</nav>
</header>
</html>