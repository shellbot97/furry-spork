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
}




?>