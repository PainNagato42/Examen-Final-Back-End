<?php
/*
 * controleur : faire la réinitialisation du mot de passe dans la BDD
 * parametres : GET : id : id de l'utilisateur
 *              POST : code : code de réinitialisation, mdp, mdp2
 * 
 */

// faire l'initialisation
include "library/init.php";

//charger l'utilisateur
$utilisateur = new utilisateur(isset($_GET["id"]) ? $_GET["id"] : 0);

// recuperer les parametres des mot de passe
$mdp = isset($_POST["mdp"]) ? $_POST["mdp"] : "";
$mdp2 = isset($_POST["mdp2"]) ? $_POST["mdp2"] : "";

// verifier si on a le bon code
if ( empty($utilisateur->get("reinit")) or  $utilisateur->get("reinit") != isset($_POST["code"]) ? $_POST["code"] : "") {
    $erreur = "Le code de réinitialisation est incorrect.";
    include "templates/pages/form-reinit.php";
    exit;

}

// verifier les deux mot de passe saisie
if ( $mdp != $mdp2 ) {
    // Les 2 saisies ne sont pas identiques
    $erreur = "La confirmation n'est pas identique à celui du mot de passe. Veuillez réessayer.";
    include "templates/pages/form-reinit-mdp.php";
    exit;
}

// on fait la modification
$utilisateur->set("mdp", password_hash(isset($_POST["mdp"]) ? $_POST["mdp"] : "", PASSWORD_DEFAULT));
$utilisateur->set("reinit", "");
$utilisateur->update();

// Retourner à la page de connexion
$reussi = "Votre mot de passe a bien été réinitialisé.";
include "templates/pages/form-connexion.php";