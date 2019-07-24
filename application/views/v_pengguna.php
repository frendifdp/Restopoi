<?php $this->load->view('bagian/kepala'); ?>

<section class="content container-fluid">

  <div class="row">
    <div class="col-xs-12">
      <div class="box box-warning">
        <div class="box-header">
          <h3 class="box-title">Daftar Pengguna</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-striped table-bordered dataTable" id="user" style="width:100%;">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Level</th>
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

  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Daftar Pelanggan</h3>
          <button data-toggle="modal" data-target="#tambah_pelanggan" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Tambah Pelanggan</button>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-striped table-bordered dataTable" id="pelanggan" style="width:100%;">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Username</th>
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
<?php $this->load->view('modal/user_tambah'); ?>
<?php $this->load->view('bagian/kaki'); ?>
<?php $this->load->view('javascript/pengguna'); ?>

</body>
</html>