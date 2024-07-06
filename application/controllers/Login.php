<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_login', 'model');
    }

    public function index() {
        $this->load->view('login');
    }

    public function auth() {
        $username = $this->input->post('username');
        $pwd = $this->input->post('password');
        $password = md5($pwd);
        $auth = $this->model->auth($username, $password);
        if($auth->num_rows() > 0) {
            $val = $auth->row();
            $session = array(
              'id' => $val->id,
              'username' => $val->username,
              'email' => $val->email,
              'avatar' => $val->avatar,
              'level_id' => $val->level_id,
              'logged_in' => TRUE
          );
            $this->session->set_userdata($session);
            $row = $this->model->route_login($val->level_id);
            redirect('Home');
            // redirect($row->uri.'/Dashboard');
        } else {
            $this->session->set_flashdata('msg',
                '<div class="alert alert-danger alert-dismissible show fade">
                <div class="alert-body">
                <button class="close" data-dismiss="alert">
                <span>×</span>
                </button>
                Akun anda tidak aktif
                </div>
                </div>');
            redirect($_SERVER['HTTP_REFERER']);
            exit;
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('Login');
    }

    public function array_filter() {
        // Ambil data dari table1
        $this->db->select('id, nama');
        $query1 = $this->db->get('modul');
        $data1 = $query1->result_array();

        // Ambil data dari table2
        $this->db->select('modul_id');
        $query2 = $this->db->get('menu');
        $data2 = $query2->result_array();

        // Buat array filter berdasarkan kriteria tertentu
        $result = array_filter($data1, function ($row1) use ($data2) {

        // Ganti kondisi filter sesuai kebutuhan
        // Misalnya, kita ingin hanya menyertakan baris yang memiliki id yang sama di kedua tabel
            $filteredData2 = array_filter($data2, function ($row2) use ($row1) {
                return $row2['modul_id'] == $row1['id'];
            });
            return count($filteredData2) > 0;
        });

        // Hasil array filter
        echo '<pre>';
        var_dump($result);
        echo '</pre>';
    }

}
