<!DOCTYPE html>
<html lang="fr">
<?php
    include('head.html')
?>
<body>
    <!-- ===================== LOADER ===================== -->
    <div id="loader">
        <i class='bx bx-loader-alt'></i>
    </div>
    
    <header id="header">
        <nav class="nav__container">

            <!-- ========== Icones menu déroulant ========== -->
            <div class="nav__toggleBtn toggle" id="nav-btn-toggle">
                <i class='bx bx-menu'></i>
            </div>
            <!-- ========== Logo du laboratoire ========== -->
            <div class="nav__brand">
                <a href="#">
                    <img src="IMG/logoGSB.png" alt="Logo du laboratoire Galaxy Swiss Bourdin (GSB).">
                </a>
            </div>
            <!-- ========== Navigation ========== -->
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <!--COMPES-RENDUS-->
                    <li class="nav__item">
                        <a href="#" class="nav__link">Comptes-rendus</a>
                    </li>
                    <!--VISITEURS-->
                    <li class="nav__item">
                        <a href="#presentation" class="nav__link">Visiteurs</a>
                    </li>
                    <!--PRATICIENS-->
                    <li class="nav__item">
                        <a href="#" class="nav__link">Praticiens</a>
                    </li>
                    <!--MEDICAMENTS-->
                    <li class="nav__item">
                        <a href="#" class="nav__link">Medicaments</a>
                    </li>
                    <li class="nav__item nav__leaveBtn toggle" id="leaveBtn1">
                        <button><i class='bx bx-power-off'></i>Déconnexion</button>
                    </li>
                </ul>
                
            </div>
            <!-- ========== Déconnexion ========== -->
            <div class="nav__leaveBtn toggle" id="leaveBtn2">
                <button><i class='bx bx-power-off'></i></button>
            </div>

        </nav>
    </header>

    <main>
        <section>
            <a href="connexion.php">formulaire de connexion</a>
        </section>
    </main>

    
    <script src="Main.js"></script>
</body>
</html>