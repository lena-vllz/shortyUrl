<!-- PHP CONNEXION -->
<!-- This page is intended for the users who are connected to their account -->
<?php 


// //Information to connect our DataBase url
$ip = "localhost";
$port = 8888; 
$username = "root";
$password = "root";
$dbname = "url"; // Our Data Base

//Creating a new session or using à existing one
session_start();
//requires redirect.php
require_once ('redirect.php');

// // PDO : PHP Data Objects
//Connexion to the DataBase url with the port 8888
$pdo = new PDO("mysql:host=$ip;dbname=$dbname", $username, $password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

?>

<!-- HTML CODE -->
<!DOCTYPE html>
<html lang="fr">
<!-- element (which are displayed on the page when loaded in a browser) -->
  <head>
    <meta charset="utf-8">
    <title>Mon compte - ShortyURL</title>
    <meta name="descritpion" content="descritpion">
    <link rel="stylesheet" href="styles/myaccount.css">
  </head>
    <!-- Beggining of the body of index.php -->
  <body>
    <div class="conteneur">
    <div class="navbar">
        <a href="index.php"><svg class="logo" id="Calque_1" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 162 110.43"><defs><style>.cls-1{fill:#f74d41;}</style></defs><path d="M886,499.18c0,3.75,2.45,6.05,8.5,9.8l5.25,3.24c5,3,8.07,6.26,8.07,11.59,0,8.35-6.84,13.32-13.83,13.32-7.42,0-12.31-5.18-14.54-12l6-3.46c2.52,9.29,6.84,12.39,10.66,12.39,4.1,0,7.06-2.45,7.06-6.63,0-3.81-1.16-6.19-6.77-9.65l-6.63-4.1c-4.68-2.88-8.49-6-8.49-11.67,0-7.05,6-13.17,15.69-13.17a25.11,25.11,0,0,1,9.44,1.51l-1.44,10.51c-3.39-6.12-7.92-8.64-12.32-8.64C888.55,492.27,886,494.86,886,499.18Z" transform="translate(-879.41 -485.29)"/><path d="M939.24,536.19H932.4a56,56,0,0,1-.94-11.16v-14c0-4.54-1.51-7.06-5.18-7.06-2,0-4.61.72-7.49,4.17v16.64a30.63,30.63,0,0,0,1.73,11.37h-9.36a30.63,30.63,0,0,0,1.73-11.37V501.34c0-4.75-.15-9.79-1.73-13.1a32.57,32.57,0,0,0,7.63-2.95v20.88c3.1-5,6.91-6.55,10.51-6.55,4.76,0,8.07,2.88,8.07,10.08v15.12A30.87,30.87,0,0,0,939.24,536.19Z" transform="translate(-879.41 -485.29)"/><path d="M942.26,518.12c0-11.23,5.83-18.65,14.26-18.65,9.07,0,13.82,8.57,13.82,18.8,0,11.16-5.76,18.72-14.25,18.72C946.94,537,942.26,528.27,942.26,518.12Zm21.39,1.73c0-9.43-2.23-18.15-7.92-18.15-4.32,0-6.84,5-6.84,14.91,0,9.5,2.3,18.14,7.92,18.14C960.91,534.75,963.65,530.07,963.65,519.85Z" transform="translate(-879.41 -485.29)"/><path d="M993.17,499.9l-1.52,7.42a7.36,7.36,0,0,0-5.54-3.24c-3.82,0-4.39,5.62-4.39,12.1v8.64a28,28,0,0,0,1.8,11.37h-9.43a29.25,29.25,0,0,0,1.72-11.37v-9.15c0-4.75-.5-9.93-2.16-13.25a67.45,67.45,0,0,0,6.56-2.95,21,21,0,0,1,1.51,6.77v.29c1.58-6,4.25-7,8.35-7A14,14,0,0,1,993.17,499.9Z" transform="translate(-879.41 -485.29)"/><path d="M1011.45,529.64c0,3.31-3.17,7.35-8.06,7.35-4.61,0-6.41-3.67-6.41-9.65V502.28h-3.89l.29-2.09H997a56,56,0,0,0-.43-6.62,42.38,42.38,0,0,0,6.33-3v9.65h8.43l-.36,2.09h-8.07v24.27c0,1.29,0,5.11,3.68,5.11C1008,531.66,1009.29,531.08,1011.45,529.64Z" transform="translate(-879.41 -485.29)"/><path d="M1041.41,500.19c-2.45,2.74-3.68,6-5.48,11.16l-9.65,27.94c-3,8.79-5,11.31-10.44,11.31h-2.73l-.43-8.07a10.92,10.92,0,0,0,5.25,1.73c3.17,0,5.26-2.38,6.48-6.19l1.08-3.32h-2.88l-7.63-23.4c-1.73-5.18-2.88-8.28-5.18-11.16h11.3a12.68,12.68,0,0,0-.58,4.32,22.33,22.33,0,0,0,.94,6.48l5.76,18.51,6.19-18.51a18.13,18.13,0,0,0,.8-5.61,15.08,15.08,0,0,0-.72-5.19Z" transform="translate(-879.41 -485.29)"/><path class="cls-1" d="M919.68,543a37.35,37.35,0,0,0-2.22,13.76v22.94c0,6.56-3,16-16.76,16-13.45,0-16.61-9.41-16.61-15.89v-23A40.85,40.85,0,0,0,882,543h15.9c-1.82,4.58-1.9,9.49-1.9,13.76v22.38c0,6.33,3.24,9.57,8.78,9.57,5.38,0,8.07-3.24,8.07-9.57V556.8A34.72,34.72,0,0,0,910.43,543Z" transform="translate(-879.41 -485.29)"/><path class="cls-1" d="M963.65,594.45H948.86l-4.35-16c-1-3.64-2-5.38-3.48-5.61-.87-.08-2-.08-3-.08v8.06a52.48,52.48,0,0,0,2.06,13.61H923.79a42.09,42.09,0,0,0,2.13-13.61V556.56A37.94,37.94,0,0,0,923.63,543h19.69c8.78,0,16.85,3.56,16.85,13.84,0,7.59-5.3,11.7-9.41,13.52,3.71.24,5,1.66,6.32,6.25l2.85,10.05A24.65,24.65,0,0,0,963.65,594.45ZM938,556.56v13.05c7,0,9.89-1.42,9.89-11.23-.08-7.27-3.09-11.78-7.83-11.78a18.44,18.44,0,0,0-2.06.08C937.94,550.08,938,553.4,938,556.56Z" transform="translate(-879.41 -485.29)"/><path class="cls-1" d="M997.32,579.34l-.16,15.11H966.71a44.41,44.41,0,0,0,2.14-13.61V556.56a39.82,39.82,0,0,0-2.3-13.52h15.58a54.35,54.35,0,0,0-1.5,13.52v24.28a56.59,56.59,0,0,0,.63,9.49h1.19C987.83,590.33,994.08,586.22,997.32,579.34Z" transform="translate(-879.41 -485.29)"/></svg> </a>
        <ul class="menu">
          <!-- Displays the Connexion if you aren't connected/ Displays the unconnexion if you connected -->
          <?php
          if(isset($_SESSION["user"]))
          {
            echo "<a href='myaccount.php'><li class='myaccount'>Mon compte</li></a>";
            echo "<a href='./inscription/includes/deco.inc.php'><li>Déconnexion</li></a>";
          }
          else{
            echo "<a href='inscription/connexion.php'><li>Connexion</li></a>";
            echo "<a href='inscription/inscription.php'><li>Inscription</li></a>";
          }
          ?>
           <!--  Image for the dark/light mode -->
          <img class="colorMode" src="./assets/sun.png">
        </ul>
      </div>
      <div class="contain">
        <div class="shortcontain">
            <span class="titre">Mon compte</span>
            <!-- <?php echo $_SESSION["user"]?> -->

            <div class="input">
                <!-- The action will go to shorten.phpp -->
                <form action="short_account.php" method="post">
                    <input type="text" class="logs" name="nameurl" placeholder="Entrez le nom de votre lien." autocomplete="off"> 
                    <div class="shorten">
                        <div class="button">
                            <input type="url" class="logs" name="url" placeholder="Entrez votre url ici." autocomplete="off">
                            <div class="submit">
                                <input type="submit" class="connexion" value="Raccourcir">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
             




            </form>
            <span class="mylink">Mes liens</span>
        </div>
        <!-- HTML code showing the short URL -->
        <!-- <div class="urlcodedisplay">Voici votre ShortyURL : <a class="linkshort" href="<?php echo $_SESSION['feedback_account']; ?>" target='_blank'><?php echo $_SESSION['feedback_account']?></a>  -->

        <!-- Opening a PHP element to check the link -->  
        <?php
        $code = $_SESSION["code"];
        // REQUEST from the data base : Where we want to add a linkname in links who is in the links DB. Applies to the one with catched '$clicknumber[1]'
        $stmt = $pdo->prepare("
            SELECT click, linkname
            FROM links
            WHERE code = '$code'
        ");
        
        $stmt->execute();


        // REQUEST from the data base : Where we want to add a code, click, linkname, connectionId in links who is in the url DB
        $stmt1 = $pdo->prepare("
            SELECT code, click, linkname, connectionId, url, STO
            FROM links
        ");
        $stmt1->execute();
        $otherlinks = $stmt1->fetchAll(PDO::FETCH_BOTH);

        //echo of all the links you created
        foreach($otherlinks as $otherlink){
            $linkurl = "http://localhost:8888/urlshort/{$otherlink['code']}";
            if ($_SESSION["id"] === $otherlink["connectionId"]) {
                if ($otherlink["click"] == 0 or $otherlink["click"] == 1){
                    echo 
                    "<div class='subcontain'>
                    <div class='information'>
                        <div class='name2'>
                            <div class='blabla'> " .$otherlink['linkname'] . "</div>" . 
                            "<div class='linkurl'> <a  class='linkshort' href={$linkurl} target='_blank'>$linkurl</a>" . "</div> 
                        </div>
        
                        <div class='click'>" .$otherlink['click'] ." <span class='clic'> clic </span></div> 
                    </div>"
                    ."<div class='bouton'>
                    <div class='activate'> <a href='activation.php?urlid={$otherlink['code']}'>Activer</a>"."</div>".
                    "<div class='desactivate'><a href='desactivation.php?urlid={$otherlink['code']}'>Désactiver</a>"."</div>".
                    "<br><br>
                    </div>
                    </div>";
        

                } else {
                    echo 
                    "<div class='subcontain'>
                    <div class='information'>
                        <div class='name2'>
                            <div class='blabla'> " .$otherlink['linkname'] . "</div>" . 
                            "<div class='linkurl'> <a  class='linkshort' href={$linkurl} target='_blank'>$linkurl</a>" . "</div> 
                        </div>
        
                        <div class='click'>" .$otherlink['click'] ." <span class='clic'> clics </span></div> 
                    </div>"
                    ."<div class='bouton'>
                    <div class='activate'> <a href='activation.php?urlid={$otherlink['code']}'>Activer</a>"."</div>".
                    "<div class='desactivate'><a href='desactivation.php?urlid={$otherlink['code']}'>Désactiver</a>"."</div>".
                    "<br><br>
                    </div>
                    </div>";

                }
            }
        }


// REQUEST from the data base : Where whe want to add a url in links who.
$stmt = $pdo->prepare("
    SELECT url
    FROM links
");
$stmt->execute();
$links = $stmt->fetchAll(PDO::FETCH_ASSOC);


        ?>

        </div>
            <?php
            /* if condition is here to check the link is in the form  */
                if(isset($_GET['link']))
                {
                    $error = ($_GET['link']);
                    switch($error)
                    {
                        case 'error':
                            ?>
                            <!-- If the case is not matcht it's an error and the following sentens is displayed -->
                            <p class="error">Vous êtes perdu...</p>
                                    <?php 
                            }
                        }
                    ?>                                        
        </div>
            <div class="illu">
                <img class="linkPict" src="Assets/anim_stat.gif" />
            </div>
    </div> 
    <script>
    // Loop that sets the darkmode and lightmode and change the icon

    color = false
      const colorMode = document.querySelector('.colorMode')

      colorMode.addEventListener('click', () => {
        if (color == false) 
        {
        colorMode.src = "./assets/sun.png"
        color = true
        document.documentElement.setAttribute('data-theme', 'default')
        }
        else if (color == true) 
        {
        colorMode.src = "./assets/moon.png"
        color = false
        console.log(colorMode)
        document.documentElement.setAttribute('data-theme', 'dark')
        }   
      })

    const activ = document.querySelector('.activate')
    const unactiv = document.querySelector('.desactivate')


// this is a feature we tried to implement to our website but it only works for the latest link that was created
    classActiv = false

    activ.addEventListener('click', () => {
        if (classActiv == false)
        {
            activ.classList.remove('activate')
            activ.classList.add('desactivate')
            unactiv.classList.remove('desactivate')
            unactiv.classList.add('activate')
            activ.textContent = 'Activer'
            unactiv.textContent = 'Désactivé'
            classActiv = true
        }
        else
        {
            activ.classList.remove('desactivate')
            activ.classList.add('activate')
            unactiv.classList.remove('activate')
            unactiv.classList.add('desactivate')
            activ.textContent = 'Activé'
            unactiv.textContent = 'Désactiver'
            classActiv = false
        }
    })

    unactiv.addEventListener('click', () => {
        if (classActiv == false)
        {
            unactiv.classList.remove('desactivate')
            unactiv.classList.add('activate')
            activ.classList.add('desactivate')
            activ.classList.remove('activate')
            activ.textContent = 'Activer'
            unactiv.textContent = 'Désactivé'
            
            classActiv = true
        }
        else
        {
            unactiv.classList.add('desactivate')
            unactiv.classList.remove('activate')
            activ.classList.remove('desactivate')
            activ.classList.add('activate')
            activ.textContent = 'Activé'
            unactiv.textContent = 'Désactiver'
            classActiv = false
        }
    })

    console.log(activ, unactiv)
    </script>
    </body>
</html>