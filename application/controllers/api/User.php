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

	public function setUser()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('hotel_id', 'Hotel', 'numeric|required');
		$this->form_validation->set_rules('is_admin', 'Admin', 'trim|required|exact_length[1]');

		if ($this->form_validation->run() == FALSE){
			echo echo_validation_errors(validation_errors());
		}else{

			$UserData = array(
				'username' => ($this->input->post('username') != "") ? $this->input->post('username') : 'No Username',
				'first_name' => ($this->input->post('first_name') != "") ? $this->input->post('first_name') : 'No Firstname',
				'last_name' => ($this->input->post('last_name') != "") ? $this->input->post('last_name') : 'No Lastname',
				'hotel_id' => ($this->input->post('hotel_id') != "") ? $this->input->post('hotel_id') : '-1',
				'password' => ($this->input->post('password') != "") ? md5($this->input->post('password')) : 'No Password',
				'is_admin' => ($this->input->post('is_admin') != "") ? $this->input->post('is_admin') : '0'
			);

			$responce_set_user = $this->User_model->set_user($UserData);
			echo give_responce_boolean($responce_set_user);
			
		}
	}

	public function updateUser()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('hotel_id', 'Hotel', 'numeric|required');
		$this->form_validation->set_rules('is_admin', 'Admin', 'trim|required|exact_length[1]');

		if ($this->form_validation->run() == FALSE){
			echo echo_validation_errors(validation_errors());
		}else{
			if ($this->input->post('user_id') == "") {
				$this->output->set_status_header('422');
				echo_validation_errors();
				exit;
			}
			$UserData = array(
				'username' => ($this->input->post('username') != "") ? $this->input->post('username') : 'No Username',
				'first_name' => ($this->input->post('first_name') != "") ? $this->input->post('first_name') : 'No Firstname',
				'last_name' => ($this->input->post('last_name') != "") ? $this->input->post('last_name') : 'No Lastname',
				'hotel_id' => ($this->input->post('hotel_id') != "") ? $this->input->post('hotel_id') : '-1',
				'password' => ($this->input->post('password') != "") ? md5($this->input->post('password')) : 'No Password',
				'is_admin' => ($this->input->post('is_admin') != "") ? $this->input->post('is_admin') : '0'
			);

			$user_id = $this->input->post('user_id');

			$responce_update_user = $this->User_model->update_user($UserData, $user_id);
			echo give_responce_boolean($responce_update_user);
		}
	}

	public function deleteUser()
	{
		if ($this->input->post('user_id') == "") {
			$this->output->set_status_header('422');
			echo_validation_errors();
			exit;
		}
		$user_id = $this->input->post('user_id');

		$responce_delete_user = $this->User_model->delete_user( $user_id);
		echo give_responce_boolean($responce_delete_user);
	}
}




?>