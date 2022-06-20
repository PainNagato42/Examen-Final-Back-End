<?php
/*
 * controleur : Préparer et afficher le formulaire de création d'annonce et vérifie si on est connecté
 * parametres : néant
 * 
 */

// faire l'initialisation
include "library/init.php";

// verifie si on est connecté
if (!connected()) {
    // afficher form de connexion
    include "templates/pages/form-connexion.php";
    exit;
}

// afficher le template
include "templates/pages/form-creation-annonce.php";