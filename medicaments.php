<?php
    include('INCLUDE/sessionStart.php');
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
            <form action="">
                <label for="code">
                    <p>Code</p>
                    <input type="text" name="">
                </label>
                <label for="nomCommercial">
                    <p>Nom commercial</p>
                    <input type="text" name="">
                </label>
                <label for="composition">
                    <p>Composition</p>
                    <input type="text" name="">
                </label>
                <label for="EffetsIndésirables">
                    <p>Effets indésirables</p>
                    <textarea name="" id="" cols="30" rows="5"></textarea>
                </label>
                <label for="contreIndications">
                    <p>Contre indications</p>
                    <textarea name="" id="" cols="30" rows="5"></textarea>
                </label>
                <label for="prix">
                    <p>Prix échantillon</p>
                    <input type="text" name="">
                </label>
                
            </form>

            <div class="action__btn">
                <div class="action__btn_move">
                    <a href=""><button>précédent</button></a>
                    <a href="" ><button>suivant</button></a>
                </div>
                <div class="action__btn_close">
                    <a href="index.php"><button>fermer</button></a>
                </div>
            </div>
        </section>
    </main>
    
    <!-- ===================== FOOTER ===================== -->
    <?php
        include('INCLUDE/footer.html');
    ?>

    <!-- ===================== SCRIPT JS ===================== -->
    <?php
        include('INCLUDE/script.html');
    ?>

</body>
</html>