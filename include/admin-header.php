<header>
  <h1><a href="admin-index.php">Panneau d'administration</a></h1>
  <img src="img/octosing_logo.png">
  <h2><a href="index.php">Retour sur Oktosing</a></h2>
  <ul>
    <li <?php current_page("general") ?>><a href="admin-general.php">Général</a></li>
    <li <?php current_page("videos") ?>><a href="admin-video.php">Gestion des vidéos</a></li>
    <li <?php current_page("users") ?>><a href="admin-user.php">Gestion des utilisateurs</a></li>
    <li><a href="deconnexion.php">Déconnexion</a></li>
  </ul>
</header>