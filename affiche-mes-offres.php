<?php
/*
 * controleur : Préparer et afficher les offres en cours de l'utilisateur et vérifie si on est connecté
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

// faire la liste des offres en attente de l'utilisateur
$offre = new offre();
$liste = $offre->mesOffre(0,0);

// afficher la template
$affiche = "attente";
include "templates/pages/mes-offres.php";