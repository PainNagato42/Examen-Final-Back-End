<?php
/*
 * controleur ajax : afficher la liste des recherches ayant un interval donné
 * parametres : POST ou GET : prix_mini, prix_maxi, recherche
 * Retour: tableau simple
 * 
 */

// faire l'initialisation
include "library/init.php";

// verifie si on est connecté
if (!connected()) {
    exit;
}

// faire la liste
$annonce = new annonce();
$liste = $annonce->rechercheAnnonceInterval($_REQUEST["recherche"], $_REQUEST["prix_mini"], $_REQUEST["prix_maxi"]);

// renvoyer le fragment
include "templates/fragments/recherche.php";