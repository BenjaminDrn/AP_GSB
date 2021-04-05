<?php
    
    $number = 1;
    include('INCLUDE/sessionStart.php');
    include('INCLUDE/authentification.php');

    $req = $bdd->prepare('SELECT * from praticien ');
    $req->execute();

    if(isset($_POST["selectFamilyName"])){
        $number = $_POST["selectFamilyName"];
        $req = $bdd->prepare('SELECT * from praticien INNER JOIN type_praticien ON praticien.TYP_CODE = type_praticien.TYP_CODE WHERE PRA_NUM = '.$number.' ');
        $req->execute();
    }

    $data = $req->fetch();

    //WHERE PRA_NUM = '.$number.'

    // echo $req->rowCount();
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
            <form action="Praticiens.php" method="post">
                <label for="famille">
                    <p>Chercher</p>

                    <select name="selectFamilyName" id="selectFamilyName">
                    <?php

                        $reqNomPraticien = $bdd->prepare('SELECT * from praticien');
                        $reqNomPraticien->execute();

                        while($dataNomPraticien = $reqNomPraticien->fetch()){
                            echo'<option value="'.$dataNomPraticien["PRA_NUM"].'">'.$dataNomPraticien["PRA_NOM"].' '.$dataNomPraticien["PRA_PRENOM"].'</option>';
                        }
                        
                    ?>
                    </select>   
                    <input type="submit" name="submit" id="submit" value="OK">
                </label>
                <hr>
                <label for="numero">
                    <p>Numéro</p>
                    <input type="text" name="numero" value="<?php echo $data["PRA_NUM"];?>" disabled>
                </label>
                <label for="nom">
                    <p>Nom</p>
                    <input type="text" name="nom" value="<?php echo $data["PRA_NOM"];?>" disabled>
                </label>
                <label for="prenom">
                    <p>Prénom</p>
                    <input type="text" name="prenom" value="<?php echo $data["PRA_PRENOM"];?>" disabled>
                </label>
                <label for="adresse">
                    <p>Adresse</p>
                    <input type="text" name="adresse" value="<?php echo $data["PRA_ADRESSE"];?>" disabled>
                </label>
                <label for="ville" class="inputVille">
                    <p>Ville</p>
                    <input type="text" name="codePostal" value="<?php echo $data["PRA_CP"];?>" disabled>
                    <input type="text" name="ville" value="<?php echo $data["PRA_VILLE"];?>" disabled>
                </label>
                <label for="coeff">
                    <p>Coeff. Notoriété</p>
                    <input type="text" name="coeffNotoriete" value="<?php echo $data["PRA_COEFNOTORIETE"];?>" disabled>
                </label>
                <label for="lieuDexercice">
                    <p>Lieu d'exercice</p>
                    <input type="text" name="lieuExercice" value="<?php echo $data["TYP_LIBELLE"];?>" disabled>
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
