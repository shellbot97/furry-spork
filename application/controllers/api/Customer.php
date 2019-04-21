<?php 
require_once APPPATH . "controllers/api/Secure_area.php";

/**
 * 
 */
class Customer extends Secure_area
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Customer_model');
	}

	public function getCustomer()
	{
		$this->form_validation->set_rules('phone_number', 'Phone Number', 'numeric|exact_length[10]');
		if ($this->form_validation->run() == FALSE){
			echo echo_validation_errors(validation_errors());
		}else{

			$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
			$offset = isset($_REQUEST['offset']) ? $_REQUEST['offset'] : "";

			$phone_number = $this->input->post('phone_number');

			$data = $this->Customer_model->get_room_by_phone($id, $offset, $phone_number);
			echo echo_result_by_array($data);
		}
	}
}




?>