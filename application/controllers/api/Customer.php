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

			$data = $this->Customer_model->get_customer_by_phone($id, $offset, $phone_number);
			echo echo_result_by_array($data);
		}
	}

	public function setCustomer()
	{
		$this->form_validation->set_rules('phone_number', 'Phone Number', 'numeric|exact_length[10]|required');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('address_1', 'Address 1', 'trim|required');
		$this->form_validation->set_rules('address_2', 'Address 2', 'trim|required');

		if ($this->form_validation->run() == FALSE){
			echo echo_validation_errors(validation_errors());
		}else{
			$customerData = array(
				'phone_number' => ($this->input->post('phone_number') != "") ? $this->input->post('phone_number') : '9999999999',
				'first_name' => ($this->input->post('first_name') != "") ? $this->input->post('first_name') : 'No Name',
				'last_name' => ($this->input->post('last_name') != "") ? $this->input->post('last_name') : 'No Name',
				'address_1' => ($this->input->post('address_1') != "") ? $this->input->post('address_1') : 'No Address',
				'address_2' =>  ($this->input->post('address_2') != "") ? $this->input->post('address_2') : 'No Address'
			);

			$responce_set_customer = $this->Customer_model->set_customer($customerData);
			echo give_responce_boolean($responce_set_customer);
			
		}
	}

	public function updateCustomer()
	{
		$this->form_validation->set_rules('phone_number', 'Phone Number', 'numeric|exact_length[10]|required');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('address_1', 'Address 1', 'trim|required');
		$this->form_validation->set_rules('address_2', 'Address 2', 'trim|required');

		if ($this->form_validation->run() == FALSE){
			echo echo_validation_errors(validation_errors());
		}else{
			if ($this->input->post('customer_id') == "") {
				$this->output->set_status_header('422');
				echo_validation_errors();
				exit;
			}
			$customerData = array(
				'phone_number' => ($this->input->post('phone_number') != "") ? $this->input->post('phone_number') : '9999999999',
				'first_name' => ($this->input->post('first_name') != "") ? $this->input->post('first_name') : 'No Name',
				'last_name' => ($this->input->post('last_name') != "") ? $this->input->post('last_name') : 'No Name',
				'address_1' => ($this->input->post('address_1') != "") ? $this->input->post('address_1') : 'No Address',
				'address_2' =>  ($this->input->post('address_2') != "") ? $this->input->post('address_2') : 'No Address'
			);
			$customerId = $this->input->post('customer_id');

			$responce_update_customer = $this->Customer_model->update_customer($customerData, $customerId);
			echo give_responce_boolean($responce_update_customer);
			
		}
	}
}




?>