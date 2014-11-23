<?php
class Products extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Product_model');

	}

	public function index(){
		/*$this->products();*/
		//$data['guest'] = uniqid();
		$data['title'] = "HomePage";
		$this->load->view('site_header',$data);
		$this->load->view('site_nav');
		$this->load->view('homepage');
		$this->load->view('site_footer');
	}
	
	public function browse(){
		$data['title'] = 'Home';

		$data['stuffs'] = $this->Product_model->get_all();

		$this->load->view('site_header',$data);
		$this->load->view('site_nav');
		$this->load->view('content_home');
		$this->load->view('site_footer');
	}

	public function about(){
		$data['title'] = 'About';

		$this->load->view('site_header',$data);
		$this->load->view('site_nav');
		$this->load->view('content_about');
		/*$this->load->view('site_footer');*/
	}
}
?>