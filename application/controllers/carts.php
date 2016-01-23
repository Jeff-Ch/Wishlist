<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Carts extends CI_Controller {

	// Adds item to cart
	public function add(){
		$product_id = $this->input->post('product_id');
		$recipient_id = $this->input->post('recipient_id');

		// Throws error if in someone's cart already
		if($this->cart->get_item($product_id, $recipient_id)){
			$this->load->view('errors');
		}

		// Otherwise add to cart
		else{
			$this->cart->add($product_id, $recipient_id);
			redirect('/carts/viewcart');
		}
	}

	// View cart with separate total price being called
	public function viewcart(){
		$items = $this->cart->get_all();
		$total = $this->cart->get_total($items);
      	$items['total'] = $total;
      	$data['items'] = $items;
      	$this->load->view('cart', $data);
	}

	// Remove item from cart
	public function remove($product_id, $recipient_id){
		$this->cart->delete($product_id, $recipient_id);
		redirect('/carts/viewcart');
	}

}