<section class="form__display_data" id="display-data-rapport">

    <!-- Formulaire pour choisir un rapport -->
    <form method="get" class="form__container">

        <div class="form__row">
            <label>Rapport N°</label>
            <div class="select__item">

                <button type="submit">
                    <i class='bx bx-search'></i>
                </button>

                <select name="page" id="page">
                    <?php
                        echo '<option value="' . $currentPage . '">' . $data["RAP_NUM"] . '</option>';

                        $req_recherche = $db -> prepare("SELECT RAP_NUM FROM rapport_visite WHERE VIS_MATRICULE = :visMatricule");
                        $req_recherche -> execute(array(":visMatricule" => $user_matricule));
                        $i = 0;
                        while($data_recherche = $req_recherche -> fetch()){
                            if($i == $currentPage){
                                $i++;
                            } else {
                                echo'<option value="'.$i.'">'. $data_recherche["RAP_NUM"] .'</option>';
                                $i++; 
                            } 
                        }
                    ?>
                </select>
            </div>
        </div>      

    </form>

    <form method="post" class="form__container">

        <div class="form__row">
            <label>Praticien</label>
            <input type="text" name="pra-nom" id="pra-nom" value="<?= $data['PRA_NOM'] . ' ' . $data['PRA_PRENOM']; ?>" disabled>
        </div>

        <div class="form__row">
            <label>Date du Rapport</label>
            <input type="text" name="rap-date" id="rap-date" value="<?= $data['RAP_DATE']; ?>" disabled>
        </div>

        <div class="form__row">
            <label>Motif de visite</label>
            <input type="text" name="rap-motif" id="rap-motif" value="<?= $data['RAP_MOTIF']; ?>" disabled>
        </div>

        <div class="form__row">
            <label>Bilan</label>
            <input type="text" name="rap-bilan" id="rap-bilan" value="<?= $data['RAP_BILAN']; ?>" disabled>
        </div>

        <div class="form__row">
            <label>Offre d'échantillons</label>
            <table>
                <thead>
                    <tr>
                        <td>Médicaments</td>
                        <td>Quantité</td>
                    </tr>
                </thead>
                <tbody>

                    <?php while ($data_offrir = $req_offrir -> fetch()) { ?>       
                        <tr>        
                            <td><?= $data_offrir['MED_DEPOTLEGAL']; ?></td>
                            <td><?= $data_offrir['OFF_QTE']; ?></td>
                        </tr>          
                    <?php } ?>

                </tbody>
            </table>
        </div>

    </form>

    <div class="btn__bottom">
        
        <!-- Boutons de pagination pour sélectionner le visiteur suivant ou précédent -->
        <?php paginationContent(); ?>
        
        <!-- Boutons pour afficher le formulaire de création d'un nouveau rapport -->
        <button id="btn-newRapport">Nouveau</button>
        <!-- <form method="post" class="form__container">    
            <input type="submit" name="newRapport" id="newRapport" value="Nouveau" >
        </form> -->

    </div>

</section>