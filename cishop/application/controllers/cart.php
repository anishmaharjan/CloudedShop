<?php

class Cart extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Cart_model');
	}

	public function index()
	{
		$this->data['title'] = 'Your Cart';
		/*$this->data['username'] = $this->input->post('username');*/
		$this->data['username'] = $this->session->userdata('username');

		if(!$this->cart->contents())
		{
			$this->data['message'] = '<p>Your Cart Is Empty! </p>';
		}
		else{
			$this->data['message'] = $this->session->flashdata('message');
		}

		$this->load->view('site_header',$this->data);

				if($this->session->userdata('is_logged_in'))
				{
					
					$this->load->view('site_nav_logged');
				}
				else{

					$this->load->view('site_nav');
				}
		$this->load->view('cart');
		$this->load->view('site_footer');
	}

	public function add()
	{
		//$this->load->model('Cart_model');

		$insert_room = array(
			'id' => $this->input->post('id'),
			'name' => $this->input->post('name'),
			'price' => $this->input->post('price'),
			'qty' => 1	

			);
		$this->cart->insert($insert_room);

		redirect('cart');
	}

	function remove($rowid){
		if($rowid == 'all'){
			$this->cart->destroy();
		}
		else{
			$data= array(
				'rowid'  => $rowid,
				'qty'    => 0
				);
			$this->cart->update($data);
		}

		redirect('cart');
	}

	function update_cart(){
		foreach($_POST['cart'] as $id => $cart)
		{
			$price = $cart['price'];
			$amount = $price * $cart['qty'];

			$this->Cart_model->update_cart($cart['rowid'], $cart['qty'], $price, $amount);

		}
		redirect('cart');
	}


}