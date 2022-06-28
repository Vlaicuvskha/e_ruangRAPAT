<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Form Update Data Ruangan</h1>
    </div>

    <div class="card">
      <div class="card-body">

        <?php foreach($ruang as $mb): ?>

        <form action="<?= base_url('admin/data_ruang/update_ruang_aksi') ?>" enctype="multipart/form-data" method="post">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Tipe Ruangan</label>
                <input type="hidden" name="id_ruang" value="<?= $mb->id_ruang; ?>">
                <select name="kode_tipe" id="" class="form-control">
                  <option value="<?= $mb->kode_tipe ?>"><?= $mb->nama_tipe ?></option>
                  <?php foreach($tipe as $tp): ?>
                  <option value="<?= $tp->kode_tipe ?>"><?= $tp->nama_tipe; ?></option>
                  <?php endforeach; ?>
                </select>
                <?= form_error('kode_tipe', '<div class="text-small text-danger">', '</div>') ?>
              </div>

              <div class="form-group">
                <label for="">Ruangan</label>
                <input type="text" name="no_ruang" class="form-control" value="<?= $mb->no_ruang ?>">
                <?= form_error('no_ruang', '<div class="text-small text-danger">', '</div>') ?>
              </div>

              <div class="form-group">
                <label for="">AC</label>
                <select name="ac" id="" class="form-control">
                  <option <?php if($mb->ac == "1"){echo "selected='selected'";} echo $mb->ac; ?> value="1">Tersedia</option>
                  <option <?php if($mb->ac == "0"){echo "selected='selected'";} echo $mb->ac; ?> value="0">Tidak Tersedia</option>
                </select>
                <?= form_error('ac', '<div class="text-small text-danger">', '</div>') ?>
              </div>
              
              <div class="form-group">
                <label for="">Tambahan Kursi Tanpa Meja</label>
                <select name="tambahkursitmeja" id="" class="form-control">
                  <option <?php if($mb->tambahkursitmeja == "1"){echo "selected='selected'";} echo $mb->tambahkursitmeja; ?> value="1">Tersedia</option>
                  <option <?php if($mb->tambahkursitmeja == "0"){echo "selected='selected'";} echo $mb->tambahkursitmeja; ?> value="0">Tidak Tersedia</option>
                </select>
                <?= form_error('tambahkursitmeja', '<div class="text-small text-danger">', '</div>') ?>
              </div>
              
              <div class="form-group">
                <label for="">Jendela</label>
                <select name="jendela" id="" class="form-control">
                  <option <?php if($mb->jendela == "1"){echo "selected='selected'";} echo $mb->jendela; ?> value="1">Tersedia</option>
                  <option <?php if($mb->jendela == "0"){echo "selected='selected'";} echo $mb->jendela; ?> value="0">Tidak Tersedia</option>
                </select>
                <?= form_error('jendela', '<div class="text-small text-danger">', '</div>') ?>
              </div>
              
              <div class="form-group">
                <label for=""> Meja Bundar</label>
                <select name="meja_bundar" id="" class="form-control">
                  <option <?php if($mb->meja_bundar == "1"){echo "selected='selected'";} echo $mb->meja_bundar; ?> value="1">Tersedia</option>
                  <option <?php if($mb->meja_bundar == "0"){echo "selected='selected'";} echo $mb->meja_bundar; ?> value="0">Tidak Tersedia</option>
                </select>
                <?= form_error('meja_bundar', '<div class="text-small text-danger">', '</div>') ?>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Dapat Menampung</label>
                <input type="text" name="dayatampung" class="form-control" value="<?= $mb->dayatampung ?>">
                <?= form_error('dayatampung', '<div class="text-small text-danger">', '</div>') ?>
              </div>
              
              <div class="form-group">
                <label for="">SP</label>
                <input type="number" name="denda" class="form-control" value="<?= $mb->denda ?>">
                <?= form_error('denda', '<div class="text-small text-danger">', '</div>') ?>
              </div>

              <div class="form-group">
                <label for="">Status</label>
                <select name="status" id="" class="form-control">
                  <option <?php if($mb->status == "1"){echo "selected='selected'";} echo $mb->status; ?> value="1">Tersedia</option>
                  <option <?php if($mb->status == "0"){echo "selected='selected'";} echo $mb->status; ?> value="0">Tidak Tersedia</option>
                </select>
                <?= form_error('status', '<div class="text-small text-danger">', '</div>') ?>
              </div>
              
              <div class="form-group">
                <label for="">Gambar</label>
                <input type="file" name="gambar" class="form-control">
              </div>

              <button type="submit" class="btn btn-primary mt-4">Simpan</button>
              <button type="reset" class="btn btn-success mt-4">Reset</button>
            </div>
          </div>
        </form>

        <?php endforeach; ?>
      </div>
    </div>

  </section>
</div>