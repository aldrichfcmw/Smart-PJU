<!-- Page Sidebar Start-->
<header class="main-nav">
    <div class="sidebar-user text-center"><a class="setting-primary" href="javascript:void(0)"><i data-feather="settings"></i></a><img class="img-90 rounded-circle" src="assets/images/dashboard/1.png" alt="">
      <div class="badge-bottom"><span class="badge badge-primary">New</span></div><a href="user-profile.php">
        <h6 class="mt-3 f-14 f-w-600"><?php echo $_SESSION["name"]; ?></h6></a>
      <p class="mb-0 font-roboto">Electrical Resources Department</p>
    </div>
    <nav>
      <div class="main-navbar">
        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
        <div id="mainnav">           
          <ul class="nav-menu custom-scrollbar">
            <li class="back-btn">
              <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
            </li>
            <li class="sidebar-main-title">
              <div>
                <h6>General</h6>
              </div>
            </li>
            <li class="dropdown"><a class="nav-link menu-title link-nav" href="dashboard.php"><i data-feather="home"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="sliders"></i><span>Panel Controls                </span></a>
              <ul class="nav-submenu menu-content">
                <li><a href="device.php">Device</a></li>
                <li><a class="submenu-title" href="javascript:void(0)">Setting Device<span class="sub-arrow"><i class="fa fa-chevron-right"></i></span></a>
                  <ul class="nav-sub-childmenu submenu-content">
                    <?php $listsub = query("SELECT * FROM board ORDER BY id"); ?>
                    <?php foreach ($listsub as $row) : ?>
                    <li><a href="devdetail.php?devui=<?= $row['devui']; ?>"><?= $row['devname']; ?></a></li>
                    <?php endforeach;?>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
      </div>
    </nav>
  </header>
  <!-- Page Sidebar Ends-->