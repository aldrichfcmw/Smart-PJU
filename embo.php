<?php
include 'function.php';
          $query = mysqli_query($koneksi,"SELECT * FROM board ORDER BY id ASC");
          while ($row = $query->fetch_assoc()) {
            $nama = $row["devname"];
            $lat  = $row["latitude"];
            $long = $row["longitude"];
            $status = $row["status"];
            if($status == 1){
              echo 
              "{
                position: new google.maps.LatLng(-33.91721, 151.2263),
                type: 'hidup',
              },";
            }elseif($status == 2){
              echo 
              "{
                position: new google.maps.LatLng(-33.91721, 151.2263),
                type: 'mati',
              },";
            }else{
              echo 
              "{
                position: new google.maps.LatLng(-33.91721, 151.2263),
                type: 'rusak',
              },";
            }
            
          }
          ?>