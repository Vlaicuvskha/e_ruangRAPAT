<?php

class Dashboard extends CI_Controller{

  public function index(){
    $data['ruang'] = $this->rental_model->get_data('ruang')->result();
    $this->load->view('templates_customer/header');
    $this->load->view('customer/dashboard', $data);
    $this->load->view('templates_customer/footer');
  }


}