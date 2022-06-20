<?php
/*
 * controleur : Création de l'annonce dans la BDD et vérifie si on est connecté
 * parametres : POST : titre, description, photo, prix
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

// donner les valeurs saisies
$annonce = new annonce();
$annonce->set("utilisateur", monId());
$annonce->set("titre", isset($_POST["titre"]) ? $_POST["titre"] : "");
$annonce->set("description", isset($_POST["description"]) ? $_POST["description"] : "");
$annonce->set("date", date("Y-m-d H:i:s"));
$annonce->set("prix", isset($_POST["prix"]) ? $_POST["prix"] : "");


// ON vérifie si le fichier est téléchargé
if ( $_FILES["photo"]["error"] == UPLOAD_ERR_INI_SIZE or $_FILES["photo"]["error"] == UPLOAD_ERR_FORM_SIZE ) {
    // Fichier trop gros : on réaffiche le formulaire avec un message d'erreur
    echo "Fichier trop gros";
    exit;
    
} else if ( $_FILES["photo"]["error"] != UPLOAD_ERR_OK) {
    // Erreur technique
    echo "Chargement impossible : ré-essayer plus tard";
    exit;
    
}

// On va éviter de perdre l'extension:
$extension = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
// SI on veut faire des noms uniques : on peut utislier la fonction uniqid();
$photo = "img/telechargees/maphoto_" . uniqid(). "." . $extension;
// Ranger le fichier
if ( ! move_uploaded_file($_FILES["photo"]["tmp_name"], $photo)) {
    // Erreur stockage fichier
    echo "Erreur stockage fichier $photo";
    exit;
}

$annonce->set("photo", $photo);
$annonce->insert();

// afficher le template
$liste = $annonce->mesAnnonces(0);
include "templates/pages/annonce-en-cours.php";