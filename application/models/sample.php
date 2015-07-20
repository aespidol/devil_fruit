<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Model {
	public function register($post)
	{
		$query = "INSERT INTO users (name, username, email, password, created_at, updated_at)
				VALUES (?,?,?,?,NOW(),NOW())";
		$values = array($post['name'],$post['username'],$post['email'],md5($post['password']));
		$this->db->query($query,$values);
	}
	public function success($post)
	{
		$query = "SELECT * FROM users WHERE email = ? AND password = ?";
		$values = array($post['email'],md5($post['password']));
		return $this->db->query($query,$values)->row_array();
	}
	public function add($post)
	{
		//Insert Book Data
		$query_book="INSERT INTO books(title, author, created_at, updated_at, users_id)
					VALUES (?,?,NOW(),NOW(),?)";
		if(strlen($post['stored_author']) == 0)
		{
			$values_book=array($post['title'],$post['author'],$this->session->userdata('profile')['id']);
			$this->db->query($query_book,$values_book);
		}
		else
		{
			$values_book=array($post['title'],$post['stored_author'],$this->session->userdata('profile')['id']);
			$this->db->query($query_book,$values_book);
		}
		//Insert Review Data
		$id = $this->db->insert_id();
		$query_review="INSERT INTO reviews(review, rating, created_at, updated_at, books_id, users_id)
						VALUES (?,?,NOW(),NOW(),?,?)";
		$values_review=array($post['review'],$post['rating'],$id,$this->session->userdata('profile')['id']);
		$this->db->query($query_review,$values_review);
		//Return Review Data
		$query = "SELECT * FROM books
				LEFT JOIN reviews
				ON books.id = reviews.books_id;";
		return $this->db->query($query)->result_array();
	}
}