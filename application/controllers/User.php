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

		public function addUser()
		{
			$data['main_content'] = 'admin/user/edit';
			$this->load->view('includes/template', $data);
		}

		public function updateUser($user_id='')
		{
			$data['main_content'] = 'admin/user/edit';
			$data['user_id'] = $user_id;
			$this->load->view('includes/template', $data);
		}
	}




?>