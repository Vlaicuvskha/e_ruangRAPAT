<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Ruangan</h1>
    </div>
    
    <a href="<?= base_url('admin/data_ruang/tambah_ruang'); ?>" class="btn btn-primary mb-3">Tambah Data</a>
    <?= $this->session->flashdata('pesan'); ?>

    <table class="table table-hover table-striped table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Gambar</th>
          <th>Tipe</th>
          <th>No. Ruangan</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach($ruang as $mb): ?>
        <tr>
          <td><?= $no++; ?>.</td>
          <td>
            <img width="70px;" src="<?= base_url('assets/upload/'). $mb->gambar; ?>" alt="">
          </td>
          <td><?= $mb->kode_tipe; ?></td>
          <td><?= $mb->no_ruang; ?></td>
          <td>
            <?php if($mb->status == 0){ ?>
              <span class="badge badge-danger">Tidak Tersedia</span>
            <?php }
            else{ ?>
              <span class="badge badge-primary">Tersedia</span>
            <?php } ?>
          </td>
          <td>
            <a href="<?= base_url('admin/data_ruang/detail_ruang/'). $mb->id_ruang; ?>" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
            <a onclick="return confirm('Yakin hapus?')" href="<?= base_url('admin/data_ruang/delete_ruang/'). $mb->id_ruang; ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
            <a href="<?= base_url('admin/data_ruang/update_ruang/'). $mb->id_ruang; ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>



  </section>
</div>