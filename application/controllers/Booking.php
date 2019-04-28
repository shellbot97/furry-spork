<?php 

	/**
	 * 
	 */
	class Booking extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
		}

		public function index()
		{
			$data['main_content'] = 'admin/booking/list';
			$this->load->view('includes/template', $data);
		}

		public function addBooking()
		{
			$data['main_content'] = 'admin/booking/edit';
			$this->load->view('includes/template', $data);
		}

		public function updateBooking($booking_id='')
		{
			$data['main_content'] = 'admin/booking/edit';
			$data['location_id'] = $booking_id;
			$this->load->view('includes/template', $data);
		}

		public function printBooking($booking_id='')
		{
			//$data['main_content'] = 'admin/booking/print';
			$data['booking_id'] = $booking_id;
			$this->load->view('admin/booking/print', $data);
		}
	}


?>