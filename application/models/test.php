<?php

class Test extends CI_Model {

	function __construct() {
		parent::__construct();
		
		$this->load->database();
	}

	function user_insert($arr) {
		$this->db->insert('login',$arr);
	}

	function user_update($id,$arr) {
		$this->db->where('id',$id);
        $this->db->update('login',$arr);
	}

	function user_del($id) {
		$this->db->where('id',$id);
        $this->db->update('login');
	}

	function user_select($uname) {
		$this->db->where('user_name',$uname);
		$this->db->select('*');
		$qerry = $this->db->get('gs_users');
		return $qerry->result();
	}

}










