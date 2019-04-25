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
			$this->table_name_alias = 'hotels as h';
			$this->table_name = 'hotels';
		}

		public function get_hotel_by_locationid($id = '', $offset = '', $location_id = '')
		{
			$this->db->select('h.*, l.location_name, ');
			$this->db->from($this->table_name_alias);
			$this->db->join('locations as l', 'l.location_id = h.location_id');
			if ($id != "") {
				$this->db->where('h.hotel_id', $id);
			}
			if ($offset != '') {
				$this->db->limit(global_limit, $offset);
			}
			if ($location_id != "") {
				$this->db->where('h.location_id', $location_id);
			}
			$this->db->where('h.user_id', $this->user_id);
			$this->db->where('h.is_deleted', 0);
			$data = $this->db->get()->result_array();
			return $data;
		}

		public function set_Hotel($value='')
		{
			$this->db->insert($this->table_name, $value);
			return ($this->db->affected_rows() > 0) ? true : false;
		}

		public function update_Hotel($hotel_data, $hotel_id)
		{
			$this->db->where('hotel_id', $hotel_id);
			$this->db->update($this->table_name, $hotel_data); 
			return ($this->db->affected_rows() > 0) ? true : false;
		}

		public function delete_Hotel($value='')
		{
			$deleted = array('is_deleted' => 1 );
		
			$this->db->where('hotel_id', $value);
			$this->db->update($this->table_name, $deleted); 
			return ($this->db->affected_rows() > 0) ? true : false;
		}
	}







?>