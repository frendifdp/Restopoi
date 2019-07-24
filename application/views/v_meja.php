    <?php $this->load->view('bagian/kepala'); ?>
    <section class="content container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Meja</h3>
              <button class="btn btn-success pull-right" data-toggle="modal" data-target="#tambah_meja"><i class="fa fa-plus"></i> Tambah Meja
              </button>
            </div>
            <div class="box-body">
              <table class="table table-hover dataTable" id="meja" style="width: 100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nomor Meja</th>
                    <th>Jumlah Kursi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php 
  $this->load->view('modal/meja_tambah');
  $this->load->view('modal/meja_edit');
  $this->load->view('bagian/kaki');
  $this->load->view('javascript/meja'); 
  ?>

</body>
</html>
