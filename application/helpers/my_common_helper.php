<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	    function echo_result_by_array($data = '')
	    {
	    	if (!empty($data)) {
	    		return json_encode(array("status" => "Success", "responce_code" => 200, "data" => $data), 200);
	    	}else{
	    		return json_encode(array("status" => "Success", "responce_code" => 204, "data" => "No Content"), 200);
	    	}
	    }   
	    function give_responce_boolean($value='')
	    {
	        if ($value) {
	            return json_encode(array("status" => "Success", "responce_code" => 200, "data" => "Successful"), 200);
	        }else{
	            return json_encode(array("status" => "Failed", "responce_code" => 500, "data" => "Failed"), 200);
	        }
	    }

	   function echo_validation_errors($value='')
	   {
	   		return json_encode(array("status" => "Unprocessable Entity", "responce_code" => 422, "data" => array('Errors' => $value)), 200);
	   }

	    function convert_trxdate_to_date($time_stamp, $trxdate)
	    {
	    	$settlement_time = DateTime::createFromFormat('y M j h:i a', $trxdate);
	        if ($settlement_time === false) {
	            $payment_time = DateTime::createFromFormat('d/m/Y H:i:s', $time_stamp)->format('Y-m-d H:i:s');  
	        }else{
	            $payment_time = DateTime::createFromFormat('y M j h:i a', $trxdate)->format('Y-m-d H:i:s'); 
	        }
	        return $payment_time;
	    }

	    function unset_zero_from_array($array='')
	    {
	    	foreach ($array as $key => $value) {
	            if ($value === 0) {
	                unset($array[$key]);
	            }
	        }
	        return $array;
	    }
?>