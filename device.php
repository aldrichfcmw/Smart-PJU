<?php 
session_start();
require 'function.php';
if (!isset($_SESSION['login'])) {
  header('location:login.php');
  exit;
}
if (isset($_GET['del_board'])){
  $id_board = $_GET['del_board'];
  if (hapus($_GET) > 0) {
      echo "<script>
                  alert('Data berhasil dihapus!');
                  document.location.href = 'device';
              </script>";
  } else {
      echo "<script>
              alert('Data gagal dihapus!');
          </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
    <title><?= $title ?> - Device</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="assets/css/fontawesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="assets/css/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="assets/css/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="assets/css/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="assets/css/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="assets/css/prism.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link id="color" rel="stylesheet" href="assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
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
                <div class="col">
                  <h3>Device</h3>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Device</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row project-cards">
              <div class="col-md-12 project-list">
                <div class="card">
                  <div class="row">
                    <div class="col-md-9 p-0">
                      <ul class="nav nav-tabs border-tab" id="top-tab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="top-home-tab" data-bs-toggle="tab" href="#top-home" role="tab" aria-controls="top-home" aria-selected="true"><i data-feather="target"></i>All</a></li>
                        <li class="nav-item"><a class="nav-link" id="arduino-top-tab" data-bs-toggle="tab" href="#top-arduino" role="tab" aria-controls="top-profile" aria-selected="false"><i data-feather="info"></i>Arduino</a></li>
                        <li class="nav-item"><a class="nav-link" id="esp32-top-tab" data-bs-toggle="tab" href="#top-esp32" role="tab" aria-controls="top-contact" aria-selected="false"><i data-feather="check-circle"></i>ESP-32</a></li>
                        <li class="nav-item"><a class="nav-link" id="lora-top-tab" data-bs-toggle="tab" href="#top-lora" role="tab" aria-controls="top-contact" aria-selected="false"><i data-feather="check-circle"></i>Lo-Ra</a></li>
                      </ul>
                    </div>
                    <div class="col-md-3 p-0">                    
                      <div class="form-group mb-0 me-0"></div><a class="btn btn-primary" href="addboard.php"> <i data-feather="plus-square"> </i>Add New Device</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-body">
                    <div class="tab-content" id="top-tabContent">
                      
                      <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                        <div class="row">

                          <?php $board = query("SELECT * FROM board ORDER BY id"); ?>
                          <?php foreach ($board as $row) : ?>
                            <div class="col-xxl-4 col-lg-6">
                              <div class="project-box">
                                <span class="badge
                                  <?php 
                                    if($row['typedev']=="Arduino") { echo "badge-secondary"; }
                                    elseif($row['typedev']=="ESP-32") { echo "badge-primary";}
                                    else{ echo "badge-info";}
                                  ;?>" > <?= $row['typedev']; ?>
                                </span>
                                <h6><?= $row['devname']; ?></h6>
                                <div class="media">
                                  <div class="media-body">
                                    <span><?= $row['latitude'].' , '.$row['longitude']; ?></span>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col">
                                    <div class="text-end">
                                      <a class="btn btn-danger" href="device.php?del_board=<?= $row['id']; ?>" target="_self" rel="noopener noreferrer" onclick="return confirm('Hapus barang <?= $row['devname']; ?>?')">Delete</a>
                                      <a class="btn btn-light" href="devdetail.php?devui=<?= $row['devui']; ?>" target="_self" rel="noopener noreferrer">Detail</a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          <?php endforeach; ?>  


                        </div>
                      </div>

                      <div class="tab-pane fade" id="top-arduino" role="tabpanel" aria-labelledby="profile-top-tab">
                        <div class="row">
                          
                          <?php $board = query("SELECT * FROM board WHERE typedev='Arduino' ORDER BY id"); ?>
                          <?php foreach ($board as $row) : ?>
                            <div class="col-xxl-4 col-lg-6">
                              <div class="project-box"><span class="badge badge-secondary"><?= $row['typedev']; ?></span>
                                <h6><?= $row['devname']; ?></h6>
                                <div class="media">
                                  <div class="media-body">
                                    <span><?= $row['latitude'].' , '.$row['longitude']; ?></span>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col">
                                    <div class="text-end">
                                      <a class="btn btn-danger" href="device.php?del_board=<?= $row['id']; ?>" target="_self" rel="noopener noreferrer" onclick="return confirm('Hapus barang <?= $row['devname']; ?>?')">Delete</a>
                                      <a class="btn btn-light" href="devdetail.php?devui=<?= $row['devui']; ?>" target="_self" rel="noopener noreferrer">Detail</a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          <?php endforeach; ?> 
  
                          
                        </div>
                      </div>
                      <div class="tab-pane fade" id="top-esp32" role="tabpanel" aria-labelledby="contact-top-tab">
                        <div class="row">

                          <?php $board = query("SELECT * FROM board WHERE typedev='ESP-32' ORDER BY id"); ?>
                          <?php foreach ($board as $row) : ?>
                            <div class="col-xxl-4 col-lg-6">
                              <div class="project-box"><span class="badge badge-primary"><?= $row['typedev']; ?></span>
                                <h6><?= $row['devname']; ?></h6>
                                <div class="media">
                                  <div class="media-body">
                                    <span><?= $row['latitude'].' , '.$row['longitude']; ?></span>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col">
                                    <div class="text-end">
                                      <a class="btn btn-danger" href="device.php?del_board=<?= $row['id']; ?>" target="_self" rel="noopener noreferrer" onclick="return confirm('Hapus barang <?= $row['devname']; ?>?')">Delete</a>
                                      <a class="btn btn-light" href="devdetail.php?devui=<?= $row['devui']; ?>" target="_self" rel="noopener noreferrer">Detail</a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          <?php endforeach; ?>
                          
                          
                        </div>
                      </div>

                      <div class="tab-pane fade" id="top-lora" role="tabpanel" aria-labelledby="contact-top-tab">
                        <div class="row">

                        <?php $board = query("SELECT * FROM board WHERE typedev='Lo-Ra' ORDER BY id"); ?>
                          <?php foreach ($board as $row) : ?>
                            <div class="col-xxl-4 col-lg-6">
                              <div class="project-box"><span class="badge badge-info"><?= $row['typedev']; ?></span>
                                <h6><?= $row['devname']; ?></h6>
                                <div class="media">
                                  <div class="media-body">
                                    <span><?= $row['latitude'].' , '.$row['longitude']; ?></span>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col">
                                    <div class="text-end">
                                      <a class="btn btn-danger" href="device.php?del_board=<?= $row['id']; ?>" target="_self" rel="noopener noreferrer" onclick="return confirm('Hapus barang <?= $row['devname']; ?>?')">Delete</a>
                                      <a class="btn btn-light" href="devdetail.php?devui=<?= $row['devui']; ?>" target="_self" rel="noopener noreferrer">Detail</a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          <?php endforeach; ?>
                          
                          
                        </div>
                      </div>

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
                <p class="mb-0">Copyright 2021-22 © viho All rights reserved.</p>
              </div>
              <div class="col-md-6">
                <p class="pull-right mb-0">Hand crafted & made with <i class="fa fa-heart font-secondary"></i></p>
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
    <script src="assets/js/config.js"></script>
    <!-- Bootstrap js-->
    <script src="assets/js/bootstrap/popper.min.js"></script>
    <script src="assets/js/bootstrap/bootstrap.min.js"></script>
    <!-- Plugins JS start-->
    <script src="assets/js/prism/prism.min.js"></script>
    <script src="assets/js/clipboard/clipboard.min.js"></script>
    <script src="assets/js/custom-card/custom-card.js"></script>
    <script src="assets/js/height-equal.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="assets/js/script.js"></script>
    <!-- login js-->
    <!-- Plugin used-->
  </body>
</html>