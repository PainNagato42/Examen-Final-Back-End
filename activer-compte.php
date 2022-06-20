<?php
/*
 * controleur : faire l'activation du compte
 * parametres : GET id : id de l'utilisateur
 * 
 */

// faire l'initialisation
include "library/init.php";

// chargé l'utilisateur
$utilisateur = new utilisateur(isset($_GET["id"]) ? $_GET["id"] : 0);

// faire la modification pour activer le compte
$utilisateur->set("actif", 1);
$utilisateur->update();

// afficher la template
$reussi = "Votre compte a bien été activer.";
include "templates/pages/form-connexion.php";