<?php
session_start();
if(isset($_SESSION["idUsuario"])){
?>
<!doctype html>
<html lang="es">
<head>
    <script src="../js/jquery-3.5.1.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/menu.css">
    <link rel="stylesheet" href="../style/newquestions.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>


    <title>Preguntas</title>
</head>
<?php
require_once "code.php"?>
<header>

    <?php require_once "menu.php" ?>
</header>
<body>

    <?php require_once "menu.php" ?>

<main>
    <div id="principal">
        <?php
            if (isset($_GET["reply"])){
                $action = "carga.php?reply=".$_GET["reply"];
            }else{
                $action = "carga.php?insertar=true";
            }

        ?>
     <form class="formulario" action="<?=$action?>" method="post">
            <label for="title">Título</label>
            <input type="text" name="title" id="title" placeholder="Escriba aqui un breve titulo">
            <label for="description">Description</label>
            <textarea name="description" maxlength="255" style="width: 100%;height: 82px" id="description" placeholder="Describa su problema..."></textarea>
            <label for="tags">Etiquetas</label>
         <?php if(!isset($reply)){

         echo "<div id='etiquetas'>";
            cargarEtiquetas();
            echo"</div>";
            echo "<input type='text' name='tags' id='tags' hidden>
                <div id='botones'>
            <button class='button2' ><a href='#'>SUBIR IMAGEN</a></button>
            <input type='submit' value='Publicar pregunta' id='bttnSendQuestion'>
            </div>";


       }?>
        </form>
    </div>
</main>
<footer>
        <?php require_once "footer.php" ?>
</footer>
</body>
    <script src="../js/etiquetas.js"></script>
</html>
<?php
}else{
    header("location:index.php");
}
?>