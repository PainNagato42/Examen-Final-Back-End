<?php
/*
 * controleur ajax : faire la modification de l'offre pour l'accepter
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
$offre->set("accepter", 1);
$offre->update();
$annonce = new annonce($offre->get("annonce"));
$annonce->set("fermeture", 1);
$annonce->update();

// envoyer le mail
$offre->offreEmail();

// faire la liste des offres
$liste = $offre->listeOffre();

// envoyer le fragment
include "templates/fragments/offre.php";