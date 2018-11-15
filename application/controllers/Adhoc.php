<?php
Class Adhoc extends CI_Controller{

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
				$this->load->library('form_validation');
				
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
     
	 $where = array('customer_id'=> $this->session->userdata("customer_id"), 'status'=>1);

	 $data['adhoc_data'] = $this->Common_model->all_record_result('sg_adhoc',$where);

		$this->header_value();
		$this->load->view('adhoc/adhoc_form', $data);
		$this->load->view('includes/bottom');
	
	
	}	 
	
	
	public function view_edit_adhoc()
	{
		$id = $this->uri->segment(3);
		
		 $where = array('id'=> $id, 'status'=>1);
	     $data['adhoc_data'] = $this->Common_model->all_record('sg_adhoc',$where);

		$this->header_value();
		$this->load->view('adhoc/view_edit_adhoc', $data);
		$this->load->view('includes/bottom');

		
		
	}
	
	
	
	public function add_adhoc()
	{
	

	 $adhoc = $this->input->post('adhoc');
     $this->form_validation->set_rules('adhoc','Adhoc','required|callback_adhoc_exist');

	 
	 
        if($this->form_validation->run() == TRUE) 
        {
		      $date_time = date('Y-m-d H:i:s');
			  $data = array('customer_id'=>$this->session->userdata("customer_id"), 'folder_name'=>$adhoc, 'createddate'=>$date_time, 'status' => 1);	  
			  $return_value = $this->Common_model->insertVal('sg_adhoc',$data);
			  $this->messages->setMessageFront('Adhoc Added Successfully','success');
		      redirect('adhoc');
					
		}
		else
		{
         $where = array('customer_id'=> $this->session->userdata("customer_id"), 'status'=>1);
	  $data['adhoc_data'] = $this->Common_model->all_record_result('sg_adhoc',$where);
		$this->header_value();
		$this->load->view('adhoc/adhoc_form', $data);
		$this->load->view('includes/bottom');
		}

	}	
	

	public function adhoc_exist($input) 
    {
	
	     $where = array('folder_name'=> $input,'customer_id'=> $this->session->userdata("customer_id"));
	  $data['user_details'] = $this->Common_model->all_record_result('sg_adhoc',$where);
	  $count = count($data['user_details']); 

	    if($count >= 1)
		{
			$this->form_validation->set_message('adhoc_exist', 'Entered Adhoc name is already exist');
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

	
	
		
	public function edit_adhoc()
	{
		//$table=0,$data=0,$where=0
		 if($this->input->post('id')==''){ redirect('adhoc');}
		 
		 $adhoc = $this->input->post('adhoc');
		 $id = $this->input->post('id');
		 
     $this->form_validation->set_rules('adhoc','Adhoc','required|callback_adhoc_exist');

	 
	 
        if($this->form_validation->run() == TRUE) 
        {
		     
			  	$where = array('id' => $id);
	            $data = array('folder_name' => $adhoc);
	            $data['update_adhoc'] = $this->Common_model->record_update('sg_adhoc',$where,$data);
			  
			  
			  $this->messages->setMessageFront('Adhoc Updated Successfully','success');
		      redirect('adhoc');
					
		}
		else
		{
        $where = array('id'=> $id, 'status'=>1);
	    $data['adhoc_data'] = $this->Common_model->all_record('sg_adhoc',$where);
		$this->header_value();
		$this->load->view('adhoc/view_edit_adhoc', $data);
		$this->load->view('includes/bottom');
		}
		
		

	}
	
	
	

	
	
	
	
	
	
	
	
	
	
		
    }
	
	
