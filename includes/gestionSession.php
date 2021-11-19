<?php 

    session_start();
    
    if (!isset($_SESSION['loginName'],  $_SESSION['loginMatricule'])) {
        header('Location: index.php');
    } 
    
    if(isset($_POST['deconnexionBtn'])){
        session_unset();
        session_destroy();
        header('Location: index.php');
    }

?>