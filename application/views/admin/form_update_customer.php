<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Form Update Pemohon</h1>
    </div>

    <?php foreach($customer as $cs): ?>
    <form action="<?= base_url('admin/data_customer/update_customer_aksi') ?>" method="post">
      <div class="form-group"> 
        <label for="">Direktorat Sub Bidang</label>
        <input type="hidden" name="id_customer" value="<?= $cs->id_customer; ?>">
        <input type="text" name="nama" class="form-control" value="<?= $cs->nama; ?>">
        <?= form_error('nama', '<div class="text-small text-danger">', '</div>') ?>
      </div>
      <div class="form-group"> 
        <label for="">Username</label>
        <input type="text" name="username" class="form-control" value="<?= $cs->username; ?>">
        <?= form_error('username', '<div class="text-small text-danger">', '</div>') ?>
      </div>
      <div class="form-group"> 
        <label for="">Nama Pemohon</label>
        <input type="text" name="nama_pemohon" class="form-control" value="<?= $cs->nama_pemohon; ?>">
        <?= form_error('nama_pemohon', '<div class="text-small text-danger">', '</div>') ?>
      </div>
      <div class="form-group"> 
        <label for="">Jabatan</label>
        <input type="text" name="jabatan" class="form-control" value="<?= $cs->jabatan; ?>">
        <?= form_error('nama_pemohon', '<div class="text-small text-danger">', '</div>') ?>
      </div>
      <div class="form-group"> 
        <label for="">No. Telepon</label>
        <input type="text" name="no_telepon" class="form-control" value="<?= $cs->no_telepon; ?>">
        <?= form_error('no_telepon', '<div class="text-small text-danger">', '</div>') ?>
      </div>
      <div class="form-group"> 
        <label for="">No. Direktorat</label>
        <input type="text" name="no_dir" class="form-control" value="<?= $cs->no_dir; ?>">
        <?= form_error('no_dir', '<div class="text-small text-danger">', '</div>') ?>
      </div>
      <div class="form-group"> 
        <label for="">Password</label>
        <input type="password" name="password" class="form-control" value="<?= $cs->password; ?>">
        <?= form_error('password', '<div class="text-small text-danger">', '</div>') ?>
      </div>

      <button type="submit" class="btn btn-primary">Simpan</button>
      <button type="reset" class="btn btn-warning">Reset</button>

    </form>
    <?php endforeach; ?>

  </section>
</div>