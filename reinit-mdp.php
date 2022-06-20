<?php
/*
 * controleur : réinitialiser le mot de passe
 * parametres : GET : id : id de l'utilisateur, code : le code de réinit
 * 
 */

// faire l'initialisation
include "library/init.php";

// charger l'utilisateur
$utilisateur = new utilisateur(isset($_GET["id"]) ? $_GET["id"] : 0);

if ( ! empty($utilisateur->get("reinit")) and  $utilisateur->get("reinit") == isset($_GET["code"]) ? $_GET["code"] : "" ) {
    // C'est bon :
    // Afficher le formulaire de saisie d'un mot de passe qui sécurise avec le code
    include "templates/pages/form-reinit-mdp.php";
    exit;
    
    
} else {
    // afficher page d'erreur
    include "templates/pages/reinit-erreur.php";
}

