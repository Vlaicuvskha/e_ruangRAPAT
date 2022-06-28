<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Laporan Pakai Ruangan</h1>
    </div>

    <form action="<?= base_url('admin/laporan') ?>" method="post">
      <div class="form-group">
        <label for="">Dari Tanggal</label>
        <input type="date" name="dari" class="form-control">
        <?= form_error('dari', '<div class="text-small text-danger">', '</div>') ?>
      </div>
      <div class="form-group">
        <label for="">Sampai Tanggal</label>
        <input type="date" name="sampai" class="form-control">
        <?= form_error('sampai', '<div class="text-small text-danger">', '</div>') ?>
      </div>

      <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i> Tampilkan Data</button>
    </form>
    <hr>

    <div class="btn-group">
      <a href="<?= base_url(). 'admin/laporan/print_laporan/?dari='.set_value('dari'). '&sampai='.set_value('sampai'); ?>" class="btn btn-sm btn-success" target="_blank"><i class="fas fa-print"></i> Print</a>
    </div>

    <table class="table table-responsive table-bordered table-striped mt-3">
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

  </section>
</div>