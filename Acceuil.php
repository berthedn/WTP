 <?php
//session_start();
//print_r($_SESSION);
?>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img//favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="description" content="Where To Pics allow people to enter their location or future location to find the best points-of-view close to them. Come join us and upload your most beautiful pictures of your favorite spots !"/>
    
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

<body id="skrollr-body">

<?php
  include("Includes/ConnexionBase.php");
?>  
  <!-- <div class="loading ">
  <div class="loading-container">
    <p>Just a sec...</p>
    <img class="loader" src="assets/img//rubik.svg"/>
  </div>
</div> -->
<!-- if you want to keep the navbar hidden you can add this class to the navbar "navbar-burger"-->
<nav class="navbar navbar-default navbar-transparent navbar-fixed-top" role="navigation" >

    <div class="container my-header">
    <div class="navbar-header" >
        <button id="menu-toggle" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar bar1"></span>
            <span class="icon-bar bar2"></span>
            <span class="icon-bar bar3"></span>
        </button>
        <a href="#top" data-scroll="true" class="navbar-brand page-scroll">
           WhereToPics
        </a>
    </div>

    <div class="navbar-scroll-to collapse navbar-collapse" >
      <ul class="nav navbar-nav navbar-right navbar-uppercase">

<?php if(isset($_SESSION['id'])) 
  {
?>

        <li>
                <a href="" data-scroll="true" data-id="#whoWeAre" class="active">
                    About us
                </a>
            </li>
            <li>
                <a href="" data-scroll="true" data-id="#map">
                    Map
                </a>
            </li>
            <li>
                <a href="" data-scroll="true" data-id="#team">
                    Masterminds
                </a>
            </li>
            <li>
                <a href="" data-scroll="true" data-id="#contact">
                    Contact
                </a>
            </li>
            <li>
                <a href="" data-scroll="true" data-id="#deconnect">
                    Deconnect
                </a>
            </li>
            <li class="social-links">
                <a href="#">
                    <i class="fa fa-instagram"></i>
                </a>
            </li>
  <?php
  }
  else
  {
  ?>
        <li>
                <a href="" data-scroll="true" data-id="#whoWeAre" class="active">
                    About us
                </a>
            </li>
            <li>
                <a href="" data-scroll="true" data-id="#concept">
                    Concept
                </a>
            </li>
            <li>
                <a href="" data-scroll="true" data-id="#team">
                    Masterminds
                </a>
            </li>
            <li>
                <a href="" data-scroll="true" data-id="#contact">
                    Contact
                </a>
            </li>
            <li class="social-links">
                <a href="#">
                    <i class="fa fa-instagram"></i>
                </a>
            </li>
<?php
  }
?>
<!--
            <li>
                <a href="" data-scroll="true" data-id="#whoWeAre" class="active">
                    About us
                </a>
            </li>
            <li>
                <a href="" data-scroll="true" data-id="#concept">
                    Concept
                </a>
            </li>
            <li>
                <a href="" data-scroll="true" data-id="#team">
                    Masterminds
                </a>
            </li>
            <li>
                <a href="" data-scroll="true" data-id="#contact">
                    Contact
                </a>
            </li>
            <li class="social-links">
                <a href="#">
                    <i class="fa fa-instagram"></i>
                </a>
            </li>
-->


       </ul>
    </div><!-- /.navbar-collapse -->
  </div>
</nav>


