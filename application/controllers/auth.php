<?php

	class auth extends CI_Controller{

		function __construct(){
			parent::__construct();
			$this->load->model('model_operator');
		}

		function login() {

			if(isset($_POST['submit'])){

			$username=	$this->input->post('username');
			$password= $this->input->post('password');
			$hasil	=$this->model_operator->login($username,$password);
			
			if($hasil == 1)
			{
				$this->db->where('username',$username);
				$this->db->update('petugas',array('last_login'=>date('Y-m-d')));
				$this->session->set_userdata(array('status_login' => 'oke','username'=>$username));
				redirect('dashboard');
			}else{
				redirect('auth/login');
			}

			}else{
				cek_session_login();
				$this->template->load('template_login','form_login');
				//$this->load->view('form_login');

			}
		} 

		function logout(){

			$this->session->sess_destroy();
			redirect('auth/login');
		}

	}

?>