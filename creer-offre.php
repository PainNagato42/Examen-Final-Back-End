<?php
/*
 * controleur : Création de l'offre dans la BDD et vérifie si on est connecté
 * parametres : POST : interet, prix, id_annonce, id_receveur
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

// donner les valeurs saisie et faire la création
$offre = new offre();
$offre->set("envoyeur", monId());
$offre->set("receveur", isset($_POST["id_receveur"]) ? $_POST["id_receveur"] : 0);
$offre->set("annonce", isset($_POST["id_annonce"]) ? $_POST["id_annonce"] : 0);
$offre->set("interet", isset($_POST["interet"]) ? $_POST["interet"] : "");
$offre->set("prix", isset($_POST["prix"]) ? $_POST["prix"] : 0);
$offre->insert();

// afficher la template
$liste = $offre->mesOffre(0,0);
$affiche = "attente";
include "templates/pages/mes-offres.php";