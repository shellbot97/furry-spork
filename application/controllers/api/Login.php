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
			$user_id = $this->Login_model->get_user_info_by_username($this->input->post('username'),$password);
			if ($user_id != "") {
				$array = array(
					'username' => 'value'
				);
				
				$this->session->set_userdata( $array );
			}else{

			}
		}
	}


?>