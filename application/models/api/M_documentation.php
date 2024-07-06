<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_documentation extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

  public function view_api() {
    $this->db->select('*');
    $this->db->from('api');
    $this->db->where('deleted', '0');
    $data = $this->db->get()->result();
    return $data;
  }

  public function edit_api($data, $id) {
    $this->db->where('id', $id);
    $this->db->update('api', $data);
    return true;
  }

  public function insert_api($data) {
    $this->db->insert('api',$data);
    return true;
  }

  public function db_api($id) {
    $this->db->select('*');
    $this->db->from('api');
    $this->db->where('id', $id);
    $this->db->where('deleted', '0');
    $data = $this->db->get()->row();
    return $data;
  }

  public function list_api($id) {
    $this->db->select('*');
    $this->db->from('api_list');
    $this->db->where('api_id', $id);
    $this->db->where('deleted', '0');
    $data = $this->db->get();
    return $data;
  }

  public function edit_list_api($data, $id) {
    $this->db->where('id', $id);
    $this->db->update('api_list', $data);
    return true;
  }

  public function db_view($id_var) {
    $this->db->select('*');
    $this->db->from('api_list');
    $this->db->where('id', $id_var);
    $this->db->where('deleted', '0');
    $data = $this->db->get()->row();
    return $data;
  }

  public function db_add_api($data) {
    $this->db->insert('api_list', $data);
    return true;
  }

	public function db_edit_api($data, $id) {
		$this->db->where('id', $id);
		$this->db->update('api_list', $data);
		return true;
	}

}
