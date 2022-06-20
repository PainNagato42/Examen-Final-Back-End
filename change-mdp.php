<?php
/*
 * controleur : faire la modification du mot de passe dans la BDD
 * parametres : POST : mdp, new_mdp, new_mdp2
 * 
 */

// faire l'initialisation
include "library/init.php";

// verifié si connecté
if (!connected()) {
    // afficher la template de formulaire de connexion
    include "templates/pages/form-connexion.php";
    exit;
}

// recuperer les mot de passe
$mdp = isset($_POST["mdp"]) ? $_POST["mdp"] : "";
$new_mdp = isset($_POST["new_mdp"]) ? $_POST["new_mdp"] : "";
$new_mdp2 = isset($_POST["new_mdp2"]) ? $_POST["new_mdp2"] : "";

// charger l'utilisateur
$utilisateur = new utilisateur(monId());

// verifier le mot de passe actuel de l'utilisateur
if ( !password_verify($mdp, $utilisateur->get("mdp"))) {
    // afficher le template du form de modififation du mot de passe
    $echec = "Mot de passe actuel non correct, veuillez réessayer.";
    include "templates/pages/form-modif-mdp.php";
    exit;
}

// vérifier si le nouveau mot de passe donné correspond au mot de passe de confirmation
if ($new_mdp != $new_mdp2 ) {
    // afficher la template du form de modififation du mot de passe
    $echec = "Mot de passe de confirmation non identique à celui du nouveau mot de passe, veuillez réessayer.";
    include "templates/pages/form-modif-mdp.php";
    exit;
}

// hasher le nouveau mot de passe
$hash = password_hash(isset($_POST["new_mdp"]) ? $_POST["new_mdp"] : "", PASSWORD_DEFAULT );

// donner les valeurs saisie
$utilisateur->set("mdp", $hash);

//faire la modification
$utilisateur->update();

// afficher le template
$annonce = new annonce();
$liste = $annonce->select("WHERE `fermeture` = ", ":fermeture", "ORDER BY `id` DESC LIMIT 10", 0);
$header = include "templates/fragments/header-connecte.php";
include "templates/pages/accueil.php";