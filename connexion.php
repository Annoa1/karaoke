<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Inscription</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <!-- TODO : Faire Include de la banderole -->
        <?php include('./header.php'); ?>

        <div id="mainContent">
            <h3 id="connexion">Connexion</h3>
            <form id="menuConnexion">
                <p class="formConnexion">
                    <label>Pseudo</label> : <input type="text" name="pseudo" />
                </p>
                <p class="formConnexion">
                    <label>Mot De Passe</label> : <input type="password" name="motDePasse" />
                </p>

                <input type="submit" name="connexion" value="LOGIN">
            </form>
        </div>

        <?php include('./footer.php'); ?>
        <!-- Si besoin d'un script js -->
        <script src="script.js"></script>
    </body>
</html>			






			