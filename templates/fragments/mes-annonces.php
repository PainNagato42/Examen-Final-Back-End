<?php
/*
 * template fragment : Mise en forme de la liste des annonces de l'utilisateur connecté et non fermer
 * parametres : $liste : tableau simple des annonce de l'utilisateur connecté et non fermer
 */
?>
<h2>Mes annonces en cours</h2>
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