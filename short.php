<!-- PHP CONNEXION -->
<?php
ini_set('display_errors', 1);
//Information to connect our DataBase url
session_start();
$ip = "localhost";
$port = 8888; 
$username = "root";
$password = "root";
$dbname = "url";  // Our Data Base

// PDO : PHP Data Objects
//Connexion to the DataBase url with the port 8888
$pdo = new PDO("mysql:host=$ip;dbname=$dbname", $username, $password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

// Displaying Errors whe turn the display_errors setting to on, which is represented by the number 1
ini_set('display_errors', 1);

/* Catching the url from the form name="url"*/
$monlien = $_POST['url'];


// URL FILTER  + RANDOM CODE GENERATOR
/* Looking if the link is actually a link  */
if (filter_var($monlien, FILTER_VALIDATE_URL))
{
    echo $monlien;
    if(isset($_POST['url'])) {
        /* Generating a random string to be added to the shorten link */
        function randomStringGen($length)
            {
            /* this are the letters who can be used randomly : */    
            $lettering = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $lengthMax = strlen($lettering);
            $randomString = '';
            /* A for loop to catch the letters from $lettering  */
            for ($i = 0; $i < $length; $i++)
            {
            $randomString .= $lettering[rand(0, $lengthMax - 1)];
            }
            return $randomString;
            }
            /* Determining we want 5 random strings */
            $resultRandom = randomStringGen(5);
            echo $resultRandom;
        }    
} 
/* If it's not an alert appears  */
else
{ 
    header('Location: ./index.php?link=error');
    alert("Ceci n'est pas un lien");
}


// REQUEST from the data base : Where whe want to add a link in links who is in the url DB
$stmt_code = $pdo->prepare("
    SELECT url
    FROM links
");

$stmt_code->execute();
$links = $stmt_code->fetchAll(PDO::FETCH_ASSOC);



// INSERT the links after requesting the data base
// It's gonna insert code and the url of the URL in subdomain links
$stmt_code_subU = $pdo->prepare("
    INSERT INTO links (url, code)
    VALUES(:url, :code)
");

$stmt_code_subU->execute([
    ":url" => $monlien,
    ":code" => $resultRandom,
]);


// FEEDBACK
/* Here the shorten code is giving back and verifing if the if condition (of line 27) if verified */
if(isset($_POST['url'])){
    $_SESSION["feedback"] = "http://localhost:8888/urlshort/{$resultRandom}";
    $_SESSION["code"] = $resultRandom;
    echo $_SESSION["feedback"];
/* If not the following message is displayed */    
} else {
    $_SESSION['feedback'] = "La génération de l'URL n'a pas pu se faire, revérifier l'URL inséré.";
}





/* Redirecting to index.php  */
header('Location: index.php');

