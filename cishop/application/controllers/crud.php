<?php

class Crud extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('product_model');
		
	}
	public function index()
	{
		$data = array();

		if($query = $this->product_model->get_record())
		{
			$data['records'] = $query;
		}
			$this->load->view('powerpage', $data);
	}

	public function create()
	{
		$data = array(
			'title' => $this->input->post('title'),
			'content' => $this->input->post('content')
			);
		$this->product_model->add_record($data);
		redirect('crud');
		echo "Insert Successful";
	}

	public function delete()
	{
		$this->product_model->delete_row();
		redirect('crud');
	}
}