<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Pemohon</h1>
    </div>
    
    <a href="<?= base_url('admin/data_customer/tambah_customer'); ?>" class="btn btn-primary mb-3">Tambah Pemohon</a>
    <?= $this->session->flashdata('pesan'); ?>
    
    <table class="table table-hover table-striped table-responsive table-bordered">
      <tr>
        <th>No</th>
        <th>Direktorat Sub Bidang</th>
        <th>Username</th>
        <th>Nama Pemohon</th>
        <th>Jabatan</th>
        <th>No. Telepon</th>
        <th>No. Direktorat</th>
        <th>Action</th>
      </tr>

      <?php 
      $no = 1;
      foreach($customer as $cs): ?>
      <tr>
        <td><?= $no++; ?>.</td>
        <td><?= $cs->nama; ?></td>
        <td><?= $cs->username; ?></td>
        <td><?= $cs->nama_pemohon; ?></td>
        <td><?= $cs->jabatan; ?></td>
        <td><?= $cs->no_telepon; ?></td>
        <td><?= $cs->no_dir; ?></td>
        <td>
          <div class="row">
            <a href="<?= base_url('admin/data_customer/update_customer/').$cs->id_customer; ?>" class="btn btn-sm btn-primary mr-2"><i class="fas fa-edit"></i></a>
            <a href="<?= base_url('admin/data_customer/delete_customer/').$cs->id_customer; ?>" onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
          </div>
        </td>
      </tr>

      <?php endforeach; ?>
    </table>
    


  </section>
</div>