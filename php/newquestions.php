<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/newquestions.css">
    <script src="https://kit.fontawesome.com/yourcode.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap');
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
<header>
    <nav id="menu">
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn open">
            <i class="fas fa-bars"></i>
        </label>
        <label for="check"  class="checkbtn close">
            <i id="cerrar" class="fas fa-times"></i>
        </label>

        <ul id="menuList">
            <li id="btnCal"><a class="active" href="#">Inicio</a></li>
            <li id="btnUsu"><a href="#" >Perfil</a></li>
            <li><a href="#">Preguntas</a></li>
            <li><a href="#">Sin responder</a></li>
            <li> <a href="#">Populares</a></li>
            <li class="salir"><a href="../index.html">Cerrar sesion</a></li>

        </ul>

        <form class="buscador" action="#">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
        <i class='fas fa-user-circle' style='font-size:36px'><a href="#" ></a></i>
        <i class="fa fa-sign-out" style="font-size:36px"><a href="#" ></a></i>
        <div class="btncambiar">
            <input type="button" value="Log in" class="btnSignin unactive changeForm">
            <input type="button" value="Sign up" class="btnSignup active">
        </div>

    </nav>
</header>
<main>
<div id="principal">
    <form class="formulario" action="" method="">
        <label for="title">Título</label>
        <input type="text" name="title" id="title" placeholder="Escriba aqui un breve titulo">
        <label for="description">Description</label>
        <textarea name="description" id="description" placeholder="Describa su problema..."></textarea>
        <label for="tags">Etiquetas</label>
        <input type="text" name="tags" id="tags" placeholder="Escriba sus tags aqui separados por , o por un espacio">
        <button class="button2" ><a href="#">SUBIR IMAGEN</a></button>
        <input type="submit" value="Publicar pregunta" id="bttnSendQuestion">

    </form>
</div>
</main>
<footer>
    <ul>
        <li><a href="#" class="f1">Copyright &copy; 2020</a></li>
    </ul>
</footer>
</body>
</html>
