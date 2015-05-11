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
$modif = false;

if (isset($_POST['old_pwd']) && isset($_POST['new_pwd1']) && isset($_POST['new_pwd2'])) {
  if ($_POST['old_pwd'] == $admin->pwd()) {
    if ($_POST['new_pwd1'] == $_POST['new_pwd2']) {
      $admin->setPwd($_POST['new_pwd1']);
      if ($userManager->update($admin)) {
        $modif = "Le mot-de-passe a bien été mis à jour.";
      }
    }
  }
}

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
    <?php if ($modif) {
        echo "<p>".$modif."</p>";
      } ?>
    <form method="post" action="admin-general.php">
      <fieldset>
      <legend>Changer de mot de passe</legend>
      <label for="old_pwd">Ancien mot-de-passe</label><input id="old_pwd" name="old_pwd" type="password"><br>
      <label for="new_pwd1">Nouveau mot-de-passe</label><input id="new_pwd1" name="new_pwd1" type="password"><br>
      <label for="new_pwd2">Confirmez</label><input id="new_pwd2" name="new_pwd2" type="password"><br>
      <input type="submit" value="Modifier">
      </fieldset>
    </form>

    <form>
      <fieldset>
      <legend>Outils d'administration</legend>
        <button class="icones">E</button>Envoyer un mail à tous les utilisateurs (en construction)
      </fieldset>
    </form>

    <!-- fin contenu -->
    </div>
    
    <?php include('include/admin-footer.php') ?>

  </body>
</html>