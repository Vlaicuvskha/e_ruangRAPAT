<div style="height: 150px;"></div>
<div class="container">
  <div class="card mx-auto">
    <div class="card-header">
      Data Permohonan Ruangan Rapat Anda
    </div>
    <span class="mt-2 p-2"><?= $this->session->flashdata('pesan'); ?></span>
    <div class="card-body">
      <table class="table table-bordered table-striped">
        <tr>
          <th>No</th>
          <th>Nama Pemohon</th>
          <th>Ruangan</th>
          <th>Tanggal Pakai</th>
          <th>Tanggal Selesai</th>
          <th>Untuk Acara</th>
          <th>Action</th>
          <th>Batal</th>
        </tr>

        <?php
        $no = 1;
        foreach($transaksi as $tr): ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $tr->nama; ?></td>
          <td><?= $tr->no_ruang; ?></td>
          <td><?= $tr->tgl_rental; ?></td>
          <td><?= $tr->tgl_kembali; ?></td>
          <td><?= $tr->keterangan; ?></td>
          <td>
            <?php if($tr->status_rental == "Selesai"){ ?>
              <button class="btn btn-sm btn-danger">Pakai Ruangan Selesai</button>
            <?php }
            else{ ?>
              <a href="<?= base_url('customer/transaksi/pembayaran/'.$tr->id_rental); ?>" class="btn btn-sm btn-success">Butuh Tindakan Lebih Lanjut</a>
            <?php } ?>
          </td>
          <td>
            
            <?php if($tr->status_rental == 'Belum Selesai'){ ?>
              <a onclick="return confirm('Yakin batal?')" class="btn btn-sm btn-danger" href="<?= base_url('customer/transaksi/batal_transaksi/'.$tr->id_rental) ?>">Batal</a>
            <?php }
            else{ ?>
              <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal">
                Batal
              </button>
            <?php } ?>
          </td>
        </tr>

        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>

<div style="height: 180px;"></div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Informasi Batal Transaksi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Maaf, transaksi ini sudah selesai, dan tidak bisa dibatalkan!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Ok</button>
      </div>
    </div>
  </div>
</div>