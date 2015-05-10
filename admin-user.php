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
    <p>Liste des utilisateurs :</p>
    <table>
      <tr>
        <th>id</th>
        <th>login</th>
        <th>mail</th>
        <th>color</th>
        <th></th>
        <th></th>
      </tr>
      <?php

        foreach ($users as $user) {
          echo '<tr>';
          echo '<td>'.$user->id().'</td>';
          echo '<td>'.$user->login().'</td>';
          echo '<td>'.$user->mail().'</td>';
          echo '<td>'.$user->color().'</td>';
          echo '<td><button>Reset Pwd</button></td>';
          echo '<td><button>Delete</button></td>';
          echo '</tr>';
        }
      ?>
    </table>
    </div>
    
    <?php include('include/admin-footer.php') ?>

    
  </body>
</html>