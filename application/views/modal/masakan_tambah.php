<div class="modal fade" id="tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title">Tambah Makanan</h4>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" class="form form-center" action="<?=base_url()?>masakan/tambah/" method="POST">
          <div class="form-group">
            <label>Gambar Makanan</label>
            <input type="file" name="gambar">
          </div>
          <div class="form-group">
            <label>Nama Makanan</label>
            <input type="text" name="nama" class="form-control">
          </div>
          <div class="form-group">
            <label>Jenis</label>
            <select name="jenis" class="form-control">
              <option><-- Pilih Status --></option>
              <option value="1">Makanan</option>
              <option value="2">Minuman</option>
            </select>
          </div>
          <div class="form-group">
            <label>Harga Makanan</label>
            <input type="text" name="harga" class="form-control">
          </div>
          <div class="form-group">
            <label>Status Makanan</label>
            <select name="status" class="form-control">
              <option><-- Pilih Status --></option>
              <option value="1">Tersedia</option>
              <option value="0">Stok Habis</option>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-success">Simpan</button>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>