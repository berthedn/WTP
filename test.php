<?php

$bdd = new PDO('mysql:host=wheretoplpbd.mysql.db;dbname=wheretoplpbd', 'wheretoplpbd', '1Wheretopics');
  $c=$bdd;
  $connexion=$bdd;
  $c=$connexion;



//Initialisation de Google Map avec la géolocalisation de l'utilisateur
//include("Includes/InitGoogleMap.php");

//-------------------  INIT GOOGLE


echo "</br>";       
echo "</br>"; 
echo "</br>"; 
echo "</br>"; 
echo "</br>"; 

if (mysqli_connect_errno()) // En cas d'erreur de connexion
    { // afficher un message d'erreur
        //echo "4";

        printf("Échec de la connexion : %s\n", mysqli_connect_error());
        //exit();
    }
    else
    {
     printf("Connecté");
    }

echo "</br>"; 
echo "</br>"; 
 

echo "test"; 

echo "</br>";       
echo "</br>"; 



$Compttaille = $bdd->prepare("SELECT COUNT(*) FROM Spot;");
$Compttaille->execute();
$data = $Compttaille->fetch();

echo $data[0];

echo "</br>";       
echo "</br>"; 
echo "</br>"; 
  
  $compteur = $data[0]*3+3;

echo $compteur;


for ($i=3; $i<$compteur; $i=$i+3)
{
echo "</br>"; 
echo "</br>"; 

        
        $reqLigne = $bdd->prepare("SELECT Spot, Longi, Lat FROM Spot WHERE id = $i/3 ;");
        $reqLigne->execute();
        $ligne = $reqLigne->fetch();

        $image = $i/3;

        
        //$map->addMarkerByCoords($ligne[1], $ligne[2], $ligne[0]."</br><img src=upload/".$image.".jpg>");
      echo $ligne[1], $ligne[2], $ligne[0], $image ;
      echo "</br>"; 
      echo "</br>"; 
}

//echo "SELECT Spot, Longi, Lat FROM Spot WHERE id = $i/3 ;";
echo "</br>"; 
echo "</br>"; 
echo "</br>"; 
echo "</br>"; 
    
    
    echo "test";

echo "</br>"; 
echo "</br>"; 
echo "</br>"; 
echo "</br>"; 

    
    echo $ligne[1];

echo "</br>"; 
echo "</br>"; 
echo "</br>"; 
echo "</br>"; 

    echo "test";



?>