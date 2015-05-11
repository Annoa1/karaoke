<?php
require_once 'class/User.class.php';
session_start();

require 'include/db.php';
require 'class/UserManager.class.php';
require_once 'include/fonctions.php';

$db = db_connexion();
$userManager = new UserManager($db);

// Protection accès de la page
if (isset($_GET['id'])) {
  $user = $userManager->get($_GET['id']);
  if (!$user)
    go_home();
  if ($user->isAdmin())
    go_home();
}
else {
  go_home();
}

$modif = false;
// Modification
if ($user->isConnected()) {

  // Mail
  if (isset($_POST['mail'])) {
    $user->setMail($_POST['mail']);
    if ($userManager->update($user))
      $modif = "Ton mail a bien été mis à jour.";
  }

  // Mot de passe
  if (isset($_POST['old_pwd']) || isset($_POST['new_pwd1']) || isset($_POST['new_pwd2'])) {
    if ($_POST['old_pwd'] == $user->pwd()) {
      if ($_POST['new_pwd1'] == $_POST['new_pwd2']) {
        $user->setPwd($_POST['new_pwd1']);
        if ($userManager->update($user))
          $mdif = "Ton mot-de-passe a bien été mis à jour.";
      }
    }
  }

  // Préférences
  if (isset($_POST['color'])) {
    $user->setColor($_POST['color']);
    if ($userManager->update($user))
      $modif = "Ta couleur de sous-titres a bien été mise à jour.";
  }

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

    <?php include 'include/header.php'; ?>

    <div class="mainContainer">

      <h2><?php echo $user->login(); ?></h2>

      <?php
        if ($user->isConnected()) {
          if ($modif)
            echo "<p>".$modif."</p>";
      ?>

      <form method="post" action="profil.php?id=<?php echo $user->id() ?>">
        <fieldset>
        <legend>Changer le mail</legend>
        <label>Mail actuel</label><?php echo $user->mail(); ?><br>
        <label for="mail">Nouveau mail</label><input id="mail" name="mail" type="text"><br>
        <input type="submit" value="Modifier">
        </fieldset>
      </form>

      <form method="post" action="profil.php?id=<?php echo $user->id() ?>">
        <fieldset>
        <legend>Changer le mot-de-passe</legend>
        <label for="old_pwd">Ancien mot-de-passe</label><input id="old_pwd" name="old_pwd" type="password"><br>
        <label for="new_pwd1">Nouveau mot-de-passe</label><input id="new_pwd1" name="new_pwd1" type="password"><br>
        <label for="new_pwd2">Nouveau mot-de-passe (confirmation)</label><input id="new_pwd2" name="new_pwd2" type="password"><br>
        <input type="submit" value="Modifier">
        </fieldset>
      </form>

      <form method="post" action="profil.php?id=<?php echo $user->id() ?>">
        <fieldset>
        <legend>Préférences</legend>
        <label for="color">Sous-titres</label><input id="color" name="color" type="color" value="#<?php echo $user->color(); ?>"><br>
        <input type="submit" value="Modifier">
        </fieldset>
      </form>

      <?php } ?>

    </div>

    <?php include 'include/footer.php'; ?>

  </body>
</html>
