<!-- This page is intended for the users who are connected to their account -->
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
// Displaying Errors whe turn the display_errors setting to on, which is represented by the number 1
ini_set('display_errors', 1);


// PDO : PHP Data Objects
//Connexion to the DataBase url with the port 8888
$pdo = new PDO("mysql:host=$ip;dbname=$dbname", $username, $password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

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
else
/* If it's not an alert appears  */
{ 
    header('Location: ./myaccount.php?link=error');
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
    INSERT INTO links (url, code, STO, connectionid)
    VALUES(:url, :code, :STO, :connectionid)
");

$stmt_code_subU->execute([
    ":url" => $monlien,
    ":code" => $resultRandom,
    ":STO" => $monlien,
    ":connectionid" => $_SESSION["id"],
]);


// FEEDBACK
/* Here the shorten code is giving back and verifing if the if condition (of line 27) if verified */
if(isset($_POST['url'])){
    $_SESSION["feedback_account"] = "http://localhost:8888/urlshort/{$resultRandom}";
    echo $_SESSION["feedback_account"];
    $_SESSION["code"] = $resultRandom;
    
} else {
    $_SESSION['feedback_account'] = "La génération de l'URL n'a pas pu se faire, revérifier l'URL inséré.";
}



/* Catching the url from the form name="nameurl" (myaccount.php)*/
$bigname = $_POST['nameurl'];
echo $bigname;

// REQUEST from the data base : Where whe want to add a link in links who is in the linkname DB
$stmt_bigname = $pdo->prepare("
    SELECT linkname 
    FROM links
");

$stmt_bigname->execute();
$links = $stmt_bigname->fetchAll(PDO::FETCH_ASSOC);

//echo of all the links you created
foreach($links as $links) {
    echo "Hello from " . $links["linkname"] . "<br/>";
}

/* Catching the url from the form name="getcode" (myaccount.php)*/
$myUrl = $_POST['getcode'];
echo $myUrl;

//UPDATE
// The Name the user gave to the link is being updated in the table links. The lines name is linkname
$stmt = $pdo->prepare("
    UPDATE links
    SET linkname = :linkname
    WHERE code = :code
");
$stmt->execute([
    ":linkname" => $bigname,
    ":code" => $resultRandom
]);
echo $bigname;


/* Redirecting to myaccount.php  */
header('Location: myaccount.php');

