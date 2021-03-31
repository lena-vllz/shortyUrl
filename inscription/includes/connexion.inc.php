<?php
ini_set('display_errors', 1);
if (isset($_POST["submit"])) {

    $username = filter_input(INPUT_POST, "username");
    $password = filter_input(INPUT_POST, "password");


    // Calls the functions from database.inc.php and functions.inc.php

    require_once('database.inc.php');
    require_once('functions.inc.php');


    // If the user does not fills all the input he is sent back to the connexion page

    if(emptyInputLogin($username, $password)) 
    {
        header("location: ../connexion.php?error=emptyinput");
        exit();
    } 

    
    // If he did everything good is he connected

    else 
    {
        loginUser($pdo, $username, $password);
        header("location: ../../myaccount.php");
        exit();
    }
}

?>