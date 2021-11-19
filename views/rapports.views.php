<?php
    // Inclusion des blocs head et navigation en html
    include('partials/header.php');
?>

    <main id="main">

        <?php 
            // ===== Breadcrumbs ===== //
            include('partials/breadcrumbs.php');
            
            // ===== Section display data ===== //
            require_once('rapports/display_rapport.php');

            // ===== Section create new rapport ===== //
            require_once('rapports/new_rapport.php');
        ?>
        
    </main>

    <!-- ===== Afficher les message d'erreurs / alertes ===== -->
    <span id="msg"></span>

<?php 
    // Inclusion des éléments du footer en html
    include('partials/footer.php');

?>