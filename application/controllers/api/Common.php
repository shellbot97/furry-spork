<?php 
require_once APPPATH . "controllers/api/Secure_area.php";

/**
 * 
 */
class Common extends Secure_area
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Common_model');
	}

	public function getCity()
	{
		$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
		$offset = isset($_REQUEST['offset']) ? $_REQUEST['offset'] : "";
		$data = $this->Common_model->get_city_by_id($id, $offset);
		echo echo_result_by_array($data);
		//echo json_encode(array('Code' => 200, 'data' => $data),200);
	}

	public function getDocuments()
	{
		$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
		$offset = isset($_REQUEST['offset']) ? $_REQUEST['offset'] : "";
		$data = $this->Common_model->get_document_by_id($id, $offset);
		echo echo_result_by_array($data);
		//echo json_encode(array('Code' => 200, 'data' => $data),200);
	}

	public function getRoomType()
	{
		$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
		$offset = isset($_REQUEST['offset']) ? $_REQUEST['offset'] : "";
		$data = $this->Common_model->get_roomType_by_id($id, $offset);
		echo echo_result_by_array($data);
		//echo json_encode(array('Code' => 200, 'data' => $data),200);
	}
}




?>