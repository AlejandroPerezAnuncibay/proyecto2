<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/menu.css">
    <link rel="stylesheet" href="../style/newquestions.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>


    <title>Preguntas</title>
</head>
<body>
<header>
    <?php require_once "menu.php" ?>
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
        <div id="botones">
        <button class="button2" ><a href="#">SUBIR IMAGEN</a></button>
        <input type="submit" value="Publicar pregunta" id="bttnSendQuestion">
        </div>

    </form>
</div>
</main>
<footer>
        <?php require_once "footer.php" ?>
</footer>
</body>
</html>
