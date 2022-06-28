<?php

class Data_ruang extends CI_Controller{

  public function index(){
    $data['ruang'] = $this->rental_model->get_data('ruang')->result();
    $this->load->view('templates_customer/header');
    $this->load->view('customer/data_ruang', $data);
    $this->load->view('templates_customer/footer');
  }

  public function detail_ruang($id){
    $data['detail'] = $this->rental_model->ambil_id_ruang($id);
    $this->load->view('templates_customer/header');
    $this->load->view('customer/detail_ruang', $data);
    $this->load->view('templates_customer/footer');
  }


}