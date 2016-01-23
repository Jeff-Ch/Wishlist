<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Model {
	// Gets item info given a item's id
	public function get_product($id){
		$query = "SELECT * FROM products WHERE id = ?";
		return $this->db->query($query, $id)->row_array();
	}
	// Gets all available items disregarding items that have been disliked
	public function get_all_based_on_dislikes(){
		$query = "SELECT * FROM products LEFT JOIN dislikes ON products.id = dislikes.product_id WHERE dislikes.user_id IS NULL";
		$values = [$this->session->userdata('id'), $this->session->userdata('id')];
		return $this->db->query($query, $values)->result_array();
	}
	// Adds item to dislike table for current user
	public function dislike($id){
		$query = "INSERT INTO dislikes (product_id, user_id, created_at) VALUES (?,?, now())";
		$values = [$id, $this->session->userdata('id')];
		return $this->db->query($query, $values);

	}
}