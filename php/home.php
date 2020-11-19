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

<body>
    <header>
        <?php require_once "menu.php" ?>
    </header>
    <main>
        <div>
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
                    <button class="labels">Etiquetas</button>
                    <button class="labels">Etiquetas</button>
                    <button class="labels">Etiquetas</button>
                    <button class="labels">Etiquetas</button>
                    <button class="labels">Etiquetas</button>
                    <button class="labels">Etiquetas</button>
                    <button class="labels">Etiquetas</button>
                    <button class="labels">Etiquetas</button>
                    <button class="labels">Etiquetas</button>
                    <button class="labels">Etiquetas</button>
                    <button class="labels">Etiquetas</button>
                    <button class="labels">Etiquetas</button>

                </div>
                <div id="preguntas">
                    <p>Likes</p>
                    <div class="iconos">

                        <button class="like"><i class='far fa-thumbs-up' style='font-size:36px'></i></button>
                        <button><i class='fas fa-eye' style='font-size:36px'></i></button>
                    </div>
                    <div class="info">
                        <h4>Titulo pregunta</h4>
                        <h5>Usuario que responde</h5>

                        <p>Li Europan lingues es membres del sam familie. Lor separat existentie es un myth.
                            Por scientie, musica, sport etc, litot Europa usa li sam vocabular.</p>
                    </div>

                    <span class="fecha">Nov 16 . 8 min read</span>

                </div>
                <div id="preguntas">
                    <p>Likes</p>
                    <div class="iconos">

                        <button class="like"><i class='far fa-thumbs-up' style='font-size:36px'></i></button>
                        <button><i class='fas fa-eye' style='font-size:36px'></i></button>
                    </div>
                    <div class="info">
                        <h4>Titulo pregunta</h4>
                        <h5>Usuario que responde</h5>

                        <p>Li Europan lingues es membres del sam familie. Lor separat existentie es un myth.
                            Por scientie, musica, sport etc, litot Europa usa li sam vocabular.</p>
                    </div>

                    <span class="fecha">Nov 16 . 8 min read</span>

                </div>
                <div id="preguntas">
                    <p>Likes</p>
                    <div class="iconos">

                        <button class="like"><i class='far fa-thumbs-up' style='font-size:36px'></i></button>
                        <button><i class='fas fa-eye' style='font-size:36px'></i></button>
                    </div>
                    <div class="info">
                        <h4>Titulo pregunta</h4>
                        <h5>Usuario que responde</h5>

                        <p>Li Europan lingues es membres del sam familie. Lor separat existentie es un myth.
                            Por scientie, musica, sport etc, litot Europa usa li sam vocabular.</p>
                    </div>

                    <span class="fecha">Nov 16 . 8 min read</span>

                </div>


            </section> 
    </main> 

    <footer>
        <?php require_once "footer.php" ?>
    </footer>

</body>
</html>