<div class="wrapper">
    <div class="section section-header my-header" id="top">
        <div class="full-image pattern-image">
            <img class="img-map" src="Map.jpg"/>

            <div class="container">
                <div class="content content-with-opacity">

                     <div id="WTP-connect" style="display:none;">
                       <div class="contact-form">


                           <form method="POST" action="../Includes/connexion.php">
                               <div class="row">
                                 <div class="col-md-12">
                                   <div class="col-md-4 col-md-offset-4">
                                       <div class="form-group add-animation-stopped animation-1">


                                           <input type="text" name="mailconnect" value="" placeholder="E-mail" class="form-control WTP-form-name">


                                       </div>
                                   </div>
                                     <div class="col-md-4 col-md-offset-4">
                                         <div class="form-group add-animation-stopped animation-1">


                                             <input type="password" name="mdpconnect" value="" placeholder="Password" class="form-control WTP-form-name">


                                         </div>
                                     </div>
                                   </div>
                                 </div>

                                 <div class="row">
                                   <div class="col-md-6 col-md-offset-3">
                                     <div class="content content-with-opacity WTP-div-connexion">

                                       <button type="submit" name="formconnexion" value="Masquer" onclick="masquer_div('a_masquer');" class="send-btn btn btn-lg btn-black btn-contact">
                                        
                                       LOG IN <i class="fa fa-check"></i>
                                       </button>
                                     </div>
                                  </div>
                                 </div>
                                 </form>
                                 <div class="row WTP-register">
                                   <a href="Register.php" class="register"> Not registered ? Sign up </a>
                                 </div>
                           

                       </div>
                       <div clas="row">




                            <!-- <button type="button"  onclick="logIn()" class=" btn-facebook fb-btn btn btn-lg btn-black btn-contact col-md-offset-4 col-md-1">
                            FACEBOOK <i class="fa fa-facebook"></i>
                            </button> -->
                            <?php
                              include("GoogleLogin/loginFB.php");
                            ?>
<!--
                            <script
                                src="http://code.jquery.com/jquery-3.2.1.min.js"
                                integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
                                crossorigin="anonymous">
                            </script>
                            
                            <script>
                                var person = { userID: "", name: "", accessToken: "", picture: "", email: ""};
                                function logIn() {
                                    FB.login(function (response) {
                                        if (response.status == "connected") {
                                            person.userID = response.authResponse.userID;
                                            person.accessToken = response.authResponse.accessToken;
                                            FB.api('/me?fields=id,name,email,picture.type(large)', function (userData) {
                                                person.name = userData.name;
                                                person.email = userData.email;
                                                person.picture = userData.picture.data.url;
                                                $.ajax({
                                                   url: "loginFB.php",
                                                   method: "POST",
                                                   data: person,
                                                   dataType: 'text',
                                                   success: function (serverResponse) {
                                                       if (serverResponse == "success")
                                                           window.location = "indexFB.php";
                                                   }
                                                });
                                            });
                                        }
                                    }, {scope: 'public_profile, email'})
                                }
                                window.fbAsyncInit = function() {
                                    FB.init({
                                        appId            : '2030836840485711',
                                        autoLogAppEvents : true,
                                        xfbml            : true,
                                        version          : 'v2.11'
                                    });
                                };
                                (function(d, s, id){
                                    var js, fjs = d.getElementsByTagName(s)[0];
                                    if (d.getElementById(id)) {return;}
                                    js = d.createElement(s); js.id = id;
                                    js.src = "https://connect.facebook.net/en_US/sdk.js";
                                    fjs.parentNode.insertBefore(js, fjs);
                                }(document, 'script', 'facebook-jssdk'));
                            </script> -->

                            <!-- <button type="button"  class=" btn-google fb-btn btn btn-lg btn-black btn-contact col-md-1">
                            GOOGLE+ <i class="fa fa-google"></i>
                            </button> -->
<?php
                            include("GoogleLogin/loginGoogle.php");
?>





                            <!-- <button type="button"  class=" btn-instagram fb-btn btn btn-lg btn-black btn-contact col-md-offset-3 col-md-2">
                            INSTAGRAM <i class="fa fa-instagram"></i>
                            </button>                         -->
                      </div>
                   </div>

                    <div id="a_masquer">
                    <h1 class="WTP-title">Where to pics</h1>
                      <div class="separator-container">
                        <div class="separator line-separator">∎</div>
                      </div>
                    <h5>Discover together</h5>


                    <div class="content content-with-opacity WTP-div-connexion">
                      <!-- <button type="button"  class=" fb-btn btn btn-lg btn-black btn-contact">
                      FACEBOOK <i class="fa fa-facebook"></i>
                      </button> -->

 <?php if(!isset($_SESSION['id'])) 
  {
?>
                      <button type="button" value="Masquer" onclick="masquer_div('a_masquer');" class="send-btn btn btn-lg btn-black btn-contact">
                      LOG IN <i class="fa fa-angle-double-right"></i>
                      </button>
<?php
  }
