<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Pakai Ruang</h1>
    </div>

    <table class="table table-responsive table-bordered table-striped">
      <tr>
        <th>ID Pakai</th>
        <th>Direktorat</th>
        <th>No. Ruang</th>
        <th>Ket. Acara</th>
        <th>Tgl. Pakai</th>
        <th>Tgl. Selesai</th>
        <!--<th>Harga/Hari</th>-->
        <th>SP/Hari</th>
        <th>Total SP</th>
        <th>Laporan Selesai</th>
        <th>Status Pakai</th>
        <th>Cek Surat Tugas</th>
        <!--<th>Total Pembayaran</th>-->
        <th>Action</th>
      </tr>

      <?php 
      $no = 1;
      foreach($transaksi as $tr): ?>
      <tr>
        <td><?= $tr->id_rental; ?></td>
        <td><?= $tr->nama; ?></td>
        <td><?= $tr->no_ruang; ?></td>
        <td><?= $tr->keterangan; ?></td>
        <td><?= date('d/m/Y', strtotime($tr->tgl_rental)); ?></td>
        <td><?= date('d/m/Y', strtotime($tr->tgl_kembali)); ?></td>
        <td>SP <?= number_format($tr->denda); ?></td>
        <td>SP <?= number_format($tr->total_denda); ?></td>
        <td>
          <?php if($tr->tgl_pengembalian == "0000-00-00"){
            echo "-";
          }else{
            echo date('d/m/Y', strtotime($tr->tgl_pengembalian));
          } ?>
        </td>

        <td>
          <?php if($tr->tgl_pengembalian == "0000-00-00"){
            echo "Belum Selesai";
          }else{
            echo "Selesai";
          }?>
        </td>

        <td>
          <center>
            <?php if(empty($tr->bukti_pembayaran)){ ?>
              <button class="btn btn-sm btn-danger"><i class="fas fa-times-circle"></i></button>
            <?php }
            else{ ?>
              <a class="btn btn-sm btn-primary" href="<?= base_url('admin/transaksi/pembayaran/'.$tr->id_rental); ?>"><i class="fas fa-check-circle"></i></a>
            <?php } ?>
          </center>
        </td>
        
        <td>
          <?php if($tr->status == "1"){
            echo "-";
          }else{ ?>
            <div class="row">
              <a class="btn btn-sm btn-success mr-2" href="<?= base_url('admin/transaksi/transaksi_selesai/'.$tr->id_rental) ?>"><i class="fas fa-check"></i></a>
              <a onclick="return confirm('Yakin batal?')" class="btn btn-sm btn-danger" href="<?= base_url('admin/transaksi/batal_transaksi/'.$tr->id_rental) ?>"><i class="fas fa-times"></i></a>
            </div>
          <?php } ?>
        </td>
      </tr>

      <?php endforeach; ?>
    </table>
  </section>
</div>