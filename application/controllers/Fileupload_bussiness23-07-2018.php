<?php
Class Fileupload_bussiness extends CI_Controller{

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
				if($this->session->userdata("account_id")==
				'')
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
	    $size_used = $data['size_used'] -> size_used;
	    $status = $data['size_used'] -> status;

	    $where = array('id' => $this->session->userdata("account_id"));
	    $data['size_limit'] = $this->Common_model->all_record('sg_user_account',$where);
	    $size_limit = $data['size_limit'] -> storage_limit;
		
	
	
	
//Front_end validation for file size	
	    $where = array('id' => $this->session->userdata("account_id"));
	    $data['size_limit'] = $this->Common_model->all_record('sg_user_account',$where);
	    $size_limit = $data['size_limit'] -> storage_limit;
	    $return_data['single_limit'] = $data['size_limit'] -> transfer_limit;
	

//Remaining File size	
		$where = array('id'=> $this->session->userdata("user_id"));
		$data['user_details'] = $this->Common_model->all_record('sg_user_details',$where);
		$return_data['file_size'] = $data['user_details']->freespace;
	
	
	
	
		//$view = 'fileupload/fileupload_view_bussiness';
		//$this->load->view('fileupload/new');
			
	   $return_data['expiry_message'] = "Your plan is expired. Please upgrade to continue.";
		if($status==0)
		{
			$view = 'fileupload/fileupload_expired';
			$return_data['status'] = $status;
		}
		else
		{
			$view = 'fileupload/fileupload_view_bussiness';
		}
		
		
		//$this->load->view('fileupload/new');
			
			$customer_id = $this->session->userdata("customer_id");
			
			
		   
			 if($this->session->userdata("role_id")==1)
			 {
				  $where = array('customer_id'=> $customer_id);
	              $return_data['department_data'] = $this->Common_model->all_record_result('sg_department',$where);
				  $value['expiry_message'] = "Your plan is expired. Please upgrade to continue.";
			      
			 }
			 else
			 {
	              $return_data['department_data'] = $this->Filebussiness->department_access($customer_id,$this->session->userdata("user_id"));
			 }
			 
		  //$where = array('customer_id'=> $customer_id);
	  //$return_data['adhoc'] = $this->Common_model->all_record_result('sg_adhoc',$where);
	  
	    $where = array('status'=> 1);
	  $return_data['frequency'] = $this->Common_model->all_record_result('sg_frequency',$where);

	  //Remaining File size	
	$where = array('id'=> $this->session->userdata("user_id"));
	$data['user_details'] = $this->Common_model->all_record('sg_user_details',$where);
	$return_data['file_size'] = $data['user_details']->freespace;
		
	  
	  
	    $this->load->view('includes/top');
		$this->load->view('includes/top_menu');
		$this->load->view($left_menu);
		$this->load->view($view, $return_data);
		$this->load->view('includes/fileshare_bussiness');

	
		//$this->load->view('original.html');
	}	

   	
	public function fileupload_list()
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
	 $customer_id = $this->session->userdata("customer_id");
	   // $data['table_details'] = $this->Common_model->pc($user_id);
	 
	    $where = array('user_id' => $user_id, 'status' => 1);
	    $data['table_details'] = $this->Common_model->all_record_result('sg_file',$where);
	  
	      $data['department_data'] = $this->Filebussiness->department_access($customer_id,$this->session->userdata("user_id"));
	
	    $this->load->view('includes/top',$data);
		$this->load->view('includes/top_menu');
		$this->load->view($left_menu);
		////$this->load->view('fileupload/fileuploadList_view_bussiness', $return_data);
		$this->load->view('fileupload/fileuploadList_view');
		$this->load->view('includes/fileshare_bottem');
		
		//$this->load->view('original.html');
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
	    $where = array('user_id' => 0, 'status' => 1);
	    $data['table_details'] = $this->Common_model->all_record_result('sg_file',$where);
		
		
		
		//$data['table_details'] = $this->Common_model->pc($user_id);
    
//Value for the dropdowns
	
	      $customer_id = $this->session->userdata("customer_id"); 
		     if($this->session->userdata("role_id")==1)
			 {
				  $where = array('customer_id'=> $customer_id);
	              $return_data['department_data'] = $this->Common_model->all_record_result('sg_department',$where);
			 }
			 else
			 {
	              $return_data['department_data'] = $this->Filebussiness->download_access($customer_id,$this->session->userdata("user_id"));
			 }
			 
//Value for frequency		  
		  //$where = array('customer_id'=> $customer_id);
	      //$return_data['adhoc'] = $this->Common_model->all_record_result('sg_adhoc',$where);
