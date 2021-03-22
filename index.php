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
    <!-- ===================== LOADER ===================== -->
    <div id="loader">
        <i class='bx bx-loader-alt'></i>
    </div>
    
    <!-- ===================== HEADER + NAV ===================== -->

    <?php
        include('INCLUDE/navBar.html');
    ?>  
    

    <main>

        <!-- ===================== SECTION DIRECTION PAGE ===================== -->
        <section id="direction-list">
                <div class="">
                    <a href="">
                        <i class="fas fa-paste"></i>
                        <hr>
                        <p>Compte-rendu</p>
                    </a>
                </div>
                <div class="">
                    <a href="">
                        <i class="fas fa-user"></i>
                        <hr>
                        <p>Visiteurs</p>
                    </a>
                </div>
                <div class="">
                    <a href="">
                        <i class="fas fa-user-md"></i>
                        <hr>
                        <p>Praticiens</p>
                    </a>
                </div>
                <div class="">
                    <a href="">
                        <i class="fas fa-pills"></i>
                        <i class="fas fa-capsules"></i>
                        <hr>
                        <p>Medicaments</p>
                    </a>
                </div>
        </section>

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