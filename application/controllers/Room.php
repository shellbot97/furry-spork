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

		public function addRoom()
		{
			$data['views']['main_content1'] = 'admin/room_onboard/form';
			$this->load->view('admin/includes/template', $data);
		}
	}





?>