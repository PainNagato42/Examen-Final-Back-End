<?php
/*
 * template page : Mise en forme du formulaire de création de l'utilisateur
 * parametres : néant
 * 
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulaire de création de l'utilisateur</title>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include "templates/fragments/header-non-connecte.php"; ?>
        <main>
            <h2>Formulaire de création de l'utilisateur</h2>
            <p class="echec text-center"><?= isset($echec) ? $echec : "" ?></p>
            <div class="container-form">
                <form method="post" action="creer-compte.php">
                    <label>Pseudo</label><br>
                    <input class="large-100" type="text" name="pseudo" required="" value="<?= isset($_POST["pseudo"]) ? $_POST["pseudo"] : "" ?>"/><br>
                    <label>Email</label><br>
                    <input class="large-100" type="email" name="email" required="" value="<?= isset($_POST["email"]) ? $_POST["email"] : "" ?>"/><br>
                    <label>Mot de passe</label><br>
                    <input class="large-100" type="password" name="mdp" required="" value="<?= isset($_POST["mdp"]) ? $_POST["mdp"] : "" ?>"/><br>
                    <input class="btn large-100" type="submit" value="Créer le compte"/>
                </form>
            </div>
        </main>
    </body>
</html>
