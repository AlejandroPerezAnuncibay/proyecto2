<?php


error_reporting(E_ALL);
ini_set('display_errors', '1');

if (isset($_POST["user"]) && isset($_POST["pass"])){
    registrar($_POST["user"],$_POST["pass"],$_POST["nombre"],$_POST["apellido"],$_POST["email"]);
}
if (isset($_POST["username"]) && isset($_POST["password"])) {
    comprobarLogin($_POST["username"], $_POST["password"]);


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
        header("location:logged.php");
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
    $stmt = $dbh->prepare("SELECT  id_user, username, name, surname, biography, last_login_date FROM USERS where id_user = :id");


    $stmt->execute($data);
    $fila = $stmt->fetch();

    $persona=[
        "id"=> $fila["id_user"],
        "username"=>$fila["username"],
        "nombre"=>$fila["name"],
        "apellido"=>$fila["surname"],
        "biografia"=>$fila["biography"],
        "ultimoLogin"=>$fila["last_login_date"]
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