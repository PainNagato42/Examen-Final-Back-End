<?php
/*
 * template page : Mise en forme des offres en cours de l'utilisateur connecté
 * parametre : $liste : tableau simple des annonce de l'utilisateur connecté et non fermer
 * 
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mes offres en cours</title>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include "templates/fragments/header-connecte.php"; ?>
        <main onclick="retireMenu()">
            <div class="container">
                <div class="flex margin-top-50 inerhit text-center">
                    <button class="btn margin-right-50" onclick="afficheOffres();">Mes offres en attente</button>
                    <button class="btn margin-right-50" onclick="offreAcceptees();">Offres acceptées</button>
                    <button class="btn" onclick="offreRefusees();">Offres refusées</button>
                </div>
                <div id="offre">
                    <?php include "templates/fragments/mes-offres.php"; ?>
                </div>
            </div>
        </main>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" type="text/javascript"></script>
        <script src="js/ajax-offre.js" type="text/javascript"></script>
        <script src="js/script.js" type="text/javascript"></script>
    </body>
</html>