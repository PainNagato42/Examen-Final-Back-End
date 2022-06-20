<?php
/*
 * Template page : Mise en forme du formulaire d'envoi de mail pour réinit le mot de passe
 * paramètres : néant
 * 
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include "templates/fragments/header-non-connecte.php"; ?>
        <h2>Rénitialisation du mot de passe</h2>
        <p class="text-center"><?= isset($erreur) ? $erreur : "" ?></p>
        <form class="text-center margin-top-50" method="post" action="envoi-reinit-email.php" >
            <label>Email: <input type="email" name="email" required=""/></label><br>
            <input class="btn margin-top-50" type="submit" value="rénitialiser mon mot de passe"/>
        </form>
    </body>
</html>