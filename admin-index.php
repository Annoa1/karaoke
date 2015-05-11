<?php 

require_once 'class/User.class.php';
session_start();

require_once 'include/fonctions.php';

check_admin();

$_SESSION['page'] = 'index';


?>


<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Panneau d'admin</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="icon" type="./img/png" href="./img/favicon.png"/>
  </head>
  <body>

    <?php include('include/admin-header.php') ?>

    <div id="content">
      Bienvenue sur le panneau d'administration d'Oktosing.
    </div>

    <?php include('include/admin-footer.php') ?>

  </body>
</html>