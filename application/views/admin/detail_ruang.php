<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Detail Ruangan</h1>
    </div>
  </section>

  <?php foreach($detail as $dt): ?>
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-5">
            <img width="110%;" src="<?= base_url('assets/upload/'). $dt->gambar; ?>" alt="">
          </div>
          <div class="col-md-7">
            <table class="table">
              <tr>
                <td>Tipe Ruangan</td>
                <td>
                  <?php 
                    if($dt->kode_tipe == "UTAMA"){
                      echo "UTAMA";
                    }
                    elseif($dt->kode_tipe == "KECIL"){
                      echo "KECIL";
                    }
                    else{ ?>
                      <span class="text-danger">Tipe Ruangan belum terdaftar</span>
                    <?php }
                  ?>
                </td>
              </tr>
              <tr>
                <td>Ruangan</td>
                <td><?= $dt->no_ruang; ?></td>
              </tr>
              <tr>
                <td>Dapat Menampung</td>
                <td><?= $dt->dayatampung; ?> Orang</td>
              </tr>
              <tr>
                <td>Peringatan Lewat Dari 1 Hari dst.</td>
                <td>SP <?= number_format($dt->denda); ?></td>
              </tr>
              <tr>
                <td>Status</td>
                <td>
                  <?php
                  if($dt->status == "0"){ ?>
                    <span class="badge badge-danger">Tidak Tersedia</span>                 
                  <?php }
                  else{ ?>
                    <span class="badge badge-primary">Tersedia</span>
                  <?php } ?>
                </td>
              </tr>
              <tr>
                <td>AC</td>
                <td>
                  <?php
                  if($dt->ac == "0"){ ?>
                    <span class="badge badge-danger">Tidak Tersedia</span>                 
                  <?php }
                  else{ ?>
                    <span class="badge badge-primary">Tersedia</span>
                  <?php } ?>
                </td>
              </tr>
              <tr>
                <td>Tambahan Kursi Tanpa Meja</td>
                <td>
                  <?php
                  if($dt->tambahkursitmeja == "0"){ ?>
                    <span class="badge badge-danger">Tidak Tersedia</span>                 
                  <?php }
                  else{ ?>
                    <span class="badge badge-primary">Tersedia</span>
                  <?php } ?>
                </td>
              </tr>
              <tr>
                <td>Jendela</td>
                <td>
                  <?php
                  if($dt->jendela == "0"){ ?>
                    <span class="badge badge-danger">Tidak Tersedia</span>                 
                  <?php }
                  else{ ?>
                    <span class="badge badge-primary">Tersedia</span>
                  <?php } ?>
                </td>
              </tr>
              <tr>
                <td>Meja Bundar</td>
                <td>
                  <?php
                  if($dt->meja_bundar == "0"){ ?>
                    <span class="badge badge-danger">Tidak Tersedia</span>                 
                  <?php }
                  else{ ?>
                    <span class="badge badge-primary">Tersedia</span>
                  <?php } ?>
                </td>
              </tr>
            </table>

            <a href="<?= base_url('admin/data_ruang'); ?>" class="btn btn-sm btn-danger ml-4">Kembali</a>
            <a href="<?= base_url('admin/data_ruang/update_ruang/').$dt->id_ruang; ?>" class="btn btn-sm btn-primary">Update</a>
          </div>
        </div>
      </div>
    </div>

  <?php endforeach; ?>
</div>