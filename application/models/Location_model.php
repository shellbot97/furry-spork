<?php 

	/**
	 * 
	 */
	class Location_model extends CI_Model
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->user_id = $this->session->userdata('user_id');
		}

		public function get_location_by_cityid($id = '', $offset = '', $city_id = '')
		{
			$this->db->select('*');
			$this->db->from('locations');
			if ($id!="") {
				$this->db->where('location_id', $id);
			}
			if ($offset != '') {
				$this->db->limit(global_limit, $offset);
			}
			$this->db->where('city_id', $city_id);
			$this->db->where('user_id', $this->user_id);
			$data = $this->db->get()->result_array();
			return $data;
		}
	}







?>