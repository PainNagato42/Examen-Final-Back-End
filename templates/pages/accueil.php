<?php
/*
 * template page : Mise en forme de la page d'accueil
 * parametre : $liste : tableau simple de l'objet annonce (les 10 dernières)
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
            <div class="container">
                <h2>Les 10 dernières annonces</h2>
                <?php foreach ($liste as $annonce) { ?>
                    <a class="large-100" href="affiche-annonce-complete.php?id=<?= $annonce->id() ?>">
                        <div class="flex liste">
                            <div class="large-20">
                                <img class="large-100"src="<?= $annonce->html("photo") ?>">
                            </div>
                            <div class="large-80">
                                <p><?= $annonce->html("titre") ?></p>
                                <p><?= $annonce->html("prix") ?> €</p>
                            </div>
                        </div>
                    </a><br>
                <?php }
                ?>
            </div>
        </main>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" type="text/javascript"></script>
        <script src="js/script.js" type="text/javascript"></script>
    </body>
</html>
