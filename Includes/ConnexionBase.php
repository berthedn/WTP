<?php
if(!isset($_SESSION))
    {
        session_start();
    }
?>
<?php

$bdd = new PDO('mysql:host=localhost;dbname=projet', 'dam', 'dam');

    global $connexion; // déclaration de la variable de connexion
    global $bdd;
    //$connexion = mysqli_connect($SERVEUR, $UTILISATEUR, $MOTDEPASSE, $BDD); // connexion à la base de données
    $c=$bdd;
    $connexion=$bdd;

    if (mysqli_connect_errno()) // En cas d'erreur de connexion
    { // afficher un message d'erreur
      //echo 2;
    printf("Échec de la connexion : %s\n", mysqli_connect_error());
    exit();
}
else
{
	//printf("Connecté");
}

?>
