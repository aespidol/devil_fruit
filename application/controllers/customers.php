<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('customer');
	}
	public function index()
	{
		if($this->session->userdata('cart_items') == null)
		{
			$this->session->set_userdata('cart_items', array());
		}
		$product = $this->customer->fetch_product();	
		$this->load->view('index', array(
				'products'=>$product
			));
	}
	public function product($id)
	{

		$product = $this->customer->get_product_by_id($id);
		$this->load->view('product', array(
				'product'=>$product
			));
	}
	public function cart()
	{
		$this->load->view('cart', array(
			'cart'=>$this->session->userdata('cart_items')
			));
	}
	public function add_cart()
	{
		$cart = $this->session->userdata('cart_items');
		for ($i=0; $i < count($cart); $i++) { 
			if($cart[$i]['id'] == $this->input->post()['id'])
			{
				$cart[$i]['quantity']++;
				$this->session->set_userdata('cart_items',$cart);
				$product = $this->customer->fetch_product();
				$this->load->view('index', array(
				'products'=>$product,
				'cart'=>$cart
				));
				redirect('/');
			}
		}
		array_push($cart, $this->input->post());
		$this->session->set_userdata('cart_items',$cart);
		$product = $this->customer->fetch_product();
		$this->load->view('index', array(
		'products'=>$product,
		'cart'=>$cart
		));
	}
	public function delete_cart($id)
	{
		$cart = $this->session->userdata('cart_items');
		$new_cart = array();
		for ($i=0; $i < count($cart); $i++) {
			if($cart[$i]['id'] != $id)
			{
				array_push($new_cart, $cart[$i]);
			}
		} 
		$this->session->set_userdata('cart_items', $new_cart);
		redirect('/customers/cart');
	}
	public function pay()
	{
		$this->customer->order($this->input->post());
		$this->session->sess_destroy();
		redirect('/');
	}
}
