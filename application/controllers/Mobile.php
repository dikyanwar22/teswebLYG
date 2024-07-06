<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobile extends CI_Controller {

  public function __construct() {
    parent::__construct();
    header('Cache-Control: no-cache, must-revalidate, max-age=0');
    header('Cache-Control: post-check=0, pre-check=0',false);
    header('Pragma: no-cache');

    $this->load->model('M_customer','model');
  }

  public function detail($params_id) {
    $decode_id = urldecode($params_id);
    $id = base64_decode($decode_id);
    $data = [
        'title' => 'Detail Customer',
        'v' => $this->model->db_edit($id),
    ];
    $this->load->view('customer/detail', $data);
  }

}