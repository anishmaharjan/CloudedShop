<?php
class Product_model extends CI_Model{

	public function get_all(){
		$query = $this->db->get('products');
		return $query->result_array();
	}

	public function get_record()
	{
		$query =  $this->db->get('products');
		return $query->result();
	}
	
	public function add_record($data)
	{
		$this->db->insert('products',$data);
		return;
	}


	public function delete_row()
	{
		$this->db->where('serial', $this->uri->segment(3));
		$this->db->delete('products');
	}

	public function update_record()
	{
		$this->db->where('serial', 6);
		$this->db->update('products',$data);
	}

	public function do_upload()
	{
		$config = array(
			'allowed_types' => 'jpg',
			'upload_path' => './assets/themes/default/images/',
			'file_path' => 'assets/themes/default/images/',
			'overwrite' => true,
			'image_width' => 255,
			'image_height' => 255,
			'max_width' => 255,
			'max_height' => 255,
			'file_name' => $this->input->post('filename')
		);
		$this->load->library('upload',$config);
		$this->upload->do_upload();

		return $config;
	}









}
