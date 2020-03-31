
<?php

include("Includes/ConnexionBase.php");

//$Compttaille = "SELECT COUNT(*) FROM Spot";
//$restaille = mysqli_query($connexion,$Compttaille);
//$taille = mysqli_fetch_array($restaille);

        $Compttaille = $bdd->prepare("SELECT * FROM Spot");
        $Compttaille->execute();
        $taille = $Compttaille->rowCount();
        $contenu = $Compttaille->fetchAll();
        
        //printf ($taille);

        //print_r($contenu);

        //printf($contenu[0][1]);
        //printf($contenu[1][1]);
        //printf($contenu[2][1]);

        //echo "test";

?>

<?php

      // Loop through markers
      for($i = 0; $i < $taille; $i++){
        for($j = 0; $j < 4; $j++){
        $someVar[$i][$j] = $contenu[$i][$j];
        //echo $someVar[$i][$j];
        }
      }

      // Loop through markers
      /*
      for($i = 0; $i < $taille; $i++){
        
          if($i!=$taille-1) { 
            $someVar[$i] = "{ coords:{lat:".$contenu[$i][2].",lng:".$contenu[$i][3]."} }";
          }

          if($i==$taille-1) { 
            $someVar[$i] = "{ coords:{lat:".$contenu[$i][2].",lng:".$contenu[$i][3]."} }";
          }
      }
      */

      for($i = 0; $i < $taille; $i++){
        
        //echo $someVar[$i];    

      }
      

        /*{
          coords:{lat:10,lng:12},
          content:"<h3></h3><img src=bali.jpg width=220 height=150>"
        }*/

//$contenu[1][1];
//echo $someVar;
















?>

<script>

    var taille = <?php echo $taille; ?>;
    //console.log(taille);

    var jArray = <?php echo json_encode($someVar); ?>;

    //display the list of spots
    for(var i=0; i<taille; i++){
      for(var j=0; j<4; j++){
        //document.write(jArray[i][j]);
      }
    }

    //document.write(jArray[0][2]);



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

    //var taille = <?php echo $taille; ?>;
    //console.log(taille);

    //var jArray = <?php echo json_encode($someVar); ?>;

    //display the list of spots
    for(var i=0; i<taille; i++){
      for(var j=0; j<4; j++){
        //document.write(jArray[i][j]);
      }
    }


      var markers = [
        {
          coords:{lat:10,lng:12},
          content:"<h3></h3><img src=bali.jpg width=220 height=150>"
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
        //document.write(markers[i]);
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
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB91h9BpEs5-9q6x1eYvQo-YpIyoXlGyNU&callback=initMap">
    </script>