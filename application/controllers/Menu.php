<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

  public function __construct() {
    parent::__construct();
    header('Cache-Control: no-cache, must-revalidate, max-age=0');
    header('Cache-Control: post-check=0, pre-check=0',false);
    header('Pragma: no-cache');

    $this->load->model('MenuPage','model');
    if($this->session->userdata('id') == "") {
      redirect('Login/logout');
    }

    //hak akses CRUD Menu hanya untuk IT
    $this->hak_akses_menu = '1';
  }

  public function index() {
    if($this->session->userdata('level_id') != $this->hak_akses_menu) {
      redirect('Login/logout');
      die;
    }

    $data['title'] = 'Data Menu';
    $data['menu'] = $this->model->db_menu();
    //nested looping
    foreach($data['menu'] as $key => $value) {
      $string = "$value->level_id";
      $level = explode(",", $string);

      $array = array();
      for($i = 0; $i < count($level); $i++) {
        $this->db->select('nama');
        $this->db->from('level');
        $this->db->where('deleted', '0');
        $this->db->where('id', $level[$i]);
        $this->db->order_by('nama','ASC');
        $db = $this->db->get()->row();
        $array[] = $db->nama;
      }
      $data['akses'][$value->id] = $array;
    }
    //nested looping
    $this->load->view('menupage/menu/menu',$data);
  }

  public function add_menu() {
    if($this->session->userdata('level_id') != $this->hak_akses_menu) {
      redirect('Login/logout');
      die;
    }
    $data['title'] = 'Tambah Menu';
    $data['level'] = $this->model->level();
    $this->load->view('menupage/menu/menu_add',$data);
  }

  public function edit_menu($params_id) {
    if($this->session->userdata('level_id') != $this->hak_akses_menu) {
      redirect('Login/logout');
      die;
    }

    $decode_id = urldecode($params_id);
    $id = base64_decode($decode_id);

    $data['title'] = 'Ubah Menu';
    $data['level'] = $this->model->level();
    $data['e'] = $this->model->view_menu($id);
    $this->load->view('menupage/menu/menu_edit',$data);
  }

  public function action_add_menu() {
    $level_id = $this->input->post('hak_akses');
    $hak_akses = implode(',', $level_id);

    $menu = $this->input->post('menu');
    $file = preg_replace("/\s+/", "_", $menu);
    $data = array(
      'nama' => $menu,
      'uri' => $this->input->post('uri'),
      'icon' => $this->input->post('icon'),
      'tipe' => $this->input->post('tipe'),
      'level_id' => $hak_akses,
      'created_by' => $this->session->userdata('id'),
      'created_username' => $this->session->userdata('username'),
      'created_at' => date('Y-m-d H:i:s')
    );
    $x = $this->model->db_insert_menu($data);
    if($x) {
      $this->session->set_flashdata('msg',
      '<div class="alert alert-success alert-dismissible show fade">
      <div class="alert-body">
      <button class="close" data-dismiss="alert">
      <span>×</span>
      </button>
      Tambah Data Berhasil
      </div>
      </div>');
      redirect('Menu/index');
    } else {
      $this->session->set_flashdata('msg',
      '<div class="alert alert-danger alert-dismissible show fade">
      <div class="alert-body">
      <button class="close" data-dismiss="alert">
      <span>×</span>
      </button>
      Tambah Data Gagal
      </div>
      </div>');
      redirect($_SERVER['HTTP_REFERER']);
      exit;
    }
  }

  public function action_edit_menu($id) {
    $level_id = $this->input->post('hak_akses');
    $hak_akses = implode(',', $level_id);

    $menu = $this->input->post('menu');
    $file = preg_replace("/\s+/", "_", $menu);
    $data = array(
      'nama' => $menu,
      'uri' => $this->input->post('uri'),
      'icon' => $this->input->post('icon'),
      'tipe' => $this->input->post('tipe'),
      'level_id' => $hak_akses,
      'deleted' => $this->input->post('deleted'),
      'updated_by' => $this->session->userdata('id'),
      'updated_username' => $this->session->userdata('username'),
      'updated_at' => date('Y-m-d H:i:s')
    );
    $x = $this->model->db_edit_menu($data,$id);
    if($x) {
      $this->session->set_flashdata('msg',
      '<div class="alert alert-success alert-dismissible show fade">
      <div class="alert-body">
      <button class="close" data-dismiss="alert">
      <span>×</span>
      </button>
      Ubah Data Berhasil
      </div>
      </div>');
      redirect('Menu/index');
    } else {
      $this->session->set_flashdata('msg',
      '<div class="alert alert-danger alert-dismissible show fade">
      <div class="alert-body">
      <button class="close" data-dismiss="alert">
      <span>×</span>
      </button>
      Ubah Data Gagal
      </div>
      </div>');
      redirect($_SERVER['HTTP_REFERER']);
      exit;
    }
  }

  public function submenu() {
    if($this->session->userdata('level_id') != $this->hak_akses_menu) {
      redirect('Login/logout');
      die;
    }

    $data['title'] = 'Sub Menu';
    $data['sub'] = $this->model->db_submenu();
    foreach($data['sub'] as $key => $v) {

      $string = "$v->level_id";
      $level = explode(",", $string);
      $array = array();
      for($i=0; $i < count($level); $i++) {
        $this->db->select('nama');
        $this->db->from('level');
        $this->db->where('deleted', '0');
        $this->db->where('id', $level[$i]);
        $this->db->order_by('nama','ASC');
        $db = $this->db->get()->row();
        $array[] = $db->nama;
      }
      $data['akses'][$v->id] = $array;
    }
    $this->load->view('menupage/sub_menu/sub_menu',$data);
  }

  public function add_sub_menu() {
    if($this->session->userdata('level_id') != $this->hak_akses_menu) {
      redirect('Login/logout');
      die;
    }
    $data['title'] = 'Tambah Sub Menu';
    $data['menu'] = $this->model->menu_modul();
    $data['level'] = $this->model->level();
    $this->load->view('menupage/sub_menu/add_sub_menu',$data);
  }

  public function edit_sub_menu($params_id) {
    if($this->session->userdata('level_id') != $this->hak_akses_menu) {
      redirect('Login/logout');
      die;
    }

    $decode_id = urldecode($params_id);
    $id = base64_decode($decode_id);

    $data['title'] = 'Edit Sub Menu';
    $data['menu'] = $this->model->menu_modul();
    $data['level'] = $this->model->level();
    $data['e'] = $this->model->db_submenu_row($id);
    $this->load->view('menupage/sub_menu/edit_sub_menu',$data);
  }

  public function action_add_sub_menu() {
    $level_id = $this->input->post('hak_akses');
    $hak_akses = implode(',', $level_id);

    $sub_menu = $this->input->post('sub_menu');
    $file = preg_replace("/\s+/", "_", $sub_menu);
    $data = array(
      'menu_id' => $this->input->post('menu_id'),
      'nama' => $sub_menu,
      'uri' => $this->input->post('uri'),
      'icon' => $this->input->post('icon'),
      'level_id' => $hak_akses,
      'created_by' => $this->session->userdata('id'),
      'created_username' => $this->session->userdata('username'),
      'created_at' => date('Y-m-d H:i:s')
    );
    $x = $this->model->db_insert_submenu($data);
    if($x) {
      $this->session->set_flashdata('msg',
      '<div class="alert alert-success alert-dismissible show fade">
      <div class="alert-body">
      <button class="close" data-dismiss="alert">
      <span>×</span>
      </button>
      Tambah Data Berhasil
      </div>
      </div>');
      redirect('Menu/submenu');
    } else {
      $this->session->set_flashdata('msg',
      '<div class="alert alert-danger alert-dismissible show fade">
      <div class="alert-body">
      <button class="close" data-dismiss="alert">
      <span>×</span>
      </button>
      Tambah Data Gagal
      </div>
      </div>');
      redirect($_SERVER['HTTP_REFERER']);
      exit;
    }
  }

  public function action_edit_sub_menu($id) {
    $level_id = $this->input->post('hak_akses');
    $hak_akses = implode(',', $level_id);

    $sub_menu = $this->input->post('sub_menu');
    $file = preg_replace("/\s+/", "_", $sub_menu);
    $data = array(
      'menu_id' => $this->input->post('menu_id'),
      'nama' => $sub_menu,
      'uri' => $this->input->post('uri'),
      'icon' => $this->input->post('icon'),
      'level_id' => $hak_akses,
      'deleted' => $this->input->post('deleted'),
      'updated_by' => $this->session->userdata('id'),
      'updated_username' => $this->session->userdata('username'),
      'updated_at' => date('Y-m-d H:i:s')
    );
    $x = $this->model->db_update_submenu($data, $id);
    if($x) {
      $this->session->set_flashdata('msg',
      '<div class="alert alert-success alert-dismissible show fade">
      <div class="alert-body">
      <button class="close" data-dismiss="alert">
      <span>×</span>
      </button>
      Ubah Data Berhasil
      </div>
      </div>');
      redirect('Menu/submenu');
    } else {
      $this->session->set_flashdata('msg',
      '<div class="alert alert-danger alert-dismissible show fade">
      <div class="alert-body">
      <button class="close" data-dismiss="alert">
      <span>×</span>
      </button>
      Ubah Data Gagal
      </div>
      </div>');
      redirect($_SERVER['HTTP_REFERER']);
      exit;
    }
  }

  public function hak_akses() {
    $id = $this->input->post('id');

    $this->db->select('id, nama');
    $this->db->from('level');
    $this->db->where('deleted', '0');
    $this->db->where_in('id',$id);
    $this->db->order_by('nama','ASC');
    $this->db->group_by('id');
    $data = $this->db->get()->result();
    echo json_encode($data);
  }

  public function tampil_modul() {
    //tidak masuk modul
    $where_not = ['11']; //id profile

    $level_akses = (int)$this->session->userdata('level_id');
    $this->db->select('id, nama AS modul, icon, uri');
    $this->db->from('modul');
    $this->db->where('FIND_IN_SET(' . $level_akses . ', level_id) >', 0);
    $this->db->where('deleted', '0');
    if (!empty($where_not)) {
      $this->db->where_not_in('id', $where_not);
    }
    $this->db->order_by('nama', 'ASC');
    $modul = $this->db->get()->result();
    echo json_encode($modul);
  }

  public function menu_didalam_menu() {
    //menu tunggal
    $level_akses = (int)$this->session->userdata('level_id');
    $this->db->select('a.id, a.icon, a.nama AS menu, a.uri AS class');
    $this->db->from('menu AS a');
    $this->db->where('a.deleted','0');
    $this->db->where('a.tipe','menu');
    $this->db->where('FIND_IN_SET(' . $level_akses . ', a.level_id) >', 0);
    $this->db->order_by('a.nama','ASC');
    $menu = $this->db->get()->result();
    //menu tunggal

    //sub menu
    $level_akses = (int)$this->session->userdata('level_id');
    $this->db->select('id, icon, nama AS menu, uri AS class');
    $this->db->from('menu');
    $this->db->where('deleted','0');
    $this->db->where('tipe','dropdown');
    $this->db->where('FIND_IN_SET(' . $level_akses . ', level_id) >', 0);
    $this->db->order_by('nama','ASC');
    $dropdown = $this->db->get()->result();
    //sub menu

    $array = array();
    foreach($menu as $ket => $menu_tunggal) {
      $array['menu_tunggal'][] = $menu_tunggal;
    }
    foreach($dropdown as $key => $sub) {
      $array['sub_menu'][] = $sub;
    }
    echo json_encode($array);
  }

  public function sub_menu() {
    $level_akses = (int)$this->session->userdata('level_id');
    $menu_id = $this->input->post('menu_id');

    $this->db->select('a.id, a.menu_id, a.nama AS sub_menu, a.icon AS icon_sub, a.uri AS uri_sub, a.uri AS function, b.uri AS class');
    $this->db->from('sub_menu AS a');
    $this->db->join('menu AS b', 'a.menu_id = b.id');
    $this->db->where_in('a.menu_id', $menu_id);
    $this->db->where('a.deleted','0');
    $this->db->where('b.deleted', '0');
    $this->db->where('FIND_IN_SET(' . $level_akses . ', a.level_id) >', 0);
    $this->db->group_by('a.id');
    $this->db->order_by('a.nama', 'ASC');
    $data = $this->db->get()->result();

    $array = array();
    foreach($data as $key => $row) {

      $count_notif = '';
      switch ($row->id) {
        case '15':
        $count_notif = '17';
        break;
        case '16':
        $count_notif = '21';
        break;
        case '17':
        $count_notif = '15';
        break;
      }

      $array[] = array(
        'id' => $row->id,
        'menu_id' => $row->menu_id,
        'sub_menu' => $row->sub_menu,
        'class' => $row->class,
        'function' => $row->function,
        'total' => $count_notif,
        'icon_sub' => $row->icon_sub,
        'uri_sub' => $row->uri_sub,
      );
    }
    echo json_encode($array);
  }

}

// https://mfikri.com/artikel/Meload-data-dari-database-dengan-ajax-dan-datatable-menggunakan-codeigniter.html
