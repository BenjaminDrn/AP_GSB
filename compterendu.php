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
                <li>Compte-rendus</li>
            </ul>
        </section>

    <!-- ===================== SECTION CREATION COMPTE RENDUS ===================== -->           
    <i class='bx bxs-file-pdf'></i>
    </main>

    

    <!-- ===================== FOOTER ===================== -->
    <?php
        include('INCLUDE/footer.html');
    ?>

    <!-- ===================== SCRIPT JS ===================== -->
    <?php
        include('INCLUDE/script.html');
    ?>

</body>
</html>

