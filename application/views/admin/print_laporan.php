<h3 style="text-align: center;">Laporan Pemakaian Ruangan</h3>

<table>
  <tr>
    <td>Dari Tanggal</td>
    <td>:</td>
    <td><?= date('d-M-Y', strtotime($_GET['dari'])); ?></td>
  </tr>
  <tr>
    <td>Sampai Tanggal</td>
    <td>:</td>
    <td><?= date('d-M-Y', strtotime($_GET['sampai'])); ?></td>
  </tr>
</table>

<table class="table table-bordered table-striped mt-3">
<tr>
        <th>ID Pakai</th>
        <th>Direktorat Sub Bidang</th>
        <th>Ruangan</th>
        <th>Tgl. Pakai</th>
        <th>Tgl. Selesai</th>
        <th>Total SP</th>
        <th>Laporan Selesai</th>
        <th>Status Pakai</th>
      </tr>

      <?php 
      foreach($laporan as $tr): ?>
      <tr>
        <td><?= $tr->id_rental; ?></td>
        <td><?= $tr->nama; ?></td>
        <td><?= $tr->no_ruang; ?></td>
        <td><?= date('d/m/Y', strtotime($tr->tgl_rental)); ?></td>
        <td><?= date('d/m/Y', strtotime($tr->tgl_kembali)); ?></td>
        <td>SP <?= number_format($tr->total_denda, 0,',','.'); ?></td>

        <td>
          <?php if($tr->status_pembayaran == "1"){
            echo "Kembali";
          }else{
            echo "Belum Kembali";
          }?>
        </td>


        <td>
          <?php if($tr->status_pembayaran == "1"){
            echo "Selesai";
          }else{
            echo "Belum Selesai";
          }?>
        </td>
      </tr>

      <?php endforeach; ?>
</table>

<script>
  window.print();
</script>