<?php
Class User extends CI_Controller{

	public function __construct()
		{
			
			    parent ::__construct();
				$this->load->database();
				$this->load->library('session');
				$this->load->helper('url');
				$this->load->helper('number');
				$this->load->model('Auth_model');
				$this->load->model('Common_model');
				$this->load->model('Filebussiness');
				$this->load->library('Messages');
				$this->load->library('form_validation');
				$this->load->library('Logentry');
			
	 
				
				if($this->session->userdata("account_id")=='')
				{
				 redirect(base_url());
				}
				
				
				
				
				
// Menu Type				
					if($this->session->userdata("account_id")==1)
		           {
		            $this->data['left_menu'] = 'includes/leftMenu_free';
				   }
					else if($this->session->userdata("account_id")==2)
					{
						$this->data['left_menu'] = 'includes/leftMenu_personal';
					}
					else if($this->session->userdata("account_id")==3)
					{
						$this->data['left_menu'] = 'includes/leftMenu_bussiness';
					}
	
		
		
	
		
		
	}
	

	
	function header_value()
	{
		$this->load->view('includes/top');
		$this->load->view('includes/top_menu');
		$this->load->view($this->data['left_menu']);
	}
	

   
	
	public function index()
	{		   
     
     $where = array('customer_id'=> $this->session->userdata("customer_id"));
	$data['department_value'] = $this->Common_model->all_record_result('sg_department',$where);

    $where = array('customer_id'=> $this->session->userdata("customer_id"));
	$data['service_value'] = $this->Common_model->all_record_result('sg_service_type',$where);

	$where = array('customer_id'=>$this->session->userdata("customer_id"));
	$data['user_value'] = $this->Common_model->all_record_result('sg_user_details',$where);

	
		$this->header_value();
		$this->load->view('user/user_form', $data);
		$this->load->view('includes/reg_bottom');
	
	
	}	 
	
	
	public function view_edit_servicetype()
	{
		$id = $this->uri->segment(3);
		
		 $where = array('id'=> $id, 'status'=>1);
	     $data['servicetype_data'] = $this->Common_model->all_record('sg_service_type',$where);

		$this->header_value();
		$this->load->view('servicetype/view_edit_servicetype', $data);
		$this->load->view('includes/reg_bottom');

		
		
	}
	
	
	
	public function add_user()
	{
	
	    $first_name=$this->input->post('first_name');
		$last_name=$this->input->post('last_name');
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		$phone=$this->input->post('phone');
		$department_upload=$this->input->post('department_upload');
		//$servicetype_upload=$this->input->post('servicetype_upload');	
		$department_download=$this->input->post('department_download');
		//$servicetype_download=$this->input->post('service_type_download');

		
		         $this->session->set_userdata('type_post','3');
		         $this->session->set_userdata('first_name_post', $first_name);
                 $this->session->set_userdata('last_name_post', $last_name);				 
                 $this->session->set_userdata('email_post', $email);				 
                 $this->session->set_userdata('password_post', $password);				 
                 $this->session->set_userdata('phone_post', $phone);				 		 
                 $this->session->set_userdata('department_upload', $department_upload);
                 $this->session->set_userdata('department_download', $department_download);
                 $this->session->set_userdata('payment_redirect', '3');
		         redirect('payment');
		
		
		
      //$customer_id = $this->session->userdata("account_id");
		
		
	  }
	  
	
		
	public function payment_user_reg()
	{
		
		
		
		$first_name =$this->session->userdata("first_name_post");
		$last_name = $this->session->userdata("last_name_post");
		$email = $this->session->userdata("email_post");
		$password = $this->session->userdata("password_post");
		$phone = $this->session->userdata("phone_post");
		$department_upload = $this->session->userdata("department_upload");
		$department_download = $this->session->userdata("department_download");
		$plan = $this->session->userdata("plan_sub");
		$transaction_id = $this->session->userdata("transaction_id");
		$transaction_amount = $this->session->userdata("transaction_amount");
		

//Getting file size used		    
       $where = array('id' => 3);
	   $data['user_account'] = $this->Common_model->all_record('sg_user_account',$where);	
	   $storage_limit = $data['user_account'] -> storage_limit;
		
//Auth Insert      
	  $date_time = date('Y-m-d H:i:s');
	  
	  $data = array('account_id'=> 3,'role_id'=> 2, 'username'=>$email, 'password'=>md5($password),
	  'createddate'=>$date_time, 'modifieddate'=>$date_time, 'status'=>1, 'lastlogin'=>$date_time);
      $auth_id = $this->Auth_model->regForm($data);
      
	  if($auth_id)
	  {
//user details insertval	
	  
       $user_detail = array('account_id'=> 3,'role_id'=> 2, 'auth_id'=>$auth_id, 'customer_id'=>$this->session->userdata("customer_id"),
	  'firstname'=>$first_name, 'lastname'=>$last_name, 'phone'=>$phone, 'email'=>$email,'folder_name'=>$this->session->userdata("folder_name"),'createdate'=>$date_time, 
	  'modifieddate'=>$date_time,'size_used'=>0,'freespace'=> $storage_limit, 'subscriptiondate'=>$date_time, 'subscriptiontype'=>$plan, 'status'=>1);
       $return_data = $this->Common_model->insertVal('sg_user_details',$user_detail);
       
	    $user_id = $return_data;

	   $description = $first_name.' ('.$email.') '.' - Created Successfully';
	   
	   $this->logentry->logcreate($this->session->userdata("user_id"), $user_id, 'User Creation', $description);
	   
	   
	   
	
		
		
//User previlages

//Upload
        
     foreach($department_upload as $upload_value)
		 {
	$user_access_upload = array('department_id'=> $upload_value, 'user_id' => $user_id,'customer_id' => $this->session->userdata("customer_id"),'upload' => 1, 'download' => 0, 'status' => 0);
	     $upload_return = $this->Common_model->insertVal('sg_access_parent',$user_access_upload);		 
		 }

//Download		 
		    
  	 
	
	
	 foreach($department_download as $upload_value)
		 {	
		 $where = array('user_id'=>$user_id, 'department_id'=>$upload_value);
		 $data['user_details'] = $this->Common_model->all_record_result('sg_access_parent',$where);
	$count = count($data['user_details']); 
	 
		 
		 
	 if($count==1)
	 { 
      $data = array('download' => 1);
	  $where = array('user_id'=>$user_id, 'department_id'=>$upload_value);

		        $data['user_details'] = $this->Common_model->record_update('sg_access_parent',$where,$data);
     }
     else
     {	 
	$user_access_download = array('department_id'=> $upload_value, 'user_id' => $user_id,'customer_id' => $this->session->userdata("customer_id"),'upload' => 0, 'download' => 1, 'status' => 0);
	     $download_return = $this->Common_model->insertVal('sg_access_parent',$user_access_download);		 
	 }	

	}

	 
		 
		}
	   
	   
	   
// File transfer for new user	
   
	     $where = array('email_id'=> $email, 'reg_status' => 0);
	  $data['user_details'] = $this->Common_model->all_record_result('sg_file_share_nonreg',$where);
	  $count = count($data['user_details']); 

	    if($count >= 1)
		{
			
				foreach($data['user_details'] as $move_array_value)
				{
					$file_id = $move_array_value->file_id;
					$uploaded_date = $move_array_value->up_date;
					$user_id = $return_data;
					$data = array('file_id'=>$file_id, 'user_id'=>$user_id, 'status'=>1, 'date_time'=>$uploaded_date, 'download'=>0);	  
					$return_value = $this->Common_model->insertVal('sg_file_share',$data);
					
					    if($return_value)
						{
						$where = array('email_id'=> $email);
	                    $data = array('reg_status' => 1);
	                    $data['delete'] = $this->Common_model->record_update('sg_file_share_nonreg',$where,$data);
						
						}
					
					
		        }
		}
	   
	   
	   
		 $payment_data = array('customer_id'=> $this->session->userdata("customer_id"), 'user_id'=>$user_id, 'plan'=>'Bussiness Plan', 'subscriptiontype'=>$plan, 'Currency'=> 'Dollar', 'Amount'=> $transaction_amount,
		 'Transactionid'=> $transaction_id,'Paymentdate'=>$date_time);	
	   $return_value = $this->Common_model->insertVal('sg_payment_details',$payment_data);
   
//Session Unset
                 $this->session->set_userdata('type_post', '');
                 $this->session->set_userdata('first_name_post', '');
                 $this->session->set_userdata('last_name_post', '');				 
                 $this->session->set_userdata('email_post', '');				 
                 $this->session->set_userdata('password_post', '');				 
                 $this->session->set_userdata('phone_post', '');				 		 
                 $this->session->set_userdata('department_upload', '');
                 $this->session->set_userdata('department_download', '');
                 $this->session->set_userdata('payment_redirect', '');	   
	             $this->session->set_userdata('transaction_amount', '');
                 $this->session->set_userdata('transaction_id', '');

		if($return_data)
		{
		$this->send_email($email,$password);
		$this->messages->setMessageFront('Payment and User registration is successfull.','success');
		redirect('user');
		}
		else
		{
		$this->messages->setMessageFront('Registration Failed','error');
		redirect('user');
	
		}
	  
	  
	}		
		
		
		
		
	public function view_edit_user()
	{
		$id = $this->uri->segment(3);
		
		

		  $where = array('customer_id'=> $this->session->userdata("customer_id"));
	$data['department_value'] = $this->Common_model->all_record_result('sg_department',$where);

    $where = array('customer_id'=> $this->session->userdata("customer_id"));
	$data['service_value'] = $this->Common_model->all_record_result('sg_service_type',$where);

	$where = array('customer_id'=>$this->session->userdata("customer_id"), 'id'=>$id);
	$data['user_value'] = $this->Common_model->all_record('sg_user_details',$where);
	
	
	//$where = array('customer_id'=>$this->session->userdata("customer_id"), 'id'=>$id);
	$data['accessinfo'] = $this->Filebussiness->department_access($this->session->userdata("customer_id"),$id);
	$data['download_info'] = $this->Filebussiness->department_download($this->session->userdata("customer_id"),$id);
	

		$this->header_value();
		$this->load->view('user/view_edit_user',$data);
		$this->load->view('includes/reg_bottom');

		
		
	}
	
	
	public function edit_user()
	{
		
                    	
        $user_id = $this->input->post('id');	
	 
	    $first_name=$this->input->post('first_name');
		$last_name=$this->input->post('last_name');
		$email=$this->input->post('email');
		$phone=$this->input->post('phone');
		$department_upload=$this->input->post('department_upload');
		$department_download=$this->input->post('department_download');
		
//User Update   
	 		
       $user_detail = array('firstname'=>$first_name, 'lastname'=>$last_name, 'phone'=>$phone);				 
	   $where = array('id'=>$user_id);
       $data['user_update'] = $this->Common_model->record_update('sg_user_details',$where,$user_detail);		 
					 

// Intia;ization adding Zero For all record	
	      $where = array('user_id'=>$user_id);
		  $data = array('upload'=>0, 'download'=>0);
		  $data['initalization'] = $this->Common_model->record_update('sg_access_parent',$where,$data);

	 foreach($department_upload as $upload_value)
		 {
		  
				  $where = array('user_id'=>$user_id, 'department_id'=>$upload_value);
				  $data['user_details'] = $this->Common_model->all_record_result('sg_access_parent',$where);
				  $count = count($data['user_details']); 
			
			 if($count==1)
			 { 
			   $data = array('upload' => 1);
			   $where = array('user_id'=>$user_id, 'department_id'=>$upload_value);
			   $data['user_details'] = $this->Common_model->record_update('sg_access_parent',$where,$data);
			 }
			 else
			 {
				$user_access_upload = array('department_id'=> $upload_value, 'user_id' => $user_id,'customer_id' => $this->session->userdata("customer_id"),'upload' => 1, 'download' => 0, 'status' => 0);
	            $upload_return = $this->Common_model->insertVal('sg_access_parent',$user_access_upload); 
			 }

		 }

	
	
	 foreach($department_download as $upload_value)
		 {	
					 $where = array('user_id'=>$user_id, 'department_id'=>$upload_value);
					 $data['user_details'] = $this->Common_model->all_record_result('sg_access_parent',$where);
				$count = count($data['user_details']); 
				 
				 if($count==1)
				 { 
				  $data = array('download' => 1);
				  $where = array('user_id'=>$user_id, 'department_id'=>$upload_value);

							$data['user_details'] = $this->Common_model->record_update('sg_access_parent',$where,$data);
				 }
				 else
				 
				 {
					 $user_access_upload = array('department_id'=> $upload_value, 'user_id' => $user_id,'customer_id' => $this->session->userdata("customer_id"),'upload' => 0, 'download' => 1, 'status' => 0);
	            $upload_return = $this->Common_model->insertVal('sg_access_parent',$user_access_upload);
				 }
			 
	     }

		$this->messages->setMessageFront('User Updated Successfully .','success');
		redirect('user');
	
	}
	

	public function servicetype_exist($input,$department) 
    {
	

	
	     $where = array('service_type'=> $input, 'child_id'=> $department);
	  $data['user_details'] = $this->Common_model->all_record_result('sg_service_type',$where);
	  
	
	  $count = count($data['user_details']); 
     
	  
	    if($count >= 1)
		{
			$this->form_validation->set_message('servicetype_exist', 'Entered Service type for that Department is already exist');
	     return FALSE;
		  
		 
        }
		else{
			return TRUE;
		}
}
 /*   $this->db->where('roll', $roll);
    $query = $this->db->get('student');
    $count_row = $query->num_rows();
    if ($count_row > 0) 
    {
        $this->form_validation->set_message('checkDuplicateRoll', 'This roll number already exists. Please enter a new roll.');
        return FALSE;
    } 
    else 
    {
        return TRUE;
    }*/

	
	
		
	public function edit_servicetype()
	{
		//$table=0,$data=0,$where=0
		 if($this->input->post('id')==''){ redirect('servicetype');}
		 
		 $servicetype = $this->input->post('servicetype');
		 $id = $this->input->post('id');
		 
     $this->form_validation->set_rules('servicetype','Department','required|callback_servicetype_exist');

	 
	 
        if($this->form_validation->run() == TRUE) 
        {
		     
			  	$where = array('id' => $id);
	            $data = array('servicetype_name' => $servicetype);
	            $data['update_servicetype'] = $this->Common_model->record_update('sg_service_type',$where,$data);
			  
			  
			  $this->messages->setMessageFront('Department Updated Successfully','success');
		      redirect('servicetype');
					
		}
		else
		{
        $where = array('id'=> $id, 'status'=>1);
	    $data['servicetype_data'] = $this->Common_model->all_record('sg_service_type',$where);
		$this->header_value();
		$this->load->view('servicetype/view_edit_servicetype', $data);
		$this->load->view('includes/reg_bottom');
		}
		
		

	}
	
	
	
	   public function send_email($email,$password)
	{
		

	           $data['type'] = 3;
	           $data['password'] = $password;

	            $this->load->library('email');
	
                $this->email->set_newline("\r\n");	            
				$this->email->from("admin@securegateway.io");
				$this->email->to($email);
				$this->email->subject("SecureGateway - Registration");
				$this->email->set_mailtype("html");
				//$data = "One time password : ".$num_str;
				//$body = $data;
				$body = $this->load->view('email/email',$data,true);
				$this->email->message($body);   
				$this->email->send();
				$result = $this->email->send();  
		        return $result;
		
		
    }
	

    public function load_service_type()
    {
		
	$department_id = $this->input->post('department_id');
	
	 $department = explode(',', $department_id);
  
	foreach ($department as $department_value)
	{

	  $where = array('child_id'=> $department_value, 'customer_id'=> 3);
	  $data['service_type'] = $this->Common_model->all_record_result('sg_service_type',$where);
	  
	  foreach($data['service_type'] as $dep_val)
	  {
		  $service_type = $dep_val->service_type;
		  $id = $dep_val->id;
		 
		 
		 echo '<option value="'.$id.'"> '.$service_type.' </option>';
		 
		
		 
		 
	  }
	  
	
	  
	}

    
	
	//print_r($data['service_type']);

	
	}
	
	
	
	
	
	
	
	
	
	
		
    }
	
	
