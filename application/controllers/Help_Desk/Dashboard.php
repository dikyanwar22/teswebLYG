<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_login', 'model');
        header('Cache-Control: no-cache, must-revalidate, max-age=0');
        header('Cache-Control: post-check=0, pre-check=0',false);
        header('Pragma: no-cache');

        $this->load->model('Modulpage','model');
        if($this->session->userdata('id') == "") {
          redirect('Login/logout');
      }
    }

    public function index() {
      $data['title'] = 'Dashboard Helpdesk';

      $this->load->view('layout/header', $data);
      $this->load->view('layout/modul');
      $this->load->view('layout/menu');
      $this->load->view('layout/breadcrumb');
      $this->load->view('helpdesk/kanban', $data);
      $this->load->view('layout/footer');
    }

    public function comment_task() {
      $data['title'] = 'Dashboard Helpdesk';

      $this->load->view('layout/header', $data);
      $this->load->view('layout/modul');
      $this->load->view('layout/menu');
      $this->load->view('layout/breadcrumb');
      $this->load->view('helpdesk/comment_task', $data);
      $this->load->view('layout/footer');
    }

    public function total_helpdesk() {
      $data = array(
        'total' => '5'
      );
      echo json_encode($data);
    }

    public function helpdesk_in() {
      $data = array();
      for($i = 0; $i < 5; $i++) {
        $data[] = array(
          'url' => 'https://naikbnk.link/index.php/support/admin/permohonan_proses/QUxMLUhFTFAtMTgxODU5Nw==',
          'image' => 'https://static-00.iconduck.com/assets.00/user-icon-1024x1024-dtzturco.png',
          'name' => 'HRD', // batasi jangan sampai panjang
          'helpdesk' => 'Tolong bantuannya untuk memperbaiki system error', //batasi jangan sampai panjang
          'waktu' => '2 Hari yang lalu'
        );
      }
      echo json_encode($data);
    }

}
