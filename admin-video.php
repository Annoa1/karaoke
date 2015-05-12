<?php
// zone BDD

include 'include/db.php';

//Zone administration
    //Administration User
require_once 'class/User.class.php';
session_start();


require_once 'include/fonctions.php';

check_admin();

$_SESSION['page'] = 'videos';
    //Administration Vidéo

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
        <link rel="stylesheet" href="./css/admin.css">
        <link rel="icon" type="./img/png" href="./img/favicon.png"/>

    </head>

    <body>
     <!--  -->
          <?php include('include/admin-header.php') ?>
          
           
        <div id="content">
            <h3 id="connexion">Liste des videos :</h3>
          <FORM  method="get"> 
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
   </FORM> 
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
