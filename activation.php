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

/* Catching the url from urlid*/
$codeId = $_GET['urlid'];

// REQUEST from the data base
//Selcting the STO line from the links db when the code corresponds
$stmt_sto = $pdo->prepare("
    SELECT STO 
    FROM links
    WHERE code = '$codeId'
");

$stmt_sto->execute();
// PDO::FETCH_ASSOC : Bring back only the names of the columns (associative)
$links_sto = $stmt_sto->fetchAll(PDO::FETCH_ASSOC);

var_dump($links_sto);
foreach($links_sto as $links_sto) {
    echo "Hello from " . $links_sto["STO"] . "<br/>";

}


    //UPDATE
    // If the users decides to activate a link the url line is updated with the STO line
    $stmt_ultime = $pdo->prepare("
        UPDATE links
        SET url = :url
        WHERE code = :code
    ");
    $stmt_ultime->execute([
        ":url" => $links_sto["STO"],
        ":code" => $codeId
    ]);

/* Redirecting to myaccount.php  */
header('Location: myaccount.php');

?> 