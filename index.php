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

        <!-- ===================== SECTION DIRECTION PAGE ===================== -->
        <section id="direction-list">
                
                    <a href="rapportVisite.php" class="directionList__container">
                        <span><i class="fas fa-paste"></i></span>
                        <hr>
                        <p>Rapports de visite</p>
                    </a>
                
                    <a href="visiteurs.php" class="directionList__container">
                        <span><i class="fas fa-user"></i></span>                      
                        <hr>
                        <p>Visiteurs</p>
                    </a>

                    <a href="praticiens.php" class="directionList__container">
                        <span><i class="fas fa-user-md"></i></span>
                        <hr>
                        <p>Praticiens</p>
                    </a>

                    <a href="medicaments.php" class="directionList__container">
                        <span><i class="fas fa-pills"></i></span>
                        <hr>
                        <p>Medicaments</p>
                    </a>
        </section>

    </main>

    <!-- ===================== SCRIPT JS ===================== -->
    <?php
        include('INCLUDE/script.html');
    ?>
    
</body>
</html>
