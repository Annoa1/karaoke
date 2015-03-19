<?php
  
  include 'include/db.php';
  include 'class/UserManager.class.php';

  $db = db_connexion();
  $userManager = new UserManager($db);
  var_dump($userManager->getList());

  $users = $userManager->getList();

  echo $users[0]->login();

  $userB = $userManager->get(2);

  echo $userB->login();


?>