<?php

class Users extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Product_model');
	}

	public function index()
	{
		if($this->session->userdata('is_logged_in'))
		{
			$data['username'] = $this->session->userdata('username');
			/*$data['username'] = $this->input->post('username');*/
			$data['title'] = "Welcome";
			$this->load->view('site_header',$data);
			$this->load->view('site_nav_logged');
			$this->load->view('homepage');
			$this->load->view('site_footer');
		}
		else
		{
			//redirect('products');
			redirect(site_url());
		}

	}
	public function browse(){
		$data['title'] = 'Home';
		$data['username'] = $this->session->userdata('username');
		/*$data['username'] = $this->input->post('username');*/
		$data['stuffs'] = $this->Product_model->get_all();

		$this->load->view('site_header',$data);
		$this->load->view('site_nav_logged');
		$this->load->view('content_home');
		$this->load->view('site_footer');
	}

	public function about(){
		$data['title'] = 'About';
		$data['username'] = $this->session->userdata('username');
		/*$data['username'] = $this->input->post('username');*/
		$this->load->view('site_header',$data);
		$this->load->view('site_nav_logged');
		$this->load->view('content_about');
		$this->load->view('site_footer');
	}
	public function verifylogin()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username','Username','required|callback_login_check');
		$this->form_validation->set_rules('password','Password','required|md5');

		if($this->form_validation->run())
		{
			$data = array(
				'username' => $this->input->post('username'),
				'is_logged_in' => 1

				);
			$this->session->set_userdata($data);
			redirect('users');
		}
		else{
			$error = array(
				'e' => validation_errors()
				);
			$this->session->set_userdata($error);
			redirect('');
			// echo validation_errors();
			// echo "<pre>";
			// print_r($this->session);
		}
	}


	public function login_check()
	{
		$this->load->model('model_users');

		if($this->model_users->can_log_in_pub()){
			return true;
		}
		else
		{
			$this->form_validation->set_message('login_check', 'Incorrect Username or Password');
			return false;
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('users');
	}

//REGISTRATION
	public function register()
	{
		$data['title'] = 'Create Account';
		$this->load->view('site_header',$data);
		$this->load->view('site_nav');
		$this->load->view('pub_register');
	}
	public function register_validation()
	{

		$this->load->library('form_validation');

		$this->form_validation->set_rules('username','Username','required|is_unique[pubuser.username]'); //|valid_email
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('cpassword','Confirm Password','required|matches[password]');
		$this->form_validation->set_message('is_unique',"That Username already exists.");
		if($this->form_validation->run())
		{
			$this->load->model('model_users');

			$data = array(
				'name' => $this->input->post('name'),
				'address' => $this->input->post('address'),
				'contact' => $this->input->post('contact'),
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password'))
				);
			$this->model_users->insert_user_pub($data);
			redirect(site_url());
		}		
		else
		{
			/*echo "Your Shall Not PASSSS!!!";*/
			$data['title'] = 'Create Account';
			$this->load->view('site_header',$data);
			$this->load->view('site_nav');
			$this->load->view("pub_register");
		}
	}




}
