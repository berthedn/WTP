<?php
if(!isset($_SESSION))
    {
        session_start();
    }


include("ConnexionBase.php");




//Test si le bouton formulaire a été appuyé
if(isset($_POST['formconnexion'])) {
   $mailconnect = htmlspecialchars($_POST['mailconnect']);
   $mdpconnect = sha1($_POST['mdpconnect']);




   //Test si le mail et le mdp ont bien  été saisis
   if(!empty($mailconnect) AND !empty($mdpconnect))
   {

      $requser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND motdepasse = ?");
      $requser->execute(array($mailconnect, $mdpconnect));
      $userexist = $requser->rowCount();

      //echo $mailconnect;
      //echo $mdpconnect;


      //Test si le mdp et mail existent dans la base
      if($userexist == 1)
      {

         $reqConfirmation = $bdd->prepare("SELECT confirme FROM membres WHERE mail = ? AND confirme = '1'");
         $reqConfirmation->execute(array($mailconnect));
         $userConfirmation = $reqConfirmation->rowCount();

         //echo $userConfirmation

         //Test si l'utilisateur est confirmé ou pas
         if($userConfirmation == 1)
         {

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
            header("Location: ../index.php");
            //$erreurc = "Veuillez vous confirmer avec le mail que nous vous avons envoyé."; //Mettre un pop up
            
         }

      }
     else
      {
        header("Location: ../index.php");
         //$erreurc = "Mauvais mail ou mot de passe !"; //Mettre un pop up
       

      }
   }
   else
   {
      header("Location: ../index.php");
      //$erreurc = "Tous les champs doivent être complétés !";
   }
}

if(isset($erreurc))
{
   //echo '<font color="red">'.$erreurc."</font>";
}
?>