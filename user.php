<?php
require_once 'class/User.class.php';
session_start(); // A laisser en premiere ligne

require 'include/db.php';
require 'class/UserManager.class.php';
require_once 'include/fonctions.php';

$db = db_connexion();
$userManager = new UserManager($db);

if (isset($_GET['id'])) {
  $user = $userManager->get($_GET['id']);
  if (!$user) {
    go_home();
  }
}
else {
  go_home();
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Oktosing - <?php echo $user->login(); ?></title>
  <meta charset="UTF-8">
  <link rel="icon" type="./img/png" href="./img/favicon.png"/>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
</head>
  <body>

    <?php include 'header.php'; ?>

    <div class="mainContainer">

      <h2><?php echo $user->login(); ?></h2>

      <?php
        var_dump($user);
      ?>

      <p>
        <label>Mail</label>
          <?php 
          echo $user->mail(); 
          if ($user == $_SESSION['user']) { ?>
        <button>Modifier</button>
          <?php } 
          ?>
      </p>

    </div>

    <?php include 'footer.php'; ?>

  </body>
</html>
