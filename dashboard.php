<?php 
session_start();
include 'function.php';
if (!isset($_SESSION['login'])) {
  header('location:login.php');
  exit;
}
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
    <link rel="stylesheet" type="text/css" href="assets/css/mapsjs-ui.css" />
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
                      <div class="media-body"><span class="m-0">Earnings IDR</span>
                        <h4 class="mb-0 counter">6659</h4><i class="icon-bg" data-feather="dollar-sign"></i>
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
                        <h4 class="mb-0 counter">9856</h4><i class="icon-bg" data-feather="activity"></i>
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
                        <h4 class="mb-0 counter">3</h4><i class="icon-bg" data-feather="server"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-6">
                <div class="card">
                  <div class="card-body">
                    <?php $dev=query("SELECT * FROM board");?>
                    <?php foreach ($dev as $row) : ?>
                      <div class="row">
                        <div class="col-1 text-center">
                          <i class="icofont icofont-light-bulb" style="font-size: 2.5em;"></i>
                        </div>
                        <div class="col-8">
                          <div class="mt-2">
                            <h5>Lampu <?= $row['devname'];?></h5>
                          </div>
                        </div>
                        <div class="col-3 text-end">
                          <label class="switch">
                            <input id="" type="checkbox" data-bs-original-title="" title=""><span  class="switch-state"></span>
                          </label>
                        </div>
                      </div>
                      <hr>
                    <?php endforeach; ?>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header pb-0">
                    <h5>Marker on Map</h5>
                    <span>Display a ighting points of SPJU</span>
                  </div>
                  <div class="card-body">
                    <div class="map-js-height" id="map12"></div>
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
                            <th>Month</th>
                            <th>KWH</th>
                            <th>RP</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $list=query("SELECT * FROM sensor "); $i=1;?>
                          <?php foreach ($list as $row) : ?>
                          <tr>
                            <th>1</th>
                            <th>January</th>
                            <th>200</th>
                            <th>Rp. 120000</th>
                          </tr>
                          <tr>
                            <th>2</th>
                            <th>February</th>
                            <th>200</th>
                            <th>Rp. 120000</th>
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
                  Copyright 2021-22 © viho All rights reserved.
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
    <script src="assets/js/map-js/mapsjs-core.js"></script>
    <script src="assets/js/map-js/mapsjs-service.js"></script>
    <script src="assets/js/map-js/mapsjs-ui.js"></script>
    <script src="assets/js/map-js/mapsjs-mapevents.js"></script>
    <script src="assets/js/map-js/custom.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="assets/js/script.js"></script>
    <!-- login js-->
    <!-- Plugin used-->
  </body>
</html>
