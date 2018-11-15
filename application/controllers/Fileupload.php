<?php
Class Fileupload extends CI_Controller{

	public function __construct()
		{
			
			    parent ::__construct();
				$this->load->database();
				$this->load->library('session');
				$this->load->helper('url');
				$this->load->model('Common_model');
				$this->load->model('Filebussiness');
				 $this->load->library('email');
				 $this->load->library('Messages');
				 $this->load->library('Logentry');
				 $this->load->helper('number');
				
				if($this->session->userdata("account_id")=='')
				{
				 redirect(base_url());
				}
				
				
	}
	
	
		 
	
	public function index()
	{		

		


	
	
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
		$data['size_used'] = $this->Common_model->all_record('sg_user_details',$where);
	    $status = $data['size_used'] -> status;
	
	    $where = array('id' => $this->session->userdata("account_id"));
	    $data['size_limit'] = $this->Common_model->all_record('sg_user_account',$where);
	    $size_limit = $data['size_limit'] -> storage_limit;
	    $value['single_limit'] = $data['size_limit'] -> transfer_limit;
	
//Remaining File size	
	$where = array('id'=> $this->session->userdata("user_id"));
	$data['user_details'] = $this->Common_model->all_record('sg_user_details',$where);
	$value['file_size'] = $data['user_details']->freespace;
		
		//$this->load->view('fileupload/new');
			
	/*	
		if($size_limit > $size_used)
		{
			$view = 'fileupload/fileupload_view';
		}
		else
		{
			$view = 'fileupload/fileupload_exceed';
		}
		*/
		
		//$this->load->view('fileupload/new');
		
		
		
		if($status==0)
		{
			$view = 'fileupload/fileupload_expired';
			$value['expiry_message'] = "Your plan is expired. Please upgrade to continue.";
			$value['status'] = $status;
			 
		}
		else
		{
			$view = 'fileupload/fileupload_view';
		}
		
		
		
		
		/*
		if($status==0)
		{
			$view = 'fileupload/fileupload_view';
		}
		else
		{
			$view = 'fileupload/fileupload_view_bussiness';
		}
		
	*/
	
	    $this->load->view('includes/top');
		$this->load->view('includes/top_menu');
		$this->load->view($left_menu);
		$this->load->view($view, $value);
		$this->load->view('includes/bottom');

	
		//$this->load->view('original.html');
	}	

   	
	public function upgrade_view()	
	{		

        $where = array('id' => $this->session->userdata("user_id"));	      
		$data['size_used'] = $this->Common_model->all_record('sg_user_details',$where);
	    $value['status'] = $data['size_used'] -> status;
		
		
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
		$value['expiry_message'] = "Please choose the plan to Upgrade.";
	    $this->load->view('includes/top');
		$this->load->view('includes/top_menu');
		$this->load->view($left_menu);
		$this->load->view('fileupload/fileupload_expired', $value);
		$this->load->view('includes/bottom_dashboard');

	
	}
	public function fileuploadList_view()
	{		   
	
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
	
	
	    $user_id = $this->session->userdata("user_id");
	    $where = array('user_id' => $user_id, 'status' => 1);
	    $data['table_details'] = $this->Common_model->all_record_result('sg_file',$where);
		//$user_id = '45';

		//$data['table_details'] = $this->Common_model->pc($user_id);
    
	

	
	    $this->load->view('includes/top',$data);
		$this->load->view('includes/top_menu');
		$this->load->view($left_menu);
		$this->load->view('fileupload/fileuploadList_view');
		$this->load->view('includes/fileshare_bottem');
		
		//$this->load->view('original.html');
	}	
	
	public function fileuploadRec_view()
	{		   

	
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
	
	
	    $user_id = $this->session->userdata("user_id");
	    //$where = array('user_id' => $user_id);
	    $data['table_details'] = $this->Filebussiness->file_receive($user_id);
		

		
		//$data['table_details'] = $this->Common_model->pc($user_id);
    
	

	
	    $this->load->view('includes/top',$data);
		$this->load->view('includes/top_menu');
		$this->load->view($left_menu);
		$this->load->view('fileupload/fileuploadRec_bussiness', $data);
		$this->load->view('includes/fileshare_bottem');
		
		//$this->load->view('original.html');
	}
	
	
public function upload() 
{
if (!empty($_FILES))
{

$account_id = $this->session->userdata("account_id");
$role_id = $this->session->userdata("role_id");
$user_id = $this->session->userdata("user_id");	
$folder_name = $this->session->userdata("folder_name");	
	
$tempFile = $_FILES['file']['tmp_name'];
$fileName = $_FILES['file']['name'];


	$fileName = str_replace(' ', '',$fileName);
	$fileName = str_replace('&', '-',$fileName);
	$fileName = preg_replace("/[^a-zA-Z0-9()-_.]/", "", $fileName);


//$fileName = "mani32156.zip";
$filesize = $_FILES['file']['size'];
$targetPath = getcwd() . '/uploads/';

if($account_id==1)
{
	$targetPath = getcwd() . '/uploads/Free/';
	$path = 'uploads/Free/';
}
else if($account_id==2)
{
	$targetPath = getcwd() . '/uploads/Personal/'.$folder_name.'/';
	$path = 'uploads/Personal/'.$folder_name.'/';
	
}
	/*echo "Target Path:".$targetPath."<br/>";
	echo "File Path:".$path."<br/>";
	exit;*/

	$where = array('id'=> $user_id);
	$data['user_details'] = $this->Common_model->all_record('sg_user_details',$where);
	$user_remaining_size = $data['user_details']->freespace;
	
	
	
if($filesize <= $user_remaining_size)
{
	
    $targetFile = $targetPath . $fileName ;  
	$extension = pathinfo($fileName, PATHINFO_EXTENSION );
	$without_extension = pathinfo($fileName, PATHINFO_FILENAME);
	$fileexist_check = $targetPath.$without_extension.'.zip';
	
	
	 
	
    $counter = 1; 
  
    while(file_exists($fileexist_check))
	{
		echo "ENTER";
        //$fileName = $rawBaseName . "-".$counter . '.' . $extension;
        $fileName = $without_extension . "-".$counter . '.' . $extension;  
        $targetFile = $targetPath . $fileName ; 
    	$tocheck = $without_extension . "-".$counter . '.zip';
		$fileexist_check = $targetPath.$tocheck;
	
	   
        $counter++;
	}
	

move_uploaded_file($tempFile, $targetFile);

$date_time = date('Y-m-d H:i:s');



	   
	   
	   $options = array
	(
		'http' => array(
			'protocol_version' => '1.0',
			'method' => 'GET'
		)
	);

	$context = stream_context_create(array('http'=>array('protocol_version'=>'1.1')));


	//$apiURL="http://149.56.189.84:8001/emailValidator/webresources/verify?userKey=fusionQ-site&password=fusionQ-site&email=".urlencode($emailAddressName);
	//$apiURLphone="http://149.56.189.84:8001/phoneValidator/webresources/service?userKey=fusionQ-site&password=fusionQ-site&phonenumber=".urlencode($phonenumber);


	//$apiURL = "http://localhost:8080/fusionQZipConversion/service/json/getMatchedData?Fileid=01234&Filename=$fileName&InputFilepath=D:/xampp/htdocs/securegatewaytesting/$path&UploadFileLocation=D:/xampp/htdocs/securegatewaytesting/$path";

	
	$apiURL = 	"http://localhost:8080/fusionQZipConversion1/service/json/getMatchedData?Fileid=01234&Filename=$fileName&Filepath=D:/xampp/htdocs/securegatewaytesting/$path";
	
	
	
	//securegatewaydev
	
	
	//echo $apiUrl;
	$restOutput_raw = $this->CallAPI("GET",$apiURL);
	//$restOutput=json_decode(CallAPI("GET",$apiURL),true); 	
	$restOutput=json_decode($restOutput_raw);

//var_dump($restOutput);die;
	
				$orig_file =  $restOutput->OriginalFilename;
				$orig_zipfile = $restOutput->OriginalZipFilename;
				$password =  $restOutput->Password; 
				$flag = $restOutput->ResponseIndicator;
	
	
	if($restOutput)
	{
		$form_data = array('account_id'=>$account_id,'user_id'=> $user_id , 'role_id'=>$role_id, 'parent_id'=>1,
	  'customer_id'=>1, 'frequency_id'=>1, 'child_id'=>1,
	  'original_name'=>$fileName,'file_name'=>$orig_zipfile,'password'=>$password,'path'=>$path, 'createddate'=> $date_time, 'modifieddate'=> $date_time,
	  'file_type'=> $date_time, 'file_Size'=>$filesize, 'file_life'=>1, 'adhoc'=>1,
	  'service_type'=>1, 'status'=>1);
       
	   $return_data = $this->Common_model->insertVal('sg_file',$form_data);
	   
	   
	    $this->logentry->logcreate($user_id, $return_data, 'Fileupload', 'File Upload Successfully');	 
	   
	   //$where = array('id' => $user_id);
	   //$data = array('size_used' => $filesize);
	   //$return_data = $this->Common_model->add_size('sg_user_details',$where,$filesize);
	   
	   
	    //$user_log = array('user_id'=> $user_id,'object_id'=> $return_data, 'activity'=>'Fileupload', 'description'=>"File Upload Successfully",  'createddate'=>$date_time);
				  // $log_creation = $this->Common_model->insertVal('sg_user_logs',$user_log);
   
	}
}

else

{
header("HTTP/1.0 400 Bad Request");
echo "Your exceed the upload limit";
}

}
}	


public function CallAPI($method, $url, $data = false)
{
	
    $curl = curl_init();

    switch ($method)
    {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);
            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }
	
	// Optional Authentication:
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_USERPWD, "username:password");

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	
    $result = curl_exec($curl);
    curl_close($curl);
    return $result;
	
}

