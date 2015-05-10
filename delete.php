<?php

include 'include/db.php';
include 'class/VideoManager.class.php';
$id=$_GET['id'];

$db = db_connexion();
$videoManager = new VideoManager($db);
$videos = $videoManager->delete($id);

?>

<!-- <!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Panneau d'admin</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <?php include('include/admin-header.php') ?>
    <div id="content">
    Liste des video :
    <table>
      <tr>
        <th>titre</th>
        
        <th>annee</th>
        <th></th>
        <th></th>
      </tr>
      <?php

        foreach ($videos as $video) {
          echo '<tr>';
          echo '<td>'.$video->title().'</td>';
          echo '<td>'.$video->year().'</td>';
          
          echo '<td><button><a href=delete.php>Supprimer</a></button></td>';
          echo '<td><button>Modifier</button></td>';
          echo '</tr>';
        }
      ?>
    </table>
    </div>
    
  </body>
</html> -->