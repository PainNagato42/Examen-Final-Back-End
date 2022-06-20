<?php

/* 
 * controleur ajax : afficher la liste des offres en attente
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
$liste = $offre->mesOffre(0,0);

// envoyer le fragments
$affiche = "attente";
include "templates/fragments/mes-offres.php";