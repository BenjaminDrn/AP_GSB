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
    <!-- ===================== LOADER ===================== -->
    <div id="loader">
        <i class='bx bx-loader-alt'></i>
    </div>
    
    <!-- ===================== HEADER + NAV ===================== -->

    <?php
        include('HTML/navBar.php');
    ?>  
    

    <main>

        
        <section id="">
                <div class="">
                    <a href="">
                        <i class='bx bx-detail'></i>
                        <hr>
                        <p>Compte-rendu</p>
                    </a>
                </div>
                <div class="">
                    <a href="">
                        <i class='bx bx-user'></i>
                        <i class='bx bxs-user'></i>
                        <hr>
                        <p>Visiteurs</p>
                    </a>
                </div>
                <div class="">
                    <a href="">

                        <hr>
                        <p>Praticiens</p>
                    </a>
                </div>
                <div class="">
                    <a href="">

                        <hr>
                        <p>Medicaments</p>
                    </a>
                </div>
        </section>

    </main>


    <script src="HTML/main.js"></script>
</body>
</html>