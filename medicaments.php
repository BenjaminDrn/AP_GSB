<?php
    session_start();
    if (!isset($_SESSION['login'])) {
        header ('Location: connexion.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="fr">

    <!-- ===================== HEAD ===================== -->
    <?php
        include('HTML/head.html');
    ?>

<body>

    <!-- ===================== HEADER + NAV ===================== -->   
    <?php 
        include('HTML/navBar.html');
    ?>

    <main>  
        <section id="breadcrumbs-nav">
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li>Médicaments</li>
            </ul>
        </section>
    </main>

    <script src="HTML/main.js"></script>

</body>
</html>