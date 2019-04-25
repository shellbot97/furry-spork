<?php 

	/**
	 * 
	 */
	class User_model extends CI_Model
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->user_id = $this->session->userdata('user_id');
			$this->table_name_alias = 'users as u';
			$this->table_name = 'users';
		}

		public function get_user_by_hotelid($id = '', $offset = '', $hotel_id = '')
		{
			$this->db->select('u.*, h.hotel_name');
			$this->db->from($this->table_name_alias);
			$this->db->join('hotels as h', 'h.hotel_id = u.hotel_id');
			if ($id!="") {
				$this->db->where('u.user_id', $id);
			}
			if ($offset != '') {
				$this->db->limit(global_limit, $offset);
			}
			if ($hotel_id != "") {	
				$this->db->where('u.hotel_id', $hotel_id);
			}
			$this->db->where('u.is_deleted', 0);
			$data = $this->db->get()->result_array();
			return $data;
		}

		public function set_user($value='')
		{
			$this->db->insert($this->table_name, $value);
			return ($this->db->affected_rows() > 0) ? true : false;
		}

		public function update_user($user_data='', $user_id='')
		{
			$this->db->where('user_id', $user_id);
			$this->db->update($this->table_name, $user_data); 
			return ($this->db->affected_rows() > 0) ? true : false;
		}

		public function delete_user($value='')
		{
			$deleted = array('is_deleted' => 1 );
		
			$this->db->where('user_id', $value);
			$this->db->update($this->table_name, $deleted); 
			return ($this->db->affected_rows() > 0) ? true : false;
		}
	}







?>