<?php

/* 
 * template fragment : Mise en forme de la liste des offre en attente de l'utilisateur connecté
 * parametre : $liste : tabelau simple de offre
 */
if( $affiche === "attente") {
    $titre = "Mes offres en attente";
} elseif ($affiche === "acceptees") {
    $titre = "Mes offres acceptées";
} else {
    $titre = "Mes offres refusées";
}
?>
<h2><?= $titre ?></h2>
<?php
foreach ($liste as $offre) { ?>
    <div class="mes-offres">
        <h4>Offre pour : <b><?= $offre->getTarget("annonce")->html("titre") ?></b></h4>
        <p>interêt de l'offre: <b><?= $offre->html("interet") ?></b></p>
        <p class="prix">Mon prix : <b><?= $offre->html("prix") ?></b> €</p>
    </div>
<?php }
?>