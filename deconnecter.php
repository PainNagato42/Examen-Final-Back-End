<?php
/*
 * controleur : faire la deconnexion
 * parametres : néant
 * 
 */

// faire l'initialisation
include "library/init.php";

// faire la deconnexion
deconnect();

// afficher la template
include "templates/pages/form-connexion.php";