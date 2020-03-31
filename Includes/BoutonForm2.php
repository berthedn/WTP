<?php


include("ConnexionBase.php");
	//$bdd = new PDO('mysql:host=db707677819.db.1and1.com;dbname=db707677819', 'dbo707677819', '1.Damien');
	$c=$bdd;
    $connexion=$bdd;
    $c=$connexion;

	$_FILES['mon_fichier']['name'];    //Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_icone.png).
	$_FILES['mon_fichier']['type'];     //Le type du fichier. Par exemple, cela peut être « image/png ».
	$_FILES['mon_fichier']['size'];     //La taille du fichier en octets.
	
	//---------- Test de la saisie Latitude Longitude
	
	if ($_POST['Lat'] > 90 OR $_POST['Lat'] < '-90')
	{
		echo "</br>";

		echo "Mauvaise saisie de la Latitude";
		goto  end;
	}

		if ($_POST['Longi'] > 180 OR $_POST['Longi'] < '-180')
	{
		echo "</br>";

		echo "Mauvaise saisie de la Longitude";
		goto end;
	}
	
	//---------- Fin Test
	//---------- Test du fichier

	if ($_FILES['mon_fichier']['size'] > 4048576)
	{
		//echo $erreur = "Le fichier est trop gros";
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
		goto end;
	}

	//--------- Fin test du fichier


	//------------ Test si le spot existe ou pas 

		$reqTest = $bdd->prepare("SELECT Longi, Lat FROM Spot S WHERE S.Lat = ? AND S.Longi = ? ;");
        $reqTest->execute(array($_POST['Lat'],$_POST['Longi']));
        $data = $reqTest->rowCount();


