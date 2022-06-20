<?php
/*
 * controleur : Faire l'envoi du mail pour rénit le mot de passe
 * parametres : POST : email
 * 
 */

// faire l'initialisation
include "library/init.php";


// verifier l'utilisateur ayant l'email donné
$utilisateur = new utilisateur();
if ($utilisateur->loadByEmail(isset($_POST["email"]) ? $_POST["email"] : "") ) {
    // on fait la réinit
    $utilisateur->reinitEmail();
 
}

// afficher la template
$reussi = "Mail envoyé";
include "templates/pages/form-connexion.php";