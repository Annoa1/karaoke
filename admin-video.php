<?php

include 'include/db.php';
include 'class/VideoManager.class.php';
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
        
        <th>Tnnee</th>
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






      

