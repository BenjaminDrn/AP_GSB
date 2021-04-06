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

                        while($dataNomPraticien = $reqNomPraticien->fetch()){
                            echo'<option value="'.$dataNomPraticien["PRA_NUM"].'">'.$dataNomPraticien["PRA_NOM"].' '.$dataNomPraticien["PRA_PRENOM"].'</option>';
                        }
                        
                    ?>
                    <input type="submit" name="submit" id="submit" value="OK">
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
                <table>
                    <tr>
                      <th>Médicaments</th> 
                      <th>Nb. Echantillons</th>
                    </tr>
                    <?php
                        $tableau = $bdd->prepare('SELECT * from rapport_Visite INNER JOIN offrir ON rapport_Visite.RAP_NUM = offrir.RAP_NUM');
                        $tableau->execute();
                        while($tableauEchantillons = $tableau->fetch()) {
                            if ($tableauEchantillons["RAP_NUM"] == $data["RAP_NUM"]) {
                                echo "<tr><td>" .$tableauEchantillons["MED_DEPOTLEGAL"]. "</td><td>" .$tableauEchantillons["OFF_QTE"]. "</td></tr>";
                            }
                        };
                        echo "</table>";
                    ?>
                </table>
                <div class="action__btn">
                    <div class="action__btn_move">
                        <input type="submit" name="previous" id="previous" value="Précedent">
                        <input type="submit" name="next" id="next" value="Suivant">
                        <input type="submit" name="new" id="new" value="Nouveau">
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
