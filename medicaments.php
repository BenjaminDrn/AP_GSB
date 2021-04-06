<?php
    
    include('INCLUDE/sessionStart.php');
    include('INCLUDE/authentification.php');

    $req = $bdd->prepare('SELECT * from medicament INNER JOIN famille ON medicament.FAM_CODE = famille.FAM_CODE');
    $req->execute();

    if(isset($_POST["selectFamilyMed"])){
        $name = $_POST["selectFamilyMed"];
        $req = $bdd->prepare('SELECT * from medicament INNER JOIN famille ON medicament.FAM_CODE = famille.FAM_CODE WHERE MED_NOMCOMMERCIAL = "'.$name.'"');
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
                <li>Médicaments</li>
            </ul>
        </section>

        <!-- ===================== SECTION INFORMATIONS MEDICAMENTS ===================== -->
        <section id="praticiens" class="container">
            <form action="medicaments.php" method="post">
                <label for="code">
                    <p>Code</p>
                    <input type="text" name="code" value="<?php echo $data["MED_DEPOTLEGAL"];?>" disabled>
                </label>
                
                <label for="nomCommercial">
                    <p>Nom commercial</p>
                    <select name="selectFamilyMed" id="selectFamilyMed">
                    <?php
                        $reqMed = $bdd->prepare('SELECT * from medicament INNER JOIN famille ON medicament.FAM_CODE = famille.FAM_CODE');
                        $reqMed->execute();

                        while($dataMed = $reqMed->fetch()){
                            echo'<option value="'.$dataMed["MED_NOMCOMMERCIAL"].'">'.$dataMed["MED_NOMCOMMERCIAL"].'</option>';
                        }
                    ?>
                    </select>
                    <input type="submit" value="OK">
                </label>

                <label for="famille">
                    <p>Famille</p>
                    <input type="text" name="famille" value="<?php echo $data["FAM_LIBELLE"];?>" disabled>
                </label>
                <label for="composition">
                    <p>Composition</p>
                    <input type="text" name="composition" value="<?php echo $data["MED_COMPOSITION"];?>" disabled>
                </label>
                <label for="EffetsIndésirables">
                    <p>Effets indésirables</p>
                    <textarea name="effetsIndesirables" cols="30" rows="5" disabled><?php echo $data["MED_EFFETS"];?></textarea>
                </label>
                <label for="contreIndications">
                    <p>Contre indications</p>
                    <textarea name="contreIndications" cols="30" rows="5" disabled><?php echo $data["MED_CONTREINDIC"];?></textarea>
                </label>
                <label for="prix">
                    <p>Prix échantillon</p>
                    <input type="text" name="prixEchantillon" value="<?php echo $data["MED_PRIXECHANTILLON"];?>" disabled>
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
