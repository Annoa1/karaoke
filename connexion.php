<?php

session_start(); // A laisser en premiere ligne ! 

include 'include/db.php';
include 'class/UserManager.class.php';

$msg = false;

if (isset($_POST['pseudo']) && isset($_POST['motDePasse'])) {

    $db = db_connexion();
    $userManager = new UserManager($db);
    $user = $userManager->login($_POST['pseudo'], $_POST['motDePasse']);

    if ($user) {
        $_SESSION['user'] = $user;
        // Construit une URL absolue
        $host  = $_SERVER['HTTP_HOST'];
        $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = 'index.php';
        header("Location: http://$host$uri/$extra");
        exit;
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






			