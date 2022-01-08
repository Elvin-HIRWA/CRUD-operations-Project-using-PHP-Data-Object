<?php

try {
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "crud";

    $connect = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);

    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo $e->getmessage();
}