public function download()
{
	
	$file_id = $this->uri->segment(3);
	
	
	$where = array('file_id'=> $file_id);
	$data = array('download' => 1);
	$data['file_update'] = $this->Common_model->record_update('sg_file_share',$where,$data);
	
	
		
	$where = array('id'=> $file_id);
	$data['file_detail'] = $this->Common_model->all_record('sg_file',$where);
	$file_name = $data['file_detail'] -> file_name;
	$file_owner_id = $data['file_detail'] -> user_id;
	$original_name = $data['file_detail'] -> original_name;
	$path = $data['file_detail'] -> path;
	$password = $data['file_detail'] -> password;

	//$path = WEB_DIR.$path;
	$path = FILE_DOWNLOAD_URL.$path;
	$account_id = $this->session->userdata("account_id");
    $folder_name = $this->session->userdata("folder_name");	
	

//Fine email from user ID

    $user_where = array('id'=>$this->session->userdata("user_id"));
	$data['email_user'] = $this->Common_model->all_record('sg_user_details',$user_where);	
    $user_email = $data['email_user'] -> email;
  // $user_email = $data['email_user'] -> email;
      $download_user_fname = $data['email_user'] -> firstname;
	     $download_user_lname = $data['email_user'] -> lastname;
	
		        $data['message'] = "Password for the downloaded file :".$original_name;				
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
				
// File Download Admin  Notification  Added By Mani Nalliappan - Start
 $user_where = array('id'=>$file_owner_id);
	$data['admin_email_user'] = $this->Common_model->all_record('sg_user_details',$user_where);	
    $admin_user_email = $data['admin_email_user'] -> email;

	$admin_user_fname = $data['admin_email_user'] -> firstname;
  $admin_user_lname = $data['admin_email_user'] -> lastname;
	
	
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
	
	$this->logentry->logcreate($this->session->userdata("user_id"), $file_id, 'Filedownload', 'File Downloaded Successfully');
		
$file = $path.'/'.$file_name;


    $this->load->helper('download'); 
    //force_download($file,NULL);
    $data = file_get_contents($file);
    force_download($file_name, $data);
	exit;
	
/*

header("Content-Description: File Transfer"); 
header("Content-Type: application/octet-stream"); 
header("Content-Disposition: attachment; filename='" . basename($file) . "'"); 
readfile ($file); 
exit(); 

	*

/*header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$file_name");
    header("Content-Type: application/zip");
    header("Content-Transfer-Encoding: binary"); 
	header("Pragma: public");
header("Expires: 0");
   header("Content-Type: application/zip");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
  header("Content-Disposition: attachment; filename=$file_name");
header("Content-Transfer-Encoding: binary ");
    
    // Read the file
    readfile($file);
*/

	
	
	
/*
    ob_clean(); 
    $this->load->helper('download');
    //$data = file_get_contents($path); 
    force_download($Filename,$path); 
	
	*/	
	
	
}
	
