<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admindashmodel extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
	}

	public function get_search($post) {
		$match->input->post('search');
		$this->db->like('customer', $match);
		$this->db->like('products', $match);
		$this->db->like('users', $match);
	}
}	