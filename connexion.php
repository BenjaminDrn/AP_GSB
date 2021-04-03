<?php

include('INCLUDE/authentification.php');

if(isset($_POST["connexion"])){	
	$errorLogin = '<div class="error__msg"><p>Champs vides ou incorrects.</p></div>';
	if(!empty($_POST["login"]) && !empty($_POST["pass"])){
		$login = htmlspecialchars($_POST["login"]);
		$pass = htmlspecialchars($_POST["pass"]);
		$dateFormat = date_create($pass);
		if($dateFormat){
			$date = date_format($dateFormat, 'Y-m-d H:i:s');
			$req = $bdd->prepare('SELECT * FROM visiteur WHERE VIS_NOM = ? AND VIS_DATEEMBAUCHE = ?');
			$req->execute(array($login, $date));
			$data = $req->fetch();
			if ($data["VIS_NOM"] == $login && $data["VIS_DATEEMBAUCHE"] == $date) {
				session_start();
				$_SESSION['login'] = $_POST['login'];
				header('Location: index.php');
				exit();
			} 
		}
		else {
			echo $errorLogin;
		}	
	} elseif (empty($_POST["login"]) || empty($_POST["pass"])) {
		echo $errorLogin;
	}
}


?>

<!DOCTYPE html>
<html lang="fr">

    <!-- ===================== HEAD ===================== -->
    <?php
        include('INCLUDE/head.html');
    ?>

<body>
    <header id="header-connexion">
        <img src="IMG/logoGSB" alt="Logo du laboratoire Galaxy Swiss Bourdin (GSB).">
    </header>
    <form action="connexion.php" method="post" id="connexion">
        <h1>Identifiez-vous</h1>
        <label for="login">
            <input type="text" name="login" id="login" placeholder="login" > 
        </label>
        <label for="date">
            <input type="password" name="pass" id="pass" placeholder="Mot de passe" > 
        </label>
        <input type="submit" name="connexion" value="Connexion">
    </form>
</body>
</html>