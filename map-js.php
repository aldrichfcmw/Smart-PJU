<?php
include 'function.php';
?>
<html>
  <head>
    <title>Custom Markers</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <style>
      /* 
 * Always set the map height explicitly to define the size of the div element
 * that contains the map. 
 */
      #map {
        height: 100px;
        width: 400px;
      }

      /* 
 * Optional: Makes the sample page fill the window. 
 */

    </style>
  </head>
  <body>
    <div id="map"></div>

    <!-- 
     The `defer` attribute causes the callback to execute after the full HTML
     document has been parsed. For non-blocking uses, avoiding race conditions,
     and consistent behavior across browsers, consider loading using Promises
     with https://www.npmjs.com/package/@googlemaps/js-api-loader.
    -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC48alJp8XSkKvW-FPC5hDN4Rzyv91puyw&callback=initMap&v=weekly"
      defer
    ></script>
    <script>
      let map;

      function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
          center: new google.maps.LatLng(-33.91722, 151.23064),
          zoom: 16,
        });

        const icons = {
          hidup: {
            icon: "assets/images/icon/light-bulb-on.png",
          },
          mati: {
            icon: "assets/images/icon/light-bulb-off.png",
          },
          rusak: {
            icon: "assets/images/icon/light-bulb-err.png",
          },
        };
        const features = [
          <?php
          $query = mysqli_query($koneksi,"SELECT * FROM board ORDER BY id ASC");
          while ($row = $query->fetch_assoc()) {
            $nama = $row["devname"];
            $lat  = $row["latitude"];
            $long = $row["longitude"];
            $status = $row["status"];
            if($status == 0){
              echo 
              "{
                position: new google.maps.LatLng($lat,$long),
                type: 'hidup',
              },";
            }elseif($status == 1){
              echo 
              "{
                position: new google.maps.LatLng($lat,$long),
                type: 'mati',
              },";
            }else{
              echo 
              "{
                position: new google.maps.LatLng($lat,$long),
                type: 'rusak',
              },";
            }
            
          }
          ?> 
        ];

        // Create markers.
        for (let i = 0; i < features.length; i++) {
          const marker = new google.maps.Marker({
            position: features[i].position,
            icon: icons[features[i].type].icon,
            map: map,
          });
        }
      }

      window.initMap = initMap;
    </script>
  </body>
</html>
