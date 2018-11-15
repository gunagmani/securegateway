<?php
Class Securegateway extends CI_Controller{

	public function __construct()
		{
			
			    parent ::__construct();
				$this->load->database();
				$this->load->model('Auth_model');
				$this->load->model('Common_model');

				$this->load->library('session');
				$this->load->library('Messages');
			    $this->load->library('Logentry');
				$this->load->library('facebook');
				$this->load->helper('url');
				
	
	    }
	
	
	public function index()
	{		   
	
		
		
        $this->session->set_userdata('otp', '');
	
		  if($this->session->userdata("user_id")!='')
				{
				 redirect(base_url('Dashboard'));
				}
				
		$this->load->view('index');		
		//$this->load->view('login/profile');		
		//$this->load->view('original.html');
	}	 	
	
	public function view_login()
	{		
	
	  if($this->session->userdata("user_id")!='')
				{
				 redirect(base_url('Dashboard'));
				}
		$this->session->set_userdata('otp', '');
		
		
		$this->load->view('login/signin');		
		
		//$this->load->view('original.html');
	}	
	
	
	public function googleplus(){
		if (isset($_GET['code'])) {
			
			$this->googleplus->getAuthenticate();
			$this->session->set_userdata("login",0);
			$user_profiles = $this->googleplus->getUserInfo();
			$user_profile['first_name']=$user_profiles['given_name'];
				$user_profile['last_name']=$user_profiles['family_name'];
				$user_profile['email']=$user_profiles['email'];
				
			$this->session->set_userdata('user_profile',$user_profile);
			redirect('Securegateway/sociallogin');
			
			
		} 
		
		
		
	}
	public function facebook(){
		//echo "login success";
			
		/*if($this->facebook->logged_in()){
			
			$user = $this->facebook->user();

			if ($user['code'] === 200)
			{
				$this->session->set_userdata('login',0);
				$this->session->set_userdata('user_profile',$user['data']);
				redirect('Securegateway/sociallogin');
			}

		} */
			$this->session->set_userdata("login",0);
		$data['user'] = array();

		// Check if user is logged in
		if ($this->facebook->is_authenticated())
		{
			// User logged in, get user details
			$user_profiles = $this->facebook->request('get', '/me?fields=id,name,email,first_name,last_name');
			if (!isset($user_profiles['error']))
			{
				$user_profile['first_name']=$user_profiles['first_name'];
				$user_profile['last_name']=$user_profiles['last_name'];
				$user_profile['email']=$user_profiles['email'];
				
				
				$this->session->set_userdata('user_profile',$user_profile);
				//$data['user_profile'] = $user_profile;
			}

		}
redirect('Securegateway/sociallogin');

	}
	
	
	public function sociallogin(){
		$contents['user_profile'] = $this->session->userdata('user_profile');
		$where=array('username'=> $contents['user_profile']['email']);
		
		$data['detail'] = $this->Common_model->all_record_result('sg_user_auth',$where);
	
	     

	    $count = count($data['detail']); 

	
	
	     if($count==1)
		{
				$id = $data['detail'][0] -> id;	        	
                 $role_id = $data['detail'][0] -> role_id;
                 $lastlogin = $data['detail'][0] -> lastlogin;
				 $account_id = $data['detail'][0] -> account_id;
	$otp_option = $data['detail'][0] -> otp_option;				 
				 

	              $where = array('auth_id' => $id);
	              $datas['user_details'] = $this->Common_model->all_record('sg_user_details',$where);				 
                
				 	  
				   $firstname = $datas['user_details'] -> firstname;	
                   $email = $datas['user_details']-> email;
                   $id_user_details = $datas['user_details'] -> id;
                   $folder_name = $datas['user_details'] -> folder_name;
                   $customer_id = $datas['user_details'] -> customer_id;
                   $createddate = $datas['user_details'] -> createdate;
                   $status = $datas['user_details'] -> status;
				    	
	 $this->session->set_userdata("login_id",$id);
			
				   if($otp_option==1)
				   {
				   
               /*  $this->session->set_userdata('account_id', $account_id);
                 $this->session->set_userdata('role_id', $role_id);				 
                 $this->session->set_userdata('firsttname', $firstname);				 
                 $this->session->set_userdata('email', $email);				 
                 $this->session->set_userdata('folder_name', $folder_name);				 		 
                 $this->session->set_userdata('user_id', $id_user_details);
                 $this->session->set_userdata('customer_id', $customer_id);
                 $this->session->set_userdata('status', $status);
                 $this->session->set_userdata('last_login', $lastlogin); */
				 $this->session->set_userdata("login",0);
				 //echo  $this->session->userdata("login");
				 if($this->session->userdata("otp")=='')
			 {
			     $num_str = sprintf("%06d", mt_rand(1, 999999));
				 $this->session->set_userdata('otp', $num_str);   
				   //echo $num_str; exit;
				   
			      $this->load->library('email');
                  $this->email->set_newline("\r\n");
	              
				$this->email->from("noreply@securegateway.io","Secure Gateway");
				$this->email->to($email);
				$this->email->subject("One Time Password");
				$this->email->set_mailtype("html");
				
				//$data = "One time password : ".$num_str;
				$data['otp'] = $num_str;
				$body = $this->load->view('email/otp',$data,true);
				$this->email->message($body);   
				$this->email->send();
				$result = $this->email->send();  
				

              }
			 
		 $this->messages->setMessageFront('One Time password has been Send to your Mail ','success');
						redirect('Securegateway/view_onetimepwd');
                 		 // redirect('Dashboard');
		}
		else{
			  $this->session->set_userdata('account_id', $account_id);
                 $this->session->set_userdata('role_id', $role_id);				 
                 $this->session->set_userdata('firsttname', $firstname);				 
                 $this->session->set_userdata('email', $email);				 
                 $this->session->set_userdata('folder_name', $folder_name);				 		 
                 $this->session->set_userdata('user_id', $id_user_details);
                 $this->session->set_userdata('customer_id', $customer_id);
                 $this->session->set_userdata('status', $status);
                 $this->session->set_userdata('last_login', $lastlogin);
				 $this->session->set_userdata("login",1);
				 //echo  $this->session->userdata("login");
				 redirect('Dashboard');
		}
		}
		else
		{
			$this->load->view('login/fbregister',$contents);
	}
	}
	
	public function view_registration()
	{		   
	
	   if($this->session->userdata("user_id")!='')
				{
				 redirect(base_url('Dashboard'));
				}
				
				$data = array();
				if($this->input->post('price_plan'))	
				{
		           $data['plan_data']=$this->input->post('price_plan');
				}
		        else
				{
			       $data['plan_data']=0;
	           	}	
	    $this->session->set_userdata('otp', '');
		$this->load->view('login/signup', $data);				
		
	}

	public function view_onetimepwd()
	{
		
		if($this->session->userdata("otp")!='')
		{
			  
			 if($this->session->userdata("login")==1)
				{
				 redirect(base_url('Dashboard'));
				}
					
		$this->load->view('login/onetime');		
		}
		else
		{
		 redirect(base_url('Securegateway/view_login'));
		}
     
	 
	 }
	
		public function view_emailotp()
	{
		  if($this->session->userdata("user_id")!='')
				{
				 redirect(base_url('Dashboard'));
				}
			
		$this->load->view('login/email_otp');		
			
    }
	
		
	public function view_forgot()
	{		   	
		
		$this->load->view('login/forgot');		
		
		//$this->load->view('original.html');
	}	
	
	public function view_forgotreset()
	{		   	
		
		$this->load->view('login/forgot_reset');		
		
		//$this->load->view('original.html');
	}	
	
	public function registration()
	{
		
		
		 $type=$this->input->post('user_type');
		  $logintype=$this->input->post('logintype');
		
		if($type==1)
		{
	    $first_name=$this->input->post('first_name');
		$email=$this->input->post('email');
		$phone=$this->input->post('phone');
		//$password=$this->input->post('password');
		$this->load->helper('string');
	    $password= random_string('alnum',8);
		$last_name= "None";
		
	    $customer_id = 1;
		}
		else if($type==3)
		{
		$first_name=$this->input->post('first_name'); 
		$last_name=$this->input->post('last_name');
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		if($logintype=="social")
		{
			$this->load->helper('string');
		 $password= random_string('alnum',8);
				 
		}
		
		$phone=$this->input->post('phone');
		$companyName=$this->input->post('companyName');
		}
		else
		{
	    $first_name=$this->input->post('first_name');
		$last_name=$this->input->post('last_name');
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		$phone=$this->input->post('phone');
		
		
		if($logintype=="social")
		{
			$this->load->helper('string');
		 $password= random_string('alnum',8);
		 
		// $this->send_email($email,$password_mail,$type);	
		//exit;
				 
		}
		$customer_id = 2;
		
		
	
		}
		$password_mail = $password; 
		$password = md5($password);		
		
				 if($type==1)
				 {
					
				  
				  $this->session->set_userdata('type_post', $type);
		          $this->session->set_userdata('first_name_post', $first_name);
				  $this->session->set_userdata('email_post', $email);
				  $this->session->set_userdata('password_post', $password);
				  $this->session->set_userdata('password_mail', $password_mail);
				  $this->session->set_userdata('lastname_post', $last_name);
				  $this->session->set_userdata('phone_post', $phone);
				  $this->session->set_userdata('customer_id_post', $customer_id);
				   $this->session->set_userdata('logintype', $logintype);

				    	
					 if($this->session->userdata("otp")=='')
					 {
							$mail_send = $this->onetime_mail($email);
					 }	

		             $this->messages->setMessageFront('One Time password has been Send to your Mail ','success');
				     redirect('Securegateway/view_emailotp');
				  
				 }
	  
		          if($type==3 || $type==2)
				 {
		         $this->session->set_userdata('type_post', $type);
		         $this->session->set_userdata('first_name_post', $first_name);
                 $this->session->set_userdata('last_name_post', $last_name);				 
                 $this->session->set_userdata('email_post', $email);				 
                 $this->session->set_userdata('password_post', $password);	
 $this->session->set_userdata('password_mail', $password_mail);				 
                 $this->session->set_userdata('phone_post', $phone);
				$this->session->set_userdata('logintype', $logintype);				 
                 $this->session->set_userdata('customer_id_post', $customer_id);
                 $this->session->set_userdata('companyName_post', $companyName);
				  
				     if($this->session->userdata("otp")=='')
					 {
							$mail_send = $this->onetime_mail($email);
					 }	

		             $this->messages->setMessageFront('One Time password has been Send to your Mail ','success');
				     redirect('Securegateway/view_emailotp');
				
				 }

		}
	

		public function free_reg()
        {
	
			
			$type = $this->session->userdata("type_post");
			$first_name = $this->session->userdata("first_name_post");
			$email = $this->session->userdata("email_post");
			$password = $this->session->userdata("password_post");
			$password_mail = $this->session->userdata("password_mail");
			$last_name = $this->session->userdata("lastname_post");
			$phone = $this->session->userdata("phone_post");
			$customer_id = $this->session->userdata("customer_id_post");
			$logintype = $this->session->userdata("logintype");
				  $date_time = date('Y-m-d H:i:s');
				  
				  $data = array('account_id'=> $type,'role_id'=> '1', 'username'=>$email, 'password'=>$password,
				  'createddate'=>$date_time, 'modifieddate'=>$date_time, 'status'=>1, 'lastlogin'=>$date_time);
				  $auth_id = $this->Auth_model->regForm($data);
				  
				  //Getting file size used		    
				   $where = array('id' => $type);
				   $data['user_account'] = $this->Common_model->all_record('sg_user_account',$where);	
				   $storage_limit = $data['user_account'] -> storage_limit;	
				  
				  if($auth_id)
				  {
				   $user_detail = array('account_id'=> $type,'role_id'=> '1', 'auth_id'=>$auth_id, 'customer_id'=>$customer_id,
				  'firstname'=>$first_name, 'lastname'=>$last_name, 'phone'=>$phone, 'email'=>$email, 'createdate'=>$date_time, 
				  'modifieddate'=>$date_time,'size_used'=>0,'freespace'=> $storage_limit,'subscriptiondate'=>$date_time, 'subscriptiontype'=>'T', 'status'=>1);
				  
				   $return_data = $this->Common_model->insertVal('sg_user_details',$user_detail);
				   
				   
				   
		// Log Creation	
		
				 $user_log = array('user_id'=> $auth_id,'object_id'=> $auth_id, 'activity'=>'User Creation', 'description'=>"Personal user has been created",  'createddate'=>$date_time);
				   $log_creation = $this->Common_model->insertVal('sg_user_logs',$user_log);
				   
				   
				   
				   
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
				   
					if($return_data)
					{
						$this->send_email($email,$password_mail,$type, $logintype);
						if($type==1){
							
							$this->session->set_userdata('type_post', '');
		                    $this->session->set_userdata('first_name_post', '');
				            $this->session->set_userdata('email_post', '');
				            $this->session->set_userdata('password_post', '');
				            $this->session->set_userdata('password_mail', '');
				            $this->session->set_userdata('lastname_post', '');
				            $this->session->set_userdata('phone_post', '');
				            $this->session->set_userdata('customer_id_post', '');
							$this->session->set_userdata('logintype', '');
							
							
						$this->messages->setMessageFront('Registered Successfully. Please check your mail for password','success'); 
						}
						
						redirect('Securegateway/view_login');
						//exit;
					}
					else
					{
							//exit;
						$this->messages->setMessageFront('Registration Failed','error');
						redirect('Securegateway/view_login');
				
					}
				  
				  
				  }
	
	
	
	}
	
			function email_otp()
        {
			//var_dump($_POST);exit;
			 $otp=$this->input->post('otp');
			if($this->session->userdata("otp")==$otp)
			{
				$this->session->set_userdata('otp', '');
				
				if($this->session->userdata('type_post')==1)
				{
			     redirect('Securegateway/free_reg');	
				}
				else if($this->session->userdata('type_post')==4)
				{
					$this->session->set_userdata('login', 1);
			     redirect('DashboardGuestUser');	

				}
				 else
				 {
                 redirect('Payment');					 
				 }
				  
			}
			else
			{
				$this->messages->setMessageFront('Entered OTP is Invalid. Please try again.','error');
				  redirect('Securegateway/view_emailotp');
			}
		}
	
	
	public function payment_reg()
	{
		
		$type = $this->session->userdata("type_post");
		$first_name =$this->session->userdata("first_name_post");
		$last_name = $this->session->userdata("last_name_post");
		$email = $this->session->userdata("email_post");
		$password = $this->session->userdata("password_post");
		$password_mail=$this->session->userdata("password_mail");
		$phone = $this->session->userdata("phone_post");
		$customer_id = $this->session->userdata("customer_id_post");
		$companyName = $this->session->userdata("companyName_post");
		$plan = $this->session->userdata("plan_sub");
		$transaction_id = $this->session->userdata("transaction_id");
		$transaction_amount = $this->session->userdata("transaction_amount");
$logintype=$this->session->userdata("logintype");
	
	   if($type==3)
	   {
//Company Creation		   
		   $data = array('customer_name'=>$companyName, 'status'=>1);	  
		   $customer_id = $this->Common_model->insertVal('sg_customer',$data);
	   }

//Getting file size used		    
       $where = array('id' => $type);
	   $data['user_account'] = $this->Common_model->all_record('sg_user_account',$where);	
	   $storage_limit = $data['user_account'] -> storage_limit;	
	   
  
//User Auth	   
	  $date_time = date('Y-m-d H:i:s');
	  $data = array('account_id'=> $type,'role_id'=> '1', 'username'=>$email, 'password'=>$password,
	  'createddate'=>$date_time, 'modifieddate'=>$date_time, 'status'=>1, 'lastlogin'=>$date_time);
      $auth_id = $this->Auth_model->regForm($data);


      
	  if($auth_id)
	  {
//User details      
      $user_detail = array('account_id'=> $type,'role_id'=> 1, 'auth_id'=>$auth_id, 'customer_id'=>$customer_id,
	  'firstname'=>$first_name, 'lastname'=>$last_name, 'phone'=>$phone, 'email'=>$email, 'createdate'=>$date_time, 
	  'modifieddate'=>$date_time,'size_used'=>0,'freespace'=> $storage_limit, 'subscriptiondate'=>$date_time, 'subscriptiontype'=>$plan, 'status'=>1);
       $return_data = $this->Common_model->insertVal('sg_user_details',$user_detail);
	   
	   
	   
	   
//temp user_id Swap (File transffer)
  $t_userid = $return_data;
	   
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
					$data = array('file_id'=>$file_id, 'user_id'=>$user_id, 'status'=>1, 'date_time'=>$uploaded_date);	  
					$return_value = $this->Common_model->insertVal('sg_file_share',$data);
					
					    if($return_value)
						{
						$where = array('email_id'=> $email);
	                    $data = array('reg_status' => 1);
	                    $data['delete'] = $this->Common_model->record_update('sg_file_share_nonreg',$where,$data);
						
						}
					
					
		        }
		}
	   
	   
	   
	   
	   
//Folder creation	
   
		if($type==2)
		{
		$email_string = explode('@', $email);
        $email_surfix = $email_string[0];
		$folder_name = $email_surfix.'-'.$return_data;
		if (!is_dir('uploads/Personal/'. $folder_name)) 
		{
         mkdir('uploads/Personal/'. $folder_name);
		 $where = array('id'=>$return_data);
		 
		 $data = array('folder_name'=>$folder_name);
		 
		 $return_data = $this->Common_model->record_update('sg_user_details',$where,$data);
		 
	 
//Payment     		 
	 $payment_data = array('customer_id'=> 2, 'user_id'=>$t_userid, 'plan'=>'Personal Plan', 'subscriptiontype'=>$plan, 'Currency'=> 'Dollar', 'Amount'=> $transaction_amount,
		 'Transactionid'=> $transaction_id,'Paymentdate'=>$date_time);	  
					$return_value = $this->Common_model->insertVal('sg_payment_details',$payment_data);
		 
        }
		}
		else if($type==3)
		{
			$this->load->helper('string');
            $random_key = random_string('alnum',5);
			$bussiness_folder_name = $companyName.'-'.$random_key;
			mkdir('uploads/Bussiness/'. $bussiness_folder_name);
			$where = array('id'=>$return_data);
		    $data = array('folder_name'=>$bussiness_folder_name);
		    $return_data = $this->Common_model->record_update('sg_user_details',$where,$data);
		//Payment     		 
			

		 $payment_data = array('customer_id'=> $customer_id, 'user_id'=>$t_userid, 'plan'=>'Bussiness Plan', 'subscriptiontype'=>$plan, 'Currency'=> 'Dollar', 'Amount'=> $transaction_amount,
		 'Transactionid'=> $transaction_id,'Paymentdate'=>$date_time);	  
					$return_value = $this->Common_model->insertVal('sg_payment_details',$payment_data);
		
		
		}
		
		
//Unset the session datas	
		         
				 $this->session->set_userdata('type_post', '');
		         $this->session->set_userdata('first_name_post', '');
                 $this->session->set_userdata('last_name_post', '');				 
                 $this->session->set_userdata('email_post', '');				 
                 $this->session->set_userdata('password_post', '');	
  $this->session->set_userdata('password_mail', '');					 
                 $this->session->set_userdata('phone_post', '');				 		 
                 $this->session->set_userdata('customer_id_post', '');
                 $this->session->set_userdata('companyName_post', '');
                 $this->session->set_userdata('transaction_amount', '');
                 $this->session->set_userdata('transaction_id', '');
		
		  $this->session->set_userdata('logintype', '');
		
		
		
		if($return_data)
		{
		$this->send_email($email,$password_mail,$type,$logintype);
		$this->messages->setMessageFront('Registered Successfully.','success');
	    redirect('Securegateway/view_login');
		//exit;
		}
		else
		{
			//exit;
		$this->messages->setMessageFront('Registration Failed','error');
		redirect('Securegateway/view_login');
	
		}
	  
	  
	  }
	  
	  }		  
	
	
	
	
	
	
	
	 public function login()
	{
	
		
	    $uname = $this->input->post('email');
		$pwd = md5($this->input->post('pwd'));
		
		
		
//echo $uname, $pwd;
//exit;
        $data = array('uname'=>$uname,'password'=> $pwd);
   
            $data['detail'] = $this->Auth_model->loginCheck($data); 
			$counts = count($data['detail']);
			
		if($counts==1)
            {

                 $id = $data['detail'] -> id;		
                 $account_id = $data['detail'] -> account_id;		
                 $role_id = $data['detail'] -> role_id;
                 $lastlogin = $data['detail'] -> lastlogin;
				   $otp_option = $data['detail'] -> otp_option;	
		   
	              $where = array('auth_id' => $id);
	              $data['user_details'] = $this->Common_model->all_record('sg_user_details',$where);				 
                 
				 	  
				   $firstname = $data['user_details'] -> firstname;	
                   $email = $data['user_details'] -> email;
                   $id_user_details = $data['user_details'] -> id;
                   $folder_name = $data['user_details'] -> folder_name;
                   $customer_id = $data['user_details'] -> customer_id;
                   $createddate = $data['user_details'] -> createdate;
                   $status = $data['user_details'] -> status;

				   $this->session->set_userdata('login_id', $id);
				   if($otp_option==1)
				   {
				   /*
                 $this->session->set_userdata('account_id', $account_id);
                 $this->session->set_userdata('role_id', $role_id);				 
                 $this->session->set_userdata('firsttname', $firstname);				 
                 $this->session->set_userdata('email', $email);				 
                 $this->session->set_userdata('folder_name', $folder_name);				 		 
                 $this->session->set_userdata('user_id', $id_user_details);
                 $this->session->set_userdata('customer_id', $customer_id);
                 $this->session->set_userdata('status', $status);
                 $this->session->set_userdata('last_login', $lastlogin);
                 				 
			*/
			 if($this->session->userdata("otp")=='')
			 {
			     $num_str = sprintf("%06d", mt_rand(1, 999999));
				 $this->session->set_userdata('otp', $num_str);   
				   //echo $num_str; exit;
				   
			      $this->load->library('email');
                  $this->email->set_newline("\r\n");
	              
				$this->email->from("noreply@securegateway.io","Secure Gateway");
				$this->email->to($email);
				$this->email->subject("One Time Password");
				$this->email->set_mailtype("html");
				
				//$data = "One time password : ".$num_str;
				$data['otp'] = $num_str;
				$body = $this->load->view('email/otp',$data,true);
				$this->email->message($body);   
				$this->email->send();
				$result = $this->email->send();  
				

              }
			 
		 $this->messages->setMessageFront('One Time password has been Send to your Mail ','success');
				redirect('Securegateway/view_onetimepwd');


		   }
		   else{
			  $this->session->set_userdata('account_id', $account_id);
                 $this->session->set_userdata('role_id', $role_id);				 
                 $this->session->set_userdata('firsttname', $firstname);				 
                 $this->session->set_userdata('email', $email);				 
                 $this->session->set_userdata('folder_name', $folder_name);				 		 
                 $this->session->set_userdata('user_id', $id_user_details);
                 $this->session->set_userdata('customer_id', $customer_id);
                 $this->session->set_userdata('status', $status);
                 $this->session->set_userdata('last_login', $lastlogin);  
				 redirect('Dashboard');
			   
		   }
			}
		   else
		   {
				 $this->messages->setMessageFront('Invalid username or password.','error');
			      redirect('securegateway/view_login');
              
		   }
                
     }
	 
	 
	 
	   public function send_email($email,$password,$type,$logintype)
	{
		
                $data['type'] = $type; 
	            $data['password'] = $password;
				$data['logintype']= $logintype;
	            $this->load->library('email');
	
                $this->email->set_newline("\r\n");	            
				$this->email->from("noreply@securegateway.io","Secure Gateway");
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
	 
	 	 function onetime()

        {
			//var_dump($_POST);exit;
			 $otp=$this->input->post('otp');
			 
			 	 if($otp!='')
			 {
			if($this->session->userdata("otp")==$otp)
			{
				echo "login  success";
				
				$this->session->set_userdata('otp', '');
				$this->session->set_userdata('login', 1);
				
				
				  $id = $this->session->userdata("login_id");
				  //echo $id;
				 // exit;
//User details table				
				  
	              $where = array('auth_id' => $id);
	              $data['user_details'] = $this->Common_model->all_record('sg_user_details',$where);				 
  
				   $firstname = $data['user_details'] -> firstname;	
                   $email = $data['user_details'] -> email;
                   $id_user_details = $data['user_details'] -> id;
                   $folder_name = $data['user_details'] -> folder_name;
                   $customer_id = $data['user_details'] -> customer_id;
                   $createddate = $data['user_details'] -> createdate;
                   $status = $data['user_details'] -> status;
                   
//User Auth table            
			$data = array('username'=>$email);
            $data['detail'] = $this->Common_model->all_record('sg_user_auth',$data); 
			
			
			

                 $id = $data['detail'] -> id;		
                 $account_id = $data['detail'] -> account_id;		
                 $role_id = $data['detail'] -> role_id;
                 $lastlogin = $data['detail'] -> lastlogin;
				 
				   
				 $this->session->set_userdata('login_id', '');
                 $this->session->set_userdata('account_id', $account_id);
                 $this->session->set_userdata('role_id', $role_id);				 
                 $this->session->set_userdata('firsttname', $firstname);				 
                 $this->session->set_userdata('email', $email);				 
                 $this->session->set_userdata('folder_name', $folder_name);				 		 
                 $this->session->set_userdata('user_id', $id_user_details);
                 $this->session->set_userdata('customer_id', $customer_id);
                 $this->session->set_userdata('status', $status);
                 $this->session->set_userdata('last_login', $lastlogin);
				   
				   
				$this->logentry->logcreate($this->session->userdata("user_id"), $this->session->userdata("user_id"), 'Login', 'Login Successfully');

				  redirect('Dashboard');
			}
			else
			{
				$this->messages->setMessageFront('Entered OTP is Invalid. Please try again.','error');
				  redirect('Securegateway/view_onetimepwd');
			}
			 }
		}
		
		
		

		
	
	 
	 
	  function onetime_mail($email)

        {
	            $num_str = sprintf("%06d", mt_rand(1, 999999));
				 $this->session->set_userdata('otp', $num_str);   
				 //echo $num_str; exit;
                
                 				 
			
			      $this->load->library('email');
                  $this->email->set_newline("\r\n");
	              
				$this->email->from("noreply@securegateway.io","Secure Gateway");
				$this->email->to($email);
				$this->email->subject("One Time Password");
				$this->email->set_mailtype("html");
				
				//$data = "One time password : ".$num_str;
				$data['otp'] = $num_str;
				$body = $this->load->view('email/otp',$data,true);
				$this->email->message($body);   
				$this->email->send();
				$result = $this->email->send(); 
				return 1;
	 
	 
		}
	 
	 
	    public function forgot()
        {
			

	    $this->load->helper('url');
		$email= $this->input->post('emailid');
	    $where = array('username'=> $email);
	    $data['user_details'] = $this->Common_model->all_record_result('sg_user_auth',$where);
	    $count = count($data['user_details']); 

	
	
	    if($count==1)
		{
		//$this->load->helper('string');
	    //$password= random_string('alnum',8);
		$uid = $data['user_details'][0]->id;
		$data['link'] = WEB_DIR.'Securegateway/view_forgotreset/'.$uid;

		
		        $this->load->library('email');
                $this->email->set_newline("\r\n");	            
				$this->email->from("noreply@securegateway.io","Secure Gateway");
				$this->email->to($email);
				$this->email->subject("SecureGateway - Password Reset");
				$this->email->set_mailtype("html");
				$body = $this->load->view('email/forgot_email',$data,true);
				$this->email->message($body);   
				$this->email->send();
				$result = $this->email->send(); 
				 $this->messages->setMessageFront('Please check your email for reset the password','success');
			      redirect('securegateway/view_login');

		}
		  else{
	   
	   $this->messages->setMessageFront('Given Email not registered yet.','error');
			      redirect('securegateway/view_login');
	         }

	
			
              
	    }
	 
	 
	 public function forgotreset()
	 {
	
			$password= md5($this->input->post('password'));
	            $user_id = $this->input->post('id');
				$where = array('id' => $user_id);
				$data = array('password' => $password);

		        $data['user_details'] = $this->Common_model->record_update('sg_user_auth',$where,$data);
	
				   $this->messages->setMessageFront('Your password has been reset successfully','success');
			      redirect('securegateway/view_login');  
	 }
	 
	 
	    public function email_check()
        {
	
	  
		$email= $this->input->post('email_reg');
		
	  $where = array('username'=> $email);

	$data['user_details'] = $this->Common_model->all_record_result('sg_user_auth',$where);
	
	$count = count($data['user_details']); 

	    if($count==1)
		{
			echo 1;
		}
		else
		{
			echo 2;
		}
		}
	 
	 public function logout()
	{
	    $date_time = date('Y-m-d H:i:s');
		$email_val = $this->session->userdata("email");
		$date_time = array('lastlogin' => $date_time);
		$where = array('username' => $email_val);
	   $data['user_details'] = $this->Common_model->record_update('sg_user_auth',$where,$date_time);
	if($this->session->userdata("user_id")!='')
	{
	$this->logentry->logcreate($this->session->userdata("user_id"), $this->session->userdata("user_id"), 'Logout', 'Logout Successfully');
	}
		$user_data = $this->session->all_userdata();
		$user_data = $this->session->all_userdata();
			foreach ($user_data as $key => $value)
			{
				if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
					$this->session->unset_userdata($key);
				}
			}
		$this->session->sess_destroy();
		redirect(base_url());
	}
		
		public function about_us()
	{		   
	
		$this->load->view('about');		
		//$this->load->view('login/profile');		
		//$this->load->view('original.html');
	}
	
	//Contact Form 
	public function contact()
	{
	 $contact_name=$this->input->post('contact_name');
	  $contact_email=$this->input->post('contact_email');
	   $contact_subject=$this->input->post('contact_subject');
	   	   $contact_message=$this->input->post('contact_message');
		   
		/////// echo $contact_name."=".$contact_email."=".$contact_message; die;
		   $data['message'] = "The Message from $contact_name is : ".$contact_message;				
		        //$data['password'] = $password;				
		        		
				$this->load->library('email');
				
                $this->email->set_newline("\r\n");	            
				//$this->email->from($contact_email);
				$this->email->from($contact_email, $contact_name);
				$this->email->to('sales@securegateway.io');
				$this->email->to('maninalli@qrsolutions.in');
				$this->email->subject("SecureGateway - Contact From ".$contact_name);
				$this->email->set_mailtype("html");
				//$body = $this->load->view('email/download',$data,true);
				$body = "<h1>SecureGateway<h1> <br> <h3>".$data['message']." </h3>";
				$this->email->message($body);   
				$this->email->send();
				$result = $this->email->send();		   
		   				
		   
		    $this->messages->setMessageFront('Thanks for Contacting Us,Our team will get backup t you','success');
				     redirect('Securegateway/index'); 
	 
    }
	
	
}