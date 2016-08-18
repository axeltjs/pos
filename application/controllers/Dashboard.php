<?php

class Dashboard extends CI_Controller 
	{

		function index()
		{
			cek_session();
			//$this->load->view('view_dashboard');
			$this->template->load('template','view_dashboard');
		}

	}

?>