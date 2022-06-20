<?php
/*
 * controleur ajax : faire la modification de l'offre pour la refuser
 * parametres : POST ou GET id : id de l'offre
 * 
 */

// faire l'initialisation
include "library/init.php";

// verifie si on est connecté
if (!connected()) {
    exit;
}

// faire la modification
$offre = new offre($_REQUEST["id"]);
$offre->set("refuser", 1);
$offre->update();

$liste = $offre->listeOffre();

// envoyer le fragment
include "templates/fragments/offre.php";
