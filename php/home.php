<?php
session_start();
if(isset($_SESSION["idUsuario"])){
?>

<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/menu.css">
    <link rel="stylesheet" href="../style/home.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="http://localhost:8765/proyecto2/style/home.css">

    <title>Home</title>
</head>
<?php require_once "code.php"?>
<body>
    <header>
        <!--Petición del menu-->
        <?php require_once "menu.php" ?>
    </header>
    <main>

            <article id="opciones">
                <form class="buscador" action="#">
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>


            </article>

            <div id="primero">
                <h1 id="titulop">PREGÚNTANOS</h1>
                <div id="color">
                    <img src="../media/shortlogo.svg" alt="Logo" id="imgPcs">
                    <h2 id="nombreEmpresa">Aergibide</h2>
                </div>
                <button class="button1"><a href="#">Nueva Pregunta</a></button>

            </div>
            <section id="principal">
                <div id="etiquetas">
                    <p class="eti">Etiquetas: </p>
                    <!--Pedimos los tags al servidor para mostrarlos-->
                    <?php cargarEtiquetas()?>


                </div>
                <!--Con esta peticion nos encargamos de generar todas las preguntas-->
                <?php cargarTodasPreguntas()?>



            </section> 
    </main> 

    <footer>
        <!--Peticion del footer-->
        <?php require_once "footer.php" ?>
    </footer>

</body>
<script src="../js/scroll.js"></script>
</html>
<?php
}else{
    header("location:index.php");
}
?>