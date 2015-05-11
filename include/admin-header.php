<header>
  <h1><a href="admin-index.php">Panneau d'administration</a></h1>
  <img src="img/octosing_logo.png">
  <h2><a href="index.php">Retour sur Oktosing</a></h2>
  <ul>
    <li <?php current_page("general") ?>><a href="admin-general.php"><span class="icones">C</span> Général</a></li>
    <li <?php current_page("videos") ?>><a href="admin-video.php"><span class="icones">V</span> Gestion des vidéos</a></li>
    <li <?php current_page("users") ?>><a href="admin-user.php"><span class="icones">A</span> Gestion des utilisateurs</a></li>
    <li><a href="deconnexion.php"><span class="icones">e</span> Déconnexion</a></li>
  </ul>
</header>