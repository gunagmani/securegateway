<?php
Class Upgrade extends CI_Controller{

	public function __construct()
		{
			
			    parent ::__construct();
				$this->load->database();
				$this->load->library('session');
				$this->load->helper('url');
				$this->load->helper('number');
				$this->load->model('Auth_model');
				$this->load->model('Common_model');
				$this->load->library('Messages');
				$this->load->library('Logentry');
				
				if($this->session->userdata("account_id")=='')
				{
				 redirect(base_url());
				}
				
				
	}
	
	
	public function personal_user()
	{		   


		
//Left Menu depends on Account ID	      
		if($this->session->userdata("account_id")==1)
		{
		   $left_menu = 'includes/leftMenu_free';
		   
		}
		else if($this->session->userdata("account_id")==2)
	    {
		    $left_menu = 'includes/leftMenu_personal';
		}
	    else if($this->session->userdata("account_id")==3)
	    {
		    $left_menu = 'includes/leftMenu_bussiness';
			
			
		
	  
	  $where = array('customer_id'=> $this->session->userdata("customer_id"));
	  $data['no_departments'] = $this->Common_model->all_record_result('sg_department',$where);
	  $value['no_of_department'] = (count($data['no_departments']));
			
			
			
		}
	


	
	
	    $this->load->view('includes/top');
		$this->load->view('includes/top_menu');
		$this->load->view($left_menu);
		$this->load->view('dashboard',$value);
		$this->load->view('includes/bottom_dashboard');
	
		
		//$this->load->view('original.html');
	}	 
	
	
	public function personal_plan()
	{
		
        $email = $this->session->userdata("email");
        $user_id = $this->session->userdata("user_id");
	    $transaction_amount = $this->session->userdata("transaction_amount");
		$transaction_id = $this->session->userdata("transaction_id");
		
		$email_string = explode('@', $email);
        $email_surfix = $email_string[0];
		$folder_name = $email_surfix.'-'.$user_id;
		if (!is_dir('uploads/Personal/'. $folder_name)) 
		{
         mkdir('uploads/Personal/'. $folder_name);
		}
		
		
		
		//Update_auth table
		   $where = array('username'=> $email);
	       $data = array('account_id' => 2);
	       $data['update'] = $this->Common_model->record_update('sg_user_auth',$where,$data);
		   
		//user_details  			
	   $date_time = date('Y-m-d H:i:s');				
	   $where = array('id' => 2);
	   $data['user_account'] = $this->Common_model->all_record('sg_user_account',$where);	
	   $storage_limit = $data['user_account'] -> storage_limit;	

	   
	   $plan = $this->session->userdata("plan_sub");
	   
       $where = array('id'=> $this->session->userdata("user_id"));
	   $data = array('account_id' => 2,'folder_name'=>$folder_name,'freespace'=>$storage_limit,'subscriptiondate'=>$date_time,'subscriptiontype'=>$plan,'status'=>1);
	   $data['user_update'] = $this->Common_model->record_update('sg_user_details',$where,$data);
	   
	   
	   if($data['user_update'])
	   {
		    
	   $payment_data = array('customer_id'=> 2, 'user_id'=>$this->session->userdata("user_id"), 'plan'=>'Personal Plan', 'subscriptiontype'=>$plan, 'Currency'=> 'Dollar', 'Amount'=> $transaction_amount,
		 'Transactionid'=> $transaction_id,'Paymentdate'=>$date_time);	  
		$payment_value = $this->Common_model->insertVal('sg_payment_details',$payment_data);
	   
		   
		   
		    $this->logentry->logcreate($this->session->userdata("user_id"), $this->session->userdata("user_id"), 'Upgrade', 'upgraded Successfully');	
		   
		         $this->session->set_userdata('account_id', '2');			 
                 $this->session->set_userdata('folder_name', $folder_name);	
                 $this->session->set_userdata('transaction_id', '');	
                 $this->session->set_userdata('transaction_amount', '');	
				 $this->messages->setMessageFront('Upgraded successfully','success');
				 redirect('Dashboard');
	   }
						
	}
	

     public function bussiness_plan()
	 {
		 
		  $companyName = $this->session->userdata("company_name");
		  $user_id = $this->session->userdata("user_id");
		  $plan = $this->session->userdata("plan_sub");
		  $email = $this->session->userdata("email");
		  $transaction_amount = $this->session->userdata("transaction_amount");
		  $transaction_id = $this->session->userdata("transaction_id");
          $date_time = date('Y-m-d H:i:s');	
		  
	
	
//Getting size used

           $where = array('id' => $user_id);
		   $data['size_used_already'] = $this->Common_model->all_record('sg_user_details',$where);	
		   $storage_used = $data['size_used_already'] -> size_used;	
	
	//Getting file size 		    
		   $where = array('id' => 3);
		   $data['new_size'] = $this->Common_model->all_record('sg_user_account',$where);	
		   $storage_new = $data['new_size'] -> storage_limit;	
	       $free_space = $storage_new - $storage_used;  

		  
		  
//Company Creation		   
		   $data = array('customer_name'=>$companyName, 'status'=>1);	  
		   $customer_id = $this->Common_model->insertVal('sg_customer',$data);



		 
//Create Folder
		    $this->load->helper('string');
            $random_key = random_string('alnum',5);
			$bussiness_folder_name = $companyName.'-'.$random_key;
			mkdir('uploads/Bussiness/'. $bussiness_folder_name);
			
		
//User details Updation	
			$where = array('id'=>$user_id);
		    $data = array('account_id'=> 3,'role_id'=>1,'customer_id'=>$customer_id,'folder_name'=>$bussiness_folder_name,
			'freespace'=>$free_space,'subscriptiondate'=>$date_time,'subscriptiontype'=>$plan,'status'=>1);
		    $return_data = $this->Common_model->record_update('sg_user_details',$where,$data);
				
				
//User Auth update		
              $where = array('username'=>$email);
		      $data = array('account_id'=> 3, 'role_id'=>1);		
			  $return_data = $this->Common_model->record_update('sg_user_auth',$where,$data);	
			
			
//Payment     		 
    
	   $payment_data = array('customer_id'=> $customer_id , 'user_id'=>$this->session->userdata("user_id"), 'plan'=>'Bussiness Plan', 'subscriptiontype'=>$plan, 'Currency'=> 'Dollar', 'Amount'=> $transaction_amount,
		 'Transactionid'=> $transaction_id,'Paymentdate'=>$date_time);	  
		$payment_value = $this->Common_model->insertVal('sg_payment_details',$payment_data);
		 
		if($return_data)
	   {
		     
		    $this->logentry->logcreate($this->session->userdata("user_id"), $this->session->userdata("user_id"), 'Upgrade', 'Upgraded Successfully');	
		         $this->session->set_userdata('transaction_id', '');		
		         $this->session->set_userdata('transaction_amount', '');		
		         $this->session->set_userdata('account_id', '3');		
                 $this->session->set_userdata('role_id', 1);						 
                 $this->session->set_userdata('folder_name', $bussiness_folder_name);	
                 $this->session->set_userdata('customer_id', $customer_id);	
				 $this->messages->setMessageFront('Upgration is successfull','success');
				 redirect('Dashboard');
	   }
	 }
	 
	 
	 
	 
     public function renewal()
	 {
		 //echo $this->session->userdata("type_post"); exit;
		   $date_time = date('Y-m-d H:i:s');
		   $where = array('id'=> $this->session->userdata("user_id"));
		   $plan = $this->session->userdata("plan_sub");
		   $transaction_amount = $this->session->userdata("transaction_amount");
		   $transaction_id = $this->session->userdata("transaction_id");
	  
	  $data = array('subscriptiondate'=>$date_time,'subscriptiontype'=>$plan,'status'=>1);
	  
	   $data['user_update'] = $this->Common_model->record_update('sg_user_details',$where,$data);
	   
//Payment	   
	   $payment_data = array('customer_id'=> $this->session->userdata("customer_id"), 'user_id'=>$this->session->userdata("user_id"), 'plan'=>'Renewal' , 'subscriptiontype'=>$plan, 'Currency'=> 'Dollar', 'Amount'=> $transaction_amount,
		 'Transactionid'=> $transaction_id,'Paymentdate'=>$date_time);	  
		$payment_value = $this->Common_model->insertVal('sg_payment_details',$payment_data);
	   
	   
	   if($data['user_update'])
	   {
		   $this->session->set_userdata('plan_sub', '');
		   $this->session->set_userdata('transaction_id', '');
		   $this->session->set_userdata('transaction_amount', '');
		     
		    $this->logentry->logcreate($this->session->userdata("user_id"), $this->session->userdata("user_id"), 'Renewal', 'Renewal is Successfully');	
				 $this->messages->setMessageFront('Renewal is Successfull','success');
				 redirect('Dashboard');
	   }
						
		 
	 }

 
     public function renewal_bussiness_user()
	 {
		   $date_time = date('Y-m-d H:i:s');
		  
		   $where = array('id'=> $this->session->userdata("renewal_id"));
		   $plan = $this->session->userdata("plan_sub");
		   $transaction_amount = $this->session->userdata("transaction_amount");
		   $transaction_id = $this->session->userdata("transaction_id");
	       
		   $data = array('subscriptiondate'=>$date_time,'subscriptiontype'=>$plan,'status'=>1);
	       $data['user_update'] = $this->Common_model->record_update('sg_user_details',$where,$data);
	   
	   if($data['user_update'])
	   {
		      $payment_data = array('customer_id'=> $this->session->userdata("customer_id"), 'user_id'=>$this->session->userdata("renewal_id"),'plan'=>'Bussiness Renewal','subscriptiontype'=>$plan, 'Currency'=> 'Dollar', 'Amount'=> $transaction_amount,
		 'Transactionid'=> $transaction_id,'Paymentdate'=>$date_time);	  
		$payment_value = $this->Common_model->insertVal('sg_payment_details',$payment_data);
	   
		   $this->logentry->logcreate($this->session->userdata("user_id"), $this->session->userdata("renewal_id"), 'Renewal', 'Renewal is Successfully');
		   $this->session->set_userdata('plan_sub', '');
		   $this->session->set_userdata('renewal_id', '');
		   $this->session->set_userdata('transaction_amount', '');
		   $this->session->set_userdata('transaction_id', '');
				 $this->messages->setMessageFront('Renewal is Successfull','success');
				 redirect('Dashboard');
	   }
						
		 
	 }
	
    }
	
	
