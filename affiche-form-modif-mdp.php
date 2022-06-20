<?php
/*
 * controleur : préparer et affiche le formulaire du changemant de mot de passe et verifie si on est connecté
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

// afficher la template
include "templates/pages/form-modif-mdp.php";