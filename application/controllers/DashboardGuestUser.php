<?php
Class DashboardGuestUser extends CI_Controller{

	public function __construct()
		{
			
			    parent ::__construct();
				$this->load->database();
				$this->load->library('session');
				$this->load->helper('url');
				 $this->load->library('email');
				$this->load->helper('number');
				$this->load->model('Auth_model');
				$this->load->model('Common_model');
				$this->load->library('Messages');
				$this->load->library('Logentry');
				
				
	}
	



	public function index()
	{		   

	
	
if($this->session->userdata('type_post')==4)
{
	
	  $this->load->view('login/guestuserfiledownload');
}
	else{
		
		$user_data = $this->session->all_userdata();
		$user_data = $this->session->all_userdata();
			$this->session->sess_destroy();
		redirect(base_url());
		
		
		}		



		
	}	 
	
	
	public function download()
{
	

	$file_id = $this->uri->segment(3);
	
	//$file_id=$this->session->userdata("file_id"); 
    /* $where = array('file_id'=> $file_id);
	$data = array('download' => 1);
	$data['file_update'] = $this->Common_model->record_update('sg_file_share_nonreg',$where,$data);  */

	
	$where = array('id'=> $file_id);
	$data['file_detail'] = $this->Common_model->all_record('sg_file',$where);

		$file_name = $data['file_detail'] -> file_name;
	$original_name = $data['file_detail'] -> original_name;
	$path = $data['file_detail'] -> path;
	$file_owner_id = $data['file_detail'] -> user_id;
	$password = $data['file_detail'] -> password;

	$path = FILE_DOWNLOAD_URL.$path;
	$account_id = $this->session->userdata("account_id");
    $folder_name = $this->session->userdata("folder_name");	
	

//Fine email from user ID

    
    $user_email = $this->session->userdata("email_post");
	 $download_user_fname = $user_email;
	     $download_user_lname = '';
	
		        $data['message'] = "Password for the downloaded file New Check :".$original_name."<br/>";				
		        $data['password'] = $password;				
		 					
                $this->email->set_newline("\r\n");	            
			$this->email->from("noreply@securegateway.io","Secure Gateway");
				$this->email->to($user_email);
				$this->email->subject("SecureGateway - File Download Notification");
				$this->email->set_mailtype("html");
				$body = $this->load->view('email/download',$data,true);
				//$body = '<h1>SecureGateway<h1> <br> <h3>File has been uploaded in Securegateway <h3>';
				$this->email->message($body);   
				$this->email->send();
				$result = $this->email->send(); 
				
				
			if($download_user_lname=="None")
{
	$download_user_lname=" ";
}	
				// File Download Admin  Notification  Added By Mani Nalliappan - Start
 $user_where = array('id'=>$file_owner_id);
	$data['admin_email_user'] = $this->Common_model->all_record('sg_user_details',$user_where);	
    $admin_user_email = $data['admin_email_user'] -> email;
 $admin_user_fname = $data['admin_email_user'] -> firstname;
  $admin_user_lname = $data['admin_email_user'] -> lastname;
	
	if($admin_user_lname=="None")
{
	$admin_user_lname=" ";
}
	
	$data['name']=$admin_user_fname." ".$admin_user_lname;
		        $data['message'] =$original_name." file was downloaded by :".$download_user_fname." ". $download_user_lname;				
		       // $data['password'] = $password;				
		        		
				
                $this->email->set_newline("\r\n");	            
				$this->email->from("noreply@securegateway.io","Secure Gateway");
				$this->email->to($admin_user_email);
				$this->email->subject("SecureGateway - File Download Notification");
				$this->email->set_mailtype("html");
				$body = $this->load->view('email/admin_download',$data,true);
				//$body = '<h1>SecureGateway<h1> <br> <h3>File has been uploaded in Securegateway <h3>';
				$this->email->message($body);   
				$this->email->send();
				$result = $this->email->send(); 
				
// File Download Admin  Notification Done Added By Mani Nalliappan - End	

				

$file = $path.'/'.$file_name;

	//print_r($file);exit;

    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$file_name");
    header("Content-Type: application/zip");
    header("Content-Transfer-Encoding: binary");
    
    // Read the file
  if(readfile($file))
 
 {
	echo 1; 
 }
    
	
/*
    ob_clean(); 
    $this->load->helper('download');
    //$data = file_get_contents($path); 
    force_download($Filename,$path); 
	
	*/	
	exit;
	
}
	public function guest_reg()
        {
	$guestid=$this->uri->segment(3);  
	
	 $where = array('id' => $guestid);
				   $data['user_account'] = $this->Common_model->all_record('sg_file_share_nonreg',$where);	
				   
				   $id = $data['user_account'] -> id;	
                   $email_id = $data['user_account'] -> email_id;
                   $file_id = $data['user_account'] -> file_id;
                   $email_status = $data['user_account'] -> email_status;
                   $reg_status = $data['user_account'] -> reg_status;
				    $this->session->set_userdata('file_id', $file_id);
					   $this->session->set_userdata('email_post', $email_id);
					   
				   	 $where1 = array('username' => $email_id);
				   $data['user'] = $this->Common_model->all_record('sg_user_auth',$where1);	
				    
					   
				/*	   echo $guestid."  ".$this->session->userdata('email_post');
	exit; */
				   
				   $counts = count($data['user']);
			
		if($counts==1)
            {
				redirect('Securegateway/view_login');
				
			}
			else{
				redirect('DashboardGuestUser/view_registration1');	
			}
                
	
		}
	
	public function view_registration1()
	{if($this->session->userdata('login')!=1)
		{
		  $this->session->set_userdata('type_post', 4);
			$this->load->view('login/signup-new');	
		}
		else{
			redirect('DashboardGuestUser');
		}
	}
	
	
public function guestuser()
	{


		
		
			  
			 if($this->session->userdata("login")==1)
				{
				redirect(base_url('DashboardGuestUser'),'location');
				}
					
		
				
	
		
		else
		{
			$this->onetime_mail($this->session->userdata('email_post'));
						 
				$this->session->set_userdata('type_post', 4);
			  
				$this->load->view('login/guestemail_otp');
		}
	}
	function guestemail_otp()
	{
			$otp=$this->input->post('otp');
		
			if($this->session->userdata("otp")==$otp)
			{
				$this->session->set_userdata('login', 1);
				 redirect('DashboardGuestUser');
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
	
		
    }
	
	
