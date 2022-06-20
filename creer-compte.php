<?php
/*
 * controleur : Création du compte dans la BDD et envoi un mail pour activer le compte
 * parametres : POST : pseudo, email, mdp
 * 
 */

// faire l'initialisation
include "library/init.php";

// transformer le pseudo en minuscule
$pseudo = strtolower(isset($_POST["pseudo"]) ? $_POST["pseudo"] : "");

// hasher le mot de passe
$mdp = password_hash(isset($_POST["mdp"]) ? $_POST["mdp"] : "", PASSWORD_DEFAULT );

$email = isset($_POST["email"]) ? $_POST["email"] : "";

$utilisateur = new utilisateur();

// verifier si le pseudo est utilisé par aucun autre utilisateur
if( $utilisateur->loadByPseudo($pseudo)) {
    $echec = "Ce pseudo est déjà utilisé par un autre utilisateur, veuillez insérer un autre pseudo.";
    include "templates/pages/form-creation-compte.php";
    exit;
}

if( $utilisateur->loadByEmail($email)) {
    $echec = "Cet email est déjà utilisée";
    include "templates/pages/form-creation-compte.php";
    exit;
}

// donner les valeurs saisie
$utilisateur->set("pseudo", $pseudo);
$utilisateur->set("email", isset($_POST["email"]) ? $_POST["email"] : "");
$utilisateur->set("mdp", $mdp);
$utilisateur->insert();
$utilisateur->activationCompte();


// afficher la template
$reussi = "Le compte à bien été créé. Un mail vous à été envoyer pour activer votre compte.";
include "templates/pages/form-connexion.php";