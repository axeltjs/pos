<?php
	class gallery_model extends CI_Model
	{

		var $gallery_path;

		function __construct()
		{
			parent::__construct();
		}

		function do_upload()
		{
			$config = array(
				'allowed_types' => 'jpeg|jpg|gif|png'
				'upload_path' => $this->gallery_path;
			);

			$this->load->library('upload',$config);
		}
	}
?>