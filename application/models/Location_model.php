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
			$this->table_name = 'locations';
		}

		public function get_location_by_cityid($id = '', $offset = '', $city_id = '')
		{
			$this->db->select('*');
			$this->db->from($this->table_name);
			if ($id!="") {
				$this->db->where('location_id', $id);
			}
			if ($offset != '') {
				$this->db->limit(global_limit, $offset);
			}
			if ($city_id != "") {
				$this->db->where('city_id', $city_id);
			}
			$this->db->where('user_id', $this->user_id);
			$this->db->where('is_deleted', 0);
			$data = $this->db->get()->result_array();
			return $data;
		}

		public function set_Location($value='')
		{
			$this->db->insert($this->table_name, $value);
			return ($this->db->affected_rows() > 0) ? true : false;
		}

		public function update_Location($location_data='', $location_id='')
		{
			$this->db->where('location_id', $location_id);
			$this->db->update($this->table_name, $location_data); 
			return ($this->db->affected_rows() > 0) ? true : false;
		}

		public function delete_Location($value='')
		{
			$deleted = array('is_deleted' => 1 );
		
			$this->db->where('location_id', $value);
			$this->db->update($this->table_name, $deleted); 
			return ($this->db->affected_rows() > 0) ? true : false;
		}
	}







?>