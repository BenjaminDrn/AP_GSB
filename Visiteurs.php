<?php

    include('INCLUDE/sessionStart.php');
    include('INCLUDE/authentification.php');

    $req = $bdd->prepare('SELECT * FROM visiteur');
    $req->execute();

    if(isset($_POST["selectFamilyName"])){
        $number = $_POST["selectFamilyName"];
        $req = $bdd->prepare('SELECT * FROM visiteur WHERE VIS_MATRICULE = "'.$number.'"');
        $req->execute();
    }

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

                        $reqNomVisiteur = $bdd->prepare('SELECT * from visiteur');
                        $reqNomVisiteur->execute();

                        while($dataNomVisiteur = $reqNomVisiteur->fetch()){
                            echo'<option value="'.$dataNomVisiteur["VIS_MATRICULE"].'">'.$dataNomVisiteur["VIS_NOM"].' '.$dataNomVisiteur["VIS_PRENOM"].'</option>';
                        }
                        
                    ?>
                    <input type="submit" name="submit" id="submit" value="OK">
                    </select>   
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
                    <input type="text" name="secteur" value="<?php $reqSecteur = $bdd->prepare('SELECT SEC_LIBELLE from secteur WHERE SEC_CODE = "'.$data["SEC_CODE"].'"'); $reqSecteur->execute(); $dataSecteur = $reqSecteur->fetch(); echo $dataSecteur["SEC_LIBELLE"]?>" disabled>
                </label>
                <label for="labo">
                    <p>Laboratoire</p>
                    <input type="text" name="labo" value="<?php $reqLabo = $bdd->prepare('SELECT LAB_NOM from labo WHERE LAB_CODE = "'.$data["LAB_CODE"].'"'); $reqLabo->execute(); $dataLabo = $reqLabo->fetch(); echo $dataLabo["LAB_NOM"]?>" disabled>
                </label>

                <div class="action__btn">
                    <div class="action__btn_move">
                        <input type="submit" name="previous" id="previous" value="précedent">
                        <input type="submit" name="next" id="next" value="suivant">
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
