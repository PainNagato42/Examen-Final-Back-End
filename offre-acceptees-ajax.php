<?php

/* 
 * controleur ajax : afficher la liste des offres acceptées
 * parametres : neant
 * Retour : fragments html
 */

// faire l'initialisation
include "library/init.php";

// verifie si on est connecté
if (!connected()) {
    exit;
}

// faire la liste des offres en attente
$offre = new offre();
$liste = $offre->mesOffre(1,0);

// envoyer le fragments
$affiche = "acceptees";
include "templates/fragments/mes-offres.php";