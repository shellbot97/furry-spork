<?php 
require_once APPPATH . "controllers/api/Secure_area.php";

/**
 * 
 */
class Hotel extends Secure_area
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Hotel_model');
		$this->user_id = $this->session->userdata('user_id');
	}

	public function getHotel()
	{
		$this->form_validation->set_rules('location_id', 'Location', 'numeric');
		if ($this->form_validation->run() == FALSE){
			echo echo_validation_errors(validation_errors());
		}else{

			$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
			$offset = isset($_REQUEST['offset']) ? $_REQUEST['offset'] : "";

			$location_id = $this->input->post('location_id');

			$data = $this->Hotel_model->get_hotel_by_locationid($id, $offset, $location_id);

			echo echo_result_by_array($data);
		}
	}

	public function setHotel()
	{
		$this->form_validation->set_rules('hotel_name', 'Username', 'trim|required');
		$this->form_validation->set_rules('location_id', 'First Name', 'trim|numeric|required');
		$this->form_validation->set_rules('documents_required', 'Documents Required', 'trim|required');

		if ($this->form_validation->run() == FALSE){
			echo echo_validation_errors(validation_errors());
		}else{

			$hotelData = array(
				'hotel_name' => ($this->input->post('hotel_name') != "") ? $this->input->post('hotel_name') : 'No Hotel Name',
				'location_id' => ($this->input->post('location_id') != "") ? $this->input->post('location_id') : '-1',
				'documents_required' => ($this->input->post('documents_required') != "") ? $this->input->post('documents_required') : '',
				'user_id' => $this->user_id
			);

			$responce_set_Hotel = $this->Hotel_model->set_Hotel($hotelData);
			echo give_responce_boolean($responce_set_Hotel);
			
		}
	}

	public function updateHotel()
	{
		$this->form_validation->set_rules('hotel_name', 'Username', 'trim|required');
		$this->form_validation->set_rules('location_id', 'First Name', 'trim|numeric|required');
		$this->form_validation->set_rules('documents_required', 'Documents Required', 'trim|required');

		if ($this->form_validation->run() == FALSE){
			echo echo_validation_errors(validation_errors());
		}else{
			if ($this->input->post('hotel_id') == "") {
				$this->output->set_status_header('422');
				echo_validation_errors();
				exit;
			}
			$hotelData = array(
				'hotel_name' => ($this->input->post('hotel_name') != "") ? $this->input->post('hotel_name') : 'No Hotel Name',
				'location_id' => ($this->input->post('location_id') != "") ? $this->input->post('location_id') : '-1',
				'documents_required' => ($this->input->post('documents_required') != "") ? $this->input->post('documents_required') : '',
				'user_id' => $this->user_id
			);
			$hotel_id = $this->input->post('hotel_id');
			$responce_update_Hotel = $this->Hotel_model->update_Hotel($hotelData, $hotel_id);
			echo give_responce_boolean($responce_update_Hotel);
			
		}
	}
}




?>