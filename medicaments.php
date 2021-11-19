<?php 

// Constantes
define("locationPageName", "Médicaments");
define("locationPageLink", "medicaments.php");


// Inclusion de la connexion à la base de donnée
require_once('config/database.php');


// Inclusion des fonctions et de la gestion des sessions
require_once('includes/function.php');
require_once('includes/gestionSession.php');


$user_matricule = $_SESSION['loginMatricule'];

// Requete pour récupérer le nombre de visiteurs
$req_count = $db -> prepare("SELECT * FROM medicament");
$req_count -> execute();
$nb_total_pages = $req_count -> rowCount() - 1;
$req_count -> closeCursor();


// détermination de la page dans laquelle nous sommes
currentPageLink();


// Requete pour afficher les données du visiteur selectionné
$req_currentPage = $db -> prepare(
    "SELECT * FROM medicament
    INNER JOIN famille ON medicament.FAM_CODE = famille.FAM_CODE
    ORDER BY MED_DEPOTLEGAL ASC LIMIT $currentPage , 1"
);
$req_currentPage -> execute();
$data = $req_currentPage -> fetch();


// Inclusion de la page accueil views
require_once('views/medicaments.views.php');


// fermer les requetes
$req_currentPage -> closeCursor();

?>