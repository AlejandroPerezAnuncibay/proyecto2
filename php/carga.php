<?php

session_start();
if (isset($_GET["reply"])){
    insertarRespuesta($_POST["description"]);
}else
if (isset($_GET["insertar"]))
{
    subidaArchivos();
   insertarPregunta($_POST["title"],$_POST["description"],$_POST["tags"]);
}else {
// Recibo los datos de la imagen
    $nombre_img = $_FILES['imagen']['name'];
    $tipo = $_FILES['imagen']['type'];
    $tamano = $_FILES['imagen']['size'];
    $extension = pathinfo($nombre_img, PATHINFO_EXTENSION);
    $directorio = "";

//Si existe imagen y tiene un tamaño correcto

    //indicamos los formatos que permitimos subir a nuestro servidor
    if (($_FILES["imagen"]["type"] == "image/gif")
        || ($_FILES["imagen"]["type"] == "image/jpeg")
        || ($_FILES["imagen"]["type"] == "image/jpg")
        || ($_FILES["imagen"]["type"] == "image/png")) {
        // Ruta donde se guardarán las imágenes que subamos
        $directorio = /*$_SERVER['DOCUMENT_ROOT'].*/
            '/vagrant/images/userProfile/';
        // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
        move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio . $_SESSION["nombreUsuario"] . "." . $extension);

    } else {
        //si no cumple con el formato
        echo "No se puede subir una imagen con ese formato ";
    }


    require_once "bbdd.php";
    $dbh = connect();
//En caso que detecte que la contraseña tambien va a ser modificada se encarga de encriptarla para actualizarla
//en la base de datos
    if (isset($_POST["pass"])) {
        $pass = password_hash($_POST["pass"], PASSWORD_DEFAULT);

        $data = array('id' => $_SESSION["idUsuario"], 'pass' => $pass,);
        $stmt = $dbh->prepare("UPDATE USERS SET password = :pass where id_user= :id");


        $stmt->execute($data);
        close();

        header("Location: user.php");
    } else {
        //En caso de que detecte que hay una imagen, se recogeran los datos previamente preparados para guardar la ruta de
        //la nueva imagen
        if ($tamano > 0) {

            //Preparamos los datos con los proporcionados por el usuario.
            $data = array(
                'ruta' => "../images/userProfile/" . $_SESSION["nombreUsuario"] . "." . $extension,
                'id' => $_SESSION["idUsuario"],
                'username' => $_POST["user"],
                'name' => $_POST["nombre"],
                'ape' => $_POST["apellido"],
                'email' => $_POST["email"],
                'bio' => $_POST["bio"]);

            $stmt = $dbh->prepare("UPDATE USERS SET username = :username, name = :name, surname = :ape, email = :email, profile_image = :ruta, biography = :bio where id_user= :id");


            $stmt->execute($data);
            close();

            header("Location: user.php");
        } else {
            //Esto se ejecutará en caso de que no haya subido ninguna imagen. Se le quedara la imagen que ya tenia.
            $data = array(
                'id' => $_SESSION["idUsuario"],
                'username' => $_POST["user"],
                'name' => $_POST["nombre"],
                'ape' => $_POST["apellido"],
                'email' => $_POST["email"],
                'bio' => $_POST["bio"]);

            $stmt = $dbh->prepare("UPDATE USERS SET username = :username, name = :name, surname = :ape, email = :email,  biography = :bio where id_user= :id");


            $stmt->execute($data);
            close();

            header("Location: user.php");
        }

    }
}


function insertarPregunta($titulo,$descripcion,$etiqueta){


    require_once "bbdd.php";
    $dbh = connect();
    $idUsuario = $_SESSION["idUsuario"];
    $eti = sacarIdEtiqueta($etiqueta);
    $data = array('titulo'=>$titulo, 'desc' => $descripcion, 'usuario'=>$idUsuario,'etiqueta'=>$eti);
    $stmt = $dbh->prepare("insert into QUESTIONS (title, text, id_user, id_topic) values(:titulo,:desc, :usuario,:etiqueta)");
    $stmt->execute($data);

    close();
    header("Location: home.php");



}


function sacarIdEtiqueta($etiqueta){
    require_once "bbdd.php";
    $dbh = connect();

    $data = array('etiqueta'=>$etiqueta);
    $stmt = $dbh->prepare("SELECT id_topic, name from TOPICS where name = :etiqueta");
    $stmt->execute($data);
    close();
    $fila = $stmt->fetch();

    return $fila["id_topic"];
}


function insertarRespuesta($descripcion){


    require_once "bbdd.php";
    $dbh = connect();
    $idUsuario = $_SESSION["idUsuario"];

    $data = array( 'desc' => $descripcion, 'usuario'=>$idUsuario, 'idPregunta'=>$_GET["reply"]);

    $stmt = $dbh->prepare("insert into ANSWERS (text,id_question, id_user) values(:desc, :idPregunta,:usuario)");
    $stmt->execute($data);

    close();
    header("Location: preguntas.php?pregunta=".$_GET["reply"]);



}


function subidaArchivos(){
//Como el elemento es un arreglos utilizamos foreach para extraer todos los valores
foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name)
    {
        //Validamos que el archivo exista
        if($_FILES["archivo"]["name"][$key]) {
            $filename = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
            $source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo

            $directorio = '../images/questionMedia/'; //Declaramos un  variable con la ruta donde guardaremos los archivos

            //Validamos si la ruta de destino existe, en caso de no existir la creamos
            if(!file_exists($directorio)){
                mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
            }

            $dir=opendir($directorio); //Abrimos el directorio de destino
            $target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo

            //Movemos y validamos que el archivo se haya cargado correctamente
            //El primer campo es el origen y el segundo el destino
            if(move_uploaded_file($source, $target_path)) {
                echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
            } else {
                echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
            }
            closedir($dir); //Cerramos el directorio de destino
        }
    }

}