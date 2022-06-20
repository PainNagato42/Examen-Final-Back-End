<?php
/*
 * controleur : Préparer et afficher l'annonce complète et vérifie si on est connecté
 * parametres : GET id : id de l'annonce
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

// charger l'objet annonce
$annonce = new annonce(isset($_GET["id"]) ? $_GET["id"] : 0);

if ($annonce->get("utilisateur") != monId()) {
    $offre_affiche = true;
}

// afficher la template
include "templates/pages/annonce-complete.php";