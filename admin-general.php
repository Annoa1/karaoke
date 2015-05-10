<?php

require_once 'class/User.class.php';
session_start();

require 'include/db.php';
require 'class/UserManager.class.php';
require_once 'include/fonctions.php';

check_admin();

$_SESSION['page'] = 'general';

$db = db_connexion();
$userManager = new UserManager($db);
$admin = $userManager->getAdmin();

?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Panneau d'admin - Général</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="icon" type="./img/png" href="./img/favicon.png"/>
  </head>
  <body>
    <?php include('include/admin-header.php') ?>
    <div id="content">
    <!-- contenu -->

    <form>
      <fieldset>
      <legend>Changer de mot de passe</legend>
      <label>Ancien mot-de-passe</label>
        <input type="password"><br/>
      <label>Nouveau mot-de-passe</label>
        <input type="password"><br/>
      <label>Confirmez</label>
        <input type="password">
      </fieldset>
    </form>

    <form>
      <fieldset>
      <legend>Outils d'administration</legend>
        <button><span class="icones">E</span></button>Envoyer un mail à tous les utilisateurs
      </fieldset>
    </form>

    <!-- fin contenu -->
    </div>
    
    <?php include('include/admin-footer.php') ?>

  </body>
</html>