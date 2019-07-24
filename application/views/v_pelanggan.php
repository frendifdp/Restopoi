<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>RestoPoi</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/skins/_all-skins.min.css">
   <style>
   img {
    width:100%;
  }
</style>
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-black layout-top-nav fixed">
  <div class="wrapper">
    <header class="main-header">
      <nav class="navbar navbar-static-top" style="">
        <div class="container">
          <div class="navbar-header">
            <a href="<?=base_url()?>pelanggan.html/" class="navbar-brand"><b>El</b>Resto</a>
            <a href="<?=base_url()?>pelanggan.html/" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse"><b>El</b>Resto</a>
          </div>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown tasks-menu">
                <a href="<?=base_url()?>assets/#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-shopping-cart"></i>
                  <span class="label label-danger" id="tt">0</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">Pesanan anda</li>
                  <li>
                    <form action="<?=base_url()?>pelanggan/order/" method="POST">
                      <ul class="menu" id="list_menu">
                      <!-- <li>
                        Es Teh Panas
                        <div class="pull-right">
                          <button class="btn btn-sm btn-warning"><i class="fa fa-minus"></i></button>
                        </div>
                      </li> -->
                    </ul>
                  </li>
                  <li class="footer">
                    <button type="submit" class="btn btn-flat btn-success btn-sm btn-block"><i class="fa fa-download"></i> Pesan</button>
                  </form>
                </li>
              </ul>
            </li>
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="<?=base_url()?>assets/#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="<?=base_url()?>assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"><?=$nama?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="<?=base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                  <p>
                    <?=$nama?>
                    <small><?=$level?></small>  
                  </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-right">
                    <a href="<?=base_url()?>logout.html/" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Content Header (Page header) -->
      <section class="content-header" style="padding: 0px">
        <div class="row">
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
              <li data-target="#carousel-example-generic" data-slide-to="1" class="active"></li>
              <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
            </ol>
            <div class="carousel-inner">
              <div class="item">
                <img src="<?=base_url()?>assets/dist/img/photo1.png" alt="First slide">

                <div class="carousel-caption">
                  First Slide
                </div>
              </div>
              <div class="item active">
                <img src="<?=base_url()?>assets/dist/img/photo2.png" alt="Second slide">

                <div class="carousel-caption">
                  Second Slide
                </div>
              </div>
              <div class="item">
                <img src="<?=base_url()?>assets/dist/img/photo3.jpg" alt="Third slide">

                <div class="carousel-caption">
                  Third Slide
                </div>
              </div>
            </div>
            <a class="left carousel-control" href="<?=base_url()?>assets/#carousel-example-generic" data-slide="prev">
              <span class="fa fa-angle-left"></span>
            </a>
            <a class="right carousel-control" href="<?=base_url()?>assets/#carousel-example-generic" data-slide="next">
              <span class="fa fa-angle-right"></span>
            </a>
          </div>
        </div>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Daftar Menu Makanan</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="box-body">
                <?php foreach($makanan as $row){ ?>
                  <div class="col-md-3">
                    <div class="box box-default">
                      <div class="box-header with-border">
                        <h3 id="nm_<?=$row->id_masakan?>" class="box-title"><?=$row->nama_masakan?></h3>
                      </div>
                      <div class="box-body">
                        <img style="width: 151px; height: 151px;" src="<?=base_url().'gambar/'.$row->gambar_masakan?>" class="img-responsive img-rounded">
                        <br>
                        <label>Rp <?=$row->harga_masakan?>,00</label>
                      </div>
                      <div class="box-footer">
                        <div class="form-group">
                          <button onclick="add_to(<?=$row->id_masakan?>)" class="btn btn-success btn-block"><i class="fa fa-arrow-down"></i> Add to chart</button>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
            <div class="box box-primary collapsed-box">
              <div class="box-header with-border">
                <h3 class="box-title">Daftar Menu Minuman</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                  </button>
                </div>
              </div>
              <div class="box-body">
                <?php foreach($minuman as $row){ ?>
                  <div class="col-md-3">
                    <div class="box box-default">
                      <div class="box-header with-border">
                        <h3 class="box-title" id="nm_<?=$row->id_masakan?>"><?=$row->nama_masakan?></h3>
                        <div class="box-body">
                          <img style="width: 151px; height: 151px;" src="<?=base_url().'gambar/'.$row->gambar_masakan?>" class="img-responsive img-rounded">
                          <br>
                          <label>Rp <?=$row->harga_masakan?>,00</label>
                        </div>
                        <div class="box-footer">
                          <div class="form-group">
                            <button onclick="add_to(<?=$row->id_masakan?>)" class="btn btn-success btn-block"><i class="fa fa-arrow-down"></i> Add to chart</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title">Top Menu</h3>
              </div>
              <div class="box-body">
              </div>
              <!-- /.box-body -->
            </div>
          </div>
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.0
      </div>
      <strong>Copyright &copy; 2019 <a href="<?=base_url()?>assets/https://adminlte.io">Frendi Dwi Prasetyo</a>.</strong> All rights
      reserved.
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?=base_url()?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url()?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>assets/dist/js/demo.js"></script>

<script type="text/javascript">
  function add_to(id_menu) {
    $('#list_menu').append('<li classs="form-inline"><input class="form-control disable" type="text" value="'+$('#nm_'+id_menu).html()+'" name="'+id_menu+'"><input class="form-control" type="number" autocomplete="off" name="j_'+id_menu+'"></li>');
    $('[onclick="add_to('+id_menu+')"]').prop('disabled', true);
    var i = Number($('#tt').html());
    i += 1
    $('#tt').html(i);
  }
</script>
</body>
</html>
