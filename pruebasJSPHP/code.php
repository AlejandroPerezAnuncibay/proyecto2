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
    $data = array( 'username' => $usuario, 'password' => $password );
    $stmt = $dbh->prepare("SELECT * FROM USUARIOS where username = :username AND password = :password");


    $stmt->execute($data);
    if($stmt->rowCount() == 1) {
        $fila  = $stmt->fetch();
        $_SESSION["usuario"] = $fila["username"];
        header("location:logged.php");
    } else{
        echo "Nombre o contraseña incorrecto";
        header("location:login.php");

}

    /*if (isset($row)){

   */


}



function registrar($usuario, $password,$nombre,$apellido,$mail){
    require_once "bbdd.php";
    $dbh = connect();
    $data = array('usuario'=>$usuario, 'password' => $password/*, 'nombre'=>$nombre,'apellido'=>$apellido,'mail' =>$mail*/);
    $stmt = $dbh->prepare("insert into USUARIOS(id_user, username, password) values(3,:usuario,:password)");
    $stmt->execute($data);
    header('Location: logged.php');





}
require "login.php";