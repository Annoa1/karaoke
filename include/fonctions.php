<?php

/**
 * Cette procédure fait une redirection vers l'index.
 * Elle doit être utilisée sans qu'il n'y est aucun affichage (html) avant,
 * car elle réécrit le header (voir la fonction header pour plus d'infos).
 * @param  string $page facultatif
 */
function go_home($page = 'index.php') {
  // Construit une URL absolue
  $host  = $_SERVER['HTTP_HOST'];
  $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  header("Location: http://$host$uri/$page");
  exit;
}

/**
 * Cette procédure vérifie si la personne connectée est l'admin.
 * Sinon, elle fait une redirection vers l'index.
 * @return [type] [description]
 */
function check_admin() 
{
  if (!isset($_SESSION['user']))
  {
    go_home();
  }
  else if (!$_SESSION['user']->isAdmin()) {
    go_home();
  }
}

/**
 * Cette procédure permet l'affichage du menu onglet de l'a
 * @param  [type] $page [description]
 * @return [type]       [description]
 */
function current_page($page) {
  if ($_SESSION['page'] == $page) 
    echo " id='current_page' ";
}

?>