<?php
    include('INCLUDE/sessionStart.php');
    include('INCLUDE/authentification.php');


    $req = $bdd->prepare('SELECT * from visiteur');
    $req->execute();
    $data = $req->fetch();


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
                <li>Visiteurs</li>
            </ul>
        </section>

        <!-- ===================== SECTION INFORMATIONS VISITEUR ===================== --> 
        <section id="visiteurs" class="container">
            <form action="Visiteurs.php" method="post">
                <label for="famille">
                    <p>Chercher</p>

                    <select name="selectFamilyName" id="selectFamilyName">
                    <?php

                        $reqNomVisiteur = $bdd->prepare('SELECT VIS_NOM from visiteur');
                        $reqNomVisiteur->execute();

                        $i = 0;
                        while($dataNomVisiteur = $reqNomVisiteur->fetch()){
                            echo'<option value="'.$i.'">'.$dataNomVisiteur["VIS_NOM"] .'</option>';
                            $i++; 
                        }
                        
                        
                    ?>
                    </select>   
                    <input type="submit" name="submit" id="submit" value="OK">
                </label>
                <hr>
                <label for="nom">
                    <p>Nom</p>
                    <input type="text" name="nom" value="<?php echo $data["VIS_NOM"];?>" disabled>
                </label>
                <label for="prenom">
                    <p>Prénom</p>
                    <input type="text" name="prenom" value="<?php echo $data["VIS_PRENOM"];?>" disabled>
                </label>
                <label for="adresse">
                    <p>Adresse</p>
                    <input type="text" name="adresse" value="<?php echo $data["VIS_ADRESSE"];?>" disabled>
                </label>
                <label for="ville" class="inputVille">
                    <p>Ville</p>
                    <input type="text" name="codePostal" value="<?php echo $data["VIS_CP"];?>" disabled>
                    <input type="text" name="ville" value="<?php echo $data["VIS_VILLE"];?>" disabled>
                </label>
                <label for="secteur">
                    <p>Secteur</p>
                    <input type="text" name="secteur" value="<?php echo $data["SEC_CODE"];?>" disabled>
                </label>
                <label for="labo">
                    <p>Laboratoire</p>
                    <input type="text" name="labo" value="<?php echo $data["LAB_CODE"];?>" disabled>
                </label>

                <div class="action__btn">
                    <div class="action__btn_move">
                        <input type="submit" name="previous" id="previous" value="précedent">
                        <input type="submit" name="next" id="next" value="suivant">
                    </div>
                    <div class="action__btn_close">
                        <a href="index.php"><button>fermer</button></a>
                    </div>
                </div>
            </form>

            
        </section>

    </main>

    <!-- ===================== SCRIPT JS ===================== -->
    <?php
        include('INCLUDE/script.html');
    ?>

</body>
</html>