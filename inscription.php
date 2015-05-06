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
            <form id="menuInscription">
                <p>
                    <label>Pseudo</label> : <input type="text" name="pseudo" />
                </p>
                <p>
                    <label>E-mail</label> : <input type="text" name="email" />
                </p>
                <p>
                    <label>Mot De Passe</label> : <input type="password" name="motDePasse1" />
                </p>
                <p>
                    <label>Mot De Passe</label> : <input type="password" name="motDePasse2" />
                </p>
                <input type="submit" name="connexion" value="S'INSCRIRE">
            </form>
        </div>

        <?php include('./footer.php'); ?>
        <!-- Si besoin d'un script js -->
        <script src="script.js"></script>
    </body>
</html>