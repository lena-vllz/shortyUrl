<!-- PHP CONNEXION -->
<?php 
//Information to connect our DataBase url
$ip = "localhost";
$port = 8888; 
$username = "root";
$password = "root";
$dbname = "url"; // Our Data Base

//Creating a new session or using à existing one
session_start();
//requires myaccount.php to use codeId
require_once ('myaccount.php');

// PDO : PHP Data Objects
//Connexion to the DataBase url with the port 8888
$pdo = new PDO("mysql:host=$ip;dbname=$dbname", $username, $password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);
/* Catching the url from urlid*/
$codeId = $_GET['urlid'];

//UPDATE
// If the users decides to desactivate a link the url line is updated with the url ./404error/404error.php
$stmt = $pdo->prepare("
    UPDATE links
    SET url = :url
    WHERE code = :code
");
$stmt->execute([
    ":url" => './404error/404error.php',
    ":code" => $codeId
]);

?> 