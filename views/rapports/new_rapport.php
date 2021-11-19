<section class="form__display_data" id="new-rapport">

    <!-- Formulaire pour choisir un praticien -->
    <form method="post" class="form__container">
        <div class="form__row">
            <label for="">Choisir un praticien</label>
            <div class="select__item">
                <select name="choicePraticienNewRapport" id="choicePraticienNewRapport" class="select_full_width">
                    <?php

                        $req_recherche = $db -> prepare("SELECT PRA_NOM, PRA_PRENOM FROM praticien ORDER BY PRA_NUM");
                        $req_recherche -> execute();
                        $i = 1;

                        echo '<option value="0"> Choisir un praticien </option>';

                        while($data_recherche = $req_recherche -> fetch()){
                        
                            echo'<option value="'.$i.'">'. $data_recherche["PRA_NOM"] . ' ' . $data_recherche["PRA_PRENOM"] .'</option>';
                            $i++; 
                            
                        }
                    
                    ?>
                </select>
            </div>
        </div> 

        <div class="form__row">
            <label for="">Date de rapport</label>
            <input type="date" name="dateNewRapport" id="dateNewRapport">
        </div>

        <div class="form__row">
            <label for="">Motif de visite</label>
            <input type="text" name="MotifNewRapport" id="MotifNewRapport" placeholder="Motif de visite">
        </div>

        <div class="form__row">
            <label for="">Bilan</label>
            <textarea name="BilanNewRapport" id="BilanNewRapport" cols="30" rows="10" placeholder="Bilan"></textarea>
        </div>

    
            <div class="form__row">
                <label>Offre d'échantillons</label>

                <div class="table_new_offer">

                    <div id="offert-config">
                        <div class="btn_add_offer">
                            <i class='bx bx-plus'></i>
                        </div>

                        <select name="page" id="choose-med">
                            <option value="med">Médicament</option>

                            <?php

                                $req_recherche = $db -> prepare("SELECT MED_DEPOTLEGAL FROM medicament");
                                $req_recherche -> execute();
                                $i = 0;
                                while($data_recherche = $req_recherche -> fetch()){
                                    echo'<option value="'.$i.'">'. $data_recherche["MED_DEPOTLEGAL"] .'</option>';
                                    $i++; 
                                }
                            
                            ?>
                            
                        </select>
                        
                        <input type="number" min="0" max="100" name="qtity-med" id="qtity-med" placeholder="Quantité">
                    </div>
                    
                    <ul id="offert-list">
                        <li id="offert-item">
                            <div id="med-name"></div>
                            <div id="qtity"></div>
                        </li>
                    </ul>

                </div>
            </div>
            

            <div class="btn_new_rapport">
                <button type="submit" name="saveNewRapport" id="saveNewRapport">Enregistrer</button>
                <button id="ExitNewRapport">Annuler</button>
            </div>
            
        </form>
</section>