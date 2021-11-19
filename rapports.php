<?php 

// Constantes
define("locationPageName", "Rapports de visite");
define("locationPageLink", "rapports.php");


// Inclusion de la connexion à la base de donnée
require_once('config/database.php');


// Inclusion des fonctions et de la gestion des sessions
require_once('includes/function.php');
require_once('includes/gestionSession.php');


$user_matricule = $_SESSION['loginMatricule'];


// Requete pour récupérer le nombre de visiteurs
$req_count = $db -> prepare("SELECT * FROM rapport_visite WHERE VIS_MATRICULE = :userMatricule");
$req_count -> execute(array(':userMatricule' => $user_matricule));
$nb_total_pages = $req_count -> rowCount() - 1;
$req_count -> closeCursor();


// détermination de la page dans laquelle nous sommes
currentPageLink();


// Requete pour afficher les données du visiteur selectionné
$req_currentPage = $db -> prepare(
    "SELECT * FROM rapport_visite
    INNER JOIN praticien ON rapport_visite.PRA_NUM = praticien.PRA_NUM
    WHERE VIS_MATRICULE = :userMatricule
    ORDER BY VIS_MATRICULE ASC LIMIT $currentPage , 1"
);
$req_currentPage -> execute(array(':userMatricule' => $user_matricule));
$data = $req_currentPage -> fetch();


// Requete pour afficher les offres d'échantillons
$rapNum = $data['RAP_NUM'];

$req_offrir = $db -> prepare('SELECT * FROM offrir WHERE RAP_NUM = :rapnum');
$req_offrir -> execute(array(':rapnum' => $rapNum));


// Inclusion de la page rapport de visite views
require_once('views/rapports.views.php');


// fermer les requetes
$req_currentPage -> closeCursor();
$req_offrir -> closeCursor();

?>