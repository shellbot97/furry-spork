<?php 

	/**
	 * 
	 */
	class Room extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
		}

		public function index()
		{
			
			$data['main_content'] = 'admin/room/list';
			$this->load->view('includes/template', $data);
		}

		public function addRoom()
		{
			$data['main_content'] = 'admin/room/edit';
			$this->load->view('includes/template', $data);
		}
	}




?>