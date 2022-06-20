<?php
/*
 * controleur : Préparer et afficher la page d'accueil
 * parametres : néant
 * 
 */

// faire l'initialisation
include "library/init.php";

// verifier si on est connecté pour afficher le bon header
if ( !connected()) {
    // afficher le header non connecté
    $header = include "templates/fragments/header-non-connecte.php";
} else {
    $header = include "templates/fragments/header-connecte.php";
}

// faire la liste des 10 dernières annonces
$annonce = new annonce();
$liste = $annonce->select("WHERE `fermeture` = ", ":fermeture", "ORDER BY `id` DESC LIMIT 10", 0);

// afficher le template
include "templates/pages/accueil.php";