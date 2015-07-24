<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Model {
	public function fetch_product()
	{
		$query = "SELECT * FROM products";
		return $this->db->query($query)->result_array();
	}
	public function get_product_by_id($id)
	{
		$query = "SELECT * FROM products WHERE id = ?";
		$values = array($id);
		return $this->db->query($query,$values)->row_array();
	}
	public function order($post)
	{
		//Insert Customer
		$query = "INSERT INTO customers(name, created_at, updated_at)
					VALUES (?,NOW(),NOW())";
		$values= array($post['first_name_shipping']." ".$post['last_name_shipping']);
		$this->db->query($query,$values);
		//Insert Shipping
		$id = $this->db->insert_id();
		$query = "INSERT INTO ship_to(address, city, state, country, zip, customers_id, created_at, updated_at)
					VALUES (?,?,?,?,?,?,NOW(),NOW())";
		$values = array($post['address_shipping'], $post['city_shipping'], $post['state_shipping'], $post['country_shipping'], $post['zipcode_shipping'], $id);
		$this->db->query($query,$values);
		//Insert Billing
		$query = "INSERT INTO bill_to(address, city, state, country, zip, customers_id, created_at, updated_at)
					VALUES (?,?,?,?,?,?,NOW(),NOW())";
		$values = array($post['address_billing'], $post['city_billing'], $post['state_billing'], $post['country_billing'], $post['zipcode_billing'], $id);
		$this->db->query($query,$values);
		//Start Order
		$query = "INSERT INTO orders(customers_id,created_at,updated_at)
					VALUES (?,NOW(),NOW())";
		$values = array($id);
		$this->db->query($query,$values);
		//Insert Order Content
		$cart = $this->session->userdata('cart_items');
		$order_id = $this->db->insert_id();
		foreach($cart as $item){
		$query = "INSERT INTO order_has_products(orders_id, products_id, quantity_sold, created_at, updated_at)
					VALUES (?,?,?,NOW(),NOW())";
		$values = array($order_id, $item['id'], $item['quantity']);
		$this->db->query($query,$values);
		//Subtract From Stock
		$query = "SELECT * FROM products
					WHERE id = ?";
		$values = array($item['id']);
		$stock = $this->db->query($query,$values)->row_array();
		$update_stock = $stock['quantities'] - $item['quantity'];
		//Update stock
		$query = "UPDATE products SET quantities = ? WHERE id = ?";
		$values = array($update_stock, $item['id']);
		$this->db->query($query,$values);
		}
	}
}