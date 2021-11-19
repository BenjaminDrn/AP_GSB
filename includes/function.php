<?php 

// function qui va voir si tout les champs du formulaires sont remplis
function isNotEmpty($fields = []){
    if($fields != 0){
        for($i = 0; $i < count($fields); $i++){
            if(empty($_POST[$fields[$i]])){
                return false;
            }
        }
        return true;
    }
}


// function qui affiche les erreurs
function alertsError($errors){
    echo '
        <div class="error_container">
            <p class="error">'. $errors .'</p>
        </div>
    ';
}


// function qui définit la page actuelle 
function currentPageLink(){
    global $currentPage, $nb_total_pages;

    if(isset($_GET['page']) && !empty($_GET['page'])){
        if($_GET['page'] >= 0 && $_GET['page'] <= $nb_total_pages){
            $currentPage = (int) strip_tags($_GET['page']);
        } else {
            $currentPage = 0;        
        }
    } else {
        $currentPage = 0;
    } 
    
}


// function qui affiche le contenue de pagination 
function paginationContent(){
    global $currentPage, $nb_total_pages;

    // condition pour la page actuelle minimum
    if($currentPage == 0){
        $min_currentPage_disabled = "disabled";
        $min_currentPage = $currentPage;
    } else {
        $min_currentPage_disabled = "";
        $min_currentPage = $currentPage - 1;
    }

    // condition pour la page actuelle maximum    
    if($currentPage == $nb_total_pages){
        $max_currentPage_disabled = "disabled";
        $max_currentPage = $currentPage;
    } else {
        $max_currentPage_disabled = "";
        $max_currentPage = $currentPage + 1;
    }

    echo '
        <div class="action__btn">
            <ul class="pagination">
                <li class="pagination__btn '. $min_currentPage_disabled .' ">
                    <a href="'. locationPageLink . '?page=' . $min_currentPage . '">Précédent</a>
                </li>
                <li class="pagination__btn '. $max_currentPage_disabled .' ">
                   <a href="'. locationPageLink . '?page=' . $max_currentPage . '">Suivant</a>
                </li>
            </ul>
        </div>
    ';
    
}

// function qui récupère le nom d'un visiteur à l'aide de son ID 

function nameVisiteur($loginMatricule){

    global $db;

    $req = $db -> prepare("SELECT VIS_MATRICULE, VIS_NOM FROM visiteur WHERE VIS_MATRICULE = :vis_matricule");
    $req -> execute(array(':vis_matricule' => $loginMatricule));
    $data = $req -> fetch();

    $vis_nom = $data['VIS_NOM'];

    // $req -> closeCursor();

    return $vis_nom;
}

?>
