<div style="height: 100px;"></div>
<div class="container mt-5 mb-5">
  <div class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header alert alert-success">
          Detail Permohonan Pakai Ruangan
        </div>
        <div class="card-body">
          <table class="table">
          <?php foreach($transaksi as $tr): ?>
            <tr>
              <th>Merek Mobil</th>
              <td>:</td>
              <td><?= $tr->no_ruang; ?></td>
            </tr>
            <tr>
              <th>Tanggal Pakai</th>
              <td>:</td>
              <td><?= date('d/m/Y', strtotime($tr->tgl_rental)); ?></td>
            </tr>
            <tr>
              <th>Tanggal Selesai</th>
              <td>:</td>
              <td><?= date('d/m/Y', strtotime($tr->tgl_kembali)); ?></td>
            </tr>
            <tr>
              <th>Untuk Acara</th>
              <td>:</td>
              <td><?= $tr->keterangan; ?></td>
            </tr>
            <tr>
              <?php 
                $x = strtotime($tr->tgl_kembali);
                $y = strtotime($tr->tgl_rental);
                $jmlHari = abs(($x - $y)/(60*60*24));
                if($jmlHari == 0){
                  $jmlHari = 1;
                }
              ?>
              <th>Jumlah Hari Pakai</th>
              <td>:</td>
              <td><?= $jmlHari; ?> Hari</td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td><a href="<?= base_url('customer/transaksi/cetak_invoice/'.$tr->id_rental) ?>" class="btn btn-sm btn-secondary">Print Invoice</a></td>
            </tr>

          <?php endforeach; ?>
          </table>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-header alert alert-primary">
          UPLOAD SURAT PENUGASAN
        </div>
        <div class="card-body">
          <p class="text-success mb-3">Silahkan mengunggah / upload file Penugasan Pakai Ruang Rapat yang ditembuskan kepada :</p>

          <ul class="list-group list-group-flush">
            <li class="list-group-item">Direktur Dirjen PSMP</li>
            <li class="list-group-item">Kepala Sub Bagian Tata Usaha</li>
            <li class="list-group-item">Bendahara Sub Bagian Tata Usaha</li>
          </ul>

          <?php
          if(empty($tr->bukti_pembayaran)){ ?>
            <!-- Button trigger modal -->
            <button style="width: 100%;" type="button" class="btn btn-sm btn-danger mt-3" data-toggle="modal" data-target="#exampleModal">
              Upload Surat Penugasan
            </button>
          <?php }
          elseif($tr->status_pembayaran == '0'){ ?>
            <button style="width: 100%;" class="btn btn-sm btn-warning mt-3"><i class="fa fa-clock-o"></i> Menunggu Konfirmasi</button>
          <?php }
          elseif($tr->status_pembayaran == '1'){ ?>
            <button style="width: 100%;" class="btn btn-sm btn-success mt-3"><i class="fa fa-check"></i> Surat Penugasan Telah Diterima & Disetujui</button>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>

</div>


<!-- Modal untuk upload pembayarn -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Surat Penugasan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('customer/transaksi/pembayaran_aksi') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="">Upload Bukti Penugasan</label>
            <input type="hidden" name="id_rental" value="<?= $tr->id_rental ?>">
            <input type="file" name="bukti_pembayaran" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-sm btn-success">Kirim</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div style="height: 180px;"></div>