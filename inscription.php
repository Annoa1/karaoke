<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Inscription</title>
        <link rel="stylesheet" href="./css/style.css">
    </head>

    <body>
        <?php include 'include/header.php'; ?>

        <div class="mainContainer">
            <div id="mainContainerContent">
                <h3>INSCRIS-TOI DES MAINTENANT !</h3>
                <br>
                <form id="menuInscription">
                    <p><label>Pseudo</label> : <input type="text" name="pseudo" /></p>
                    <p><label>E-mail</label> : <input type="text" name="email" /></p>
                    <p><label>Mot De Passe</label> : <input type="password" name="motDePasse1" /></p>
                    <p><label>Mot De Passe</label> : <input type="password" name="motDePasse2" /></p>
                    <input type="submit" name="connexion" value="S'INSCRIRE">
                </form>
            </div>
        </div>

        <?php include 'include/footer.php'; ?>
        
    </body>
</html>