public function fileDownloadAdmin()
{	


}
public function fileDelete()
{
	//$id = $this->uri->segment(3);
         $id = $this->input->post('delete_id');
	    $where = array('id' => $id);	      
		$data['size_used'] = $this->Common_model->all_record('sg_file',$where);
	    //print_r($data['size_used']);
		$filesize = $data['size_used'] -> file_Size;
		$file_name = $data['size_used'] -> file_name;
		$path = $data['size_used'] -> path;
		$link = $path.$file_name;
	
	$user_id = $this->session->userdata("user_id");
	$where = array('id' => $user_id);
	$return_data = $this->Common_model->decrese_size('sg_user_details',$where,$filesize);
	unlink($link); 
	
	//$table=0,$data=0,$where=0
	$where = array('id' => $id);
	$data = array('status' => 0);
	$data['delete'] = $this->Common_model->record_update('sg_file',$where,$data);
	
	$this->logentry->logcreate($this->session->userdata("user_id"), $id,'Filedelete', 'File Deleted Successfully');
	
	if($data['delete'])
	{
			$this->messages->setMessageFront('File Deleted','error');
		redirect('Fileupload/fileuploadList_view');
	}
	
}
	
	
	
public function share_file()
{
	
	
	$email_string = $this->input->post('email_value');
	
	$file_id = $this->input->post('file_id');
	
	$email_string = explode("," ,$email_string[0]);

	
	foreach($email_string as $email_val)
	{
	
		
	    $where = array('email'=> $email_val);

	$data['user_details'] = $this->Common_model->all_record('sg_user_details',$where);
	$count = count($data['user_details']); 
	$date_time = date('Y-m-d H:i:s');
    $id = $data['user_details']->id;
    $firstname = $data['user_details']->firstname;
	$data = array('file_id'=>$file_id, 'user_id'=>$id, 'status'=>1, 'date_time'=>$date_time, 'download'=>0);

  
	    if($count >= 1)
		{
			  
	$return_data = $this->Common_model->insertVal('sg_file_share',$data);

        $data['message'] = "Hi You received a file in Securegateway.";	
$data['return_data'] =$return_data;	
	$data['return'] ="RU";		
			
                $this->email->set_newline("\r\n");	            
				$this->email->from("noreply@securegateway.io","Secure Gateway");
				$this->email->to($email_val);
				$this->email->subject("SecureGateway - File Received Notification");
				$this->email->set_mailtype("html");
				$body = $this->load->view('email/notification',$data,true);
				//$body = '<h1>SecureGateway<h1> <br> <h3>File has been uploaded in Securegateway <h3>';
				$this->email->message($body);   
				$this->email->send();
				$result = $this->email->send(); 
				
				$share_description = "File shared to ". $firstname."  Successfully";
				 $this->logentry->logcreate($this->session->userdata("user_id"), $file_id, 'Fileshare', $share_description);
	    $this->messages->setMessageFront('File shared successfully','success');
			

		}
		else
		{

			$data = array('user_id'=>$user_id = $this->session->userdata("user_id"), 'email_id'=>$email_val, 'file_id'=>$file_id, 'email_status'=>1, 'up_date'=>$date_time, 'reg_status'=>0);
					
			  $return_data = $this->Common_model->insertVal('sg_file_share_nonreg',$data);

		      $data['message'] = "Hi You received a file in Securegateway. Please register to donwload file from securegateway";		
$data['return_data'] =$return_data;	
	$data['return'] ="NG";
		    	$share_description = "File shared to ". $email_val."  Successfully";
				
				 $this->logentry->logcreate($this->session->userdata("user_id"), $file_id, 'Fileshare', $share_description);
	    $this->messages->setMessageFront('File shared successfully','success');
			
                $this->email->set_newline("\r\n");	            
				$this->email->from("noreply@securegateway.io","Secure Gateway");
				$this->email->to($email_val);
				$this->email->subject("SecureGateway - File Received Notification");
				$this->email->set_mailtype("html");
				$body = $this->load->view('email/notification',$data,true);
				//$body = '<h1>SecureGateway<h1> <br> <h3>File has been uploaded in Securegateway <h3>';
				$this->email->message($body);   
				$this->email->send();
				$result = $this->email->send(); 
		}
	}

	 
		redirect('Fileupload/fileuploadList_view');
	
	}	
	
	
	
	
	
	
