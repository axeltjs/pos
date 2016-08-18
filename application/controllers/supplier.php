<?php
	class supplier extends CI_Controller
	{

		function __construct()
		{
			parent::__construct();
			$this->load->model('model_supplier');
			cek_session();
		}

		function index()
		{
			$this->load->library('pagination');
			$config['base_url'] = base_url(). 'index.php/supplier/index/';
			$config['total_rows'] = $this->model_supplier->tampilkan_data()->num_rows();
			$config['per_page'] = 4; 
			$this->pagination->initialize($config); 
			$data['paging']= $this->pagination->create_links();

			$halaman=$this->uri->segment(3);
			$halaman=$halaman==''?0:$halaman;
			$data['record']= $this->model_supplier->tampilkan_data_paging($halaman);
			$this->template->load('template','supplier/lihat_data',$data);

		}

				function post()
		{
		
			if (isset($_POST['submit']))

			{
				$this->model_supplier->post();
				redirect('supplier');
			}
			else
			{
				$this->template->load('template','supplier/form_input');
			}

		}

		function edit()
		{
			if (isset($_POST['submit']))

			{
				$this->model_supplier->edit();
				redirect('supplier');
			}
			else
			{
				$id = $this->uri->segment(3);
				$data['record']=$this->model_supplier->get_one($id)->row_array();
				$this->template->load('template','supplier/form_edit',$data);
			}			
		}

		function delete()
		{
			$id = $this->uri->segment(3);
			$this->model_supplier->delete($id);
			redirect ('supplier');
		}

	}