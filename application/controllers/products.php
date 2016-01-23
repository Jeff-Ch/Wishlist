<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

	// Displays random product on homepage taking into account dislikes and if in wishlist
	public function display_products($rand){
		$products = $this->product->get_all_based_on_dislikes();
		$count = count($products);

		// Checks if items are already found on wishlist, unset it from list of possible items to be displayed
		for($i = 0; $i < $count; $i ++){
			if($this->wishlist->get_item($products[$i]['id'])){
				unset($products[$i]);
			}
		}

		// Reorders array and sets it as an associative array
		$products = array_values($products);
		$unique['products'] = $products;

		// If array is empty(all items disliked or added) throw error, otherwise continue to main
		if(empty($products)){
			$this->load->view('errors2');
		}

		else{
			$this->load->view('product', $unique);
		}

	}

	public function dislike($id){
		$this->product->dislike($id);
		redirect('/products/display_products/true');
	}

	public function add($id){
		$this->wishlist->add($id);
		redirect('/products/display_products/true');
	}
	public function main(){
		$this->load->view('product');
	}
}