/*
	$reqTest="SELECT Longi, Lat FROM Spot S WHERE S.Lat = ".($_POST['Lat'])." AND S.Longi = ".($_POST['Longi']).";";
	$resTest=mysqli_query($connexion,$reqTest) or die('<br />Erreur23 SQL !<br />'.$reqTest.'<br />'.mysqli_error());;
	//printf($reqTest);
	$data = mysqli_fetch_array($resTest);
*/	
	//echo "Nombre de spot deja dans la base : ".$data;

	//------------ Fin du test

	if ($data!=0)
	{
		//echo '<br /> Le Spot est deja referencé <br />';

		?>
			<div class="alert info">
  				<span class="closebtn">&times;</span>  
  				<strong>INFO!</strong> SPOT ALREADY REFERENCE
			</div>
		<?php


		//------------ Recup id correspondant 

		$reqidSDA = $bdd->prepare("SELECT Longi, Lat FROM Spot S WHERE S.Lat = ? AND S.Longi = ? ;");
        $reqidSDA->execute(array($_POST['Lat'],$_POST['Longi']));
        $dataidSDA = $reqidSDA->rowCount();

        //echo $dataidSDA;

/*
		$reqidSDA="SELECT S.id FROM Spot S WHERE S.Lat = ".($_POST['Lat'])." AND S.Longi = ".($_POST['Longi']).";";
		$residSDA=mysqli_query($connexion,$reqidSDA);
		//printf($reqidSDA);
		$dataidSDA = mysqli_fetch_array($residSDA);
		//echo $dataidSDA[0];
		//echo $_FILES['mon_fichier']['name'];
*/
		//------------ Recup id correspondant


		//------------ Test si id+image n'existe pas deja

		$reqTestimage = $bdd->prepare("SELECT SDA.image, SDA.numero FROM SpotDejaAjoute SDA WHERE SDA.image = '".($_FILES['mon_fichier']['name'])."' AND SDA.numero = ".$dataidSDA.";");

        $reqTestimage->execute();
        $dataTestimage = $reqTestimage->rowCount();

        //echo $dataTestimage;
/*		
		$reqTestimage="SELECT SDA.image, SDA.numero FROM SpotDejaAjoute SDA WHERE SDA.image = '".($_FILES['mon_fichier']['name'])."' AND SDA.numero = ".$dataidSDA[0].";";
		$resTestimage=mysqli_query($connexion,$reqTestimage);
		//printf($reqTestimage);
		$dataTestimage = mysqli_fetch_array($resTestimage);
		//echo $dataTestimage[0];
*/
		//------------ Fin Test si id+image n'existe pas deja

		//------ N'ajoute pas l'image si id+image deja dans la base 
		if ($dataTestimage!=0) 
			{
				//echo "Fichier similaire deja dans la base pour le meme Spot.";
				?>
			<div class="alert info">
  				<span class="closebtn">&times;</span>  
  				<strong>INFO!</strong> PICTURE ALREADY EXIST FOR THIS SPOT
			</div>
		<?php
				goto end;
			}
		//------- Fin

		//----------------------  Upload pour SpotDejaAjoute
		if ($dataTestimage[0]==NULL)
		{
			//echo "</br>";
			//echo "Ajout de l'image, Merci de votre contribution";

			?>
			<div class="alert success">
  				<span class="closebtn">&times;</span>  
  				<strong>SUCCESS!</strong> THANK FOR YOUR CONTRIBUTION
			</div>
		<?php

			$dossier = 'baseSup/';
			$fichier = basename($_FILES['mon_fichier']['name']);
     		
     		if(move_uploaded_file($_FILES['mon_fichier']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
     		{
     			//echo "</br>";
     			//echo 'Fichier bien uploader a la base supplementaire!';
     		}
     		else //Sinon (la fonction renvoie FALSE).
     		{
     			//echo "</br>";
     			//echo 'Echec de l\'upload !';
     		}
     	//----------------------  Fin Upload pour SpotDejaAjoute

     	//----------------------  Ajout des valeurs dans SpotDejaAjoute

     	$reqSDA = $bdd->prepare("INSERT into SpotDejaAjoute values ('".$dataidSDA."','".$_FILES['mon_fichier']['name']."');");
     	//echo "INSERT into SpotDejaAjoute values ('".$dataidSDA."','".$_FILES['mon_fichier']['name']."');";
        $reqSDA->execute();
        $resSDA = $reqSDA->fetch();

        //var_dump($dataTestimage[0]);


/*
		//Ajouter le nom de l'image dans la table SpotDejaAjoute
		$reqSDA="INSERT into SpotDejaAjoute values ('".$dataidSDA[0]."','".$_FILES['mon_fichier']['name']."');";
		//echo $reqSDA;
		//echo '</br>';

		// Insertion des valeurs dans la table 'SpotDejaAjoute'
		$resSDA=mysqli_query($connexion,$reqSDA);
*/
			if($resSDA==TRUE)
			{
				//echo "</br>";
				//echo'<p Le Spot a bien été ajouté a la base supplementaire !</p>';
			}

		//----------------------  Fin Ajout des valeurs dans SpotDejaAjoute
			goto end;
		}
	}
	//-----------------------
	else
	{

		$req1 = $bdd->prepare("INSERT into Spot values (NULL, '".($_POST['NDS'])."','".($_POST['Longi'])."','".($_POST['Lat'])."','".$_SESSION['id']."');");
		//echo "INSERT into Spot values (NULL, '".($_POST['NDS'])."','".($_POST['Longi'])."','".($_POST['Lat'])."','".$_SESSION['id']."');";
     	//echo "INSERT into Spot values (NULL, '".($_POST['NDS'])."','".($_POST['Longi'])."','".($_POST['Lat'])."');";
        $req1->execute();
        $res1 = $req1->fetch();

/*		
		// Si le Spot est valide (non nul)
		$req1="INSERT into Spot values (NULL, '".($_POST['NDS'])."','".($_POST['Longi'])."','".($_POST['Lat'])."');";
		//printf($req1);

		// Insertion des valeurs dans la table 'Spot'
		$res1=mysqli_query($connexion,$req1);
*/
/*
		if($res1==TRUE)
		{
			//echo "</br>";
			//echo'<p Le Spot a bien été ajouté !</p>';
*/
			?>
			<div class="alert success">
  				<span class="closebtn">&times;</span>  
  				<strong>SUCCESS!</strong> ADD SPOT SUCCESSFULL, THANK FOR YOUR CONTRIBUTION
			</div>
		<?php
/*
		}
		else
		{
			//echo'<p id="res_ajout_joueur2"> Erreur Insertion ! </p>';
		}
*/	

		//--------------- Traitement de l'upload

		$reqNom = $bdd->query("SELECT COUNT(*) FROM Spot;");
        $reqNom->execute();
        $Nom = $reqNom->fetch();


/*
		$reqNom="SELECT COUNT(*) FROM Spot S ;";
		$resNom=mysqli_query($connexion,$reqNom);
		//printf($reqNom);
		$Nom = mysqli_fetch_array($resNom);
*/



		$dossier = './upload/';
		$fichier = basename($Nom[0].".jpg");

    	if(move_uploaded_file($_FILES['mon_fichier']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
    	{
     		//echo "</br>";
     		//echo 'Upload effectué avec succès !';
   		}
    	else //Sinon (la fonction renvoie FALSE).
    	{
     		//echo "</br>";
     		//echo 'Echec de l\'upload !';
    	}

    	//------------- Fin de l'upload

		//Ajout de tout les marqueurs présent dans la base de donnée
		include("Includes/Marker.php");
	}

 	end :	
 	
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