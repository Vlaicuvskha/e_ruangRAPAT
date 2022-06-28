<?php

class Data_ruang
 extends CI_Controller{

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
    elseif($this->session->userdata('role_id') != '1'){
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Anda tidak punya akses ke halaman ini!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
      redirect('customer/dashboard');
    }
  }

  public function index(){
    $data['ruang'] = $this->rental_model->get_data('ruang')->result();
    $data['tipe'] = $this->rental_model->get_data('tipe')->result();
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/data_ruang', $data);
    $this->load->view('templates_admin/footer');
  }

  public function tambah_ruang(){
    $data['tipe'] = $this->rental_model->get_data('tipe')->result();
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/form_tambah_ruang', $data);
    $this->load->view('templates_admin/footer');
  }

  public function tambah_ruang_aksi(){
    $this->_rules();

    if($this->form_validation->run() == FALSE){
      $this->tambah_ruang();
    }
    else{
      $kode_tipe    = $this->input->post('kode_tipe');
      $no_ruang        = $this->input->post('no_ruang');
      $dayatampung        = $this->input->post('dayatampung');
      $status       = $this->input->post('status');
      $denda        = $this->input->post('denda');
      $ac           = $this->input->post('ac');
      $tambahkursitmeja        = $this->input->post('tambahkursitmeja');
      $jendela   = $this->input->post('jendela');
      $meja_bundar = $this->input->post('meja_bundar');
      $gambar    = $_FILES['gambar']['name'];

      if($gambar=''){}
      else{
        $config['upload_path'] = './assets/upload';
        $config['allowed_types'] = 'jpg|jpeg|png|tiff';

        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('gambar')){
          echo "Gambar ruang gagal diupload";
        }
        else{
          $gambar = $this->upload->data('file_name');
        }
      }
      $data = array(
        'kode_tipe'    => $kode_tipe,
        'no_ruang'        => $no_ruang,
        'dayatampung'        => $dayatampung,
        'status'       => $status,
        'denda'        => $denda,
        'ac'           => $ac,
        'tambahkursitmeja'        => $tambahkursitmeja,
        'jendela'   => $jendela,
        'meja_bundar' => $meja_bundar,
        'gambar'       => $gambar,
      );

      $this->rental_model->insert_data($data, 'ruang');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      Data berhasil ditambahkan
      <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
      </button></div>');
      redirect('admin/data_ruang');
    }
  }

  public function update_ruang($id){
    $where = array('id_ruang' => $id);
    $data['ruang'] = $this->db->query("SELECT * FROM ruang mb, tipe tp WHERE mb.kode_tipe = tp.kode_tipe AND mb.id_ruang = '$id'")->result();
    $data['tipe'] = $this->rental_model->get_data('tipe')->result();
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/form_update_ruang', $data);
    $this->load->view('templates_admin/footer');
  }

  public function update_ruang_aksi(){
    $this->_rules();

    if($this->form_validation->run() == FALSE){
      $id = $this->input->post('id_ruang');
      $this->update_ruang($id);
    }
    else{
      $id           = $this->input->post('id_ruang');
      $kode_tipe    = $this->input->post('kode_tipe');
      $no_ruang        = $this->input->post('no_ruang');
      $dayatampung        = $this->input->post('dayatampung');
      $status       = $this->input->post('status');
      $denda        = $this->input->post('denda');
      $ac           = $this->input->post('ac');
      $tambahkursitmeja        = $this->input->post('tambahkursitmeja');
      $jendela   = $this->input->post('jendela');
      $meja_bundar = $this->input->post('meja_bundar');
      $gambar    = $_FILES['gambar']['name'];

      if($gambar){
        $config['upload_path'] = './assets/upload';
        $config['allowed_types'] = 'jpg|jpeg|png|tiff';

        $this->load->library('upload', $config);
        
        if($this->upload->do_upload('gambar')){
          $gambar = $this->upload->data('file_name');
          $this->db->set('gambar', $gambar);
        }
        else{
          echo $this->upload->display_error();
        }
      }
      $data = array(
        'kode_tipe'    => $kode_tipe,
        'no_ruang'        => $no_ruang,
        'dayatampung'        => $dayatampung,
        'status'       => $status,
        'denda'        => $denda,
        'ac'           => $ac,
        'tambahkursitmeja'        => $tambahkursitmeja,
        'jendela'   => $jendela,
        'meja_bundar' => $meja_bundar,
      );
      $where = array('id_ruang' => $id);

      $this->rental_model->update_data('ruang', $data, $where);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      Data berhasil diupdate
      <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
      </button></div>');
      redirect('admin/data_ruang');
    }
  }

  public function detail_ruang($id){
    $data['detail'] = $this->rental_model->ambil_id_ruang($id);
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/detail_ruang', $data);
    $this->load->view('templates_admin/footer');
  }

  public function delete_ruang($id){
    $where = array('id_ruang' => $id);

    $this->rental_model->delete_data($where, 'ruang');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Data berhasil dihapus
    <button type="button" class="close" data-dismiss="alert" aria-label="close">
      <span aria-hidden="true">&times;</span>
    </button></div>');
    redirect('admin/data_ruang');

  }

  public function _rules(){
    $this->form_validation->set_rules('kode_tipe', 'Kode Tipe', 'required');
    $this->form_validation->set_rules('no_ruang', 'Merek', 'required');
    $this->form_validation->set_rules('dayatampung', 'Tahun', 'required');
    $this->form_validation->set_rules('status', 'Status', 'required');
    $this->form_validation->set_rules('denda', 'Denda', 'required');
    $this->form_validation->set_rules('ac', 'AC', 'required');
    $this->form_validation->set_rules('tambahkursitmeja', 'Sopir', 'required');
    $this->form_validation->set_rules('jendela', 'MP3 Player', 'required');
    $this->form_validation->set_rules('meja_bundar', 'Central Lock', 'required');
  }


}