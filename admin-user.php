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

$delete = false;

if (isset($_GET['action']) && isset($_GET['id'])) {
  if ($_GET['action'] == "delete") {
    $id = $_GET['id'];
    $user = $userManager->get($id);
    //var_dump($user);
    if ($userManager->delete($user)) {
      $delete = "L'utilisateur <strong>".$user->login()."</strong> a bien été supprimé.";
    }
  }
}

$users = $userManager->getList();

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

    <p>
      <?php 
      if ($delete) { 
        echo $delete; 
      }
      else if ($_SESSION['msg']) {
        echo $_SESSION['msg'];
        $_SESSION['msg'] = null;
      }
       ?>
     </p>

    
    <table>
      <tr>
        <th>login</th>
        <th>mail</th>
        <th>color</th>
      </tr>
      <?php

        foreach ($users as $user) {
          echo '<tr>';
          echo '<td><a href="admin-moderation.php?id='.$user->id().'">'.$user->login().'</a></td>';
          echo '<td>'.$user->mail().'</td>';
          echo '<td>'.$user->color().'</td>';
          echo '<td class="td_button"><a href="admin-user.php?action=delete&id='.$user->id().'"><button class="icones">X</button></a></td>';
          echo '</tr>';
        }
      ?>
    </table>
    </div>
    
    <?php include('include/admin-footer.php') ?>

    
  </body>
</html>