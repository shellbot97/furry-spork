<?php 
require_once APPPATH . "controllers/api/Secure_area.php";

/**
 * 
 */
class User extends Secure_area
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
	}

	public function getUser()
	{
		$this->form_validation->set_rules('hotel_id', 'Hotel', 'numeric');
		if ($this->form_validation->run() == FALSE){
			echo echo_validation_errors(validation_errors());
		}else{

			$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
			$offset = isset($_REQUEST['offset']) ? $_REQUEST['offset'] : "";

			$hotel_id = $this->input->post('hotel_id');

			$data = $this->User_model->get_user_by_hotelid($id, $offset, $hotel_id);

			echo echo_result_by_array($data);
		}
	}
}




?>