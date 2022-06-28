<div class="container">
  <div style="height: 150px;"></div>
  <div class="card">
    <card class="card-header">
      Form Pakai Ruangan
    </card> 
    <div class="card-body">
      <?php foreach($detail as $dt): ?>
      <form action="<?= base_url('customer/rental/tambah_rental_aksi') ?>" method="post">
        <div class="form-group">
          <input type="hidden" name="id_ruang" value="<?= $dt->id_ruang; ?>">
          <input type="hidden" name="harga" class="form-control" value="<?= $dt->harga; ?>" readonly>
        </div>
        <div class="form-group">
          <label for="">SP/Hari</label>
          <input type="text" name="denda" class="form-control" value="<?= $dt->denda; ?>" readonly>
        </div>
        <div class="form-group">
          <label for="">Tanggal Pakai</label>
          <input type="date" name="tgl_rental" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Tanggal Selesai</label>
          <input type="date" name="tgl_kembali" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Untuk Acara</label>
          <input type="text" name="keterangan" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Ajukan Permohonan</button>
      </form>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<div style="height: 180px;"></div>