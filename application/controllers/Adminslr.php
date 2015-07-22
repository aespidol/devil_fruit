<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminslr extends CI_Controller {
	// public function __construct()
	// {
	// 	parent::__construct();
	// 	$this->load->model('Adminlrmodel');
	// }
	public function index() {
		$this->load->view('adminlogin');
	}

	public function register() {
		$this->adminlrmodel->register($this->input->post());
		$this->load->view('adminlogin');
	}

	// public function login() {
	// 	$users = $this->Adminlrmodel->login($this->input->post());
	// 	$this->load->view('dashadmin');
	// }
}	