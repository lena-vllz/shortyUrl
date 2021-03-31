<?php


// Function that verifies if one of the fields if empty and returns a result depending of the emptyness of the fields

function emptyInputSignup($mail, $username, $password, $repeatPassword) 
{
    $result;
    if (empty($mail) || empty($username) || empty($password) || empty($repeatPassword))
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return $result;
}


// Function that verifies if the username entered by the user is valid (based on certain accepted caracters)

function invalideUsername($username) 
{
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username))
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return $result;
}


// Function that verifies if the mail is valid thanks to a PHP function

function invalideMail($mail) 
{
    $result;
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL))
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return $result;
}


// Function that verifies if both passwords entered by the user are excalty the same

function passwordMatch($password, $repeatPassword) 
{
    $result;
    if ($password !== $repeatPassword)
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return $result;
}


function createUser($pdo, $mail, $username, $password)
{
    $stmt = $pdo->prepare("
        SELECT * FROM users WHERE usersUsername = :usersUsername OR usersMail = :usersMail
    ");

    $stmt->execute([
        ":usersUsername" => $username,
        ":usersMail" => $mail,
    ]);
    $result = $stmt->rowCount();

    if ($result == 0) {
        $stmt = $pdo->prepare("
            INSERT INTO users (usersUsername, usersMail, usersPassword)
            VALUES (:usersUsername, :usersMail, :usersPassword)"
        );

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        $stmt->execute([
            ":usersUsername" => $username,
            ":usersMail" => $mail,
            ":usersPassword" => $hashedPwd,
        ]);

    } else {
        header("location: ../inscription.php?error=usernametaken");
        exit();
    }
}


// Function that verifies if one of the inputs used to login is empty

function emptyInputLogin($username, $password) 
{
    if (empty($username) || empty($password))
    {
        return true;
    }
    else
    {
        return false;
    }
}


// Function that logs de user

function loginUser($pdo, $username, $password)
{
    $stmt = $pdo->prepare("SELECT * FROM users WHERE usersUsername = :usersUsername");
    $stmt->execute([":usersUsername" => $username]);
    $resultData = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($resultData) { 
        $checkPassword = password_verify($password, $resultData["usersPassword"]);
        var_dump($pass);
        if ($checkPassword == false) {
            header("location: ../connexion.php?error=wronglogin");
            exit();
            
        } 
        else 
        {
            session_start();
            $_SESSION["user"] = $resultData["usersUsername"];
            $_SESSION["mail"] = $resultData["usersMail"];
            $_SESSION["id"] = $resultData["usersId"];
            // header("location: ../../myaccount.php");
            // exit();
        }
    } else {
        header("location: ../connexion.php?error=wronglogin");
        exit();
    }

}