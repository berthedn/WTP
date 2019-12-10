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
  <nav class="navbar navbar-default navbar-transparent navbar-fixed-top" role="navigation" >

      <div class="container my-header">
      <div class="navbar-header" >
          <button id="menu-toggle" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar bar1"></span>
              <span class="icon-bar bar2"></span>
              <span class="icon-bar bar3"></span>
          </button>
          <a href="Acceuil.php" data-scroll="true" class="navbar-brand page-scroll">
             WhereToPics
          </a>
      </div>
      <div class="navbar-scroll-to collapse navbar-collapse" >
        <ul class="nav navbar-nav navbar-right navbar-uppercase">
              <li>
                  <a href="Acceuil.php#whoWeAre" data-scroll="true" data-id="#whoWeAre" class="active">
                      About us
                  </a>
              </li>
              <li>
                  <a href="Acceuil.php#concept" data-scroll="true" data-id="#concept">
                      Concept
                  </a>
              </li>
              <li>
                  <a href="Acceuil.php#team" data-scroll="true" data-id="#team">
                      Masterminds
                  </a>
              </li>
              <li>
                  <a href="Acceuil.php.contact" data-scroll="true" data-id="#contact">
                      Contact
                  </a>
              </li>
              <li class="social-links">
                  <a href="#">
                      <i class="fa fa-instagram"></i>
                  </a>
              </li>
         </ul>
      </div><!-- /.navbar-collapse -->
    </div>
  </nav>

  <div class="section section-header my-header" id="top">
      <div class="full-image pattern-image">
          <img class="img-map" src="Map.jpg"/>

          <div class="container">
              <div class="WTP-signUP content content-with-opacity">

                   <div id="WTP-connect">
                     <div class="contact-form">
</br>
</br>
</br>
</br>


                         <form action="../Includes/inscription.php" method="POST">
                             <div class="row">
                               <div class="col-md-12">
                                 <div class="col-md-4 col-md-offset-4">
                                     <div class="form-group add-animation-stopped animation-1">

                                         <input type="text" name="pseudo" value="" placeholder="Pseudo" class="form-control WTP-form-name">

                                     </div>
                                 </div>
                                 <div class="col-md-4 col-md-offset-4">
                                     <div class="form-group add-animation-stopped animation-1">

                                         <input type="text" name="mail" value="" placeholder="E-mail" class="form-control WTP-form-name">

                                     </div>
                                 </div>
                                   <div class="col-md-4 col-md-offset-4">
                                       <div class="form-group add-animation-stopped animation-1">

                                           <input type="text" name="mail2" value="" placeholder="Confirm E-mail" class="form-control WTP-form-name">

                                       </div>
                                   </div>
                                   <div class="col-md-4 col-md-offset-4">
                                       <div class="form-group add-animation-stopped animation-1">
                                           <input type="password" name="mdp" value="" placeholder="Password" class="form-control WTP-form-name">
                                       </div>
                                   </div>
                                     <div class="col-md-4 col-md-offset-4">
                                         <div class="form-group add-animation-stopped animation-1">
                                             <input type="password" name="mdp2" value="" placeholder="Confirm Password" class="form-control WTP-form-name">
                                         </div>
                                     </div>
                                 </div>
                               </div>
                            
                     </div>
                 </div>

                  <div class="content content-with-opacity WTP-div-connexion">

                    <button type="submit" name="forminscription" value="Masquer" onclick="masquer_div('a_masquer');" class="send-btn btn btn-lg btn-black btn-contact">

                    SIGN UP <i class="fa fa-angle-double-right"></i>
                    </button>
                    </form>
                </div>
                </div>
              </div>
          </div>
      </div>
  </div>



</body>

</html>
