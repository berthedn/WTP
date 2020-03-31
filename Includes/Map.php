
			<?php

	$SERVEUR="localhost"; // serveur utilisé
    $UTILISATEUR="dam"; // nom d'utilisateur par défaut
    $MOTDEPASSE="dam"; // mot de passe par défaut
    $BDD="projet"; // nom de la base de données

    $connexion = NULL;
    global $connexion; // déclaration de la variable de connexion

    $connexion = mysqli_connect($SERVEUR, $UTILISATEUR, $MOTDEPASSE, $BDD); // connexion à la base de données
    $c=$connexion;
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




//Initialisation de Google Map avec la géolocalisation de l'utilisateur
//include("Includes/InitGoogleMap.php");

//-------------------  INIT GOOGLE

require('ApiGoogle/GoogleMapAPI.class.php');
$map = new GoogleMapAPI('map');
$map->setAPIKey('AIzaSyB91h9BpEs5-9q6x1eYvQo-YpIyoXlGyNU');
$map->setWidth("900px");
$map->setHeight("500px");
$map->setZoomLevel (10);
include("ApiGoogle/geoipcity.inc");
include("ApiGoogle/geoipregionvars.php");

$gi = geoip_open(realpath("ApiGoogle/GeoLiteCity.dat"),GEOIP_STANDARD);

//Avec une IP de mon adresse maison
$record = geoip_record_by_addr($gi,'134.214.214.186');

//Ip public d'un utilisateur
//$record = geoip_record_by_addr($gi,$_SERVER["REMOTE_ADDR"]);
$map->addMarkerByCoords($record->longitude, $record->latitude, $record->city);

//--------------------- FIN



$Compttaille = "SELECT COUNT(*) FROM Spot;";
$restaille=mysqli_query($connexion,$Compttaille);
$taille = mysqli_fetch_array($restaille);


for ($i=3; $i<$taille[0]*3+3; $i=$i+3)
{
		$reqLigne = "SELECT Spot, Longi, Lat FROM Spot WHERE id = $i/3;";
		$resLigne = mysqli_query($connexion,$reqLigne);
		$ligne = mysqli_fetch_array($resLigne);

		$image = $i/3;

		$map->addMarkerByCoords($ligne[1], $ligne[2], $ligne[0]."</br><img src=upload/".$image.".jpg>");
}

//---------------------- FIN



?>

 <body onload="onLoad();">

<?php


$map->printHeaderJS();
$map->printMapJS();



//include("Includes/FinGoogleMap.php");
//---------- FinGOOGLEMAP

		$map->printMap();
 		$map->setCenterCoords($record->longitude, $record->latitude);
 		$map->setZoomLevel (1000);
 		geoip_close($gi);

//---------- FIN
?>

 </body>









