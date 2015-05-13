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

check_admin();

$_SESSION['page'] = 'videos';

$db = db_connexion();
$paysManager = new PaysManager($db);
$artistManager = new ArtistManager($db);
$listPays = $paysManager->getList();
$listArtists = $artistManager->getList();


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

        <h3 id="connexion">	Créer une nouvelle vidéo :</h3>

        <?php 
        if ($_SESSION['msg']) {
            echo "<p>".$_SESSION['msg']."</p>";
            $_SESSION['msg'] = null;
        }
         ?>
        
            
        <form method="post" action="initDBvideo.php" enctype="multipart/form-data">
          	<label for="titre">Titre *</label><input id="titre" name="titre" type="text" ><BR>
          	<label for="annee">Année</label><input id="annee" name="annee" type="text" ><BR>
            <label for="pays">Pays *</label><input id="pays" name="pays" type="text"><BR>
            <label for="artist">Artist</label><input class="artist" name="artist[]" type="text">
                <button id="new_art" class="icones">+</button><BR>
            <label for="affiche">Vidéo *</label><input id="affiche" name="video" type="file"><BR>
            <label for="sbt" id="lab_sbt">Sous-titres</label><button id="import_sbt">Importer des sous-titres</button><BR>
            <BR>
            <input type="submit" value="Enregistrer">
        </form>

    
    
    <div id="pays-string"><?php 
        $s = "";
        foreach ($listPays as $pays) {
            $s .= $pays->id().'-'.$pays->nom().';';
        } 
        echo substr($s, 0, strlen($s)-1);
    ?>
    </div>
    <div id="artists-string"><?php 
        $s = "";
        foreach ($listArtists as $artist) {
            $s .= $artist->id().'-'.$artist->nom().';';
        } 
        echo substr($s, 0, strlen($s)-1);
    ?>
    </div>
    </div>
    <?php include('include/admin-footer.php') ?>
    <script src="js/jquery.js"></script>
    <script src="js/jquery-ui.custom/jquery-ui.js"></script>
    <script src="js/admin.js"></script>
    </body>
    

</html>     






      


