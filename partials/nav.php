    <header id="header">
        <nav class="navbar">

            <div id="toggleNavList">
                <i class='bx bx-menu' ></i>
            </div>

            <div class="navbar__brand">
                <img src="assets/IMG/logoGSB.png" alt="logo du laboratoire">
            </div>

            <ul class="navbar__list">
                <li class="navbar__item <?php if(basename($_SERVER['PHP_SELF']) == 'accueil.php'){echo 'active';}?>">
                    <a href="accueil.php" class="navbar__link">Accueil</a>
                </li>
                <li class="navbar__item <?php if(basename($_SERVER['PHP_SELF']) == 'rapports.php'){echo 'active';}?>">
                    <a href="rapports.php" class="navbar__link">Rapports de visite</a>
                </li>
                <li class="navbar__item <?php if(basename($_SERVER['PHP_SELF']) == 'visiteurs.php'){echo 'active';}?>">
                    <a href="visiteurs.php" class="navbar__link">Visiteurs</a>
                </li>
                <li class="navbar__item <?php if(basename($_SERVER['PHP_SELF']) == 'praticiens.php'){echo 'active';}?>">
                    <a href="praticiens.php" class="navbar__link">Praticiens</a>
                </li>
                <li class="navbar__item <?php if(basename($_SERVER['PHP_SELF']) == 'medicaments.php'){echo 'active';}?>">
                    <a href="medicaments.php" class="navbar__link">Médicaments</a>
                </li>

            </ul>

            

            <ul class="navbar__drop">

                <li class="drop-down">
                    <a href="#">
                        <i class='bx bx-user'></i>
                        <p><?= nameVisiteur($user_matricule); ?></p>
                    </a>
                    <ul>
                        <li>
                            <a href="profil.php">Mon profil</a>
                        </li>
                        <li>
                            <form method="post">
                                <label for="deconnexionBtn">
                                    <i class='bx bx-power-off'></i>
                                    <p>Déconnexion</p>
                                </label>

                                <input type="submit" value="deconnexion" name="deconnexionBtn" id="deconnexionBtn">
                            </form>
                        </li>
                    </ul>
                </li>
                
            </ul>

        </nav>
    </header>

    <div id="bgToggleNavList"></div>