<?php 
require_once APPPATH . "controllers/api/Secure_area.php";

/**
 * 
 */
class Location extends Secure_area
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Location_model');
		$this->user_id = $this->session->userdata('user_id');
	}

	public function getLocation()
	{
		$this->form_validation->set_rules('city_id', 'city', 'numeric');
		if ($this->form_validation->run() == FALSE){
			echo echo_validation_errors(validation_errors());
		}else{

			$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
			$offset = isset($_REQUEST['offset']) ? $_REQUEST['offset'] : "";

			$city_id = $this->input->post('city_id');

			$data = $this->Location_model->get_location_by_cityid($id, $offset, $city_id);

			echo echo_result_by_array($data);
		}
	}

	public function setLocation()
	{
		$this->form_validation->set_rules('location_name', 'Username', 'trim|required');
		$this->form_validation->set_rules('city_id', 'First Name', 'trim|numeric|required');

		if ($this->form_validation->run() == FALSE){
			echo echo_validation_errors(validation_errors());
		}else{

			$location_Data = array(
				'location_name' => ($this->input->post('location_name') != "") ? $this->input->post('location_name') : 'No location name',
				'city_id' => ($this->input->post('city_id') != "") ? $this->input->post('city_id') : '-1',
				'user_id' => $this->user_id
			);

			$responce_set_Location = $this->Location_model->set_Location($location_Data);
			echo give_responce_boolean($responce_set_Location);
			
		}
	}

	public function updateLocation()
	{
		$this->form_validation->set_rules('location_name', 'Username', 'trim|required');
		$this->form_validation->set_rules('city_id', 'First Name', 'trim|numeric|required');

		if ($this->form_validation->run() == FALSE){
			echo echo_validation_errors(validation_errors());
		}else{
			if ($this->input->post('location_id') == "") {
				$this->output->set_status_header('422');
				echo_validation_errors();
				exit;
			}
			$location_Data = array(
				'location_name' => ($this->input->post('location_name') != "") ? $this->input->post('location_name') : 'No location name',
				'city_id' => ($this->input->post('city_id') != "") ? $this->input->post('city_id') : '-1',
				'user_id' => $this->user_id
			);

			$location_id = $this->input->post('location_id');

			$responce_update_Location = $this->Location_model->update_Location($location_Data, $location_id);
			echo give_responce_boolean($responce_update_Location);
			
		}
	}
}




?>