//Value for department	  
	      $where = array('status'=> 1);
	      $return_data['frequency'] = $this->Common_model->all_record_result('sg_frequency',$where);
	  
	  
	
	    $this->load->view('includes/top',$data);
		$this->load->view('includes/top_menu');
		$this->load->view($left_menu);
		$this->load->view('fileupload/fileuploadList_view_bussiness', $return_data);
		$this->load->view('includes/fileshare_bottem');
		
		//$this->load->view('original.html');
	}
	
	
	
	
	
	public function filesearch()
	{
	$department_id = $this->input->post('department');
	$servicetype = $this->input->post('servicetype');
	$frequency = $this->input->post('frequency');
	$fromdate = $this->input->post('fromdate');
	$todate = $this->input->post('todate');
    $user_id = $this->session->userdata("user_id");
	
	
	if($department_id=='')
	{
	$servicetype = '0';
	$frequency = '0';
	$fromdate = '0';
	$todate = '0';
	}
	
	
	if($fromdate=='' && $todate=='')
	{
		$fromdate = '0';
		$todate = '0';
	}
	else if($fromdate!='' && $todate=='')
	{
	$todate = date('Y-m-d');	
	}
	else if($todate!='' && $fromdate=='')
	{
	$fromdate = $todate;	
	}
	
	$customer_id = $this->session->userdata("customer_id");
	
	$value = "'".$department_id."','".$servicetype."','".$frequency."','".$user_id."','".$customer_id."','".$fromdate."','".$todate."'";
	//echo "CALL sg_proc_file_download" . $value; exit;
	

	//echo $value; exit;
	

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
	
	
	    //$user_id = $this->session->userdata("user_id");
	    //$where = array('user_id' => $user_id, 'status' => 1);
	    //$data['table_details'] = $this->Common_model->all_record_result('sg_file',$where);
		
		
		
		//$data['table_details'] = $this->Common_model->pc($user_id);
    
//Value for the dropdowns
	
	      $customer_id = $this->session->userdata("customer_id"); 
		     if($this->session->userdata("role_id")==1)
			 {
				  $where = array('customer_id'=> $customer_id);
	              $return_data['department_data'] = $this->Common_model->all_record_result('sg_department',$where);
			 }
			 else
			 {
	              $return_data['department_data'] = $this->Filebussiness->download_access($customer_id,$this->session->userdata("user_id"));
			 }
			 
//Value for frequency		  
		  //$where = array('customer_id'=> $customer_id);
	      //$return_data['adhoc'] = $this->Common_model->all_record_result('sg_adhoc',$where);
//Value for department	  
	      $where = array('status'=> 1);
	      $return_data['frequency'] = $this->Common_model->all_record_result('sg_frequency',$where);
	  
	 
	
	  $query1 = $this->db->query("CALL sg_proc_file_download($value)");
      $return_data['table_details'] = $query1->result();
      $query1->next_result(); 
$query1->free_result(); 
	 
	
	//print_r($return_data['table_details']); exit;
	    $this->load->view('includes/top');
		$this->load->view('includes/top_menu');
		$this->load->view($left_menu);
		$this->load->view('fileupload/fileuploadList_view_bussiness', $return_data);
		$this->load->view('includes/fileshare_bottem');
	
	
	
	
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
$filesize = $_FILES['file']['size'];

$fileName = str_replace(' ', '',$fileName);
$fileName = str_replace('&', '-',$fileName);
 $fileName = preg_replace("/[^a-zA-Z0-9()-_.]/", "", $fileName);


$targetPath = getcwd() . '/uploads/';


$department = $_POST['department_hidden'];
$service = $_POST['service_type_hidden'];
$frequency = $_POST['frequency_hidden'];
$adhoc = $_POST['adhoc_hidden'];


	$targetPath = getcwd() . '/uploads/Bussiness/'.$folder_name.'/';
	$path = 'uploads/Bussiness/'.$folder_name.'/';
	
$targetFile = $targetPath . $fileName ;

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

	/*$apiURL = 	"http://localhost:8080/fusionQZipConversion1/service/json/getMatchedData?Fileid=01234&Filename=$fileName&Filepath=D:/xampp/htdocs/securegatewaytesting/$path";*/

	$apiURL = 	"http://localhost:8080/fusionQZipConversion1/service/json/getMatchedData?Fileid=01234&Filename=$fileName&Filepath=".FILE_DOWNLOAD_URL."$path";
	
	
	
	//securegatewaydev
	
	
	//echo $apiUrl;
	$restOutput_raw = $this->CallAPI("GET",$apiURL);
	//$restOutput=json_decode(CallAPI("GET",$apiURL),true); 	
	$restOutput=json_decode($restOutput_raw);

	
				$orig_file =  $restOutput->OriginalFilename;
				$orig_zipfile = $restOutput->OriginalZipFilename;
				$password =  $restOutput->Password; 
				$flag = $restOutput->ResponseIndicator;
	
	
	if($restOutput)
	{
$form_data = array('account_id'=>$account_id,'user_id'=> $user_id , 'role_id'=>$role_id, 'parent_id'=>$department,
	  'customer_id'=>$this->session->userdata("customer_id"), 'frequency_id'=>$frequency, 'child_id'=>1,
	  'original_name'=>$fileName,'file_name'=>$orig_zipfile,'password'=>$password, 'path'=>$path, 'createddate'=> $date_time, 'modifieddate'=> $date_time,
	  'file_type'=> $date_time, 'file_Size'=>$filesize, 'file_life'=>1, 'adhoc'=>1,
	  'service_type'=>$service, 'status'=>1);
       
	   $return_data = $this->Common_model->insertVal('sg_file',$form_data);
	   
	    //$user_log = array('user_id'=> $user_id,'object_id'=> $return_data, 'activity'=>'Fileupload', 'description'=>"File Upload Successfully",  'createddate'=>$date_time);
				   //$log_creation = $this->Common_model->insertVal('sg_user_logs',$user_log);
	   
	     $this->logentry->logcreate($user_id, $return_data, 'Fileupload', 'File Upload Successfully');	
		 
	   $where = array('id' => $user_id);
	   //$data = array('size_used' => $filesize);
	   $return_data = $this->Common_model->add_size('sg_user_details',$where,$filesize);

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


    public function file_move()
	{
       $folder_name = $this->session->userdata("folder_name");	
       $file_id = $this->input->post('move_id');
       $department_value = $this->input->post('department_value');
       $service_type = $this->input->post('service_type');
$date_time = date('Y-m-d_H-i-s');
	   
//Getting file information
	   
	   $where = array('id'=> $file_id);
	   $data['file_detail'] = $this->Common_model->all_record('sg_file',$where);

		$file_name = $data['file_detail'] -> file_name;
		$original_name = $data['file_detail'] -> original_name;
	    $existing_path = $data['file_detail'] -> path;
		$update_path = 'uploads/Bussiness/'.$folder_name.'/';

	    
	
			   if($existing_path!=$update_path)
			   {
				 
// Check if the file name is already exist	
				    $where = array('file_name'=>$file_name, 'path'=>$update_path);
	                $data['file_exist'] = $this->Common_model->all_record('sg_file',$where);
	                $exist_count = count($data['file_exist']);
	                $old_path = $existing_path.$file_name;
					
					   if($exist_count!=0)
					   {
						      $extension = pathinfo($file_name, PATHINFO_EXTENSION );
	                          $without_extension = pathinfo($file_name, PATHINFO_FILENAME);
							  $file_name = $without_extension.$date_time.'.'.$extension;
					   }

					$new_path = 'uploads/Bussiness/'.$folder_name.'/'.$file_name;   
// File update		
		$where_file = array('id'=> $file_id);		    			   
	    $data = array('parent_id' => $department_value, 'file_name'=>$file_name, 'service_type'=>$service_type, 'path'=> $update_path);		
	    $data['file_update'] = $this->Common_model->record_update('sg_file',$where_file,$data);

		
		$filename_log = $file_name. ' Moved Successfully';
		
					if(copy($old_path, $new_path))
					{
					unlink($old_path);
					}
					
					$this->logentry->logcreate($this->session->userdata("user_id"),$file_id,'File Move', $filename_log);
					
		       }
		
		     else
			 {
			
				  $where_file = array('id'=> $file_id);
			  $data = array('parent_id' => $department_value,'service_type'=>$service_type, 'path'=> $update_path);
	          $data['file_update'] = $this->Common_model->record_update('sg_file',$where_file,$data); 
			  
			  $filename_log = $file_name. ' Moved Successfully';
			  
			  $this->logentry->logcreate($this->session->userdata("user_id"), $file_id, 'File Move', $filename_log);
			  
			 
			 }
		
		if($data['file_update'])
	    {
			$this->messages->setMessageFront('File Moved Successfully','success');
		   redirect('Fileupload_bussiness/fileupload_list');
	    }
		
		

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
	$original_name = $data['file_detail'] -> original_name;
	$path = $data['file_detail'] -> path;
	$password = $data['file_detail'] -> password;

	$path = FILE_DOWNLOAD_URL.$path;
	$account_id = $this->session->userdata("account_id");
    $folder_name = $this->session->userdata("folder_name");	
	

//Fine email from user ID

    $user_where = array('id'=>$this->session->userdata("user_id"));
	$data['email_user'] = $this->Common_model->all_record('sg_user_details',$user_where);	
    $user_email = $data['email_user'] -> email;

	
		        $data['message'] = "Password for the downloaded file New Check :".$original_name."<br/>";				
		        $data['password'] = $password;				
		        		
				
                $this->email->set_newline("\r\n");	            
				$this->email->from("admin@securegateway.io");
				$this->email->to($user_email);
				$this->email->subject("SecureGateway - File Download Notification");
				$this->email->set_mailtype("html");
				$body = $this->load->view('email/download',$data,true);
				//$body = '<h1>SecureGateway<h1> <br> <h3>File has been uploaded in Securegateway <h3>';
				$this->email->message($body);   
				$this->email->send();
				$result = $this->email->send(); 
				

$file = $path.'/'.$file_name;
$this->logentry->logcreate($this->session->userdata("user_id"), $file_id, 'Filedownload', 'File Downloaded Successfully');
	//print_r($file);exit;

    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$file_name");
    header("Content-Type: application/zip");
    header("Content-Transfer-Encoding: binary");
    
    // Read the file
    readfile($file);
    exit;
	
/*
    ob_clean(); 
    $this->load->helper('download');
    //$data = file_get_contents($path); 
    force_download($Filename,$path); 
	
	*/	
	
	
}
	
	
	public function downloadbusiness()
{
	
	$file_id = $this->uri->segment(3);
	
	
    $where = array('file_id'=> $file_id);
	$data = array('download' => 1);
	$data['file_update'] = $this->Common_model->record_update('sg_file_share',$where,$data);

	
	$where = array('id'=> $file_id);
	$data['file_detail'] = $this->Common_model->all_record('sg_file',$where);

		$file_name = $data['file_detail'] -> file_name;
	$original_name = $data['file_detail'] -> original_name;
	$path = $data['file_detail'] -> path;
	$password = $data['file_detail'] -> password;

	$path = FILE_DOWNLOAD_URL.$path;
	$account_id = $this->session->userdata("account_id");
    $folder_name = $this->session->userdata("folder_name");	
	

//Fine email from user ID

    $user_where = array('id'=>$this->session->userdata("user_id"));
	$data['email_user'] = $this->Common_model->all_record('sg_user_details',$user_where);	
    $user_email = $data['email_user'] -> email;

	
		        $data['message'] = "Password for the downloaded file New Check :".$original_name."<br/>".$path."==".$file_name;				
		        $data['password'] = $password;				
		        		
				
$file = $path.'/'.$file_name;
$this->logentry->logcreate($this->session->userdata("user_id"), $file_id, 'Filedownload', 'File Downloaded Successfully');
	//print_r($file);exit;

    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$file_name");
    header("Content-Type: application/zip");
    header("Content-Transfer-Encoding: binary");
    
    // Read the file
    readfile($file);
    exit;
	
/*
    ob_clean(); 
    $this->load->helper('download');
    //$data = file_get_contents($path); 
    force_download($Filename,$path); 
	
	*/	
	
	
}

  public function load_service_type()
    {
		
	$department_id = $this->input->post('department_id');
	
	$customer_id = $this->session->userdata("customer_id");

	

	
	
	  $where = array('child_id'=> $department_id, 'customer_id'=>$customer_id);
	  $data['service_type'] = $this->Common_model->all_record_result('sg_service_type',$where);
	  echo '<option value="N"> Service Type </option>';
	  foreach($data['service_type'] as $dep_val)
	  {
		  $service_type = $dep_val->service_type;
		  $id = $dep_val->id;
				 
		 echo '<option value="'.$id.'"> '.$service_type.' </option>';

		 
	  }
	  
	
	  
	}

    
public function file_move_service()
    {
		
	$file_id = $this->input->post('file_id');
	$where = array('id' => $file_id);
		$data['size_used'] = $this->Common_model->all_record('sg_file',$where);
		
		$parent_id = $data['size_used'] -> parent_id;
		
	
		$customer_id = $this->session->userdata("customer_id");
			
			
		   
			 if($this->session->userdata("role_id")==1)
			 {
				  $where = array('customer_id'=> $customer_id);
	              $return_data['department_data'] = $this->Common_model->all_record_result('sg_department',$where);
			 }
			 else
			 {
	              $return_data['department_data'] = $this->Filebussiness->department_access($customer_id,$this->session->userdata("user_id"));
			 }
			 
			 echo '<option value=""> Department</option>';
			 
			 foreach($return_data['department_data'] as $depmnt)
			 {
			 $dpt_id = $depmnt->id;
	         $department_name = $depmnt->department_name;
			
			 if($parent_id != $dpt_id)
			 {
			  echo '<option value="'.$dpt_id.'"> '.$department_name.' </option>';
			 }

	         }
	}
	

	

 public function load_service_type_move()
    {
		
	$department_id = $this->input->post('department_id');
	
	$customer_id = $this->session->userdata("customer_id");

	

	
	
	  $where = array('child_id'=> $department_id, 'customer_id'=>$customer_id);
	  $data['service_type'] = $this->Common_model->all_record_result('sg_service_type',$where);
	  echo '<option value=""> Service type </option>';
	  foreach($data['service_type'] as $dep_val)
	  {
		  $service_type = $dep_val->service_type;
		  $id = $dep_val->id;
				 
		 echo '<option value="'.$id.'"> '.$service_type.' </option>';

		 
	  }
	  
	
	  
	}

	
public function fileDelete()
{
	$id = $this->uri->segment(3);

	    $where = array('id' => $id);	      
		$data['size_used'] = $this->Common_model->all_record('sg_file',$where);
		$filesize = $data['size_used'] -> file_Size;
		$file_name = $data['size_used'] -> file_name;
		$path = $data['size_used'] -> path;
		$user_id = $data['size_used'] -> user_id;
		$link = $path.$file_name;
	
	//$user_id = $this->session->userdata("user_id");
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
		redirect('Fileupload_bussiness/fileuploadList_view');
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
			$share_description = "File shared to". $firstname."  Successfully";
			
			$this->logentry->logcreate($this->session->userdata("user_id"), $file_id, 'Fileshare', $share_description);
		    $this->messages->setMessageFront('File shared successfully','success');

            $data['message'] = "Hi You received a file in Securegateway.";			
			
                $this->email->set_newline("\r\n");	            
				$this->email->from("admin@securegateway.io");
				$this->email->to($email_val);
				$this->email->subject("SecureGateway - File Received Notification");
				$this->email->set_mailtype("html");
				$body = $this->load->view('email/notification',$data,true);
				//$body = '<h1>SecureGateway<h1> <br> <h3>File has been uploaded in Securegateway <h3>';
				$this->email->message($body);   
				$this->email->send();
				$result = $this->email->send(); 
			

		}
		else
		{

			$data = array('user_id'=>$user_id = $this->session->userdata("user_id"), 'email_id'=>$email_val, 'file_id'=>$file_id, 'email_status'=>1, 'up_date'=>$date_time, 'reg_status'=>0);
					
			  $return_data = $this->Common_model->insertVal('sg_file_share_nonreg',$data);
            $share_description = "File shared to". $firstname."  Successfully";
			$this->logentry->logcreate($this->session->userdata("user_id"), $file_id, 'Fileshare', $share_description);
	    $this->messages->setMessageFront('File shared successfully','success');
		
		      $data['message'] = "Hi You received a file in Securegateway. Please contact the admin for registration";			
			
                $this->email->set_newline("\r\n");	            
				$this->email->from("admin@securegateway.io");
				$this->email->to($email_val);
				$this->email->subject("SecureGateway - File Received Notification");
				$this->email->set_mailtype("html");
				$body = $this->load->view('email/bussiness_invite',$data,true);
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
				$this->email->from("admin@securegateway.io");
				$this->email->to($email_val);
				$this->email->subject("SecureGateway - File Received Notification");
				$this->email->set_mailtype("html");
				//$body = $this->load->view('email/email');
				$body = '<h1>SecureGateway<h1> <br> <h3>File has been Received in Securegateway <h3>';
				$this->email->message($body);   
				$this->email->send();
				$result = $this->email->send(); 
					echo 1;
			
		}
		else
		{
		    $this->email->set_newline("\r\n");	            
				$this->email->from("admin@securegateway.io");
				$this->email->to($email_val);
				$this->email->subject("SecureGateway - FileUpload Notification");
				$this->email->set_mailtype("html");
				//$body = $this->load->view('email/email');
				$body = '<h1>SecureGateway<h1><h3>You has been Received in Securegateway<h3> <h3>Please Register by click the below link</h3>';
				//$body.= '<a href =""> Click Here </a>';
				$link_address = base_url();
				$body.="<a href='".$link_address."'>Click Here</a>";
				$this->email->message($body);   
				$this->email->send();
				$result = $this->email->send(); 
					echo 2;
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
	

	
