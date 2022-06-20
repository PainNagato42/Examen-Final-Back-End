<?php
/*
 * template page : Mise en forme du formulaire de connexion
 * parametre : neant
 * 
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulaire de connexion</title>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include "templates/fragments/header-non-connecte.php"; ?>
        <main>
            <h2>Page de connexion</h2>
            <p class="text-center"><?= isset($reussi) ? $reussi : "" ?><span class="echec"><?= isset($echec) ? $echec : "" ?></span></p><br>
            <div class="container-form">      
                <form method="POST" action="connecter.php">
                    <label>Pseudo ou Email</label><br>
                    <input class="large-100" type="text" name="identifiant" required=""/><br>
                    <label>Mot de passe</label><br>
                    <input class="large-100" type="password" name="mdp" required=""/><br>
                    <input class="btn text-center" type="submit" value="Se connecter"/>
                </form><br>
                <p class="text-center">Mot de passe oublié cliquez <a href="affiche-reinit-mdp.php"><u>ici</u></a></p>
            </div>
        </main>
    </body>
</html>
