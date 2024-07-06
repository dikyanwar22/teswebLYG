<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

  public function __construct() {
    parent::__construct();
    header('Cache-Control: no-cache, must-revalidate, max-age=0');
    header('Cache-Control: post-check=0, pre-check=0',false);
    header('Pragma: no-cache');

    $this->load->helper(array('form', 'url'));
		$this->load->library('session','upload','form_validation');
    $this->load->model('M_customer','model');

    if($this->session->userdata('id') == "") {
      redirect('Login/logout');
    }

  }

  public function index() {
    $submit = $this->input->post('find');
    if($submit) {
      $start_date = $this->input->post('start_date');
      $end_date = $this->input->post('end_date');
      $show = $this->model->db_customer($start_date, $end_date);
    } else {
      $start_date = date('Y-m-01');
      $end_date = date('Y-m-t');
      $show = '';
    }

    $data = [
      'start_date' => $start_date,
      'end_date' => $end_date,
      'data' => $show,
      'title' => 'Data Customer',
    ];
    $this->load->view('layout/header', $data);
    $this->load->view('layout/modul');
    $this->load->view('layout/menu');
    $this->load->view('layout/breadcrumb');
    $this->load->view('customer/index', $data);
    $this->load->view('layout/footer');
  }

  public function add() {
    $data = [
      'title' => 'Tambah Customer',
    ];
    $this->load->view('layout/header', $data);
    $this->load->view('layout/modul');
    $this->load->view('layout/menu');
    $this->load->view('layout/breadcrumb');
    $this->load->view('customer/add', $data);
    $this->load->view('layout/footer');
  }

  public function edit($params_id) {
    $decode_id = urldecode($params_id);
    $id = base64_decode($decode_id);

    $data = [
      'title' => 'Edit Customer',
      'v' => $this->model->db_edit($id),
    ];
    $this->load->view('layout/header', $data);
    $this->load->view('layout/modul');
    $this->load->view('layout/menu');
    $this->load->view('layout/breadcrumb');
    $this->load->view('customer/edit', $data);
    $this->load->view('layout/footer');
  }

  function add_action() {
    $nama_file = "Home-" . time();
    $config['upload_path'] = './assets/img/';
    $config['allowed_types'] = 'jpg|jpeg|png';
    $config['max_size'] = 5000;
    $config['file_name'] = $nama_file;

    $this->load->library('upload', $config);
    $this->upload->initialize($config);

    if ($this->upload->do_upload('rumah')) {
        $image = $this->upload->data();
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'id' => date('ymdHis'),
            'nama' => $this->input->post('nama'),
            'hp' => $this->input->post('hp'),
            'alamat' => $this->input->post('alamat'),
            'img' => $image['file_name'],
            'latitude' => $this->input->post('latitude'),
            'longitude' => $this->input->post('longitude'),
            'deleted' => '0',
            'created_by' => $this->session->userdata('id'),
            'created_at' => date('Y-m-d H:i:s'),
        );
        $ex = $this->model->db_insert($data);
        if ($ex) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>Simpan Data Berhasil</h4>
                </div>');
            redirect('Home');
            exit;
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>Simpan Data Gagal</h4>
                </div>');
            redirect($_SERVER['HTTP_REFERER']);
            exit;
        }
    } else {
        $error = array('error' => $this->upload->display_errors());
        $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4>' . $error['error'] . '</h4>
            </div>');
        redirect($_SERVER['HTTP_REFERER']);
        exit;
    }
}

  public function edit_action($id) {
    $this->load->library('upload');
    $this->form_validation->set_rules([
        ['field' => 'rumah_lama', 'label' => 'rumah_lama', 'rules' => 'trim|required'],
        ['field' => 'nama', 'label' => 'nama', 'rules' => 'trim|required'],
        ['field' => 'hp', 'label' => 'hp', 'rules' => 'trim|required'],
        ['field' => 'alamat', 'label' => 'alamat', 'rules' => 'trim|required'],
    ]);

    if ($this->form_validation->run()) {
        $upload = $this->upload('rumah');

        if (!empty($upload)) {
            if ($upload['error'] == 0) {
                $_POST['rumah_lama'] = $upload['location'];
            } else {
                $this->form_validation->set_rules('rumah', 'rumah', 'required', array('required' => $upload['message']));
            }
        }
    } else {
        redirect($_SERVER['HTTP_REFERER']);
        exit;
    }

    $data = array(
        'nama' => $this->input->post('nama'),
        'hp' => $this->input->post('hp'),
        'alamat' => $this->input->post('alamat'),
        'img' => $this->input->post('rumah_lama'),
        'deleted' => '0',
        'updated_by' => $this->session->userdata('id'),
        'updated_at' => date('Y-m-d H:i:s'),
    );

    $ex = $this->model->db_update($data, $id);

    if ($ex) {
        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>Update Data Berhasil</h4>
        </div>');
        redirect('Home');
        exit;
    } else {
        $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>Update Data Gagal</h4>
        </div>');
        redirect($_SERVER['HTTP_REFERER']);
        exit;
    }
}

protected function upload($field) {
    if (isset($_FILES[$field]['tmp_name']) && !empty($_FILES[$field]['tmp_name'])) {
        $path = './assets/img/';
        $nama_file = "Home-" . time();
        $config['upload_path'] = $path;
        $config['file_name'] = $nama_file;
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 5000;

        $this->upload->initialize($config);

        if (file_exists($path . trim($this->input->post('rumah_lama')))) {
            unlink($path . trim($this->input->post('rumah_lama')));
        }

        if ($this->upload->do_upload($field)) {
            $data = $this->upload->data();
            $data['error'] = 0;
            $data['location'] = $data['file_name'];
            return $data;
        } else {
            return array(
                'error' => 1,
                'message' => strip_tags($this->upload->display_errors())
            );
        }
    } else {
        return NULL;
    }
}


}
