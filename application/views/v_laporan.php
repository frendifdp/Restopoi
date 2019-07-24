<?php $this->load->view('bagian/kepala'); ?>
<style type="text/css">
.ct {
  text-align: center;
}
thead {
  border-bottom: solid lightgrey;
}
tfoot {
  border-top: solid lightgrey;
}
</style>
<!-- Main content -->
<section class="content container-fluid">

  <div class="row">
    <form class="form" role="form" id="l_form">
      <div class="col-md-3">
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Laporan Harian Bulan Ini</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
            </div>
            <!-- /.box-tools -->
          </div>
          <div class="box-body">
            <div class="form-group">
              <label id="tes">Tanggal</label>
              <select class="form-control" name="tanggal" onchange="get_laporan(1)">
                <?php
                for($i=1;$i<=31;$i++){
                  $o = $i;
                  if($i<10){
                    $o = '0'.$i;
                  }
                  echo "<option>$o</option>";
                }
                ?>
              </select>
            </div>

          </div>
        </div>
        <div class="box box-info collapsed-box">
          <div class="box-header with-border">
            <h3 class="box-title">Laporan Waktu Tertentu</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
              </button>
            </div>
            <!-- /.box-tools -->
          </div>
          <div class="box-body">

            <div class="form-group">
              <label>Pilih Rentang Waktu</label>
              <input type="text" class="form-control" id="laporan_rentang" name="rentang" onchange="get_laporan(2)">
            </div>

          </div>
        </div>
        <div class="box box-warning collapsed-box">
          <div class="box-header with-border">
            <h3 class="box-title">Laporan Perbulan</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
              </button>
            </div>
            <!-- /.box-tools -->
          </div>
          <div class="box-body">

            <div class="form-group">
              <label>Bulan</label>
              <select class="form-control" onchange="get_laporan(3)" name="bulan">
                <?php
                for($i=1;$i<=12;$i++){
                  $o = $i;
                  if($i<10){
                    $o = '0'.$i;
                  }
                  echo "<option>$o</option>";
                }
                ?>
              </select>
            </div>

          </div>
        </div>
        <div class="box box-danger collapsed-box">
          <div class="box-header with-border">
            <h3 class="box-title">Laporan Pertahun</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
              </button>
            </div>
            <!-- /.box-tools -->
          </div>
          <div class="box-body">

            <div class="form-group">
              <label>Tahun</label>
              <select class="form-control" onchange="get_laporan(4)" name="tahun">
                <?php
                for($i=2015;$i<=2025;$i++){
                  echo "<option>$i</option>";
                }
                ?>
              </select>
            </div>

          </div>
        </div>
      </div>
    </form>
    <div class="col-md-9">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Laporan</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table" id="laporan">
            <thead>
              <tr>
                <th>Menu</th>
                <th class="ct">Jumlah</th>
                <th>Harga</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody id="laporan_data">
            </tbody>
            <tfoot>
              <tr>
                <th>Jumlah Pesanan</th>
                <td class="ct" id="jml"></td>
                <th>Total Pendapatan</th>
                <td id="ttl"></td>
              </tr>
            </tfoot>
          </table>
          <form>
            <div class="form-group pull-right">
              <button class="btn btn-success" onclick="cetak()"><i class="fa fa-print"></i> Cetak Laporan</button>
            </div>

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $this->load->view('bagian/kaki'); ?>
<?php $this->load->view('javascript/laporan'); ?>
</body>
</html>