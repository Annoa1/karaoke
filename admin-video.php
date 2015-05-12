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
              echo '<td><a href=delete.php?id='.$video->id().'><button>Supprimer</button></a></td>';
              echo '<td><a href=modif.php?id='.$video->id().'><button>Modifier</button></a></td>';
              echo '</tr> ';
            }

            ?>
        </table>

        <a href="addVideo.php"><button>Ajouter une nouvelle video</button></a>
      
    </div>
    <?php include('include/admin-footer.php') ?>
    </body>
     
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
