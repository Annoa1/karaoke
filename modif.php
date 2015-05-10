<?php

include 'include/db.php';
include 'class/VideoManager.class.php';
$id=$_GET['id'];

$db = db_connexion();
$videoManager = new VideoManager($db);
$videos = $videoManager->get($id);


?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Panneau d'admin</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
   <div id="content">
    <h1>Modifier la video : </h1>
  <form action="initDBvideo.PHP" method="get">
      <?php

        // foreach ($videos as $video) {
          echo '<label>Titre</label>';
          echo '<input  name = "titre"type="text" value='.$videos->title().'>';
          echo '<label>Annee</label><input name = "annee"type="text" value='.$videos->year().'>';
          echo '<button type="submit" >Mettre à jour</button>';
          
          echo '</tr>';
        // }
      ?>
   
    </div>
    
  </body>
</html> 