<?php
if (isset($_POST["action"])){
    $action=$_POST["action"];

    switch($action){
        case "checkUsername": checkUsername();break;
    }

}
function checkUsername(){
    require_once "bbdd.php";
    $dbh = connect();

    $data = array("username" => $_POST["value"]);
    $stmt = $dbh->prepare("SELECT id_user FROM USERS WHERE username LIKE :username LIMIT 1");

    $stmt->execute($data);
    $aviable = $stmt->fetchColumn();

    close();

    echo $aviable;
}