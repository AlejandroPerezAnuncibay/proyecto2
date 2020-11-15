<?php


error_reporting(E_ALL);
ini_set('display_errors', '1');

$errorLog =null;
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
    $stmt = $dbh->prepare("SELECT username, password FROM USERS where username = :username ");


    $stmt->execute($data);
    $fila = $stmt->fetch();
    if(password_verify($password, $fila['password'])) {
        $fila  = $stmt->fetch();
        $_SESSION["usuario"] = $fila["username"];
        close();
        header("location:logged.php");
    } else{
        $errorLog = "Nombre o contraseña incorrecto";
        close();
        require "index.php";

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

        $errorLog = "El usuario ".$usuario." ha sido registrado";
        close();
        require "index.php";
    } else{
        $errorLog = "Problemas con la Base de datos";
        close();
        require "index.php";

    }


}
