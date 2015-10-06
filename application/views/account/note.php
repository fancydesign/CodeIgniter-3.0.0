<?php

class Test extends CI_Model {

	function __construct() {
		parent::__construct();
		
		$this->load->database();
	}

	function user_insert($arr) {
		$this->db->insert('user',$arr);
	}

	function user_update() {
		$this->db->where('user',$arr);
	}

}










