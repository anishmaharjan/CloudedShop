<?php

class Billing extends CI_Controller{
	public function __construct(){
		parent::__construct();

		$this->load->model('Billing_model');
		$this->load->model('model_users');
	}

	public function index()
	{
		$this->data['title'] = 'Billing';
		
		if($query = $this->model_users->get_user())
		{
			$this->data['record_user'] = $query;
		}

		$this->data['username'] = $this->session->userdata('username');
		/*Testing
		$this->data = array(
			a=>'a',
			b=>'b',
			c=>2,
			d=> array(e=>'f' )
			);

		$data['d']['e'];
		//testing end */
		$this->load->view('site_header',$this->data);

				if($this->session->userdata('is_logged_in'))
				{
					
					$this->load->view('site_nav_logged');
				}
				else{

					$this->load->view('site_nav');
				}
		$this->load->view('billing');
		$this->load->view('site_footer');
		
	}

	public function save_order()
	{
		$customer = array(
			'name' => $this->input->post('name'),
			'email' 	=> $this->input->post('email'),
			'address' 	=> $this->input->post('address'),
			'phone' 	=> $this->input->post('phone')
		);

		$cust_id = $this->Billing_model->insert_customer($customer);

		$order = array( 
			'date'  => date('Y-m-d'),
			'customerid' => $cust_id
		);

		$ord_id = $this->Billing_model->insert_order($order);

		if ($cart = $this->cart->contents()):
			foreach ($cart as $item):
				$order_detail = array(
					'orderid' 		=> $ord_id,
					'productid' 	=> $item['id'],
					'quantity' 		=> $item['qty'],
					'price' 		=> $item['price']
				);		

				$cust_id = $this->Billing_model->insert_order_detail($order_detail);
			endforeach;
		endif;
		
		//echo "Thank You! your order has been placed!<br />";
		$this->data['username'] = $this->session->userdata('username');
		if($this->session->userdata('is_logged_in'))
		{
			
			$this->load->view('site_header');
			$this->load->view('site_nav_logged',$this->data);
			$this->load->view('billsuccess');
			
		}
		else{
			$this->load->view('site_header');
			$this->load->view('site_nav');
			$this->load->view('billsuccess');
			//echo "<a href=".base_url()."products>Go back</a>";
		}
	}
}