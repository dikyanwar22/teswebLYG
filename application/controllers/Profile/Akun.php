<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_akun', 'model');
    }

    public function index() {
      $data['title'] = 'Akun';

      $this->load->view('layout/header', $data);
      $this->load->view('layout/modul');
      $this->load->view('layout/menu');
      $this->load->view('layout/breadcrumb');
      $this->load->view('profile/akun', $data);
      $this->load->view('layout/footer');
    }
}
