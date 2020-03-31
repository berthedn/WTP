<?php

//Compte le nombre de spot dans la base de donnée
$Compttaille = "SELECT COUNT(*) FROM Spot;";
$restaille=mysqli_query($connexion,$Compttaille);
$taille = mysqli_fetch_array($restaille);
//echo $taille[0];

for ($i=3; $i<$taille[0]*3+3; $i=$i+3)
{

		//-----------------

		/*$reqLigne0 = "SELECT Spot FROM Spot WHERE id = $i/3;";
		$resLigne0 = mysqli_query($connexion,$reqLigne0);
		$ligne0 = mysqli_fetch_array($resLigne0);

		var_dump($ligne0[0]);

		$reqLigne1 = "SELECT Lat FROM Spot WHERE id = $i/3;";
		$resLigne1 = mysqli_query($connexion,$reqLigne1);
		$ligne1 = mysqli_fetch_array($resLigne1);

		var_dump($ligne1[0]);

		$reqLigne2 = "SELECT Longi FROM Spot WHERE id = $i/3;";
		$resLigne2 = mysqli_query($connexion,$reqLigne2);
		$ligne2 = mysqli_fetch_array($resLigne2);

		var_dump($ligne2[0]);*/

		//$map->addMarkerByCoords($ligne1[0], $ligne2[0], "Mairie de V", $ligne0[0], "Venissieux");

		//--------------------
		//Requete pour afficher l'ensemble des spot de la base

		$reqLigne = "SELECT Spot, Longi, Lat FROM Spot WHERE id = $i/3;";
		$resLigne = mysqli_query($connexion,$reqLigne);
		$ligne = mysqli_fetch_array($resLigne);

		//var_dump($ligne[0]);
		//var_dump($ligne[1]);
		//var_dump($ligne[2]);
		$image = $i/3;
		//echo "</br>";
		//echo $image;

		//echo "<p class='mon-style'><img src=upload/".$image.".jpg></p>";

		$map->addMarkerByCoords($ligne[1], $ligne[2], '<strong>'.$ligne[0].'</strong>  <style type="text/css"> #image { height: 200px; width: 200px; text-align: center; display: table-cell; vertical-align: middle;} #image2 { max-height: 200px; max-width: 200px; } </style> </br>  <div id="image"> <img id="image2" src="upload/'.$image.'.jpg" border="0" /> </br> </div>');

		//"<p class='mon-style'>Le style s'applique à ce paragraphe </p>"
		//"</br></br><img src=upload/".$image.".jpg width= 300  height=200 >";

		//"<div> <img src=upload/".$image.".jpg> </div>"

		

		//Image : <a href=./upload/10.jpg> ici 
		//---------------------

			//echo "</br>";

}
?>