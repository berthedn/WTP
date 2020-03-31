 <?php
session_start();
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
  //include("Includes/ConnexionBase.php");
?>  

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
                <a href="" data-scroll="true" data-id="#concept">
                    Concept
                </a>
            </li>
            <li>
                <a href="" data-scroll="true" data-id="#deconnect">
                    Sign Out
                </a>
            </li>
            <li>
                <a href="" data-scroll="true" data-id="#contact">
                    Contact
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
            
<?php
  }
?>



       </ul>
    </div><!-- /.navbar-collapse -->
  </div>
</nav>


<div class="wrapper">
    <div class="section section-header my-header" id="top">
        <div class="full-image pattern-image">
            <img class="img-map" src="images/Map.jpg"/>

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

                                       <button type="submit" name="formconnexion" value="Masquer" onclick="masquer_div('a_masquer');" class="send-btn btn btn-lg btn-black btn-contact">SIGN IN<i class="fa fa-check"></i>
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

                      </div>
                   </div>


                    <div id="a_masquer">
                    <h1 class="WTP-title">WhereToPics</h1>
                      <div class="separator-container">
                        <div class="separator line-separator">∎</div>
                      </div>
                    <h5>Discover Together</h5>


                    <div class="content content-with-opacity WTP-div-connexion">
                     

 <?php if(!isset($_SESSION['id'])) 
  {
?>
                      <button type="button" value="Masquer" onclick="masquer_div('a_masquer');" class="send-btn btn btn-lg btn-black btn-contact">
                      SIGN IN <i class="fa fa-angle-double-right"></i>
                      </button>
<?php
  }
?>

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
                        <p class="add-animation animation-2">Statista.com reported 1.323 billion international tourists as of 2019, compared to 911 million just 10 years ago. Everyone will be able to add their best photograph locations and check to see if there are any other incredible picturesque spots nearby! WhereToPics is unique in that it is the only application that provides precise information about the absolute best places to take pictures.</p>
                        <p class="add-animation animation-3">We designed WhereToPics as a website application platform so that everyone can access it from their device via internet connection. The control and monitoring of content will be overseen by elected regulator site managers.</p>
                        <p class="add-animation animation-3">WhereToPics will continue to bring people together and reinforce the importance of sharing, interaction, and strong community. Never miss a wonderful opportunity to capture a beautiful memory again!</p>


                    </div>
                </div>
            </div>
          </div>
      </div>



