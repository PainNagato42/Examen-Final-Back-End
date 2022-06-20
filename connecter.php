<?php
/*
 * controleur : Vérifier les identifiants et preparer à afficher l'accueil
 * parametres : POST : identifiant, mdp
 * 
 */

// faire l'initialisation
include "library/init.php";

// verifier les identifiants de connexion
if ( !connexion(isset($_POST["identifiant"]) ? $_POST["identifiant"] : "", isset($_POST["mdp"]) ? $_POST["mdp"] : "")) {
    // afficher le formulaire de connexion
    $echec = "<span style='color: red'>Vos identifiants sont incorrect, veuillez réessayer.</span>";
    include "templates/pages/form-connexion.php";
    exit;
}

// On est connecté : on redirige sur le controleur index
header('Location: index.php');