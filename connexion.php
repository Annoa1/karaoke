<?php
require_once 'class/User.class.php';
session_start(); // A laisser en premiere ligne ! 

require 'include/db.php';
require 'class/UserManager.class.php';
require_once 'include/fonctions.php';

$msg = false;

if (isset($_POST['pseudo']) && isset($_POST['motDePasse'])) {

    $db = db_connexion();
    $userManager = new UserManager($db);
    $user = $userManager->login($_POST['pseudo'], $_POST['motDePasse']);

    if ($user) {
        $_SESSION['user'] = $user;
        go_home();
    }
    else {
        $msg = "Identifiant et/ou mot-de-passe erroné(s)";
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
        <?php include 'header.php'; ?>

        <div class="mainContainer">
            <h3 id="connexion">Connexion</h3>
            <form id="menuConnexion" method="post" action="connexion.php">
                <?php
                    if ($msg) {
                        echo "<p>".$msg."</p>";
                    }
                ?>
                <p class="formConnexion">
                    <label>Pseudo</label> : <input type="text" name="pseudo" />
                </p>
                <p class="formConnexion">
                    <label>Mot De Passe</label> : <input type="password" name="motDePasse" />
                </p>

                <input type="submit" name="connexion" value="LOGIN">
            </form>
        </div>
    </body>

    <?php include 'footer.php'; ?>
    
</html>			






			