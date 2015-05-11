<?php
// zone BDD

include 'include/db.php';

// Zone administration
    //Administration User
require_once 'class/User.class.php';
session_start();


require_once 'include/fonctions.php';

check_admin();

$_SESSION['page'] = 'videos';
    //Administration Vidéo

include 'class/VideoManager.class.php';
include 'class/Video.class.php';
$db = db_connexion();
$videoManager = new VideoManager($db);
$videos = $videoManager->getList();

?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Gestion des vidéos</title>
        <link rel="stylesheet" href="./css/style.css">
    </head>

    <body>
        <header>
            <div class="topHeader">
                <img src="./img/octosing_logo.png" width="80" height="80">
                <h1>OKTOSING - Les chansons poulpesques d'OKTO</h1>
            </div>

            <div class="botHeader">
                <nav class="menuHeader">
                    <ul>
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="connexion.php">Connexion</a></li>
                        <li><a href="inscription.php">Inscription</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <div class="mainContainer">
            <h3 id="connexion">Liste des videos :</h3>
            
    <table>
      <tr>
        <th>Titre</th>
        
        <th>Annee</th>
      </tr>
      <?php
        
        foreach ($videos as $video) {
          echo '<tr>';
          echo '<td>'.$video->title().'</td>';
          echo '<td>'.$video->year().'</td>';
          
          echo '<td><button><a href=delete.php?id='.$video->id().'>Supprimer</a></button></td>';
          echo '<td><button><a href=modif.php?id='.$video->id().'>Modifier</a></button></td>';
          echo '</tr> ';

             }
echo '</table> <br><button><a href="addVideo.php">Ajouter une nouvelle video</a></button>';
      ?>
   
        </div>
    </body>

    <footer>
        <p>Copyright © 2015 by The Oktogirls' Band</p>
    </footer>
</html>     




<!-- 

      

=======


?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Panneau d'admin - Vidéos</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="icon" type="./img/png" href="./img/favicon.png"/>
  </head>
  <body>
    <?php include('include/admin-header.php') ?>
    <div id="content">
      <p>En construction.</p>
    </div>
    <?php include('include/admin-footer.php') ?>
  </body>
</html>

 -->