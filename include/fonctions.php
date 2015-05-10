<?php

/**
 * Cette procédure fait une redirection vers l'index.
 * Elle doit être utilisée sans qu'il n'y est aucun affichage (html) avant,
 * car elle réécrit le header (voir la fonction header pour plus d'infos).
 */
function go_home() {
  // Construit une URL absolue
  $host  = $_SERVER['HTTP_HOST'];
  $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  $extra = 'index.php';
  header("Location: http://$host$uri/$extra");
  exit;
}

/**
 * Cette procédure vérifie si la personne connectée est l'admin.
 * Sinon, elle fait une redirection vers l'index.
 * @return [type] [description]
 */
function check_admin() {
  if (!isset($_SESSION['user'])) {
    go_home();
  }
  else if (!$_SESSION['user']->isAdmin()) {
    go_home();
  }
}

?>