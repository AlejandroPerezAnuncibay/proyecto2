<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

if (isset($_POST["user"]) && isset($_POST["pass"])){
    registrar($_POST["user"],$_POST["pass"],$_POST["nombre"],$_POST["apellido"],$_POST["email"]);
}
if (isset($_POST["username"]) && isset($_POST["password"])) {
    comprobarLogin($_POST["username"], $_POST["password"]);
}
if (isset($_GET["cerrar"])){
    cerrarSesion();
}
function cerrarSesion(){
    session_destroy();
    header("Location: index.php");
}


function comprobarLogin($usuario, $password)
{
    require_once "bbdd.php";
    $dbh = connect();

    $data = array( 'username' => $usuario);
    $stmt = $dbh->prepare("SELECT id_user, username, password FROM USERS where username = :username ");


    $stmt->execute($data);
    $fila = $stmt->fetch();
    if(password_verify($password, $fila['password'])) {
        session_start();
        $nombreUsuario = $fila["username"];
        $idUsuario = $fila["id_user"];
        $_SESSION["nombreUsuario"] = $nombreUsuario;
        $_SESSION["idUsuario"]=$idUsuario;
        close();
        updateLastLogin($idUsuario);
        header("location:home.php");
    } else{
        setcookie("errorLog","Nombre o contraseña incorrectos", time()+60);

        close();
        header("Location: index.php");
    }



}



function registrar($usuario, $password,$nombre,$apellido,$mail){
    require_once "bbdd.php";
    $dbh = connect();
    $pass = password_hash($password, PASSWORD_DEFAULT);
    $data = array('usuario'=>$usuario, 'pass' => $pass, 'nombre'=>$nombre,'apellido'=>$apellido,'mail' =>$mail);
    $stmt = $dbh->prepare("insert into USERS (username, password, name, surname, email) values(:usuario,:pass, :nombre,:apellido,:mail)");
    $stmt->execute($data);


    $data = array('usuario'=>$usuario);

    $stmt = $dbh->prepare("SELECT * FROM USERS where username = :usuario ");
    $stmt->execute($data);
    if($stmt->rowCount() == 1) {

        setcookie("errorLog", "El usuario ".$usuario." ha sido registrado", time()+60);

        close();
        header("Location: index.php");
    } else{
        setcookie("errorLog","Problemas con la Base de datos", time()+60);

        close();
        header("Location: index.php");

    }

}

function cargarUsuario($id){

    require_once "bbdd.php";
    $dbh = connect();

    $data = array( 'id' => $id);
    $stmt = $dbh->prepare("SELECT  id_user, username, name, surname, biography,email, last_login_date,profile_image  FROM USERS where id_user = :id");


    $stmt->execute($data);
    $fila = $stmt->fetch();

    $persona=[
        "id"=> $fila["id_user"],
        "username"=>$fila["username"],
        "nombre"=>$fila["name"],
        "apellido"=>$fila["surname"],
        "biografia"=>$fila["biography"],
        "email"=>$fila["email"],
        "ultimoLogin"=>$fila["last_login_date"],
        "foto"=>$fila["profile_image"]
    ];
    $data = array( 'id' => $id);
    $stmt = $dbh->prepare("SELECT  count(*) FROM QUESTIONS where id_user = :id");


    $stmt->execute($data);
    $conteo = $stmt->fetchColumn();
    $persona["preguntas"]= $conteo;
    close();
    return $persona;


}


function updateLastLogin($id){
    require_once "bbdd.php";
    $dbh = connect();

    $data = array( 'id' => $id );
    $stmt = $dbh->prepare("UPDATE USERS SET last_login_date = CURRENT_TIMESTAMP where id_user= :id");


    $stmt->execute($data);


    close();
}


