<?php
if(!isset($_SESSION))
    {
        session_start();
    }


include("ConnexionBase.php");




//Test si le bouton formulaire a été appuyé
//Test if the button was pushed for SIGN IN
if(isset($_POST['formconnexion'])) {
   $mailconnect = htmlspecialchars($_POST['mailconnect']);
   $mdpconnect = sha1($_POST['mdpconnect']);




   //Test si le mail et le mdp ont bien  été saisis
   //Test if the password and Email were input
   if(!empty($mailconnect) AND !empty($mdpconnect))
   {
      
       //Get if someone is already in the database with this mail and password
      $requser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND motdepasse = ?");
      $requser->execute(array($mailconnect, $mdpconnect));
      $userexist = $requser->rowCount();

      //echo $mailconnect;
      //echo $mdpconnect;


      //Test si le mdp et mail existent dans la base
      //Test if someone is already in the database 1 is yes, 0 is no
      if($userexist == 1)
      {
        
         //Get if the email confirmation code is 1 (feature to finish to develop) 
         $reqConfirmation = $bdd->prepare("SELECT confirme FROM membres WHERE mail = ? AND confirme = '1'");
         $reqConfirmation->execute(array($mailconnect));
         $userConfirmation = $reqConfirmation->rowCount();

         //echo $userConfirmation

         //Test si l'utilisateur est confirmé ou pas
         //Test if the account is confirmed or not 
         if($userConfirmation == 1)
         {
            
            //Setup a session id
            $userinfo = $requser->fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['pseudo'] = $userinfo['pseudo'];
            $_SESSION['mail'] = $userinfo['mail'];

            //print_r($_SESSION);
            $erreurc = "Bienvenu, Vous etes connecté !"; //Mettre un lien vers profil.php AJOUTER UN POP UP
           header("Location: ../index.php");

         }
         else
         {
             //error handler you need to confirm your email 
            header("Location: ../index.php");
            //$erreurc = "Veuillez vous confirmer avec le mail que nous vous avons envoyé."; //Mettre un pop up
            
         }

      }
     else
      {
         //error, your mail or password are wrong
        header("Location: ../index.php");
         //$erreurc = "Mauvais mail ou mot de passe !"; //Mettre un pop up
       

      }
   }
   else
   {
       //error, you need to fullfil the inputs
      header("Location: ../index.php");
      //$erreurc = "Tous les champs doivent être complétés !";
   }
}

if(isset($erreurc))
{
   //echo '<font color="red">'.$erreurc."</font>";
}
?>
