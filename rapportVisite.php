<?php

    include('INCLUDE/sessionStart.php');
    include('INCLUDE/authentification.php');

    $req = $bdd->prepare('SELECT * FROM rapport_visite');
    $req->execute();

    if(isset($_POST["selectFamilyName"])){
        $number = $_POST["selectFamilyName"];
        $req = $bdd->prepare('SELECT * from rapport_visite WHERE PRA_NUM = '.$number.'');
        $reqNom = $bdd->prepare('SELECT * from praticien INNER JOIN type_praticien ON praticien.TYP_CODE = type_praticien.TYP_CODE WHERE PRA_NUM = '.$number.'');
        $req->execute();
        $reqNom->execute();
    }

    $data = $req->fetch();

    if(empty($_POST["selectFamilyName"])){
        $reqNom = $bdd->prepare('SELECT * from praticien INNER JOIN type_praticien ON praticien.TYP_CODE = type_praticien.TYP_CODE WHERE PRA_NUM = '.$data["PRA_NUM"].'');
        $reqNom->execute();
        $dataNom = $reqNom->fetch();
    }


?>
<!DOCTYPE html>
<html lang="fr">

    <!-- ===================== HEAD ===================== -->
    <?php
        include('INCLUDE/head.html');
    ?>

    <link rel="stylesheet" href="detail.css">

<body>
    <!-- ===================== HEADER + NAV ===================== -->   
    <?php 
        include('INCLUDE/navBar.html');
    ?>

    <button class="button" data-modal="modalOne">Detail</button>
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

                        if (isset($_POST["selectFamilyName"])) {
                            $dataNom = $reqNom->fetch();
                            echo '<option selected="selected" hidden disabled name="selected">'.$dataNom["PRA_NOM"].' '.$dataNom["PRA_PRENOM"].'</option>';
                        }

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

    <div id="modalOne" class="modal">
        <div class="modal-content">
            <div class="contact-form">
                <h2>Informations du Praticien</h2>
                <p>Numéro</p>
                <input type="text" value="<?php echo $dataNom["PRA_NUM"];?>" disabled>
                <p>Nom</p>
                <input type="text" name="bilan" value="<?php echo $dataNom["PRA_NOM"];?>" disabled>
                <p>Prenom</p>
                <input type="text" name="bilan" value="<?php echo $dataNom["PRA_PRENOM"];?>" disabled>
                <p>Adresse</p>
                <input type="text" name="bilan" value="<?php echo $dataNom["PRA_ADRESSE"];?>" disabled>
                <p>Ville</p>
                <input type="text" name="bilan" value="<?php echo $dataNom["PRA_VILLE"];?>" disabled>
                <p>Coeff. Notoriété</p>
                <input type="text" name="bilan" value="<?php echo $dataNom["PRA_COEFNOTORIETE"];?>" disabled>
                <p>Lieu d'exercice</p>
                <input type="text" name="bilan" value="<?php echo $dataNom["TYP_LIBELLE"];?>" disabled>
            </div>
        </div>
    </div>
    <script>
        var modalBtns = [...document.querySelectorAll(".button")];
        modalBtns.forEach(function(btn) {
            btn.onclick = function() {
                var modal = btn.getAttribute('data-modal');
                document.getElementById(modal).style.display = "block";
            }
        });
      
        var closeBtns = [...document.querySelectorAll(".close")];
        closeBtns.forEach(function(btn){
            btn.onclick = function() {
                var modal = btn.closest('.modal');
                modal.style.display = "none";
            }
        });
      
        window.onclick = function(event) {
            if (event.target.className === "modal") {
                event.target.style.display = "none";
            }
        }
    </script>

    <!-- ===================== SCRIPT JS ===================== -->
    <?php
        include('INCLUDE/script.html');
    ?>

</body>
</html>
