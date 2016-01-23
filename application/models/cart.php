<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Model {

	// Get all information for current user's cart
	public function get_all(){
		$query = "SELECT user_id, product_id, recipient_id, name, description, image_url, price, first_name, last_name FROM carts LEFT JOIN products ON carts.product_id = products.id LEFT JOIN users ON carts.recipient_id = users.id WHERE user_id = ?";
		$values = [$this->session->userdata('id')];
		return $this->db->query($query, $values)->result_array();
	}
	// Get specific item from current user's cart
	public function get_item($product_id, $recipient_id){
		$query = "SELECT * FROM carts WHERE product_id = ? AND recipient_id = ? AND user_id = ?";
		$values = [$product_id, $recipient_id, $this->session->userdata('id')];
		return $this->db->query($query, $values)->row_array();
	}
	// Add specific item to current user's cart
	public function add($product_id, $recipient_id){
		$query = "INSERT INTO carts (user_id, product_id, recipient_id, created_at) VALUES (?,?,?,NOW())";
		$values = [$this->session->userdata('id'), $product_id, $recipient_id];
		return $this->db->query($query, $values);
	}
	// Delete specific item from current user's cart
	public function delete($product_id, $recipient_id){
		$query = "DELETE FROM carts WHERE product_id = ? AND user_id = ? AND recipient_id = ?";
		$values = [$product_id, $this->session->userdata('id'), $recipient_id];
		return $this->db->query($query, $values);
	}
	// Checks to see if specific item is in a cart
	public function in_cart($product_id, $recipient_id){
		$query = "SELECT * FROM carts WHERE product_id = ? AND recipient_id = ?";
		$values = [$product_id, $recipient_id];
		return $this->db->query($query, $values)->row_array();
	}
	// Returns total price of cart
	public function get_total($items){
		$sum = 0;
		foreach($items as $item){
          	$sum += $item['price'];
      	}
      	$sum = number_format($sum,2,'.',',');
      	return $sum;
	}
	// Returns total price of cart in cents
	public function get_total_cents($items){
		$sum = 0;
		foreach($items as $item){
    	$sum += $item['price'];
  	}
  	return $sum*100;
	}

}