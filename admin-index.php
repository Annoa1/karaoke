<?php 

require_once 'class/User.class.php';
session_start();

require_once 'include/fonctions.php';

check_admin();


?>


<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Panneau d'admin</title>
    <link rel="stylesheet" href="css/admin.css">
  </head>
  <body>
    <?php include('include/admin-header.php') ?>
    <div id="content">
      Bienvenue sur le panneau d'administration d'Oktosing.
    </div>
  </body>
</html>