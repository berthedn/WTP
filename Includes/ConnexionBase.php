<?php

if(!isset($_SESSION))
    {
        //echo "test1";
        session_start();
    }

   //echo "test2";
?>
<?php
    
    //echo "1";

    $bdd = new PDO('mysql:host=wheretoplpbd.mysql.db;dbname=wheretoplpbd', 'wheretoplpbd', '1Wheretopics');
    
    //echo "2";

    global $connexion; // déclaration de la variable de connexion
    global $bdd;
    //$connexion = mysqli_connect($SERVEUR, $UTILISATEUR, $MOTDEPASSE, $BDD); // connexion à la base de données
    $c=$bdd;
    $connexion=$bdd;

    //echo "3";

    if (mysqli_connect_errno()) // En cas d'erreur de connexion
    { // afficher un message d'erreur
        //echo "4";

        printf("Échec de la connexion : %s\n", mysqli_connect_error());
        //exit();
    }
    else
    {
	   //printf("Connecté");
    }

?>
