<?php
Class Dashboard extends CI_Controller{

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
	
	
	public function index()
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
			
			
			 $where = array('customer_id'=> $this->session->userdata("customer_id"), 'role_id'=>'2');

	  $data['no_users'] = $this->Common_model->all_record_result('sg_user_details',$where);
	  $value['no_of_users'] = (count($data['no_users']));
	  
	  
	  $where = array('customer_id'=> $this->session->userdata("customer_id"));
	  $data['no_departments'] = $this->Common_model->all_record_result('sg_department',$where);
	  $value['no_of_department'] = (count($data['no_departments']));
			
			
			
		}
	
	  
	  $where = array('user_id' => $this->session->userdata("user_id"));
	  $data['no_files'] = $this->Common_model->all_record_result('sg_file',$where);
	  $value['no_of_files_uploaded'] = (count($data['no_files']));
	  
	  $data['size'] = $this->Common_model->record_sum('sg_file',$where); 
	  $value['size']  = $data['size'] -> file_Size;
	
				 				  
      $where = array('username' => $this->session->userdata("email"));	      
      $data['lastseen'] = $this->Common_model->all_record('sg_user_auth',$where);
	
      
	
	
	 $where = array('user_id' => $this->session->userdata("user_id"), 'download'=>0);
	 $data['downloads'] = $this->Common_model->all_record_result('sg_file_share',$where);
	 $value['downloads'] = (count($data['downloads']));
	
	
	$value['lastseen'] = $data['lastseen'] -> lastlogin;

	
	
	    $this->load->view('includes/top');
		$this->load->view('includes/top_menu');
		$this->load->view($left_menu);
		$this->load->view('dashboard',$value);
		$this->load->view('includes/bottom_dashboard');
	
		
		//$this->load->view('original.html');
	}	 
	
	public function profile()
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

		}
	

				 				  
      $where = array('id' => $this->session->userdata("user_id"));	      
      $data['user_details'] = $this->Common_model->all_record('sg_user_details',$where);
	 
	  $value['firstname'] = $data['user_details'] -> firstname;
	  $value['lastname'] = $data['user_details'] -> lastname;
	  $value['phone'] = $data['user_details'] -> phone;
	  $value['email'] = $data['user_details'] -> email;
	  $value['size_used'] = $data['user_details'] -> size_used;
	  $value['freespace'] = $data['user_details'] -> freespace;
	  $value['subscriptiontype'] = $data['user_details'] -> subscriptiontype;
      
	   $where = array('user_id' => $this->session->userdata("user_id"));
	    $data['size'] = $this->Common_model->record_sum('sg_file',$where); 
	  $value['size_used']  = $data['size'] -> file_Size;

	  
	 $where = array('id' => $this->session->userdata("customer_id"));	      
     $data['customer_details'] = $this->Common_model->all_record('sg_customer',$where);
	 $value['company'] = $data['customer_details'] -> customer_name;
	  
	   $where = array('user_id' => $this->session->userdata("user_id"), 'status'=>1);	      
     $data['subs_details'] = $this->Common_model->all_record('sg_user_subscribe_details',$where);
	 

	 if($data['subs_details']=='')
	 {
		 $value['expiry'] = "Your already expired"; 
	 }
	 else{
		$value['expiry'] = $data['subs_details'] -> expiredate; 
	 }
	 

	    $this->load->view('includes/top');
		$this->load->view('includes/top_menu');
		$this->load->view($left_menu);
		$this->load->view('profile',$value);
		$this->load->view('includes/bottom_dashboard');
	
		
		//$this->load->view('original.html');
	}	 
	
	
	
	
	
	
	public function user_edit()
	{
		
			$firstname= $this->input->post('firstname');
			$lastname= $this->input->post('lastname');
			$phone= $this->input->post('phone');
		
		$where = array('id' => $this->session->userdata("user_id"));
	    $data = array('firstname' => $firstname,'lastname' => $lastname, 'phone' => $phone );
		$data['user_details'] = $this->Common_model->record_update('sg_user_details',$where,$data);
		
		 $this->logentry->logcreate($this->session->userdata("user_id"), $this->session->userdata("user_id"), 'Profile', 'Profile Edited Successfully');
		 
		if($data)
		{
			$this->messages->setMessageFront('Profile edited successfully','success');
			$this->session->set_userdata('firsttname',$firstname);
			      redirect('dashboard');
		}
	}
	
	
	public function fileUpload()
	{		   
	
	
		$this->load->view('includes/top');
		$this->load->view('includes/top_menu');
		$this->load->view('includes/left_menu');
		$this->load->view('fileupload');
		$this->load->view('includes/bottom_dashboard');
	
		
		//$this->load->view('original.html');
	}	 
	
   public function view_changepwd()
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
		}
		
		//$data['js_to_load']= WEB_DIR.'assets/customjs/changepassword.js';
		$data['js_to_load']= WEB_DIR.'assets/customjs/formvalid.js';
		
		
    	$this->load->view('includes/top');
		$this->load->view('includes/top_menu');
		$this->load->view($left_menu);
		$this->load->view('changepwd');
		$this->load->view('includes/bottom_dashboard', $data);
	
	}
	
	 public function changepass()
    {
	$uname = $this->session->userdata("email");	
	$old_pass = md5($_POST['old_pass']);
	 $data = array('uname'=>$uname,'password'=> $old_pass);
   
            $data['detail'] = $this->Auth_model->loginCheck($data); 
			$counts = count($data['detail']);
		
			
					if($counts==1)
						{
							echo 1;
						}
						else
						{
							echo 2;
						}
		
		
	}
	
	
	 public function old_new_pass()
    {
	$uname = $this->session->userdata("email");	
	$old_pass = md5($_POST['old_pass']);
	 $data = array('uname'=>$uname,'password'=> $old_pass);
   
            $data['detail'] = $this->Auth_model->loginCheck($data); 
			$counts = count($data['detail']);
			
		$where = array('username' => $uname);	      
      $data['old_pass_detail'] = $this->Common_model->all_record('sg_user_auth',$where);
	 
	  $existing_pass = $data['old_pass_detail'] -> password;	
		
			if($existing_pass==$old_pass)
			{
				echo 1;
			}
			else
			{
				echo 2;
			}
		
	}
	
	
	 public function changepassinsert()
    {
	//changepassinsert
    $newpass = md5($this->input->post('newpass'));
	$uname = $this->session->userdata("email");
	 $where = array('username'=>$uname);
		 
		 $data = array('password'=>$newpass);
		 
		 $return_data = $this->Common_model->record_update('sg_user_auth',$where,$data);
		 $this->logentry->logcreate($this->session->userdata("user_id"), $this->session->userdata("user_id"), 'Password Change', 'Password Changed Successfully');	
		if($return_data)
		{
	
		$this->messages->setMessageFront('Password Changed Successfully','success');
		redirect('dashboard');
		}
		else
		{
		$this->messages->setMessageFront('Password Changed Successfully','success');
		redirect('dashboard');
	
		}
	
	}
	
	
		
    }
	
	
