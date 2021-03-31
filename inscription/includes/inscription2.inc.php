<?php
ini_set('display_errors', 1);

// Calls the functions from database.inc.php and functions.inc.php

require_once 'database.inc.php';
require_once 'functions.inc.php';


// Loop that verifies if all the fields are correctly filled 

if (isset($_POST["submit"])) 
{

    // Calls all the variables that correspond to the fields the user need to fill

    $mail = filter_input(INPUT_POST, "mail");
    $username = filter_input(INPUT_POST, "username");
    $password = filter_input(INPUT_POST, "password");
    $repeatPassword = filter_input(INPUT_POST, "repeatPassword");


    // If of the fields is empty the user gets an error message saying one of the fields is empty

    if(emptyInputSignup($mail, $username, $password, $repeatPassword) !== false) 
    {
        header("location: ../inscription2.php?error=emptyinput");
        exit();
    }

    
    // If of the username is invalide the user gets an error message saying the username is invalid

    if(invalideUsername($username) !== false) 
    {
        header("location: ../inscription2.php?error=invalidusername");
        exit();
    }


    // If of the email is invalide the user gets an error message saying the email is invalid

    if(invalideMail($mail) !== false) 
    {
        header("location: ../inscription2.php?error=invalidmail");
        exit();
    }


    // If of the passwords aren't exclaty the same the user gets an error message saying that the passwords don't match

    if(passwordMatch($password, $repeatPassword) !== false) 
    {
        header("location: ../inscription2.php?error=passwordsdontmatch");
        exit();
    } 


    // If the user made no mistake, he is loed

    else 
    {
        createUser($pdo, $mail, $username, $password);
        header("location: ../connexion.php");
        exit();
    }
   
}
