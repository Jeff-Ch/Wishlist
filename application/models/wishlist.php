<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wishlist extends CI_Model {
	// Get all items for specified user's wishlist
	public function get_all($id){
		$query = "SELECT product_id, name, description, image_url, users.first_name, users.id FROM wishlists LEFT JOIN products ON wishlists.product_id = products.id LEFT JOIN users ON users.id = wishlists.user_id WHERE user_id = ?";
		$values = [$id];
		return $this->db->query($query, $values)->result_array();
	}
	// Get specific item from current user's wishlist
	public function get_item($id){
		$query = "SELECT * FROM wishlists WHERE product_id = ? AND user_id = ?";
		$values = [$id, $this->session->userdata('id')];
		return $this->db->query($query, $values)->row_array();
	}
	// Add item to current user's wishlist
	public function add($id){
		$query = "INSERT INTO wishlists (user_id, product_id, created_at) VALUES (?,?, NOW())";
		$values = [$this->session->userdata('id'), $id];
		return $this->db->query($query, $values);
	}
	// Delete item from current user's wishlist
	public function delete($id){
		$query = "DELETE FROM wishlists WHERE product_id = ? AND user_id = ?";
		$values = [$id, $this->session->userdata('id')];
		return $this->db->query($query, $values);
	}
	// Checks current user's wishlist for specific item
	public function check_wishlist($id){
		$query = "SELECT * FROM wishlists WHERE product_id = ? AND user_id = ?";
		$values = [$id, $this->session->userdata('id')];
		return $this->db->query($query, $values);
	}
	// Delete item from any user's wishlist
	public function delete_from_wishlist($id, $recipient_id){
		$query = "DELETE FROM wishlists WHERE product_id = ? AND user_id = ?";
		$values = [$id, $recipient_id];
		return $this->db->query($query, $values);
	}

}