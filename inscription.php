<?php

require 'include/db.php';
require 'class/UserManager.class.php';

$msg = false;
$inscription = false;

if (isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['motDePasse1']) && isset($_POST['motDePasse2'])) {

    $pseudo = $_POST['pseudo'];
    $mail = $_POST['email'];
    $mdp1 = $_POST['motDePasse1'];
    $mdp2 = $_POST['motDePasse2'];

    if ( !( strlen($pseudo)||strlen($mail)||strlen($mdp1)||strlen($mdp2) ) ) {
        $msg = "Vous devez remplir tous les champs.";
    }

    else if ($mdp1 != $mdp2) {
        $msg = "Les deux mot-de-passes ne sont pas identiques.";
    }
    else {
        $user = new User([]);
        $user->setLogin($pseudo);
        $user->setMail($mail);
        $user->setPwd($mdp1);

        $db = db_connexion();
        $userManager = new UserManager($db);
        if ($userManager->add($user)) {
            $inscription = true;
        }
        else {
            $msg = "Echec de l'inscription.";
        }
    }
}


?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Inscription</title>
        <link rel="stylesheet" href="./css/style.css">
    </head>

    <body>
        <?php include 'include/header.php'; ?>

        <div class="mainContainer">
            <div id="mainContainerContent">
                <?php
                // Si l'inscription s'est bien passée
                if ($inscription) { ?>
                   <p>Félicitation, ton inscription s'est bien passée.<br>
                   Tu peux maintenant aller te <a href="connexion.php">connecter</a>.</p>
                <?php }

                // Si l'inscription n'a pas encore eu lieu
                else { ?>
                    <h3>Inscris-toi dès maintenant !</h3>
                    <p>En t'inscrivant, tu peux...</p>
                    <br>
                <?php
                    // Si message d'erreur
                    if ($msg) {
                        echo "<p>".$msg."</p>";
                    }
                ?>
                <form id="menuInscription" method="post" action="inscription.php">
                    <p><label for="pseudo">Pseudo</label><input type="text" name="pseudo" id="pseudo"/></p>
                    <p><label for="email">E-mail</label><input type="text" name="email" id="email"/></p>
                    <p><label for="motDePasse1">Mot De Passe</label><input type="password" name="motDePasse1" id="motDePasse1"/></p>
                    <p><label for="motDePasse1">Mot De Passe</label><input type="password" name="motDePasse2" id="motDePasse1"/></p>
                    <input type="submit" value="S'INSCRIRE"> 
                </form>
                <?php
                }
                ?>   
                    
            </div>
                
        </div>

        <?php include 'include/footer.php'; ?>
        
    </body>
</html>