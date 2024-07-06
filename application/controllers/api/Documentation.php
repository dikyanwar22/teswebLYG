<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Documentation extends CI_Controller {

  public function __construct() {
    parent::__construct();
    header('Cache-Control: no-cache, must-revalidate, max-age=0');
    header('Cache-Control: post-check=0, pre-check=0',false);
    header('Pragma: no-cache');

    $this->load->model('api/M_documentation','model');
    if($this->session->userdata('id') == "") {
      redirect('Login/logout');
    }
  }

  public function index() {
    //Edit Modal
    if ($this->input->get('formEdit')) {
      $id = $this->input->post('id');
      $this->db->select('id, nama');
      $this->db->from('api');
      $this->db->where('id',$id);
      $this->db->order_by('nama','ASC');
      $records = $this->db->get()->result_array();
      $hasil = "";
      foreach ($records as $record) {
        $hasil .= '<div class="form-group row" hidden>
            <div class="col-lg-12">
                <label class="form-label">ID API</label>
                <input name="id" value="'.$record['id'].'" class="form-control" placeholder="Nama" type="text" required />
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-12">
                <label class="form-label">Nama API</label>
                <input name="nama" value="'.$record['nama'].'" class="form-control" placeholder="Nama" type="text" required />
            </div>
        </div>
        <div class="form-group row" style="margin-left:20px">
            <div class="col-lg-12">
                <label class="checkbox">
                    <input type="checkbox" value="1" name="agreement" required>
                    Saya bersedia bertanggung jawab atas data yang telah inputkan.
                </label>
            </div>
        </div>';
      }
      die($hasil);
    }
    //Edit Modal

    $data['title'] = 'Dokumentasi API';
    $data['api_data'] = $this->model->view_api();
    $this->load->view('api_documentation/index',$data);
  }

  public function api_add() {
    $data = array(
      'nama' => $this->input->post('nama'),
      'deleted' => '0',
      'created_at' => date('Y-m-d H:i:s'),
      'created_by' => $this->session->userdata('id'),
    );
    $ex = $this->model->insert_api($data);
    if($ex) {
      $this->session->set_flashdata('msg',
      '<div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>Simpan Data Berhasil</h4>
      </div>');
      redirect($_SERVER['HTTP_REFERER']);
      exit;
    } else {
      $this->session->set_flashdata('msg',
      '<div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>Simpan Data Gagal</h4>
      </div>');
      redirect($_SERVER['HTTP_REFERER']);
      exit;
    }
  }

  public function api_edit() {
    $id = $this->input->post('id');
    $data = array(
      'nama' => $this->input->post('nama'),
      'deleted' => '0',
      'created_at' => date('Y-m-d H:i:s'),
      'created_by' => $this->session->userdata('id'),
    );
    $ex = $this->model->edit_api($data, $id);
    if($ex) {
      $this->session->set_flashdata('msg',
      '<div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>Update Data Berhasil</h4>
      </div>');
      redirect($_SERVER['HTTP_REFERER']);
      exit;
    } else {
      $this->session->set_flashdata('msg',
      '<div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>Update Data Gagal</h4>
      </div>');
      redirect($_SERVER['HTTP_REFERER']);
      exit;
    }
  }

  public function deleted_api($id) {
    $data = array(
      'deleted' => '1',
    );
    $ex = $this->model->edit_api($data, $id);
    if($ex) {
      $this->session->set_flashdata('msg',
      '<div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>Hapus Data Berhasil</h4>
      </div>');
      redirect($_SERVER['HTTP_REFERER']);
      exit;
    } else {
      $this->session->set_flashdata('msg',
      '<div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>Hapus Data Gagal</h4>
      </div>');
      redirect($_SERVER['HTTP_REFERER']);
      exit;
    }
  }

  public function list_api($params_id) {
    $decode_id = urldecode($params_id);
    $id = base64_decode($decode_id);

    $data['title'] = 'Daftar API';
    $data['name_api'] = $this->model->db_api($id);
    $data['list_api'] = $this->model->list_api($id);
    $this->load->view('api_documentation/list_api',$data);
  }

  public function add_list_api($params_id) {
    $decode_id = urldecode($params_id);
    $id = base64_decode($decode_id);

    $data['title'] = 'Tambah API';
    $data['v'] = $this->model->db_api($id);
    $this->load->view('api_documentation/list_api_add',$data);
  }

  public function edit_list_api($var_id, $params_id) {
    $dec = urldecode($var_id);
    $id_var = base64_decode($dec);

    $decode_id = urldecode($params_id);
    $id = base64_decode($decode_id);

    $data['title'] = 'Edit API';
    $data['v'] = $this->model->db_api($id);
    $data['edit'] = $this->model->db_view($id_var);
    $this->load->view('api_documentation/list_api_edit',$data);
  }

  public function action_add_list_api() {

    $method = $this->input->post('method');
    $struktural = ($method == 'GET' || $method == 'DELETE') ? 'Params' : $this->input->post('struktural');

    $data = array(
      'api_id' => $this->input->post('api_id'),
      'nama' => $this->input->post('nama'),
      'ket_nama' => $this->input->post('ket_nama'),
      'method' => $method,
      'url' => $this->input->post('url'),
      'struktural' => $struktural,
      'permintaan' => $this->input->post('permintaan'),
      'inputan' => $this->input->post('inputan'),
      'hasil' => $this->input->post('hasil'),
      'deleted' => '0',
      'created_at' => date('Y-m-d H:i:s'),
      'created_by' => $this->session->userdata('id'),
    );
    $ex = $this->model->db_add_api($data);
    if($ex) {
      $this->session->set_flashdata('msg',
      '<div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>Simpan Data Berhasil</h4>
      </div>');
      redirect($_SERVER['HTTP_REFERER']);
      exit;
    } else {
      $this->session->set_flashdata('msg',
      '<div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>Simpan Data Gagal</h4>
      </div>');
      redirect($_SERVER['HTTP_REFERER']);
      exit;
    }
  }

  public function action_edit_list_api($id) {
    $method = $this->input->post('method');
    $data = array(
      'nama' => $this->input->post('nama', true),
      'ket_nama' => $this->input->post('ket_nama', true),
      'method' => $method,
      'url' => $this->input->post('url', true),
      'struktural' => ($method == 'GET' || $method == 'DELETE') ? 'Params' : $this->input->post('struktural', true),
      'permintaan' => ($method == 'GET' || $method == 'DELETE') ? null : $this->input->post('permintaan', true),
      'inputan' => ($method == 'GET' || $method == 'DELETE') ? null : $this->input->post('inputan', true),
      'hasil' => $this->input->post('hasil', true),
      'updated_at' => date('Y-m-d H:i:s'),
      'updated_by' => $this->session->userdata('id'),
    );
    $ex = $this->model->db_edit_api($data, $id);
    if($ex) {
      $this->session->set_flashdata('msg',
      '<div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>Update Data Berhasil</h4>
      </div>');
      redirect($_SERVER['HTTP_REFERER']);
      exit;
    } else {
      $this->session->set_flashdata('msg',
      '<div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>Update Data Gagal</h4>
      </div>');
      redirect($_SERVER['HTTP_REFERER']);
      exit;
    }
  }

  public function deleted_list_api($id) {
    $data = array(
      'deleted' => '1',
    );
    $ex = $this->model->edit_list_api($data, $id);
    if($ex) {
      $this->session->set_flashdata('msg',
      '<div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>Hapus Data Berhasil</h4>
      </div>');
      redirect($_SERVER['HTTP_REFERER']);
      exit;
    } else {
      $this->session->set_flashdata('msg',
      '<div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>Hapus Data Gagal</h4>
      </div>');
      redirect($_SERVER['HTTP_REFERER']);
      exit;
    }
  }

  public function result($params_id) {
    $decode_id = urldecode($params_id);
    $id_var = base64_decode($decode_id);

    $data['title'] = 'Result API';
    $data['v'] = $this->model->db_view($id_var);
    $this->load->view('api_documentation/result_api',$data);
  }

}
