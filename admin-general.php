<?php
session_start();

include 'include/db.php';
include 'class/UserManager.class.php';

$db = db_connexion();
$userManager = new UserManager($db);
$admin = $userManager->getAdmin();

?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Panneau d'admin</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <?php include('include/admin-header.php') ?>
    <div id="content">
    <form>
      <fieldset>
      <legend>Changer de mot de passe</legend>
      <label>Ancien mot-de-passe :</label>
        <input type="password"><br/>
      <label>Nouveau mot-de-passe :</label>
        <input type="password"><br/>
      <label>Confirmez :</label>
        <input type="password">
      </fieldset>
    </form>
    <form>
      <fieldset>
        <label>Envoyer un mail à tous les utilisateurs</label>
      </fieldset>
    </form>
    </div>
    
  </body>
</html>