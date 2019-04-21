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
}




?>