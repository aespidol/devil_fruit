<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminslr extends CI_Controller {

	public function index() {
		$this->load->view('adminlogin');
	}

	public function register() {
		$this->adminlrmodel->register($this->input->post());
		redirect('/');
	}

	public function login() {
		$users = $this->travel->login($this->input->post());
		redirect('/dashadmin');
	}
}	