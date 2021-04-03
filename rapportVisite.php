<?php
    include('INCLUDE/sessionStart.php');
?>
<!DOCTYPE html>
<html lang="fr">

    <!-- ===================== HEAD ===================== -->
    <?php
        include('INCLUDE/head.html');
    ?>

<body>

    <!-- ===================== HEADER + NAV ===================== -->   
    <?php 
        include('INCLUDE/navBar.html');
    ?>

    <main>
    <!-- ===================== SECTION BREADCRUMBS NAVIGATION ===================== -->           
        <section id="breadcrumbs-nav">
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li>Rapports de visite</li>
            </ul>
        </section>
    <!-- ===================== SECTION INFORMATIONS RAPPORTS DE VISITE ===================== -->

    <section id="rapports-visite" class="container">

    </section>

    <!-- ===================== SECTION CREATION RAPPORTS ===================== -->           
    <i class='bx bxs-file-pdf'></i>
    </main>

    <!-- ===================== SCRIPT JS ===================== -->
    <?php
        include('INCLUDE/script.html');
    ?>

</body>
</html>

