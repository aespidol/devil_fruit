<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logregmodel extends CI_Model {
	
	public function register($post) {
		// validations
		$this->form_validation->set_rules("name", "Name", "trim|required");
		$this->form_validation->set_rules("email", "EMail", "trim|required|valid_email");
		$this->form_validation->set_rules("password", "Password", "trim|required|min_length[8]");
		$this->form_validation->set_rules("passwordconfirmation", "Password Confirmation", "trim|required|matches[password]");
			if($this->form_validation->run() === FALSE) {
				// had errors
				$this->session->set_flashdata('errors', validation_errors());
				redirect('/admin');
			}
			else {
				// no errors
				$query = "INSERT INTO users (name, email, password, created_at, updated_at) 
						  VALUES (?, ?, ?, NOW(), NOW())";
				$values = array($post['name'], $post['email'], $post['password']);
				$this->db->query($query, $values);
				$this->session->set_flashdata('success', "Registration is complete! Please log in!");
				redirect('/admin');
			    
			}
	}

	public function login($post) {
		$query = "SELECT name, email, id FROM users WHERE email = ? AND password = ?";
		$values = array($post['email'], $post['lpassword']);
		$users = $this->db->query($query,$values)->row_array();
		return $users;
	}
}