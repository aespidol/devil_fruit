<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logregs extends CI_Controller {
	
	// public function __construct() {
	// 	parent::__construct();
	// }

	public function index() {
		$this->load->view('adminlogin');
	}

	public function register() {
		$this->load->model('logregmodel');
		$this->logregmodel->register($this->input->post());
	}

	public function login() {
		$this->load->model('logregmodel');
		$users = $this->logregmodel->login($this->input->post());
		$loggedin = $this->session->set_userdata('loggedin', $users);
		$this->load->view('dashadmin');

	}

	public function logoff() {
		$this->session->sess_destroy();
		$this->session->set_flashdata("error_message", "Logged Out successfully!");
		redirect('/home');
	}
}	
?>