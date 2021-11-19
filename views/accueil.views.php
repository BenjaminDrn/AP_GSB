<?php 
    // Inclusion des blocs head et navigation en html
    include('partials/header.php');
?>

    <main id="main">

        <?php include('partials/breadcrumbs.php');?>

        <section id="chooseDirection-container">

            <div class="chooseDirection">
                <a href="rapports.php" class="chooseDirection__link">
                    <div class="chooseDirection__icon">
                        <i class="fas fa-paste"></i>
                    </div>
                    <p>Rapports de visite</p>
                </a>
            </div>
            <div class="chooseDirection">
                <a href="visiteurs.php" class="chooseDirection__link">
                    <div class="chooseDirection__icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <p>Visiteurs</p>
                </a>
            </div>
            <div class="chooseDirection">
                <a href="praticiens.php" class="chooseDirection__link">
                    <div class="chooseDirection__icon">
                        <i class="fas fa-user-md"></i>
                    </div>
                    <p>Praticiens</p>
                </a>
            </div>
            <div class="chooseDirection">
                <a href="medicaments.php" class="chooseDirection__link">
                    <div class="chooseDirection__icon">
                        <i class="fas fa-pills"></i>
                    </div>
                    <p>Médicaments</p>
                </a>
            </div>

        </section>

    </main>

<?php 
    // Inclusion des éléments du footer en html
    include('partials/footer.php');

?>