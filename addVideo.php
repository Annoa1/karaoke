<?php
// Vérification de la valorisation des parametes


if(isset($_POST['titre']))      $titre=$_POST['titre'];
else      $titre="";

if(isset($_POST['annee']))      $annee=$_POST['annee'];
else      $annee="";


include 'include/db.php';
include 'class/VideoManager.class.php';

$db = db_connexion();
$videoManager = new VideoManager($db);
// construire nouvelle video
?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Inscription</title>
        <link rel="stylesheet" href="./css/style.css">
    </head>

    <body>
        <header>
            <div class="topHeader">
                <img src="./img/octosing_logo.png" width="80" height="80">
                <h1>OKTOSING - Les chansons poulpesques d'OKTO</h1>
            </div>

            <div class="botHeader">
                <nav class="menuHeader">
                    <ul>
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="connexion.php">Connexion</a></li>
                        <li><a href="inscription.php">Inscription</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <div class="mainContainer">
            <h3 id="connexion">	Information sur la nouvelle vidéo :</h3>
            
 <form method="post" action = "initDBvideo.php">
          	<label>Titre</label>
         		<input  name = "titre"type="text" >
         			<BR>
         				<BR>
          	<label>Année</label>
          		<input name = "annee"type="text" >
          			<BR>
          				<BR>
     		<label for="affiche">Vidéo</label>
				<input id="affiche" name="video" type="file" />
       				<BR>
       					<BR>
         	<button type="submit" >Enregistrer </button>
</form>


   
   
        </div>
    </body>

    <footer>
        <p>Copyright © 2015 by The Oktogirls' Band</p>
    </footer>
</html>     






      


