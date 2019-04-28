<?php 
require_once APPPATH . "controllers/api/Secure_area.php";

/**
 * 
 */
class Booking extends Secure_area
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Booking_model');
		$this->user_id = $this->session->userdata('user_id');
	}

	public function getBooking()
	{

		$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
		$offset = isset($_REQUEST['offset']) ? $_REQUEST['offset'] : "";

		$data = $this->Booking_model->get_booking_by_id($id, $offset);

		echo echo_result_by_array($data);
	}

	public function setBooking()
	{
		$this->form_validation->set_rules('phone_number', 'Phone Number', 'trim|numeric|required');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('address_1', 'Address 1', 'trim|required');
		$this->form_validation->set_rules('address_2', 'Address 2', 'trim|required');
		$this->form_validation->set_rules('adult', 'Adults', 'trim|numeric|required');
		$this->form_validation->set_rules('hotel_id', 'Hotel Name', 'trim|numeric|required');
		$this->form_validation->set_rules('room_id', 'Room Number', 'trim|numeric|required');
		$this->form_validation->set_rules('children', 'Children', 'trim|numeric|required');
		$this->form_validation->set_rules('from_date', 'From date', 'required');
		$this->form_validation->set_rules('to_date', 'To date', 'required');

		if ($this->form_validation->run() == FALSE){
			echo echo_validation_errors(validation_errors());
		}else{

			$booking_data['booking_data'] = array(
				'adult' => $this->input->post('adult') ,
				'hotel_id' => $this->input->post('hotel_id') ,
				'room_id' => $this->input->post('room_id') ,
				'children' => $this->input->post('children') ,
				'invoice_number' => generateRandomString(),
				'from_date' => $this->input->post('from_date') ,
				'to_date' => $this->input->post('to_date')
			);
			$booking_data['customer_data'] = array(
				'phone_number' => $this->input->post('phone_number') ,
				'first_name' => $this->input->post('first_name') ,
				'last_name' => $this->input->post('last_name') ,
				'address_1' => $this->input->post('address_1') ,
				'address_2' => $this->input->post('address_2') 
			);

			$responce_set_booking = $this->Booking_model->set_booking($booking_data);
			echo give_responce_boolean($responce_set_booking);
			
		}
	}

	public function deleteBooking()
	{		
		if ($this->input->post('booking_id') == "") {
			$this->output->set_status_header('422');
			echo_validation_errors();
			exit;
		}
		$booking_id = $this->input->post('booking_id');
		$responce_delete_Booking = $this->Booking_model->delete_Booking($booking_id);
		echo give_responce_boolean($responce_delete_Booking);
	}

	public function updateBooking()
	{
		$this->form_validation->set_rules('phone_number', 'Phone Number', 'trim|numeric|required');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('address_1', 'Address 1', 'trim|required');
		$this->form_validation->set_rules('address_2', 'Address 2', 'trim|required');
		$this->form_validation->set_rules('adult', 'Adults', 'trim|numeric|required');
		$this->form_validation->set_rules('hotel_id', 'Hotel Name', 'trim|numeric|required');
		$this->form_validation->set_rules('room_id', 'Room Number', 'trim|numeric|required');
		$this->form_validation->set_rules('children', 'Children', 'trim|numeric|required');
		$this->form_validation->set_rules('from_date', 'From date', 'required');
		$this->form_validation->set_rules('to_date', 'To date', 'required');

		if ($this->form_validation->run() == FALSE){
			echo echo_validation_errors(validation_errors());
		}else{
			if ($this->input->post('booking_id') == "") {
				$this->output->set_status_header('422');
				echo_validation_errors();
				exit;
			}

			$booking_id = $this->input->post('booking_id');

			$booking_data['booking_data'] = array(
				'adult' => $this->input->post('adult') ,
				'hotel_id' => $this->input->post('hotel_id') ,
				'room_id' => $this->input->post('room_id') ,
				'children' => $this->input->post('children') ,
				'invoice_number' => generateRandomString(),
				'from_date' => $this->input->post('from_date') ,
				'to_date' => $this->input->post('to_date')
			);
			$booking_data['customer_data'] = array(
				'phone_number' => $this->input->post('phone_number') ,
				'first_name' => $this->input->post('first_name') ,
				'last_name' => $this->input->post('last_name') ,
				'address_1' => $this->input->post('address_1') ,
				'address_2' => $this->input->post('address_2') 
			);

			$responce_update_Booking = $this->Booking_model->update_Booking($booking_data, $booking_id);
			echo give_responce_boolean($responce_update_Booking);



		}	
	}
}




?>