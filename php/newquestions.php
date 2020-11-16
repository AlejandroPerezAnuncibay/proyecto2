<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevas preguntas</title>
    <link rel="stylesheet" href="style/newquestions.css">
    <link rel="icon" type="image/png" href="media/shortlogo.png">
</head>
<body>
<!--MENU-ROSA-->
<div id="principal">
    <form action="" method="">
        <label for="title">Título</label>
        <br>
        <input type="text" name="title" id="title" placeholder="Escriba aqui un breve titulo">
        <br>
        <label for="description">Description</label>
        <br>
        <textarea name="description" id="description" placeholder="Describa su problema..."></textarea>
        <br>
        <label for="tags">Etiquetas</label>
        <input type="text" name="tags" id="tags" placeholder="Escriba sus tags aqui separados por , o por un espacio">
        <br>
        <input type="submit" value="Publicar pregunta" id="bttnSendQuestion">
    </form>
</div>
</body>
</html>
