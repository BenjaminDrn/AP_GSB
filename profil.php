<?php 

// Constantes
define("locationPageName", "Profil");
define("locationPageLink", "profil.php");

// Inclusion de la connexion à la base de donnée
require_once('config/database.php');

// Inclusion des fonctions et de la gestion des sessions
require_once('includes/function.php');
require_once('includes/gestionSession.php');


$user_matricule = $_SESSION['loginMatricule'];

// Requete pour afficher les données du visiteur selectionné
$req_currentPage = $db -> prepare(
    "SELECT * FROM visiteur
    INNER JOIN labo ON visiteur.LAB_CODE = labo.LAB_CODE
    WHERE VIS_MATRICULE = :vis_matricule"
);
$req_currentPage -> execute(array(":vis_matricule" => $user_matricule));
$data = $req_currentPage -> fetch();

$adresse = $data['VIS_ADRESSE'];
$cp = $data['VIS_CP'];
$ville = $data['VIS_VILLE'];

if(isset($_POST['saveNewInfos'])){

    if($_POST['vis-adresse'] != $adresse || $_POST['vis-cp'] != $cp || $_POST['vis-ville'] != $ville){

        $req = $db -> prepare("UPDATE visiteur SET VIS_ADRESSE = :vis_adresse, VIS_CP = :vis_cp, VIS_VILLE = :vis_ville  WHERE VIS_MATRICULE = :vis_matricule");
        $req -> execute(array(
            ':vis_matricule' => $user_matricule,
            ':vis_adresse' => $_POST['vis-adresse'],
            ':vis_cp' => $_POST['vis-cp'],
            ':vis_ville' => $_POST['vis-ville']
        ));
        $req -> closeCursor();

        echo 'modification faite !';

    }
    
}


// 


// Inclusion de la page accueil views
require_once('views/profil.views.php');

?>