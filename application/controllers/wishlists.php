<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wishlists extends CI_Controller {

	public function index(){
		$newitem = $this->input->get();
		if($this->Wishlist->get_item($newitem['id'])){
			$this->load->view('errors');
		}
		else{
			$this->Wishlist->add($newitem);
			redirect('/wishlists/viewcart');
		}
	}

	// User's own wishlist
	public function my_list(){
		$data['items'] = $this->wishlist->get_all($this->session->userdata('id'));
		$this->load->view('my_list', $data);
	}

	// User's own cart
	public function viewcart(){
		$data['items'] = $this->Wishlist->get_all();
		$this->load->view('temp_wishlist', $data);
	}

	// Remove from user's own cart
	public function remove(){
		$olditem = $this->input->get();
		$olditemid = intval($olditem['id']);
		$this->Cart->delete($olditem['id']);
		redirect('/wishlists/viewcart');
	}

	// Add item to user's own wishlist
	public function add_my_list($id){
		// If already in wishlist, throw error
		if($this->wishlist->get_item($id)){
			$this->load->view('errors');
		}
		// Else add it
		else{
			$this->wishlist->add($id);
			redirect('/wishlists/my_list');
		}
	}

	// Friend's Wishlist
	public function friends_list($id){
		// If 'friend' is not user, get all friends
		if ($this->session->userdata("id") != $id) {
			$me = $this->session->userdata("id");
			$friendship_status = $this->user->get_friendship($me, $id);
			$data["friend_id"] = $id;
			$friend = $this->user->get_user_by_id($id);
			
			// If user is friends with person, show their wishlist
			if ($friendship_status) {
				$data["friend_status"] = "friends";
				$items_on_wishlist = $this->wishlist->get_all($id);
				$new_wishlist = [];
				// Checks to make sure items on wishlist aren't in carts already (globally)
				// returning an array with items in nobody's cart
				foreach($items_on_wishlist as $item){
					if(empty($this->cart->in_cart($item['product_id'], $id))){
						$new_wishlist[] = $item;
					}
				}
				$data['item'] = $new_wishlist;
			}
			// If user is not friends with person, present options to friend request
			else {
				$req_status = $this->user->get_req_status($me, $id);
				if (empty($req_status)) {
					$data["friend_status"] = "none";
				}
				else if ($req_status["requestor_id"] == $me) {
					$data["friend_status"] = "cancel";
				}
				else if ($req_status["recipient_id"] == $me) {
					$data["friend_status"] = "accept";
				}
			}
			$data['name'] = $friend['first_name'];
			$this->load->view('friend_list', $data);
		}
		// Else if 'friend' is user, show own wishlist
		else{
			redirect("/wishlists/my_list");
		}
	}
	
	// Delete item from own wishlist
	public function delete($id){
		$this->wishlist->delete($id);
		redirect('/wishlists/my_list');
	}
}