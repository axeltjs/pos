<?php
	class Email extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('model_forget');
		}

		function index()
		{
			if (isset($_POST['submit']))
			{
			//config utk ambil data dari view
			$email 	= $this->input->post('email');
			//saya berfikir code dibawah ini salah
			$usr = $this->db->query("SELECT username FROM petugas WHERE email='$email'");
			$data = $usr->row_array();
			$username = $data['username'];
			//saya berfikir code diatas ini salah
			$email2 = md5($email);
			$tanggal = date('Y-m-d');
			$jadi = ("$username/$email2/$tanggal");
			$link 	= site_url("email/confirm/".$jadi);

			//config utk kirim email
			$config['protocol'] = 'sendmail';
			$config['mailpath'] = '/usr/sbin/sendmail';
			$config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = TRUE;

			$this->email->initialize($config);

			$this->email->from('axeltitandrias29@gmail.com', 'Project CI');
			$this->email->to($email); 

			$this->email->subject('Email Test');
			$this->email->message('Testing the email class. please click link below '.$link);	

			$this->email->send();

			echo $this->email->print_debugger();
			}else{

				$this->template->load('template_login','forget');

			}
		}

		function confirm()
		{
			if (isset($_POST['submit']))
			{
				$password=$this->input->post('password1');
				$password2=$this->input->post('password2');
				$username = $this->input->post('username');

				if($password != $password2)
				{
					log_message('info', 'Password tidak sama! harap coba lagi');
				}else{

				$query = "UPDATE petugas SET password=md5('$password') WHERE username='$username'";
				$this->db->query($query);
				redirect('auth/login');
				}	
			}
			else
			{
				$cekuser = $this->uri->segment(3);
				$cekemail = $this->uri->segment(4);
				$cektgl =$this->uri->segment(5);
				$tgl = date('Y-m-d');	
					$usr = $this->db->query("SELECT md5(email) FROM petugas WHERE username='$cekuser'");
					$datab = $usr->row_array();
					$mail = $datab['md5(email)'];
				if($tgl != $cektgl)
				{
					$this->load->helper('co_helper');
					echo cek_validasi();
				}elseif ($cekemail != $mail) {
					$this->load->helper('co_helper');
				echo cek_validasi();
				}
				else
				{
					$id = $this->uri->segment(3);
					$data['record']=$this->model_forget->get_one($id)->row_array();
					$this->template->load('template_login','confirm',$data);	
				}
			}
		}
	}
