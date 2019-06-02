<?php 

	/**
	 * 
	 */
	class Masters extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
		}

		public function index()
		{
			$data['views']['main_content1'] = 'admin/masters/id_proof';
			$data['views']['main_content2'] = 'admin/masters/mop';
			$data['views']['main_content3'] = 'admin/masters/room_category';
			$data['views']['main_content4'] = 'admin/masters/room_number';
			$data['views']['main_content5'] = 'admin/masters/wings';
			$data['views']['main_content6'] = 'admin/masters/users';

			$this->load->view('admin/includes/template', $data);
		}
	}

?>