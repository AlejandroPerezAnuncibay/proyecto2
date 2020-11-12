<?php
function connect()
{
    $host = "localhost";
    $dbname = "aergibide";
    $user = "jefe";
    $pass = "Jm12345";
    $dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    try {


        $dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $dbh;
}