<?php

/* 
 * Fonctions pour gérer la session
 * 
 * on stock dans $_SESSION ( c'est un tableau)
 *      $_SESSION["connected"] : true si on est connecté, false sinon ( $_SESSION["connected"] n'existe pas, on n'est pas connecté)
 *      $_SESSION["id"] : id de l'utilsasteur connecté (si il y en a un)
 */


function monId() {
    // Rôle: récupérer l'id de l'utilisateur connecté
    // Retour: un id ou 0 (si pas de connexion)
    // Paramètres : néant
    
    // si il n'y a pas de connexion , retourner 0
    if( ! isset($_SESSION["connected"]) or $_SESSION["connected"] == false) {
        return 0;
    }
    // retourner l'id de l'utilisateur connecté : $_SESSION["id"]
    return isset($_SESSION["id"]) ? $_SESSION["id"] : 0;
    
}

function utilisateurConnecte() {
    // Rôle: récupérer l'objet utilisateur chargé connecté
    // Retour: objet utilisateur
    // Paramètres : néant
    
    // si on est pas connecté : on va retrouner un utilisateur non chargé
    if( !connected()) {
        return new utilisateur();
    }
    
    // on est connecté
    // on a besion de recuperer l'utilisateur dont l'id est monId();
    $utilisateur = new utilisateur();
    $utilisateur->charge( monId() );
    return $utilisateur;
}

function connected() {
    // role : indiquer si on est connecté
    // retour : true si on est connecté
    // parametres : neant
    
    // si on n'a pas d'index connected dans $_SESSION ou si elle vaut false : return false
    // sinon on retourne true
    
    if( ! isset($_SESSION["connected"]) or $_SESSION["connected"] == false) {
        return false;
    } else {
        return true;
    }
}

function deconnect() {
    // role : deconnecter la session
    // retour : neant
    // parametres : neant
    
    $_SESSION["connected"] = false;
    
}

function connexion($identifiant, $mdp) {
    // role: connecter si les codes fournis sont correct
    // retour : true si on est connecter
    // parametres : 
    //              $identifiant : pseudo ou email a verifier
    //              $mdp : mot de passe a verifier
    
   // chercher un utilisateur qui a ce pseudo ou email
    $utilisateur = new utilisateur();
    if ( ! $utilisateur->loadByIdentifiant($identifiant)) {
        deconnect();
        return false;
        
    }
    
    // verifier si le compte est actif
    if ($utilisateur->get("actif") == 0) {
        deconnect();
        return false;
    }
    
    // verifier le mot de passe
    if (password_verify($mdp, $utilisateur->get("mdp") )) {
        // on declare la connexion
        // mettre true dans $_SESSION["connected"]
        $_SESSION["connected"] = true;
        // et mettre l'id du personnage trouvé dans $_SESSION["id"]
        $_SESSION["id"] = $utilisateur->id();
        return true;
    } else {
        deconnect();
        return false;
    }
    
   
        
}