?>
                      <!-- <button type="button" class="send-btn btn btn-lg btn-black btn-contact">
                      SIGN UP <i class="fa fa-angle-double-right"></i>
                      </button> -->
                    </div>

                  </div>
                </div>
            </div>
        </div>
        <a href="" data-scroll="true" data-id="#whoWeAre" class="scroll-arrow hidden-xs hidden-sm">
              <i class="fa fa-angle-down"></i>
        </a>
    </div>

    <div class="section section-we-are-2 radu" id="whoWeAre">
       <div class="text-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                      <div class="title add-animation">
                          <h5 class="text-gray">learn</h5>
                          <h2 class="WTP-h2">About us</h2>
                          <div class="separator-container">
                          <div class="separator line-separator my-separator">∎</div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-7 col-md-offset-1">
                        <p class="add-animation animation-1">WhereToPics is a web application built on the foundation and spirit of community with the intention of sharing the best picture locations around the world! </p>
                        <p class="add-animation animation-2">Statista.com reported 1.323 billion international tourists as of 2019, compared to 911 million just 10 years ago. Everyone will be able to add their best photograph locations and check to see if there are any other incredible picturesque spots nearby! WhereToPics is unique in that it is the only application that provides precise information about the absolute best places to take pictures. </p>
                        <p class="add-animation animation-3">We designed WhereToPics as a website application platform so that everyone can access it from their device via internet connection. The control and monitoring of content will be overseen by elected regulator site managers specifically and carefully chosen based on their contribution to the platform.</p>
                        <p class="add-animation animation-3">WhereToPics will continue to bring people together and reinforce the importance of sharing, interaction, and strong community.</p>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php if(isset($_SESSION['id'])) 
  {
?>
<div class="section section-we-are-2 radu" id="Map">
       <div class="text-area">
            <div class="container">
                <div class="row">
                    
                      
                    

                <div class="title add-animation">
                   <h5 class="text-gray">Choose Your Spot</h5>
                   <h2 class="WTP-h2">Map</h2>
                   <div class="separator-container">
                        <div class="separator line-separator">∎</div>
                    </div>
               </div>




                    
                        <style>
    #map{
      height:100%;
      width:100%;
    }
  </style>


 
  <div id="map">
  <script>
    function initMap(){
      // Map options
      var options = {
        zoom:4,
        center:{lat:42.3601,lng:-71.0589}
      }

      // New map
      var map = new google.maps.Map(document.getElementById('map'), options);

      // Listen for click on map
      google.maps.event.addListener(map, 'click', function(event){
        // Add marker
        //addMarker({coords:event.latLng});
      });

      /*
      // Add marker
      var marker = new google.maps.Marker({
        position:{lat:42.4668,lng:-70.9495},
        map:map,
        icon:'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'
      });

      var infoWindow = new google.maps.InfoWindow({
        content:'<h1>Lynn MA</h1>'
      });

      marker.addListener('click', function(){
        infoWindow.open(map, marker);
      });
      */

      // Array of markers

      var markers = [
        {
          coords:{lat:42.4668,lng:-70.9495},
          content:'<h3>Lynn MA</h3><img src="bali.jpg" width="220" height="150">'
        },
        {
          coords:{lat:42.8584,lng:-70.9300},
          content:'<h3>Amesbury MA</h3>'
        },
        {
          coords:{lat:42.7762,lng:-71.0773},
          content:'<h3>TEST</h3>'
        }
      ];

      // Loop through markers
      for(var i = 0;i < markers.length;i++){
        // Add marker
        addMarker(markers[i]);
      }

      // Add Marker Function
      function addMarker(props){
        var marker = new google.maps.Marker({
          position:props.coords,
          map:map,
          //icon:props.iconImage
        });

        // Check for customicon
        if(props.iconImage){
          // Set icon image
          marker.setIcon(props.iconImage);
        }

        // Check content
        if(props.content){
          var infoWindow = new google.maps.InfoWindow({
            content:props.content
          });

          marker.addListener('click', function(){
            infoWindow.open(map, marker);
          });
        }
      }
    }
  </script>
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=KEY_HERE&callback=initMap">
    </script>
                    
                </div>
            </div>
        </div>
    </div>
