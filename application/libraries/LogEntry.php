<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logentry {
//Log
        function logcreate($user_id, $object_id, $activty, $description)
        {
			
			$date_time = date('Y-m-d H:i:s');
			
// Create Instance for code igniter

      $CI =& get_instance();

	  //Model Declaration

    $CI->load->model('Common_model');  
	
	 $user_log = array('user_id'=> $user_id,'object_id'=> $object_id, 'activity'=>$activty, 'description'=>$description,  'createddate'=>$date_time);
	 
	 
	
	 
     $log_creation = $CI->Common_model->insertVal('sg_user_logs',$user_log);

    if($log_creation)
	{
        
        return true;
    } 
	else 
	{
        return false;
    }
}
		
		
		
		
  
}