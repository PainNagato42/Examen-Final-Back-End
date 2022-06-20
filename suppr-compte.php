<?php
/*
 * controleur : faire la modifiaction du compte en non actif
 * parametres : POST : email, mdp
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

// recuperer le mot de passe
$mdp = isset($_POST["mdp"]) ? $_POST["mdp"] : "";

$utilisateur = new utilisateur();

// vérifier l'utilisateur par le mail donné
if ( ! $utilisateur->loadByEmail(isset($_POST["email"]) ? $_POST["email"] : "")) {
    $echec = "Le mail saisi est incorrect, veuillez réessayer.";
    // afficher le form de suppression du compte
    include "templates/pages/form-suppr-compte.php";
    exit;
}

// vérifie le mot de passe de l'utilisateur
if ( ! password_verify($mdp, $utilisateur->get("mdp"))) {
    $echec = "Le mot de passe saisi est incorrect, veuillez réessayer.";
    // afficher le form de suppression du compte
    include "templates/pages/form-suppr-compte.php";
    exit;
}

// faire la modification
$utilisateur->set("pseudo", "Deleted User" . uniqid());
$utilisateur->set("email", "");
$utilisateur->set("mdp", "");
$utilisateur->set("actif", 0);
$utilisateur->update();

// afficher la template
$reussi = "Votre compte a bien été supprimer.";
include "templates/pages/form-connexion.php";