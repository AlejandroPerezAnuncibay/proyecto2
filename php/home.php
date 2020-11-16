<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/home.css">
    <script src="https://kit.fontawesome.com/yourcode.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
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
                    <li id="btnUsu"><a href="#" >Usuarios</a></li>
                    <li><a href="#">Preguntas</a></li>
                    <li><a href="#">Sin responder</a></li>
                    <li> <a href="#">Populares</a></li>

            </ul>

        <form class="buscador" action="#">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
        <i class='fas fa-user-circle' style='font-size:36px'><a href="#" ></a></i>

    </nav>
</header>
<main>
    <div id="primero">
        <button class="button1" ><a href="#"> Nueva Pregunta</a></button>
         <img src="../media/Logo.png" alt="logo" class="logo">
    </div>
    <div id="etiquetas">
        <button class="labels" >Etiquetas</button>
        <button class="labels" >Etiquetas</button>
        <button class="labels" >Etiquetas</button>
        <button class="labels" >Etiquetas</button>
        <button class="labels" >Etiquetas</button>
        <button class="labels" >Etiquetas</button>
        <button class="labels" >Etiquetas</button>
        <button class="labels" >Etiquetas</button>
        <button class="labels" >Etiquetas</button>
        <button class="labels" >Etiquetas</button>
        <button class="labels" >Etiquetas</button>
        <button class="labels" >Etiquetas</button>

    </div>
    <div id="preguntas">
        <div class="iconos">
            <p>Likes</p>
            <button><i class='far fa-thumbs-up' style='font-size:36px'></i></button>
        </div>
        <div class="info">
            <h4>Titulo pregunta</h4>
            <h5>Usuario que responde</h5>

            <p>Li Europan lingues es membres del sam familie. Lor separat existentie es un myth.
                Por scientie, musica, sport etc, litot Europa usa li sam vocabular.</p>
            <span>Nov 16 . 8 min read</span>

        </div>
    </div>

</main>

</body>
</html>
