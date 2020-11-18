<?php

session_start();

// Recibo los datos de la imagen
$nombre_img = $_FILES['imagen']['name'];
$tipo = $_FILES['imagen']['type'];
$tamano = $_FILES['imagen']['size'];
$extension = pathinfo($nombre_img, PATHINFO_EXTENSION);
$directorio ="";

//Si existe imagen y tiene un tamaño correcto

    //indicamos los formatos que permitimos subir a nuestro servidor
    if (($_FILES["imagen"]["type"] == "image/gif")
        || ($_FILES["imagen"]["type"] == "image/jpeg")
        || ($_FILES["imagen"]["type"] == "image/jpg")
        || ($_FILES["imagen"]["type"] == "image/png"))
    {
        // Ruta donde se guardarán las imágenes que subamos
        $directorio = /*$_SERVER['DOCUMENT_ROOT'].*/'/vagrant/images/userProfile/';
        // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
        move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$_SESSION["nombreUsuario"].".".$extension);

    }
        else
    {
        //si no cumple con el formato
        echo "No se puede subir una imagen con ese formato ";
    }


require_once "bbdd.php";
$dbh = connect();

$data = array( 'ruta' => "../images/userProfile/".$_SESSION["nombreUsuario"].".".$extension, 'id' => $_SESSION["idUsuario"]);
$stmt = $dbh->prepare("UPDATE USERS SET profile_image = :ruta where id_user= :id");


$stmt->execute($data);
close();
header("Location: user.php");





