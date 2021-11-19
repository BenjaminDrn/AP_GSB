<?php

require_once('config/database.php');
require_once('includes/function.php');
require_once('includes/gestionSession.php');

$user_matricule = $_SESSION['loginMatricule'];

const HTTP_OK = 200;
const HTTP_BAD_REQUEST = 400;
const HTTP_METHOD_NOT_ALLOWED = 405;

if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtoupper($_SERVER['HTTP_X_REQUESTED_WITH']) == 'XMLHTTPREQUEST'){

    $response_code = HTTP_BAD_REQUEST;
    $message = "Tous les champs n'existe pas !";


    //Requete pour donner le numéro du nouveau rapport 
    $req_rap_num = $db -> prepare("SELECT MAX(RAP_NUM) AS numMax_rapport FROM rapport_visite");
    $req_rap_num ->execute();
    $data = $req_rap_num -> fetch();

    $MaxNumRapport = (int) $data["numMax_rapport"];
    
    $req_rap_num -> closeCursor();


    if(isset($_POST['praticienNum'], $_POST['dateRapport'], $_POST['motifRapport'], $_POST['bilanRapport'])){

        $response_code = HTTP_BAD_REQUEST;
        $message = "Tous les champs non pas été remplis !";

        extract($_POST);

        if(isNotEmpty(['praticienNum', 'dateRapport', 'motifRapport', 'bilanRapport'])){

            // transformations de la data en entités HTML
            htmlspecialchars($motifRapport);
            htmlspecialchars($bilanRapport);

            if($praticienNum != 0){
                // Enregistrement de la data dans la table rapport_visite 

                $req = $db -> prepare(
                    "INSERT INTO rapport_visite(VIS_MATRICULE, RAP_NUM, PRA_NUM, RAP_DATE, RAP_BILAN, RAP_MOTIF)
                    VALUES (:vis_matricule, :rap_num, :pra_num, :rap_date, :rap_bilan, :rap_motif)"
                );
                $req -> execute(array(
                    ':vis_matricule' => $user_matricule,//string
                    ':rap_num' => $MaxNumRapport + 1,//int
                    ':pra_num' =>(int) $praticienNum,//int
                    ':rap_date' => $dateRapport,//string
                    ':rap_bilan' => $bilanRapport,//string
                    ':rap_motif' => $motifRapport//string
                ));

                $req -> closeCursor();

                $response_code = HTTP_OK;
                $message = "OK !";

            } else {
                $response_code = HTTP_BAD_REQUEST;
                $message = " Veuillez choisir un praticien !";
            }        
        }
    }

    if(isset($_POST['tabOffert']) && count($_POST['tabOffert']) > 0){

        extract($_POST);

        for($i = 0; $i < count($tabOffert); $i++){
            if(count($tabOffert[$i]) == 2){
                if(preg_match("/[A-Z0-30]/", $tabOffert[$i][0]) &&  $tabOffert[$i][1] <= 100){
                    
                    $req = $db -> prepare(
                        "INSERT INTO offrir(VIS_MATRICULE, RAP_NUM, MED_DEPOTLEGAL, OFF_QTE)
                        VALUES (:vis_matricule, :rap_num, :med_depotlegal, :off_qte)"
                    );
                    $req -> execute(array(
                        ':vis_matricule' => $user_matricule,
                        ':rap_num' => $MaxNumRapport + 1,
                        ':med_depotlegal' => $tabOffert[$i][0],
                        ':off_qte' => $tabOffert[$i][1]
                    ));
    
                    $req -> closeCursor();

                }
            }  
        }

    }
    
    responsefunction($response_code, $message);

} else {
    $response_code = HTTP_METHOD_NOT_ALLOWED;
    $message = "Method not allowed !";
}

function responsefunction($response_code, $message){
    header('Content-Type: application/json');

    http_response_code($response_code);
    $response = [
        "response_code" => $response_code,
        "message" => $message
    ];

    echo json_encode($response);
}

?>