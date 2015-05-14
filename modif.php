<?php

require_once 'class/User.class.php';
session_start();

include 'include/db.php';
include 'class/VideoManager.class.php';
include 'include/fonctions.php';

if (!isset($_GET['id'])) {
  go_home('admin-video.php');
}

check_admin();

$id=$_GET['id'];

$db = db_connexion();
$videoManager = new VideoManager($db);
$video = $videoManager->get($id);

var_dump($video);


?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Panneau d'admin</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="icon" type="./img/png" href="./img/favicon.png"/>
  </head>
  <body>
    <?php include('include/admin-header.php') ?>
    <div id="content">
      <h1>Modifier la video : </h1>
      <form action="initDBvideo.PHP" method="get">
        <?php

            echo '<label>Titre</label>';
            echo '<input name="titre" type="text" value="'.$video->title().'"><br>';
            echo '<label>Annee</label><input name = "annee"type="text" value="'.$video->year().'"><br>';
            echo '<br><button type="submit" >Mettre à jour</button>';

        ?>
     
    </div>
    <?php include('include/admin-footer.php') ?>
  </body>
</html> 