<?php
  }
?>

    <div class="section section-we-made-1 section-with-hover">
        <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="project add-animation animation-1">
                          <img src="bali.jpg"/>
                          <a class="over-area color-1" href="javascript:void(0)" onClick="rubik.showModal(this)" data-target="project_1">
                               <div class="content">
                                  <h4>Bali</h4>
                                  <p>Click for more... </p>
                              </div>
                          </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="project add-animation animation-2">
                          <img src="NewYork.jpg"/>
                           <a class="over-area color-1" href="javascript:void(0)" onClick="rubik.showModal(this)" data-target="project_2">
                               <div class="content">
                                  <h4>New York</h4>
                                  <p>Click for more... </p>
                              </div>
                          </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="project add-animation animation-3">
                          <img src="Paris.jpg"/>
                           <a class="over-area color-1" href="javascript:void(0)" onClick="rubik.showModal(this)" data-target="project_3">
                               <div class="content">
                                  <h4>Paris</h4>
                                  <p>Click for more... </p>
                              </div>
                          </a>
                    </div>
                </div>
             <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="project add-animation animation-1">
                    <img src="Sydney.jpg">
                    <a class="over-area color-1" href="javascript:void(0)" onClick="rubik.showModal(this)" data-target="project_4">
                         <div class="content">
                            <h4>Sydney</h4>
                            <p>Click for more... </p>
                        </div>
                    </a>
                 </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="project add-animation animation-2">
                    <img src="dubai.jpg">
                    <a class="over-area color-1" href="javascript:void(0)" onClick="rubik.showModal(this)" data-target="project_5">
                         <div class="content">
                            <h4>Dubai</h4>
                            <p>Click for more... </p>
                        </div>
                    </a>
                </div>
            </div>
              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="project add-animation animation-3">
                    <img src="guadeloupe.jpg">
                    <a class="over-area color-1" href="javascript:void(0)" onClick="rubik.showModal(this)" data-target="project_6">
                         <div class="content">
                            <h4>Guadeloupe</h4>
                            <p>Click for more... </p>
                        </div>
                    </a>
                </div>
            </div>
          </div>
    </div>

     <div class="section section-we-do-1" id="concept">
      <div class="text-area">
        <div class="container">
            <div class="row">
              <div class="title add-animation">
                   <h5 class="text-gray">let us define</h5>
                   <h2 class="WTP-h2">The concept</h2>
                   <div class="separator-container">
                        <div class="separator line-separator">∎</div>
                    </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4 col-sm-6">
                   <div class="card add-animation animation-1">
                       <h5 class="text-gray">01.</h5>
                       <h3 class="WTP-h3">Find a spot</h3>
                       <p>We set exacting standards and strive for consistency and precision in everything we do. We are committed to continuously improving our capabilities.</p>
                   </div>
               </div>
               <div class="col-md-4 col-sm-6">
                     <div class="card add-animation animation-2">
                       <h5 class="text-gray">02.</h5>
                       <h3 class="WTP-h3">Take a pic</h3>
                       <p>We take individual and collective responsibility for keeping our promises, acting ethically and demonstrating exemplary business conduct at all times because it is the right thing to do.</p>
                   </div>
               </div>
               <div class="col-md-4 col-sm-6">
                     <div class="card add-animation animation-3">
                       <h5 class="text-gray">03.</h5>
                       <h3 class="WTP-h3">Share it </h3>
                       <p>We are dedicated to making every details look amazing. You can count on the fact that no thing slides and everything will look just right. </p>
                   </div>
               </div>
               <!-- <div class="col-md-3 col-sm-6">
                     <div class="card add-animation animation-4">
                       <h5 class="text-gray">04.</h5>
                       <h3></h3>
                       <p>We are committed to creating and maintaining a safe surrounding to what will be your home. We take into consideration every need and make sure every person will feel protected.</p>
                   </div>
               </div> -->
            </div>
        </div>
      </div>
    </div>






    <div class="master-wtp section section-team-4" id="team">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div  class="title add-animation">
                <h5 class="text-gray">our</h5>
                <h2 class="WTP-h2">Masterminds</h2>
                <div class="separator-container">
                  <div class="separator line-separator">∎</div>
                </div>
            </div>
          </div>
          <div class="col-md-7 col-offset-1">
            <div class="team">
              <div class="row">
                <div class="col-md-4 col-md-offset-1 col-sm-6">
                  <div class="member add-animation animation-1">
                    <img class=" img-wtp img-circle " src="assets/img//faces/face_1.jpg"/>
                    <div class="description">
                      <h3 class="big-text">Sam</h3>
                      <p class="small-text">CEO / Co-Founder</p>
                      <p class="details">
                        Project Manager <br>
                        Security Analyst<br>
                      </p>
                   </div>
                   <div class="social-buttons hidden-xs">
                      <button href="#" class="btn btn-social btn-simple"><i class="fa fa-linkedin"></i></button>
                      <button href="#" class="btn btn-social btn-simple"><i class="fa fa-google-plus"></i></button>
                      <button href="#" class="btn btn-social btn-simple"><i class="fa fa-pinterest"></i></button>
                   </div>
                  </div>
                </div>
                <div class="col-md-4 col-md-offset-3">
                  <div class="member add-animation animation-3">
                    <img class="img-wtp img-circle" src="assets/img//faces/face_1.jpg"/>
                    <div class="description">
                      <h3 class="big-text">Damien</h3>
                      <p class="small-text">Co-Founder</p>
                      <p class="details">
                        Business Analyst<br>
                        Software Developer<br>
                      </p>
                   </div>
                   <div class="social-buttons hidden-xs">
                      <button href="#" class="btn btn-social btn-simple"><i class="fa fa-linkedin"></i></button>
                      <button href="#" class="btn btn-social btn-simple"><i class="fa fa-google-plus"></i></button>
                      <button href="#" class="btn btn-social btn-simple"><i class="fa fa-pinterest"></i></button>
                   </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>

