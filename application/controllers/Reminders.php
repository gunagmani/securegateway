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
  //$timestamp = "2018-08-29";   //.date('y-m-d'); //strtotime("+1 days");
  $timestamp = date('y-m-d h:i:sa');
 /* echo $timestamp;
  //$email_val = 'hari@qrsolutions.in';
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
  }*/
 /* $appointments['First_Notification'] = $this->Common_model->all_record("sg_user_subscribe_details",$where);  */
  //$appointments['Notifics'] = $this->Common_model->notification();  
 // $appointments[] = $this->Common_model->notification_all($timestamp);  
  
  $appointments['user_notification'] = $this->Common_model->notification_all($timestamp);  
 /* var_dump($appoint['user_notification']);
  echo "2<hr>*********************";
  echo count($appoint['user_notification']);*/
  /*$json_appoint=json_encode($appointments);
  $json_appoint_decode[]=json_decode($json_appoint);
  print_r($json_appoint_decode);echo "<br>Json<hr>";
  */
  
		//echo $json_appoint_decode->email;
		//var_dump($appointments);
  /*foreach($json_appoint_decode as $jsappoint){
	  echo $jsappoint->id."<br/>";	  
  }*/
  /*print_r($appointments);echo "<hr>";
  //echo $appointments[0]['firstname'];
  var_dump($appointments);echo "<hr>"; *///exit;
	  if(!empty($appointments))
	  {
		  foreach($appointments['user_notification'] as $appointment)
		  {
			
			/*
			echo "Notification:".$appointment->notification_1."-".$appointment->notification_2."-".$appointment->notification_3;
			echo $appointment->id;
			echo "<hr>";
			var_dump($appointment)."<hr/>";continue;*/
			
			$subscribe_id= $appointment->id;
			$subscribe_firstname= $appointment->firstname;
			$subscribe_lastname= $appointment->lastname;
					
			$email_val = $appointment->email;
			$subscribe_notification_1= $appointment->notification_1;
			$subscribe_notification_2= $appointment->notification_2;
			$subscribe_notification_3= $appointment->notification_3;
			
			if($appointment->Notification=='One'){
				$timeDiff = 15;
				$noteVal = "First";
			}
			else if($appointment->Notification=='Two'){
				$timeDiff = 10;
				$noteVal = "Second";
			}
			else if($appointment->Notification=='Three'){
				$timeDiff = 5;
				$noteVal = "Third";
			}
			
			$data['message'] = "Hi $subscribe_firstname $subscribe_lastname, in $timeDiff days your subscription is getting expired for Securegateway.";			
			
                $this->email->set_newline("\r\n");	            
				$this->email->from("admin@securegateway.io");
				$this->email->to($email_val);
				$this->email->subject("SecureGateway - Subscription Notification ".$noteVal);
				$this->email->set_mailtype("html");
				
				$this->email->cc("hari@qrsolutions.in");
				
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