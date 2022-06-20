<?php
/*
 * template page : Mise en forme des annonces en cours de l'utilisateur connecté
 * parametre : $liste : tableau simple des annonce de l'utilisateur connecté et non fermer
 * 
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mes annonces en cours</title>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include "templates/fragments/header-connecte.php"; ?>
        <main onclick="retireMenu()">
            <div class="container">
                <div class="flex margin-top-50 inerhit text-center">
                    <button class="btn margin-right-50" onclick="afficheMesAnnonce();">Mes annonces</button>
                    <button class="btn margin-right-50" onclick="afficheOffre();">Offres reçues</button>
                    <button class="btn" onclick="afficheAnnonceTerminee();">Mes annonces terminées</button>
                </div>
                <div id="annonce">
                    <?php include "templates/fragments/mes-annonces.php"; ?>
                </div>
            </div>
        </main>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" type="text/javascript"></script>
        <script src="js/ajax-annonce.js" type="text/javascript"></script>
        <script src="js/script.js" type="text/javascript"></script>
    </body>
</html>
