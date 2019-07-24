<div class="modal fade" id="edit_meja">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title">Edit Meja</h4>
      </div>
      <form class="form form-center" action="<?=base_url()?>meja/edit_meja/" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label>Nomor Meja</label>
            <input type="Number" name="no_meja" class="form-control">
            <input type="hidden" name="id_meja">
          </div>
          <div class="form-group">
            <label>Jumlah Kursi</label>
            <input type="Number" name="kursi" class="form-control">
          </div>
          <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
              <option><-- Pilih Status --></option>
              <option value="1">Tersedia</option>
              <option value="2">Dipesan</option>
              <option value="3">Dipakai</option>
              <option value="4">Kosong</option>
            </select>
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
