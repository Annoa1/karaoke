<?php

///////////////////////////////////////////////////////////////
// Cette page permet d'afficher les détails d'un utilisateur //
///////////////////////////////////////////////////////////////

include 'include/db.php';
include 'class/UserManager.class.php';

// récupération de l'id de l'utilisateur à afficher

$db = db_connexion();
$userManager = new UserManager($db);

?>