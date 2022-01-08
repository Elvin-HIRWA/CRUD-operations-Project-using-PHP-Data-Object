<?php

include("include/connection.php");


$firstname = $_POST['fname'];
$surname = $_POST['sname'];
$username = $_POST['uname'];
$email = $_POST['email'];


$pdo = $connect->prepare("INSERT INTO crud_items(firstname,surname,username,email) VALUES(?,?,?,?)");

$arr = array($firstname,$surname,$username,$username);

$pdo->execute($arr);



?>

