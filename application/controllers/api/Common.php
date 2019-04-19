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
		$data = $this->Common_model->get_city_by_id($id);
		echo json_encode(array('Code' => 200, 'data' => $data),200);
	}

	public function getDocuments()
	{
		$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
		$data = $this->Common_model->get_document_by_id($id);
		echo json_encode(array('Code' => 200, 'data' => $data),200);
	}

	public function getRoomType()
	{
		$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
		$data = $this->Common_model->get_roomType_by_id($id);
		echo json_encode(array('Code' => 200, 'data' => $data),200);
	}
}




?>