<?php if(isset($_SESSION['id'])) 
  {
?>
<div class="section section-we-are-2 radu" id="deconnect">
       <div class="text-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                      <div class="title add-animation">
                          <h5 class="text-gray"></h5>
                          <h2 class="WTP-h2">Deconnect</h2>
                          <div class="separator-container">
                          <div class="separator line-separator my-separator">∎</div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-7 col-md-offset-1">
                        <div id="FormulaireDeconnexion">
                          
                              <h2>Deconnexion</h2>

                              <form method="POST" action="../Includes/deconnexion.php">
                                <input type="submit" placeholder="OUI" value="OUI">
                              </form>
    
                              <form method="POST" action="../Acceuil.php#top">
                                <input id="Test2" type="submit" placeholder="NON" value="NON">
                              </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
  }
?>


  <!-- <div class="section section-contact-3" id="contact">
        <div class="contact-container">
            <div class="address-container add-animation animation-1">
                <div class="address">
                    <h4>Where to meet ?</h4>
                    <p class="text-gray">
                        2578 Paris<br>
                        Rue Abel, 12<br>
                        France
                    </p>
                    <h4>Phone</h4>
                    <p class="text-gray">0456 / 71 21 39</p>
                    <h4>By the old way</h4>
                    <a href="mailto:hello@creative-tim.com">
                        <p class="text-gray">hello@creativetim.com</p>
                    </a>
                </div>
            </div>
            <div  class="map">
                <div id="contactUsMap" class=" WTP-map-pres"> <img src="WTPMap.png"></div>
            </div>
        </div>
    </div> -->

 <div class="section section-contact-1" id="contact">
        <div class="container">
          <div class="text-area">
              <div class="title add-animation">
                  <h5 class="text-gray">here you can</h5>
                  <h2 class="WTP-h2">Contact Us</h2>
                  <div class="separator-container">
                    <div class="separator line-separator">∎</div>
                  </div>
              </div>
          </div>
          <div class="contact-form">
              <form action="" method="post">
                  <div class="row">
                      <div class="col-md-4">
                          <div class="form-group add-animation-stopped animation-1">
                              <input type="text" name="name" value="" placeholder="Your Name" class="form-control">
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group add-animation-stopped animation-2">
                              <input type="text" name="email" value="" placeholder="Your Email" class="form-control">
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group add-animation-stopped animation-3">
                              <input type="text" name="subject" value="" placeholder="Subject of contact" class="form-control">
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group add-animation-stopped animation-1">
                              <textarea class="form-control" name="content" placeholder="Here you can write your nice text" rows="5"></textarea>
                          </div>
                          <div>
                              <div class="col-md-2 col-md-offset-5">
                                  <button type="button" class="send-btn btn btn-lg btn-black btn-contact">
                                  SEND <i class="fa fa-paper-plane"></i>
                                  </button>
                              </div>
                          </div>
                      </div>
                  </div>
              </form>
          </div>
    </div>
  </div>

    <footer class="footer-WTP footer footer-big footer-color-black" id="footerTrigger">
        <div class="container">
            <hr class="hr-WTP">
            <div class="copyright">
                © 2020 Damien & Sam
            </div>
        </div>
    </footer>
