<?php

/* 
 * Fichier à inclure en début de chaque controleur
 */

// Initialisation : gestion du debug
ini_set("display_errors", true);
error_reporting(E_ALL);

session_start();

// Se connecter à la base de données et récupérer un "objet" pour manipuler les données
global $db;
$db = new PDO("mysql:host=localhost;dbname=examenFinal-2022;charset=UTF8" , "root", "");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);


// Charger les librairies
include_once "classes/_model.php";
include_once 'models/utilisateur.php';
include_once 'models/annonce.php';
include_once 'models/offre.php';
include "library/session.php";




