<?php 
require_once APPPATH . "controllers/api/Secure_area.php";

/**
 * 
 */
class Room extends Secure_area
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Room_model');
		$this->user_id = $this->session->userdata('user_id');
	}

	public function getRoom()
	{
		$this->form_validation->set_rules('hotel_id', 'Hotel', 'numeric');
		if ($this->form_validation->run() == FALSE){
			echo echo_validation_errors(validation_errors());
		}else{

			$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
			$offset = isset($_REQUEST['offset']) ? $_REQUEST['offset'] : "";

			$hotel_id = $this->input->post('hotel_id');

			$data = $this->Room_model->get_room_by_hotelid($id, $offset, $hotel_id);

			echo echo_result_by_array($data);
		}
	}

	public function getRoomAvailable()
	{		
		$this->form_validation->set_rules('hotel_id', 'Hotel', 'numeric');
		if ($this->form_validation->run() == FALSE){
			echo echo_validation_errors(validation_errors());
		}else{

			$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
			$offset = isset($_REQUEST['offset']) ? $_REQUEST['offset'] : "";

			$hotel_id = $this->input->post('hotel_id');
			$from_date = $this->input->post('from_date');
			$to_date = $this->input->post('to_date');

			$data = $this->Room_model->get_room_by_available($id, $offset, $hotel_id, $from_date, $to_date);

			echo echo_result_by_array($data);
		}
	}

	public function setRoom()
	{
		$this->form_validation->set_rules('room_number', 'Room Number', 'trim|required');
		$this->form_validation->set_rules('room_type_id', 'Room Type', 'required');
		$this->form_validation->set_rules('floor_number', 'Floor Number', 'numeric|required');
		$this->form_validation->set_rules('hotel_id', 'Hotel', 'trim|required');

		if ($this->form_validation->run() == FALSE){
			echo echo_validation_errors(validation_errors());
		}else{

			$roomData = array(
				'room_number' => ($this->input->post('room_number') != "") ? $this->input->post('room_number') : '-1',
				'room_type_id' => ($this->input->post('room_type_id') != "") ? $this->input->post('room_type_id') : '-1',
				'floor_number' => ($this->input->post('floor_number') != "") ? $this->input->post('floor_number') : '-1',
				'hotel_id' => ($this->input->post('hotel_id') != "") ? $this->input->post('hotel_id') : '-1',
				'user_id' =>  $this->user_id
			);

			$responce_set_room = $this->Room_model->set_room($roomData);
			echo give_responce_boolean($responce_set_room);
			
		}
	}

	public function updateRoom()
	{
		$this->form_validation->set_rules('room_number', 'Room Number', 'trim|required');
		$this->form_validation->set_rules('room_type_id', 'Room Type', 'required');
		$this->form_validation->set_rules('floor_number', 'Floor Number', 'numeric|required');
		$this->form_validation->set_rules('hotel_id', 'Hotel', 'trim|required');

		if ($this->form_validation->run() == FALSE){
			echo echo_validation_errors(validation_errors());
		}else{
			if ($this->input->post('room_id') == "") {
				$this->output->set_status_header('422');
				echo_validation_errors();
				exit;
			}
			$roomData = array(
				'room_number' => ($this->input->post('room_number') != "") ? $this->input->post('room_number') : '-1',
				'room_type_id' => ($this->input->post('room_type_id') != "") ? $this->input->post('room_type_id') : '-1',
				'floor_number' => ($this->input->post('floor_number') != "") ? $this->input->post('floor_number') : '-1',
				'hotel_id' => ($this->input->post('hotel_id') != "") ? $this->input->post('hotel_id') : '-1',
				'user_id' =>  $this->user_id
			);
			$roomId = $this->input->post('room_id');

			$responce_update_room = $this->Room_model->update_room($roomData, $roomId);
			echo give_responce_boolean($responce_update_room);
		}
	}

	public function deleteRoom()
	{
		if ($this->input->post('room_id') == "") {
				$this->output->set_status_header('422');
				echo_validation_errors();
				exit;
			}
		$roomId = $this->input->post('room_id');

		$responce_delete_room = $this->Room_model->delete_room($roomId);
		echo give_responce_boolean($responce_delete_room);
	}
}




?>