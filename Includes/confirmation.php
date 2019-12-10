<?php
include("ConnexionBase.php");
//$bdd = new PDO('mysql:host=db707677819.db.1and1.com;dbname=db707677819', 'dbo707677819', '1.Damien');

if(isset($_GET['pseudo'], $_GET['key']) AND !empty($_GET['pseudo']) AND !empty($_GET['key']))
{
   $pseudo = htmlspecialchars(urldecode($_GET['pseudo']));
   $key = htmlspecialchars($_GET['key']);
   $requser = $bdd->prepare("SELECT * FROM membres WHERE pseudo = ? AND confirmkey = ?");
   $requser->execute(array($pseudo, $key));
   $userexist = $requser->rowCount();

   //Test si l'utilisateur existe
   if($userexist == 1)
   {
      $user = $requser->fetch();

      //Test si le user est deja verifie ou pas
      if($user['confirme'] == 0)
      {
         $updateuser = $bdd->prepare("UPDATE membres SET confirme = 1 WHERE pseudo = ? AND confirmkey = ?");
         $updateuser->execute(array($pseudo,$key));
         //echo "Votre compte a bien été confirmé !";
?>
<head>
   <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Crete+Round">
   <title>WhereToPics</title>
</head>

<header>
        <div class="wrapper">
            
            <h1>WhereToPics</h1>
         </div>  
</header>

<section id="confirmation">
        <div class="wrapper">
            
            <h2>HELLO, YOU’RE A SPOTER
                <br />
                <br />
                
                <strong>
                    DISCOVER THE WORLD
                </strong>
            </h2>

            <a href="../indexWTP.php?page=FormulaireConnexion" class="bouton-l">HERE</a>

        </div>
</section>
<footer>
        <div class="wrapper">
            <h1>WhereToPics</h1>
            <div class="copyright">Copyright © 2018. Tous droit réservés.</div>
        </div>
    </footer>

<?php
         //echo '<form method="POST" action="../indexWTP.php?page=FormulaireConnexion"> <input type="submit" value="Aller au site"/> </form>';
      }
      else
      {
         ?>
<head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="../styles.css">
   <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Crete+Round">
   <title>WhereToPics</title>
</head>
<header>
        <div class="wrapper">
            
            <h1>WhereToPics</h1>
         </div>  
</header>

<section id="confirmation">
        <div class="wrapper">
            
            <h2>ALLREADY CONFIRM
                <br />
                <br />
                
                <strong>
                    COME DISCOVER THE WORLD
                </strong>
            </h2>

            <a href="../indexWTP.php?page=FormulaireConnexion" class="bouton-l">HERE</a>


        </div>
</section>

<footer>
        <div class="wrapper">
            <h1>WhereToPics</h1>
            <div class="copyright">Copyright © 2018. Tous droit réservés.</div>
        </div>
    </footer>

<?php
      }
   }
   else
   {
      ?>
<head>
   <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Crete+Round">
   <title>WhereToPics</title>
</head>
<header>
        <div class="wrapper">
            
            <h1>WhereToPics</h1>
         </div>  
</header>
<section id="confirmation">
        <div class="wrapper">
            
            Utilisateur non existant

            <h2>CREATE AN ACCOUNT
                <br />
                <br />
                
                <strong>
                    TO DISCOVER THE WORLD WITH US
                </strong>
            </h2>

            <a href="../indexWTP.php?page=FormulaireInscription" class="bouton-l">HERE</a>

        </div>
</section>
<footer>
        <div class="wrapper">
            <h1>WhereToPics</h1>
            <div class="copyright">Copyright © 2018. Tous droit réservés.</div>
        </div>
    </footer>

<?php
   }
}
?>