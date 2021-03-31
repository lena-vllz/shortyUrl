<!-- PHP CONNEXION -->
<?php 
//Information to connect our DataBase url
$ip = "localhost";
$port = 8888; // Par défaut
$username = "root";
$password = "root";
$dbname = "url"; // Our Data Base

//Creating a new session or using à existing one
session_start();


// PDO : PHP Data Objects
//Connexion to the DataBase url with the port 8888
$pdo = new PDO("mysql:host=$ip;dbname=$dbname", $username, $password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);
?>

<?php


/* Catching the url from getcode*/
$myUrl = $_GET['getcode'];
echo $myUrl;


// REQUEST from the data base : Where whe want to add a url in links who. Applies to the one with catched getcode
$stmt = $pdo->prepare("
    SELECT url 
    FROM links
    WHERE code = '$myUrl'
");

$stmt->execute();
$links = $stmt->fetchAll(PDO::FETCH_BOTH);
echo $link["url"];
foreach($links as $links) {
    echo $links["url"] . "<br/>";
}
$urlFinal = $links["url"];


// REQUEST from the data base : Where whe want to add a cliks in links who is in the links DB. Applies to the one with catched getcode
$stmt_click = $pdo->prepare("
    SELECT click 
    FROM links
    WHERE code = '$myUrl'
");

$stmt_click->execute();
$links = $stmt_click->fetchAll(PDO::FETCH_ASSOC);
foreach($links as $links) {
    echo $links["click"] . "<br/>";
}
$count = $links["click"];
$count = $count +1;


// UPDATE
//Updating the numbers of cliks per link with the line click in links db
$stmt_incre = $pdo->prepare("
    UPDATE links
    SET click = :click
    WHERE code = :code
");
$stmt_incre->execute([
    ":click" => $count,
    ":code" => $myUrl,
]);


/* Redirecting to index.php  */
header("Location:$urlFinal");



?>

