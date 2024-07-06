<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuPage extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function db_menu_dropdown($modul_id) {
		$level_akses = (int)$this->session->userdata('level_id');
		$this->db->select('id, modul_id, icon, nama AS menu');
		$this->db->from('menu');
		$this->db->where('modul_id',$modul_id);
		$this->db->where('deleted','0');
		$this->db->where('tipe','dropdown');
		$this->db->where('FIND_IN_SET(' . $level_akses . ', level_id) >', 0);
		$this->db->order_by('nama','ASC');
		$dropdown = $this->db->get()->result();
		return $dropdown;
	}

	public function db_sub_menu($menu_id) {
		$level_akses = (int)$this->session->userdata('level_id');
		$this->db->select('a.id, a.menu_id, a.nama AS sub_menu, c.uri AS folder, b.uri AS class, a.uri AS function');
		$this->db->from('sub_menu AS a');
		$this->db->join('menu AS b', 'a.menu_id = b.id');
		$this->db->join('modul AS c', 'b.modul_id = c.id');
		$this->db->where('a.menu_id', $menu_id);
		$this->db->where('a.deleted','0');
		$this->db->where('b.deleted', '0');
		$this->db->where('c.deleted', '0');
		$this->db->where('FIND_IN_SET(' . $level_akses . ', a.level_id) >', 0);
		$this->db->group_by('a.id');
		$this->db->order_by('a.nama', 'ASC');
		$sub = $this->db->get();
		return $sub->result();
	}

	public function db_update_submenu($data, $id) {
		$this->db->where('id',$id);
		$this->db->update('sub_menu',$data);
		return true;
	}

	public function db_submenu_row($id) {
		$this->db->select('*');
		$this->db->from('sub_menu');
		$this->db->where('id',$id);
		$this->db->limit(1);
		$db = $this->db->get();
		return $db->row();
	}

	public function menu_modul() {
		$this->db->select('b.id, b.nama AS menu');
		$this->db->from('menu AS b');
		$this->db->where('b.tipe','dropdown');
		$this->db->group_by('b.id');
		$this->db->order_by('b.nama');
		$db = $this->db->get();
		return $db;
	}

	public function db_insert_submenu($data) {
		$this->db->insert('sub_menu',$data);
		return true;
	}

	public function db_submenu() {
		$this->db->select('a.id, a.icon, a.deleted, a.level_id, a.uri AS function, b.uri AS class, a.nama AS sub_menu, b.nama AS menu');
		$this->db->from('sub_menu AS a');
		$this->db->join('menu AS b', 'a.menu_id = b.id');
		$this->db->group_by('a.id');
		$this->db->order_by('a.nama','ASC');
		$db = $this->db->get()->result();
		return $db;
	}

	public function db_edit_menu($data,$id) {
		$this->db->where('id',$id);
		$this->db->update('menu',$data);
		return true;
	}

	public function view_menu($id) {
		$this->db->select('*');
		$this->db->from('menu');
		$this->db->where('id',$id);
		$this->db->limit(1);
		$db = $this->db->get();
		return $db->row();
	}

	public function db_insert_menu($data) {
		$this->db->insert('menu',$data);
		return true;
	}

	public function db_menu() {
		$this->db->select('a.id, a.nama AS menu, a.icon, a.deleted, a.level_id, a.uri AS file');
		$this->db->from('menu AS a');
		$this->db->group_by('a.id');
		$this->db->order_by('a.nama', 'ASC');
		$db = $this->db->get()->result();
		return $db;
	}

	public function db_modul_row($id) {
		$this->db->select('*');
		$this->db->from('modul');
		$this->db->where('id',$id);
		$this->db->limit(1);
		$db = $this->db->get()->row();
		return $db;
	}

	public function db_insert_modul($data) {
		$this->db->insert('modul',$data);
		return true;
	}

	public function db_update_modul($data, $id) {
		$this->db->where('id',$id);
		$this->db->update('modul',$data);
		return true;
	}

	public function db_level() {
		$this->db->select('id, nama');
		$this->db->from('level');
		$this->db->where('deleted', '0');
		$this->db->order_by('nama','ASC');
		$db = $this->db->get()->row();
		return $db;
	}

	public function level() {
		$this->db->select('id, nama');
		$this->db->from('level');
		$this->db->where('deleted', '0');
		$this->db->order_by('nama','ASC');
		$db = $this->db->get();
		return $db;
	}

}
