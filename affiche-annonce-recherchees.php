<?php
/*
 * controleur : Préparer et afficher la liste des annonces recherchées
 * parametres : POST : recherche
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

// recuperer le parametre
$recherche = isset($_POST["recherche"]) ? $_POST["recherche"] : "";

// faire la liste des annonces recherchees
$annonce = new annonce();
$liste = $annonce->rechercheAnnonce($recherche);

// afficher la template
include "templates/pages/annonce-recherchees.php";