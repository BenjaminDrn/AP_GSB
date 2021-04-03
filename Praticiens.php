<?php
    
    include('INCLUDE/sessionStart.php');
    include('INCLUDE/authentification.php');

    $req = $bdd->prepare('SELECT * from praticien ');
    $req->execute();

    

    if(isset($_POST["selectFamilyName"]) || isset($_POST["next"]) || isset($_POST["previous"])){
        $number = $_POST["selectFamilyName"];
        $req = $bdd->prepare('SELECT * from praticien WHERE PRA_NUM = '.$number.' ');
        
        // if(isset($_POST["next"])){
        //     $number += 1;
        // } elseif(isset($_POST["previous"])){
        //     $number -= 1;
        // }
        
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

                        $reqNomPraticien = $bdd->prepare('SELECT PRA_NOM from praticien');
                        $reqNomPraticien->execute();

                        $i = 1;
                        while($dataNomPraticien = $reqNomPraticien->fetch()){
                            echo'<option value="'. $i .'">'.$dataNomPraticien["PRA_NOM"] .'</option>';
                            $i++; 
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
                    <input type="text" name="lieuExercice" value="<?php echo $data["TYP_CODE"];?>" disabled>
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