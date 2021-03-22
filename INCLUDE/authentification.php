 <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $nombase= "gsb";

  // Create connection
  $serveur = mysqli_connect($servername, $username, $password, $nombase);

  // Check connection
  if (!$serveur) {
    die("Impossible de se connecter : " . mysqli_connect_error());
  }
?> 