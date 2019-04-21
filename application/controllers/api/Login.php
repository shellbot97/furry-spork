<?php 

	/**
	 * this class includes all methods for authentication.
	 */
	class Login extends CI_Controller
	{

		public function __construct()
		{
			parent::__construct();
			$this->load->model('Login_model');
		}

		public function index()
		{
			$password = md5($this->input->post('password'));
			$user_data = $this->Login_model->get_user_info_by_username($this->input->post('username'),$password);
			if ($user_data != "") {
				$array = array(
					'username' => $user_data['username'],
					'user_id' => $user_data['user_id']
				);
				$this->session->set_userdata( $array );
				echo json_encode(array('Code' => 200, 'Message' => session_id()),200);
			}else{
				echo json_encode(array('Code' => 401, 'Message' => "Unautherised login"),200);
			}
		}
	}


?>