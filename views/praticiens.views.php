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
                    <label>Chercher un visiteur</label>
                    <div class="select__item">

                        <button type="submit">
                            <i class='bx bx-search'></i>
                        </button>

                        <select name="page" id="page">
                            <?php
                                echo '<option value="' . $currentPage . '">' . $data["PRA_NOM"] . ' ' . $data["PRA_PRENOM"] . '</option>';

                                $req_recherche = $db -> prepare("SELECT PRA_NOM, PRA_PRENOM FROM praticien");
                                $req_recherche -> execute();
                                $i = 0;
                                while($data_recherche = $req_recherche -> fetch()){
                                    if($i == $currentPage){
                                        $i++;
                                    } else {
                                        echo'<option value="'.$i.'">'. $data_recherche["PRA_NOM"] . ' ' . $data_recherche["PRA_PRENOM"] .'</option>';
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
                    <label>Numéro du praticien</label>
                    <input type="text" name="pra-num" id="pra-num" value="<?= $data['PRA_NUM']; ?>" disabled>
                </div>
                
                <div class="form__row">
                    <label>Nom</label>
                    <input type="text" name="pra-nom" id="pra-nom" value="<?= $data['PRA_NOM']; ?>" disabled>
                </div>

                <div class="form__row">
                    <label>Prénom</label>
                    <input type="text" name="pra-prenom" id="pra-prenom" value="<?= $data['PRA_PRENOM']; ?>" disabled>
                </div>

                <div class="form__row">
                    <label>Adresse</label>
                    <input type="text" name="pra-adresse" id="pra-adresse" value="<?= $data['PRA_ADRESSE']; ?>" disabled>
                </div>

                <div class="form__row">
                    <label>Ville</label>
                    <div class="city__infos">
                        <input type="text" name="cp" id="cp" value="<?= $data['PRA_CP']; ?>" disabled>                
                        <input type="text" name="ville" id="ville" value="<?= $data['PRA_VILLE']; ?>" disabled>
                    </div>
                </div>

                <div class="form__row">
                    <label>Coeff. Notoriété</label>
                    <input type="text" name="pra-coef" id="pra-coef" value="<?= $data['PRA_COEFNOTORIETE']; ?>" disabled>
                </div>

                <div class="form__row">
                    <label>Type de praticien</label>
                    <input type="text" name="pra-libelle" id="pra-libelle" value="<?= $data['TYP_LIBELLE']; ?>" disabled>
                </div>

                <div class="form__row">
                    <label>Lieu d'exercice</label>
                    <input type="text" name="typ-lieu" id="typ-lieu" value="<?= $data['TYP_LIEU']; ?>" disabled>
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