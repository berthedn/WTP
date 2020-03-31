<?php
	
	include("ConnexionBase.php");
	//$bdd = new PDO('mysql:host=db707677819.db.1and1.com;dbname=db707677819', 'dbo707677819', '1.Damien');
	$c=$bdd;
    $connexion=$bdd;
    $c=$connexion;

    $_FILES['mon_fichier']['name'];    //Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_icone.png).
	$_FILES['mon_fichier']['type'];     //Le type du fichier. Par exemple, cela peut être « image/png ».
	$_FILES['mon_fichier']['size'];     //La taille du fichier en octets.

	//echo $_POST['Lat'];
	//echo $_POST['Longi'];

if ($_POST['Lat'] > '90' OR $_POST['Lat'] < '-90')
	{
		echo "</br>";
		echo "Mauvaise saisie de la Latitude";
		
	}

		if ($_POST['Longi'] > '180' OR $_POST['Longi'] < '-180')
	{
		echo "</br>";

		echo "Mauvaise saisie de la Longitude";
		
	}

	if ($_FILES['mon_fichier']['size'] > 4048576)
	{
		echo $erreur = "Le fichier est trop gros";
		//on la recupère avec la fonction imagecreatefromjpeg et avec son chemin
    	$img = imagecreatefromjpeg($_FILES['mon_fichier']['tmp_name']);

    	//Enfin on la remet ou elle était avec la qualité qu'on veut !
    	imagejpeg($img, $_FILES['mon_fichier']['tmp_name'], 75);
		//goto end;
	} 

	//Test si le fichier ajouté est du bon format
	$extensions_valides = array( 'jpg' , 'jpeg' , 'png' );

	//1. strrchr renvoie l'extension avec le point (« . »).
	//2. substr(chaine,1) ignore le premier caractère de chaine.
	//3. strtolower met l'extension en minuscules.
	$extension_upload = strtolower(  substr(  strrchr($_FILES['mon_fichier']['name'], '.')  ,1)  );

	if ( in_array($extension_upload,$extensions_valides) )
	{
		//echo "</br>";
		//echo "Extension correcte";
	}
	else
	{
		echo "Extension incorrecte";
	}


		$reqTest = $bdd->prepare("SELECT Longi, Lat FROM Spot S WHERE S.Lat = ? AND S.Longi = ? ;");
        $reqTest->execute(array($_POST['Lat'],$_POST['Longi']));
        $data = $reqTest->rowCount();

