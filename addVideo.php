<?php

//Zone administration
    //Administration User
require_once 'class/User.class.php';
session_start();

// zone BDD

include 'include/db.php';
// 
require_once 'include/fonctions.php';

check_admin();

$_SESSION['page'] = 'videos';


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
            <h3 id="connexion">	Information sur la nouvelle vidéo :</h3>
            
 <form method="post" action = "initDBvideo.php">
          	<label>Titre</label>
         		<input  name = "titre"type="text" >
         			<BR>
         				<BR>
          	<label>Année</label>
          		<input name = "annee" type="text" >
          			<BR>
          				<BR>
     		<label for="affiche">Vidéo</label>
				<input id="affiche" name="video" type="file" />
       				<BR>
       					<BR>
         	<button type="submit" >Enregistrer </button>
</form>


   
   
        </div>
        <?php include('include/admin-footer.php') ?>
    </body>

</html>     






      


