<?php

include 'include/db.php';
include 'class/UserManager.class.php';

$db = db_connexion();
$userManager = new UserManager($db);
$users = $userManager->getList();

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
    Liste des utilisateurs :
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
    
  </body>
</html>