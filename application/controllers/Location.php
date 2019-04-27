<?php 
	/**
	 * 
	 */
	class Location extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
		}

		public function index()
		{
			$data['main_content'] = 'admin/location/list';
			$this->load->view('includes/template', $data);
		}

		public function addLocation()
		{
			$data['main_content'] = 'admin/location/edit';
			$this->load->view('includes/template', $data);
		}
		public function updateLocation($location_id='')
		{
			$data['main_content'] = 'admin/location/edit';
			$data['location_id'] = $location_id;
			$this->load->view('includes/template', $data);
		}
		
	}






?>