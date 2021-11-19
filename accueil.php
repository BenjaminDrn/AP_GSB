<?php 

// Constantes
define("locationPageName", "Accueil");
define("locationPageLink", "accueil.php");

// Inclusion de la connexion à la base de donnée
require_once('config/database.php');

// Inclusion des fonctions et de la gestion des sessions
require_once('includes/function.php');
require_once('includes/gestionSession.php');


$user_matricule = $_SESSION['loginMatricule'];


// Inclusion de la page accueil views
require_once('views/accueil.views.php');

?>