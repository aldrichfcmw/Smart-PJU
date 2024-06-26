<?php 
session_start();
include 'function.php';
if (!isset($_SESSION['login'])) {
  header('location:login.php');
  exit;
}
$dev=mysqli_query($koneksi,"SELECT * FROM board");
$jumlah_dev = mysqli_num_rows($dev);
$kwh=query_r("SELECT SUM(energi)as energi FROM electricity WHERE EXTRACT(month FROM date) = $month");
$biaya=query_r("SELECT SUM(biaya)as energi FROM electricity WHERE EXTRACT(month FROM date) = $month");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon" />
    <link
      rel="shortcut icon"
      href="assets/images/favicon.png"
      type="image/x-icon"
    />
    <title><?= $title ?> - Dashboard</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
      rel="stylesheet"
    />
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="assets/css/fontawesome.css" />
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="assets/css/icofont.css" />
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="assets/css/feather-icon.css" />
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/css/datatables.css">
    <link rel="stylesheet" type="text/css" href="assets/css/datatable-extension.css">
    <link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.1/mapsjs-ui.css" />
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" />
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <link id="color" rel="stylesheet" href="assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css" />
  </head>
  <body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
      <div class="theme-loader">
        <div class="loader-p"></div>
      </div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper" id="pageWrapper">
      <?php include 'topnav.blade.php'?>
      <!-- Page Body Start-->
      <div class="page-body-wrapper horizontal-menu">
        <?php include 'sidenav.blade.php'?>
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-lg-6">
                  <h3>Dashboard</h3>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6 col-xl-4 col-lg-6">
                <div class="card o-hidden border-0">
                  <div class="bg-primary b-r-4 card-body">
                    <div class="media static-top-widget">
                      <div class="align-self-center text-center"><i data-feather="dollar-sign"></i></div>
                      <div class="media-body"><span class="m-0">Cost IDR</span>
                        <h4 class="mb-0 counter"><?= $biaya[0]; ?></h4><i class="icon-bg" data-feather="dollar-sign"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-xl-4 col-lg-6">
                <div class="card o-hidden border-0">
                  <div class="bg-secondary b-r-4 card-body">
                    <div class="media static-top-widget">
                      <div class="align-self-center text-center"><i data-feather="activity"></i></div>
                      <div class="media-body"><span class="m-0">KWh</span>
                        <h4 class="mb-0 counter"><?= $kwh[0]; ?></h4><i class="icon-bg" data-feather="activity"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-xl-4 col-lg-6">
                <div class="card o-hidden border-0">
                  <div class="bg-primary b-r-4 card-body">
                    <div class="media static-top-widget">
                      <div class="align-self-center text-center"><i data-feather="server"></i></div>
                      <div class="media-body"><span class="m-0">Dev Kit Boards</span>
                        <h4 class="mb-0 counter"><?= $jumlah_dev?></h4><i class="icon-bg" data-feather="server"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-6">  
                <div class="card">
                  <div class="card-header pb-0">
                    <h5>Marker on Map</h5>
                    <span>Display a lighting points of SPJU</span>
                  </div>
                  <div class="card-body">
                    <div class="map-js-height" id="map"></div>
                  </div>
                </div>
              </div>
              <div class="col-xl-6">
                <div class="card">
                  <div class="card-body">
                    <div class="text-center">
                      <h5>Data KWh Tiap Bulan</h5>
                    </div>
                    <div class="dt-ext table-responsive">
                      <table class="display" id="excel-cust-bolder">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Date</th>
                            <th>KWH</th>
                            <th>RP</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $list=query("SELECT * FROM electricity WHERE type='monthly' "); $i=1;?>
                          <?php foreach ($list as $row) : ?>
                          <tr>
                            <th><?= $i++ ?></th>
                            <th><?= $row['date'] ?></th>
                            <th><?= $row['energi'] ?></th>
                            <th><?= $row['biaya'] ?></th>
                          </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
        <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 footer-copyright">
                <p class="mb-0">
                  Copyright 2021-22 © SPJU All rights reserved.
                </p>
              </div>
              <div class="col-md-6">
                <p class="pull-right mb-0">
                  Hand crafted & made with
                  <i class="fa fa-heart font-secondary"></i>
                </p>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- latest jquery-->
    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <!-- feather icon js-->
    <script src="assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- Sidebar jquery-->
    <script src="assets/js/sidebar-menu.js"></script>
    <!-- Bootstrap js-->
    <script src="assets/js/bootstrap/popper.min.js"></script>
    <script src="assets/js/bootstrap/bootstrap.min.js"></script>
    <!-- Plugins JS start-->
    <script src="assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/js/datatable/datatable-extension/dataTables.buttons.min.js"></script>
    <script src="assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/datatable/datatable-extension/dataTables.responsive.min.js"></script>
    <script src="assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js"></script>
    <script src="assets/js/datatable/datatable-extension/jszip.min.js"></script>
    <script src="assets/js/datatable/datatable-extension/vfs_fonts.js"></script>
    <script src="assets/js/datatable/datatable-extension/buttons.html5.min.js"></script>
    <script src="assets/js/datatable/datatable-extension/buttons.print.min.js"></script>
    <script src="assets/js/datatable/datatable-extension/custom.js"></script>
    <script src="https://js.api.here.com/v3/3.1/mapsjs-core.js"></script>
    <script src="https://js.api.here.com/v3/3.1/mapsjs-service.js"></script>
    <script src="https://js.api.here.com/v3/3.1/mapsjs-ui.js"></script>
    <script src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js"></script>
    <script>
      var platform = new H.service.Platform({
            apikey: 'pHBXcIXvPkwJ0tIEVe_P-lg6YPFwaVNEg9oLWCjRoyQ'
        });
      var defaultLayers = platform.createDefaultLayers();;
      var map = new H.Map(document.getElementById('map'),
            defaultLayers.vector.normal.map,
            {
                center: { lat: -7.276, lng: 112.79315 },
                zoom: 18,
                pixelRatio: window.devicePixelRatio || 1
            }
        );
      window.addEventListener("resize", () => map.getViewPort().resize());
      var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));
      var ui = H.ui.UI.createDefault(map, defaultLayers);
      var bulb_err = new H.map.Icon("assets/images/icon/light-bulb-err.png", );
      var bulb_off = new H.map.Icon("assets/images/icon/light-bulb-off.png", );
      var bulb_on = new H.map.Icon("assets/images/icon/light-bulb-on.png", );
      $.ajax({
          type: "POST",
          url: "api.php",
          data: {
            marker:true,
          },
          success: function (result) {
            json = JSON.parse(result);
            for(let i=0;i<=json.length;i++){
              if(json[i].status==2){
                var marker = new H.map.Marker({ lat: json[i].latitude, lng: json[i].longitude },{ icon:bulb_err });
                map.addObject(marker);
              }
              if(json[i].status==1){
                var marker = new H.map.Marker({ lat: json[i].latitude, lng: json[i].longitude },{ icon:bulb_on });
                map.addObject(marker);
              }
              if(json[i].status==0){
                var marker = new H.map.Marker({ lat: json[i].latitude, lng: json[i].longitude },{ icon:bulb_off });
                map.addObject(marker);
              }
            }
          },
      });
    </script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="assets/js/script.js"></script>
    <!-- login js-->
    <!-- Plugin used-->                     
  </body>
</html>
