<?php
//session_start();
//print_r($_SESSION);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img//favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

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

<body>

<?php



//include("includes/ConnexionBase.php");
$bdd = new PDO('mysql:host=wheretoplpbd.mysql.db;dbname=wheretoplpbd', 'wheretoplpbd', '1Wheretopics');



//Test si le bouton du formulaire est activé ou non
if(isset($_POST['forminscription']))
{
   $pseudo = htmlspecialchars($_POST['pseudo']);
   $mail = htmlspecialchars($_POST['mail']);
   $mail2 = htmlspecialchars($_POST['mail2']);
   $mdp = sha1($_POST['mdp']);
   $mdp2 = sha1($_POST['mdp2']);



   //Test si tout les champs sont bien rempli ou pas
   if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']))
   {
      $pseudolength = strlen($pseudo);

      //Test taille pseudo
      if($pseudolength <= 255)
      {

         //Test si mail1 egal mail2
         if($mail == $mail2)
         {

            //Test si mail est du bon format
            if(filter_var($mail, FILTER_VALIDATE_EMAIL))
            {
            
               $reqmail = $bdd->prepare('SELECT * FROM membres WHERE mail = ?');
               
               $reqmail->execute(array($mail));
               $mailexist = $reqmail->rowCount();
           
               //Test si le mail existe dans la base de donnée
               if($mailexist == 0)
               {

                  //Test si le mdp correspondant est ok aussi
                  if($mdp == $mdp2)
                  {
                     
                     $longueurKey = 15;
                     $key = "";
                     for($i=1;$i<$longueurKey;$i++) {
                        $key .= mt_rand(0,9);
                     }
                     

                     

                     $insertmbr = $bdd->prepare("INSERT INTO membres(pseudo, mail, motdepasse, confirmkey, confirme) VALUES(?, ?, ?, ?, ?)");
                     $insertmbr->execute(array($pseudo, $mail, $mdp, $key, 1));
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

                    <h1 class="WTP-title">Welcome to the community</h1>
                      <div class="separator-container">
                        <div class="separator line-separator">∎</div>
                      </div>
                    <h5>You can now sign in</h5>


                    <div class="content content-with-opacity WTP-div-connexion">

                    <form method="POST" action="../index.php">

                      <button type="submit"  class="send-btn btn btn-lg btn-black btn-contact" >
                      SIGN IN <i class="fa fa-angle-double-right"></i>
                      </button>

                    </form>
                     
                    </div>

                 
                </div>
            </div>
        </div>
        
    </div>                   


                  <?php

                     

                  }
                  else
                  {
                     //echo "Vos mots de passes ne correspondent pas !";
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

                    <h1 class="WTP-title">Almost there</h1>
                      <div class="separator-container">
                        <div class="separator line-separator">∎</div>
                      </div>
                    <h5>Your Passwords don't correspond</h5>


                    <div class="content content-with-opacity WTP-div-connexion">

                    <form method="POST" action="../Register.php">

                      <button type="submit"  class="send-btn btn btn-lg btn-black btn-contact" >
                      TRY AGAIN <i class="fa fa-angle-double-right"></i>
                      </button>

                    </form>
                     
                    </div>

                 
                </div>
            </div>
        </div>
        
    </div>



                  <?php
                  }
               }
               else
               {
                  //echo "Adresse mail déjà utilisée !";
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

                    <h1 class="WTP-title">Almost there</h1>
                      <div class="separator-container">
                        <div class="separator line-separator">∎</div>
                      </div>
                    <h5>This email adress is already used</h5>


                    <div class="content content-with-opacity WTP-div-connexion">

                    <form method="POST" action="../Register.php">

                      <button type="submit"  class="send-btn btn btn-lg btn-black btn-contact" >
                      TRY AGAIN <i class="fa fa-angle-double-right"></i>
                      </button>

                    </form>
                     
                    </div>

                 
                </div>
            </div>
        </div>
        
    </div>


                  <?php
                   
                             
                }
            }
            else
            {
                //echo "Votre adresse mail n'est pas valide !";

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

                    <h1 class="WTP-title">Almost there</h1>
                      <div class="separator-container">
                        <div class="separator line-separator">∎</div>
                      </div>
                    <h5>This email adress is not real</h5>


                    <div class="content content-with-opacity WTP-div-connexion">

                    <form method="POST" action="../Register.php">

                      <button type="submit"  class="send-btn btn btn-lg btn-black btn-contact" >
                      TRY AGAIN <i class="fa fa-angle-double-right"></i>
                      </button>

                    </form>
                     
                    </div>

                 
                </div>
            </div>
        </div>
        
    </div>
                  

                  <?php
            }
         }
         else
         {
            //echo "Vos adresses mail ne correspondent pas !";
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

                    <h1 class="WTP-title">Almost there</h1>
                      <div class="separator-container">
                        <div class="separator line-separator">∎</div>
                      </div>
                    <h5>Email adresses don't correspond</h5>


                    <div class="content content-with-opacity WTP-div-connexion">

                    <form method="POST" action="../Register.php">

                      <button type="submit"  class="send-btn btn btn-lg btn-black btn-contact" >
                      TRY AGAIN <i class="fa fa-angle-double-right"></i>
                      </button>

                    </form>
                     
                    </div>

                 
                </div>
            </div>
        </div>
        
    </div>                  

                  <?php
         }
      }
      else
      {
         //echo "Votre pseudo ne doit pas dépasser 255 caractères !";
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

                    <h1 class="WTP-title">Almost there</h1>
                      <div class="separator-container">
                        <div class="separator line-separator">∎</div>
                      </div>
                    <h5>Your username is over 255 characters</h5>


                    <div class="content content-with-opacity WTP-div-connexion">

                    <form method="POST" action="../Register.php">

                      <button type="submit"  class="send-btn btn btn-lg btn-black btn-contact" >
                      TRY AGAIN <i class="fa fa-angle-double-right"></i>
                      </button>

                    </form>
                     
                    </div>

                 
                </div>
            </div>
        </div>
        
    </div>
                 

                  <?php 
      }
   } 
   else
   {  
      //echo "Tous les champs doivent être complétés !";
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

                    <h1 class="WTP-title">Almost there</h1>
                      <div class="separator-container">
                        <div class="separator line-separator">∎</div>
                      </div>
                    <h5>You need to fulfil every input</h5>


                    <div class="content content-with-opacity WTP-div-connexion">

                    <form method="POST" action="../Register.php">

                      <button type="submit"  class="send-btn btn btn-lg btn-black btn-contact" >
                      TRY AGAIN <i class="fa fa-angle-double-right"></i>
                      </button>

                    </form>
                     
                    </div>

                 
                </div>
            </div>
        </div>
        
    </div>
                  

                  <?php
   }
}


  
         ?>


</body>

</html>

