<ul class="breadcrumbs__container">
    
    <?php if(locationPageName == "Accueil"){ 
            
        echo '

        <li>'.locationPageName.'</li>
        
        ';

     } else { 

        echo '
        
        <li><a href="accueil.php">Accueil</a></li>
        <li>'.locationPageName.'</li>
        
        ';

    } ?>

</ul>