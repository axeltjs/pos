<?php
	function cek_session()
	{
		$CI = & get_instance();
		$session=$CI->session->userdata('status_login');
		if ($session!='oke')
		{
			redirect('auth/login');
		}
	}

	function cek_session_login()
	{
		$CI = & get_instance();
		$session=$CI->session->userdata('status_login');
		if ($session=='oke')
		{
			redirect('dashboard');
		}
	}

?>