function cargarPreguntas($id){
    require_once "bbdd.php";
    $dbh = connect();

    $data = array( 'id' => $id );
    $stmt = $dbh->prepare("SELECT  * FROM QUESTIONS where id_user = :id");
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $stmt->execute($data);
    while($fila =  $stmt->fetch()) {
        $tag = cargarTag($fila["id_topic"]);
        echo "<div class='pregunta'>";
        echo "<div class='interaccion'>";
        echo "<p>LIKES</p><p>RESPUESTAS</p></div>";
        echo "<div class='titulotags'>";
        echo "<h3 class='tituloPregunta'><a href='#'>".$fila["title"]."</a></h3>";
        echo "<p> Tag: ".$tag."</p></div>";
        echo "<div class='fechaPregunta'>";
        echo "<p>Creada el: ".$fila["date"]."</p></div></div>";








        /*  <div class="pregunta">
            <div class="interaccion">
                <p>LIKES</p>
                <p>RESPUESTAS</p>
            </div>
            <div class="titulotags">
                <h3 class="tituloPregunta"><a href="#">"TITULO PREGUNTA"</a></h3>
                <p>tags</p>
            </div>
            <div class="fechaPregunta">
                <p>FECHA DE PREGUNTA</p>
            </div>
        </div>
        */
    }
}


function cargarTag($id){
    require_once "bbdd.php";
    $dbh = connect();

    $data = array( 'id' => $id );
    $stmt = $dbh->prepare("SELECT  * FROM TOPICS where id_topic = :id");


    $stmt->execute($data);
    $fila =  $stmt->fetch();

    close();
    return $fila["name"];
}

function cargarFotoPerfil($id)
{
    require_once "bbdd.php";
    $dbh = connect();

    $data = array('id' => $id);
    $stmt = $dbh->prepare("SELECT  id_user, username, profile_image FROM USERS where id_user = :id");
    $stmt->execute($data);
    $fila = $stmt->fetch();
    if ($fila['profile_image'] != null) {
        echo $fila['profile_image'];
    }else {
    echo "../images/userProfile/.default.jpg";
    }
}

function cargarTodasPreguntas()
{
    require_once "bbdd.php";
    $dbh = connect();


    $stmt = $dbh->prepare("SELECT  * FROM QUESTIONS");
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $stmt->execute();
    while ($fila = $stmt->fetch()) {

        $tag = cargarTag($fila["id_topic"]);
        $usuario = cargarCreadorPregunta($fila["id_user"]);
        $likes = cargarLikesPregunta($fila["id_question"]);
        echo "<div class='preguntas'>";
        echo "<p> Likes: ".$likes."</p>";
        echo "<div class='iconos'>";
        echo "<button class='like'><i class='far fa-thumbs-up' style='font-size:36px'></i></button>
                        <button><i class='fas fa-eye' style='font-size:36px'></i></button> </div>";
        echo "<div class='info'>";
        echo "<h4>".$fila["title"]."</h4>";
        echo "<h5>".$usuario."</h5>";
        echo "<p>".$fila["text"]."</p></div>";
        echo "<span class='fecha'>".$fila["date"]."        Tag: ".$tag."</span></div>";




        /*<div class="preguntas">
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

                </div>*/
    }
    close();
}




function cargarCreadorPregunta($id){
    require_once "bbdd.php";
    $dbh = connect();

    $data = array( 'id' => $id );
    $stmt = $dbh->prepare("SELECT  * FROM USERS where id_user = :id");


    $stmt->execute($data);
    $fila =  $stmt->fetch();

    close();
    return $fila["name"]." ".$fila["surname"];
}


function cargarEtiquetas(){



    require_once "bbdd.php";
    $dbh = connect();


    $stmt = $dbh->prepare("SELECT  * FROM TOPICS");
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $stmt->execute();
    while ($fila = $stmt->fetch()) {
       echo  "<button class='labels'>".$fila["name"]."</button>";



    }
    close();
}

function cargarLikesPregunta($id){
    require_once "bbdd.php";
    $dbh = connect();

    $data = array( 'id' => $id);
    $stmt = $dbh->prepare("SELECT  count(*) FROM LIKES_QUESTIONS where id_question = :id");


    $stmt->execute($data);
    $conteo = $stmt->fetchColumn();
    close();


    return $conteo;

}
