
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
        <li id="btnCal"><a class="active" href="home.php">Inicio</a></li>
        <li id="btnUsu"><a href="user.php">Mi perfil</a></li>
        <li><a href="#">Preguntas</a></li>
        <li><a href="#">Sin responder</a></li>
        <li class="salir"><a href="cerrarsesion.php">Cerrar sesion</a></li>
    </ul>

    <form class="buscador" action="#">
        <input type="text" placeholder="Search.." name="search">
        <button type="submit"><i class="fa fa-search"></i></button>
    </form>
    <ul id="searchResult">
        <li>Resultado 1</li>
        <li>Resultado 2</li>
        <li>Resultado 3</li>
        <li>Resultado 4</li>
        <li>Resultado 5</li>
    </ul>
    <!--Cargamos datos del usuario cogiendo el ID de la sesion del usuario logeado-->
    <?php $idUsuario = $_SESSION["idUsuario"];?>
    <?php $usuario = cargarUsuario($idUsuario);?>
    <div id="infoUsu">
    <a href="http://localhost:8765/proyecto2/php"><img id="userFoto" src="<?php cargarFotoPerfil($idUsuario)?>"></a>
    <p><?= $usuario["nombre"]." ".$usuario["apellido"] ?></p></div>
    <a href="cerrarsesion.php"><i class="fa fa-sign-out" style="font-size:36px"></i></a>
    <div class="btncambiar">
        <input type="button" value="Log in" class="btnSignin unactive changeForm">
        <input type="button" value="Sign up" class="btnSignup active">
    </div>

</nav>
</header>
</html>