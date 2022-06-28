<table style="width: 40%;">
  <h2>Invoice Pengajuan Ruang Rapat Anda</h2>
  <?php foreach($transaksi as $tr): ?>
    <tr>
      <td>Nama Pemohon</td>
      <td>:</td>
      <td><?= $tr->nama; ?></td>
    </tr>

    <tr>
      <td>Ruangan</td>
      <td>:</td>
      <td><?= $tr->no_ruang; ?></td>
    </tr>
    <tr>
      <td>Untuk Acara</td>
      <td>:</td>
      <td><?= $tr->keterangan; ?></td>
    </tr>
    <tr>
      <td>Tanggal Pakai</td>
      <td>:</td>
      <td><?= date('d/m/Y', strtotime($tr->tgl_rental)); ?></td>
    </tr>
    <tr>
      <td>Tanggal Selesai</td>
      <td>:</td>
      <td><?= date('d/m/Y', strtotime($tr->tgl_kembali)); ?></td>
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
      <td>Jumlah Hari Pakai</td>
      <td>:</td>
      <td><?= $jmlHari; ?> Hari</td>
    </tr>

    <tr>
      <td>Status Dokumen Penugasan</td>
      <td>:</td>
      <td>
        <?php if($tr->status_pembayaran == '0'){
          echo "Dokumen Penugasan Belum Diterima";
        }
        else{
          echo "Dokumen Penugasan Sudah Diterima";
        } ?>
      </td>
    </tr>

    <tr>
      <td>Silahkan mengunggah / upload file Penugasan Pakai Ruang Rapat yang ditembuskan kepada :</td>
      <td>:</td>
      <td>
        <ul>
          <li>Direktur Dirjen PSMP</li>
          <li>Kepala Sub Bagian Tata Usaha</li>
          <li>Bendahara Sub Bagian Tata Usaha</li>
        </ul>
      </td>
    </tr>
  <?php endforeach; ?>
</table>

<script>
  window.print();
</script>