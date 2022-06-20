<?php
/*
 * template fragment : Mise en forme de la liste des annonces de l'utilisateur connecté et non fermer
 * parametres : $liste : tableau simple des annonce de l'utilisateur connecté et non fermer
 */
?>
<h2>Les offres reçues</h2>
<!--<div class="refuser">
    <p>Voulez-vous vraiment refuser cette offre ?</p>
    <div class="flex justify-between margin-top-20">
        <a class="btn btn-accepter" href="">Oui</a>
        <button class="btn btn-refuser">Non</button>
    </div>
</div>-->
<?php foreach ($liste as $offre) { ?>
        <div class="offre">
            <h4>Offre pour : <b><?= $offre->getTarget("annonce")->html("titre") ?></b></h4>
            <p>interêt de l'offre: <b><?= $offre->html("interet") ?></b></p>
            <p class="prix">Prix de l'offre : <b><?= $offre->html("prix") ?></b> €</p>
            <div class="flex justify-between">
                <a data-id="<?= $offre->id() ?>" class="btn btn-accepter" onclick="accepterOffre(this)"><?php include "img/check.svg"; ?></a>
                <a data-id="<?= $offre->id() ?>" class="btn btn-refuser" onclick="refuserOffre(this);"><?php include "img/cross.svg"; ?></a>
            </div>
        </div>
<?php }
?>