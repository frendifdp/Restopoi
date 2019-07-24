<!DOCTYPE html>
<html style="height: auto; min-height: 100%;"><head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>RestoPoi</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/skins/skin-blue.min.css">
</head>
<body class="skin-blue sidebar-mini fixed" style="height: auto; min-height: 100%;">
  <div class="wrapper" style="height: auto; min-height: 100%;">

    <!-- Main Header -->
    <header class="main-header">

      <!-- Logo -->
      <a href="<?=base_url()?>pelanggan.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>R</b>P</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Resto</b>Poi</span>
      </a>

      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="<?=base_url()?>assets/#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="<?=base_url()?>assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"><?=ucwords($nama)?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="<?=base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                  <p>
                    <?=ucwords($nama)?>
                    <small><?=$level?></small>
                  </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">
                  <div class="row">
                  </div>
                  <!-- /.row -->
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <!-- <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                  </div> -->
                  <div class="pull-right">
                    <a href="<?=base_url()?>logout.html/" class="btn btn-default btn-flat">Logout</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->

          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="<?=base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?=ucwords($nama)?></p>
            <!-- Status -->
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu tree" data-widget="tree">
          <?php if($level=="Administrator"){?>
          <li <?php if($menu=='pengguna') echo 'class="active"';?>><a href="<?=base_url()?>pengguna.html/"><i class="fa fa-group"></i> <span>Daftar Pengguna</span></a></li>
          <li <?php if($menu=='masakan') echo 'class="active"';?>><a href="<?=base_url()?>masakan.html/"><i class="fa fa-spoon"></i> <span>Daftar Masakan</span></a></li>
          <li <?php if($menu=='meja') echo 'class="active"';?>><a href="<?=base_url()?>meja.html/"><i class="fa fa-table"></i> <span>Daftar Meja</span></a></li>
          <li <?php if($menu=='kasir') echo 'class="active"';?>><a href="<?=base_url()?>kasir.html/"><i class="fa fa-credit-card"></i> <span>Kasir</span></a></li>
          <li <?php if($menu=='laporan') echo 'class="active"';?>><a href="<?=base_url()?>laporan.html/"><i class="fa fa-book"></i> <span>Laporan</span></a></li>
          <li><a href="<?=base_url()?>registrasi.html/"><i class="fa fa-user"></i> <span>Registrasi</span></a></li>
          <?php } ?>
          <?php if($level=="Kasir"){ ?>
          <li <?php if($menu=='kasir') echo 'class="active"';?>><a href="<?=base_url()?>kasir.html/"><i class="fa fa-list"></i> <span>Kasir</span></a></li>
          <?php } ?>
          <?php if($level=="Owner"){ ?>
          <li <?php if($menu=='laporan') echo 'class="active"';?>><a href="<?=base_url()?>laporan.html/"><i class="fa fa-credit-card"></i> <span>Laporan</span></a></li>
          <?php } ?>
        </ul>
        <!-- /.sidebar-menu -->
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 570px;">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <?=ucwords($menu)?>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> <?=$level?></a></li>
          <li class="active"><?=ucwords($menu)?></li>
        </ol>
      </section>