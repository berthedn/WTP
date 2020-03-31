<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img//favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="description" content="Where To Pics allow people to enter their location or future location to find the best points-of-view close to them. Come join us and upload your most beautiful pictures of your favorite spots !"/>
    
    <title>WhereToPics</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <link href="Stilsheet.css" rel="stylesheet">

    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/rubick.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700' rel='stylesheet' type='text/css'>
    <link href="assets/css/fonts/pe-icon-7-stroke.css" rel="stylesheet">
    <link href="assets/css/fonts/Rubik-Fonts.css" rel="stylesheet" />


</head>
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
$map->setWidth("1000px");
$map->setHeight("600px");
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

if (isset ($_POST['FormAddSpot']))
{   
    //Prise en charge du bouton
    include("Includes/BoutonForm.php");
}

$Compttaille = "SELECT COUNT(*) FROM Spot;";
$restaille=mysqli_query($connexion,$Compttaille);
$taille = mysqli_fetch_array($restaille);


for ($i=3; $i<$taille[0]*3+3; $i=$i+3)
{
		$reqLigne = "SELECT Spot, Longi, Lat FROM Spot WHERE id = $i/3;";
		$resLigne = mysqli_query($connexion,$reqLigne);
		$ligne = mysqli_fetch_array($resLigne);

		$image = $i/3;

		//$map->addMarkerByCoords($ligne[1], $ligne[2], $ligne[0]."</br><img src=upload/".$image.".jpg>");
        $map->addMarkerByCoords($ligne[1], $ligne[2], '<strong>'.$ligne[0].'</strong>  <style type="text/css"> #image { height: 200px; width: 200px; text-align: center; display: table-cell; vertical-align: middle;} #image2 { max-height: 200px; max-width: 200px; } </style> </br>  <div id="image"> <img id="image2" src="upload/'.$image.'.jpg" border="0" /> </br> </div>');
}



?>


<nav  role="navigation" ">

    <div class="container my-header" >
    <div class="navbar-header"  >
        <button id="menu-toggle" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example">
            <span class="sr-only">Toggle navigation</span>   
        </button>
        <a href="#top" data-scroll="true" class="navbar-brand page-scroll" style="color: black;">
           WhereToPics
        </a>


    </div>

    <div class="navbar-scroll-to collapse navbar-collapse" >
      <ul class="nav navbar-nav navbar-right navbar-uppercase">


        <li>
                <a href="./index.php" style="color: black;">
                    Home
                </a>
            </li>
            


       </ul>
    </div><!-- /.navbar-collapse -->
  </div>
</nav>








<div class="section section-we-are-2 radu"  >
       <div class="text-area">
            <div class="container" >
                
                    <div class="">
                        <div id="" >
                                
                                
                   <div class="separator-container">
                    <h5 class="text-gray">Choose Your Spot</h5>
                   <h2 class="WTP-h2">Map</h2>
                        <div class="separator line-separator">∎</div>
                    </div>


                        </div>
<div >
<body onload="onLoad();">

<div id="Map">
   <div class="wrapper">
         <h2>ADD SPOT</h2>

        <form id="Test" class="topBefore" method="POST" action="./Includes/BoutonForm.php" enctype="multipart/form-data">
      
            <input id="input" type="text" placeholder="CITY" name="NDS" value="<?php echo $record->city ?>" maxlength="50" required>

            <input id="input" type="text" placeholder="LONGITUDE" name="Longi" value="<?php echo $record->longitude ?>" maxlength="50" required>
        
            <input id="input" type="text" placeholder="LATITUDE" name="Lat" value="<?php echo $record->latitude ?>" maxlength="50" required>

            <input id="inputF" type="file" placeholder="PICTURE (<4Mo)" name="mon_fichier" required>
       
            <input id="submit" name ="FormAddSpot" type="submit" value="ADD SPOT !">
  
        </form>
    </div>
</div> 
 </body>

<div id="Carte">

<?php



$map->setCenterCoords($record->longitude, $record->latitude);

$map->printHeaderJS();
$map->printMapJS();



//include("Includes/FinGoogleMap.php");
//---------- FinGOOGLEMAP

        $map->printMap();
        
        geoip_close($gi);

//---------- FIN

?>
</div>
</div>



                    </div>
                
            </div>
        </div>
    </div>

 

</html>







