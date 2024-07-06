<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inbox_Helpdesk extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('task/M_task', 'model');
    header('Cache-Control: no-cache, must-revalidate, max-age=0');
    header('Cache-Control: post-check=0, pre-check=0',false);
    header('Pragma: no-cache');

    $this->load->model('Modulpage','model');
    if($this->session->userdata('id') == "") {
      redirect('Login/logout');
    }
  }

  public function index() {
    $data['title'] = 'Inbox Helpdesk';
    $this->load->view('helpdesk/inbox_helpdesk', $data);
  }

  public function detail_helpdesk() {
    $data['title'] = 'Detail Helpdesk';
    $this->load->view('helpdesk/detail_helpdesk', $data);
  }

}
