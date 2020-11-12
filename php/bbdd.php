<?php
function connect()
{
    $host = "172.20.224.123:3306";
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