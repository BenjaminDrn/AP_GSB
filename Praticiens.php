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
                <li>Praticiens</li>
            </ul>
        </section>

        <!-- ===================== SECTION INFORMATIONS PRATICIENS ===================== -->
        <section id="praticiens" class="container">
            <form action="">
                <label for="chercher">
                    <p>Chercher</p>
                    <input type="text" name="">
                </label>
                <hr>
                <label for="numero">
                    <p>Numéro</p>
                    <input type="text" name="">
                </label>
                <label for="nom">
                    <p>Nom</p>
                    <input type="text" name="">
                </label>
                <label for="prenom">
                    <p>Prénom</p>
                    <input type="text" name="">
                </label>
                <label for="adresse">
                    <p>Adresse</p>
                    <input type="text" name="">
                </label>
                <label for="ville" class="inputVille">
                    <p>Ville</p>
                    <input type="text" name="codePostal">
                    <input type="text" name="ville">
                </label>
                <label for="coeff">
                    <p>Coeff. Notoriété</p>
                    <input type="text" name="">
                </label>
                <label for="lieuDexercice">
                    <p>Lieu d'exercice</p>
                    <input type="text" name="">
                </label>
            </form>

            <div class="action__btn">
                <div class="action__btn_move">
                    <a href=""><button>précédent</button></a>
                    <a href="" ><button>suivant</button></a>
                </div>
                <div class="action__btn_close">
                    <a href="index.php"><button>fermer</button></a>
                </div>
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