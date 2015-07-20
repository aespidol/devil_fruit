<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('book');
	}
	public function index()
	{
		$this->load->view('index');
	}
	public function register()
	{
		$this->form_validation->set_rules('name',"Name", 'required');
		$this->form_validation->set_rules('username',"username", 'required|is_unique[users.username]');
		$this->form_validation->set_rules('email',"email", 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', "required|min_length[8]");
		$this->form_validation->set_rules('confirm_password', "Password", "required|matches[password]");


		if($this->form_validation->run() === FALSE)
		{
			 $this->view_data["errors"] = validation_errors();
			 $this->load->view("index", array("errors"=>$this->view_data["errors"]));
		}
		else
		{
			$this->book->register($this->input->post());
			$this->view_data["success"] = "You have successfully registered";
			$this->load->view("index", array(
				"success"=>$this->view_data["success"]
				));
		}
	}
	public function login()
	{
		$profile = $this->book->success($this->input->post());
		$this->session->set_userdata('profile', $profile);
		if(count($profile)>0)
		{
			$this->load->view('welcome',array(
			"profile"=>$this->session->userdata('profile')
			));			
		}
		else
		{
			$this->load->view('index',array('errors'=>"Cannot find user with matching credentials"));
		}
	}
	public function add()
	{
		$this->load->view('add');
	}
	public function addbook()
	{
		// Form Validation
		$this->form_validation->set_rules('title', 'Title', 'required');
		if(strlen($this->input->post()["stored_author"])>0)
		{
			$this->form_validation->set_rules('title', 'stored_author', 'required');
		}
		else
		{
			$this->form_validation->set_rules('title', 'author', 'required');	
		}
		$this->form_validation->set_rules('title', 'rating', 'required');
		// End validation
		if($this->form_validation->run() === FALSE)
		{
			$this->view_data["errors"] = validation_errors();
		 	$this->load->view("index", array("errors"=>$this->view_data["errors"]));	
		}
		else
		{
		$book = $this->input->post();
		$reviews = $this->book->add($this->input->post());
		$this->load->view('book_page',array(
				'book'=>$book,
				'reviews' => $reviews
			));
		}
	}
	public function book_page()
	{
		$this->load->view('book_page');
	}
	public function user()
	{
			$this->load->view('user',array(
			"profile"=>$this->session->userdata('profile')
			));	
	}
	public function home()
	{
			$this->load->view('welcome',array(
			"profile"=>$this->session->userdata('profile')
			));		
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
}
