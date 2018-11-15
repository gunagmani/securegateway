<?php
Class Department extends CI_Controller{

	public function __construct()
		{
			
			    parent ::__construct();
				$this->load->database();
				$this->load->library('session');
				$this->load->helper('url');
				$this->load->helper('number');
				$this->load->model('Auth_model');
				$this->load->model('Common_model');
				$this->load->library('Logentry');
				$this->load->library('Messages');
				$this->load->library('form_validation');
				
				
	 $this->data['menu'] = "includes/leftMenu_bussiness";
				//$this->data['menu']="includes/mainmenu.php";
				
				
				
				
				if($this->session->userdata("account_id")=='')
				{
				 redirect(base_url());
				}
				
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
		//$this->load->view('includes/mainmenu');
		
	}
	

   
	
	public function index()
	{		   
     
	 $where = array('customer_id'=> $this->session->userdata("customer_id"), 'status'=>1);
	 $data['department_data'] = $this->Common_model->all_record_result('sg_department',$where);

		$this->header_value();
		$this->load->view('department/department_form', $data);
		$this->load->view('includes/bottom');
	
	
	}	 
	
	
	public function view_edit_department()
	{
		$id = $this->uri->segment(3);
		
		 $where = array('id'=> $id, 'status'=>1);
	     $data['department_data'] = $this->Common_model->all_record('sg_department',$where);

		$this->header_value();
		$this->load->view('department/view_edit_department', $data);
		$this->load->view('includes/bottom');

		
		
	}
	
	
	
	public function add_department()
	{
	

	 $department = $this->input->post('department');
     $this->form_validation->set_rules('department','Department','required|callback_department_exist');

	 
	 
        if($this->form_validation->run() == TRUE) 
        {

		      $date_time = date('Y-m-d H:i:s');
			  $data = array('department_name'=>$department, 'customer_id'=>$this->session->userdata("customer_id"), 'status'=>1, 'created_date'=>$date_time);	  
			  $return_value = $this->Common_model->insertVal('sg_department',$data);
			  
			  
			  
			  
			  
			  $user_access_upload = array('department_id'=> $return_value, 'user_id' => $this->session->userdata("user_id"),'customer_id' => $this->session->userdata("customer_id"),'upload' => 1, 'download' => 1, 'status' => 1);
	     $upload_return = $this->Common_model->insertVal('sg_access_parent',$user_access_upload);
			 

			 $this->logentry->logcreate($this->session->userdata("user_id"), $return_value, 'Folder creation', 'Folder Created Successfully');
			  
			  $this->messages->setMessageFront('Department Added Successfully','success');
		      redirect('department');
					
		}
		else
		{
         $where = array('customer_id'=> $this->session->userdata("customer_id"), 'status'=>1);
	  $data['department_data'] = $this->Common_model->all_record_result('sg_department',$where);
		$this->header_value();
		$this->load->view('department/department_form', $data);
		$this->load->view('includes/bottom');
		}

	}	
	

	public function department_exist($input) 
    {
	

	
	     $where = array('department_name'=> $input,'customer_id'=>$this->session->userdata("customer_id"));
	  $data['user_details'] = $this->Common_model->all_record_result('sg_department',$where);
	  
	
	  $count = count($data['user_details']); 
     
	  
	    if($count >= 1)
		{
			$this->form_validation->set_message('department_exist', 'Entered Department name is already exist');
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

	
	
		
	public function edit_department()
	{
		//$table=0,$data=0,$where=0
		 if($this->input->post('id')==''){ redirect('department');}
		 
		 $department = $this->input->post('department');
		 $id = $this->input->post('id');
		 
     $this->form_validation->set_rules('department','Department','required|callback_department_exist');

	 
	 
        if($this->form_validation->run() == TRUE) 
        {
		     
			  	$where = array('id' => $id);
	            $data = array('department_name' => $department);
	            $data['update_department'] = $this->Common_model->record_update('sg_department',$where,$data);
			    
				$this->logentry->logcreate($this->session->userdata("user_id"), $id, 'Folder Edit', 'Folder Edited Successfully');
			  
			  $this->messages->setMessageFront('Department Updated Successfully','success');
		      redirect('department');
					
		}
		else
		{
        $where = array('id'=> $id, 'status'=>1);
	    $data['department_data'] = $this->Common_model->all_record('sg_department',$where);
		$this->header_value();
		$this->load->view('department/view_edit_department', $data);
		$this->load->view('includes/bottom');
		}
		
		

	}
	
	
	

	
	
	
	
	
	
	
	
	
	
		
    }
	
	
