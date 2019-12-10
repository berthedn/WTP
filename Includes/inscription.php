<?php
if(!isset($_SESSION))
    {
        session_start();
    }
//print_r($_SESSION);

include("ConnexionBase.php");

//Test si le bouton du formulaire est activé ou non
if(isset($_POST['forminscription']))
{
   $pseudo = htmlspecialchars($_POST['pseudo']);
   $mail = htmlspecialchars($_POST['mail']);
   $mail2 = htmlspecialchars($_POST['mail2']);
   $mdp = sha1($_POST['mdp']);
   $mdp2 = sha1($_POST['mdp2']);


         //Test si mail1 egal mail2
         if($mail == $mail2)
         {

            //Test si mail est du bon format
            if(filter_var($mail, FILTER_VALIDATE_EMAIL))
            {
               $reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
               $reqmail->execute(array($mail));
               $mailexist = $reqmail->rowCount();

               //Test si le mail existe dans la base de donnée
               if($mailexist == 0)
               {

                  //Test si le mdp correspondant est ok aussi
                  if($mdp == $mdp2)
                  {
                     $insertmbr = $bdd->prepare("INSERT INTO membres(pseudo, mail, motdepasse, confirme) VALUES(?, ?, ?, ?)");
                     $insertmbr->execute(array($pseudo, $mail, $mdp, '1'));

                     $erreur = "Votre compte a bien été créé ! <a href=\"../Acceuil.php\">Me connecter</a>";

                     header("Location: ../Acceuil.php");
                  }
                  else
                  {
                     $erreur = "Vos mots de passes ne correspondent pas !";
                  }
               }
               else
               {
                   $erreur = "Adresse mail déjà utilisée !";
               }
            }
            else
            {
                $erreur = "Votre adresse mail n'est pas valide !";
            }
         }
         else
         {
            $erreur = "Vos adresses mail ne correspondent pas !";
         }
      }
     

   if(isset($erreur))
   {
      //echo '<font color="red">'.$erreur."</font>";
   }
         ?>
