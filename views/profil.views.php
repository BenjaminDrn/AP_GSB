<?php 
    // Inclusion des blocs head et navigation en html
    include('partials/header.php');
?>


    <main id="main">

        <?php include('partials/breadcrumbs.php');?>
    
        <section>
            <h1>Mon profil</h1>
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
                    <input type="text" name="vis-adresse" id="vis-adresse" value="<?= $data['VIS_ADRESSE']; ?>">
                </div>

                <div class="form__row">
                    <label for="">Ville</label>
                    <div class="city__infos">
                        <input type="text" name="vis-cp" id="vis-cp" value="<?= $data['VIS_CP']; ?>">                
                        <input type="text" name="vis-ville" id="vis-ville" value="<?= $data['VIS_VILLE']; ?>">
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

                <div class="btn_save_infos">
                    <button type="submit" name="saveNewInfos" id="saveNewInfos">Enregistrer</button>
                </div>

            </form>
        </section>    

    </main>


<?php 
    // Inclusion des éléments du footer en html
    include('partials/footer.php');

?>