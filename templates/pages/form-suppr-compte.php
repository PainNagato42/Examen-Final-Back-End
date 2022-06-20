<?php
/*
 * template page : Mise en forme du formulaire de suppression du compte
 * parametre : neant
 * 
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulaire du suppression de compte</title>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include "templates/fragments/header-connecte.php"; ?>
        <main onclick="retireMenu()">
            <h2>Formulaire de suppression du compte</h2>
            <p class="text-center echec"><?= isset($echec) ? $echec : "" ?></p><br>
            <div class="container-form">      
                <form method="POST" action="suppr-compte.php">
                    <label>Email</label><br>
                    <input class="large-100" type="email" name="email" required=""/><br>
                    <label>Mot de passe</label><br>
                    <input class="large-100" type="password" name="mdp" required=""/><br>
                    <input class="btn text-center" type="submit" onclick="afficheAlertSuppr();" value="Supprimer le compte"/>
                    <div class="suppr-compte">
                        <p>/!\ Voulez-vous vraiment supprimer votre compte ? /!\</p>
                        <div class="flex justify-between margin-top-20">
                            <button class="btn btn-accepter">Oui</button>
                            <button class="btn btn-refuser" onclick="retireAlertSuppr();">Non</button>
                        </div>
                    </div>
                </form>
            </div>
        </main>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" type="text/javascript"></script>
        <script src="js/script.js" type="text/javascript"></script>
    </body>
</html>
