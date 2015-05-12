<?php

require_once 'class/User.class.php';
session_start();

require 'include/db.php';
require 'class/ArtistManager.class.php';
require_once 'include/fonctions.php';

check_admin();

$_SESSION['page'] = 'artists';

$db = db_connexion();
$artistManager = new ArtistManager($db);

$msg = false;

if (isset($_GET['id'])) {

  $id = $_GET['id'];
  $artist = $artistManager->get($id);

  if (!$artist) {
    go_home("admin-index.php");
  }

  if (isset($_GET['action'])) {
    
    if ($artistManager->delete($artist)) {
      $msg = "L'artiste <strong>".$artist->nom()."</strong> a bien été supprimé.";
    }
  }

  else if(isset($_POST['nom'])) {
    $artist->setNom($_POST['nom']);
    if ($artistManager->update($artist)) { // corriger update
      $msg = "L'artiste <strong>".$artist->nom()."</strong> a bien été modifié.";
    }
  }
}
else if (isset($_POST['nom'])) {
  $artist = new Artist();
  $artist->setNom($_POST['nom']);
  if ($artistManager->add($artist)) {
    $msg = "L'artiste <strong>".$artist->nom()."</strong> a bien été modifié.";
  }
}

$artists = $artistManager->getList();

?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Panneau d'admin - utilisateurs</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="icon" type="./img/png" href="./img/favicon.png"/>
  </head>
  <body>
    <?php include('include/admin-header.php') ?>
    <div id="content">

    <p>
      <?php 
      if ($msg) { 
        echo $msg; 
      }
      ?>
    </p>

    
    <table>
      <tr>
        <th>Nom</th>
        <th>Nombre de Vidéos</th>
      </tr>
      <?php

        foreach ($artists as $artist) {
          echo '<tr>';
          echo '<td id="art_'.$artist->id().'">'.$artist->nom().'</td>';
          echo '<td>'.$artist->nbVideos().'</td>';
          echo '<td class="td_button"><button value="'.$artist->id().'" class="icones modif">D</button></td>';
          echo '<td class="td_button"><a href="admin-artist.php?action=delete&id='.$artist->id().'"><button class="icones">X</button></a></td>';
          echo '</tr>';
        }
      ?>
    </table>
    <p></p>
    <form method="post" action="admin-artist.php">
      <label for="nom">Nom d'artiste</label><input type="text" id="nom" name="nom"><br>
      <input type="submit" value="Ajouter">
    </form>

    </div>
    
    <?php include('include/admin-footer.php') ?>

    <script src="js/jquery.js"></script>
    <script src="js/admin.js"></script>
    
  </body>
</html>

