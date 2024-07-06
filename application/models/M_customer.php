<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_customer extends CI_Model {

  public function __construct() {
    parent::__construct();
    $this->load->database();
  }

  public function db_update($data, $id) {
    $this->db->where('id',$id);
    $this->db->update('customer', $data);
    return true;
  }

  public function db_edit($id) {
    $this->db->select('*');
    $this->db->from('customer');
    $this->db->where('id',$id);
    $this->db->limit(1);
    $db = $this->db->get();
    return $db->row();
  }

  public function db_insert($data) {
    $this->db->insert('customer', $data);
    return true;
  }

  public function db_customer($start_date, $end_date) {
    $this->db->select('*');
    $this->db->from('customer');
    $this->db->where('id !=', '1');
    $this->db->where('created_at >=', $start_date);
    $this->db->where('created_at <=', $end_date);
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }

}
