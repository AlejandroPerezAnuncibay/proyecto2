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
        setcookie("nombreUsuario",$nombreUsuario, time()+60);
        setcookie("idUsuario",$idUsuario,time()+60);
        updateLastLogin($usuario);
        close();
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

function cargarUsuario($nombre){

    require_once "bbdd.php";
    $dbh = connect();

    $data = array( 'nombre' => $nombre);
    $stmt = $dbh->prepare("SELECT   username, name, surname, biography, last_login_date FROM USERS where username = :nombre");


    $stmt->execute($data);
    $fila = $stmt->fetch();

    $persona=[
        "username"=>$fila["username"],
        "nombre"=>$fila["name"],
        "apellido"=>$fila["surname"],
        "biografia"=>$fila["biography"],
        "ultimoLogin"=>$fila["last_login_date"]
    ];


    close();
    return $persona;


}


function updateLastLogin($usuario){
    require_once "bbdd.php";
    $dbh = connect();
    $hoy = getdate();
    $data = array( 'username' => $usuario );
    $stmt = $dbh->prepare("UPDATE USERS SET last_login_date = CURRENT_TIMESTAMP where username= :username");


    $stmt->execute($data);


    close();
}
