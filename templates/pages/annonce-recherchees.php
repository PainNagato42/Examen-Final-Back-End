<?php
/*
 * template page : Mise en forme de la page d'accueil
 * parametre : $liste : tableau simple de l'objet annonce (les 10 dernières)
 *             $recherche : contenu saisie
 * 
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Examen 2022</title>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php $header ?>
        <main onclick="retireMenu()">
                    <h2>La liste de recherche d'annonce pour le contenu "<?= $recherche ?>"</h2>
            <div class="select">
                <p>Choisissez un interval de prix</p>
                <p>Prix mini</p>
                <input id="mini" class="large-100" type="number" min="0" max="999999" value="0"/><br>
                <p>Prix max</p>
                <input id="max" class="large-100" type="number" min="0" max="999999" value="0"/><br>
                <input id="text_recherche" type="hidden" value="<?= $recherche ?>"/>
                <p class="echec" id="echec"></p>
                <button class="btn" onclick="afficheInterval()">Valider</button>
            </div>
            <div id="recherche" class="container">
                <?= include "templates/fragments/recherche.php"; ?>
            </div>
        </main>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" type="text/javascript"></script>
        <script src="js/ajax.js" type="text/javascript"></script>
        <script src="js/script.js" type="text/javascript"></script>
    </body>
</html>
