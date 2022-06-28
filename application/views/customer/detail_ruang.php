<!-- Banner Starts Here -->
<div class="container">
  <div style="height: 150px;"></div>

  <div class="card">
    <div class="card-body">
      <?php foreach($detail as $dt): ?>
      <div class="row">
        <div class="col-md-6">
          <img width="500px;" src="<?= base_url('assets/upload/').$dt->gambar; ?>" alt="">
        </div>
        <div class="col-md-6">
          <table class="table">
            <tr>
              <th>Ruangan</th>
              <td><?= $dt->no_ruang; ?></td>
            </tr>
            <tr>
              <th>Dapat Menampung</th>
              <td><?= $dt->dayatampung; ?> Orang</td>
            </tr>
            <tr>
              <th>Status</th>
              <td>
                <?php if($dt->status == '1'){
                  echo "Tersedia";
                }
                else{
                  echo "Tidak Tersedia";
                } ?>
              </td>
            </tr>
            <tr>
            <td><div class="row">
                <?php if($dt->ac == '1'){ ?>
                  <a href="#" class="badge badge-success m-1"><i class="fa fa-check-square"></i> AC</a>
                  <?php } 
                else{ ?>
                  <a href="#" class="badge badge-danger m-1"><i class="fa fa-times-circle"></i> AC</a>
                <?php } ?>

                <?php if($dt->tambahkursitmeja == '1'){ ?>
                  <a href="#" class="badge badge-success m-1"><i class="fa fa-check-square"></i> Tambahan Kursi Tanpa Meja</a>
                  <?php } 
                else{ ?>
                  <a href="#" class="badge badge-danger m-1"><i class="fa fa-times-circle"></i> Tambahan Kursi Tanpa Meja</a>
                <?php } ?>

                <?php if($dt->jendela == '1'){ ?>
                  <a href="#" class="badge badge-success m-1"><i class="fa fa-check-square"></i> Jendela</a>
                  <?php } 
                else{ ?>
                  <a href="#" class="badge badge-danger m-1"><i class="fa fa-times-circle"></i> Jendela</a>
                <?php } ?>

                <?php if($dt->meja_bundar == '1'){ ?>
                  <a href="#" class="badge badge-success m-1"><i class="fa fa-check-square"></i> Meja Bundar</a>
                  <?php } 
                else{ ?>
                  <a href="#" class="badge badge-danger m-1"><i class="fa fa-times-circle"></i> Meja Bundar</a>
                <?php } ?>
              </div></td>
              <td>
              <?php
                if($dt->status == "0"){ ?>
                  <span class="btn btn-danger">Ruangan Sedang Dipakai</span>
                <?php }
                else{
                  echo anchor('customer/rental/tambah_rental/'. $dt->id_ruang, '<button class="btn btn-success">Pakai Ruangan</button>');
                }
                ?>
              </td>
            </tr>
          </table>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>

</div>
<!-- Banner Ends Here -->

<div style="height: 180px;"></div>


    