//echo $data;

        if ($data!=0)
	{
		//echo '<br /> Le Spot est deja referencé <br />';

		?>
	<!--		<div class="alert info">
  				<span class="closebtn">&times;</span>  
  				<strong>INFO!</strong> SPOT ALREADY REFERENCE
			</div> -->
		<?php


		//------------ Recup id correspondant 

		$reqidSDA = $bdd->prepare("SELECT Longi, Lat FROM Spot S WHERE S.Lat = ? AND S.Longi = ? ;");
        $reqidSDA->execute(array($_POST['Lat'],$_POST['Longi']));
        $dataidSDA = $reqidSDA->rowCount();

        //echo $dataidSDA;

		//------------ Recup id correspondant


		//------------ Test si id+image n'existe pas deja

		$reqTestimage = $bdd->prepare("SELECT SDA.image, SDA.numero FROM SpotDejaAjoute SDA WHERE SDA.image = '".($_FILES['mon_fichier']['name'])."' AND SDA.numero = ".$dataidSDA.";");

        $reqTestimage->execute();
        $dataTestimage = $reqTestimage->rowCount();

        //echo "test";
		//echo $dataTestimage;
		

		//------------ Fin Test si id+image n'existe pas deja

		//------ N'ajoute pas l'image si id+image deja dans la base 
		if ($dataTestimage!=0) 
			{
				//echo "Fichier similaire deja dans la base pour le meme Spot.";
				?>
		<!--	<div class="alert info">
  				<span class="closebtn">&times;</span>  
  				<strong>INFO!</strong> PICTURE ALREADY EXIST FOR THIS SPOT
			</div> -->
		<?php
				//goto end;
			}
		//------- Fin

		//----------------------  Upload pour SpotDejaAjoute
		if ($dataTestimage[0]==NULL)
		{
			//echo "</br>";
			//echo "Ajout de l'image, Merci de votre contribution";

			?>
	<!--		<div class="alert success">
  				<span class="closebtn">&times;</span>  
  				<strong>SUCCESS!</strong> THANK FOR YOUR CONTRIBUTION
			</div> -->
		<?php

			$dossier = 'baseSup/';
			$fichier = basename($_FILES['mon_fichier']['name']);
     		
			//echo $dossier . $fichier;

     		if(move_uploaded_file($_FILES['mon_fichier']['name'], './baseSup/')) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
     		{
     			//echo "</br>";
     			echo 'Fichier bien uploader a la base supplementaire!';
     		}
     		else //Sinon (la fonction renvoie FALSE).
     		{
     			//echo "</br>";
     			echo 'Echec de l\'upload !';
     		}
     	//----------------------  Fin Upload pour SpotDejaAjoute

     	//----------------------  Ajout des valeurs dans SpotDejaAjoute

     	$reqSDA = $bdd->prepare("INSERT into SpotDejaAjoute values ('".$dataidSDA."','".$_FILES['mon_fichier']['name']."');");
     	//echo "INSERT into SpotDejaAjoute values ('".$dataidSDA."','".$_FILES['mon_fichier']['name']."');";
        $reqSDA->execute();
        $resSDA = $reqSDA->fetch();

        //var_dump($dataTestimage[0]);



			if($resSDA==TRUE)
			{
				//echo "</br>";
				//echo'<p Le Spot a bien été ajouté a la base supplementaire !</p>';
			}

		//----------------------  Fin Ajout des valeurs dans SpotDejaAjoute
			//goto end;
		}
	}
	else
	{

		$req1 = $bdd->prepare("INSERT into Spot values (NULL, '".($_POST['NDS'])."','".($_POST['Longi'])."','".($_POST['Lat'])."');");
		
        $req1->execute();
        $res1 = $req1->fetch();

        //echo "INSERT into Spot values (NULL, '".($_POST['NDS'])."','".($_POST['Longi'])."','".($_POST['Lat'])."');";


			?>
	<!--		<div class="alert success">
  				<span class="closebtn">&times;</span>  
  				<strong>SUCCESS!</strong> ADD SPOT SUCCESSFULL, THANK FOR YOUR CONTRIBUTION
			</div> -->
		<?php
	

		//--------------- Traitement de l'upload

		$reqNom = $bdd->query("SELECT COUNT(*) FROM Spot;");
        $reqNom->execute();
        $Nom = $reqNom->fetch();






		$dossier = './upload/';
		$fichier = basename($Nom[0].".jpg");

		echo $dossier.$fichier;

		//rename(oldname, newname, context)

		//move_uploaded_file($_FILES['mon_fichier']['tmp_name'], $dossier.$fichier);

		//copy($_FILES['mon_fichier']['tmp_name'], $dossier.$fichier);

    	if(move_uploaded_file($_FILES['mon_fichier']['tmp_name'], '/upload/')) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
    	{
     		//echo "</br>";
     		echo 'Upload effectué avec succès !';
   		}
    	else //Sinon (la fonction renvoie FALSE).
    	{
     		//echo "</br>";
     		//echo $_FILES['mon_fichier']['name'];
     		echo 'Echec de l\'upload !';
    	}

    	//------------- Fin de l'upload

		//Ajout de tout les marqueurs présent dans la base de donnée
		include("Includes/Marker.php");
	}

 		
 	
?>

<script>
var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
    close[i].onclick = function(){
        var div = this.parentElement;
        div.style.opacity = "0";
        setTimeout(function(){ div.style.display = "none"; }, 600);
    }
}
</script>

	
