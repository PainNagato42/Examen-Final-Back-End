<?php
/*
 * controleur : Préparer et afficher les annonces en cours et vérifie si on est connecté
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

// faire la liste des annonces de l'utilisateur connecté et non fermer
$annonce = new annonce();
$liste = $annonce->mesAnnonces(0);

// afficher la template
include "templates/pages/annonce-en-cours.php";