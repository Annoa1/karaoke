<?php

//Zone administration
//Administration User

require 'class/User.class.php';
session_start();

// zone BDD

require 'include/db.php';
require_once 'include/fonctions.php';
require_once 'class/PaysManager.class.php';
require_once 'class/ArtistManager.class.php';
require_once 'class/VideoManager.class.php';

check_admin();

$_SESSION['page'] = 'videos';

if (!isset($_GET['id'])) {
  go_home('admin-video.php');
}

$id=$_GET['id'];

$db = db_connexion();
// $paysManager = new PaysManager($db);
// $artistManager = new ArtistManager($db);
// $listPays = $paysManager->getList();
// $listArtists = $artistManager->getList();


$videoManager = new VideoManager($db);
$video = $videoManager->get($id);

var_dump($video);

?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Gestion des vidéos</title>
        <link rel="stylesheet" href="./css/admin.css">
        <link rel="stylesheet" href="js/jquery-ui.custom/jquery-ui.css">
        <link rel="icon" type="./img/png" href="./img/favicon.png"/>
    </head>

    <body>

    <?php include('include/admin-header.php') ?>

    <div id="content">

      <h1>Modifier la video : </h1>
      <form action="majDB.PHP" method="post">
        <?php
            echo '<input name="id" type="hidden" value="'.$video->id().'"><br>';
            echo '<label>Titre</label>';

            echo '<input name="titre" type="text" value="'.$video->title().'"><br>';
            echo '<label>Annee</label>';
            echo '<input name = "annee"type="text" value="'.$video->year().'"><br>';
            echo '<br><button type="submit" >Mettre a jour</button>';

        ?>
     
    </div>
    <?php include('include/admin-footer.php') ?>
  </body>
</html> 