<?php if(isset($_SESSION['id'])) 
  {
?>
<div class="section section-we-are-2 radu" id="map">
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

              <div class="row">
                 <form action="NewSpot.php" method="GET">
                     <input  type="submit" value="EXPLORE" class="send-btn btn btn-lg btn-black btn-contact explore-btn"/>
                 </form>
               </div>

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
                          <img src="images/lyon.jpg"/>
                          <a class="over-area color-1" href="javascript:void(0)" onClick="rubik.showModal(this)" data-target="project_1">
                               <div class="content">
                                  <h4>Fourviere</h4>
                                  <p>Click for more... </p>
                              </div>
                          </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="project add-animation animation-2">
                          <img src="images/HsB.jpg"/>
                           <a class="over-area color-1" href="javascript:void(0)" onClick="rubik.showModal(this)" data-target="project_2">
                               <div class="content">
                                  <h4>HorseShoe Bend</h4>
                                  <p>Click for more... </p>
                              </div>
                          </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="project add-animation animation-3">
                          <img src="images/dreesP.jpg"/>
                           <a class="over-area color-1" href="javascript:void(0)" onClick="rubik.showModal(this)" data-target="project_3">
                               <div class="content">
                                  <h4>Drees Pavilion</h4>
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
                          <h2 class="WTP-h2">Sign Out</h2>
                          <div class="separator-container">
                          <div class="separator line-separator my-separator">∎</div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-7 col-md-offset-1">
                        <div id="FormulaireDeconnexion">

                              

                              <form method="POST" action="../Includes/deconnexion.php">
                                <input type="submit" class="send-btn btn btn-lg btn-black btn-contact explore-btn" placeholder="OUI" value="YES">
                              </form>

                              <form method="POST" action="../index.php#top">
                                <input id="Test2" class="send-btn btn btn-lg btn-black btn-contact padding-50 explore-btn" type="submit" placeholder="NON" value="NO">
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
              <form method="POST" action="index.php">
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
                                  <button type="submit" class="send-btn btn btn-lg btn-black btn-contact">
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
            <h5>Lyon, FRANCE<span>.</span></h5>
            <h2>Notre-Dame de Fourviere</h2>
            <div class="separator-container">
              <div class="separator line-separator">∎</div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="project-text">
              <p><span>Type</span>Cathedrale</p>
              <br>
              <p>The Basilica of Notre-Dame de Fourviere is a minor basilica in Lyon. It was built with private funds between 1872 and 1884 in a dominant position overlooking the city. The site it occupies was once the Roman forum of Trajan, the forum vetus (old forum), thus its name (as an inverted corruption of the French Vieux-Forum).</p>
              <p>Fourvière has always been a popular place of pilgrimage. There has been a shrine at Fourvière dedicated to Our Lady since 1170. The chapel and parts of the building have been rebuilt at different times over the centuries, the most recent major works being in 1852 when the former steeple was replaced by a tower surmounted by a golden statue of the Virgin Mary sculpted by Joseph-Hugues Fabisch (1812–1886).</p>
            </div>
          </div>
          <div class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                    <div class="project-image">
                       <img src="images/Ndf1.jpg"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="project-image">
                       <img src="images/Ndf2.jpg"/>
                    </div>
                </div>
                  <div class="col-md-6">
                    <div class="project-image">
                       <img src="images/Ndf3.jpg"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="project-image">
                       <img src="images/Ndf4.jpg"/>
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
            <h5>Arizona, USA<span>.</span></h5>
            <h2>Page</h2>
            <div class="separator-container">
              <div class="separator line-separator">∎</div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="project-text">
              <p><span>Type</span>Canyon</p>
              <br>
              <p>Horseshoe Bend is a horseshoe-shaped incised meander of the Colorado River located near the town of Page, Arizona, United States. Horseshoe Bend is located 5 miles (8.0 km) downstream from the Glen Canyon Dam and Lake Powell within Glen Canyon National Recreation Area, about 4 miles (6.4 km) southwest of Page. It is accessible via hiking a 1.5-mile (2.4 km) round trip from a parking area just off U.S. Route 89 within southwestern Page. Horseshoe Bend is popular just before sunset, as large groups of tourists make the long 1/2 mile hike down to the over look point.</p>
              <p>Horseshoe Bend can be viewed from the steep cliff above. The overlook is 4,200 feet (1,300 m) above sea level, and the Colorado River is at 3,200 feet (980 m) above sea level, making it a 1,000-foot (300 m) drop.Recently, the lookout has become a major tourist destination. By 2018, references to the location on social media had caused the number of visitors to increase significantly.</p>
            </div>
          </div>
          <div class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                    <div class="project-image">
                       <img src="images/HsB1.jpg"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="project-image">
                       <img src="images/HsB2.jpg"/>
                    </div>
                </div>
                  <div class="col-md-6">
                    <div class="project-image">
                       <img src="images/HsB3.jpg"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="project-image">
                       <img src="images/HsB4.jpg"/>
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
            <h5>Kentucky, USA<span>.</span></h5>
            <h2>Devou Park</h2>
            <div class="separator-container">
              <div class="separator line-separator">∎</div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="project-text">
              <p><span>Type</span>Park</p>
              <br>
              <p>Devou Park is a city park in Covington, Kentucky. With 700 acres (280 ha), it is the city's largest park. The hilltop park's overlooks offer panoramic views of the Cincinnati skyline and the Ohio River valley below. It is the namesake of the nearby city of Park Hills.</p>
              <p>In 1910, William P. and Charles P. Devou donated to the city 500 acres (200 ha) of land for the establishment of the park, on the condition it be named in memory of their parents. Devou Park hosted an annual egg fight on Easter Sunday in the 1930s.</p>
              <p>The park contains nature trails, playgrounds, and an 18-hole golf course. The park's Behringer-Crawford Museum details the natural history of the area. The Drees Pavilion, a banquet hall, is located in Devou Park. All proceeds from the hall are donated for the park maintenance fund.</p>
            </div>
          </div>
          <div class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                    <div class="project-image">
                       <img src="images/dP1.jpg"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="project-image">
                       <img src="images/dP2.jpg"/>
                    </div>
                </div>
                  <div class="col-md-6">
                    <div class="project-image">
                       <img src="images/dP3.jpg"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="project-image">
                       <img src="images/dP4.jpg"/>
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

