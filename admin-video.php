<?php

// Zone administration
// Administration User
require_once 'class/User.class.php';
session_start();

// zone BDD
include 'include/db.php';
include 'class/VideoManager.class.php';
require_once 'include/fonctions.php';

check_admin();

$_SESSION['page'] = 'videos';

// Administration Vidéo
$db = db_connexion();
$videoManager = new VideoManager($db);
$videos = $videoManager->getList();

?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Gestion des vidéos</title>
        <link rel="stylesheet" href="./css/admin.css">
        <link rel="icon" type="./img/png" href="./img/favicon.png"/>

    </head>

    <body>
    
    <?php include('include/admin-header.php') ?>
          
    <div id="content">
    
        <h3 id="connexion">Liste des videos :</h3>
        <?php if ($_SESSION['msg']) {
            echo "<p>".$_SESSION['msg']."</p>";
            $_SESSION['msg'] = null;
        }
       //var_dump($videos);
       ?>
        <table>
            <tr>
                <th>Titre</th>
                <th>Annee</th>
                <th>Pays</th>
                <th>Fichiers sous-titres</th>
                <th>Artistes</th>
            </tr>
            <?php
        
            foreach ($videos as $video) {
              echo '<tr>';
              echo '<td>'.$video->title().'</td>';
              echo '<td>'.$video->year().'</td>';
              echo ($video->pays())? '<td>'.$video->pays()->nom().'</td>':'<td>?</td>';
              echo ($video->sbt())? '<td>Oui</td>':'<td></td>';
              echo '<td>'.$video->artistToString(", ").'</td>';
              echo '<td class="td_button"><a href="admin-play.php?id='.$video->id().'"><button class="icones">V</button></a></td>';
              echo '<td class="td_button"><a href="modif.php?id='.$video->id().'"><button class="icones">D</button></a></td>';
              echo '<td class="td_button"><a href="deleteVideo.php?id='.$video->id().'""><button class="icones">X</button></a></td>';
              echo '</tr> ';
            }

            ?>
        </table>

        <a href="addVideo.php"><button>Ajouter une nouvelle video</button></a>
      
    </div>
    <?php include('include/admin-footer.php') ?>
    </body>
     
</html>     
