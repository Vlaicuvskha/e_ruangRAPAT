<?php

class Data_customer extends CI_Controller{

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
    $data['customer'] = $this->rental_model->get_data('customer')->result();
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/data_customer', $data);
    $this->load->view('templates_admin/footer');
  }

  public function tambah_customer(){
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/form_tambah_customer');
    $this->load->view('templates_admin/footer');
  }

  public function tambah_customer_aksi(){
    $this->_rules();

    if($this->form_validation->run() == FALSE){
      $this->tambah_customer();
    }
    else{
      $nama       = $this->input->post('nama');
      $username   = $this->input->post('username');
      $nama_pemohon     = $this->input->post('nama_pemohon');
      $jabatan     = $this->input->post('jabatan');
      $no_telepon = $this->input->post('no_telepon');
      $no_dir     = $this->input->post('no_dir');
      $password   = md5($this->input->post('password'));

      $data = array(
        'nama'       => $nama,
        'username'   => $username,
        'nama_pemohon'     => $nama_pemohon,
        'jabatan'     => $jabatan,
        'no_telepon' => $no_telepon,
        'no_dir'     => $no_dir,    
        'password'   => $password,
      );

      $this->rental_model->insert_data($data, 'customer');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      Data Pemohon berhasil ditambahkan
      <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
      </button></div>');
      redirect('admin/data_customer');
    }
  }

  public function update_customer($id){
    // $where = array('id_customer' => $id);
    $data['customer'] = $this->db->query("SELECT * FROM customer WHERE id_customer = '$id'")->result();
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/form_update_customer', $data);
    $this->load->view('templates_admin/footer');
  }

  public function update_customer_aksi(){
    $this->_rules();

    if($this->form_validation->run() == FALSE){
      $id = $this->input->post('id_customer');
      $this->update_customer($id);
    }
    else{
      $id         = $this->input->post('id_customer');
      $nama       = $this->input->post('nama');
      $username   = $this->input->post('username');
      $nama_pemohon     = $this->input->post('nama_pemohon');
      $jabatan     = $this->input->post('jabatan');
      $no_telepon = $this->input->post('no_telepon');
      $no_dir     = $this->input->post('no_dir');
      $password   = md5($this->input->post('password'));

      $data = array(
        'nama'       => $nama,
        'username'   => $username,
        'nama_pemohon'     => $nama_pemohon,
        'jabatan'     => $jabatan,
        'no_telepon' => $no_telepon,
        'no_dir'     => $no_dir,    
        'password'   => $password,
      );

      $where = array('id_customer' => $id);
      $this->rental_model->update_data('customer', $data, $where);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      Data Pemohon berhasil diupdate
      <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
      </button></div>');
      redirect('admin/data_customer');
    }
  }

  public function delete_customer($id){
    $where = array('id_customer' => $id);
    $this->rental_model->delete_data($where, 'customer');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Data Pemohon berhasil dihapus
    <button type="button" class="close" data-dismiss="alert" aria-label="close">
      <span aria-hidden="true">&times;</span>
    </button></div>');
    redirect('admin/data_customer');
  }


  public function _rules(){
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('nama_pemohon', 'nama_pemohon', 'required');
    $this->form_validation->set_rules('jabatan', 'jabatan', 'required');
    $this->form_validation->set_rules('no_telepon', 'No. telepon', 'required');
    $this->form_validation->set_rules('no_dir', 'No. KTP', 'required|numeric');
    $this->form_validation->set_rules('password', 'Password', 'required');
  }



}