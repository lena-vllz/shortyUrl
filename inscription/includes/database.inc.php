<?php

// Collect the differents data of the database

$ip = "localhost";
$port = 8888;
$databaseUsername = "root";
$databasePassword = "root";
$databaseName = "url";


// Variable that collect the data from the database


$pdo = new PDO("mysql:host=$ip;dbname=$databaseName", $databaseUsername, $databasePassword, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);


?>