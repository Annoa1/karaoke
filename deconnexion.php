<?php

session_start();

require 'include/fonctions.php';

// Détruit toutes les variables de session
$_SESSION = array();

// Détruit la session
session_destroy();

go_home();

?>