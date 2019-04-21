<?php 

	/**
	 * 
	 */
	class Hotel_model extends CI_Model
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->user_id = $this->session->userdata('user_id');
		}

		public function get_hotel_by_locationid($id = '', $offset = '', $location_id = '')
		{
			$this->db->select('*');
			$this->db->from('hotels');
			if ($id != "") {
				$this->db->where('hotel_id', $id);
			}
			if ($offset != '') {
				$this->db->limit(global_limit, $offset);
			}
			if ($location_id != "") {
				$this->db->where('location_id', $location_id);
			}
			$this->db->where('user_id', $this->user_id);
			$data = $this->db->get()->result_array();
			return $data;
		}
	}







?>