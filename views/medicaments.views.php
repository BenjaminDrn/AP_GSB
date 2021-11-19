<?php
    // Inclusion des blocs head et navigation en html
    include('partials/header.php');
?>


    <main id="main">

        <?php include('partials/breadcrumbs.php');?>

        <section class="form__display_data">

            <!-- Formulaire pour choisir un praticien -->
            <form method="get" class="form__container">

                <div class="form__row">
                    <label>Chercher un médicament</label>
                    <div class="select__item">

                        <button type="submit">
                            <i class='bx bx-search'></i>
                        </button>

                        <select name="page" id="page">
                            <?php
                                echo '<option value="' . $currentPage . '">' . $data["MED_DEPOTLEGAL"] . ' - ' . $data["MED_NOMCOMMERCIAL"] . '</option>';

                                $req_recherche = $db -> prepare("SELECT MED_DEPOTLEGAL, MED_NOMCOMMERCIAL FROM medicament");
                                $req_recherche -> execute();
                                $i = 0;
                                while($data_recherche = $req_recherche -> fetch()){
                                    if($i == $currentPage){
                                        $i++;
                                    } else {
                                        echo'<option value="'.$i.'">'. $data_recherche["MED_DEPOTLEGAL"] . ' - ' . $data_recherche["MED_NOMCOMMERCIAL"] .'</option>';
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
                    <label>Code</label>
                    <input type="text" name="med-depot-legal" id="med-depot-legal" value="<?= $data['MED_DEPOTLEGAL']; ?>" disabled>
                </div>
                
                <div class="form__row">
                    <label>Nom commercial</label>
                    <input type="text" name="med-nom-commercial" id="med-nom-commercial" value="<?= $data['MED_NOMCOMMERCIAL']; ?>" disabled>
                </div>

                <div class="form__row">
                    <label>Famille</label>
                    <input type="text" name="fam-libelle" id="fam-libelle" value="<?= $data['FAM_LIBELLE']; ?>" disabled>
                </div>

                <div class="form__row">
                    <label>Composition</label>
                    <input type="text" name="med-composition" id="med-composition" value="<?= $data['MED_COMPOSITION']; ?>" disabled>
                </div>

                <div class="form__row">
                    <label>Effect indésirables</label>
                    <textarea name=name="med-effets" id="med-effets" cols="10" rows="6" disabled><?= $data['MED_EFFETS']; ?></textarea>
                </div>

                <div class="form__row">
                    <label>Contre indications</label>
                    <textarea name="med-contre-indic" id="med-contre-indic" cols="10" rows="6" disabled><?= $data['MED_CONTREINDIC']; ?></textarea>
                </div>

            </form>

            
            <!-- Boutons de pagination pour sélectionner le visiteur suivant ou précédent -->
            <?php paginationContent(); ?>

        </section>

    </main>


<?php 
    // Inclusion des éléments du footer en html
    include('partials/footer.php');

?>