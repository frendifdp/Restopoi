    <?php $this->load->view('bagian/kepala'); ?>
    <section class="content container-fluid">

      <div class="row">
        <div class="col-md-3">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Nomor Meja</h3>
            </div>
            <div class="box-body">
              <form class="form-inline" id="o_form">
                <div class="form-group">
                  <label>Nomor Meja </label>
                  <select name="no_meja" class="form-control" onchange="get_order()" id="no_meja">
                    <option></option>
                    <?php foreach($order as $row){?>
                      <option value="<?=$row->id_meja?>"><?=$row->no_meja?></option>
                    <?php } ?>
                  </select>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Collapsable</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table" id="struk">
                <thead>
                  <tr>
                    <th>Menu</th>
                    <th class="ct">Jumlah</th>
                    <th>Harga</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody id="tbl_struk">
                </tbody>
                <tfoot>
                  <tr>
                    <th>Jumlah Pesanan</th>
                    <td class="ct" id="jml"></td>
                    <th>Total Pembayaran</th>
                    <td id="ttl"></td>
                  </tr>
                </tfoot>
              </table>
              <form onsubmit="return konfirmasi();">
                <div class="form-group pull-right">
                  <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i></button>
                  <button class="btn btn-success" onclick="cetak()"><i class="fa fa-print"></i></button>
                </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>

    </section>
  </div>
  <!-- /.content-wrapper -->

  <?php 
  $this->load->view('bagian/kaki');
  $this->load->view('javascript/kasir');
  ?>

</body>
</html>
