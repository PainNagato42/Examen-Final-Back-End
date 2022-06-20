<?php
/*
 * Template page : Mise en forme du formulaire pour un nouveau mot de passe
 * paramètres : $utilisateur : utilisateur chargé
 * 
 * 
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulaire de la réinitialisation du mot de passe</title>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <h2>Formulaire de la réinitialisation du mot de passe</h2>
        <p class="text-center"><?= isset($erreur) ? $erreur : "" ?></p>
        <div class="container-form">
            <form method="post" action="reinit-mdp-bdd.php?id=<?= $utilisateur->id() ?>" >
                <input type="hidden" name="code" value="<?= $utilisateur->get("reinit") ?>"/>
                <label>Nouveau mot de passe</label><br>
                <input class="large-100" type="password" name="mdp" required=""/><br>
                <label>Confirmer le mot de passe</label><br>
                <input class="large-100" type="password" name="mdp2" required=""/><br>
                <input type="submit" value="Rénitialiser mon mot de passe"/>
            </form>
        </div>
    </body>
</html>
