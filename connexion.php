<!DOCTYPE html>
<html lang="fr">
<?php
    include('head.html')
?>
<body>
    <header id="header-connexion">
        <img src="IMG/logoGSB" alt="Logo du laboratoire Galaxy Swiss Bourdin (GSB).">
    </header>
    <form action="controllerConnexion.php" method="post" required>
        <h1>Identifiez-vous</h1>
        <label for="">
            <input type="text" placeholder="Nom" required> 
        </label>
        <label for="">
            <input type="password" placeholder="Mot de passe"> 
        </label>
        <input type="submit" value="Connexion">
    </form>
</body>
</html>