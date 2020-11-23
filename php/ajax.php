<?php
if (isset($_POST["action"])){
    $action=$_POST["action"];

    switch($action){
        case "checkUsername": checkUsername();break;
        case "checkEmail": checkEmail();break;
        case "likePregunta": likePregunta();break;
    }

}
function checkUsername(){
    require_once "bbdd.php";
    $dbh = connect();

    $data = array("username" => $_POST["value"]);
    $stmt = $dbh->prepare("SELECT COUNT(*) FROM USERS WHERE username LIKE :username LIMIT 1;");

    $stmt->execute($data);
    $aviable = $stmt->fetchColumn();
    close();

    echo $aviable;
}
function checkEmail(){
    require_once "bbdd.php";
    $dbh = connect();
    $data = array("email" => $_POST["value"]);
    $stmt = $dbh->prepare("SELECT COUNT(*) FROM USERS WHERE email LIKE :email LIMIT 1;"); 

    $stmt->execute($data);
    $aviable = $stmt->fetchColumn();
    close();

    echo $aviable;
}
function likePregunta(){
    session_start();
    if(isset($_SESSION["idUsuario"])){

    require_once "bbdd.php";
    $dbh = connect();

    $data = array("idPregunta" => $_POST["pregunta"],"idUsuario" => $_SESSION["idUsuario"]);

    //busco el like por si esta dado, si esta dado, lo quito, si no esta, lo añado
    $stmt = $dbh->prepare("SELECT COUNT(*) FROM `LIKES_QUESTIONS` WHERE `id_question` = :idPregunta AND `id_user` = :idUsuario LIMIT 1;");
    $stmt->execute($data);
    $response = $stmt->fetchColumn();

    if ($response==1){
        //el like ya esta dado, lo tenemos que deletear
        $stmt = $dbh->prepare("DELETE FROM `LIKES_QUESTIONS` WHERE `LIKES_QUESTIONS`.`id_user` = :idUsuario AND `LIKES_QUESTIONS`.`id_question` = :idPregunta;");
        $stmt->execute($data);
    } else {
        //el like no esta dado, lo tenemos que instertar
        $stmt = $dbh->prepare("INSERT INTO `LIKES_QUESTIONS` (`id_user`, `id_question`) VALUES (:idUsuario, :idPregunta);");
        $stmt->execute($data);
    }
    //vuelvo a buscar el like para saber si la operacion que se tenia que hacer se ha hecho correctamente

    $stmt = $dbh->prepare("SELECT COUNT(*) FROM `LIKES_QUESTIONS` WHERE `id_question` = :idPregunta AND `id_user` = :idUsuario LIMIT 1;");
    $stmt->execute($data);
    $response = $stmt->fetchColumn();
    close();

    echo $response;
    }
}