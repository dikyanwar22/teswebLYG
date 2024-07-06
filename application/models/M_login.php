<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function auth($username, $password) {
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$this->db->limit(1);
		$db = $this->db->get();
		return $db;
	}

	public function route_login($id) {
		$this->db->select('uri');
		$this->db->from('menu');
		$this->db->where('deleted', '0');
		$this->db->where('FIND_IN_SET(' . $id . ', level_id) >', 0);
		$this->db->order_by('nama', 'ASC');
		$this->db->limit(1);
		$db = $this->db->get()->row();
		return $db;
	}

}
