<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de usuario</title>
    <link rel="stylesheet" href="../style/users.css">
    <link rel="icon" type="image/png" href="media/shortlogo.png">
</head>
<body>
<!--MENU ROSA-->


<div id="principal">
    <img src="" alt="foto de perfil">
    <div id="infUsu">

        <h1><?php
            require_once "code.php";
            $persona = cargarUsuario($_COOKIE["nombreUsuario"]);?>
            <?= $persona["username"]?>
            <?= $persona["nombre"]?>
            </h1>
        <p id="bio">"BIOGRAFIA"</p>
        <p id="email">"EMAIL"</p>
    </div>
    <div id="preguntas">
        <h2>Preguntas formuladas ("NUMERO DE PREGUNTAS QUE HA HECHO EL USUARIO")</h2>
        <div id="pregunta1">
            <div class="interaccion">
                <p>LIKES</p>
                <p>RESPUESTAS</p>
            </div>
            <div class="titulotags">
                <h3 class="tituloPregunta"><a href="linkpregunta">"TITULO PREGUNTA"</a></h3>ç
                <p>tags</p>
            </div>
            <div class="fechaUsuario">
                <p>Last login: <?=$persona["ultimoLogin"]?></p>
            </div>
        </div>
    </div>
</div>
</body>
</html>