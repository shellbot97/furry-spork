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
		}

		public function get_room_by_hotelid($id = '', $offset = '', $hotel_id = '')
		{
			$this->db->select('*');
			$this->db->from('rooms');
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
			$data = $this->db->get()->result_array();
			return $data;
		}
	}







?>