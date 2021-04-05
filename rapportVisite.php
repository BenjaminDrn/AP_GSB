<?php

    include('INCLUDE/sessionStart.php');
    include('INCLUDE/authentification.php');

    $req = $bdd->prepare('SELECT * FROM rapport_visite');
    $req->execute();

    if(isset($_POST["selectFamilyName"])){
        $number = $_POST["selectFamilyName"];
        $req = $bdd->prepare('SELECT * from rapport_visite WHERE PRA_NUM = "'.$number.'" ');
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
                <li>Rapports de visite</li>
            </ul>
        </section>

        <!-- ===================== SECTION INFORMATIONS VISITEUR ===================== --> 
        <section id="rapportVisites" class="container">
            <form action="rapportVisite.php" method="post">
                <label for="id">
                    <p>Numéro Rapport</p>
                    <input type="text" name="num" value="<?php echo $data["RAP_NUM"];?>" disabled>
                </label>
                <hr>
                <label for="famille">
                    <p>Praticien</p>

                    <select name="selectFamilyName" id="selectFamilyName">
                    <?php

                        $reqNomPraticien = $bdd->prepare('SELECT * from rapport_Visite INNER JOIN praticien ON rapport_Visite.PRA_NUM = praticien.PRA_NUM');
                        $reqNomPraticien->execute();

                        $i = 1;
                        while($dataNomPraticien = $reqNomPraticien->fetch()){
                            echo'<option value="'.$dataNomPraticien["PRA_NUM"].'">'.$dataNomPraticien["PRA_NOM"].' '.$dataNomPraticien["PRA_PRENOM"].'</option>';
                            $i++;
                        }
                        
                    ?>
                    <input type="submit" name="submit" id="submit" value="Détails">
                    </select>   
                </label>
                <label for="date">
                    <p>Date Rapport</p>
                    <input type="text" name="date" value="<?php echo date_format(date_create($data["RAP_DATE"]), 'd/m/Y');?>" disabled>
                </label>
                <label for="motif">
                    <p>Motif Visite</p>
                    <input type="text" name="motif" value="<?php echo $data["RAP_MOTIF"];?>" disabled>
                </label>
                <label for="bilan">
                    <p>BILAN</p>
                    <input type="text" name="bilan" value="<?php echo $data["RAP_BILAN"];?>" disabled>
                </label>
                <label for="echantillons">
                    <p>Offre d'échantillons</p>
                    <input type="text" name="echantillons" value="" disabled>
                </label>

                <div class="action__btn">
                    <div class="action__btn_move">
                        <input type="submit" name="previous" id="previous" value="Précedent">
                        <input type="submit" name="next" id="next" value="Suivant">
                        <input type="submit" name="new" id="new" value="Nouveau">
                    </div>
                    <div class="action__btn_close">
                        <a href="index.php"><button>Fermer</button></a>
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
