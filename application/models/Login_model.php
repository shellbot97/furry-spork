<?php 

	/**
	 * this class includes all methods for authentication.
	 */
	class Login_model extends CI_Model
	{

		public function __construct()
		{
			parent::__construct();
		}

		public function get_user_info_by_username($username='',$password='')
		{
			$this->db->select('user_id, username');
			$this->db->from('users');
			$this->db->where('username', $username);
			$this->db->where('password', $password);
			$data = $this->db->get()->row_array();
			return isset($data['user_id']) ? $data : "";
		}

		public function get_username_by_session()
		{
			$header = apache_request_headers();
		    if(!isset($header['Authorization'])){
		    	return false;	
		    }else{
		    	$sessionData = $header['Authorization'];
		    	$token = explode(" ", $sessionData);
		    	if(!isset($token[0])) return false;
		    	$user_data = $this->checkSession($token[0]);
		    	return (isset($user_data['data']) && !empty($user_data)) ? true : false;	
		    }
		}

		public function checkSession($sessionId) {
			$this->db->select('data');
			$this->db->from('ci_sessions');
			$this->db->where('id', $sessionId);
			return $this->db->get()->row_array();
		}
	}


?>