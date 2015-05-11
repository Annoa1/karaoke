<?php

require_once 'class/User.class.php';
session_start();

require 'include/db.php';
require 'class/UserManager.class.php';
require_once 'include/fonctions.php';

check_admin();

$_SESSION['page'] = 'users';

$db = db_connexion();
$userManager = new UserManager($db);

if (isset($_GET['id'])) {
  $user = $userManager->get($_GET['id']);
  if (!$user) {
    go_home();
  }
  if ($user->isAdmin()) {
    go_home();
  }

  // Si modification
  if (isset($_POST['login']) && isset($_POST['mail'])) {
    $user->setLogin($_POST['login']);
    $user->setMail($_POST['mail']);
    $color = (isset($_POST['login'])) ? $_POST['color'] : "";
    $user->setColor($color);
    if (isset($_POST['pwd'])) {
      $user->setPwd($_POST['pwd']);
    }
    if ($userManager->update($user)) {
      $_SESSION['msg'] = "L'utilisateur <strong>".$user->login()."</strong> a bien été modifié.";
      go_home("admin-user.php");
    }
  }

}
else {
  go_home();
}

?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Panneau d'admin - utilisateurs</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="icon" type="./img/png" href="./img/favicon.png"/>
  </head>
  <body>
    <?php include('include/admin-header.php') ?>
    <div id="content">

    <form method="post" action="admin-moderation.php?id=<?php echo $user->id()?>">
      <label for="login">Login</label><input id="login" name ="login" type="text" value="<?php echo $user->login() ?>"><br/>
      <label>Mot de passe</label><button id="but_pwd">Reset</button><br/>
      <label for="mail">Mail</label><input id="mail" name="mail" type="email" value="<?php echo $user->mail() ?>"><br/>
      <label for="color">Color</label><input id="color" name="color" type="text" value="<?php echo $user->color() ?>"><br/>
      <input id="but_submit" type="submit" value="Modifier">
    </form>
    
    </div>
    
    <?php include('include/admin-footer.php') ?>
  <script src="js/jquery.js"></script>
  <script src="js/admin.js"></script>
  </body>
</html>