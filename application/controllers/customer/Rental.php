<?php

class Rental extends CI_Controller{

  public function __construct(){
    parent::__construct();
    
    if(empty($this->session->userdata('username'))){
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Anda belum login!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
      redirect('auth/login');
    }
    elseif($this->session->userdata('role_id') != '2'){
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Anda tidak punya akses ke halaman ini!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
      redirect('admin/dashboard');
    }
  }

  public function tambah_rental($id){
    $data['detail'] = $this->rental_model->ambil_id_ruang($id);
    $this->load->view('templates_customer/header');
    $this->load->view('customer/tambah_rental', $data);
    $this->load->view('templates_customer/footer');
  }

  public function tambah_rental_aksi(){
    $id_customer     = $this->session->userdata('id_customer');
    $id_ruang        = $this->input->post('id_ruang');
    $tgl_rental      = $this->input->post('tgl_rental');
    $tgl_kembali     = $this->input->post('tgl_kembali');
    $denda           = $this->input->post('denda');
    $harga           = $this->input->post('harga');
    $keterangan      = $this->input->post('keterangan');

    $data = array(
      'id_customer'          => $id_customer,
      'id_ruang'             => $id_ruang,
      'tgl_rental'           => $tgl_rental,
      'tgl_kembali'          => $tgl_kembali,
      'denda'                => $denda,
      'harga'                => $harga,
      'keterangan'           => $keterangan,
      'tgl_pengembalian'     => '-',
      'status_rental'        => 'Belum Selesai',
      'status_pengembalian'  => 'Belum Kembali',
      'total_denda'          => '0',
    );

    $this->rental_model->insert_data($data, 'transaksi');
    
    $status = array('status' => '0');
    $id = array('id_ruang' => $id_ruang);
    $this->rental_model->update_data('ruang', $status, $id);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      Pengajuan permohonan berhasil, silahkan upload Surat Penugasan di halaman Permohonan!
      <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
      </button></div>');
      redirect('customer/data_ruang');
  }


}