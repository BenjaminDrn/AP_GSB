<?php
include('INCLUDE/authentification.php');
// on teste si le visiteur a soumis le formulaire de connexion
if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion') {
	if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pass']) && !empty($_POST['pass']))) {
		// on teste si une entrée de la base contient ce couple login / pass
		$sql = 'SELECT count(*) FROM visiteur WHERE Vis_NOM = "'.mysqli_real_escape_string($serveur, stripslashes($_POST['login'])).'" AND VIS_DATEEMBAUCHE = CONVERT("'.mysqli_real_escape_string($serveur, stripslashes($_POST['pass'])).'", DATETIME)';
		$req = mysqli_query($serveur, $sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error());
		$data = mysqli_fetch_array($req);

		mysqli_free_result($req);
		mysqli_close($serveur);

		// si on obtient une réponse, alors l'utilisateur est un membre
		if ($data[0] == 1) {
			session_start();
			$_SESSION['login'] = $_POST['login'];
			header('Location: index.php');
			exit();
		}
		// si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son login, soit dans son mot de passe
		elseif ($data[0] == 0) {
			$erreur = 'Compte non reconnu.';
		}
		// sinon, alors la, il y a un gros problème :)
		else {
			$erreur = 'Probème dans la base de données : plusieurs membres ont les mêmes identifiants de connexion.';
		}
	}
	else {
		$erreur = 'Au moins un des champs est vide.';
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
            <input type="text" name="login" placeholder="login" required> 
        </label>
        <label for="date">
            <input type="password" name="pass" placeholder="Mot de passe" required> 
        </label>
        <input type="submit" name="connexion" value="Connexion">
    </form>
    <?php
        if (isset($erreur)) echo '<br /><br />',$erreur;
	?>
</body>
</html>