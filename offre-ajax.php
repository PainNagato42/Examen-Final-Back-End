<?php
/*
 * controleur ajax : afficher la liste des offres pour l'utilisateur connecté
 * parametres : néant
 * Retour : fragments html
 * 
 */

// faire l'initialisation
include "library/init.php";

// verifie si on est connecté
if (!connected()) {
    exit;
}

// faire la liste des offres qui ne sont pas refuser et accepter
$offre = new offre();
$liste = $offre->listeOffre();

// envoyer le fragment
include "templates/fragments/offre.php";