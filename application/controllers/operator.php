<?php
	class Operator extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('model_operator');
			cek_session();
		}

		function index()
		{
			$data['record']=$this->model_operator->tampildata();
			//$this->load->view('operator/lihat_data',$data);
			$this->template->load('template','operator/lihat_data',$data);
		}

		function post()
		{
			if (isset($_POST['submit']))
			{
				$nama=$this->input->post('nama',true);
				$username=$this->input->post('username',true);
				$email=$this->input->post('email',true);
				$password=$this->input->post('password',true);
				$password2=$this->input->post('password2',true);
				$level=$this->input->post('level',true);
				if ($password != $password2)
				{
					?>
					<script language="javascript">
        			alert ('Harap menyamakan re-type password!');
        			window.location="index.php";
        			</script>
					<?php
				
				}
				else
				{
				$data = array('nama' => $nama, 'username' => $username,'email' => $email, 'password' => md5($password), 'level' => $level);
				$this->db->insert('petugas',$data);
				redirect('operator');
			}
			}
			else
			{
				//$this->load->view('operator/form_input');
				$this->template->load('template','operator/form_input');
			}	
		}

		function edit()
		{
			if (isset($_POST['submit']))
			{

				$id=$this->input->post('id',true);
				$nama=$this->input->post('nama',true);
				$username=$this->input->post('username',true);
				$email=$this->input->post('email',true);
				$password=$this->input->post('password',true);
				$password2=$this->input->post('password2',true);
				$level=$this->input->post('level',true);

				if (empty($password))
				{
					$data = array('nama' => $nama, 'username' => $username, 'email' => $email, 'level' => $level);					
				}else{
						if($password != $password2)
						{
						?>
							<script language="javascript">
		        			alert ('Harap menyamakan re-type password!');
		        			</script>
							<?php
						die;
						}
						else
						{

							$data = array('nama' => $nama, 'username' => $username,'email' => $email, 'password'=>md5($password), 'level' => $level);

						}
				}

				$this->db->where('op_id',$id);
				$this->db->update('petugas',$data);
				redirect('operator');
			}

			else
			{
				$id = $this->uri->segment(3);
				$data['record']=$this->model_operator->get_one($id)->row_array();
				//$this->load->view('operator/form_edit',$data);
				$this->template->load('template','operator/form_edit',$data);
			}	
		}

		function delete()
		{
			$id = $this->uri->segment(3);
			$this->db->where('op_id',$id);
			$this->db->delete('petugas');
			redirect ('operator');
		}
	}
