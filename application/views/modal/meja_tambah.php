<div class="modal fade" id="tambah_meja">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title">Tambah Meja</h4>
      </div>
      <form class="form form-center" action="<?=base_url()?>meja/tambah_meja/" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label>Nomor Meja</label>
            <input type="Number" name="no_meja" class="form-control">
          </div>
          <div class="form-group">
            <label>Jumlah Kursi</label>
            <input type="Number" name="kursi" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-success">Simpan</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