public function email_notify_ajax()
{
	$email_val = $this->input->post('mail_val');
	
		       
			    $where = array('email'=> $email_val);

	$data['user_details'] = $this->Common_model->all_record('sg_user_details',$where);
	
	  
	
	
	
	
	$count = count($data['user_details']); 

	
	
	    if($count==1)
		{
			
			 $user_id = $data['user_details']->id;
			 $date_time = date('Y-m-d H:i:s');
			
			   
			   
                $this->email->set_newline("\r\n");	            
				$this->email->from("noreply@securegateway.io","Secure Gateway");
				$this->email->to($email_val);
				$this->email->subject("SecureGateway - File Received Notification");
				$this->email->set_mailtype("html");
				//$body = $this->load->view('email/email');
				$body = '<h1>SecureGateway<h1> <br> <h3>File has been uploaded in Securegateway <h3>';
				$this->email->message($body);   
				$this->email->send();
				$result = $this->email->send(); 
					echo 1;
			
		}
		else
		{
		    $this->email->set_newline("\r\n");	            
				$this->email->from("noreply@securegateway.io","Secure Gateway");
				$this->email->to($email_val);
				$this->email->subject("SecureGateway - File Received Notification");
				$this->email->set_mailtype("html");
				//$body = $this->load->view('email/email');
				$body = '<h1>SecureGateway<h1><h3>You Have received a file in Securegateway<h3> <h3>Please Register by click the below link</h3>';
				//$body.= '<a href =""> Click Here </a>';
				$link_address = base_url();
				$body.="<a href='".$link_address."'>Click Here</a>";
				$this->email->message($body);   
				$this->email->send();
				$result = $this->email->send(); 
					echo 2;
		}
}



	
public function email_valid_check()
{
	 

    $email_string = $this->input->post('email');	
	$file_id = $this->input->post('file_id');   
	
    $email_exist = 0;

	
	$email_return = array();
	$email_string = explode("," ,$email_string);
$own_email = $this->session->userdata("email");
	
if (in_array($own_email, $email_string))
{
     
	    $result = array('status'=>3,'email'=>'Your not supposed to share your own email', 'email_exist'=>$own_email);
        echo json_encode($result);
		exit;
}

  
	
	
	foreach($email_string as $email_val)
	{
	
	
// Getting userid from email	
	$where = array('email'=> $email_val);
	$data['user_details'] = $this->Common_model->all_record('sg_user_details',$where);
	
	if(isset($data['user_details']->id))
	{
	
// checking already exist	
	
	     $id = $data['user_details']->id;
	     $where_find = array('file_id'=> $file_id, 'user_id'=> $id);
		 
	
		 
	     $data['valid_details'] = $this->Common_model->all_record('sg_file_share',$where_find);
	     $count = count($data['valid_details']);
	

	
		 if($count==1)
		 {
			
			 $email_exist = $email_exist + 1;
			 $email_return[] = $email_val;
			 
		 }
	}
	else
	{
		
		$where_find_non = array('email_id'=> $email_val, 'file_id'=> $file_id);
		 
	     $data_non['valid_details'] = $this->Common_model->all_record('sg_file_share_nonreg',$where_find_non);
	     $count = count($data_non['valid_details']);
		 
		  if($count==1)
		 {
			
			 $email_exist = $email_exist + 1;
			 $email_return[] = $email_val;
			 
		 }
		 
	}
	}
	
	
	if($email_exist!=0)
	{
		

        $email_matched  = implode(',', $email_return);
	    $result = array('status'=>1,'email'=>$email_matched, 'email_exist'=>$email_exist);
        echo json_encode($result);
		exit;
	}
	else
	{
	    $result = array('status'=>0);
        echo json_encode($result);
        exit;
	}

}



	
	
/*	
		public function download1(){
			$file_name = WEB_DIR.'uploads/audi-q7.jpg';
   //$file_name = $file;
   $mime = 'application/force-download';
   header('Pragma: public');    
   header('Expires: 0');        
   header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
   header('Cache-Control: private',false);
   header('Content-Type: '.$mime);
   header('Content-Disposition: attachment; filename="'.basename($file_name).'"');
   header('Content-Transfer-Encoding: binary');
   header('Connection: close');
   readfile($file_name);    
   exit();
}
	*/
    
	
	}
	

	
