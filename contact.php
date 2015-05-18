<?php
require_once 'class/User.class.php';
session_start(); // A laisser en premiere ligne
?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Inscription</title>
        <link rel="stylesheet" href="./css/style.css">
        <link rel="icon" type="./img/png" href="./img/favicon.png"/>
    </head>

    <body>
        <?php include 'include/header.php'; ?>

        <div class="mainContainer">
            <div class="mainContainerContent">
                <p> 
                    <a href="./evolution.html"> Diagramme de GANTT Oktosing </a>
                </p>
            </div>
        </div>

        <?php include 'include/footer.php'; ?>
        
    </body>
</html>