<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dash extends CI_Model {
	
	public function addproduct($post) {
		$this->form_validation->set_rules("productname", "Product Name", "trim|required");
		$this->form_validation->set_rules("proddesc", "Description", "trim|required");
		$this->form_validation->set_rules("newcate", "Categories", "trim|required");
		$this->form_validation->set_rules("quantity", "Quantity", "trim|required|integer");
		$this->form_validation->set_rules("price", "Price", "trim|required|is_natural");
		
		if (empty($_FILES['prodimg'])) {
    		$this->form_validation->set_rules('prodimg', 'Document', 'required');
		}

		if($this->form_validation->run() === FALSE) {
			// had errors
			$this->session->set_flashdata('errors', validation_errors());
		}
		else {
			// no errors
			$query = "INSERT INTO products (name, description, type, quantity, price, image, created_at, updated_at) 
					  VALUES (?, ?, ?, ?, ?, ?, NOW(), NOW())";
			$values = array($post['productname'], $post['proddesc'], $post['newcate'], $post['quantity'], $post['price'], $post['prodimg']);
			$this->db->query($query, $values);
			$this->session->set_flashdata('success', "Product has been added successfully!");
		    
		}
	}

	public function editproduct() {
		$query = "UPDATE products
				  SET name=?, description=?, type=?, image=?, updated_at=NOW()
				  WHERE id=?";
	}

	public function get_products() {
		$query = "SELECT * FROM products";
		return $this->db->query($query)->result_array();
	}

	public function delete_row($id) {
		$query = "DELETE FROM products WHERE products.id = ? LIMIT 1";
		$values = array($id);
		$this->db->query($query, $values);
	}
}