<?php
/*
 * controleur ajax : afficher la liste des annonces terminées de l'utilisateur connecté 
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

// faire la liste des annonces terminées
$annonce = new annonce();
$liste = $annonce->mesAnnonces(1);

// envoyer le fragment
include "templates/fragments/mes-annonces-terminee.php";