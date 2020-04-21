<?php
	
	//include("ConnexionBase.php");
    $bdd = new PDO('mysql:host=wheretoplpbd.mysql.db;dbname=wheretoplpbd', 'wheretoplpbd', '1Wheretopics');
	$c=$bdd;
    $connexion=$bdd;
    $c=$connexion;
	
	//description of the input file (picture)
    $_FILES['mon_fichier']['name'];    //Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_icone.png). ENG: Original name of the file
	$_FILES['mon_fichier']['type'];     //Le type du fichier. Par exemple, cela peut être « image/png ». ENG: Type of file
	$_FILES['mon_fichier']['size'];     //La taille du fichier en octets. ENG: size of the file

	//echo $_POST['Lat'];
	//echo $_POST['Longi'];

//Test of Latitude input
if ($_POST['Lat'] > '90' OR $_POST['Lat'] < '-90')
	{
		//echo "</br>";
		//echo "Mauvaise saisie de la Latitude";
		//goto end;

	
		//Wrong Latitude input
	
		?>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="../assets/img//favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="description" content="Where To Pics allow people to enter their location or future location to find the best points-of-view close to them. Come join us and upload your most beautiful pictures of your favorite spots !"/>
    
    <title>WhereToPics</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <link href="../Stilsheet.css" rel="stylesheet">

    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <link href="../assets/css/rubick.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700' rel='stylesheet' type='text/css'>
    <link href="../assets/css/fonts/pe-icon-7-stroke.css" rel="stylesheet">
    <link href="../assets/css/fonts/Rubik-Fonts.css" rel="stylesheet" />


</head>

<body id="skrollr-body">

<div class="wrapper">
    <div class="section section-header my-header" id="top">
        <div class="full-image pattern-image">
            <img class="img-map" src="../images/Map.jpg"/>

            <div class="container">
                <div class="content content-with-opacity">

                    <h1 class="WTP-title">WhereToPics</h1>
                      <div class="separator-container">
                        <div class="separator line-separator">∎</div>
                      </div>
                    <h5>Wrong Latitude Input</h5>


                    <div class="content content-with-opacity WTP-div-connexion">

                    <form method="POST" action="../NewSpot.php">

                      <button type="submit"  class="send-btn btn btn-lg btn-black btn-contact" >
                      MAP <i class="fa fa-angle-double-right"></i>
                      </button>

                    </form>
                     
                    </div>

                 
                </div>
            </div>
        </div>
        
    </div>
    </div>
</body>


		<?php
		//goto end;
	}
		//Test Longitude input
		if ($_POST['Longi'] > '180' OR $_POST['Longi'] < '-180')
	{
		//echo "</br>";
		//echo "Mauvaise saisie de la Longitude";
		//goto end;
		
			
		//Wrong Longitude Input
		?>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="../assets/img//favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="description" content="Where To Pics allow people to enter their location or future location to find the best points-of-view close to them. Come join us and upload your most beautiful pictures of your favorite spots !"/>
    
    <title>WhereToPics</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <link href="../Stilsheet.css" rel="stylesheet">

    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <link href="../assets/css/rubick.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700' rel='stylesheet' type='text/css'>
    <link href="../assets/css/fonts/pe-icon-7-stroke.css" rel="stylesheet">
    <link href="../assets/css/fonts/Rubik-Fonts.css" rel="stylesheet" />


</head>

<body id="skrollr-body">

<div class="wrapper">
    <div class="section section-header my-header" id="top">
        <div class="full-image pattern-image">
            <img class="img-map" src="../images/Map.jpg"/>

            <div class="container">
                <div class="content content-with-opacity">

                    <h1 class="WTP-title">WhereToPics</h1>
                      <div class="separator-container">
                        <div class="separator line-separator">∎</div>
                      </div>
                    <h5>Wrong Longitude Input</h5>


                    <div class="content content-with-opacity WTP-div-connexion">

                    <form method="POST" action="../NewSpot.php">

                      <button type="submit"  class="send-btn btn btn-lg btn-black btn-contact" >
                      MAP <i class="fa fa-angle-double-right"></i>
                      </button>

                    </form>
                     
                    </div>

                 
                </div>
            </div>
        </div>
        
    </div>
    </div>
</body>


		<?php
		//goto end;
	}
	
	//Test the size file
	//If over 4MO we compress
	if ($_FILES['mon_fichier']['size'] > 4048576)
	{
		//echo $erreur = "Le fichier est trop gros";
		//on la recupère avec la fonction imagecreatefromjpeg et avec son chemin
		
    	$img = imagecreatefromjpeg($_FILES['mon_fichier']['tmp_name']);

    	//Enfin on la remet ou elle était avec la qualité qu'on veut !
	//Compress the file to the size we want
    	imagejpeg($img, $_FILES['mon_fichier']['tmp_name'], 75);
		//goto end;
	} 

	//Test si le fichier ajouté est du bon format
	//Table of format accepted in our form
	$extensions_valides = array( 'jpg' , 'jpeg' , 'png' );

	//1. strrchr renvoie l'extension avec le point (« . »).
	//2. substr(chaine,1) ignore le premier caractère de chaine.
	//3. strtolower met l'extension en minuscules.

	//get the extension of the input file
	$extension_upload = strtolower(  substr(  strrchr($_FILES['mon_fichier']['name'], '.')  ,1)  );
	
	//Test if the extension in the input file is in the table of the extension allowed
	if(!in_array($extension_upload,$extensions_valides))
	{

		//echo "</br>";
		//echo "Extension correcte";
	
		//echo "Extension incorrecte";
		//goto end;
		
		//Good file type

		?>

		<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="../assets/img//favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="description" content="Where To Pics allow people to enter their location or future location to find the best points-of-view close to them. Come join us and upload your most beautiful pictures of your favorite spots !"/>
    
    <title>WhereToPics</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <link href="../Stilsheet.css" rel="stylesheet">

    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <link href="../assets/css/rubick.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700' rel='stylesheet' type='text/css'>
    <link href="../assets/css/fonts/pe-icon-7-stroke.css" rel="stylesheet">
    <link href="../assets/css/fonts/Rubik-Fonts.css" rel="stylesheet" />


</head>

<body id="skrollr-body">

<div class="wrapper">
    <div class="section section-header my-header" id="top">
        <div class="full-image pattern-image">
            <img class="img-map" src="../images/Map.jpg"/>

            <div class="container">
                <div class="content content-with-opacity">

                    <h1 class="WTP-title">Wrong Type Of File</h1>
                      <div class="separator-container">
                        <div class="separator line-separator">∎</div>
                      </div>
                    <h5>The file uploaded needs to be a .jpg, .jpeg or .png</h5>


                    <div class="content content-with-opacity WTP-div-connexion">

                    <form method="POST" action="../NewSpot.php">

                      <button type="submit"  class="send-btn btn btn-lg btn-black btn-contact" >
                      MAP <i class="fa fa-angle-double-right"></i>
                      </button>

                    </form>
                     
                    </div>

                 
                </div>
            </div>
        </div>
        
    </div>
    </div>
</body>

		<?php
		//goto end;
	}

		//Get the Lat and Long
		$reqTest = $bdd->prepare("SELECT Longi, Lat FROM Spot WHERE Lat ='".$_POST['Lat']."' AND Longi = '".$_POST['Longi']."';");
        $reqTest->execute();
        $data = $reqTest->rowCount();

        //echo "SELECT Longi, Lat FROM Spot WHERE Lat ='".$_POST['Lat']."' AND Longi = '".$_POST['Longi']."';";
        //echo "</br>";
		//echo $data;
		//echo "</br>";
	
	//Test if the spot is already in the database
        if ($data!=0)
	{
		//echo '<br /> Le Spot est deja referencé <br />';
		
		//Spot already in the database
		?>
	<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="../assets/img//favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="description" content="Where To Pics allow people to enter their location or future location to find the best points-of-view close to them. Come join us and upload your most beautiful pictures of your favorite spots !"/>
    
    <title>WhereToPics</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <link href="../Stilsheet.css" rel="stylesheet">

    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <link href="../assets/css/rubick.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700' rel='stylesheet' type='text/css'>
    <link href="../assets/css/fonts/pe-icon-7-stroke.css" rel="stylesheet">
    <link href="../assets/css/fonts/Rubik-Fonts.css" rel="stylesheet" />


</head>

<body id="skrollr-body">

<div class="wrapper">
    <div class="section section-header my-header" id="top">
        <div class="full-image pattern-image">
            <img class="img-map" src="../images/Map.jpg"/>

            <div class="container">
                <div class="content content-with-opacity">

                    <h1 class="WTP-title">WhereToPics</h1>
                      <div class="separator-container">
                        <div class="separator line-separator">∎</div>
                      </div>
                    <h5>Spot Already Uploaded</h5>


                    <div class="content content-with-opacity WTP-div-connexion">

                    <form method="POST" action="../NewSpot.php">

                      <button type="submit"  class="send-btn btn btn-lg btn-black btn-contact" >
                      MAP <i class="fa fa-angle-double-right"></i>
                      </button>

                    </form>
                     
                    </div>

                 
                </div>
            </div>
        </div>
        
    </div>

</div>
</body>
		<?php


		//------------ Recup id correspondant
		
	//Get the id of the spot corresponding
		$reqidSDA = $bdd->prepare("SELECT Longi, Lat FROM Spot WHERE Lat = ? AND Longi = ? ;");
        $reqidSDA->execute(array($_POST['Lat'],$_POST['Longi']));
        $dataidSDA = $reqidSDA->rowCount();

       // echo $dataidSDA;
       // echo "test";

		//------------ Recup id correspondant


		//------------ Test si id+image n'existe pas deja
	//Get if the name of the file input
		$reqTestimage = $bdd->prepare("SELECT image, numero FROM SpotDejaAjoute WHERE image = '".($_FILES['mon_fichier']['name'])."' AND numero = ".$dataidSDA.";");

        $reqTestimage->execute();
        $dataTestimage = $reqTestimage->rowCount();

        //echo "test";
		//echo $dataTestimage;
		// echo "test1";
		

		//------------ Fin Test si id+image n'existe pas deja

		//------ N'ajoute pas l'image si id+image deja dans la base
		//Test if the id and the file name or the same
		if ($dataTestimage!=0) 
			{
				// echo "Fichier similaire deja dans la base pour le meme Spot.";
				?>
		<!--	<div class="alert info">
  				<span class="closebtn">&times;</span>  
  				<strong>INFO!</strong> PICTURE ALREADY EXIST FOR THIS SPOT
			</div> -->
		<?php
				//goto end; // IMPORTANT A RAJOUTER
				//goto end;
				
				//If spot is already added and the name of the file is the same, file is not uploaded
			}
		//------- Fin

		//----------------------  Upload pour SpotDejaAjoute
		
		//Test if the name file is different, If differrent == NULL and then add it to the database
		
		if ($dataTestimage[0]==NULL)
		{
			//echo "</br>";
			// echo "Ajout de l'image, Merci de votre contribution";

			?>
	
		<?php
		
			//Add the spot to the folder /baseSup/ for the double
			$dossier = '../baseSup/';
			$fichier = basename($_FILES['mon_fichier']['name']);
     		
		//Test if the file moved from the input to the right folder correctly
     		if(move_uploaded_file($_FILES['mon_fichier']['tmp_name'], $dossier.$fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
     		{
     			//echo "</br>";
     			// echo 'Fichier bien uploader a la base supplementaire!';
     		}
     		else //Sinon (la fonction renvoie FALSE).
     		{
     			//echo "</br>";
     			// echo 'Echec de l\'upload !';
     		}
     	//----------------------  Fin Upload pour SpotDejaAjoute

     	//----------------------  Ajout des valeurs dans SpotDejaAjoute
	
	//Insert the spot already added into the database
     	$reqSDA = $bdd->prepare("INSERT into SpotDejaAjoute values ('".$dataidSDA."','".$_FILES['mon_fichier']['name']."');");
     	//echo "INSERT into SpotDejaAjoute values ('".$dataidSDA."','".$_FILES['mon_fichier']['name']."');";
        $reqSDA->execute();
        $resSDA = $reqSDA->fetch();

        //var_dump($dataTestimage[0]);


			//Test if the request went well or not
			if($resSDA==TRUE)
			{
				//echo "</br>";
				//echo'<p Le Spot a bien été ajouté a la base supplementaire !</p>';
			}

		//----------------------  Fin Ajout des valeurs dans SpotDejaAjoute
			//goto end;
			//goto end;
		}
	}
	else
	{
	
		//The spot is new, Insert the coordinates and info to the database
		$req1 = $bdd->prepare("INSERT INTO Spot VALUES ('', '".($_POST['NDS'])."','".($_POST['Longi'])."','".($_POST['Lat'])."');");	
        $req1->execute();
        $res1 = $req1->fetch();

       	

       	//echo "INSERT INTO Spot VALUES ('', '".($_POST['NDS'])."','".($_POST['Longi'])."','".($_POST['Lat'])."');";
       	//echo "test3";
	
		//The insert went well
			?>
	<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="../assets/img//favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="description" content="Where To Pics allow people to enter their location or future location to find the best points-of-view close to them. Come join us and upload your most beautiful pictures of your favorite spots !"/>
    
    <title>WhereToPics</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <link href="../Stilsheet.css" rel="stylesheet">

    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <link href="../assets/css/rubick.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700' rel='stylesheet' type='text/css'>
    <link href="../assets/css/fonts/pe-icon-7-stroke.css" rel="stylesheet">
    <link href="../assets/css/fonts/Rubik-Fonts.css" rel="stylesheet" />


</head>

<body id="skrollr-body">

<div class="wrapper">
    <div class="section section-header my-header" id="top">
        <div class="full-image pattern-image">
            <img class="img-map" src="../images/Map.jpg"/>

            <div class="container">
                <div class="content content-with-opacity">

                    <h1 class="WTP-title">WhereToPics</h1>
                      <div class="separator-container">
                        <div class="separator line-separator">∎</div>
                      </div>
                    <h5>Thank You For Your Contribution</h5>


                    <div class="content content-with-opacity WTP-div-connexion">

                    <form method="POST" action="../NewSpot.php">

                      <button type="submit"  class="send-btn btn btn-lg btn-black btn-contact" >
                      MAP <i class="fa fa-angle-double-right"></i>
                      </button>

                    </form>
                     
                    </div>

                 
                </div>
            </div>
        </div>
        
    </div>
    </div>
</body>
		<?php
	

		//--------------- Traitement de l'upload
	//Get the number of spot already in the database
		$reqNom = $bdd->query("SELECT COUNT(*) FROM Spot;");
        $reqNom->execute();
        $Nom = $reqNom->fetch();





		//make the right path and rename the input file
		$dossier = 'upload/';
		$fichier = '../upload/'.basename($Nom[0].".jpg");

		//echo $dossier.$fichier;
		//echo "test4";

		//rename(oldname, newname, context)

		//move_uploaded_file($_FILES['mon_fichier']['tmp_name'], $dossier.$fichier);

		//copy($_FILES['mon_fichier']['tmp_name'], $dossier.$fichier);
	
	//Test if the file moved correctly from the input folder to the upload folder
    	if(move_uploaded_file($_FILES['mon_fichier']['tmp_name'], $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
    	{
     		//echo "</br>";
     		//echo 'Upload effectué avec succès !';
   		}
    	else //Sinon (la fonction renvoie FALSE).
    	{
     		//echo "</br>";
     		//echo $_FILES['mon_fichier']['name'];
     		//echo 'Echec de l\'upload ! up';
    	}

    	//------------- Fin de l'upload

		//Ajout de tout les marqueurs présent dans la base de donnée
		//goto end;
	}

//end :

//echo "ok";	
 	
?>


	
