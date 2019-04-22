<?php 

	/**
	 * 
	 */
	class User extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
		}

		public function index()
		{
			$data['main_content'] = 'admin/user/list';
			$this->load->view('includes/template', $data);
		}
	}




?>