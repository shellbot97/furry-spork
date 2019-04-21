<?php 

	/**
	 * 
	 */
	class Customer_model extends CI_Model
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->user_id = $this->session->userdata('user_id');
		}

		public function get_room_by_phone($id = '', $offset = '', $phone_number = '')
		{
			$this->db->select('*');
			$this->db->from('customers');
			if ($offset != '') {
				$this->db->limit(global_limit, $offset);
			}
			$this->db->where('phone_number', $phone_number);
			//$this->db->where('user_id', $this->user_id);
			$data = $this->db->get()->result_array();
			return $data;
		}
	}







?>