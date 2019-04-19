<?php 
	/**
	 * 
	 */
	class Secure_area extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();

			$this->load->model('Login_model');


			$is_active = $this->Login_model->get_username_by_session();
			if (!$is_active) {
				$this->output->set_status_header('401');
				echo json_encode(array('Code' => 401, "Message" => "Unautherised access"),200);
				exit;
			}
			
		}
	}



?>