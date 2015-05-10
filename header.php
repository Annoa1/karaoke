<header>
    <div class="topHeader">
        <a href="index.php"><img src="./img/octosing_logo.png" width="120" height="120"></a>
        <h1>OKTOSING - Les chansons poulpesques d'OKTO</h1>
        <h4>Random Karaoke Party</h4>
    </div>

    <div class="botHeader">
        <nav class="menuHeader">
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="contact.php">Contact</a></li>

                <?php if (isset($_SESSION['user'])) { ?>
                    <li><a href="deconnexion.php">Déconnexion</a></li>
                <?php } else { ?>
                    <li><a href="connexion.php">Connexion</a></li>
                <?php } ?>

                <li><a href="inscription.php">Inscription</a></li>
            </ul>
        </nav>
        <?php
            if (isset($_SESSION['user'])) {
                echo "<a href='user.php?id=".$_SESSION['user']->id()."'>".$_SESSION['user']->login()."</a>";
            }
        ?>
    </div>
</header>