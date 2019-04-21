<?php 

	/**
	 * 
	 */
	class Room_model extends CI_Model
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->user_id = $this->session->userdata('user_id');
			$this->table_name = 'rooms';
		}

		public function get_room_by_hotelid($id = '', $offset = '', $hotel_id = '')
		{
			$this->db->select('*');
			$this->db->from($this->table_name);
			if ($id!="") {
				$this->db->where('room_id', $id);
			}
			if ($offset != '') {
				$this->db->limit(global_limit, $offset);
			}
			if ($hotel_id != "") {
				$this->db->where('hotel_id', $hotel_id);
			}
			$this->db->where('user_id', $this->user_id);
			$this->db->where('is_deleted', 0);
			$data = $this->db->get()->result_array();
			return $data;
		}

		public function set_room($value='')
		{
			$this->db->insert($this->table_name, $value);
			return ($this->db->affected_rows() > 0) ? true : false;
		}

		public function update_room($room_data='', $room_id)
		{
			$this->db->where('room_id', $room_id);
			$this->db->update($this->table_name, $room_data); 
			return ($this->db->affected_rows() > 0) ? true : false;
		}

		public function delete_room($value='')
		{
			$deleted = array('is_deleted' => 1 );
		
			$this->db->where('room_id', $value);
			$this->db->update($this->table_name, $deleted); 
			return ($this->db->affected_rows() > 0) ? true : false;
		}
	}







?>