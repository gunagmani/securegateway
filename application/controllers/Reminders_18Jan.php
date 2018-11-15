<?php 
class Reminders extends CI_Controller { 
public function __construct() { 

	parent::__construct(); 
	//$this->load->library('input');
	
				$this->load->database();
				$this->load->library('session');
				$this->load->helper('url');
				$this->load->helper('number');
				$this->load->model('Auth_model');
				$this->load->model('Common_model');
				$this->load->library('Messages');
    $this->load->library('email');
    
  }
  public function index()
  {
    /*if(!$this->input->is_cli_request())
		  {
			  echo "This script can only be accessed via the command line" . PHP_EOL;
			  return;
		  }*/
  $timestamp = "2018-08-29%";   //.date('y-m-d'); //strtotime("+1 days");
  echo $timestamp;
  $email_val = 'hari@qrsolutions.in';
  $where = array('notification_1' => $timestamp);
  $timeDiff=5;
  if($timeDiff==15){
	$noteVal = "First";
  }
  else if($timeDiff==10){
	$noteVal = "Second";  
  }
  else if($timeDiff==5){
	$noteVal = "Final";  
  }
 /* $appointments['First_Notification'] = $this->Common_model->all_record("sg_user_subscribe_details",$where);  */
  //$appointments['Notifics'] = $this->Common_model->notification();  
  $appointments[] = $this->Common_model->notification();  
  var_dump($appointments);echo "<hr>";
	  if(!empty($appointments))
	  {
		  foreach($appointments as $appointment)
		  {
			/*echo "Notification:".$appointment->Notification_1."-".$appointment->Notification_2."-".$appoin
			tment->Notification_3;*/
			$data['message'] = "Hi You in $timeDiff days your subscription is getting expired in Securegateway.";			
			
                $this->email->set_newline("\r\n");	            
				$this->email->from("admin@securegateway.io");
				$this->email->to($email_val);
				$this->email->subject("SecureGateway - Subscription Notification ".$noteVal);
				$this->email->set_mailtype("html");
				$body = $this->load->view('braintree/subscribenotification',$data,true);				
				//$body = '<h1>SecureGateway<h1> <br> <h3>File has been uploaded in Securegateway <h3>';
				$this->email->message($body);   
				$this->email->send();
				$result = $this->email->send(); 
			
			
			
			 /*  $this->email->set_newline("\r\n");
			  $this->email->to("hari@qsolutions.in");
			  $this->email->from("hari@qsolutions.in");
			  $this->email->subject("Notification Reminder");
			  $this->email->message("You have an appointment tomorrow");
			  $this->email->send();  */
			  //$this->Common_model->record_update(sg_user_subscribe_details,$appointment->id);
		  }
	  }
  }
  
}