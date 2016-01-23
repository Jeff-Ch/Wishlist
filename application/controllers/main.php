<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		if (!$this->session->userdata("id")) {
			redirect("/");
		}
	}
	public function index(){
		redirect('products/display_products/true');
	}
	public function friends(){
		$data['friends'] = $this->user->get_friends($this->session->userdata('id'));
		$data["friend_requests"] = $this->user->get_requests($this->session->userdata('id'));
		$this->load->view('friends', $data);
	}
	public function friend_list(){
		$this->load->view('friend_list');
	}
	public function my_list(){
		$this->load->view('my_list');
	}
	public function product(){
		$this->load->view('product');
	}
	public function product_info(){
		$this->load->view('product_info');
	}
	public function settings(){
		$this->load->view('settings');
	}
	public function info($id){
		$item['info'] = $this->product->get_product($id);
		$this->load->view('product_info', $item);
	}
	public function test(){
		$this->load->view('billing_info');
	}
}