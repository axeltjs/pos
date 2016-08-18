<?php

	class model_forget extends CI_Model
	{
		function get_one($id)
		{
			$param= array('username' => $id);
			return $this->db->get_Where('petugas',$param);
		}


		function edit($data, $username)
		{
			$this->db->where('username',$username);
			$this->db->update('petugas',$data);
		}
	}