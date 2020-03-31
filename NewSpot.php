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

$bdd = new PDO('mysql:host=wheretoplpbd.mysql.db;dbname=wheretoplpbd', 'wheretoplpbd', '1Wheretopics');
  $c=$bdd;
  $connexion=$bdd;
  $c=$connexion;



//Initialisation de Google Map avec la géolocalisation de l'utilisateur
//include("Includes/InitGoogleMap.php");

//-------------------  INIT GOOGLE

require('ApiGoogle/GoogleMapAPI.class.php');
$map = new GoogleMapAPI('map');
$map->setAPIKey('AIzaSyB91h9BpEs5-9q6x1eYvQo-YpIyoXlGyNU');
$map->setWidth("100%");
$map->setHeight("600px");
$map->setZoomLevel (1);
include("ApiGoogle/geoipcity.inc");
include("ApiGoogle/geoipregionvars.php");

$gi = geoip_open(realpath("ApiGoogle/GeoLiteCity.dat"),GEOIP_STANDARD);

//Avec une IP de mon adresse maison
$record = geoip_record_by_addr($gi,'129.137.96.16');

//Ip public d'un utilisateur
//$record = geoip_record_by_addr($gi,$_SERVER["REMOTE_ADDR"]);
//$map->addMarkerByCoords($record->longitude, $record->latitude, $record->city);

//$map->addMarkerByCoords('-84.5281445', '39.0810376', '<strong>Drees Pavilion</strong>  <style type="text/css"> #image { height: 200px; width: 200px; text-align: center; display: table-cell; vertical-align: middle;} #image2 { max-height: 200px; max-width: 200px; } </style> </br>  <div id="image"> <img id="image2" src="upload/0.jpg" border="0" /> </br> </div>');


//$map->addMarkerByCoords('-84.5176315', '39.1204256', '<strong>Bellevue Hill Park</strong>  <style type="text/css"> #image { height: 200px; width: 200px; text-align: center; display: table-cell; vertical-align: middle;} #image2 { max-height: 200px; max-width: 200px; } </style> </br>  <div id="image"> <img id="image2" src="upload/1.jpg" border="0" /> </br> </div>');

//--------------------- FIN

if (isset ($_POST['FormAddSpot']))
{
  //Prise en charge du bouton
  //include("Includes/BoutonForm.php");
}

$Compttaille = $bdd->prepare("SELECT COUNT(*) FROM Spot;");
$Compttaille->execute();
$data = $Compttaille->fetch();

//echo $data[0];

$compteur = $data[0]*3+3;



for ($i=3; $i<$compteur; $i=$i+3)
{
        $reqLigne = $bdd->prepare("SELECT Spot, Longi, Lat FROM Spot WHERE id = $i/3 ;");
        $reqLigne->execute();
        $ligne = $reqLigne->fetch();

        $image = $i/3;

        //$map->addMarkerByCoords($ligne[1], $ligne[2], $ligne[0]."</br><img src=upload/".$image.".jpg>");
        $map->addMarkerByCoords($ligne[1], $ligne[2], '<strong>'.$ligne[0].'</strong>  <style type="text/css"> #image { height: 200px; width: 200px; text-align: center; display: table-cell; vertical-align: middle;} #image2 { max-height: 200px; max-width: 200px; } </style> </br>  <div id="image"> <img id="image2" src="upload/'.$image.'.jpg" border="0" /> </br> </div>');
}

?>


<nav class="navbar navbar-default navbar-fixed-top new-spot" role="navigation" >

  <div class="container my-header">
    <div class="navbar-header" >
      <button id="menu-toggle" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar bar1"></span>
        <span class="icon-bar bar2"></span>
        <span class="icon-bar bar3"></span>
      </button>
      <a href="#top" data-scroll="true" class="navbar-brand page-scroll">
        WhereToPics
      </a>
    </div>

    <div class="navbar-scroll-to collapse navbar-collapse" >
      <ul class="nav navbar-nav navbar-right navbar-uppercase">


        <li>
            <a href="./index.php">
            Home
            </a>
        </li>
        <li>
          <a href="/index.php#deconnect">
            Sign Out
          </a>
        </li>




        


</ul>
</div><!-- /.navbar-collapse -->
</div>
</nav>


<div id="Map" class="map">
  <div class="wrapper">
    <div class="separator-container">
      <h5 class="text-gray">Enter Coordinates</h5>
      <h2 class="WTP-h2">Add Spot</h2>
      <div class="separator line-separator">∎</div>
    </div>

    <div class="container">
      <form id="Test" class="topBefore" method="POST" action="./Includes/BoutonForm.php" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group add-animation-stopped animation-1 animate">
              <input id="input" type="text" class=" new-spot-form-control form-control" placeholder="CITY" name="NDS" value="<?php echo $record->city ?>" maxlength="50" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group add-animation-stopped animation-1 animate">
              <input id="input" type="text" class=" new-spot-form-control form-control" placeholder="LONGITUDE" name="Longi" value="<?php echo $record->longitude ?>" maxlength="50" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group add-animation-stopped animation-1 animate">
              <input id="input" type="text" class=" new-spot-form-control form-control" placeholder="LATITUDE" name="Lat" value="<?php echo $record->latitude ?>" maxlength="50" required>
            </div>
          </div>
        </div>



        <input id="inputF" type="file" placeholder="PICTURE (<4Mo)" name="mon_fichier" required>

        <div class="row-new-spot-btn-submit">
          <input id="submit" name ="FormAddSpot" type="submit" value="ADD SPOT!" class="send-btn btn btn-lg btn-black btn-contact new-spot-btn">

        </div>
        </form>

        <div class="row">
            <button class="send-btn btn btn-lg btn-black btn-contact explore-btn" onclick=" window.open('https://www.gps-coordinates.net/','_blank')">HELP WITH COORDS</button>
        </div>


      
    </div>

  </div>
</div>

<div class="section section-we-are-2 radu">
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

        </div>
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





<body onload="onLoad();">
</body>
