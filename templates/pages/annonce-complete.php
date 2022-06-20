<?php
/*
 * template page : Mise en forme de l'annonce complète
 * parametre : $annonce : objet chargé
 * 
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?= $annonce->html("titre") ?></title>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include "templates/fragments/header-connecte.php"; ?>
        <main onclick="retireMenu()">
            <div class="container">
                <div class="flex margin-top-50">
                    <div class="large-50">
                        <img class="large-100" src="<?= $annonce->html("photo") ?>">
                    </div>
                    <div class="large-50 annonce">
                        <h2><b><?= $annonce->html("titre") ?></b></h2>
                        <p>Description du produit : <b><?= $annonce->html("description") ?></b></p>
                        <p>Date : <?= date('d/m/Y', strtotime($annonce->html("date"))) ?></p>
                        <p class="text-center prix"><b><?= $annonce->html("prix") ?></b> €</p>
                    </div>
                </div>
                <h3 class="text-center margin-top-50">Faire une offre</h3>
                <p class="text-center"><?= isset($reussi) ? $reussi : "" ?></p>
                <?php if(isset($offre_affiche)) {
                    include 'templates/fragments/fragment-offre.php';
                }?>
            </div>
        </main>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" type="text/javascript"></script>
        <script src="js/script.js" type="text/javascript"></script>
    </body>
</html>