</div> <!-- end wrapper -->












<div class="project-content" id="project_1">
  <span class="icon-close"><i class="pe-7s-close-circle"></i></span>
  <div>
    <div class="project-details">
      <div class="container">
        <div class="project-title">
            <h5>Indonesia<span>.</span></h5>
            <h2>Bali</h2>
            <div class="separator-container">
              <div class="separator line-separator">∎</div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="project-text">
              <p><span>Type</span>Private house</p>
              <p><span>Status</span>Built</p>
              <p><span>Year</span>2013</p>
              <p><span>Size</span>1000sqft</p>
              <br>
              <p>Sol 25 is a house in San Pedro Cholula Puebla, Mexico. Located in a residential subdivision outside of the city, adjacent to Mount Zapoteca, a protected nature reserve. Sol 25 emerges as a home with the premise of creating spaces that are visually integrated with nature in addition to maximizing the size of the house.</p>
              <p>A distinct architectural layout is generated; located on the ground floor are two bedrooms, a garden, and a lobby. Going up to the first level is the living room and kitchen, all in an open-plan concept into a double-height space where you can enjoy the view to the green areas. Going up a level is a loft with a studio. The roof space was allocated to a roof garden where you can enjoy an outdoor environment that is visually attractive in 360 degrees.</p>
            </div>
          </div>
          <div class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                    <div class="project-image">
                       <img src="bali1.jpg"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="project-image">
                       <img src="Bali4.jpg"/>
                    </div>
                </div>
                  <div class="col-md-6">
                    <div class="project-image">
                       <img src="Bali3.jpg"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="project-image">
                       <img src="Bali3.jpg"/>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="project-content" id="project_2">
  <span class="icon-close"><i class="pe-7s-close-circle"></i></span>
  <div>
    <div class="project-details">
      <div class="container">
        <div class="project-title">
            <h5>Positano, Italy<span>.</span></h5>
            <h2>Villa Positano</h2>
            <div class="separator-container">
              <div class="separator line-separator">∎</div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="project-text">
              <p><span>Type</span>Private house</p>
              <p><span>Status</span>Built</p>
              <p><span>Year</span>2014</p>
              <p><span>Size</span>1500sqft</p>
              <br>
              <p>The true protagonist of this project is a collection of antique ceramics from Vietri, entrusted with the role of exalting the particular elements that make the famous Villa in Positano a contemporary architectural masterpiece.</p>
              <p>The harmonious composition of hand-painted ceramic tiles, the great passion of the villa’s owners, wraps a long ribbon of steel like a decorative skin. The ribbon is used to articulate the double height spaces of a former eighteenth-century monastery, linking the villa’s three levels.</p>
              <p>It begins on the ceiling, dropping down a six-meter high wall to become a shelf in the large living room on the first floor, a platform, intersecting the stairs leading to the kitchen on the ground floor. The ribbon then transforms into the dining room table, finally climbing back up toward the ceiling to house the lighting fixtures. All without any interruption.</p>
            </div>
          </div>
          <div class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                    <div class="project-image">
                       <img src="assets/img/rubik_background.jpg"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="project-image">
                       <img src="assets/img/rubik_background.jpg"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="project-image">
                       <img src="assets/img/rubik_background.jpg"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="project-image">
                       <img src="assets/img/rubik_background.jpg"/>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="project-content" id="project_3">
  <span class="icon-close"><i class="pe-7s-close-circle"></i></span>
  <div>
    <div class="project-details">
      <div class="container">
        <div class="project-title">
            <h5>Sahibzada Ajit Singh Nagar, India<span>.</span></h5>
            <h2>House 2413</h2>
            <div class="separator-container">
              <div class="separator line-separator">∎</div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="project-text">
              <p><span>Type</span>Private house</p>
              <p><span>Status</span>Built</p>
              <p><span>Year</span>2014</p>
              <p><span>Size</span>3000sqft</p>
              <br>
              <p>The project is located in Mohali, a satellite town of Chandigarh that is witnessing fast paced growth like most Indian cities.</p>
              <p>The brief of the client, a builder was to design a house for selling that would be universal in character so that it is acceptable & appreciated by all kinds of end users ranging from a high earning professional to a wealthy farmer.</p>
              <p>The overall concept was devised as a free plan with overlapping spaces to allow flexibility. However, the movement was choreographed so as to unfold the layers as one moves along the vertical axis of the house.</p>
            </div>
          </div>
          <div class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                    <div class="project-image">
                       <img src="assets/img/rubik_background.jpg"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="project-image">
                       <img src="assets/img/rubik_background.jpg"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="project-image">
                       <img src="assets/img/rubik_background.jpg"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="project-image">
                       <img src="assets/img/rubik_background.jpg"/>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="project-content" id="project_4">
  <span class="icon-close"><i class="pe-7s-close-circle"></i></span>
  <div>
    <div class="project-details">
      <div class="container">
        <div class="project-title">
            <h5>Elwood, Australia<span>.</span></h5>
            <h2>The Elwood House</h2>
            <div class="separator-container">
              <div class="separator line-separator">∎</div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="project-text">
              <p><span>Type</span>Private house</p>
              <p><span>Status</span>Built</p>
              <p><span>Year</span>2012</p>
              <p><span>Size</span>3000sqft</p>
              <br>
              <p>The Elwood House is a new residential dwelling with a separate garage and studio to the rear. The client’s brief was for a modern family home that was interesting and exciting but not to the detriment of the comfort to the occupants and within a sensible budget.</p>
              <p>“The client wanted a house that was clean, distinctive and enjoyable to use without feeling like they were an object in their own home because it was of a contemporary design” says the architect, Patrick Jost.</p>
              <p>Conceptually, the house is separated into two clearly defined elements to the upper and lower levels.</p>
            </div>
          </div>
          <div class="col-md-8">
            <div class="row">
               <div class="col-md-6">
                    <div class="project-image">
                       <img src="assets/img/rubik_background.jpg"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="project-image">
                       <img src="assets/img/rubik_background.jpg"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="project-image">
                       <img src="assets/img/rubik_background.jpg"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="project-image">
                       <img src="assets/img/rubik_background.jpg"/>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="project-content" id="project_5">
  <span class="icon-close"><i class="pe-7s-close-circle"></i></span>
  <div>
    <div class="project-details">
      <div class="container">
        <div class="project-title">
            <h5>Washington, DC, United States<span>.</span></h5>
            <h2>Brandywine House</h2>
            <div class="separator-container">
              <div class="separator line-separator">∎</div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="project-text">
              <p><span>Type</span>Private house</p>
              <p><span>Status</span>Built</p>
              <p><span>Year</span>2013</p>
              <p><span>Size</span>4000sqft</p>
              <br>
              <p>Located within close proximity to Rock Creek Park, and with easy access to the shops and restaurants on Connecticut Avenue, this large lot in Northwest Washington, DC presented a desirable opportunity for a young family to build a new house in this sought-after neighborhood.</p>
              <p>Designed to respect both the scale of neighboring houses and the rhythm of the streetscape, the project aligns with adjacent houses while retaining the vast majority of mature trees and green space located between the street and the house. Materials composing the exterior, which include stone, wood and stucco, evoke traditional materials found throughout the neighborhood. The house appears relatively solid when viewed from the street with strategically placed windows insuring privacy to the street-facing spaces.</p>
              <p>The “L” shaped house is organized around the outdoor living spaces and swimming pool, and is oriented towards the large, south facing rear yard. </p>
            </div>
          </div>
          <div class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                    <div class="project-image">
                       <img src="assets/img/rubik_background.jpg"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="project-image">
                       <img src="assets/img/rubik_background.jpg"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="project-image">
                       <img src="assets/img/rubik_background.jpg"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="project-image">
                       <img src="assets/img/rubik_background.jpg"/>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="project-content" id="project_6">
  <span class="icon-close"><i class="pe-7s-close-circle"></i></span>
  <div>
    <div class="project-details">
      <div class="container">
        <div class="project-title">
            <h5>New York City, NY, United States<span>.</span></h5>
            <h2>ICRAVE Office</h2>
            <div class="separator-container">
              <div class="separator line-separator">∎</div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="project-text">
              <p><span>Type</span>Office</p>
              <p><span>Status</span>Built</p>
              <p><span>Year</span>2014</p>
              <p><span>Size</span>8000sqft</p>
              <br>
              <p>After rapid growth, ICRAVE, a New York-based experiential branding and design firm, made the move to an 8,000-square-foot studio with the intention of really making it their own. The space, designed by the ICRAVE team itself, goes beyond the notion of an open plan office — it is designed specifically to foster ICRAVE’s immersive, collaborative culture. </p>
              <p>The design process was a collective effort of the entire ICRAVE studio. Dream sessions were held to harvest ideas, where team members examined different areas and said, “Now, what if we could have...,” giving everyone a chance to bring their ideas to the table. Among those options, ICRAVE then crowdsourced the best solution for each micro-environment, and created a one-of-a-kind office. The result is a truly collaborative office space that fosters employees' creativity, interaction, and inspiration. </p>
              <p>The reception desk doubles as a DJ booth, and the entrance plays host to archery matches. The conference room features large monolithic doors that swivel 360 degrees to open and close the space as needed. The kitchen and conference room are separated by a chalkboard that can be raised to create bar seating next to the kitchen or lowered to be used in meetings.</p>
            </div>
          </div>
          <div class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                    <div class="project-image">
                       <img src="assets/img/rubik_background.jpg"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="project-image">
                       <img src="assets/img/rubik_background.jpg"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="project-image">
                       <img src="assets/img/rubik_background.jpg"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="project-image">
                       <img src="assets/img/rubik_background.jpg"/>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
  <!--   core js files    -->
  <script src="assets/js/jquery-1.11.2.min.js" type="text/javascript"></script>

  <script src="assets/js/bootstrap.js" type="text/javascript"></script>

  <!--   file for adding vertical points where we activate the elements animation   -->
  <script type="text/javascript" src="assets/js/jquery.waypoints.min.js"></script>

  <!--  js library for devices recognition -->
  <script type="text/javascript" src="assets/js/modernizr.js"></script>

  <!--   file where we handle all the script from the Rubik page   -->
  <script type="text/javascript" src="assets/js/rubick.js"></script>

  <!--  script for google maps   -->
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

  <script>
          function masquer_div(id)
        {
          if (document.getElementById(id).style.display == 'none')
          {
               document.getElementById(id).style.display = 'block';
               document.getElementById("WTP-connect").style.display = 'none';
          }
          else
          {
               document.getElementById(id).style.display = 'none';
               document.getElementById("WTP-connect").style.display = 'block';
          }
        }
        function display_div()
        {
        if (document.getElementById().style.display == 'block')
        {
           alert('ici');
            // document.getElementById("a_masquer")="none";
            //  document.getElementById("WTP-signUP")='block';
            //  document.getElementById("WTP-connect")="none";
        }
        else
        {
          // document.getElementById("WTP-signUP")='block';
          alert('la');
        }
        }
  </script>

</html>

