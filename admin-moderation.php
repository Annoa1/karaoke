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

    <form>
      <label>Login</label><input type="text" value="<?php echo $user->login() ?>"><br/>
      <label>Mode de passe</label><button>Reset</button><br/>
      <label>Mail</label><input type="email" value="<?php echo $user->mail() ?>"><br/>
      <label>Color</label><input type="text" value="<?php echo $user->color() ?>"><br/>
      <input type="submit" value="Modifier">
    </form>
    
    </div>
    
    <?php include('include/admin-footer.php') ?>

    
  </body>
</html>