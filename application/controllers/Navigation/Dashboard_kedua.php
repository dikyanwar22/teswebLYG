<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_kedua extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_login', 'model');
    header('Cache-Control: no-cache, must-revalidate, max-age=0');
    header('Cache-Control: post-check=0, pre-check=0', false);
    header('Pragma: no-cache');

    $this->load->model('Modulpage', 'model');
    if ($this->session->userdata('id') == "") {
      redirect('Login/logout');
    }
  }

  public function index()
  {
    $data['title'] = 'Data Akunting';

    $this->load->view('layout/header', $data);
    $this->load->view('layout/modul');
    $this->load->view('layout/menu');
    $this->load->view('layout/breadcrumb');
    $this->load->view('akunting/dashboard', $data);
    $this->load->view('layout/footer');
  }

}
