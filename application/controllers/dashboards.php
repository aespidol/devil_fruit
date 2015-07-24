<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboards extends CI_Controller {
	
	// public function __construct() {
	// 	parent::__construct();
	// }

	public function index() {
		$this->load->view('dashadmin');
	}

	public function addproduct() {
		$this->load->model('dash');
		$this->dash->addproduct($this->input->post());
		redirect('products');
	}

	public function editproduct() {
		$this->load->model('dash');
		$this->dash->editproduct($this->input->post());
	}

	public function get_products() {
		$this->load->model('dash');
		$allprod = $this->dash->get_products();
		$this->load->view('productedit', array('allprod' => $allprod));
	}

	public function delete_row($id) {
		$this->load->model('dash');
		$this->dash->delete_row($id);
		$this->get_products();
	}
}