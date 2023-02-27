<?php 
session_start();
include 'function.php';
if (!isset($_SESSION['login'])) {
  header('location:login.php');
  exit;
}
$ui=$_GET['devui'];
$data=query("SELECT * FROM sensor WHERE devui='$ui' ORDER BY date DESC")[0];
$dev=query("SELECT * FROM board WHERE devui='$ui'")[0];
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
    <title><?= $title ?> - Device Detail</title>
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
                <div class="col-sm-6 mb-4">
                  <h3>Device Detail</h3>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="device.php">Device</a></li>
                    <li class="breadcrumb-item"><a href="devdetail.php">Device Detail</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)"><?= $dev['devname']; ?></a></li>
                  </ol>
                </div>
                <div class="col-sm-6">
                  <div class="bg-white">
                    <div class="row p-4">
                      <table>
                        <tr>
                          <th><span>Name</span></th>
                          <th><span>:</span></th>
                          <th><span><?= $dev['devname']; ?></span></th>
                        </tr>
                        <tr>
                          <th><span>API</span></th>
                          <th><span>:</span></th>
                          <th><span><?= $dev['devui']; ?></span></th>
                        </tr>
                      </table>
                    </div>
                    
                  </div>
                  
                  <!-- <div class="row">
                    <div class="col-3">
                      <span>Name</span><br>
                      <span>API</span>
                    </div>
                    <div class="col-8">
                      <span>: <?= $dev['devname']; ?></span><br>
                      <span>: <?= $dev['devui']; ?></span>
                    </div>                   
                  </div> -->
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
            <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden border-0">
                  <div class="bg-warning b-r-4 card-body">
                    <div class="media static-top-widget">
                      <div class="align-self-center text-center"><i data-feather="sun"></i></div>
                      <div class="media-body"><span class="m-0">Cahaya</span>
                        <h4 class="mb-0 counter"><?= $data['cahaya']; ?></h4><i class="icon-bg" data-feather="sun"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden border-0">
                  <div class="bg-info b-r-4 card-body">
                    <div class="media static-top-widget">
                      <div class="align-self-center text-center"><i data-feather="zap"></i></div>
                      <div class="media-body"><span class="m-0">Tegangan</span>
                        <h4 class="mb-0 counter"><?= $data['tegangan']; ?></h4><i class="icon-bg" data-feather="zap"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden border-0">
                  <div class="bg-primary b-r-4 card-body">
                    <div class="media static-top-widget">
                      <div class="align-self-center text-center"><i data-feather="activity"></i></div>
                      <div class="media-body"><span class="m-0">Arus</span>
                        <h4 class="mb-0 counter"><?= $data['arus']; ?></h4><i class="icon-bg" data-feather="activity"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden border-0">
                  <div class="bg-secondary b-r-4 card-body">
                    <div class="media static-top-widget">
                      <div class="align-self-center text-center"><i data-feather="thermometer"></i></div>
                      <div class="media-body"><span class="m-0">Suhu</span>
                        <h4 class="mb-0 counter"><?= $data['suhu']; ?></h4><i class="icon-bg" data-feather="thermometer"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-6">
                <div class="card card-absolute">
                  <div class="card-header bg-primary">
                    <h5 class="text-white"><?= $dev['devname'];?></h5>
                  </div>
                  <div class="card-body text-center">
                    <table class="display" style="width:100%;" border="0">
                      <tr>
                        <th><i class="icofont icofont-light-bulb" style="font-size: 2.5em;"></i></th>
                        <th><h5 class="mt-2">Lampu</h5></th>
                        <th colspan="3">
                          <form method="post" id="toggleForm">
                            <label class="switch mt-2">
                              <input id="customSwitch1" type="checkbox" data-bs-original-title="" title=""><span  class="switch-state"></span>
                            </label>
                          </form>
                        </th>
                      </tr>
                      <tr height="55px">
                        <th><i class="icofont icofont-sun" style="font-size: 2.5em;"></i></th>
                        <th><h5 class="mt-2">Sensitivitas</h5></th>
                        <th>
                          <button class="btn-md rounded btn-primary" id="minusBtnLux"><i class="icofont icofont-minus-circle" style="font-size: 1.2em;"></i></button>  
                        </th>
                        <th width="30px">
                          <label class="ml-3" id="sensiLux" ></label>
                        </th>
                        <th>
                          <button class="btn-md rounded btn-primary" id="plusBtnLux"><i class="icofont icofont-plus-circle" style="font-size: 1.2em;"></i></button>
                        </th>
                      </tr>
                      <tr height="55px">
                        <th><i class="icofont icofont-flash" style="font-size: 2.5em;"></i></th>
                        <th><h5 class="mt-2">Sensitivitas</h5></th>
                        <th>
                          <button class="btn-md rounded btn-primary" id="minusBtnElec"><i class="icofont icofont-minus-circle" style="font-size: 1.2em;"></i></button>  
                        </th>
                        <th width="30px">
                          <label class="ml-3" id="sensiElec"></label>
                        </th>
                        <th>
                          <button class="btn-md rounded btn-primary" id="plusBtnElec"><i class="icofont icofont-plus-circle" style="font-size: 1.2em;"></i></button>
                        </th>
                      </tr>
                    </table>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header pb-0">
                    <h5>Marker on Map</h5>
                    <span>Display a ighting points of SPJU</span>
                  </div>
                  <div class="card-body">
                    <div class="map-js-height" id="maps"></div>
                  </div>
                </div>
              </div>
              <div class="col-xl-6">
                <div class="card">
                  <div class="card-body">
                    <div class="text-center">
                      <h5>Data Sensor <?= $dev['devname']; ?></h5>
                    </div>
                    <div class="dt-ext table-responsive">
                      <table class="display" id="excel-cust-bolder">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Cahaya</th>
                            <th>Suhu</th>
                            <th>Tegangan</th>
                            <th>Arus</th>
                            <th>kWh</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $list=query("SELECT * FROM sensor WHERE devui='$ui' ORDER BY date DESC"); $i=1;?>
                          <?php foreach ($list as $row) : ?>
                          <tr>
                            <th><?= $i++ ?></th>
                            <th><?= $row['date']; ?></th>
                            <th><?= $row['time']; ?></th>
                            <th><?= $row['cahaya']; ?></th>
                            <th><?= $row['suhu']; ?></th>
                            <th><?= $row['tegangan']; ?></th>
                            <th><?= $row['arus']; ?></th>
                            <th><?= $row['kwh']; ?></th>
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
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="assets/js/script.js"></script>

    <!-- login js-->
    <!-- Plugin used-->
    <script>
      function putStatus() {
        $.ajax({
          type: "GET",
          url: "api.php",
          data: {
            toggle_select: true,
            api: "<?= $ui;?>",
          },
          success: function (result) {
            //alert(result);
            if (result == 1) {
              $("#customSwitch1").prop("checked", true);
            } else if (result == 2) {
              $("#customSwitch1").prop("checked", false);
              alert("PJU Terdapat Masalah");
            } else {
              $("#customSwitch1").prop("checked", false);
            }
          },
          error: function () {
            alert("error");
          },
        });
      }

      function putSensiLux() {
        $.ajax({
            type: "GET",
            url: "api.php",
            data: {
                sensi_lux: true,
                api:'<?= $ui;?>',
            },
            success: function (result) {
                //alert(result);
                sensiLux(result);
            }
        });
      }

      function putSensiElec() {
        $.ajax({
            type: "GET",
            url: "api.php",
            data: {
                sensi_elec: true,
                api:'<?= $ui;?>',
            },
            success: function (result) {
                //alert(result);
                sensiElec(result);
            }
        });
      }

      function sensiLux(sensi_val) {
        var sensi_str = sensi_val;
        document.getElementById("sensiLux").innerText = sensi_str;
      }

      function sensiElec(sensi_val) {
        var sensi_str = sensi_val;
        document.getElementById("sensiElec").innerText = sensi_str;
      }

      function onToggle() {
        $("#toggleForm :checkbox").change(function () {
          if (this.checked) {
            updateStatus(1);
          } else {
            updateStatus(0);
          }
        });

        $("#minusBtnLux").click(function(e) {
            var sensi_lux = document.getElementById("sensiLux").innerText;
            sensi_lux = sensi_lux-1;
            if(sensi_lux < 0){
              alert("Mohon maaf batas sensitivitas hanya 0-5");
            }else{
              sensiLux(sensi_lux);
              updateSensiLux(sensi_lux);
            }
        });

        $("#plusBtnLux").click(function(e) {
            var sensi_lux = document.getElementById("sensiLux").innerText;
            sensi_lux++;
            if(sensi_lux > 5){
              alert("Mohon maaf batas sensitivitas hanya 0-5");
            }else{
              sensiLux(sensi_lux);
              updateSensiLux(sensi_lux);
            }
        });

        $("#minusBtnElec").click(function(e) {
            var sensi_elec = document.getElementById("sensiElec").innerText;
            sensi_elec = sensi_elec-1;
            if(sensi_elec < 0){
              alert("Mohon maaf batas sensitivitas hanya 0-30");
            }else{
              sensiElec(sensi_elec);
              updateSensiElec(sensi_elec);
            }
        });

        $("#plusBtnElec").click(function(e) {
            var sensi_elec = document.getElementById("sensiElec").innerText;
            sensi_elec++;
            if(sensi_elec > 30){
              alert("Mohon maaf batas sensitivitas hanya 0-30");
            }else{
              sensiElec(sensi_elec);
              updateSensiElec(sensi_elec);
            }
        });
      }

      function updateStatus(status_val) {
        $.ajax({
          type: "POST",
          url: "api.php",
          data: {
            toggle_update: true,
            status: status_val,
            api: "<?= $ui;?>",
          },
          success: function (result) {
            console.log(result);
          },
        });
      }

      function updateSensiLux(sensi_val) {
        $.ajax({
            type: "POST",
            url: "api.php",
            data: {
                sensi_up_lux: true, 
                sensi: sensi_val,
                api:'<?= $ui;?>'
            },
            success: function (result) {
                console.log(result);
            }
        });
      }

      function updateSensiElec(sensi_val) {
        $.ajax({
            type: "POST",
            url: "api.php",
            data: {
                sensi_up_elec: true, 
                sensi: sensi_val,
                api:'<?= $ui;?>'
            },
            success: function (result) {
                console.log(result);
            }
        });
      }

      function maps(){
        var platform = new H.service.Platform({
            apikey: 'pHBXcIXvPkwJ0tIEVe_P-lg6YPFwaVNEg9oLWCjRoyQ'
        });
        var defaultLayers = platform.createDefaultLayers();;
        var map = new H.Map(document.getElementById('maps'),
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
        var bulb_err = new H.map.Icon("assets/images/icon/light-bulb-err.png", { size: { w: 56, h: 56 } });
        var bulb_off = new H.map.Icon("assets/images/icon/light-bulb-off.png", { size: { w: 56, h: 56 } });
        var bulb_on = new H.map.Icon("assets/images/icon/light-bulb-on.png", { size: { w: 56, h: 56 } });
        $.ajax({
            type: "POST",
            url: "api.php",
            data: {
              permarker:true,
              api: '<?= $ui;?>',
            },
            success: function (result) {
              json = JSON.parse(result);
              if(json.status==2){
                var marker = new H.map.Marker({ lat: json.latitude, lng: json.longitude },{ icon:bulb_err });
                map.addObject(marker);
              }
              if(json.status==1){
                var marker = new H.map.Marker({ lat: json.latitude, lng: json.longitude },{ icon:bulb_on });
                map.addObject(marker);
              }
              if(json.status==0){
                var marker = new H.map.Marker({ lat: json.latitude, lng: json.longitude },{ icon:bulb_off });
                map.addObject(marker);
              }
            },
        });
        map.setCenter(marker)
      }

      $(document).ready(function () {
          //Called on page load:
          putStatus();
          putSensiLux();
          putSensiElec();
          onToggle();
          sensiLux();
          sensiElec();
          maps();
      });
    </script>
  </body>
</html>
