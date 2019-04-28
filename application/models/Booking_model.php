<?php 

	/**
	 * 
	 */
	class Booking_model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
			$this->user_id = $this->session->userdata('user_id');
			$this->table_name_alias = 'bookings as b';
			$this->table_name = 'bookings';
		}

		public function get_booking_by_id($id='', $offset='')
		{
			$this->db->select('b.*, h.hotel_name, r.room_number');
			$this->db->from($this->table_name_alias);
			$this->db->join('hotels as h', 'h.hotel_id = b.hotel_id');
			$this->db->join('rooms as r', 'r.room_id = b.room_id');
			if ($id!="") {
				$this->db->where('b.booking_id', $id);
			}
			if ($offset != '') {
				$this->db->limit(global_limit, $offset);
			}
			$this->db->where('h.user_id', $this->user_id);
			$this->db->where('b.is_deleted', 0);
			$data = $this->db->get()->result_array();
			return $data;
		}

		public function set_booking($value='')
		{
	        $CI =& get_instance();

         	$CI->load->model('Customer_model');
         	$customer_id = $CI->Customer_model->set_customer($value['customer_data']);
         	$value['booking_data']['customer_id'] = $customer_id;

			$this->db->insert($this->table_name, $value['booking_data']);
			return ($this->db->affected_rows() > 0) ? true : false;

		}

		public function delete_Booking($value='')
		{
			$deleted = array('is_deleted' => 1 );
		
			$this->db->where('booking_id', $value);
			$this->db->update($this->table_name, $deleted); 
			return ($this->db->affected_rows() > 0) ? true : false;
		}

		public function update_Booking($value='', $booking_id='')
		{
			$CI =& get_instance();

         	$CI->load->model('Customer_model');
         	$customer_id = $CI->Customer_model->set_customer($value['customer_data']);
         	$value['booking_data']['customer_id'] = $customer_id;

			$this->db->where('booking_id', $booking_id);
			$this->db->update($this->table_name, $value['booking_data']); 
			return ($this->db->affected_rows() > 0) ? true : false;


		}
		
	
	}
	
	/* End of file Booking_model.php */
	/* Location: ./application/models/Booking_model.php */


?>