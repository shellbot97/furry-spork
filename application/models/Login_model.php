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
			$this->db->select('user_id');
			$this->db->from('users');
			$this->db->where('username', $username);
			$this->db->where('password', $password);
			$data = $this->db->get()->row_array();
			return isset($data['user_id'])?$data['user_id']:"";
		}
	}


?>