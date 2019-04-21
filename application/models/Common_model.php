<?php 

	/**
	 * 
	 */
	class Common_model extends CI_Model
	{
		
		public function __construct()
		{
			parent::__construct();
		}

		public function get_city_by_id($id='', $offset = '')
		{
			$this->db->select('*');
			$this->db->from('cities');
			if ($id!="") {
				$this->db->where('city_id', $id);
			}
			if ($offset != '') {
				$this->db->limit(global_limit, $offset);
			}
			$data = $this->db->get()->result_array();
			return $data;
			
		}

		public function get_document_by_id($id='', $offset = '')
		{
			$this->db->select('*');
			$this->db->from('documents');
			if ($id!="") {
				$this->db->where('document_id', $id);
			}
			if ($offset != '') {
				$this->db->limit(global_limit, $offset);
			}
			$data = $this->db->get()->result_array();
			return $data;
			
		}

		public function get_roomType_by_id($id='', $offset = '')
		{
			$this->db->select('*');
			$this->db->from('room_type');
			if ($id!="") {
				$this->db->where('room_type_id', $id);
			}
			if ($offset != '') {
				$this->db->limit(global_limit, $offset);
			}
			$data = $this->db->get()->result_array();
			return $data;
		}
	}





?>