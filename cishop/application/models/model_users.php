<?php

class Model_users extends CI_Model{
	public function can_log_in()
	{
		$this->db->where('username',$this->input->post('username'));
		$this->db->where('password',md5($this->input->post('password')));

		$query = $this->db->get('users');

		if($query->num_rows() == 1)
		{
			return true;
		}
		else{
			return false;
		}
	}

	public function get_user()
	{
		$this->db->where('username',$this->session->userdata('username'));
		//$this->db->where('password',md5($this->input->post('password')));

		$query = $this->db->get('pubuser');

		if($query->num_rows() == 1)
		{
			return $query->row();
		}
		else{
			return false;
		}
	}


	public function insert_user($data)
	{
		$this->db->insert('users',$data);
		return;

	}
	public function can_log_in_pub()
	{
		$this->db->where('username',$this->input->post('username'));
		$this->db->where('password',md5($this->input->post('password')));

		$query = $this->db->get('pubuser');

		if($query->num_rows() == 1)
		{
			return true;
		}
		else{
			return false;
		}
	}

	public function insert_user_pub($data)
	{
		$this->db->insert('pubuser',$data);
		return;

	}
}