<?php
    // Inclusion des blocs head et navigation en html
    include('partials/header.php');
?>

    <main id="main">

        <?php include('partials/breadcrumbs.php');?>

        <section class="form__display_data">

            <!-- Formulaire pour choisir un visiteur -->
            <form method="get" class="form__container">

                <div class="form__row">
                    <label for="">Chercher un visiteur</label>
                    <div class="select__item">

                        <button type="submit">
                            <i class='bx bx-search'></i>
                        </button>

                        <select name="page" id="page">
                            <?php
                                echo '<option value="' . $currentPage . '">' . $data["VIS_NOM"] . ' ' . $data["VIS_PRENOM"] . '</option>';

                                $req_recherche = $db -> prepare("SELECT VIS_NOM, VIS_PRENOM FROM visiteur");
                                $req_recherche -> execute();
                                $i = 0;
                                while($data_recherche = $req_recherche -> fetch()){
                                    if($i == $currentPage){
                                        $i++;
                                    } else {
                                        echo'<option value="'.$i.'">'. $data_recherche["VIS_NOM"] . ' ' . $data_recherche["VIS_PRENOM"] .'</option>';
                                        $i++; 
                                    } 
                                }
                            
                            ?>
                        </select>

                    </div>
                </div>      
            
            </form>

            <hr>
            
            <!-- Formulaire pour afficher les données du visiteur sélectionner -->
            <form method="post" class="form__container">
                
                <div class="form__row">
                    <label for="">Nom</label>
                    <input type="text" name="vis-nom" id="vis-nom" value="<?= $data['VIS_NOM']; ?>" disabled>
                </div>

                <div class="form__row">
                    <label for="">Prénom</label>
                    <input type="text" name="vis-prenom" id="vis-prenom" value="<?= $data['VIS_PRENOM']; ?>" disabled>
                </div>

                <div class="form__row">
                    <label for="">Adresse</label>
                    <input type="text" name="vis-adresse" id="vis-adresse" value="<?= $data['VIS_ADRESSE']; ?>" disabled>
                </div>

                <div class="form__row">
                    <label for="">Ville</label>
                    <div class="city__infos">
                        <input type="text" name="vis-cp" id="vis-cp" value="<?= $data['VIS_CP']; ?>" disabled>                
                        <input type="text" name="vis-ville" id="vis-ville" value="<?= $data['VIS_VILLE']; ?>" disabled>
                    </div>
                </div>

                <div class="form__row">
                    <label for="">Secteur</label>
                    <input type="text" name="sec-code" id="sec-code" value="<?= $data['SEC_CODE']; ?>" disabled>
                </div>  

                <div class="form__row">
                    <label for="">Laboratoire</label>
                    <input type="text" name="lab-nom" id="lab-nom" value="<?= $data['LAB_NOM']; ?>" disabled>
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