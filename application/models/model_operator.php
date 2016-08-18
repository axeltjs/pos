<?php

	class model_operator extends CI_Model {

		function login($username,$password){

			$cek=$this->db->get_where('petugas',array('username'=>$username,'password'=>md5($password)));

			if($cek->num_rows()>0)
			{
				return 1;		
			}else{
				return 0;
			}
		}

		function tampildata()
		{
			$user = $this->session->userdata('username');
			return $this->db->get_where('petugas',array('username'=>$user));
		}

		function get_one($id)
		{
			$param= array('op_id' => $id);
			return $this->db->get_Where('petugas',$param);
		}

	}