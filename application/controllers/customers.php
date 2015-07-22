<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller {
	// public function __construct()
	// {
	// 	parent::__construct();
	// 	$this->load->model('book');
	// }
	public function index()
	{
		$this->load->view('index');
	}
	public function product()
	{
		$this->load->view('product');
	}
	public function cart()
	{
		$this->load->view('cart');
	}
}
