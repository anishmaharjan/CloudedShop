<?php

class Admin extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('product_model');
	}

	public function index()
	{
		$this->login();
	}

	public function login()
	{
		$data['title'] = "Login Page";
		$this->load->view('site_header',$data);
		$this->load->view('site_nav');
		$this->load->view('login');
	}


//REGISTERING NEW ADMIN
	public function register_validation()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username','Username','required|is_unique[users.username]'); //|valid_email
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('cpassword','Confirm Password','required|matches[password]');
		$this->form_validation->set_message('is_unique',"That Username already exists.");
		if($this->form_validation->run())
		{
			$this->load->model('model_users');
			//generate a random key
			//$key = md5(uniqid());
			
			//send email to user
			//add them to the temp_db
			$data = array(
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password'))
				);
			$this->model_users->insert_user($data);
			redirect('admin');
		}		
		else
		{
			echo "Your Shall Not PASSSS!!!";
			$this->load->view("register");
		}
	}

	public function login_validation()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username','Username','required|callback_validate_credentials');
		$this->form_validation->set_rules('password','Password','required|md5');

		if($this->form_validation->run())
		{
			$data = array(
				'username' => $this->input->post('username'),
				'is_logged_in' => 1

				);
			$this->session->set_userdata($data);
			redirect('admin/powerpage');
		}
		else{
			$data['title'] = "Login Page";
			$this->load->view('site_header',$data);
			$this->load->view('site_nav');
			$this->load->view('login');
		}
	}

	public function validate_credentials()
	{
		$this->load->model('model_users');

		if($this->model_users->can_log_in()){
			return true;
		}
		else
		{
			$this->form_validation->set_message('validate_credentials', 'Incorrect Username or Password');
			return false;
		}
	}

	public function powerpage()
	{
		if($this->session->userdata('is_logged_in'))
		{
				$data = array();

			if($query = $this->product_model->get_record())
			{
				$data['records'] = $query;
			}
			$this->load->view('powerpage', $data);
			//$this->load->view('powerpage');
		}
		else
		{
			redirect('admin/restricted');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin');
	}
	public function register()
	{
		$this->load->view('register');
	}

	public function restricted()
	{
		$this->load->view('restricted');
	}


//************************************FOR CRUD OPERATIONS
//for image upload


//class Crud extends CI_Controller{

	/*public function crud()
	{
		$data = array();

		if($query = $this->product_model->get_record())
		{
			$data['records'] = $query;
		}
			$this->load->view('powerpage', $data);
	}*/

	public function create()
	{
		if($this->session->userdata('is_logged_in'))
		{
			$data = $this->product_model->do_upload();
			$data = array(
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description'),
				'price' => $this->input->post('price'),
				'picture' => $data['file_path'].$data['file_name'].'.jpg',
				);
			$this->product_model->add_record($data);
			redirect('admin/powerpage');
			//echo "Insert Successful";
			
		}
	}

	public function delete()
	{
		$this->product_model->delete_row();
		redirect('admin/powerpage');
	}
}