<?php 

    include('partials/header.php');

?>


    <main>

        <!-- ===== Section connexion ===== -->
        <section id="connexion">

            <!-- ===== Msg de bienvenue ===== -->
            <div class="connexion_msg">
                <h1>Bienvenue sur le site du Laboratoire Galaxy Swiss Bourdin</h1>
            </div>

            <!-- ===== Forumlaire de connexion ===== -->
            <form method="post">
                <h2>Connexion</h2>
                <label for="login"></label>
                <input type="text" name="login" id="login" placeholder="Login" required>
                <label for="password"></label>
                <input type="date" name="password" id="password" placeholder="Mot de passe" required>

                <input type="submit" value="Connectez-vous" name="connexion-btn" id="connexion-btn">
            </form>

        </section>
        
    </main>


<?php 
    // Inclusion des éléments du footer en html
    include('partials/footer.php');

?>

