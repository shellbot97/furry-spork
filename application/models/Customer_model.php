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
			$this->table_name = 'customers';
		}

		public function get_customer_by_phone($id = '', $offset = '', $phone_number = '')
		{
			$this->db->select('*');
			$this->db->from($this->table_name);
			if ($offset != '') {
				$this->db->limit(global_limit, $offset);
			}
			$this->db->where('phone_number', $phone_number);
			$this->db->where('is_deleted', 0);
			$data = $this->db->get()->result_array();
			return $data;
		}

		public function set_customer($value='')
		{
			$this->db->insert($this->table_name, $value);
			return ($this->db->affected_rows() > 0) ? true : false;
		}

		public function update_customer($customer_data='', $customer_id='')
		{
			$this->db->where('customer_id', $customer_id);
			$this->db->update($this->table_name, $customer_data); 
			return ($this->db->affected_rows() > 0) ? true : false;
		}

		public function delete_customer($value='')
		{
			$deleted = array('is_deleted' => 1 );
		
			$this->db->where('customer_id', $value);
			$this->db->update($this->table_name, $deleted); 
			return ($this->db->affected_rows() > 0) ? true : false;
		}


	}







?>