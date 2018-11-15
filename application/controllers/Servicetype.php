<?php
Class Servicetype extends CI_Controller{

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
				$this->load->library('form_validation');
				$this->load->helper('form');
	 $this->data['menu'] = "includes/leftMenu_bussiness";
				
				
				
				
				
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
	}
	

   
	
	public function index()
	{		   
     
	 $where = array('customer_id'=> $this->session->userdata("customer_id"));
	$data['department_value'] = $this->Common_model->all_record_result('sg_department',$where);

    $where = array('customer_id'=> $this->session->userdata("customer_id"));
	$data['service_value'] = $this->Common_model->all_record_result('sg_service_type',$where);
	

	
		$this->header_value();
		$this->load->view('servicetype/servicetype_form', $data);
		$this->load->view('includes/bottom');
	
	
	}	 
	
	
	public function view_edit_servicetype()
	{
		$id = $this->uri->segment(3);
		
		 $where = array('id'=> $id);
	     $data['servicetype_data'] = $this->Common_model->all_record('sg_service_type',$where);

		 
		$this->header_value();
		$this->load->view('servicetype/view_edit_servicetype', $data);
		$this->load->view('includes/bottom');

		
		
	}
	
	
	
	public function add_servicetype()
	{
	

	 $department_value = $this->input->post('department_value');
	 $servicetype = $this->input->post('service_type');
	 
     $this->form_validation->set_rules('service_type','Servicetype','required|callback_servicetype_exist['.$department_value.']');
     
	 
	 
        if($this->form_validation->run() == TRUE) 
        {

		      $date_time = date('Y-m-d H:i:s');
			 $data = array('parent_id'=> $this->session->userdata("customer_id"), 'child_id'=>$department_value, 'customer_id'=>$this->session->userdata("customer_id"), 'service_type'=>$servicetype);	  
			  $return_value = $this->Common_model->insertVal('sg_service_type',$data);
	$this->logentry->logcreate($this->session->userdata("user_id"), $return_value, 'Sub-Folder creation', 'Sub-Folder created Successfully');
			  
			  $this->messages->setMessageFront('Service type Added Successfully','success');
		      redirect('servicetype');
					
		}
		else
		{
			
      	 $where = array('customer_id'=> $this->session->userdata("customer_id"));
	$data['department_value'] = $this->Common_model->all_record_result('sg_department',$where);

    $where = array('customer_id'=> $this->session->userdata("customer_id"));
	$data['service_value'] = $this->Common_model->all_record_result('sg_service_type',$where);
	

	
		$this->header_value();
		$this->load->view('servicetype/servicetype_form', $data);
		$this->load->view('includes/bottom');
	
		}

	}	
	

	public function servicetype_exist($input,$department) 
    {
	


	
	     $where = array('service_type'=> $input,'customer_id'=> $this->session->userdata("customer_id"));
	  $data['user_details'] = $this->Common_model->all_record_result('sg_service_type',$where);
	  
	
	  $count = count($data['user_details']); 
     
	  
	    if($count >= 1)
		{
			$this->form_validation->set_message('servicetype_exist', 'Entered Service type for that Servicetype is already exist');
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
		 
     $this->form_validation->set_rules('servicetype','Servicetype','required|callback_servicetype_exist');

	 
	 
        if($this->form_validation->run() == TRUE) 
        {
		     
			  	$where = array('id' => $id);
	            $data = array('service_type' => $servicetype);
	            $data['update_servicetype'] = $this->Common_model->record_update('sg_service_type',$where,$data);
			  
			$this->logentry->logcreate($this->session->userdata("user_id"), $id, 'Sub-Folder Edit', 'Sub-Folder edited Successfully');
			    
			  $this->messages->setMessageFront('Servicetype Updated Successfully','success');
		      redirect('servicetype');
					
		}
		else
		{
        $where = array('id'=> $id);
	    $data['servicetype_data'] = $this->Common_model->all_record('sg_service_type',$where);
		$this->header_value();
		$this->load->view('servicetype/view_edit_servicetype', $data);
		$this->load->view('includes/bottom');
		}
		
		

	}
	
	
	public function name_by_id($id)
	{
		$where = array('id'=> $id);
	    $data['department_name_print'] = $this->Common_model->all_record('sg_department',$where);
	    echo $data['department_name_print']->department_name;
	}
	
	

	
	
	
	
	
	
	
	
	
	
		
    }
	
	
