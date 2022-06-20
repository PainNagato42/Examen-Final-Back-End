<?php
/*
 * template page : Mise en forme du formulaire du changement de mot de passe
 * parametres : néant
 * 
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulaire du changement de mot de passe</title>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include "templates/fragments/header-connecte.php"; ?>
        <main onclick="retireMenu()">
            <h2>Formulaire du changement de mot de passe</h2>
            <p class="text-center echec"><?= isset($echec) ? $echec : "" ?></p>
            <div class="container-form">
                <form method="post" action="change-mdp.php">
                    <label>Mot de passe actuel</label><br>
                    <input class="large-100" type="password" name="mdp" required=""/><br>
                    <label>Nouveau mot de passe</label><br>
                    <input class="large-100" type="password" name="new_mdp" required=""/><br>
                    <label>Confirmer le nouveau mot de passe</label><br>
                    <input class="large-100" type="password" name="new_mdp2" required=""/><br>
                    <input class="btn large-100" type="submit" value="Changer le mot de passe"/>
                </form>
            </div>
        </main>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" type="text/javascript"></script>
        <script src="js/script.js" type="text/javascript"></script>
    </body>
</html>