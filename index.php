<?php 

require_once('config/database.php');
require_once('includes/function.php');

if(isset($_POST['connexion-btn'])){

    if(isset($_POST['login'], $_POST['password'])){

        extract($_POST);

        if(isNotEmpty(['login', 'password'])){

            // Création du format de la date
            $datePassword = date_create($password);
            $dateFormatPassword = date_format($datePassword,'Y-m-d H:i:s');

            // Requete sql pour verifier si les identifiants sont bon
            $req = $db -> prepare('SELECT VIS_NOM, VIS_DATEEMBAUCHE, VIS_MATRICULE FROM visiteur WHERE VIS_NOM = :visNom AND VIS_DATEEMBAUCHE = :visDateembauche');
            $req -> execute(array(':visNom' => $login, ':visDateembauche' => $dateFormatPassword));
            $data = $req -> fetch();

            if($data){
                
                session_start();
                $_SESSION['loginName'] = $_POST['login'];
                $_SESSION['loginMatricule'] = $data['VIS_MATRICULE'];
                header('Location: accueil.php');

            } else {

                alertsError('Mauvais identifiants');

            }
            
            $req->closeCursor();
            
        } else {
            alertsError('remplissez tous les champs');
        }

    } else {
        echo 'error';
    }

} 

// Code html

require_once('views/index.views.php');

?>