<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admindash extends CI_Controller {
	
	// public function __construct() {
	// parent::__construct();
	// $this->load->model('admindashmodel');
	// }

	public function index() {
		$this->load->view('productedit');
	}

	public function products() {
		$this->load->view('productedit');
	}
}	